<?php

// include "./models/DB.php";

class Category
{
    public $id;
    public $category;
    public $items;

    public function __construct($id = null, $category = null, $items = null)
    {
        $this->id = $id;
        $this->category = $category;
        $this->items = $items;

    }

    public static function all()
    {
        $categories = [];
        $db = new DB();
        $query = 'SELECT `categories`.`id`, `categories`.`category`, count(`items`.`id`) as "items" FROM `categories` left JOIN `items` on `categories`.`id`= `items`.`category_id` group by `categories`.`id`  ';
        $result = $db->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $categories[] = new Category($row['id'], $row['category'], $row['items']);
        }
        $db->conn->close();
        return $categories;
    }

    public static function create()
    {
        $db = new DB();
        $stmt = $db->conn->prepare("INSERT INTO `categories`( `category`) VALUES (?)");
        $stmt->bind_param("s", $_POST['category']);
        $stmt->execute();
        $stmt->close();

        $db->conn->close();
    }

    public static function find($id)
    {
        $category = new Category();
        $db = new DB();
        $query = "SELECT * FROM `categories` where `id`=" . $id;
        $result = $db->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $category = new Category($row['id'], $row['category']);
        }
        $db->conn->close();
        return $category;
    }

    public function update()
    {
        $db = new DB();
        $stmt = $db->conn->prepare("UPDATE `categories` SET `category`= ? WHERE `id` = ?");
        $stmt->bind_param("si", $_POST['category'], $_POST['id']);
        $stmt->execute();


        $stmt->close();
        $db->conn->close();
    }

    public static function destroy($id)
    {
        $db = new DB();
        $stmt = $db->conn->prepare("DELETE FROM `categories` WHERE `id` = ?");
        $stmt->bind_param("i", $_POST['id']);
        $stmt->execute();

        $stmt->close();
        $db->conn->close();
    }



    public static function getCategory()
    {
        $categories = [];
        $db = new DB();
        $query = "SELECT DISTINCT `category` FROM `categories` ";
        $result = $db->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $categories[] = $row['category'];
        }
        $db->conn->close();
        return $categories;
    }


}

?>