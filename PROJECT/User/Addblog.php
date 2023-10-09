<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>New Blog</title>
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

if(isset($_POST["btnsaver"]))
{
    $subcategory=$_POST["selsubcategory"];
    $title=$_POST["txttitel"];
    $time=$_POST["txttime"];
    $ingredients=$_POST["txtingrediants"];   
    $preparation=$_POST["txtprepration"];
    $photo=$_FILES["filephoto"]["name"];
    $path=$_FILES["filephoto"]["tmp_name"];
    move_uploaded_file($path,"../Assets/Files/Recipe/".$photo);
    
    $insQry="insert into tbl_blog(blog_title,blog_preprationdetails,blog_time,blog_ingredients,blog_photo,user_id,subcategory_id,blog_date)values('$title','$preparation','$time','$ingredients','$photo','".$_SESSION["uid"]."','$subcategory',curdate())";
    $Conn->query($insQry);
    header("location:Addblog.php");
}

if(isset($_GET["did"]))
{
    $delQry="delete from tbl_blog where blog_id='".$_GET["did"]."'";
    $Conn->query($delQry);
    header("location:Addblog.php");    
    
}
?>  
<div id="container">
  <h2>New Blog</h2>
  <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <table>
      <tr>
        <td>CATEGORY</td>
        <td>
          <label for="selcategory"></label>
          <select name="selcategory" id="selcategory" onchange="getSubcategory(this.value)">
            <option>Select Category</option>
            <?php
              $sel="select * from tbl_category";
              $row=$Conn->query($sel);
              while($data=$row->fetch_assoc())
              {
            ?>
            <option value="<?php echo $data["category_id"] ?>"><?php echo $data["category_name"] ?></option>
            <?php
              }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>SUBCATEGORY</td>
        <td>
          <label for="selsubcategory"></label>
          <select name="selsubcategory" id="selsubcategory">
            <option>Select Subcategory</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>TITLE</td>
        <td><input type="text" name="txttitel" id="txttitel" /></td>
      </tr>
      <tr>
        <td>TIME</td>
        <td><input type="text" name="txttime" id="txttime" /></td>
      </tr>
      <tr>
        <td>INGREDIENTS</td>
        <td><textarea name="txtingrediants" id="txtingrediants" ></textarea></td>
      </tr>
      <tr>
        <td>PREPARATION DETAILS</td>
        <td><textarea name="txtprepration" id="txtprepration" ></textarea></td>
      </tr>
      <tr>
        <td>PHOTO</td>
        <td><input type="file" name="filephoto" id="filephoto" /></td>
      </tr>
      <tr>
        <td colspan="2">
          <div class="center">
            <input type="submit" name="btnsaver" id="btnsaver" value="Save" />
            <input type="reset" name="btncancel" id="btncancel" value="Cancel" />
          </div>
        </td>
      </tr>
    </table>
  </form>
  <br>
  <h2 class="center">Blogs</h2>
  <table  border="1" id="blogs-table" class="center">
    <tr>
      <th width="26">SI NO</th>
      <th width="86">CATEGORY</th>
      <th width="129">SUB CATEGORY</th>
      <th width="41">TITLE</th>
      <th width="37">TIME</th>
      <th width="104">INGREDIENTS</th>
      <th width="139">PREPARATION DETAILS</th>
      <th width="97">PHOTO</th>
      <th width="166">ACTION</th>
    </tr>
    <?php
    $i=0;
    $selQry="select * from tbl_blog b  inner join tbl_subcategory sb on sb.subcategory_id=b.subcategory_id inner join tbl_category c on c.category_id=sb.category_id where b.user_id='".$_SESSION["uid"]."'";
    $row=$Conn->query($selQry);
    while($data=$row->fetch_assoc())
    {
        $i++;
    ?>
    <tr>
      <td><?php  echo $i;?></td>
      <td><?php echo $data["category_name"]  ?></td>
      <td><?php echo $data["subcategory_name"]  ?></td>
      <td><?php echo $data["blog_title"]  ?></td>
      <td><?php echo $data["blog_time"]  ?></td>
      <td><?php echo $data["blog_ingredients"]  ?></td>
      <td><?php echo $data["blog_preprationdetails"]  ?></td>
      <td><img src="../Assets/Files/Recipe/<?php echo $data["blog_photo"]  ?>" alt="Food" width="150" height="150"  ></td>
      <td><a href="Addblog.php?did=<?php echo $data["blog_id"] ?>">Delete</a></td>
    </tr>
    <?php
    }
    ?>
  </table>
</div>
</body>
</html>
<script src="../Assets/Jquery/jQuery.js"></script>
<script>
function getSubcategory(did)
{
    $.ajax({
      url:"../Assets/AjaxPages/AjaxSubcategory.php?did="+did,
      success: function(html){
        $("#selsubcategory").html(html);
      }
    });
}
</script>
<?php
include("Foot.php");
ob_flush();
?>
