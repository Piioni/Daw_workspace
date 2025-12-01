<?php require VIEW_DIR . '/partials/__header.php'; ?>

<main class="flex-grow p-8">
  <div class="mx-auto max-w-md">
    <div class="card">
      <h1 class="text-heading mb-6 text-center text-3xl font-bold">Crear Cuenta</h1>

      <?php if (isset($error)): ?>

      <div
        class="mb-4 rounded-lg border-2 border-red-400 bg-red-50 p-4 text-red-700 dark:border-red-600 dark:bg-red-900/30 dark:text-red-300"
      >
        <p class="text-sm font-medium"><?= htmlspecialchars($error) ?></p>
      </div>

      <?php endif; ?>

      <?php if (isset($success)): ?>

      <div
        class="mb-4 rounded-lg border-2 border-green-400 bg-green-50 p-4 text-green-700 dark:border-green-600 dark:bg-green-900/30 dark:text-green-300"
      >
        <p class="text-sm font-medium"><?= htmlspecialchars($success) ?></p>
      </div>

      <?php endif; ?>

      <form action="/register" method="POST" class="space-y-6">
        <!-- Nombre -->
        <div>
          <label for="nombre" class="form-label mb-2">Nombre Completo</label>
          <input type="text" id="nombre" name="nombre" required class="form-input" placeholder="Juan Pérez" />
        </div>

        <!-- Email -->
        <div>
          <label for="email" class="form-label mb-2">Email</label>
          <input type="email" id="email" name="email" required class="form-input" placeholder="tu@email.com" />
        </div>

        <!-- Password -->
        <div>
          <label for="password" class="form-label mb-2">Contraseña</label>
          <input
            type="password"
            id="password"
            name="password"
            required
            minlength="6"
            class="form-input"
            placeholder="••••••••"
          />
          <p class="mt-1 text-xs text-secondary">Mínimo 6 caracteres</p>
        </div>

        <!-- Confirm Password -->
        <div>
          <label for="confirm_password" class="form-label mb-2">Confirmar Contraseña</label>
          <input
            type="password"
            id="confirm_password"
            name="confirm_password"
            required
            minlength="6"
            class="form-input"
            placeholder="••••••••"
          />
        </div>

        <!-- Rol -->
        <div>
          <label for="rol" class="form-label mb-2">Rol</label>
          <select id="rol" name="rol" required class="form-input">
            <option value="">Selecciona un rol</option>
            <option value="1">Administrador</option>
            <option value="2">Usuario</option>
            <option value="3">Moderador</option>
          </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn-form">Crear Cuenta</button>

        <!-- Login Link -->
        <p class="text-center text-sm text-secondary">
          ¿Ya tienes cuenta?
          <a href="/login" class="nav-internal-link font-semibold">Inicia sesión aquí</a>
        </p>
      </form>
    </div>
  </div>
</main>

<?php require VIEW_DIR . '/partials/__footer.php'; ?>
