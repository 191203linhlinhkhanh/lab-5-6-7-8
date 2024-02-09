<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách đồ uống</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        table{
            margin-left: 400px;
        }
        table, th, td {
  border: 1px solid;
}

img{
    width: 100px;
    height: 100px;
}
        </style>
</head>
<body>
    <?php
    include 'connect.php' ?>
    <?php
$sql = "SELECT drinks.*, drink_categories.category_name 
FROM drinks JOIN drink_categories 
ON drinks.category_id = drink_categories.category_id ";    
    $result=$conn->query($sql);
    $drinks = $result->fetchAll();
    ?>
    <table>
        <tr>
            <th>id</th>
            <th> name</th>
            <th>price</th>
            <th>image</th>
            <th>Category</th>
            <th>Chọn</th>
        </tr>
        <tbody>
        <?php
        foreach ($drinks as $drink) {
            echo "<tr>
            <td>{$drink['id']}</td>
            <td>{$drink['ten']}</td>
            <td>{$drink['price']}</td>
            <td ><img src='img/{$drink['image']}'></td>
            <td>{$drink['category_name']}</td>
            <td><a href='edit.php'id='btnUpdate' class='btn btn-primary'>
            <i class='fas fa-edit'></i>
        </a></td>
            </tr>";
            
        }
        ?>

    </tbody>
    <a href="add.php"><button type="submit" name="submit">Thêm mới</button></a>

    </table>
      <!-- Liên kết JS Jquery bằng CDN -->
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<!-- Liên kết JS Popper bằng CDN -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<!-- Liên kết JS Bootstrap bằng CDN -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!-- Liên kết JS FontAwesome bằng CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
</body>
</html>