<?php require VIEW_DIR . '/partials/__header.php'; ?>

<div class="container mx-auto px-4 py-8">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">
                <?= htmlspecialchars($titulo ?? 'Lista de Productos') ?>
            </h1>
            <p class="text-gray-600 dark:text-gray-400">
                Total de productos: <span class="font-semibold"><?= $total ?? 0 ?></span>
            </p>
        </div>

        <!-- Lista de Productos -->
        <?php if (empty($productos)): ?>
            <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg p-6 text-center">
                <p class="text-yellow-800 dark:text-yellow-200 text-lg">
                    No hay productos disponibles en este momento.
                </p>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($productos as $producto): ?>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <!-- Placeholder para imagen -->
                        <div class="h-48 bg-gradient-to-br from-blue-100 to-blue-200 dark:from-blue-900 dark:to-blue-800 flex items-center justify-center">
                            <svg class="w-24 h-24 text-blue-400 dark:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>

                        <!-- Contenido del producto -->
                        <div class="p-6">
                            <!-- Nombre -->
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-2">
                                <?= htmlspecialchars($producto->getNombre()) ?>
                            </h3>

                            <!-- Descripción -->
                            <p class="text-gray-600 dark:text-gray-400 mb-4">
                                <?= htmlspecialchars($producto->getDescripcion()) ?>
                            </p>

                            <!-- Precio -->
                            <div class="pt-4 border-t border-gray-200 dark:border-gray-700">
                                <p class="text-3xl font-bold text-green-600 dark:text-green-400">
                                    $<?= number_format($producto->getPrecio(), 2) ?>
                                </p>
                            </div>

                            <!-- ID del producto (para referencia) -->
                            <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                                <p class="text-xs text-gray-500 dark:text-gray-500">
                                    ID: #<?= $producto->getId() ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Botón para volver -->
        <div class="mt-8 text-center">
            <a href="/servidor" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg transition-colors duration-300">
                ← Volver al Servidor
            </a>
        </div>
    </div>
</div>

<?php require VIEW_DIR . '/partials/__footer.php'; ?>
