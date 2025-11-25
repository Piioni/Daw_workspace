<?php require VIEW_DIR . '/partials/__header.php'; ?>

<main class="flex-grow p-8">
    <div class="mx-auto max-w-md">
        <div class="card">
            <h1 class="text-heading mb-6 text-center text-3xl font-bold">Iniciar Sesión</h1>

            <?php if (isset($error)): ?>
                <div class="mb-4 rounded-lg border-2 border-red-400 bg-red-50 p-4 text-red-700 dark:border-red-600 dark:bg-red-900/30 dark:text-red-300">
                    <p class="text-sm font-medium"><?= htmlspecialchars($error) ?></p>
                </div>
            <?php endif; ?>

            <form action="/login" method="POST" class="space-y-6">
                <!-- Email -->
                <div>
                    <label for="email" class="form-label mb-2">
                        Email
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        required
                        class="form-input"
                        placeholder="tu@email.com"
                    />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="form-label mb-2">
                        Contraseña
                    </label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        class="form-input"
                        placeholder="••••••••"
                    />
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-form">
                    Iniciar Sesión
                </button>

                <!-- Register Link -->
                <p class="text-center text-sm text-secondary">
                    ¿No tienes cuenta?
                    <a href="/register" class="nav-internal-link font-semibold">
                        Regístrate aquí
                    </a>
                </p>
            </form>
        </div>
    </div>
</main>

<?php require VIEW_DIR . '/partials/__footer.php'; ?>

