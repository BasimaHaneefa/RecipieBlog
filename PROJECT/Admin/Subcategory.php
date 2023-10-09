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
	$category=$_POST["select"];
	$subcategory=$_POST["txt_subcategory"];
	$insQry="insert into tbl_subcategory(subcategory_name,category_id)values('$subcategory','$category')";
	$Conn->query($insQry);
	
}
if(isset($_GET["did"]))
{
	$del="delete from tbl_subcategory where subcategory_id=".$_GET["did"];
	$Conn->query($del);
	header("location:Subcategory.php");
}


?>
<label for="txtsubcatagory"></label>
<form id="form1" name="form1" method="post" action="">
<h2 align="center">Subcategory</h2>
  <table align="center" border="1">
    <tr>
      <td >Catagory</td>
      <td ><label for="select"></label>
        <select name="select" id="sltcatagory">
        <option>...Select...</option>
        <?php 
		$sel="select * from tbl_category";
		$result=$Conn->query($sel);
	    while($row=$result->fetch_assoc())
		{
		?>
        <option value="<?php echo $row["category_id"]?>"><?php echo $row["category_name"]?></option>
    
        
        <?php
		}
		?>
      </select></td>
    </tr>
    <tr>
      <td>subcatagory</td>
      <td><label for="txt_subcategory"></label>
      <input type="text" name="txt_subcategory" id="txt_subcategory" />        <label for="txtsubcatagory2"></label></td>
    </tr>
    <tr>
      <td colspan="2" ><div align="center">
        <input type="submit" name="btnsave" id="btnsave" value="save" />
        <input type="submit" name="btncancel" id="btncancel" value="cancel" />
      </div></td>
    </tr>
  </table>
  <br>
  <table align="center" border="1">
    <tr>
      <th>Sl.no</th>
      <th>Catagory</th>
      <th>Subcatagory</th>
      <th>Action</th>
    </tr>
    <?php
	$i=0;
    $sel="select * from tbl_subcategory sc inner join tbl_category c on sc.category_id=c.category_id";
	$result=$Conn->query($sel);
	while($row=$result->fetch_assoc())
	{
		$i++;
		?>
		<tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $row["category_name"]?></td>
          <td><?php echo $row["subcategory_name"]?></td>
          <td><a href="Subcategory.php?did=<?php echo $row["subcategory_id"]?>">Delete</a></td>
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