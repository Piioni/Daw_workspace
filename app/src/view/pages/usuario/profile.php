<?php require VIEW_DIR . '/partials/__header.php'; ?>

<main class="flex-grow p-8">
    <div class="mx-auto max-w-2xl">
        <div class="card">
            <h1 class="text-heading mb-6 text-3xl font-bold">Mi Perfil</h1>

            <div class="space-y-6">
                <!-- Información del usuario -->
                <div class="innercard">
                    <h2 class="text-heading mb-4 text-xl font-semibold">Información Personal</h2>

                    <div class="space-y-4">
                        <div>
                            <label class="form-label mb-1 text-xs">
                                Nombre
                            </label>
                            <p class="text-title text-lg"><?= htmlspecialchars($user->nombre) ?></p>
                        </div>

                        <div>
                            <label class="form-label mb-1 text-xs">
                                Email
                            </label>
                            <p class="text-title text-lg"><?= htmlspecialchars($user->email) ?></p>
                        </div>

                        <div>
                            <label class="form-label mb-1 text-xs">
                                Rol
                            </label>
                            <p class="text-title text-lg">
                                <?php
                                $roles = [
                                    1 => 'Administrador',
                                    2 => 'Usuario',
                                    3 => 'Moderador'
                                ];
                                echo $roles[$user->rol] ?? 'Desconocido';
                                ?>
                            </p>
                        </div>

                        <div>
                            <label class="form-label mb-1 text-xs">
                                ID de Usuario
                            </label>
                            <p class="text-secondary text-lg">#<?= $user->id ?></p>
                        </div>
                    </div>
                </div>

                <!-- Acciones -->
                <div class="flex gap-4">
                    <a
                        href="/"
                        class="inline-flex flex-1 items-center justify-center rounded-lg border-2 border-border px-5 py-2.5 text-center text-sm font-semibold text-text-primary transition-colors hover:bg-hover focus:ring-2 focus:ring-accent focus:ring-offset-2 focus:outline-none dark:border-border-dark dark:text-text-primary-dark dark:hover:bg-hover-dark"
                    >
                        Volver al Inicio
                    </a>
                    <a
                        href="/logout"
                        class="inline-flex flex-1 items-center justify-center rounded-lg bg-rose-500 px-5 py-2.5 text-center text-sm font-semibold text-white transition-colors hover:bg-rose-600 focus:ring-2 focus:ring-rose-400 focus:ring-offset-2 focus:outline-none dark:bg-rose-600 dark:hover:bg-rose-700"
                    >
                        Cerrar Sesión
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require VIEW_DIR . '/partials/__footer.php'; ?>

