<?php

class Product
{
    private $pdo;

    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $foto;
    private $stock;
    private $id_categoria;
    private $elementos;
    private $estado = 0;
    private $autor;

    public function __construct()
    {
        $this->pdo = (new Database)->connect();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function getAutor()
    {
        return $this->autor;
    }

    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio): void
    {
        $this->precio = $precio;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function setFoto($foto): void
    {
        $this->foto = $foto;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($stock): void
    {
        $this->stock = $stock;
    }

    public function getIdCategoria()
    {
        return $this->id_categoria;
    }

    public function setIdCategoria($id_categoria): void
    {
        $this->id_categoria = $id_categoria;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado): void
    {
        $this->estado = $estado;
    }


    public function getProductList()
    {
        try {
            $query = $this->pdo->prepare("SELECT * FROM productos;");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getOffersList()
    {
        try {
            $query = $this->pdo->prepare("SELECT * FROM productos WHERE precioAnterior != 'NULL';");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function addProduct()
    {
        try {
            $query = $this->pdo->prepare("INSERT INTO productos (nombre, descripcion, autor, precio, foto, stock, id_categoria, estado) VALUES (?,?,?,?,?,?,?,?);");
            $query->execute(array($this->nombre, $this->descripcion, $this->autor, $this->precio, $this->foto, $this->stock, $this->id_categoria, $this->estado));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editProduct()
    {
        try {
            $query = $this->pdo->prepare("UPDATE productos SET nombre=?, descripcion=?, autor=? ,precio=?, foto=?, stock=?, id_categoria=? WHERE id=?;");
            $query->execute(array($this->nombre, $this->descripcion, $this->autor, $this->precio, $this->foto, $this->stock, $this->id_categoria, $this->id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editProductNoFoto()
    {
        try {
            $query = $this->pdo->prepare("UPDATE productos SET nombre=?, descripcion=?, autor=? ,precio=?, stock=?, id_categoria=? WHERE id=?;");
            $query->execute(array($this->nombre, $this->descripcion, $this->autor, $this->precio, $this->stock, $this->id_categoria, $this->id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getProductById()
    {
        try {
            $consulta = "SELECT * FROM productos WHERE id = {$this->id}";
            $resultado = $this->pdo->query($consulta);
            while ($filas = $resultado->FETCHALL(PDO::FETCH_ASSOC)) {
                $this->elementos[] = $filas;
            }
            return $this->elementos[0][0];
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function editConditionProduct($id, $estado)
    {
        try {
            $query = $this->pdo->prepare("UPDATE productos SET estado=? WHERE id=?;");
            $query->execute(array($estado, $id));
            $this->estado = $estado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function searchProduct()
    {
        try {
            $query = $this->pdo->prepare("SELECT * FROM productos WHERE nombre LIKE ?;");
            $query->execute(array("%" . $this->nombre . "%"));
            return $query->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function deleteProduct()
    {
        try {
            $consulta = "DELETE FROM productos WHERE id={$this->id}";
            $resultado = $this->pdo->query($consulta);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}