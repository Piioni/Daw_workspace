<?php require VIEW_DIR . '/partials/__header.php'; ?>

<main class="flex-grow p-8">
  <div class="mx-auto max-w-7xl">
    <!-- Header -->
    <div class="mb-8">
      <h1 class="text-4xl font-bold text-heading mb-2">Panel de Administración</h1>
      <p class="text-secondary">Gestiona usuarios y contenido del sistema</p>
    </div>

    <!-- Estadísticas -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
      <div class="card bg-secondary dark:bg-secondary-dark">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-secondary text-sm">Total de Usuarios</p>
            <p class="text-3xl font-bold text-heading"><?= $totalUsers ?></p>
          </div>
          <div class="text-4xl text-primary/30">👥</div>
        </div>
      </div>

      <div class="card bg-secondary dark:bg-secondary-dark">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-secondary text-sm">Administradores</p>
            <p class="text-3xl font-bold text-heading"><?= $adminCount ?></p>
          </div>
          <div class="text-4xl text-blue-500/30">⚙️</div>
        </div>
      </div>

      <div class="card bg-secondary dark:bg-secondary-dark">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-secondary text-sm">Moderadores</p>
            <p class="text-3xl font-bold text-heading"><?= $moderatorCount ?></p>
          </div>
          <div class="text-4xl text-purple-500/30">🛡️</div>
        </div>
      </div>

      <div class="card bg-secondary dark:bg-secondary-dark">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-secondary text-sm">Usuarios</p>
            <p class="text-3xl font-bold text-heading"><?= $userCount ?></p>
          </div>
          <div class="text-4xl text-green-500/30">👤</div>
        </div>
      </div>
    </div>

    <!-- Tabla de Usuarios -->
    <div class="card bg-secondary dark:bg-secondary-dark">
      <h2 class="text-2xl font-bold text-heading mb-6">Listado de Usuarios</h2>

      <div class="overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="border-b border-border dark:border-border-dark">
              <th class="text-left py-4 px-4 font-semibold text-heading">ID</th>
              <th class="text-left py-4 px-4 font-semibold text-heading">Nombre</th>
              <th class="text-left py-4 px-4 font-semibold text-heading">Email</th>
              <th class="text-left py-4 px-4 font-semibold text-heading">Rol</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $user): ?>
              <?php
                $rolNames = [
                  1 => 'Administrador',
                  2 => 'Usuario',
                  3 => 'Moderador'
                ];
                $rolColors = [
                  1 => 'bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300',
                  2 => 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300',
                  3 => 'bg-purple-100 text-purple-800 dark:bg-purple-900/30 dark:text-purple-300'
                ];
              ?>
              <tr class="border-b border-border dark:border-border-dark hover:bg-primary/5 dark:hover:bg-primary/10">
                <td class="py-4 px-4 text-secondary"><?= htmlspecialchars($user->id) ?></td>
                <td class="py-4 px-4 text-heading font-medium"><?= htmlspecialchars($user->nombre) ?></td>
                <td class="py-4 px-4 text-secondary"><?= htmlspecialchars($user->email) ?></td>
                <td class="py-4 px-4">
                  <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold <?= $rolColors[$user->rol] ?>">
                    <?= htmlspecialchars($rolNames[$user->rol]) ?>
                  </span>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>

<?php require VIEW_DIR . '/partials/__footer.php'; ?>

