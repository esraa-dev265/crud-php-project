<?php

// ================= CONNECTION =================
require_once("connection.php");

// ================= SAVE =================
if(isset($_POST["save"]))
{
    $id = $_POST["id"];
    $name = $_POST["name"];
    $address = $_POST["address"];
    $age = $_POST["age"];
 if ( empty($name) || empty($address) || empty($age))
 {
echo "<script> alert('please fill all fields');</script>";
     exit;
     
 }
    $result = mysqli_query($link ,
        "INSERT INTO users (id,name,address,age)
         VALUES ('$id','$name','$address','$age')");

    if($result)
        echo " <script> alert ('Added Successfully')
        ;
       window.location ='index.php'; </script> ";
    else
        echo " <script> alert ('Added failed');
       </script> ";
}


// ================= UPDATE =================
if(isset($_POST["update"]))
{
    $id = $_POST["id"];
    $name = $_POST["name"];
    $address = $_POST["address"];
    $age = $_POST["age"];

     if ( empty($name) || empty($address) || empty($age))
 {
echo "<script> alert('please fill all fields');</script>";
    exit;
     
 }
    $result = mysqli_query($link ,
        "UPDATE users SET
        name='$name',
        address='$address',
        age='$age'
        WHERE id='$id'");

    if($result)
        echo " <script> alert ('Updated Successfully');
      window.location ='index.php'; </script> ";
    else
        echo "<script> alert ('Updated failed');
       </script>";
}


// ================= DELETE =================
if(isset($_POST["delete"]))
{
    $id = $_POST["id"];

    $result = mysqli_query($link ,
        "DELETE FROM users WHERE id='$id'");

    if($result)
        echo " <script> alert (' Deleted Successfully');
       window.location ='index.php';</script>";
    else
        echo " <script> alert (' Deleted failed');
       </script>";
}


// ================= DISPLAY =================
$displayData = false;

if(isset($_POST["display"]))
{
    $displayData = true;
    $result = mysqli_query($link ,"SELECT * FROM users");
}

?>


<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<title>CRUD System</title>

<style>

body{
    font-family: Arial;
    background: linear-gradient(to right,#4facfe,#00f2fe);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.container{
    background:white;
    padding:25px;
    width:350px;
    border-radius:10px;
    box-shadow:0 0 15px rgba(0,0,0,0.3);
}

h1{
    text-align:center;
    color:#333;
}

label{
    display:block;
    margin-top:10px;
    font-weight:bold;
}

input[type=text]{
    width:100%;
    padding:8px;
    margin-top:5px;
    border:1px solid #ccc;
    border-radius:5px;
}

.buttons{
    margin-top:20px;
    display:flex;
    gap:10px;
    flex-wrap:wrap;
}

input[type=submit]{
    flex:1;
    padding:8px;
    background:#4facfe;
    border:none;
    color:white;
    font-weight:bold;
    border-radius:5px;
    cursor:pointer;
}

input[type=submit]:hover{
    background:#00c6fb;
}

table{
    margin-top:20px;
    width:100%;
    border-collapse:collapse;
}

th,td{
    padding:7px;
    border:1px solid #ccc;
    text-align:center;
}

th{
    background:#4facfe;
    color:white;
}

</style>

</head>

<body>

<div class="container">

<h1>CRUD System</h1>

<form method="POST">

<label>ID</label>
<input type="text" name="id">

<label>Name</label>
<input type="text" name="name">

<label>Address</label>
<input type="text" name="address">

<label>Age</label>
<input type="text" name="age">


<div class="buttons">

<input type="submit" name="save" value="Save">
<input type="submit" name="update" value="Update">
<input type="submit" name="delete" value="Delete">
<input type="submit" name="display" value="Display">

</div>

</form>


<?php
// ============== SHOW DATA ==============
if($displayData)
{
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Age</th>
          </tr>";

    while($row = mysqli_fetch_assoc($result))
    {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['address']}</td>
                <td>{$row['age']}</td>
              </tr>";
    }

    echo "</table>";
}
?>

</div>

</body>
</html>
