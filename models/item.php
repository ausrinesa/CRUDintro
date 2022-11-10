<?php

include "./models/DB.php";

class Item
{
    public $id;
    public $name;
    public $category;
    public $price;
    public $about;

    public function __construct($id = null, $name = null, $category = null, $price = null, $about = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->category = $category;
        $this->price = $price;
        $this->about = $about;

    }

    public static function all()
    {
        $items = [];
        $db = new DB();
        $query = "SELECT * FROM `items` ";
        $result = $db->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $items[] = new Item($row['id'], $row['name'], $row['category'], $row['price'], $row['about']);
        }
        $db->conn->close();
        return $items;
    }

    public static function create()
    {
        $db = new DB();
        $stmt = $db->conn->prepare("INSERT INTO `items`( `name`, `category`, `price`, `about`) VALUES (?,?,?,?)");
        $stmt->bind_param("ssds", $_POST['name'], $_POST['category'], $_POST['price'], $_POST['about']);
        $stmt->execute();
        $stmt->close();

        $db->conn->close();
    }

    public static function find($id)
    {
        $item = new Item();
        $db = new DB();
        $query = "SELECT * FROM `items` where `id`=" . $id;
        $result = $db->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $item = new Item($row['id'], $row['name'], $row['category'], $row['price'], $row['about']);
        }
        $db->conn->close();
        return $item;
    }

    public function update()
    {
        $db = new DB();
        $stmt = $db->conn->prepare("UPDATE `items` SET `name`= ? ,`category`= ? ,`price`= ? ,`about`= ? WHERE `id` = ?");
        $stmt->bind_param("ssdsi", $_POST['name'], $_POST['category'], $_POST['price'], $_POST['about'], $_POST['id']);
        $stmt->execute();

        $stmt->close();
        $db->conn->close();
    }

    public static function destroy($id)
    {
        $db = new DB();
        $stmt = $db->conn->prepare("DELETE FROM `items` WHERE `id` = ?");
        $stmt->bind_param("i", $_POST['id']);
        $stmt->execute();

        $stmt->close();
        $db->conn->close();
    }

    public static function filter($category)
    {
        $item = new Item();
        $db = new DB();
        $query = "SELECT * FROM `items` where `category`=" . $category;
        $result = $db->conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $item = new Item($row['id'], $row['name'], $row['category'], $row['price'], $row['about']);
        }
        $db->conn->close();
        return $item;
    }
}
?>