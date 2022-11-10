<?php
include "./controllers/ItemController.php";

$edit = false;
// $filter = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['save'])) {
        ItemContoller::store();
        header("Location:./index.php");
        die;
    }
    if (isset($_POST['edit'])) {
        $item = ItemContoller::show();
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

    if (isset($_POST['filter'])) {
        $filter=true;
        ItemContoller::filter();
        header("Location: ./index.php");
        die;
    }
}

$items = ItemContoller::index();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

        <link rel="stylesheet" href="./css/style.css">
    <title>IKEA ekspozicijos sąrašas</title>
</head>

<body>


    <div class="container col-xxl-4" id="form">
        <form method="post">
            <div class="mb-3">
                <label for="form" class="form-label">Item name</label>
                <input type="text" name='name' class="form-control" id="form" value=<?=($edit) ? $item->name : " " ?> >
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <!-- <input type="text" name='category' class="form-control" id="category" value=<?=($edit) ? $item->category
                    : " " ?>> -->
                    <select class="form-select" aria-label="Default select example" name="category" value=<?=($edit) ? $item->category
                    : " " ?>>>
                        <option selected>Category</option>
                        <option value="Darbo stalai">Darbo stalai</option>
                        <option value="Kėdės/Darbo kėdės">Kėdės/Darbo kėdės</option>
                        <option value="Foteliai">Foteliai</option>
                        <option value="Kušetės">Kušetės</option>
                        <option value="Sofos">Sofos</option>
                        <option value="Atviros lentynos">Atviros lentynos</option>
                        <option value="Knygų spintos">Knygų spintos</option>
                        </select>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" name='price' class="form-control" id="price" value=<?=($edit) ? $item->price : " "
                    ?>>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name='about' class="form-control" id="description"> <?=($edit) ? $item->about :
                    " " ?> </textarea>
            </div>
            <?php if ($edit) { ?>
            <input type="hidden" name="id" value="<?= $item->id ?>">
            <button type="submit" name="update" class="btn btn-success mt-3 mb-3">Update</button>
            <?php } else { ?>
            <button type="submit" name="save" class="btn btn-primary mt-3 mb-3" id= "saveBtn">Save</button>
            <?php } ?>
        </form>
    </div>

 <!-- filter -->
 <div class="box">
    <form class="row g-3">
        <div class="col-auto">
                <!-- <input type="text" name='category' class="form-control" id="category" value=<?=($edit) ? $item->category
                    : " " ?>> -->
                    <select class="form-select form-control" aria-label="Default select example" name="category" id="category" value=<?=($edit) ? $item->category
                    : " " ?>>>
                        <option selected>Filter items by category</option>
                        <option value="Darbo stalai">Darbo stalai</option>
                        <option value="Kėdės/Darbo kėdės">Kėdės/Darbo kėdės</option>
                        <option value="Foteliai">Foteliai</option>
                        <option value="Kušetės">Kušetės</option>
                        <option value="Sofos">Sofos</option>
                        <option value="Atviros lentynos">Atviros lentynos</option>
                        <option value="Knygų spintos">Knygų spintos</option>
                        </select>
        </div>
                    <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">filter</button>
                    </div>
    </form>
 </div>
  
     <!-- filter -->


    <table class="table table-hover">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>category</th>
                <th>price</th>
                <th>about</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item) { ?>
            <tr>
                <td>
                    <?= $item->id ?>
                </td>
                <td>
                    <?= $item->name ?>
                </td>
                <td>
                    <?= $item->category ?>
                </td>
                <td>
                    <?= $item->price ?>
                </td>
                <td>
                    <?= $item->about ?>
                </td>

                <td>
                    <div class="d-flex flex-row  mb-3">
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $item->id ?>">
                            <button type="submit" name="edit" class="btn btn-outline-secondary" id="editBtn"> edit </button>
                        </form>

                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $item->id ?>">
                            <button type="submit" name="destroy" class="btn btn-outline-danger"id="deleteBtn"> delete </button>
                        </form>
                    </div>
                </td>

            </tr>
            <?php } ?>
        </tbody>
    </table>

</body>

</html>