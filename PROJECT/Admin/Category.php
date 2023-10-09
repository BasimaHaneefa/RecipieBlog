<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
ob_start();
include("Head.php");

if(isset($_POST["btnsave"]))
{
	$category=$_POST["txtcategory"];
	$insQry="insert into tbl_category(category_name)values('$category')";
	$Conn->query($insQry);
	header("location:Category.php");
}


if(isset($_GET["did"]))
{
	$del="delete from tbl_category where category_id=".$_GET["did"];
	$Conn->query($del);
	header("location:Category.php");
}

?>
<form id="form1" name="form1" method="post" action="">
  <h2 align="center">Category</h2>
  <table border="1" align="center">
    <tr>
      <td>Category</td>
      <td><label for="txtcategory"></label>
      <input type="text" name="txtcategory" id="txtcategory" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"> <input type="submit" name="btnsave" id="btnsave" value="Save" />
      <input type="reset" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
  <br>
  <table  border="1" align="center">
    <tr>
      <th width="54">SI.NO</th>
      <th width="71">Catagory</th>
      <th width="58">Action</th>
    </tr>
    <?php
	$i=0;
    $sel="select * from tbl_category";
	$result=$Conn->query($sel);
	while($row=$result->fetch_assoc())
	{
		$i++;
		?>
		<tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $row["category_name"]?></td>
          <td><a href="Category.php?did=<?php echo $row["category_id"]?>">Delete</a></td>
        </tr>
		<?php
	}
	?>
    
  </table>
  <p>&nbsp;</p>
</form>
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>