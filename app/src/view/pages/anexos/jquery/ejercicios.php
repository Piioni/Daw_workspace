<?php
global $VIEW_DIR;
include $VIEW_DIR . '/partials/__header.php';
?>

<div class="mb-20 w-full">
    <div class="hero">Primeros ejericios de Jquery</div>
    <main>
        <div class="grid grid-cols-1 gap-6">
            <div class="card text-center">
                <div class="text-heading mb-12 text-2xl font-semibold">
                    <h2 class="mb-4">Boton de la destruccion</h2>
                    <button id="eliminar" class="btn-form w-md">Tocame</button>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="innercard">
                        <h2 class="text-heading mb-4 text-2xl font-semibold">Primer parrafo</h2>
                        <p class="text-heading flex items-center justify-center">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid commodi est impedit,
                            laboriosam suscipit totam ullam vero. Ad commodi deleniti dicta necessitatibus obcaecati
                            odit praesentium quis, temporibus voluptas voluptatem.
                        </p>
                        <span class="hidden">Se ha ocultado!!</span>
                    </div>
                    <div class="innercard">
                        <h2 class="text-heading mb-4 text-2xl font-semibold">Segndo parrafo</h2>
                        <p class="text-heading flex items-center justify-center">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aliquid commodi est impedit,
                            laboriosam suscipit totam ullam vero. Ad commodi deleniti dicta necessitatibus obcaecati
                            odit praesentium quis, temporibus voluptas voluptatem.
                        </p>
                        <span class="hidden">Se ha ocultado!!</span>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-6">
                <div class="card text-center justify-start">
                    <div class="text-heading mb-4 text-2xl font-semibold">
                        <h2 id="texto_imagen">¿Habra aquí una imagen?</h2>
                    </div>
                    <div>
                        <img
                            id="imagen_gato"
                            src="/assets/images/cat.jpg"
                            alt="Logo"
                            class="mx-auto hidden h-32 w-32"
                        />
                    </div>
                </div>
                <div>
                    <div id="div_color" class="card text-center">
                        <div class="text-heading mb-4 text-2xl font-semibold">
                            <h2>Colores colores...</h2>
                        </div>
                        <div class="flex items-center justify-center">
                            <button id="cambio_color" class="btn-form w-md">Pulsame!</button>
                        </div>

                        <div class="text-heading mt-4 text-xl font-semibold">
                            <p>
                                Alertas alertas!!
                            </p>
                        </div>
                        <div>
                            <button id="alerta" class="btn-form w-md">Mostrar Alerta
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card text-center" id="color_fondo" >
                <div class="text-heading mb-4 text-2xl font-semibold">
                    <h2> Boton coloridos</h2>
                </div>
                <div class="grid grid-cols-3 gap-6">
                    <div class="innercard">
                        <div class="text-heading mb-4 text-2xl font-semibold">
                            <h3>
                                Te gusta el color azul?
                            </h3>
                        </div>
                        <div id="azul" class="flex items-center justify-center btn-form bg-blue-500 text-white cursor-pointer">
                            Entonces pulsa aqui
                        </div>
                    </div>

                    <div class="innercard">
                        <div class="text-heading mb-4 text-2xl font-semibold">
                            <h3>
                                Te gusta el color rojo?
                            </h3>
                        </div>
                        <div id="rojo" class="flex items-center justify-center btn-form bg-red-500 text-white cursor-pointer">
                            Entonces pulsa aqui
                        </div>
                    </div>

                    <div class="innercard">
                        <div class="text-heading mb-4 text-2xl font-semibold">
                            <h3>
                                Te gusta el color verde?
                            </h3>
                        </div>
                        <div id="verde" class="flex items-center justify-center btn-form bg-green-500 text-white cursor-pointer">
                            Entonces pulsa aqui
                        </div>
                    </div>

            </div>
        </div>
    </main>
</div>

<script>
    $(document).ready(() => {
        $('#eliminar').click(() => {
            $('p').hide();
            $('span').show();
        });

        $('#texto_imagen').hover(
            () => {
                $('#imagen_gato').removeClass('hidden');
            },
            () => {
                $('#imagen_gato').addClass('hidden');
            },
        );

        $('#cambio_color').click(() => {
            const hex = '#' + Math.floor(Math.random() * 0xffffff).toString(16).padStart(6, '0');
            const $div = $('#div_color');
            $div.css('background-color', hex);
        });

        $('#azul').click(() => {
            const $div = $('#color_fondo');
            $div.removeClass((index, className) => {
                return (className.match(/bg-\S+/g) || []).join(' ');
            });
            $div.addClass('bg-blue-500');
        });

        $('#rojo').click(() => {
            const $div = $('#color_fondo');
            $div.removeClass((index, className) => {
                return (className.match(/bg-\S+/g) || []).join(' ');
            });
            $div.addClass('bg-red-500');
        });

        $('#verde').click(() => {
            const $div = $('#color_fondo');
            $div.removeClass((index, className) => {
                return (className.match(/bg-\S+/g) || []).join(' ');
            });
            $div.addClass('bg-green-500');
        });

        $('#alerta').click(() => {
            alert('¡Esta es una alerta de jQuery!');
        });
    });
</script>

<?php
include $VIEW_DIR . '/partials/__footer.php';
?>
