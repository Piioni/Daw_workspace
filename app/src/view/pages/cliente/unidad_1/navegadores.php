<?php
$title = 'Navegadores Web';
global $VIEW_DIR;
include $VIEW_DIR . '/partials/__header.php';
?>

<div class="mb-15 w-full">
    <div class="text-heading mt-10 flex flex-col py-2 text-4xl font-semibold">
        <div class="text-title text-center">
            <h1>Navegadores Web</h1>
        </div>
    </div>
    <main class="mx-8 mt-12 flex flex-col gap-2">
        <div
            class="space-y-10 rounded-lg border border-border bg-secondary p-6 px-10 shadow-lg dark:border-border-dark dark:bg-secondary-dark"
        >
            <div>
                <p class="text-2xl">> Tabla comparativa entre varios navegadores:</p>
                <div class="mt-6 overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300 dark:border-gray-600">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-700">
                                <th class="border border-gray-300 p-3 text-left font-semibold dark:border-gray-600">
                                    Navegador
                                </th>
                                <th class="border border-gray-300 p-3 text-left font-semibold dark:border-gray-600">
                                    Rendimiento
                                </th>
                                <th class="border border-gray-300 p-3 text-left font-semibold dark:border-gray-600">
                                    Compatibilidad
                                </th>
                                <th class="border border-gray-300 p-3 text-left font-semibold dark:border-gray-600">
                                    Consumo de Recursos
                                </th>
                                <th class="border border-gray-300 p-3 text-left font-semibold dark:border-gray-600">
                                    Privacidad y seguridad
                                </th>
                                <th class="border border-gray-300 p-3 text-left font-semibold dark:border-gray-600">
                                    Extensiones y personalización
                                </th>
                                <th class="border border-gray-300 p-3 text-left font-semibold dark:border-gray-600">
                                    Ecosistema
                                </th>
                                <th class="border border-gray-300 p-3 text-left font-semibold dark:border-gray-600">
                                    Disponibilidad
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="border border-gray-300 p-3 font-medium dark:border-gray-600">
                                    Google Chrome
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">
                                    Muy rápido, pero suele ralentizarse si tiene muchas páginas abiertas
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">
                                    Es utilizable en casi cualquier dispositivo
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">
                                    Muy elevado, consume mucha mucha RAM
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">
                                    Bastante Mala privacidad, Al ser Google, Recoge muchos datos de usuario.
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">
                                    Considerablemente amplia, Chrome web store es donde se encuentran la mayor cantidad
                                    de extensiones, pero no muy personalizable
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">
                                    Integrado con servicios de Google, (Lo cual, a mi no me gusta nada, por las
                                    cuestiones de privacidad)
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">Multiplataforma</td>
                            </tr>
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="border border-gray-300 p-3 font-medium dark:border-gray-600">
                                    Mozilla Firefox
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">
                                    Rápido y eficiente, aunque no tanto como Chrome
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">
                                    Muy buena compatibilidad con la mayoría de dispositivos
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">
                                    Moderado, consume menos RAM que Chrome
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">
                                    Excelente privacidad, con muchas opciones para proteger los datos del usuario.
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">
                                    Es más personalizable que chrome, pero su mercado de extensiones es menor.
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">
                                    No tan integrado como Chrome, pero tiene buenas opciones de sincronización.
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">Multiplataforma</td>
                            </tr>
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="border border-gray-300 p-3 font-medium dark:border-gray-600">
                                    Microsoft Edge
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">
                                    Tiene el mismo motor que Chrome entonces es muy similar
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">
                                    Muy buena compatibilidad con sistemas windows
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">
                                    Moderado, similar a Chrome pero con algunas optimizaciones
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">
                                    Cuestionable privacidad, al ser de microsoft, seguro que tiene un montón de
                                    backdoors y recolección de datos de usuario
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">
                                    Mismas extensiones que chrome, y un poco más personalizable
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">
                                    Integrado con servicios de Microsoft, lo cual no me gusta nada por las cuestiones de
                                    privacidad
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">
                                    Multiplataforma, pero optimizado para Windows
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="border border-gray-300 p-3 font-medium dark:border-gray-600">Safari</td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">
                                    Muy rápido en dispositivos Apple, pero no tanto en otros sistemas
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">
                                    Excelente en dispositivos Apple, pero limitada en otros sistemas
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">
                                    Bajo, optimizado para dispositivos Apple
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">
                                    Dudosa privacidad, al ser de apple seguro se llevarán a cabo grandes recolecciones
                                    de datos.
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">
                                    Limitada, con pocas opciones de personalización y un mercado de extensiones pequeño
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">
                                    Integrado con el ecosistema de Apple
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">
                                    Principalmente en dispositivos Apple
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="border border-gray-300 p-3 font-medium dark:border-gray-600">Opera</td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">
                                    Lo típico, usa el mismo engine que chrome
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">
                                    Buena compatibilidad con la mayoría de dispositivos, gracias al ser chromium
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">
                                    Moderado, mejor que Chrome pero no por mucho
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">
                                    Mejor que Chrome y Edge, pero no tan buena como Firefox
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">
                                    Amplia, las mismas extensiones que chrome y opciones de personalización
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">
                                    No tan integrado como otros navegadores, pero tiene algunas características únicas
                                </td>
                                <td class="border border-gray-300 p-3 text-sm dark:border-gray-600">Multiplataforma</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-6 rounded-lg bg-blue-50 p-4 dark:bg-blue-900/20">
                    <h3 class="text-heading mb-2 text-lg font-semibold">Reflexión</h3>
                    <p class="text-sm text-secondary">
                        A mi gusto y parecer, hay 2 navegadores los cuales considero los mejores, Si quieres tener la
                        mejor privacidad tienes que elegir un navegador que esté basado en el engine de firefox, Como el
                        propio firefox, o uno como ZEN. Como segunda opción, Brave, basado en chromium, me parece
                        bastante bueno, tiene buena privacidad, bloqueadores de fingerprints, Ublock integrado, y demás
                        cosas.
                    </p>
                </div>
            </div>

            <div>
                <p class="text-2xl">> Elección de Navegador para Desarrollo Web:</p>

                <div class="mt-6 space-y-6">
                    <div class="rounded-lg bg-gray-50 p-4 dark:bg-gray-700">
                        <h3 class="text-heading mb-2 text-lg font-semibold">
                            Si eres un desarrollador web que quiere verificar la compatibilidad crossbrowser de su sitio
                            web, ¿qué navegadores utilizarías y por qué?
                        </h3>
                        <p class="text-sm text-secondary">
                            Si quieres verificar la cross browser compatibility, yo utilizaría primeramente Chrome, el
                            navegador más extendido y utilizado, Seguido de Firefox, por sus buenas normativas y su buen
                            motor de renderizado. Y por último Edge y Safari, para verificar que todo funciona
                            correctamente en sus ecosistemas.
                        </p>
                    </div>

                    <div class="rounded-lg bg-gray-50 p-4 dark:bg-gray-700">
                        <h3 class="text-heading mb-2 text-lg font-semibold">
                            Si desarrollas aplicaciones web móviles, ¿qué navegador elegirías para emular diferentes
                            dispositivos y resoluciones?
                        </h3>
                        <p class="text-sm text-secondary">
                            Si necesito elegir un navegador con buenas herramientas de desarrollo, la cual me permitan
                            desarrollar aplicaciones para dispositivos móviles, y que tenga buenas herramientas de
                            depuración, seguramente elegiría Brave, ya que es un navegador basado en chromium, y tiene
                            las mismas herramientas de desarrollo que Chrome, pero con mejor privacidad.
                        </p>
                    </div>

                    <div class="rounded-lg bg-gray-50 p-4 dark:bg-gray-700">
                        <h3 class="text-heading mb-2 text-lg font-semibold">
                            ¿Qué navegador tiene las mejores herramientas para analizar el rendimiento de una página web
                            y optimizar su tiempo de carga?
                        </h3>
                        <p class="text-sm text-secondary">
                            Chrome DevTools son las más completas. La integración con Lighthouse proporciona auditorías
                            automáticas de rendimiento, accesibilidad y SEO, junto con herramientas avanzadas de
                            profiling y análisis de tiempo de carga que son referencia en la industria.
                        </p>
                    </div>
                </div>
            </div>

            <div>
                <p class="text-2xl">> Privacidad y seguridad:</p>
                <div class="mt-6 space-y-6">
                    <div class="rounded-lg bg-gray-50 p-4 dark:bg-gray-700">
                        <h3 class="text-heading mb-2 text-lg font-semibold">
                            Si tu prioridad es proteger tu privacidad y evitar que los sitios web te rastreen, ¿qué
                            navegador elegirías y por qué?
                        </h3>
                        <p class="text-sm text-secondary">
                            Elegiría Brave o Firefox. Brave bloquea todo por defecto sin configuración y tiene enfoque
                            privacy-first. Firefox con su Enhanced Tracking Protection es excelente y viene de una
                            organización sin ánimo de lucro. Ambos son superiores a Chrome/Edge en privacidad.
                        </p>
                    </div>

                    <div class="rounded-lg bg-gray-50 p-4 dark:bg-gray-700">
                        <h3 class="text-heading mb-2 text-lg font-semibold">
                            ¿Cuál navegador ofrece el mejor equilibrio entre privacidad y facilidad de uso sin necesidad
                            de configurar opciones adicionales?
                        </h3>
                        <p class="text-sm text-secondary">
                            Firefox - ofrece buena protección por defecto sin configuración compleja. Su bloqueo de
                            rastreadores está activado desde la instalación y es más privado que Chrome/Edge/Safari sin
                            sacrificar usabilidad. Brave también es excelente pero puede ser demasiado agresivo para
                            algunos usuarios.
                        </p>
                    </div>

                    <div class="rounded-lg bg-gray-50 p-4 dark:bg-gray-700">
                        <h3 class="text-heading mb-2 text-lg font-semibold">
                            En términos de navegación segura para transacciones bancarias y compras en línea, ¿qué
                            navegador te brinda más confianza y por qué?
                        </h3>
                        <p class="text-sm text-secondary">
                            Chrome o Edge - ambos tienen actualizaciones de seguridad muy frecuentes y sandboxing
                            robusto. La integración de Edge con Windows Security y Chrome con Google Safe Browsing
                            proporcionan protección en tiempo real contra phishing y malware. Su enfoque en seguridad
                            más que en privacidad los hace ideales para banking.
                        </p>
                    </div>
                </div>
            </div>

            <div>
                <p class="text-2xl">> Elección de Navegador según el Ecosistema:</p>
                <div class="mt-6 space-y-6">
                    <div class="rounded-lg bg-gray-50 p-4 dark:bg-gray-700">
                        <h3 class="text-heading mb-2 text-lg font-semibold">
                            Si eres usuario de Apple y trabajas en su ecosistema (iPhone, iPad, MacBook), ¿qué ventajas
                            tiene usar Safari frente a otros navegadores?
                        </h3>
                        <p class="text-sm text-secondary">
                            La sincronización perfecta con iCloud es la mayor ventaja. El Handoff permite empezar a
                            navegar en el iPhone y continuar exactamente en el MacBook sin intervención. La optimización
                            de batería es superior en dispositivos Apple, y la integración con Keychain hace el manejo
                            de contraseñas mucho más fluido. Además, la protección Intelligent Tracking Prevention está
                            optimizada para el ecosistema.
                        </p>
                    </div>

                    <div class="rounded-lg bg-gray-50 p-4 dark:bg-gray-700">
                        <h3 class="text-heading mb-2 text-lg font-semibold">
                            Si tu trabajo diario se desarrolla principalmente en servicios de Microsoft (Office,
                            OneDrive, Teams), ¿por qué Microsoft Edge podría ser más adecuado para ti que Chrome o
                            Firefox?
                        </h3>
                        <p class="text-sm text-secondary">
                            Edge ofrece integración nativa con Office 365 - puedes editar documentos directamente online
                            sin descargarlos. Las Collections se sincronizan con OneNote y la integración con Microsoft
                            Account permite acceso rápido a todos los servicios. Para empresas, la gestión centralizada
                            con Microsoft Endpoint Manager y la integración con Azure Active Directory lo hacen ideal
                            para entornos corporativos Microsoft.
                        </p>
                    </div>

                    <div class="rounded-lg bg-gray-50 p-4 dark:bg-gray-700">
                        <h3 class="text-heading mb-2 text-lg font-semibold">
                            Si usas de manera intensiva los servicios de Google y necesitas sincronización en
                            dispositivos y almacenamiento en la nube, ¿por qué elegirías Google Chrome?
                        </h3>
                        <p class="text-sm text-secondary">
                            La sincronización automática con la cuenta Google es insuperable. Todos tus marcadores,
                            contraseñas, historial y pestañas abiertas están disponibles instantáneamente en cualquier
                            dispositivo. El acceso directo a Google Workspace (Gmail, Drive, Calendar) y la integración
                            con Google Smart Lock para contraseñas lo hacen la opción más coherente para quien vive en
                            el ecosistema Google.
                        </p>
                    </div>
                </div>
            </div>

            <div>
                <p class="text-2xl">> Navegación en Dispositivos Móviles:</p>
                <div class="mt-6 space-y-6">
                    <div class="rounded-lg bg-gray-50 p-4 dark:bg-gray-700">
                        <h3 class="text-heading mb-2 text-lg font-semibold">
                            ¿Qué navegador elegirías para usar en un dispositivo Android y por qué?
                        </h3>
                        <p class="text-sm text-secondary">
                            Brave o Firefox, ambos ofrecen un buen equilibrio entre privacidad y rendimiento. Brave
                            bloquea rastreadores y anuncios por defecto, mejorando la velocidad y la privacidad. Firefox
                            tiene un enfoque fuerte en privacidad y es altamente personalizable. Ambos son más privados
                            que Chrome, que es el navegador predeterminado en Android.
                        </p>
                    </div>

                    <div class="rounded-lg bg-gray-50 p-4 dark:bg-gray-700">
                        <h3 class="text-heading mb-2 text-lg font-semibold">
                            Si utilizas iPhone, ¿usarías Safari u otro navegador como Chrome o Firefox? ¿Por qué?
                        </h3>
                        <p class="text-sm text-secondary">
                            Safari es el mejor en términos de optimización, rendimiento y eficiencia, pero de nuevo, la
                            poca privacidad no me gusta, entonces, tengo 2 navegadores, safari y brave, y los utilizo
                            dependiendo de la situación
                        </p>
                    </div>

                    <div class="rounded-lg bg-gray-50 p-4 dark:bg-gray-700">
                        <h3 class="text-heading mb-2 text-lg font-semibold">
                            Para alguien que cambia constantemente entre dispositivos (como un teléfono Android, una
                            tableta y una PC), ¿qué navegador proporciona la mejor experiencia de sincronización?
                        </h3>
                        <p class="text-sm text-secondary">
                            Chrome es el mejor para multi-dispositivo. Su sincronización es la más robusta y rápida,
                            manteniendo pestañas abiertas, historial y contraseñas sincronizadas instantáneamente entre
                            Android, iOS y desktop. Microsoft Edge también es excelente si trabajas principalmente con
                            servicios Microsoft. La clave es mantener coherencia en el ecosistema principal que uses.
                            Pero honestamente, Brave también es una buena opción, ya que tiene las mismas herramientas
                            de sincronización que Chrome, es mucho más privado, y tiene bloqueadores de rastreadores y
                            anuncios integrados. Es el que uso yo
                        </p>
                    </div>
                </div>
            </div>

            <div>
                <p class="text-2xl">> Consumo de Recursos y Optimización:</p>
                <div class="mt-6 space-y-6">
                    <div class="rounded-lg bg-gray-50 p-4 dark:bg-gray-700">
                        <h3 class="text-heading mb-2 text-lg font-semibold">
                            Si tienes una computadora con recursos limitados (baja memoria RAM o CPU antigua), ¿qué
                            navegador te ofrecería la mejor experiencia sin ralentizar el sistema?
                        </h3>
                        <p class="text-sm text-secondary">
                            Microsoft Edge (en Windows) o Firefox. Edge tiene mejor gestión de memoria que Chrome con la
                            misma compatibilidad. Firefox es más ligero y estable. En Mac, Safari es indiscutiblemente
                            el más eficiente.
                        </p>
                    </div>

                    <div class="rounded-lg bg-gray-50 p-4 dark:bg-gray-700">
                        <h3 class="text-heading mb-2 text-lg font-semibold">
                            Si necesitas ejecutar muchas pestañas al mismo tiempo, ¿qué navegador recomendarías que
                            tenga mejor administración de memoria?
                        </h3>
                        <p class="text-sm text-secondary">
                            Microsoft Edge con la función Sleeping Tabs activada. Esta característica suspende
                            automáticamente las pestañas inactivas, reduciendo significativamente el consumo de RAM sin
                            perder el estado de las páginas. Firefox también maneja bien muchas pestañas con su
                            arquitectura multi-proceso.
                        </p>
                    </div>

                    <div class="rounded-lg bg-gray-50 p-4 dark:bg-gray-700">
                        <h3 class="text-heading mb-2 text-lg font-semibold">
                            ¿Qué navegador ofrece herramientas que optimicen el rendimiento en portátiles, como modos de
                            ahorro de energía o suspensión de pestañas?
                        </h3>
                        <p class="text-sm text-secondary">
                            Opera tiene el modo ahorro de energía más efectivo y fácil de usar, seguido de Microsoft
                            Edge con Sleeping Tabs. Safari en MacBook es excepcional para maximizar la duración de
                            batería automáticamente. Estos navegadores priorizan eficiencia sobre rendimiento bruto
                            cuando detectan batería baja.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<?php
include $VIEW_DIR . '/partials/__footer.php';
?>
