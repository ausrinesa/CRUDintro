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

    if (isset($_POST['saveCat'])) {
        CategoryContoller::store();
    }

    if (isset($_POST['editCat'])) {
        $category = CategoryContoller::show();
        $categories = CategoryContoller::index();
        $edit = true;
    }

    if (isset($_POST['updateCat'])) {
        CategoryContoller::update();
        header("Location: ./catshow.php");
        die;
    }

    if (isset($_POST['destroyCat'])) {
        CategoryContoller::destroy();
        header("Location: ./catshow.php");
        die;
    }

    $categories = CategoryContoller::index();

}


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['filter'])) {
        $items = ItemContoller::filter();
    } else if (isset($_GET['search'])) {
        $items = ItemContoller::search();
    } else if (isset($_GET['showCat'])) {
        $items = CategoryContoller::all();
    } else {
        $items = ItemContoller::index();
    }

}

$categories = CategoryContoller::index();

// $categories = CategoryContoller::index();


?>