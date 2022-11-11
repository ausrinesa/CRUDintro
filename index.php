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

    <link rel="stylesheet" href="./css/style.css">
    <title>IKEA ekspozicijos sąrašas</title>
</head>

<body>

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
                            <button type="submit" name="edit" class="btn btn-outline-secondary" id="editBtn"> edit
                            </button>
                        </form>

                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $item->id ?>">
                            <button type="submit" name="destroy" class="btn btn-outline-danger" id="deleteBtn">
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