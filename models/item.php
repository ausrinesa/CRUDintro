<?php

include "./models/DB.php";

class Item
{
    public $id;
    public $name;
    public $price;
    public $about;
    public $category;
    public $categoryId;

    public function __construct($id = null, $name = null, $price = null, $about = null, $category = null, $categoryId = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->about = $about;
        $this->category = $category;
        $this->categoryId = $categoryId;

    }

    public static function all()
    {
        $items = [];
        $db = new DB();
        $query = "SELECT `items`.`id`, `items`.`name`, `items`.`price`, `items`.`about`, `items`.`category_id`, `categories`.`category` FROM `items` JOIN `categories` on `categories`.`id`= `items`.`category_id`";
        $result = $db->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $items[] = new Item($row['id'], $row['name'], $row['price'], $row['about'], $row['category'], $row['category_id']);
        }
        $db->conn->close();
        return $items;
    }

    public static function create()
    {
        $db = new DB();
        $stmt = $db->conn->prepare("INSERT INTO `items`( `name`, `price`, `about`,`category_id`) VALUES (?,?,?,?)");
        $stmt->bind_param("sdsi", $_POST['name'], $_POST['price'], $_POST['about'], $_POST['categoryId']);
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
            $item = new Item($row['id'], $row['name'], $row['price'], $row['about']);
        }
        $db->conn->close();
        return $item;
    }

    public function update()
    {
        $db = new DB();
        $stmt = $db->conn->prepare("UPDATE `items` SET `name`= ? ,`price`= ? ,`about`= ? ,`category_id`= ? WHERE `id` = ?");
        $stmt->bind_param("sdsii", $_POST['name'], $_POST['price'], $_POST['about'], $_POST['categoryId'], $_POST['id']);
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


    // public static function getCategory()
    // {
    //     $categories = [];
    //     $db = new DB();
    //     $query = "SELECT DISTINCT `category` FROM `items` ";
    //     $result = $db->conn->query($query);

    //     while ($row = $result->fetch_assoc()) {
    //         $categories[] = $row['category'];
    //     }
    //     $db->conn->close();
    //     return $categories;
    // }

    public static function filter()
    {
        $items = [];
        $db = new DB();
        $query = "SELECT * FROM `items` JOIN `categories` on `categories`.`id`= `items`.`category_id`";
        $first = true;
        if ($_GET['category'] != "") {
            $query .= "WHERE `category_id`=\"" . $_GET['category'] . "\"";
            $first = false;
        }

        if ($_GET['priceFrom'] != "") {
            $query .= (($first) ? "WHERE" : "AND") . " `price` >= " . $_GET['priceFrom'] . " ";
            $first = false;
        }

        if ($_GET['priceTo'] != "") {
            $query .= (($first) ? "WHERE" : "AND") . " `price` <= " . $_GET['priceTo'] . " ";
            $first = false;
        }

        switch ($_GET['sort']) {
            case '1':
                $query .= "ORDER BY `price`";
                break;

            case '2':
                $query .= "ORDER BY `price` DESC";
                break;

            case '3':
                $query .= "ORDER BY `name`";
                break;

            case '4':
                $query .= "ORDER BY `name` DESC";
                break;
        }

        // echo $query;
        // die;
        $result = $db->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $items[] = new Item($row['id'], $row['name'], $row['price'], $row['about'], $row['category']);
        }
        $db->conn->close();
        return $items;
    }

    public static function search()
    {
        $items = [];
        $db = new DB();
        $query = "SELECT * FROM `items` where `name` like \"%" . $_GET['search'] . "%\"";
        $result = $db->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $items[] = new Item($row['id'], $row['name'], $row['price'], $row['about']);
        }
        $db->conn->close();
        return $items;
    }

}

?>