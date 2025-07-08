<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("connection.php");

// Fetch all records
$query = "SELECT * FROM form";
$data = mysqli_query($conn, $query);

if (!$data) {
    die("Query Failed: " . mysqli_error($conn));
}

$total = mysqli_num_rows($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Records</title>

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <style>
        body {
            background: #f0f2f5;
            font-family: Arial, sans-serif;
            padding: 30px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td {
            font-size: 15px;
            color: #333;
        }

        .update {
            background-color: green;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        .delete {
            background-color: red;
            color: white;
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        .no-record {
            text-align: center;
            font-size: 18px;
            color: red;
            margin-top: 20px;
        }

        img {
            border-radius: 8px;
        }
    </style>
</head>

<body>

<h1>Displaying All Records</h1>

<?php
if ($total > 0) {
    echo '<table id="myTable">
            <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Password</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Caste</th>
                <th>Languages</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Operations</th>
            </tr>
            </thead>
            <tbody>';

    while ($result = mysqli_fetch_assoc($data)) {
        echo "<tr>
                <td>".$result['id']."</td>
                <td><img src='".$result['image']."' height='100px' width='100px'></td>
                <td>".$result['fname']."</td>
                <td>".$result['lname']."</td>
                <td>".$result['username']."</td>
                <td>".$result['password']."</td>
                <td>".$result['gender']."</td>
                <td>".$result['email']."</td>
                <td>".$result['caste']."</td>
                <td>".$result['language']."</td>
                <td>".$result['phone']."</td>               
                <td>".$result['address']."</td>
                <td>
                    <a href='update_design.php?id=".$result['id']."'><button class='update'>Update</button></a>
                    <a href='delete.php?id=".$result['id']."' onclick='return checkdelete();'><button class='delete'>Delete</button></a>
                </td>
              </tr>";
    }

    echo "</tbody></table>";
} else {
    echo '<div class="no-record">No Records Found</div>';
}
?>

<!-- DataTable Initialization and Delete Confirmation -->
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

    function checkdelete() {
        return confirm('Are you sure you want to delete this record?');
    }
</script>

</body>
</html>
