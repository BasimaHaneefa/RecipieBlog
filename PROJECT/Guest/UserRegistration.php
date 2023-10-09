<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
        body {
            font-family: Arial, sans-serif;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, td {
            border: 1px solid #ccc;
        }

        td {
          color:#d4a762;
            padding: 10px;
        }

        input[type="text"],
        input[type="file"], input[type="email"], input[type="password"] {
            width: 90%;
            padding: 5px;
            margin-bottom: 10px;
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
    </style>
</head>
<?php
ob_start();
include("Head.php");

if(isset($_POST["btnsave"]))
{
	$userregistration=$_POST["txtname"];
	$email=$_POST["txtemail"];
	$contact=$_POST["txtcontact"];
	
	$description=$_POST["txtdescription"];	
	$password=$_POST["txtpassword"];


	$photo=$_FILES["filephoto"]["name"];
	$path=$_FILES["filephoto"]["tmp_name"];
	move_uploaded_file($path,"../Assets/Files/User/".$photo);

		$insQry="insert into tbl_user(user_name,user_email,user_contact,user_photo,user_description,user_password
)values('$userregistration','$email','$contact','$photo','$description','$password')";
	$Conn->query($insQry);
}
?>

<body>
  <h1 align="center">New User</h1>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table  border="1">
    <tr>
      <td>NAME</td>
      <td ><label for="txtname"></label>
        <input type="text" name="txtname" id="txtname" /></td>
    </tr>
    <tr>
      <td>E MAIL</td>
      <td><label for="txtemail"></label>
      <input type="email" name="txtemail" id="txtemail" /></td>
    </tr>
    <tr>
      <td>CONTACT</td>
      <td>
        <label for="txtcontact"></label>
      <input type="text" name="txtcontact" id="txtcontact" /></td>
    </tr>
    <tr>
      <td>PHOTO</td>
      <td><label for="filephoto"></label>
      <input type="file" name="filephoto" id="filephoto" /></td>
    </tr>
    <tr>
      <td>DESCRIPTION</td>
      <td><label for="txtdescription"></label>
      <input type="text" name="txtdescription" id="txtdescription" /></td>
    </tr>
    <tr>
      <td>PASSWORD</td>
      <td><label for="txtpassword"></label>
      <input type="password" name="txtpassword" id="txtpassword" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsave" id="btnsave" value="save" />
        <input type="reset" name="btncancel" id="btncancel" value="cancel" />
      </div></td>
    </tr>
  </table>
</form>
</body>
</html>
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>