<?php
$title = $title ?? 'Tal';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($title) ?></title>
    <link rel="stylesheet" href="/assets/css/output.css">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</head>
<body>
<header>
    <nav class="nav-container border-b">
        <div class="max-w-screen-xl flex items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center space-x-3">
                <img src="/assets/images/cat.jpg" class="h-8 rounded-full" alt="Piioni Logo"/>
                <span class="text-2xl font-semibold text-primary">Daw 25/26</span>
            </a>
            <div class="hidden md:flex items-center space-x-8" id="navbar-default">
                <ul class="flex space-x-8">
                    <li>
                        <a href="/"
                           class="nav-link <?php echo isCurrentUrl('/') ? 'active' : ''; ?> ">Home</a>
                    </li>
                    <li>
                        <a href="/cliente"
                           class="nav-link <?php echo isCurrentUrl('/cliente') ? 'active' : ''; ?>">Cliente</a>
                    </li>
                    <li>
                        <a href="/servidor"
                           class="nav-link <?php echo isCurrentUrl('/servidor') ? 'active' : ''; ?>">Servidor</a>
                    </li>
                    <li>
                        <a href="/diseno"
                           class="nav-link <?php echo isCurrentUrl('/diseno') ? 'active' : ''; ?>">Diseno</a>
                    </li>
                </ul>
                <div>
                    <button id="theme-toggle" type="button"
                            class="rounded-lg text-sm p-2.5 transition-colors focus:outline-none focus:ring-4 focus:ring-slate-600 hover:dark:bg-slate-700 text-slate-500 hover:text-slate-900 hover:bg-slate-100 dark:text-slate-400 dark:hover:text-slate-100"
                            aria-label="Toggle dark mode">
                        <!-- Sol (Light mode) -->
                        <svg id="theme-toggle-light-icon" class="w-5 h-5 hidden transition-colors" stroke="currentColor"
                             stroke-width="2"
                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"></path>
                        </svg>
                        <!-- Luna (Dark mode) -->
                        <svg id="theme-toggle-dark-icon" class="w-5 h-5 transition-colors" stroke="currentColor"
                             stroke-width="2"
                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const themeToggleBtn = document.getElementById('theme-toggle');
        const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Verificar preferencia guardada o del sistema
        const savedTheme = localStorage.getItem('theme');
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const isDark = savedTheme ? savedTheme === 'dark' : prefersDark;

        // Aplicar tema inicial
        if (isDark) {
            document.documentElement.classList.add('dark');
            themeToggleLightIcon.classList.remove('hidden');
            themeToggleDarkIcon.classList.add('hidden');
        } else {
            document.documentElement.classList.remove('dark');
            themeToggleDarkIcon.classList.remove('hidden');
            themeToggleLightIcon.classList.add('hidden');
        }

        // Manejar click del botón
        themeToggleBtn.addEventListener('click', function () {
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        });
    });
</script>
