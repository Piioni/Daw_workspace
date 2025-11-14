<?php
$title = 'Formulario - Diseño';
require VIEW_DIR . '/partials/__header.php';
?>

<div class="mx-auto flex min-h-screen justify-center p-10">
    <div class="w-full max-w-2xl">
        <div
            class="rounded-lg border border-gray-200 bg-neutral-100 p-8 shadow-lg dark:border-gray-700 dark:bg-gray-800"
        >
            <h1 class="text-heading mb-10 p-4 text-center text-4xl font-semibold">Formulario de Registro</h1>
            <form method="GET" action="" class="space-y-6">
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <div class="space-y-2">
                        <label for="nombre" class="form-label">
                            Nombre
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="nombre" name="nombre" required maxlength="50" class="form-input" />
                    </div>

                    <div class="space-y-2">
                        <label for="apellidos" class="form-label">
                            Apellidos
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="apellidos" name="apellidos" required class="form-input" />
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="form-label">
                        Género
                        <span class="text-red-500">*</span>
                    </label>
                    <div class="flex space-x-8">
                        <div class="flex items-center">
                            <input type="radio" id="hombre" name="genero" value="hombre" required class="form-radio" />
                            <label for="hombre" class="text-md ml-2 font-medium text-gray-700 dark:text-gray-300">
                                Hombre
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="mujer" name="genero" value="mujer" required class="form-radio" />
                            <label for="mujer" class="text-md ml-2 font-medium text-gray-700 dark:text-gray-300">
                                Mujer
                            </label>
                        </div>
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="email" class="form-label">
                        Correo Electrónico
                        <span class="text-red-500">*</span>
                    </label>
                    <input type="email" id="email" name="email" required class="form-input" />
                </div>

                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <input
                            type="checkbox"
                            id="informacion"
                            name="informacion"
                            class="form-checkbox mt-0.5"
                            checked
                        />
                        <label
                            for="informacion"
                            class="text-sm leading-relaxed font-medium text-gray-700 dark:text-gray-300"
                        >
                            Deseo recibir información sobre novedades y ofertas
                        </label>
                    </div>

                    <div class="flex items-start space-x-3">
                        <input type="checkbox" id="terms" name="terms" required class="form-checkbox mt-0.5" />
                        <label for="terms" class="text-sm leading-relaxed font-medium text-gray-700 dark:text-gray-300">
                            Declaro haber leído y aceptar las condiciones generales del programa y la normativa sobre
                            protección de datos
                            <span class="text-red-500">*</span>
                        </label>
                    </div>
                </div>

                <div class="pt-6">
                    <button type="submit" class="btn-form">Enviar Formulario</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require VIEW_DIR . '/partials/__footer.php';
?>
