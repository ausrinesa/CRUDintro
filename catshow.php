<?php
include "./routes.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <table class="table border-top">
        <thead>
            <tr>
                <th>id</th>
                <th>category</th>
            </tr>
        </thead>
        <tbody>
        <tbody>
            <?php foreach ($items as $item) { ?>
            <tr>
                <td>
                    <?= $item->categoryId ?>
                </td>
                <td>
                    <?= $item->category ?>
                </td>
                </form>
                </td>

            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>