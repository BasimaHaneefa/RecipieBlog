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
?>
<form id="form1" name="form1" method="post" action="">
<h2 align="center">New Complaints</h2>
  <table  border="1" align="center">
    <tr>
      <th>SL.NO</th>
      <th>TITLE</th>
      <th>COMPLAINT</th>
      <th>DATE</th>
      <th>USERNAME</th>
      <th>ACTION</th>
    </tr>
     <?php
	$i=0;
	$selQry="select * from tbl_complaint c inner join tbl_user u on u.user_id=c.user_id where complaint_status=0";
	$row=$Conn->query($selQry);
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data["complaint_title"] ?></td>
      <td><?php echo $data["complaint_details"] ?></td>
      <td><?php echo $data["complaint_date"] ?></td>
      <td><?php echo $data["user_name"] ?></td>
      <td><a href="Replay.php?cid=<?php  echo $data["complaint_id"]?>">REPLAY</a></td>
    </tr>
    <?php
	}
	?>
  </table>
  <br /><br />
  <h2 align="center">Replied Complaints</h2>
  <table  align="center" border="1">
    <tr>
      <th>SL.N0</th>
      <th>TITLE</th>
      <th>COMPLAINT</th>
      <th>DATE</th>
      <th>REPLAY</th>
      <th>USERNAME</th>
    </tr>
     <?php
	$i=0;
	$selQry="select * from tbl_complaint c inner join tbl_user u on u.user_id=c.user_id where complaint_status=1";
	$row=$Conn->query($selQry);
	while($data=$row->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data["complaint_title"] ?></td>
      <td><?php echo $data["complaint_details"] ?></td>
      <td><?php echo $data["complaint_date"] ?></td>
       <td><?php echo $data["complaint_reply"] ?></td>
      <td><?php echo $data["user_name"] ?></td>
    
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