<?php
include "./controllers/ItemController.php";
include "./controllers/CategoryController.php";
?>

<?php

$edit = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['save'])) {
        ItemContoller::store();
        header("Location:./index.php");
        die;
    }
    if (isset($_POST['edit'])) {
        $item = ItemContoller::show();
        $items = ItemContoller::index();
        $edit = true;
    }

    if (isset($_POST['update'])) {
        ItemContoller::update();
        header("Location: ./index.php");
        die;
    }
    if (isset($_POST['destroy'])) {
        ItemContoller::destroy();
        header("Location: ./index.php");
        die;
    }

    $categories = CategoryContoller::index();

}


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['filter'])) {
        $items = ItemContoller::filter();
        // print_r($_GET);
    } else if (isset($_GET['search'])) {
        $items = ItemContoller::search();
    } else if (isset($_GET['showCat'])) {
        $items = CategoryContoller::all();
    } else {
        $items = ItemContoller::index();
    }

}

// $categories = CategoryContoller::index();


?>