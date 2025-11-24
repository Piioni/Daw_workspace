<?php
$title = 'Homepage - Proyecto TAL';
include VIEW_DIR . '/partials/__header.php';
?>

<div class="w-full px-4">
    <!-- Hero Section -->
    <div class="text-heading mt-10 flex flex-col items-center justify-center py-8 text-center">
        <h1 class="text-5xl md:text-6xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
            Proyecto TAL
        </h1>
        <div class="mt-4 text-xl md:text-2xl text-secondary max-w-3xl">
            <p>Sistema Híbrido MVC con PHP 8.4 - Desarrollo de Aplicaciones Web</p>
        </div>
    </div>

    <!-- Información del Estudiante -->
    <div class="max-w-7xl mx-auto mt-12">
        <div class="bg-secondary dark:bg-secondary-dark rounded-2xl shadow-lg border border-border dark:border-border-dark p-8">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <div>
                    <h2 class="text-3xl font-bold text-heading mb-2">Juan Rangel</h2>
                    <p class="text-secondary">Estudiante - Desarrollo de Aplicaciones Web</p>
                </div>
                <div class="flex gap-4">
                    <div class="bg-primary/10 dark:bg-primary/20 rounded-lg px-6 py-3 border border-border dark:border-border-dark">
                        <p class="text-sm text-secondary">Curso</p>
                        <p class="text-xl font-bold text-heading">2º DAW</p>
                    </div>
                    <div class="bg-primary/10 dark:bg-primary/20 rounded-lg px-6 py-3 border border-border dark:border-border-dark">
                        <p class="text-sm text-secondary">Año</p>
                        <p class="text-xl font-bold text-heading">2024-2025</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Info del Servidor -->
    <div class="max-w-7xl mx-auto mt-12 mb-16">
        <h2 class="text-3xl font-bold text-heading mb-6">Información del Servidor</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- PHP Version -->
            <div class="bg-secondary dark:bg-secondary-dark rounded-xl shadow-lg p-6 border border-border dark:border-border-dark hover:shadow-xl transition-shadow">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-purple-100 dark:bg-purple-900/30 rounded-lg p-3">
                        <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                        </svg>
                    </div>
                </div>
                <h3 class="text-heading text-lg font-semibold mb-2">PHP Version</h3>
                <p class="text-3xl font-bold text-purple-600 dark:text-purple-400"><?= phpversion() ?></p>
                <p class="text-secondary text-sm mt-2">Property Hooks ✨</p>
            </div>

            <!-- Sistema MVC -->
            <div class="bg-secondary dark:bg-secondary-dark rounded-xl shadow-lg p-6 border border-border dark:border-border-dark hover:shadow-xl transition-shadow">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-blue-100 dark:bg-blue-900/30 rounded-lg p-3">
                        <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                </div>
                <h3 class="text-heading text-lg font-semibold mb-2">Arquitectura</h3>
                <p class="text-3xl font-bold text-blue-600 dark:text-blue-400">MVC Híbrido</p>
                <p class="text-secondary text-sm mt-2">Vistas + Controladores</p>
            </div>

            <!-- Base de Datos -->
            <div class="bg-secondary dark:bg-secondary-dark rounded-xl shadow-lg p-6 border border-border dark:border-border-dark hover:shadow-xl transition-shadow">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-green-100 dark:bg-green-900/30 rounded-lg p-3">
                        <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"></path>
                        </svg>
                    </div>
                </div>
                <h3 class="text-heading text-lg font-semibold mb-2">Base de Datos</h3>
                <p class="text-3xl font-bold text-green-600 dark:text-green-400">MySQL</p>
                <p class="text-secondary text-sm mt-2">PDO + Singleton</p>
            </div>

            <!-- Docker -->
            <div class="bg-secondary dark:bg-secondary-dark rounded-xl shadow-lg p-6 border border-border dark:border-border-dark hover:shadow-xl transition-shadow">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-cyan-100 dark:bg-cyan-900/30 rounded-lg p-3">
                        <svg class="w-8 h-8 text-cyan-600 dark:text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2"></path>
                        </svg>
                    </div>
                </div>
                <h3 class="text-heading text-lg font-semibold mb-2">Entorno</h3>
                <p class="text-3xl font-bold text-cyan-600 dark:text-cyan-400">Docker</p>
                <p class="text-secondary text-sm mt-2">Apache + PHP-FPM</p>
            </div>
        </div>


    </div>
</div>

<?php
include VIEW_DIR . '/partials/__footer.php';
?>
