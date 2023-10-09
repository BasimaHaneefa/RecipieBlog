
<?php
include("../Connection/Connection.php");
?>
 <option>Select Subcategory</option>
        <?php
		$sel="select * from tbl_subcategory where category_id='".$_GET["did"]."'";
		$row=$Conn->query($sel);
		while($data=$row->fetch_assoc())
		{
		?>
		<option value="<?php echo $data["subcategory_id"] ?>"><?php echo $data["subcategory_name"] ?></option>
        <?php
		}
		?>
