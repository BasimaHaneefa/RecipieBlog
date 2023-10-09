
<?php
session_start();
include("../Connection/Connection.php");
?>
  <?php 
  $i=0;
$selQry="select * from tbl_blog b  inner join tbl_subcategory sb on sb.subcategory_id=b.subcategory_id inner join tbl_category c on c.category_id=sb.category_id where b.user_id !='".$_SESSION["uid"]."' and b.subcategory_id='".$_GET["rid"]."' ";
	$row=$Conn->query($selQry);
while($data=$row->fetch_assoc())
{
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
  </p>

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