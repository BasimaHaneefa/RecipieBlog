<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Recipe Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        #container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        img.recipe-image {
            display: block;
            margin: 0 auto;
            max-width: 100%;
            height: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .button-container a {
            display: inline-block;
            margin: 5px;
            padding: 10px 20px;
            background-color: #d4a762;
            color: #000;
            text-decoration: none;
            border-radius: 5px;
        }

        .button-container a:hover {
            background-color: #000;
        }
    </style>
</head>
<body>
<?php
ob_start();
include("Head.php");
?>
<div id="container">
    <?php 
    $selQry = "SELECT * FROM tbl_blog b  
               INNER JOIN tbl_subcategory sb ON sb.subcategory_id=b.subcategory_id 
               INNER JOIN tbl_category c ON c.category_id=sb.category_id 
               WHERE b.user_id !='" . $_SESSION["uid"] . "' AND b.blog_id='" . $_GET["rid"] . "'";
    $row = $Conn->query($selQry);
    while ($data = $row->fetch_assoc()) {
    ?>
    <img src="../Assets/Files/Recipe/<?php echo $data["blog_photo"] ?>" alt="Food" class="recipe-image" />
    <table>
        <tr>
            <th colspan="2">Recipe Details</th>
        </tr>
        <tr>
            <td>TITLE</td>
            <td><?php echo $data["blog_title"] ?></td>
        </tr>
        <tr>
            <td>TIME</td>
            <td><?php echo $data["blog_time"] ?></td>
        </tr>
        <tr>
            <td>INGREDIENTS</td>
            <td><?php echo $data["blog_ingredients"] ?></td>
        </tr>
        <tr>
            <td>PRESENTATION DETAILS</td>
            <td><?php echo $data["blog_preprationdetails"] ?></td>
        </tr>
    </table>
    <div class="button-container">
        <a href="Order.php?rid=<?php echo $data["blog_id"] ?>">ORDER</a>
        <a href="RecipieRating.php?pid=<?php echo $data["blog_id"] ?>">RATE THE RECIPE</a>
    </div>
    <?php
    }
    ?>
</div>
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>
