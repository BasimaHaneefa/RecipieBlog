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

if(isset($_GET["aid"]))
{

		?>
        <form method="post">
        <table align="center" border="1">
        <tr>
        <td>Amount</td>
        <td><input type="text" name="txt_amount" id="txt_amount" /></td>
        </tr>
        <tr>
        <td colspan="2" align="center" style="padding-left:45%"><input type="submit" name="btn_save" id="btn_save" value="Save" /> &nbsp;<input type="reset" name="btn_can" id="btn_can" value="Cancel" /></td>
        </tr>
        </table>
        </form>
        
        <?php
		if(isset($_POST["btn_save"]))
		{
			$amnt=$_POST["txt_amount"];
			
			$upQry="update tbl_order set order_amount='$amnt',order_status=1 where order_id='".$_GET["aid"]."' ";
			$Conn->query($upQry);
			header("location:ViewUserOrder.php");
		}

}

if(isset($_GET["rid"]))
{
	$upQr="update tbl_order set order_status=2 where order_id='".$_GET["rid"]."' ";
			$Conn->query($upQr);
			header("location:ViewUserOrder.php");
	
	
}

if(isset($_GET["oid"]))
{
	$upQr="update tbl_order set order_status=4 where order_id='".$_GET["oid"]."' ";
			$Conn->query($upQr);
			header("location:ViewUserOrder.php");
	
	
}
?>
<h2>User Order</h2>
<form id="form1" name="form1" method="post" action="">
  <table  border="1" align="center" id="blogs-table">
    <tr>
      <th>SL.NO</th>
      <th>TITLE</th>
      <th>FORDATE</th>
      <th>DETAILS</th>
      <th>CUSTOMER NAME</th>
       <th>CUSTOMER CONTACT</th>
      <th>ORDER ADDRESS</th>
      <th>ORDER PLACED DATE</th>
      <th>ACTION</th>
    </tr>
     <?php 
	$i=0;
$selQry="select * from tbl_order o inner join tbl_blog b on b.blog_id=o.blog_id inner join tbl_subcategory sb on sb.subcategory_id=b.subcategory_id inner join tbl_category c on c.category_id=sb.category_id where b.user_id='".$_SESSION["uid"]."'  ";
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
       <td><?php  echo $data["order_username"]?></td>
       <td><?php  echo $data["order_usercontact"]?></td>
       <td><?php  echo $data["order_address"]?></td>
        <td><?php  echo $data["order_date"]?></td>
      <td><?php
      		if($data["order_status"]==0 && $data["payment_status"]==0)
	  			{
	  ?><a href="ViewUserOrder.php?aid=<?php echo $data["order_id"] ?>">Accept</a>||<a href="ViewUserOrder.php?rid=<?php echo $data["order_id"] ?>">Reject</a>
      <?php
				}
				else  if($data["order_status"]==1 && $data["payment_status"]==0)
	  			{
					echo"Order Accepted & Rs.".$data["order_amount"]." Not paid";
	  ?>||<a href="ViewUserOrder.php?rid=<?php echo $data["order_id"] ?>">Reject</a>
      <?php
				}
				else  if($data["order_status"]==1 && $data["payment_status"]==1)
	  			{
					echo "Payment Completed";
					?>
                    <a href="ViewUserOrder.php?oid=<?php echo $data["order_id"] ?>">Order Completed</a>
                    <?php
				}else  if($data["order_status"]==4 && $data["payment_status"]==1)
	  			{
					echo "Order Completed";
				}else  if($data["order_status"]==3 && $data["payment_status"]==0)
	  			{
					echo "Order is cancelled by Customer";
				}
				else  if($data["order_status"]==3 && $data["payment_status"]==1)
	  			{
					echo "Order is cancelled by Customer";
				}else{
				echo "Rejected";	
					
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