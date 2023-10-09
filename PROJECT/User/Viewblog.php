<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Recipes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        .card {
            margin-bottom: 20px;
        }

        .card-img-fixed {
            width: 150px; /* Set your desired width */
            height: 150px; /* Set your desired height */
            object-fit: cover; /* Preserve aspect ratio and cover the container */
        }
        table {
    width: 100%;
    border-collapse: collapse;
  }

  table, th, td {
    border: 1px solid #ccc;
  }

  th, td {
    padding: 10px;
    text-align: left;
    color:#d4a762;
  }


  select, input[type="text"], input[type="file"], textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
  }

    </style>
</head>
<body>
<?php
ob_start();
include("Head.php");
?>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td>Category</td>
      <td><label for="sel_cat"></label>
        <select name="sel_cat" id="sel_cat" onChange="getSubcategory(this.value)">
        <option>Select Category</option>
        <?php
		$sel="select * from tbl_category";
		$row=$Conn->query($sel);
		while($data=$row->fetch_assoc())
		{
		?>
		<option value="<?php echo $data["category_id"] ?>"><?php echo $data["category_name"] ?></option>
        <?php
		}
		?>
      </select>
      </select></td>
      <td>Subcategory</td>
      <td><label for="sel_sub"></label>
       <select name="selsubcategory" id="selsubcategory" onChange="getRecipe(this.value)">
          <option>Select Subcategory</option>
      </select></td>
    </tr>
  </table>
<div class="container">
    <h2 class="text-center">Blogs</h2>
    <div id="search">
    <div class="row">
        <?php
        $i = 0;
        $selQry = "SELECT * FROM tbl_blog b
                   INNER JOIN tbl_subcategory sb ON sb.subcategory_id = b.subcategory_id
                   INNER JOIN tbl_category c ON c.category_id = sb.category_id
                   WHERE b.user_id != '" . $_SESSION["uid"] . "'";
        $row = $Conn->query($selQry);
        while ($data = $row->fetch_assoc()) {
          $i++;
          $average_rating = 0;
             $total_review = 0;
             $five_star_review = 0;
             $four_star_review = 0;
             $three_star_review = 0;
             $two_star_review = 0;
             $one_star_review = 0;
             $total_user_rating = 0;
             $query = "SELECT * FROM tbl_review where blog_id = '" .$data["blog_id"]. "' ORDER BY review_id DESC";
 $rs1 = $Conn->query($query);
   while ($row2=$rs1->fetch_assoc()) {
       if ($row2["user_rating"]==5) {
           $five_star_review++;
       }
       if ($row2["user_rating"]==4) {
           $four_star_review++;
       }
       if ($row2["user_rating"]==3) {
           $three_star_review++;
       }
       if ($row2["user_rating"]==2) {
           $two_star_review++;
       }
       if ($row2["user_rating"]==1) {
           $one_star_review++;
       }
       $total_review++;
       $total_user_rating += intval($row2["user_rating"]);
   }
   if ($total_user_rating > 0) {
       $average_rating = $total_user_rating / $total_review;
   }




        ?>
        <div class="col-md-3">
            <div class="card">
                <img src="../Assets/Files/Recipe/<?php echo $data["blog_photo"]; ?>" alt="Food" class="card-img-top card-img-fixed">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $data["blog_title"]; ?></h5>
                    <p class="card-text">
                        <?php echo $data["category_name"]; ?><br>
                        <?php echo $data["subcategory_name"]; ?><br>
                        <?php
            if ($average_rating == 5) {
                echo '<i class="fas fa-star" style="color:yellow;"></i>';
                echo '<i class="fas fa-star" style="color:yellow;"></i>';
                echo '<i class="fas fa-star" style="color:yellow;"></i>';
                echo '<i class="fas fa-star" style="color:yellow;"></i>';
                echo '<i class="fas fa-star" style="color:yellow;"></i>';
            }
            elseif ($average_rating == 4) {
                echo '<i class="fas fa-star" style="color:yellow;"></i>';
                echo '<i class="fas fa-star" style="color:yellow;"></i>';
                echo '<i class="fas fa-star" style="color:yellow;"></i>';
                echo '<i class="fas fa-star" style="color:yellow;"></i>';
                echo '<i class="fas fa-star" style="color:grey;"></i>';
            }
            elseif ($average_rating == 3) {
                echo '<i class="fas fa-star" style="color:yellow;"></i>';
                echo '<i class="fas fa-star" style="color:yellow;"></i>';
                echo '<i class="fas fa-star" style="color:yellow;"></i>';
                echo '<i class="fas fa-star" style="color:grey;"></i>';
                echo '<i class="fas fa-star" style="color:grey;"></i>';
            }
            elseif ($average_rating == 2) {
                echo '<i class="fas fa-star" style="color:yellow;"></i>';
                echo '<i class="fas fa-star" style="color:yellow;"></i>';
                echo '<i class="fas fa-star" style="color:grey;"></i>';
                echo '<i class="fas fa-star" style="color:grey;"></i>';
                echo '<i class="fas fa-star" style="color:grey;"></i>';
            }
            elseif ($average_rating == 1) {
                echo '<i class="fas fa-star" style="color:yellow;"></i>';
                echo '<i class="fas fa-star" style="color:grey;"></i>';
                echo '<i class="fas fa-star" style="color:grey;"></i>';
                echo '<i class="fas fa-star" style="color:grey;"></i>';
                echo '<i class="fas fa-star" style="color:grey;"></i>';
            }
            elseif ($average_rating == 0) {
                echo '<i class="fas fa-star" style="color:grey;"></i>';
                echo '<i class="fas fa-star" style="color:grey;"></i>';
                echo '<i class="fas fa-star" style="color:grey;"></i>';
                echo '<i class="fas fa-star" style="color:grey;"></i>';
                echo '<i class="fas fa-star" style="color:grey;"></i>';
            }
            ?>
     
                    </p>
                    <a href="Viewrecipie.php?rid=<?php echo $data["blog_id"]; ?>" class="btn btn-primary">View Recipe</a>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
        </div>
    </div>
</div>
<script src="../Assets/Jquery/jQuery.js"></script>
<script>
    function getSubcategory(did) {
        $.ajax({
            url: "../Assets/AjaxPages/AjaxSubcategory.php?did=" + did,
            success: function (html) {
                $("#selsubcategory").html(html);
            }
        });
    }

    function getRecipe(rid) {
        $.ajax({
            url: "../Assets/AjaxPages/AjaxRecipe.php?rid=" + rid,
            success: function (html) {
                $("#search").html(html);
            }
        });
    }
</script>
<?php
include("Foot.php");
ob_flush();
?>
</body>
</html>
