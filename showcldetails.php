<?php
include ('view/header.php');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style>
		* {
			box-sizing: border-box;
		}
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
		.row {
			margin-left:-5px;
			margin-right:-5px;
		}

		.column {
			float: left;
			width: 50%;
			padding: 10px;
		}

		.row::after {

			clear: both;
			display: table;
		}

		.table{
			margin-left: auto;
			margin-right: auto;
			width: 70%;
			border-collapse: collapse;
		}



		.table3{
			margin-left: auto;
			margin-right: auto;
			width: 70%;
			border-collapse: collapse;
		}


		th, td {
			border-style:solid;
			border-color: #96D4D4;
		}

	</style>
</head>
<body>
	<br>

	<table class="table">
		<thead>
			<tr style="height:50px">
				<th style="text-align:center;background-color: #D6EEEE">Client First Name</th>
				<th style="text-align:center;background-color: #D6EEEE">Client Last Name</th>
			</tr>
		</thead>
		<tbody>

			<?php
			if(isset($_GET['id'])){
				$id = mysqli_real_escape_string($conn, $_GET['id']);
				$sql = "SELECT * FROM client where id_client = $id";
				$query=mysqli_query($conn,$sql)or die(mysqli_error());
				while($row=mysqli_fetch_array($query)){
					?>
					<tr>
						<td style="text-align:center; ">
						<br>
						<form method="POST">
							<input type="text" id="client_fname" name="client_fname" value="<?php echo $row['client_fname'] ?>">
						</h4>
						<input type="submit" name="updatefname" value="Update">
						<br><br>
					</form>
				</td>
				<td style="text-align:center; ">
					<br>
						<form method="POST">
							<input type="text" id="client_lname" name="client_lname" value="<?php echo $row['client_lname'] ?>">
						</h4>
						<input type="submit" name="updatelname" value="Update">
						<br><br>
					</form>
				</td>
			</tr>  
		<?php } } ?>     
	</tbody>
</table>

<table class="table3">
	<form method="POST">
		<?php 
		$id = mysqli_real_escape_string($conn, $_GET['id']);
		$sql = "SELECT * FROM client where id_client = $id";
		$query=mysqli_query($conn,$sql)or die(mysqli_error());
		while($row=mysqli_fetch_array($query)){ 
			$id_client = $row['id_client'];
			?>
			<tr>
				<th> 
					<h4>Client address:
					<br>
					<form method="POST">
						<input type="text" id="client_address" name="client_address" value=" <?php echo $row['client_address']; ?>">
					</h4>
					<input type="submit" name="updateadd" value="Update address">
					<br><br>
				</form>
			</th>
		
				<th> 
					<h4>Client phone:
					<br>
					<form method="POST">
						<input type="text" id="client_phone" name="client_phone" value=" <?php echo $row['client_phone']; ?>">
					</h4>
					<input type="submit" name="updateph" value="Update phone">
					<br><br>
				</form>
			</th>
		
				<th> 
					<h4>Client email:
					<br>
					<form method="POST">
						<input type="text" id="client_email" name="client_email" value=" <?php echo $row['client_email']; ?>">
					</h4>
					<input type="submit" name="updateemail" value="Update email">
					<br><br>
				</form>
			</th>
		</tr>

		<tr>
			<th colspan="3">
				<form method="POST">
				<h3>BILL:</h3>
				<br>
				<?php echo $row['client_bill']." lv."; ?>
				<br>
				<br>
				<input type="submit" name="paybill" value="Pay Bill">
			</form>
			</th>
		</tr>

</form>

<?php } ?>
</table>
<?php  

if(isset($_POST['updateadd'])){
	$client_address = $_POST['client_address'];

	$sql1 = "UPDATE client set  client_address = '$client_address' where id_client = $id";


	if(mysqli_query($conn, $sql1))
	{
		mysqli_close($conn); 
		?>
		<script type="text/javascript">
			window.location.href = window.location.href;
		</script>
		<?php 
		exit;
	}
	else
	{
		echo mysqli_error($conn);
	}       
}

if(isset($_POST['updateph'])){
	$client_phone = $_POST['client_phone'];

	$sql2 = "UPDATE client set  client_phone = '$client_phone' where id_client = $id";


	if(mysqli_query($conn, $sql2))
	{
		mysqli_close($conn); 
		?>
		<script type="text/javascript">
			window.location.href = window.location.href;
		</script>
		<?php 
		exit;
	}
	else
	{
		echo mysqli_error($conn);
	}       
}

if(isset($_POST['updateemail'])){
	$client_email = $_POST['client_email'];

	$sql3 = "UPDATE client set  client_email = '$client_email' where id_client= $id";


	if(mysqli_query($conn, $sql3))
	{
		mysqli_close($conn); 
		?>
		<script type="text/javascript">
			window.location.href = window.location.href;
		</script>
		<?php 
		exit;
	}
	else
	{
		echo mysqli_error($conn);
	}       
}

if(isset($_POST['paybill'])){

	$sql4 = "UPDATE client set  client_bill = '0' where id_client= $id";


	if(mysqli_query($conn, $sql4))
	{
		mysqli_close($conn); 
		?>
		<script type="text/javascript">
			window.location.href = window.location.href;
		</script>
		<?php 
		exit;
	}
	else
	{
		echo mysqli_error($conn);
	}       
}

?>

</body>

</html>