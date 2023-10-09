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
            max-width: 600px;
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

<body>
<?php
ob_start();
include("Head.php");

if(isset($_POST["btnsave"]))
{
	
$current=$_POST["txtpass"];	
$new=$_POST["txtpass2"];
$confirm=$_POST["txtpaass"];

$selQry="select * from tbl_user where user_id='".$_SESSION["uid"]."'";
$row=$Conn->query($selQry);
$data=$row->fetch_assoc();

$password=$data["user_password"];
	
	
	if($current==$password)
	{
		if($new==$confirm)
		{
			$upQry="update tbl_user set user_password='".$new."' where user_id='".$_SESSION["uid"]."'";
			if($Conn->query($upQry))
			{
	?>
    <script>
		alert("Password Changed");
		window.location="Changepassword.php";
		
		</script>
    <?php	
		
	}
			
		}
		else
	{
	?>
    <script>
		alert("Password Mismatch!!");
		window.location="Changepassword.php";
		
		</script>
    <?php	
		
	}
	
	}
	else
	{
	?>
    <script>
		alert("Invalid Password!!");
		window.location="Changepassword.php";
		
		</script>
    <?php	
		
	}

}


?>
<h2 align="center">Change Password</h2>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>CURRENT PASSWORD</td>
      <td><label for="txtpass"></label>
      <input type="password" name="txtpass" id="txtpass" /></td>
    </tr>
    <tr>
      <td>NEW PASSWORD</td>
      <td><label for="txtpass2"></label>
      <input type="password" name="txtpass2" id="txtpass2" /></td>
    </tr>
    <tr>
      <td>CONFIRM PASSWORD</td>
      <td><label for="txtpaass"></label>
      <input type="password" name="txtpaass" id="txtpaass" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btnsave" id="btnsave" value="save" />
        <input type="reset" name="btncal" id="btncancel" value="cancel" />
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