<?php
$title = 'Homepage - Proyecto TAL';

// Inicializar y incrementar contador de visitas
if (! isset($_SESSION['visit_count'])) {
  $_SESSION['visit_count'] = 1;
} else {
  $_SESSION['visit_count']++;
}

include VIEW_DIR . '/partials/__header.php';
?>

<div class="w-full px-4">
  <!-- Hero Section -->
  <div class="text-heading mt-10 flex flex-col items-center justify-center py-8 text-center">
    <h1
      class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-5xl font-bold text-transparent md:text-6xl"
    >
      Proyecto TAL
    </h1>
    <div class="mt-4 max-w-3xl text-xl text-secondary md:text-2xl">
      <p>Sistema Híbrido MVC con PHP 8.4 - Desarrollo de Aplicaciones Web</p>
    </div>
  </div>

  <!-- Información del Estudiante -->
  <div class="mx-auto mt-12 max-w-7xl">
    <div
      class="rounded-2xl border border-border bg-secondary p-8 shadow-lg dark:border-border-dark dark:bg-secondary-dark"
    >
      <div class="flex flex-wrap items-center justify-between gap-4">
        <div>
          <h2 class="text-heading mb-2 text-3xl font-bold">Juan Rangel</h2>
          <p class="text-secondary">Estudiante - Desarrollo de Aplicaciones Web</p>
        </div>
        <div class="flex gap-4">
          <div
            class="rounded-lg border border-border bg-primary/10 px-6 py-3 dark:border-border-dark dark:bg-primary/20"
          >
            <p class="text-sm text-secondary">Curso</p>
            <p class="text-heading text-xl font-bold">2º DAW</p>
          </div>
          <div
            class="rounded-lg border border-border bg-primary/10 px-6 py-3 dark:border-border-dark dark:bg-primary/20"
          >
            <p class="text-sm text-secondary">Año</p>
            <p class="text-heading text-xl font-bold">2024-2025</p>
          </div>
          <div
            class="rounded-lg border border-border bg-primary/10 px-6 py-3 dark:border-border-dark dark:bg-primary/20"
          >
            <p class="text-sm text-secondary">Visitas</p>
            <p class="text-heading text-xl font-bold"><?= $_SESSION['visit_count'] ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Info del Servidor -->
  <div class="mx-auto mt-12 mb-16 max-w-7xl">
    <h2 class="text-heading mb-6 text-3xl font-bold">Información del Servidor</h2>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
      <!-- PHP Version -->
      <div
        class="rounded-xl border border-border bg-secondary p-6 shadow-lg transition-shadow hover:shadow-xl dark:border-border-dark dark:bg-secondary-dark"
      >
        <div class="mb-4 flex items-center justify-between">
          <div class="rounded-lg bg-purple-100 p-3 dark:bg-purple-900/30">
            <svg
              class="h-8 w-8 text-purple-600 dark:text-purple-400"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"
              ></path>
            </svg>
          </div>
        </div>
        <h3 class="text-heading mb-2 text-lg font-semibold">PHP Version</h3>
        <p class="text-3xl font-bold text-purple-600 dark:text-purple-400"><?= phpversion() ?></p>
        <p class="mt-2 text-sm text-secondary">Property Hooks ✨</p>
      </div>

      <!-- Sistema MVC -->
      <div
        class="rounded-xl border border-border bg-secondary p-6 shadow-lg transition-shadow hover:shadow-xl dark:border-border-dark dark:bg-secondary-dark"
      >
        <div class="mb-4 flex items-center justify-between">
          <div class="rounded-lg bg-blue-100 p-3 dark:bg-blue-900/30">
            <svg class="h-8 w-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
              ></path>
            </svg>
          </div>
        </div>
        <h3 class="text-heading mb-2 text-lg font-semibold">Arquitectura</h3>
        <p class="text-3xl font-bold text-blue-600 dark:text-blue-400">MVC Híbrido</p>
        <p class="mt-2 text-sm text-secondary">Vistas + Controladores</p>
      </div>

      <!-- Base de Datos -->
      <div
        class="rounded-xl border border-border bg-secondary p-6 shadow-lg transition-shadow hover:shadow-xl dark:border-border-dark dark:bg-secondary-dark"
      >
        <div class="mb-4 flex items-center justify-between">
          <div class="rounded-lg bg-green-100 p-3 dark:bg-green-900/30">
            <svg
              class="h-8 w-8 text-green-600 dark:text-green-400"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"
              ></path>
            </svg>
          </div>
        </div>
        <h3 class="text-heading mb-2 text-lg font-semibold">Base de Datos</h3>
        <p class="text-3xl font-bold text-green-600 dark:text-green-400">MySQL</p>
        <p class="mt-2 text-sm text-secondary">PDO + Singleton</p>
      </div>

      <!-- Docker -->
      <div
        class="rounded-xl border border-border bg-secondary p-6 shadow-lg transition-shadow hover:shadow-xl dark:border-border-dark dark:bg-secondary-dark"
      >
        <div class="mb-4 flex items-center justify-between">
          <div class="rounded-lg bg-cyan-100 p-3 dark:bg-cyan-900/30">
            <svg class="h-8 w-8 text-cyan-600 dark:text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2"
              ></path>
            </svg>
          </div>
        </div>
        <h3 class="text-heading mb-2 text-lg font-semibold">Entorno</h3>
        <p class="text-3xl font-bold text-cyan-600 dark:text-cyan-400">Docker</p>
        <p class="mt-2 text-sm text-secondary">Apache + PHP-FPM</p>
      </div>
    </div>
  </div>
</div>

<?php
include VIEW_DIR . '/partials/__footer.php';
?>
