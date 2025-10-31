<?php
$title = 'Cookies en PHP';
const SEGUNDOS_EN_UN_DIA = 86400;

function create_cookie(string $name, string $value, int $days): void
{
    $exp = time() + max(1, $days) * SEGUNDOS_EN_UN_DIA;
    setcookie($name, $value, $exp, '/');
    setcookie($name . '_expires', (string) $exp, $exp, '/');
}

function delete_cookie(string $name): void
{
    setcookie($name, '', time() - 3600, '/');
    setcookie($name . '_expires', '', time() - 3600, '/');
    unset($_COOKIE[$name], $_COOKIE[$name . '_expires']);
}

function get_cookie_expiry(string $name): ?int
{
    $key = $name . '_expires';
    if (! empty($_COOKIE[$key]) && is_numeric($_COOKIE[$key])) {
        return (int) $_COOKIE[$key];
    }
    return null;
}

function format_remaining_time(?int $expires_ts): string
{
    if ($expires_ts === null) {
        return 'Desconocido';
    }
    $diff = $expires_ts - time();
    if ($diff <= 0) {
        return 'Expirada (próxima carga la cookie desaparecerá)';
    }
    $dias = intdiv($diff, 86400);
    $horas = intdiv($diff % 86400, 3600);
    $minutos = intdiv($diff % 3600, 60);
    return "{$dias} días, {$horas} horas, {$minutos} minutos";
}

function get_cart_items(): array
{
    if (empty($_COOKIE['cart'])) {
        return [];
    }
    $data = json_decode($_COOKIE['cart'], true);
    if (!is_array($data)) {
        return [];
    }
    return $data;
}

function save_cart_items(array $items, int $days = 30): void
{
    // normalize items (ensure name and price)
    $normalized = [];
    foreach ($items as $it) {
        $name = isset($it['name']) ? (string) $it['name'] : '';
        $price = isset($it['price']) ? (float) $it['price'] : 0.0;
        $normalized[] = ['name' => $name, 'price' => $price];
    }
    create_cookie('cart', json_encode($normalized), $days);
}

function clear_cart(): void
{
    delete_cookie('cart');
}

function remove_cart_item_by_index(int $index): void
{
    $items = get_cart_items();
    if (isset($items[$index])) {
        array_splice($items, $index, 1);
        if (empty($items)) {
            clear_cart();
        } else {
            save_cart_items($items);
        }
    }
}

function parse_csv_products(string $text): array
{
    $lines = preg_split('/\r\n|\r|\n/', trim($text));
    $out = [];
    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '') {
            continue;
        }
        // split by comma and trim parts
        $parts = array_map('trim', explode(',', $line, 2));
        $name = $parts[0] ?? '';
        $price = isset($parts[1]) ? (float) str_replace(',', '.', $parts[1]) : 0.0;
        if ($name !== '') {
            $out[] = ['name' => $name, 'price' => $price];
        }
    }
    return $out;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        // build base URL (without query string) for redirect
        $base = strtok($_SERVER['REQUEST_URI'], '?');

        if ($_POST['action'] === 'crear_cookie') {
            // Use user-provided value/duration if present, otherwise defaults
            $valor =
                isset($_POST['cookie_value']) && $_POST['cookie_value'] !== ''
                    ? (string) $_POST['cookie_value']
                    : 'alumno123';
            $dias = isset($_POST['cookie_days']) ? (int) $_POST['cookie_days'] : 7;

            create_cookie('usuario', $valor, $dias);

            // Redirect with status to avoid resubmission and to show transient message
            header('Location: ' . $base . '?status=created');
            exit();
        }

        if ($_POST['action'] === 'eliminar_cookie') {
            delete_cookie('usuario');
            header('Location: ' . $base . '?status=deleted');
            exit();
        }

        // --- NUEVO: manejo de cookie de idioma aquí mismo ---
        if ($_POST['action'] === 'crear_idioma') {
            $idioma = isset($_POST['idioma']) && $_POST['idioma'] !== '' ? (string) $_POST['idioma'] : 'es';
            $dias =
                isset($_POST['idioma_days']) && is_numeric($_POST['idioma_days']) ? (int) $_POST['idioma_days'] : 365;

            create_cookie('idioma', $idioma, $dias);

            header('Location: ' . $base . '?lang_status=created');
            exit();
        }

        if ($_POST['action'] === 'eliminar_idioma') {
            delete_cookie('idioma');
            header('Location: ' . $base . '?lang_status=deleted');
            exit();
        }

        // --- CART helpers + POST handling extension (added) ---
        // Add multiple products via CSV textarea
        if ($_POST['action'] === 'add_products' && !empty($_POST['csv_products'])) {
            $parsed = parse_csv_products((string) $_POST['csv_products']);
            $existing = get_cart_items();
            $merged = array_merge($existing, $parsed);
            save_cart_items($merged);
            header('Location: ' . $base . '?cart_status=added');
            exit();
        }

        // Add single product (name + price)
        if ($_POST['action'] === 'add_single') {
            $name = isset($_POST['product_name']) ? trim((string) $_POST['product_name']) : '';
            $price = isset($_POST['product_price']) ? (float) str_replace(',', '.', $_POST['product_price']) : 0.0;
            if ($name !== '') {
                $existing = get_cart_items();
                $existing[] = ['name' => $name, 'price' => $price];
                save_cart_items($existing);
                header('Location: ' . $base . '?cart_status=added');
                exit();
            } else {
                header('Location: ' . $base . '?cart_status=invalid');
                exit();
            }
        }

        // Remove item by index
        if ($_POST['action'] === 'remove_item' && isset($_POST['index'])) {
            $idx = (int) $_POST['index'];
            remove_cart_item_by_index($idx);
            header('Location: ' . $base . '?cart_status=removed');
            exit();
        }

        // Clear cart
        if ($_POST['action'] === 'clear_cart') {
            clear_cart();
            header('Location: ' . $base . '?cart_status=cleared');
            exit();
        }
    }
}

global $VIEW_DIR;
include $VIEW_DIR . '/partials/__header.php';
?>

<div class="mb-20 w-full">
    <div class="hero">
        <h1>Cookies en PHP</h1>
    </div>
    <main>
        <div class="mx-auto mt-12 grid max-w-6xl grid-cols-2 gap-16">
            <div class="card">
                <div class="text-title mb-4 text-center text-3xl font-semibold">
                    <h2>Cookie basica</h2>
                </div>
                <div>
                    <?php if (!empty($_GET['status']) && $_GET['status'] === 'created'): ?>

                    <div class="mb-4 rounded-lg border-2 border-dashed border-accent/30 bg-accent/10 p-3 text-center">
                        Cookie creada correctamente.
                    </div>

                    <?php elseif (!empty($_GET['status']) && $_GET['status'] === 'deleted'): ?>

                    <div class="mb-4 rounded-lg border-2 border-dashed border-accent/30 bg-accent/10 p-3 text-center">
                        Cookie eliminada.
                    </div>

                    <?php endif; ?>

                    <?php if (!empty($_COOKIE['usuario'])):
                            // Reutilizar helper para obtener expiración y formatear tiempo restante
                            $valor = htmlspecialchars($_COOKIE['usuario']);
                            $expires_ts = get_cookie_expiry('usuario');
                            $tiempo_restante = format_remaining_time($expires_ts);
                        ?>

                    <div class="mb-4">
                        <p class="text-lg">
                            <strong>Valor:</strong>

                            <?php echo $valor; ?>
                        </p>
                        <p class="text-sm text-secondary">
                            <strong>Expira en:</strong>

                            <?php echo htmlspecialchars($tiempo_restante); ?>
                        </p>
                    </div>

                    <form method="POST" action="">
                        <input type="hidden" name="action" value="eliminar_cookie" />
                        <button type="submit" class="btn-form">Eliminar cookie</button>
                    </form>

                    <?php else: ?>

                    <!-- Cookie no está definida: mostrar formulario para crearla -->
                    <p class="mb-4 text-secondary">
                        La cookie
                        <code>usuario</code>
                        no está definida. Puedes crearla con el valor que quieras:
                    </p>
                    <form method="POST" action="" class="space-y-4">
                        <input type="hidden" name="action" value="crear_cookie" />
                        <div>
                            <label class="form-label" for="cookie_value">Valor de la cookie:</label>
                            <input
                                id="cookie_value"
                                name="cookie_value"
                                type="text"
                                class="form-input"
                                placeholder="alumno123"
                            />
                        </div>
                        <div>
                            <label class="form-label" for="cookie_days">Días hasta expirar:</label>
                            <input
                                id="cookie_days"
                                name="cookie_days"
                                type="number"
                                min="1"
                                class="form-input"
                                value="7"
                            />
                        </div>
                        <div>
                            <button type="submit" class="btn-form">Crear cookie</button>
                        </div>
                    </form>

                    <?php endif; ?>
                </div>
            </div>
            <div class="card">
                <div class="text-title mb-4 text-center text-3xl font-semibold">
                    <h2>Cookie de idioma</h2>
                </div>
                <div>
                    <?php if (!empty($_GET['lang_status']) && $_GET['lang_status'] === 'created'): ?>

                    <div class="mb-4 rounded-lg border-2 border-dashed border-accent/30 bg-accent/10 p-3 text-center">
                        Cookie creada correctamente.
                    </div>

                    <?php elseif (!empty($_GET['lang_status']) && $_GET['lang_status'] === 'deleted'): ?>

                    <div class="mb-4 rounded-lg border-2 border-dashed border-accent/30 bg-accent/10 p-3 text-center">
                        Cookie de idioma eliminada correctamente
                    </div>

                    <?php endif; ?>

                    <?php if (!empty($_COOKIE['idioma'])):
                        // Reutilizar helpers para idioma
                        $idioma = htmlspecialchars($_COOKIE['idioma']);
                        $expires_ts = get_cookie_expiry('idioma');
                        $tiempo_restante = format_remaining_time($expires_ts);
                    ?>

                    <div class="mb-4">
                        <p class="text-lg">
                            <strong>Idioma seleccionado:</strong>

                            <?php echo $idioma; ?>
                        </p>
                        <p class="text-sm text-secondary">
                            <strong>Expira en:</strong>

                            <?php echo htmlspecialchars($tiempo_restante); ?>
                        </p>
                    </div>

                    <form method="POST" action="">
                        <input type="hidden" name="action" value="eliminar_idioma" />
                        <button type="submit" class="btn-form">Eliminar cookie de idioma</button>
                    </form>

                    <?php else : ?>

                    <div>
                        <p class="mb-4 text-secondary">Selecciona tu idioma preferido:</p>
                        <form method="POST" action="" class="space-y-4">
                            <input type="hidden" name="action" value="crear_idioma" />
                            <div>
                                <label class="form-label" for="idioma_select">Idioma:</label>
                                <select id="idioma_select" name="idioma" class="form-input">
                                    <option value="es">Español</option>
                                    <option value="en">Inglés</option>
                                    <option value="fr">Francés</option>
                                    <option value="de">Alemán</option>
                                </select>
                            </div>
                            <div>
                                <label class="form-label" for="idioma_days">Días hasta expirar:</label>
                                <input
                                    id="idioma_days"
                                    name="idioma_days"
                                    type="number"
                                    min="1"
                                    class="form-input"
                                    value="365"
                                />
                            </div>
                            <div>
                                <button type="submit" class="btn-form">Guardar idioma</button>
                            </div>
                        </form>
                    </div>

                    <?php endif; ?>
                </div>
            </div>

            <!-- Carrito de la compra. -->
            <div class="card col-span-2">
                <div class="text-title mb-4 text-center text-3xl font-semibold">
                    <h2>Carrito de la compra (usando cookies)</h2>
                </div>

                <?php if (!empty($_GET['cart_status'])): ?>
                <div class="mb-4 rounded-lg border-2 border-dashed border-accent/30 bg-accent/10 p-3 text-center">
                    <?php if ($_GET['cart_status'] === 'added'): ?>
                        Productos añadidos al carrito.
                    <?php elseif ($_GET['cart_status'] === 'removed'): ?>
                        Producto eliminado.
                    <?php elseif ($_GET['cart_status'] === 'cleared'): ?>
                        Carrito vaciado.
                    <?php elseif ($_GET['cart_status'] === 'invalid'): ?>
                        Nombre de producto inválido.
                    <?php endif; ?>
                </div>
                <?php endif; ?>

                <div class="grid grid-cols-2 gap-20">
                    <div>
                        <?php
                        $items = get_cart_items();
                        if (empty($items)):
                        ?>
                            <p class="text-secondary">El carrito está vacío.</p>
                        <?php else: ?>
                            <table class="w-full border-collapse">
                                <thead>
                                    <tr class="text-left">
                                        <th class="pb-2">#</th>
                                        <th class="pb-2">Producto</th>
                                        <th class="pb-2">Precio</th>
                                        <th class="pb-2">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($items as $i => $it): ?>
                                        <tr>
                                            <td class="py-2 align-top"><?php echo $i + 1; ?></td>
                                            <td class="py-2 align-top"><?php echo htmlspecialchars($it['name']); ?></td>
                                            <td class="py-2 align-top"><?php echo number_format((float)$it['price'], 2, ',', '.'); ?> €</td>
                                            <td class="py-2 align-top">
                                                <form method="POST" action="" style="display:inline">
                                                    <input type="hidden" name="action" value="remove_item" />
                                                    <input type="hidden" name="index" value="<?php echo $i; ?>" />
                                                    <button type="submit" class="btn-form">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <?php
                                // totals: subtotal, IVA 21%, total
                                $subtotal = 0.0;
                                foreach ($items as $it) {
                                    $subtotal += (float) $it['price'];
                                }
                                $iva_rate = 0.21;
                                $iva = $subtotal * $iva_rate;
                                $total = $subtotal + $iva;
                            ?>
                            <div class="mt-4">
                                <p><strong>Subtotal:</strong> <?php echo number_format($subtotal, 2, ',', '.'); ?> €</p>
                                <p><strong>IVA (21%):</strong> <?php echo number_format($iva, 2, ',', '.'); ?> €</p>
                                <p class="text-lg"><strong>Total:</strong> <?php echo number_format($total, 2, ',', '.'); ?> €</p>
                            </div>

                            <form method="POST" action="" class="mt-4">
                                <input type="hidden" name="action" value="clear_cart" />
                                <button type="submit" class="btn-form">Vaciar carrito</button>
                            </form>
                        <?php endif; ?>
                    </div>

                    <div>
                        <div class="mb-4">
                            <p class="text-secondary">Agregar producto individual:</p>
                            <form method="POST" action="" class="space-y-3">
                                <input type="hidden" name="action" value="add_single" />
                                <div>
                                    <label class="form-label" for="product_name">Nombre</label>
                                    <input id="product_name" name="product_name" type="text" class="form-input" />
                                </div>
                                <div>
                                    <label class="form-label" for="product_price">Precio (€)</label>
                                    <input id="product_price" name="product_price" type="number" step="0.01" min="0" class="form-input" />
                                </div>
                                <div>
                                    <button type="submit" class="btn-form">Añadir producto</button>
                                </div>
                            </form>
                        </div>

                        <div>
                            <p class="text-secondary mb-2">Agregar múltiples (una línea por producto):</p>
                            <p class="text-xs text-secondary mb-2">Formato por línea: nombre,precio — ejemplo: Camiseta,19.99</p>
                            <form method="POST" action="">
                                <input type="hidden" name="action" value="add_products" />
                                <div>
                                    <textarea name="csv_products" rows="6" class="form-input" placeholder="Camiseta,19.99&#10;Pantalón,39.50"></textarea>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn-form">Añadir productos</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<?php
include $VIEW_DIR . '/partials/__footer.php';
?>
