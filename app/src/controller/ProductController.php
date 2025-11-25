<?php

namespace App\Controller;

use JetBrains\PhpStorm\NoReturn;
use model\product\ProductService;

class ProductController extends Controller
{
    private ProductService $productService;

    public function __construct()
    {
        $this->productService = new ProductService();
    }

    /**
     * Listar todos los productos
     */
    public function index(): void
    {
        try {
            $productos = $this->productService->getAllProducts();

            // Renderizar vista con los productos
            $this->view('lista_productos.php', '/pages/servidor/unidad_5/mvc_basicos', [
                'productos' => $productos,
                'titulo' => 'Lista de Productos',
                'total' => count($productos)
            ]);
        } catch (\Exception $e) {
            $this->json([
                'success' => false,
                'message' => 'Error al obtener productos: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Obtener un producto por ID (API JSON)
     */
    #[NoReturn]
    public function show()
    {
        $id = (int)$this->input('id');

        if (!$id) {
            $this->json([
                'success' => false,
                'message' => 'ID de producto inválido'
            ], 400);
            return;
        }

        $producto = $this->productService->getProductById($id);

        if (!$producto) {
            $this->json([
                'success' => false,
                'message' => 'Producto no encontrado'
            ], 404);
            return;
        }

        $this->json([
            'success' => true,
            'product' => $producto->toArray()
        ]);
    }

    /**
     * Obtener todos los productos en formato JSON (API)
     */
    public function list(): void
    {
        try {
            $productos = $this->productService->getAllProducts();

            // Convertir a array
            $productosArray = array_map(function($producto) {
                return $producto->toArray();
            }, $productos);

            $this->json([
                'success' => true,
                'total' => count($productosArray),
                'products' => $productosArray
            ]);
        } catch (\Exception $e) {
            $this->json([
                'success' => false,
                'message' => 'Error al obtener productos: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Crear un nuevo producto
     */
    #[NoReturn]
    public function create(): void
    {
        if (!$this->isPost()) {
            $this->json([
                'success' => false,
                'message' => 'Método no permitido'
            ], 405);
            return;
        }

        $data = [
            'nombre' => $this->input('nombre'),
            'descripcion' => $this->input('descripcion', ''),
            'precio' => $this->input('precio', 0)
        ];

        $result = $this->productService->createProduct($data);

        $status = $result['success'] ? 201 : 400;

        if ($result['success']) {
            $result['product'] = $result['product']->toArray();
        }

        $this->json($result, $status);
    }

    /**
     * Actualizar un producto existente
     */
    #[NoReturn]
    public function update(): void
    {
        if (!$this->isPost()) {
            $this->json([
                'success' => false,
                'message' => 'Método no permitido'
            ], 405);
            return;
        }

        $id = (int)$this->input('id');

        if (!$id) {
            $this->json([
                'success' => false,
                'message' => 'ID de producto inválido'
            ], 400);
            return;
        }

        $data = [
            'nombre' => $this->input('nombre'),
            'descripcion' => $this->input('descripcion'),
            'precio' => $this->input('precio')
        ];

        // Filtrar solo campos presentes
        $data = array_filter($data, function($value) {
            return $value !== null;
        });

        $result = $this->productService->updateProduct($id, $data);

        $status = $result['success'] ? 200 : 400;

        if ($result['success'] && isset($result['product'])) {
            $result['product'] = $result['product']->toArray();
        }

        $this->json($result, $status);
    }

    /**
     * Eliminar un producto
     */
    #[NoReturn]
    public function delete(): void
    {
        if (!$this->isPost()) {
            $this->json([
                'success' => false,
                'message' => 'Método no permitido'
            ], 405);
            return;
        }

        $id = (int)$this->input('id');

        if (!$id) {
            $this->json([
                'success' => false,
                'message' => 'ID de producto inválido'
            ], 400);
            return;
        }

        $result = $this->productService->deleteProduct($id);
        $status = $result['success'] ? 200 : 404;

        $this->json($result, $status);
    }

    /**
     * Obtener estadísticas de productos
     */
    public function stats(): void
    {
        try {
            $stats = $this->productService->getStats();

            // Convertir productos a array
            $stats['productos'] = array_map(function($producto) {
                return $producto->toArray();
            }, $stats['productos']);

            $this->json([
                'success' => true,
                'stats' => $stats
            ]);
        } catch (\Exception $e) {
            $this->json([
                'success' => false,
                'message' => 'Error al obtener estadísticas: ' . $e->getMessage()
            ], 500);
        }
    }
}

