<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="" rel="stylesheet" />
    <title></title>
</head>

<body>

    <!-- <h1><?php $host = $_SERVER['HTTP_HOST'];
                echo $host    ?>

    </h1> -->

    <form action="save_order.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="food">Food:</label>
        <input type="text" id="food" name="food" required><br><br>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1" required><br><br>

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required><br><br>

        <input type="submit" value="Place Order">
    </form>

</body>

</html>