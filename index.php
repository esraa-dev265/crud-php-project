<html>
<head>
<title> welcome to login page</title>

 <h1>fall this form please </h1> </head>
<body>
<form action ="index.php" method ="POST">

<label>Id </label>
<input type ="text" name ="id">

<label> Name </label>
<input type ="text" name ="name">

<label> Address </label>
<input type ="text" name ="address">

<label> Age </label>
<input type ="text" name ="age">

<input type ="submit" name ="save" value ="save">
<input type ="submit" name = "update" value ="update">
<input type ="submit" name ="delete" value ="delete">
<input type ="submit" name ="display" value ="display">

</form>


</body>

</html>
<?php
if(isset($_POST["save"]))
{
	$id =$_POST["id"];
	$name =$_POST["name"];
	$address =$_POST["address"];
	$age=$_POST["age"];
	require_once("connection.php");
	$result =mysqli_query($link ,"INSERT INTO users (id, name, address, age) 
VALUES ('$id','$name','$address','$age')");
	mysqli_close($link);
	if($result)
	{
	echo "added successfully";
	} else echo "added failed :".mysqli_error($link);
}	
 if(isset($_POST["update"]))
 {
	 $id =$_POST["id"];
	 $name =$_POST["name"];
	 $address =$_POST["address"];
	 $age =$_POST["age"];
	 require_once("connection.php");
	 $result= mysqli_query($link ,"update users set name ='$name' ,address ='$address' ,age ='$age' where id ='$id'");
	 if($result)
	 {echo "updated successfully";}
 else echo "updated failed :".mysqli_error($link);
	 mysqli_close($link);
	 
 }
if(isset($_POST["delete"]))
{
	$id =$_POST["id"];
	require_once("connection.php");
	$result = mysqli_query($link ,"delete from users where id ='$id'");
	if($result){echo "row deleted successfully";}
	else echo "deleted failed :".mysqli_error($link);
	mysqli_close($link);
}


if(isset($_POST["display"]))
{
	require_once("connection.php");
	$result = mysqli_query ($link,"select * from users");
	echo "<table border ='1'><tr><th>ID</th><th>Name</th><th>Address</th><th>Age </th></tr> ";
	while ($row =mysqli_fetch_assoc($result))
	{
		echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['address']}</td><td>{$row['age']}</td></tr>";
	
}
echo "</table>";
mysqli_close($link);
}
?>