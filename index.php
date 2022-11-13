<!-- routsai -->
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
    <title>IKEA ekspozicijos sąrašas</title>
</head>


<body>

    <div class="row" id="topRow">
        <div class="col-6">
            <h1>
                <a href="./index.php"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                        <path
                            d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                        <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                    </svg> </a>
            </h1>
        </div>
        <div class="col-6">
            <form action="" method="get">
                <div class="row">
                    <div class="col-8">
                        <input type="text" class="form-control" name="search" placeholder="Search item by name">
                    </div>
                    <div class="col-4">
                        <button class="btn btn-primary" type="submit" id="searchBtn">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- form -->
    <?php
    include "./components/form.php";
    ?>


    <!-- filter -->
    <?php
    include "./components/filter.php";
    ?>



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
                            <button id="editBtn" class="btn btn-outline-primary" type="submit" name="edit">
                                edit
                            </button>
                        </form>

                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $item->id ?>">
                            <button id="deleteBtn" class="btn btn-outline-danger" type="submit" name="destroy">
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