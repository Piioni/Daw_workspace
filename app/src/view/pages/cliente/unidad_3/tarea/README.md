# 🕐 Ejercicio: Reloj Digital con JavaScript


## 📖 Descripción del Ejercicio

Este ejercicio consiste en crear un **reloj digital funcional** que muestre la hora actual del sistema y se actualice automáticamente cada segundo. La aplicación utiliza JavaScript para manipular el DOM y trabajar con el objeto `Date`.

### Funcionalidad Principal

- Una página principal con un botón "Dame la hora"
- Al hacer clic, se abre una ventana emergente
- La ventana emergente muestra un reloj digital en tiempo real
- El reloj se actualiza automáticamente cada segundo
- Formato de visualización: **HH:MM:SS** (24 horas)

### Autor

**Juan Rangel**

---


## 📁 Archivos del Ejercicio

```
tarea/
├── tarea3.php    # Página principal con botón
└── reloj.php     # Ventana emergente del reloj
```

### tarea3.php - Página Principal

**Propósito:** Página de inicio que contiene el botón para lanzar el reloj.

**Elementos clave:**
- Botón con `id="dame-hora"`
- Event listener en JavaScript
- Función `window.open()` para ventana emergente
- `console.log()` para tracking

### reloj.php - Ventana del Reloj

**Propósito:** Ventana emergente que muestra el reloj digital.

**Elementos clave:**
- Contenedor `<div id="reloj">`
- Función `actualizarReloj()`
- `setInterval()` para actualización automática
- Botón de cierre

---

## 🔍 Análisis del Código

### 1️⃣ Página Principal (tarea3.php)

#### HTML Structure

```html
<!-- Botón principal -->
<button id="dame-hora" class="btn-form">
    Dame la hora
</button>
```

**¿Qué hace?**
- Muestra un botón interactivo
- Usa clases de Tailwind para estilos
- Tiene un `id` único para JavaScript

#### JavaScript - Event Listener

```javascript
document.getElementById('dame-hora').addEventListener('click', () => {
    console.log('Botón "Dame la hora" pulsado - Abriendo ventana del reloj digital');
    window.open('tarea/reloj', 'reloj', 'width=650,height=550,top=300,left=200');
});
```

**Desglose línea por línea:**

| Línea | Explicación |
|-------|-------------|
| `document.getElementById('dame-hora')` | Busca el botón en el DOM por su ID |
| `.addEventListener('click', ...)` | Registra un listener para el evento click |
| `() => { ... }` | Arrow function de ES6 que se ejecuta al hacer clic |
| `console.log(...)` | Imprime mensaje en la consola del navegador |
| `window.open(...)` | Abre una nueva ventana emergente |

**Parámetros de window.open():**

```javascript
window.open(url, nombre, características);
```

| Parámetro | Valor | Significado |
|-----------|-------|-------------|
| `url` | `'tarea/reloj'` | Ruta relativa al archivo a abrir |
| `nombre` | `'reloj'` | Nombre interno de la ventana |
| `width` | `650` | Ancho en píxeles |
| `height` | `550` | Alto en píxeles |
| `top` | `300` | Posición vertical (píxeles desde arriba) |
| `left` | `200` | Posición horizontal (píxeles desde izquierda) |

---

### 2️⃣ Ventana del Reloj (reloj.php)

#### HTML Structure

```html
<!-- Contenedor del reloj -->
<div id="reloj" class="text-heading font-monofamily text-6xl font-bold"></div>

<!-- Botón cerrar -->
<button onclick="window.close()" class="btn-form">
    Cerrar
</button>
```

**Clases Tailwind aplicadas:**

| Clase | Efecto |
|-------|--------|
| `text-6xl` | Tamaño de fuente 60px |
| `font-bold` | Peso de fuente grueso |
| `font-monofamily` | Fuente monoespaciada (números alineados) |
| `text-heading` | Color del tema |

#### JavaScript - Función Principal

```javascript
function actualizarReloj() {
    // 1. Obtener fecha y hora actual
    const ahora = new Date();
    
    // 2. Extraer componentes
    let horas = ahora.getHours();
    let minutos = ahora.getMinutes();
    let segundos = ahora.getSeconds();
    
    // 3. Formatear con ceros
    horas = horas < 10 ? '0' + horas : horas;
    minutos = minutos < 10 ? '0' + minutos : minutos;
    segundos = segundos < 10 ? '0' + segundos : segundos;
    
    // 4. Actualizar DOM
    document.getElementById('reloj').textContent = `${horas}:${minutos}:${segundos}`;
}
```

**Análisis detallado:**

##### Paso 1: Obtener la hora actual

```javascript
const ahora = new Date();
```

- Crea un objeto `Date` con la fecha/hora actual del sistema
- `const` porque la variable no se reasignará
- Este objeto contiene: año, mes, día, hora, minuto, segundo, milisegundo

##### Paso 2: Extraer componentes de tiempo

```javascript
let horas = ahora.getHours();      // 0-23
let minutos = ahora.getMinutes();  // 0-59
let segundos = ahora.getSeconds(); // 0-59
```

**Métodos del objeto Date:**

| Método | Retorna | Rango |
|--------|---------|-------|
| `getHours()` | Hora en formato 24h | 0-23 |
| `getMinutes()` | Minutos | 0-59 |
| `getSeconds()` | Segundos | 0-59 |

##### Paso 3: Formatear con ceros a la izquierda

```javascript
horas = horas < 10 ? '0' + horas : horas;
```

**Operador Ternario:**
```
condición ? valor_si_verdadero : valor_si_falso
```

**Ejemplos:**

| Valor Original | Condición | Resultado |
|---------------|-----------|-----------|
| `5` | `5 < 10` → true | `'05'` |
| `15` | `15 < 10` → false | `15` |
| `0` | `0 < 10` → true | `'00'` |

**¿Por qué es necesario?**

```
SIN formateo:  9:5:3   ❌ (difícil de leer)
CON formateo: 09:05:03 ✅ (formato estándar)
```

##### Paso 4: Actualizar el DOM

```javascript
document.getElementById('reloj').textContent = `${horas}:${minutos}:${segundos}`;
```

**Template Literals (ES6):**
```javascript
`${variable}` // Interpola el valor de la variable
```

**Ejemplo:**
```javascript
let horas = '09', minutos = '05', segundos = '03';
`${horas}:${minutos}:${segundos}` // Resultado: "09:05:03"
```

#### JavaScript - Inicialización y Temporizador

```javascript
// Ejecutar inmediatamente al cargar
actualizarReloj();

// Actualizar cada segundo
setInterval(actualizarReloj, 1000);
```

**¿Por qué ejecutar dos veces?**

1. **Primera ejecución (`actualizarReloj()`):**
   - Se ejecuta inmediatamente
   - Muestra la hora sin esperar 1 segundo
   - Evita que el reloj aparezca vacío

2. **Temporizador (`setInterval()`):**
   - Se ejecuta cada 1000ms (1 segundo)
   - Mantiene el reloj actualizado
   - Retorna un ID del intervalo (no usado aquí)

**Sintaxis de setInterval:**
```javascript
setInterval(función, milisegundos);
```

| Parámetro | Tipo | Descripción |
|-----------|------|-------------|
| `función` | Function | Función a ejecutar repetidamente |
| `milisegundos` | Number | Intervalo de tiempo (1000ms = 1s) |

---

## 🔄 Flujo de Ejecución Paso a Paso

### Al Cargar tarea3.php

```
1. Se carga el HTML y CSS
2. Se ejecuta el script JavaScript
3. Se busca el elemento con id="dame-hora"
4. Se registra el event listener en el botón
5. El navegador espera interacción del usuario
```

### Al Hacer Clic en "Dame la hora"

```
1. Se dispara el evento 'click'
2. Se ejecuta la arrow function
3. console.log() imprime mensaje en DevTools
4. window.open() crea ventana emergente 650x550
5. Se carga reloj.php en la nueva ventana
```

### Al Cargar reloj.php

```
1. Se carga el HTML con <div id="reloj"></div>
2. Se ejecuta el script JavaScript
3. actualizarReloj() se ejecuta INMEDIATAMENTE
   ├─ new Date() obtiene hora actual
   ├─ getHours(), getMinutes(), getSeconds()
   ├─ Formateo con ceros
   └─ textContent actualiza el DOM
4. setInterval() programa ejecuciones futuras
5. Cada 1000ms (1 segundo):
   └─ actualizarReloj() se vuelve a ejecutar
```

### Línea de Tiempo Visual

```
Tiempo    | Evento
----------|--------------------------------------------------
0ms       | actualizarReloj() - Primera ejecución
          | DOM muestra: 14:30:45
----------|--------------------------------------------------
1000ms    | actualizarReloj() - Via setInterval
          | DOM muestra: 14:30:46
----------|--------------------------------------------------
2000ms    | actualizarReloj() - Via setInterval
          | DOM muestra: 14:30:47
----------|--------------------------------------------------
3000ms    | actualizarReloj() - Via setInterval
          | DOM muestra: 14:30:48
----------|--------------------------------------------------
...       | (continúa cada segundo)
```

---

## 👨‍💻 Información del Ejercicio

- **Autor:** Juan Rangel
- **Curso:** Desarrollo Web - Instituto FOC
- **Unidad:** 3
- **Tecnologías:** JavaScript, HTML, PHP, Tailwind CSS
