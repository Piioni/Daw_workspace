# 🐳 Docker Php/Javascript/Diseno Repository

¡Bienvenido!, este repositorio contiene todos los ejercicios que voy realizando durante las clases, consta de un entorno
de desarrollo con Docker, que incluye un servidor web Apache con PHP y Node.js para ejecutar páginas web estilizadas
mediante tailwindcss.

---

## 📋 Prerequisites

Asegurarse de tener instalado.

- [Docker desktop](https://www.docker.com/products/docker-desktop/)
- [Node.js](https://nodejs.org/en/download/)

---

## 🚀 Usage

1. Clonar el repositorio:
   ```bash
   git clone https://github.com/Piioni/Daw_workspace.git
   cd Daw_workspace
    ```

2. Instalar las dependencias de Node.js:
   ```bash
   npm install
   ```
3. Si vas a trabajar con tailwindcss, ejecutar el siguiente comando para activar el compilador de CSS:
   ```bash
   npm run tailwind
   ```
4. Iniciar el entorno Docker:
   ```bash
   docker-compose up -d
    ```
5. Acceder al servidor web en `http://localhost:8080`

---

## 🌐 Notes

1. Si estás aquí porque vas a revisar mis ejercicios, de alguna asignatura específica, dentro de src/pages, se
   encuentran las carpetas con los nombres de las asignaturas, y dentro de estas se encontrarán los ejercicios
   realizados.
2. El puerto 8080 puede ser cambiado en el archivo `.env` si ya está en uso.
3. Para detener el entorno Docker, usar:
   ```bash
   docker-compose down
   ```
4. El comando `npm run tailwind` tiene el flag `--watch`, por lo que estará observando cambios en los archivos
   CSS y actualizando automáticamente el archivo `output.css`.








