<?php

namespace App\Controller;

use model\user\UserService;
use model\user\User;

class AuthController extends Controller
{
    private UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    /**
     * Mostrar formulario de login
     */
    public function showLogin(): void
    {
        // Si ya está autenticado, redirigir al home
        if (isAuthenticated()) {
            $this->redirect('/');
        }

        $this->view('login.php', '/pages/usuario', [
            'title' => 'Iniciar Sesión',
            'error' => $_SESSION['error'] ?? null
        ]);

        // Limpiar error después de mostrarlo
        unset($_SESSION['error']);
    }

    /**
     * Mostrar formulario de registro
     */
    public function showRegister(): void
    {
        // Si ya está autenticado, redirigir al home
        if (isAuthenticated()) {
            $this->redirect('/');
        }

        $this->view('register.php', '/pages/usuario', [
            'title' => 'Registrarse',
            'error' => $_SESSION['error'] ?? null,
            'success' => $_SESSION['success'] ?? null
        ]);

        // Limpiar mensajes después de mostrarlos
        unset($_SESSION['error'], $_SESSION['success']);
    }

    /**
     * Procesar login
     */
    public function login(): void
    {
        if (!$this->isPost()) {
            $this->redirect('/login');
        }

        $email = $this->input('email');
        $password = $this->input('password');

        // Validar campos
        if (empty($email) || empty($password)) {
            $_SESSION['error'] = 'Por favor, complete todos los campos';
            $this->redirect('/login');
        }

        // Buscar usuario
        $user = $this->userService->getUserByEmail($email);

        if (!$user || !password_verify($password, $user->password)) {
            $_SESSION['error'] = 'Credenciales incorrectas';
            $this->redirect('/login');
        }

        // Iniciar sesión
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->nombre;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_rol'] = $user->rol;

        // Redirigir al home
        $this->redirect('/');
    }

    /**
     * Procesar registro
     */
    public function register(): void
    {
        if (!$this->isPost()) {
            $this->redirect('/register');
        }

        $nombre = $this->input('nombre');
        $email = $this->input('email');
        $password = $this->input('password');
        $confirmPassword = $this->input('confirm_password');

        // Validar campos
        if (empty($nombre) || empty($email) || empty($password) || empty($confirmPassword)) {
            $_SESSION['error'] = 'Por favor, complete todos los campos';
            $this->redirect('/register');
        }

        // Validar que las contraseñas coincidan
        if ($password !== $confirmPassword) {
            $_SESSION['error'] = 'Las contraseñas no coinciden';
            $this->redirect('/register');
        }

        // Validar longitud de contraseña
        if (strlen($password) < 6) {
            $_SESSION['error'] = 'La contraseña debe tener al menos 6 caracteres';
            $this->redirect('/register');
        }

        // Crear usuario (rol por defecto: 2 = usuario normal)
        $result = $this->userService->createUser($nombre, $email, $password, 2);

        if (!$result) {
            $_SESSION['error'] = 'El email ya está registrado o es inválido';
            $this->redirect('/register');
        }

        $_SESSION['success'] = 'Cuenta creada exitosamente. Por favor, inicia sesión';
        $this->redirect('/login');
    }

    /**
     * Cerrar sesión
     */
    public function logout(): void
    {
        // Destruir sesión
        session_destroy();

        // Limpiar variables de sesión
        $_SESSION = [];

        // Redirigir al home
        $this->redirect('/');
    }

    /**
     * Mostrar perfil del usuario
     */
    public function profile(): void
    {
        // Verificar que esté autenticado
        if (!isAuthenticated()) {
            $this->redirect('/login');
        }

        $userId = $_SESSION['user_id'];
        $user = $this->userService->getUserById($userId);

        if (!$user) {
            $this->logout();
        }

        $this->view('profile.php', '/pages/usuario', [
            'title' => 'Mi Perfil',
            'user' => $user
        ]);
    }
}

