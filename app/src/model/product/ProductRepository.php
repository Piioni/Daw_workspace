<?php

namespace model\product;

use model\Database;
use PDO;

class ProductRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    /**
     * Obtener todos los productos
     * @return array
     */
    public function findAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM productos ORDER BY id DESC");
        $results = $stmt->fetchAll();

        $productos = [];
        foreach ($results as $row) {
            $productos[] = $this->hydrate($row);
        }

        return $productos;
    }

    /**
     * Obtener un producto por ID
     * @param int $id
     * @return Product|null
     */
    public function findById(int $id): ?Product
    {
        $stmt = $this->db->prepare("SELECT * FROM productos WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();

        return $row ? $this->hydrate($row) : null;
    }

     /**
     * Crear un nuevo producto
     * @param Product $producto
     * @return Product
     */
    public function create(Product $producto): Product
    {
        $stmt = $this->db->prepare(
            "INSERT INTO productos (nombre, descripcion, precio) 
             VALUES (?, ?, ?)"
        );

        $stmt->execute([
            $producto->getNombre(),
            $producto->getDescripcion(),
            $producto->getPrecio()
        ]);

        $producto->setId((int)$this->db->lastInsertId());
        return $producto;
    }

    /**
     * Actualizar un producto existente
     * @param Product $producto
     * @return bool
     */
    public function update(Product $producto): bool
    {
        $stmt = $this->db->prepare(
            "UPDATE productos 
             SET nombre = ?, descripcion = ?, precio = ?
             WHERE id = ?"
        );

        return $stmt->execute([
            $producto->getNombre(),
            $producto->getDescripcion(),
            $producto->getPrecio(),
            $producto->getId()
        ]);
    }

    /**
     * Eliminar un producto
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM productos WHERE id = ?");
        return $stmt->execute([$id]);
    }

    /**
     * Contar total de productos
     * @return int
     */
    public function count(): int
    {
        $stmt = $this->db->query("SELECT COUNT(*) as total FROM productos");
        $result = $stmt->fetch();
        return (int)$result['total'];
    }

    /**
     * Hidratar un objeto Product desde un array
     * @param array $row
     * @return Product
     */
    private function hydrate(array $row): Product
    {
        return new Product(
            (int)$row['id'],
            $row['nombre'],
            $row['descripcion'],
            (float)$row['precio']
        );
    }
}

