<?php 
include ('view/header.php');
?>

<!DOCTYPE html>
<html>
<style>
	.button {
  background-color: dodgerblue;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.center-block {
  display: block;
  margin-right: auto;
  margin-left: auto;
}
</style>
<body>

<br>

<form class="form-horizontal" action="saveagent.php" method="post">    
<?php
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$sql = "SELECT * FROM agent where id_agent='$id[$i]'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result))
{ ?>
	<section class = "container" grey-text>
	<table class = "centertable2">

					<form class="white">
		
		<tr>
			<th style=" color:dodgerblue;"> Agent name:
  					<br>
		<input name="id_agent[]" type="hidden" value="<?php echo  $row['id_agent'] ?>" />
			<input name="agent_name[]" type="text" style="font-weight:bold;" value="<?php echo $row['agent_name'] ?>" />
		</th>
	</tr>

	
		
		<tr>
  					<th style=" color:dodgerblue;"> Agent phone:
  					<br>
			<input name="agent_phone[]" type="text" style=" font-weight:bold;" value="<?php echo $row['agent_phone'] ?>" />
		</th>
	</tr>
			
			<tr>
			<th style=" color:dodgerblue;"> Agent position:
  					<br>
			<select name="agent_position[]" class="form-control">
   							<option value=0>--Select position--</option>
      						<?php

      							$query = "SELECT * FROM agent_pos";
      							$result = mysqli_query($conn, $query);
      							while($row = mysqli_fetch_array($result)){
      						?>
      					<option value = <?php echo $row['id_pos'];?>> <?php echo $row['position']; ?> </option>
      				<?php } ?>
   							</select>
		</th>
	</tr>


</table>

	<br />	
<?php 
}
}
?>
<br><input type="submit" class="center-block" name="update" value="UPDATE">
</form>
	<br>
<div class="center">
    <form action="showagents.php">
        <input class="button" type="submit" name="return" value="BACK">
    </form>
</div>
<br><br><br>
</body>
</html>