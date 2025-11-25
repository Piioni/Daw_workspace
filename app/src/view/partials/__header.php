<?php
$title = $title ?? 'Tal';
$heading = $heading ?? 'Daw 25/26';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title><?= htmlspecialchars($title) ?></title>
    <link rel="icon" href="/assets/images/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="/assets/css/output.css"/>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</head>
<body class="flex min-h-screen flex-col">
<header>
    <nav class="nav-container border-b">
        <div class="mx-auto flex max-w-screen-xl items-center justify-between p-4">
            <a href="/" class="flex items-center space-x-3">
                <img src="/assets/images/cat.jpg" class="h-8 rounded-full" alt="Piioni Logo"/>
                <span class="text-title text-2xl font-semibold"><?= $heading; ?></span>
            </a>
            <div class="hidden items-center space-x-10 md:flex" id="navbar-default">
                <a href="/" class="nav-link <?= isCurrentUrl('/') ? 'active' : ''; ?>">Home</a>
                <ul class="flex space-x-4">
                    <li>
                        <a
                            href="/cliente"
                            class="nav-link <?= isCurrentUrl('/cliente') ? 'active' : ''; ?>"
                        >
                            Cliente
                        </a>
                    </li>
                    <li>
                        <a
                            href="/servidor"
                            class="nav-link <?= isCurrentUrl('/servidor') ? 'active' : ''; ?>"
                        >
                            Servidor
                        </a>
                    </li>
                    <li>
                        <a
                            href="/diseno"
                            class="nav-link <?= isCurrentUrl('/diseno') ? 'active' : ''; ?>"
                        >
                            Diseño
                        </a>
                    </li>
                    <li>
                        <a href="/anexos" class="nav-link <?= isCurrentUrl('/anexos') ? 'active' : '' ?>">
                            Anexos
                        </a>
                    </li>
                </ul>

                <!-- Auth Links -->
                <div class="flex items-center space-x-4">
                    <?php if (isAuthenticated()): ?>
                        <!-- Usuario autenticado -->
                        <div class="flex items-center space-x-4">
                            <a
                                href="/profile"
                                class="nav-link <?= isCurrentUrl('/profile') ? 'active' : '' ?>"
                            >
                                Perfil
                            </a>
                            <a
                                href="/logout"
                                class="rounded-lg border-2 border-rose-500 bg-rose-500 px-4 py-2 text-sm font-semibold text-white transition-colors hover:bg-rose-600 hover:border-rose-600 focus:ring-2 focus:ring-rose-400 focus:ring-offset-2 focus:outline-none dark:border-rose-600 dark:bg-rose-600 dark:hover:bg-rose-700 dark:hover:border-rose-700"
                            >
                                Cerrar Sesión
                            </a>
                        </div>
                    <?php else: ?>
                        <!-- Usuario no autenticado -->
                        <a
                            href="/login"
                            class="nav-link <?= isCurrentUrl('/login') ? 'active' : '' ?>"
                        >
                            Iniciar Sesión
                        </a>
                        <a
                            href="/register"
                            class="rounded-lg bg-accent px-4 py-2 text-sm font-semibold text-white transition-colors hover:bg-hover hover:text-accent focus:ring-2 focus:ring-accent focus:ring-offset-2 focus:outline-none dark:bg-accent-dark dark:hover:bg-blue-600"
                        >
                            Registrarse
                        </a>
                    <?php endif; ?>

                    <!-- Theme Toggle -->
                    <button
                        id="theme-toggle"
                        type="button"
                        class="rounded-lg p-2.5 text-sm text-slate-500 transition-colors hover:bg-slate-100 hover:text-slate-900 focus:ring-4 focus:ring-slate-600 focus:outline-none dark:text-slate-400 hover:dark:bg-slate-700 dark:hover:text-slate-100"
                        aria-label="Toggle dark mode"
                    >
                        <!-- Sol (Light mode) -->
                        <svg
                            id="theme-toggle-light-icon"
                            class="hidden h-5 w-5 transition-colors"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                            ></path>
                        </svg>
                        <!-- Luna (Dark mode) -->
                        <svg
                            id="theme-toggle-dark-icon"
                            class="h-5 w-5 transition-colors"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"
                            ></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>
</header>

<script src="/assets/js/theme-toggler.js"></script>
</body>
</html>
