<?php require VIEW_DIR . '/partials/__header.php'; ?>

<main class="flex-grow p-8">
  <div class="mx-auto max-w-2xl">
    <div class="card">
      <h1 class="text-heading mb-6 text-3xl font-bold">Mi Perfil</h1>

      <div class="space-y-6">
        <!-- Información del usuario -->
        <div class="innercard">
          <h2 class="text-heading mb-4 text-xl font-semibold">Información Personal</h2>

          <div class="space-y-4">
            <div>
              <label class="form-label mb-1 text-xs">Nombre</label>
              <p class="text-title text-lg"><?= htmlspecialchars($user->nombre) ?></p>
            </div>

            <div>
              <label class="form-label mb-1 text-xs">Email</label>
              <p class="text-title text-lg"><?= htmlspecialchars($user->email) ?></p>
            </div>

            <div>
              <label class="form-label mb-1 text-xs">Rol</label>
              <p class="text-title text-lg">
                <?php
                $roles = [
                  1 => 'Administrador',
                  2 => 'Usuario',
                  3 => 'Moderador',
                ];
                echo $roles[$user->rol] ?? 'Desconocido';
                ?>
              </p>
            </div>

            <div>
              <label class="form-label mb-1 text-xs">ID de Usuario</label>
              <p class="text-lg text-secondary">#<?= $user->id ?></p>
            </div>
          </div>
        </div>

        <!-- Editar campos adicionales: gmail y teléfono -->
        <div class="innercard">
          <h2 class="text-heading mb-4 text-xl font-semibold">Editar Contacto</h2>

          <form method="post" action="/profile" class="space-y-4">
            <div>
              <label for="gmail" class="form-label mb-1 text-xs">Gmail</label>
              <input
                id="gmail"
                name="gmail"
                type="email"
                class="form-input w-full"
                value="<?= htmlspecialchars($user->gmail ?? '') ?>"
                placeholder="tu@correo.com"
              />
            </div>

            <div>
              <label for="telefono" class="form-label mb-1 text-xs">Teléfono</label>
              <input
                id="telefono"
                name="telefono"
                type="text"
                class="form-input w-full"
                value="<?= htmlspecialchars($user->telefono ?? '') ?>"
                placeholder="600 123 456"
              />
            </div>

            <div class="flex gap-4">
              <button
                type="submit"
                class="inline-flex flex-1 items-center justify-center rounded-lg bg-accent px-5 py-2.5 text-center text-sm font-semibold text-white transition-colors hover:brightness-95 focus:ring-2 focus:ring-accent focus:ring-offset-2 focus:outline-none"
              >
                Guardar Contacto
              </button>
              <a
                href="/"
                class="inline-flex flex-1 items-center justify-center rounded-lg border-2 border-border px-5 py-2.5 text-center text-sm font-semibold text-text-primary hover:bg-hover"
              >
                Volver
              </a>
            </div>
          </form>
        </div>

        <!-- Horario (cookie) -->
        <div class="innercard">
          <h2 class="text-heading mb-4 text-xl font-semibold">Horario Preferido</h2>

          <div class="space-y-3">
            <label for="horario" class="form-label mb-1 text-xs">Horario</label>
            <div class="flex items-center gap-3">
              <select id="horario" class="form-input">
                <option value="">-- Selecciona --</option>
                <option value="Manana">Mañana</option>
                <option value="Tarde">Tarde</option>
                <option value="Noche">Noche</option>
              </select>

              <button
                id="grabarHorario"
                type="button"
                class="inline-flex items-center justify-center rounded-lg bg-accent px-5 py-2.5 text-sm font-semibold text-white transition-colors hover:brightness-95 focus:ring-2 focus:ring-accent focus:ring-offset-2 focus:outline-none"
              >
                Grabar horario
              </button>

              <button
                id="borrarHorario"
                type="button"
                class="inline-flex items-center justify-center rounded-lg border-2 border-border px-5 py-2.5 text-sm font-semibold text-text-primary hover:bg-hover focus:ring-2 focus:ring-accent focus:ring-offset-2 focus:outline-none"
              >
                Borrar
              </button>
            </div>

            <p id="horarioMsg" class="text-sm text-secondary"></p>
          </div>
        </div>

        <!-- Acciones adicionales -->
        <div class="flex gap-4">
          <a
            href="/logout"
            class="inline-flex flex-1 items-center justify-center rounded-lg bg-rose-500 px-5 py-2.5 text-center text-sm font-semibold text-white transition-colors hover:bg-rose-600 focus:ring-2 focus:ring-rose-400 focus:ring-offset-2 focus:outline-none dark:bg-rose-600 dark:hover:bg-rose-700"
          >
            Cerrar Sesión
          </a>
        </div>
      </div>
    </div>
  </div>
</main>

<?php require VIEW_DIR . '/partials/__footer.php'; ?>

<script>
  // Pequeñas utilidades para cookies
  function setCookie(name, value, days) {
    var expires = '';
    if (days) {
      var date = new Date();
      date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
      expires = '; expires=' + date.toUTCString();
    }
    document.cookie = name + '=' + (encodeURIComponent(value) || '') + expires + '; path=/';
  }

  function getCookie(name) {
    var nameEQ = name + '=';
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') c = c.substring(1, c.length);
      if (c.indexOf(nameEQ) == 0) return decodeURIComponent(c.substring(nameEQ.length, c.length));
    }
    return null;
  }

  function eraseCookie(name) {
    document.cookie = name + '=; Max-Age=-99999999; path=/';
  }

  // Inicializar select con valor si cookie existe
  document.addEventListener('DOMContentLoaded', function () {
    var horarioSelect = document.getElementById('horario');
    var saved = getCookie('horario');
    var msg = document.getElementById('horarioMsg');
    if (saved) {
      horarioSelect.value = saved;
      msg.textContent = 'Horario cargado desde cookie: ' + saved;
    }

    document.getElementById('grabarHorario').addEventListener('click', function () {
      var v = horarioSelect.value;
      if (!v) {
        msg.textContent = 'Por favor selecciona un horario antes de grabar.';
        return;
      }
      setCookie('horario', v, 365);
      msg.textContent = 'Horario guardado: ' + v;
    });

    document.getElementById('borrarHorario').addEventListener('click', function () {
      eraseCookie('horario');
      horarioSelect.value = '';
      msg.textContent = 'Cookie "horario" borrada.';
    });
  });
</script>
