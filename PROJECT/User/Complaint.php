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
    max-width: 500px;
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

  select, input[type="text"], input[type="file"], input[type="date"],textarea {
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

if(isset($_POST["btnsave"]))
{
    $title=$_POST["txttitle"];	
	$complaint=$_POST["txtcomplaint"];
	
	$insQry="insert into tbl_complaint(complaint_title,complaint_details,complaint_date,user_id)values('$title','$complaint',curdate(),'".$_SESSION["uid"]."')";
$Conn->query($insQry);
header("location:Complaint.php");
}
?>
<div id="container">
<h2>Send Complaint</h2>
<form id="form1" name="form1" method="post" action="">
  <table width="248" border="1">
    <tr>
      <td width="92">TITLE</td>
      <td width="144"><label for="txttitle"></label>
      <input type="text" name="txttitle" id="txttitle" /></td>
    </tr>
    <tr>
      <td>COMPLAINT</td>
      <td><label for="txtcomplaint"></label>
      <input type="text" name="txtcomplaint" id="txtcomplaint" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsave" id="btnsave" value="Save" />
        <input type="reset" name="btncancel" id="btncancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
</form>
</div>
<br>
  <table width="200" border="1" id="blogs-table">
    <tr>
      <th>SL.NO</th>
      <th>TITLE</th>
      <th>COMPLAINT</th>
      <th>DATE</th>
      <th>REPLAY</th>
      <th>ACTION</th>
    </tr>
    <?php
	$i=0;
	$selQry="select * from tbl_complaint where user_id='".$_SESSION["uid"]."'";
	$row=$Conn->query($selQry);
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php  echo $i;?></td>
      <td><?php  echo $data["complaint_title"]?></td>
      <td><?php  echo $data["complaint_details"]?></td>
      <td><?php  echo $data["complaint_date"]?></td>
      <td><?php  echo $data["complaint_reply"]?></td>
      <td><a href="Complaint.php?cid=<?php echo $data["complaint_id"] ?>">Delete</a></td>
    </tr>
    <?php
	
	}
	?>
  </table>

</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>