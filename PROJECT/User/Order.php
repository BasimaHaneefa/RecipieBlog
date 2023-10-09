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
 $fordate=$_POST["txtdate"];
 $details=$_POST["txtdetails"];
 $address=$_POST["txt_address"];
 $name=$_POST["txt_cust"];
 $contact=$_POST["txt_con"];
 
 $insQry="insert into tbl_order(order_date,user_id,blog_id,order_details,order_fordate,order_address,order_username,order_usercontact	)values(curdate(),'".$_SESSION["uid"]."','".$_GET["rid"]."','$details','$fordate','$address','$name','$contact')";
$Conn->query($insQry);
header("location:HomePage.php");
}

?>
<div id="container">
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td>FORDATE</td>
      <td><label for="txtdate"></label>
      <input type="date" name="txtdate" id="txtdate"  min=""/></td>
    </tr>
    <tr>
      <td height="34">DETAILS</td>
      <td><label for="txtdetails"></label>
     <textarea name="txtdetails" id="txtdetails" ></textarea></td>
    </tr>
    <tr>
      <td height="34">CUSTOMER NAME</td>
      <td><label for="txt_cust"></label>
      <input type="text" name="txt_cust" id="txt_cust" /></td>
    </tr>
    <tr>
      <td height="34">CONTACT</td>
      <td><label for="txt_con"></label>
      <input type="text" name="txt_con" id="txt_con" /></td>
    </tr>
    <tr>
      <td height="34">ADDRESS</td>
      <td><label for="txt_address"></label>
      <textarea name="txt_address" id="txt_address" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsave" id="btnsave" value="save" />
        <input type="reset" name="btncancel" id="btncancel" value="cancel" />
      </div></td>
    </tr>
  </table>
</form>
</div>
</body>
<script>
// Set the minimum date to today
const today = new Date().toISOString().split('T')[0];
        document.getElementById("txtdate").min = today;
     

  </script>
<?php
include("Foot.php");
ob_flush();
?>
</html>