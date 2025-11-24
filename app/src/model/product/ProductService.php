<?php

namespace model\product;

class ProductService
{
    private ProductRepository $repository;

    public function __construct()
    {
        $this->repository = new ProductRepository();
    }

    /**
     * Obtener todos los productos
     * @return array
     */
    public function getAllProducts(): array
    {
        return $this->repository->findAll();
    }

    /**
     * Obtener un producto por ID
     * @param int $id
     * @return Product|null
     */
    public function getProductById(int $id): ?Product
    {
        return $this->repository->findById($id);
    }


    /**
     * Crear un nuevo producto con validaciones
     * @param array $data
     * @return array ['success' => bool, 'message' => string, 'product' => Product|null]
     */
    public function createProduct(array $data): array
    {
        // Validaciones
        $errors = $this->validateProductData($data);

        if (!empty($errors)) {
            return [
                'success' => false,
                'message' => 'Errores de validación',
                'errors' => $errors,
                'product' => null
            ];
        }

        // Crear producto
        $producto = new Product(
            null,
            $data['nombre'],
            $data['descripcion'] ?? '',
            (float)$data['precio']
        );

        try {
            $producto = $this->repository->create($producto);
            return [
                'success' => true,
                'message' => 'Producto creado exitosamente',
                'product' => $producto
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Error al crear producto: ' . $e->getMessage(),
                'product' => null
            ];
        }
    }

    /**
     * Actualizar un producto existente
     * @param int $id
     * @param array $data
     * @return array
     */
    public function updateProduct(int $id, array $data): array
    {
        $producto = $this->repository->findById($id);

        if (!$producto) {
            return [
                'success' => false,
                'message' => 'Producto no encontrado'
            ];
        }

        // Validaciones
        $errors = $this->validateProductData($data, true);

        if (!empty($errors)) {
            return [
                'success' => false,
                'message' => 'Errores de validación',
                'errors' => $errors
            ];
        }

        // Actualizar campos
        if (isset($data['nombre'])) $producto->setNombre($data['nombre']);
        if (isset($data['descripcion'])) $producto->setDescripcion($data['descripcion']);
        if (isset($data['precio'])) $producto->setPrecio((float)$data['precio']);

        try {
            $this->repository->update($producto);
            return [
                'success' => true,
                'message' => 'Producto actualizado exitosamente',
                'product' => $producto
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Error al actualizar producto: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Eliminar un producto
     * @param int $id
     * @return array
     */
    public function deleteProduct(int $id): array
    {
        $producto = $this->repository->findById($id);

        if (!$producto) {
            return [
                'success' => false,
                'message' => 'Producto no encontrado'
            ];
        }

        try {
            $this->repository->delete($id);
            return [
                'success' => true,
                'message' => 'Producto eliminado exitosamente'
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Error al eliminar producto: ' . $e->getMessage()
            ];
        }
    }

    /**
     * Obtener estadísticas de productos
     * @return array
     */
    public function getStats(): array
    {
        return [
            'total' => $this->repository->count(),
            'productos' => $this->repository->findAll()
        ];
    }

    /**
     * Validar datos del producto
     * @param array $data
     * @param bool $isUpdate
     * @return array
     */
    private function validateProductData(array $data, bool $isUpdate = false): array
    {
        $errors = [];

        // Nombre es obligatorio
        if (!$isUpdate || isset($data['nombre'])) {
            if (empty($data['nombre'])) {
                $errors['nombre'] = 'El nombre es obligatorio';
            } elseif (strlen($data['nombre']) < 3) {
                $errors['nombre'] = 'El nombre debe tener al menos 3 caracteres';
            }
        }

        // Precio debe ser positivo
        if (!$isUpdate || isset($data['precio'])) {
            if (!isset($data['precio']) || $data['precio'] < 0) {
                $errors['precio'] = 'El precio debe ser un número positivo';
            }
        }


        return $errors;
    }
}

