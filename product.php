<?php
include 'DbConnection.php';
class Product
{
    private $id;
    private $SKU;
    private $name;
    private $price;
    private $size;
    private $height;
    private $width;
    private $weight;
    private $length;

    const TYPE_DISC = 'disc';
    const TYPE_BOOK = 'book';
    const TYPE_FURNITURE = 'furniture';

    public function __get($attribute)
    {
        return $this->$attribute;
    }

    public function __set($attribute, $value)
    {
        $this->$attribute = $value;
    }

    public function getAll()
    {
        $dbConnection = (new DbConnection)->getConnection();
        $result = mysqli_query($dbConnection, "SELECT * FROM `products`");
        $products = [];
        while ($product = mysqli_fetch_object($result, get_class($this))) {
            $products[] = $product;
        };
        return $products;
    }

    public function save()
    {
        $dbConnection = (new DbConnection)->getConnection();
        $this->checkOnNull();
        $query = "INSERT INTO `products` (`SKU`, `name`, `price`, `size`, `weight`, `height`, `width`, `length`) VALUES ('$this->SKU', '$this->name', $this->price, $this->size, $this->weight, $this->height, $this->width, $this->length)";
        mysqli_query($dbConnection, $query);
    }

    public static function getAllTypes()
    {
        return [
            self::TYPE_DISC => 'DVD-Disc',
            self::TYPE_BOOK => 'Book',
            self::TYPE_FURNITURE => 'Furniture'
        ];
    }

    private function checkOnNull()
    {
        $attributes = ['size', 'height', 'width', 'weight', 'length'];
        foreach ($attributes as $key => $value) {
            $this->$value = !empty($this->$value) ? $this->$value : "NULL";
        }
    }

    public function delete($ids)
    {
        $ids = implode(',', $ids);
        $dbConnection = (new DbConnection)->getConnection();
        $query = "DELETE FROM `products` WHERE `id` in ($ids)";
        mysqli_query($dbConnection, $query);
    }
}
