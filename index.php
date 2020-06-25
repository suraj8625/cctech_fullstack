<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>YouFrame</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<nav>
		<label class="logo">Gallary</label>
	</nav>
<form method="post" enctype="multipart/form-data" autocomplete="off">
<input type="file" name="img1" />
<input  type="submit" name="shop_submit" id="insert" value="upload" class="btn btn-info" >
</form>
</body>
</html>

<?php

if (isset($_POST['shop_submit'])) {

$randimg = rand(00000,11111);

$conn=mysqli_connect('localhost','root','','storeimg') or die(mysqli_error());
$src1 = $_FILES['img1']['tmp_name'];
$dest1 = 'images/'.$randimg.$_FILES['img1']['name'];
$image1 = $randimg.$_FILES['img1']['name'];
if(move_uploaded_file($src1,$dest1))
$image1 = $randimg.$_FILES['image1']['name'];

$qu = "INSERT INTO `uploadimg`( `images`) VALUES ('$image1')";

$sqli = mysqli_query($conn, $qu);
$query="SELECT * FROM 'uploadimg' ORDER BY 'id' DESC";
$sqli = mysqli_query($conn, $query);

if($sqli)
{
$msg =" Successfully Added.";
}else{
$mg = "Error";
}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php  
$conn=mysqli_connect('localhost','root','','storeimg') or die(mysqli_error());
$sql=mysqli_query($conn,"SELECT * FROM uploadimg ORDER BY id DESC");
while($row=mysqli_fetch_array($sql))
{
	?>
	<?php echo $row['images'] ?>
	
	
		<div class="container">
			<div class="box">
				<img src="images/<?=$row['images']?>" width="200">
			</div>
		</div>
	
	


	<?php
}
?>
<footer>
	fullstack challenge-2020
</footer>
</body>
</html>