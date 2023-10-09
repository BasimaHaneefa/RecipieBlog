<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Profile</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
  }

  #container {
    max-width: 400px;
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

  table, td {
    border: 1px solid #ccc;
  }

  td {
    padding: 10px;
    text-align: left;
    color:#d4a762;
  }

  img {
    display: block;
    margin: 0 auto;
    border-radius: 50%;
  }
</style>
</head>

<body>
<?php
ob_start();
include("Head.php");

$selQry="select * from tbl_user where user_id='".$_SESSION["uid"]."'";
$row=$Conn->query($selQry);
$data=$row->fetch_assoc();

?>
<div id="container">
  <h2>My Profile</h2>
  <form id="form1" name="form1" method="post" action="">
    <table>
      <tr>
        <td colspan="2">
          <div align="center">
            <img src="../Assets/Files/User/<?php echo $data["user_photo"] ?>" width="150" height="150" alt="Profile Picture" />
          </div>
        </td>
      </tr>
      <tr>
        <td>NAME:</td>
        <td style="color:#000"><?php echo $data["user_name"] ?></td>
      </tr>
      <tr>
        <td>CONTACT:</td>
        <td style="color:#000"><?php echo $data["user_contact"] ?></td>
      </tr>
      <tr>
        <td>E-MAIL:</td>
        <td style="color:#000"><?php echo $data["user_email"] ?></td>
      </tr>
      <tr>
        <td>DESCRIPTION:</td>
        <td style="color:#000"><?php echo $data["user_description"] ?></td>
      </tr>
    </table>
  </form>
</div>
</body>
<?php
include("Foot.php");
ob_flush();
?>
</html>
