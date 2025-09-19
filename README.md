# 🐳 Docker Configuration Repository

Welcome to my repository for Docker configuration files! Here you'll find setup files for a simple PHP project with Apache. 🚀

---

## 📋 Prerequisites
- Make sure Docker is installed on your machine.

---

## 🚀 Usage
1. Clone this repository to your working directory:
   ```bash
   git clone https://github.com/Piioni/Docker_config.git
   ```
   
2. Navigate to the project directory:
   ```bash
   cd Docker_config
   ```

3. Build and start the containers using Docker Compose:
   ```bash
   docker-compose up -d
   ```

4. To view container logs:
   ```bash
   docker-compose logs -f
   ```

5. To stop the containers:
   ```bash
   docker-compose down
   ```

---

## 🌐 Notes
- That's it! You can now start developing your PHP application. The web server will be available at `http://localhost:8080`.


- To access the phpMyAdmin interface, go to `http://localhost:8081` in your browser.


- It's recommended to use a `.env` file to store your application's environment variables. You can use the `.env` file provided in this repository as a template. The `docker-compose.yml` file will automatically detect it.


- The current setup sets the root directory to `/var/www/html` inside the container, with the document root at `/var/www/html/public`. You can change this in the `docker-compose.yml` file if needed.


---

Happy coding! ✨
