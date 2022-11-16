<?php

include "./models/category.php";
class CategoryContoller
{

    public static function index()
    {
        $categories = Category::all();
        return $categories;
    }

    public static function store()
    {
        Category::create();
    }

    public static function show()
    {
        $category = Category::find($_POST['id']);
        return $category;
    }

    public static function update()
    {
        print_r($_POST);
        $category = new Category();
        $category->id = $_POST['id'];
        $category->category = $_POST['category'];
        $category->update();
    }

    public static function destroy()
    {
        Category::destroy($_POST['id']);
    }

    public static function getCategory()
    {
        return Category::getCategory();
    }

    public static function filter()
    {
        return Category::filter();

    }


// public static function search()
// {
//     return Item::search();
// }

}

?>