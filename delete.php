<?php
include("connection.php");

$id = $_GET['id'];

$query = "DELETE FROM form WHERE id='$id'";
$data = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Record</title>
    <meta http-equiv="refresh" content="2;url=display.php"> 
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding-top: 50px;
        }
        h2 {
            color: green;
        }
    </style>
</head>
<body>

<?php
if ($data) {
    echo "<h2>Record Deleted Successfully!</h2>";
} else {
    echo "<h2 style='color:red;'>Failed To Delete Record</h2>";
}
?>

<p>Redirecting to the records page...</p>

</body>
</html>
