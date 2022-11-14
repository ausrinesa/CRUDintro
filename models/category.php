<?php

// include "./models/DB.php";

class Category
{
    public $id;
    public $category;

    public function __construct($id = null, $category = null)
    {
        $this->id = $id;
        $this->category = $category;

    }

    public static function all()
    {
        $categories = [];
        $db = new DB();
        $query = "SELECT `categories`.`id`, `categories`.`category` FROM `categories` JOIN `items` on `categories`.`id`= `items`.`category_id` ";
        $result = $db->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $categories[] = new Category($row['id'], $row['category']);
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
        $stmt->bind_param("si", $_POST['name'], $_POST['id']);
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

// public static function filter()
// {
//     $items = [];
//     $db = new DB();
//     $query = "SELECT * FROM `items` ";
//     $first = true;
//     if ($_GET['filter'] != "") {
//         $query .= "WHERE `category`=\"" . $_GET['filter'] . "\"";
//         $first = false;
//     }

//     if ($_GET['priceFrom'] != "") {
//         $query .= (($first) ? "WHERE" : "AND") . " `price` >= " . $_GET['priceFrom'] . " ";
//         $first = false;
//     }

//     if ($_GET['priceTo'] != "") {
//         $query .= (($first) ? "WHERE" : "AND") . " `price` <= " . $_GET['priceTo'] . " ";
//         $first = false;
//     }

//     switch ($_GET['sort']) {
//         case '1':
//             $query .= "ORDER BY `price`";
//             break;

//         case '2':
//             $query .= "ORDER BY `price` DESC";
//             break;

//         case '3':
//             $query .= "ORDER BY `name`";
//             break;

//         case '4':
//             $query .= "ORDER BY `name` DESC";
//             break;
//     }


//     // echo $query;
//     // die;
//     $result = $db->conn->query($query);

//     while ($row = $result->fetch_assoc()) {
//         $items[] = new Item($row['id'], $row['name'], $row['category'], $row['price'], $row['about']);
//     }
//     $db->conn->close();
//     return $items;
// }

// public static function search()
// {
//     $items = [];
//     $db = new DB();
//     $query = "SELECT * FROM `items` where `name` like \"%" . $_GET['search'] . "%\"";
//     $result = $db->conn->query($query);

//     while ($row = $result->fetch_assoc()) {
//         $items[] = new Item($row['id'], $row['name'], $row['price'], $row['about']);
//     }
//     $db->conn->close();
//     return $items;
// }

}

?>