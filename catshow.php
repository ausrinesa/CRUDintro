<?php
include "./routes.php";
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
    <link rel="stylesheet" href="./css/pgstyle.css">
    <title>Document</title>
</head>

<body>

    <div class="container col-lg-4" id="form">
        <form method="post">
            <div class="mb-3">
                <label for="form" class="form-label">New category</label>
                <input type="text" name='category' class="form-control" id="form" value="<?=($edit) ? $category->category
    : " " ?>">
            </div>
            <?php if ($edit) { ?>
            <input type="hidden" name="id" value="<?php $category->category ?>">
            <button type="submit" name="updateCat" id="updateBtn" class="btn"> Update</button>
            <?php } else { ?>
            <button type="submit" name="saveCat" class="btn btn-primary mt-3 mb-3" id="saveBtn">Save</button>
            <?php } ?>
        </form>
    </div>

    <table class="table border-top">
        <thead>
            <tr>
                <th>id</th>
                <th>category</th>
                <th>item count</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
        <tbody>

            <?php foreach ($categories as $category) { ?>
            <tr>
                <td>
                    <?= $category->id ?>
                </td>
                <td>
                    <?= $category->category ?>
                </td>
                <td>
                    <?= $category->items ?>
                </td>
                </form>
                </td>
                <td>
                    <div class="d-flex flex-row  mb-3">
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $category->id ?>">
                            <button id="editBtn" class="btn btn-outline-primary" type="submit" name="editCat">
                                edit
                            </button>
                        </form>

                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $category->id ?>">
                            <button id="deleteBtn" class="btn btn-outline-danger" type="submit" name="destroyCat">
                                delete
                            </button>
                        </form>
                    </div>
                </td>

            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>