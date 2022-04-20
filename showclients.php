<?php
include ('view/header.php');	

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
table{
   margin-left: auto;
  margin-right: auto;
  width: 70%;
  border-collapse: collapse;
}

th{
 	background-color: #D6EEEE;
}

 th, td {
 	border-style:solid;
  border-color: #96D4D4;
}

.button {
  background-color: dodgerblue;
  border: none;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
	<link rel="stylesheet" href="css/main.css">
	<title>Clients</title>
</head>
<body>
<form action="editclient.php" method="post">
	<table>
		<div class="alert alert-success">
			<h2 style="text-align:center; ">Clients</h2>
		</div>
		<thead>
			<tr style="height:50px">
				<th style="text-align:center;">Client first name</th>
				<th style="text-align:center;">Client last name</th>
				<th style="text-align:center;">Client phone</th>
				<th style="text-align:center;">Client address</th>
				<th style="text-align:center;">Client email</th>
				<th style="text-align:center;">Details</th>
			</tr>
		</thead>
		<tbody>

		<?php 
		$sql = "SELECT * from client ";
		$query=mysqli_query($conn,$sql)or die(mysqli_error());
		while($row=mysqli_fetch_array($query)){

		?>
			<tr style="height:30px">
				<td style="text-align:center; "><?php echo $row['client_fname'] ?></td>
				<td style="text-align:center; "><?php echo $row['client_lname'] ?></td>
				<td style="text-align:center; "><?php echo $row['client_phone'] ?></td>
				<td style="text-align:center; "><?php echo $row['client_address'] ?></td>
				<td style="text-align:center; "><?php echo $row['client_email'] ?></td>
				<td style="text-align:center; "><a  href="showcldetails.php?id=<?php echo $row['id_client']; ?>">SHOW</a></td>		
		</tr>
		<?php  }  ?>				 
		</tbody>
	</table>
</form>
</body>
<br>
</html>