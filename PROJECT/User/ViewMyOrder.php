<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
  }

  #container {
    max-width: 1000px;
    margin: 0 auto;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
  }

  h2 {
    text-align: center;
    margin-bottom: 20px;
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

  img {
    display: block;
    margin: 0 auto;
    border-radius: 5px;
    max-width: 150px;
    max-height: 150px;
  }

  select, input[type="text"], input[type="file"], textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
  }

  input[type="submit"] {
            background-color: #d4a762;
            color: #000;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius:8px;
        }

        input[type="submit"]:hover {
            background-color: #000;
            color:#d4a762;
        }
        input[type="reset"] {
            background-color:#d4a762;
            color: #000;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius:8px;
        }

        input[type="reset"]:hover {
            background-color: #000;
            color:#d4a762;
        }

  .center {
    text-align: center;
  }

  #blogs-table th {
    background-color: #d4a762;
    color: #000;
    font-weight: bold;
    border: 1px solid #ccc;
  }

  #blogs-table td {
    background-color: #f9f9f9;
    color:#000;
    border: 1px solid #ccc;
  }

  #blogs-table a {
    color: #f00;
    text-decoration: none;
  }
</style>
</head>

<body>
<?php
ob_start();
include("Head.php");
?>

<h2>My Order</h2>
<form id="form1" name="form1" method="post" action="">
  <table width="500" border="1" align="center" id="blogs-table">
    <tr>
      <th>SL.NO</th>
      <th>TITLE</th>
      <th>FORDATE</th>
      <th>DETAILS</th>
      <th>STATUS</th>
    </tr>
    <?php 
	$i=0;
$selQry="select * from tbl_order o inner join tbl_blog b on b.blog_id=o.blog_id inner join tbl_subcategory sb on sb.subcategory_id=b.subcategory_id inner join tbl_category c on c.category_id=sb.category_id where o.user_id='".$_SESSION["uid"]."' ";
	$row=$Conn->query($selQry);
while($data=$row->fetch_assoc())
{
 $i++;
?>
    <tr>
      <td><?php  echo $i ?></td>
      <td><?php  echo $data["blog_title"]?></td>
      <td><?php  echo $data["order_fordate"]?></td>
      <td><?php  echo $data["order_details"]?></td>
      <td><?php
      		if($data["order_status"]==0 && $data["payment_status"]==0)
	  			{
	 			echo "Waiting for the response";
				$selQ="select datediff(order_fordate,curdate()) as diff from tbl_order where order_id='".$data["order_id"]."'";
				$rowC=$Conn->query($selQ);
				$dataC=$rowC->fetch_assoc();
				if($dataC["diff"]>=3)
				{
					?>
                    <a href="ViewMyOrder.php?cid=<?php echo $data["order_id"] ?>">Cancel order</a>
                    <?php
				}
				
				}
				else  if($data["order_status"]==1 && $data["payment_status"]==0)
	  			{
					
					echo"Order Accepted & Complete your payment Rs.".$data["order_amount"];
	  ?>||<a href="Payment.php?bid=<?php echo $data["order_id"] ?>&&amnt=<?php echo $data["order_amount"] ?>">Pay Now</a>
      <?php
				}
				else  if($data["order_status"]==1 && $data["payment_status"]==1)
	  			{
					echo "Rs.".$data["order_amount"]."Paid";
				}else  if($data["order_status"]==3 && $data["payment_status"]==0)
	  			{
					echo "Order is cancelled by You";
				}
				else  if($data["order_status"]==3 && $data["payment_status"]==1)
	  			{
					echo "Order is cancelled by You";
				}else  if($data["order_status"]==4 && $data["payment_status"]==1)
	  			{
					echo "Order Completed";
					
				}else{
				echo "Order got Rejected";	
					
				}
	  ?></td>
    </tr>
    <?php
}
	?>
  </table>
</form>
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>