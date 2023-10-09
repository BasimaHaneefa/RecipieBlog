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

	$reply=$_POST["txtreplay"];
	
	$upQry="update tbl_complaint set complaint_reply='$reply',complaint_status=1 where complaint_id='".$_GET["cid"]."'";
	$Conn->query($upQry);
	header("location:ViewComplaint.php");

}
?>
<form id="form1" name="form1" method="post" action="">
  <table align="center" border="1">
    <tr>
      <td>REPLAY</td>
      <td><label for="txtreplay"></label>
      <textarea name="txtreplay" id="txtreplay" ></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsave" id="btnsave" value="Save" />
        <input type="reset" name="btncancel" id="btncancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
</form>
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>