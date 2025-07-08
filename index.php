<?php include("connection.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Registration Form</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>REGISTRATION FORM</h2>
    <form action="#" method="POST" enctype="multipart/form-data">

      <div class="input-group-horizontal">
        <label class="input_field">Upload Image</label>
        <input type="file" name="uploadfile">
      </div>

      <label for="fname">First Name</label>
      <input type="text" id="fname" name="fname" required>

      <label for="lname">Last Name</label>
      <input type="text" id="lname" name="lname" required>
      
      <label for="username">Username</label>
      <input type="text" id="username" name="username" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>

      <label for="gender">Gender</label>
      <select id="gender" name="gender" required>
        <option value="not selected" disabled selected>Select</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
      </select>

      <label for="email">Email Address</label>
      <input type="email" id="email" name="email" required>

      <div class="input_field">
        <label style="margin-right: 10px;">Caste:</label>
        <span>
            <label><input type="radio" name="caste" value="General"> General</label>
            <label><input type="radio" name="caste" value="OBC"> OBC</label>
            <label><input type="radio" name="caste" value="SC"> SC</label>
            <label><input type="radio" name="caste" value="ST"> ST</label>
        </span>
      </div>

      <div class="input_field">
        <label style="margin-right: 10px;">Languages Known</label>
        <span>
            <label><input type="checkbox" name="language[]" value="Hindi"> Hindi</label>
            <label><input type="checkbox" name="language[]" value="English"> English</label>
            <label><input type="checkbox" name="language[]" value="Gujarati"> Gujarati</label>
        </span>
      </div>

      <label for="phone">Phone Number</label>
      <input type="tel" id="phone" name="phone" required>

      <label for="address">Address</label>
      <textarea id="address" name="address" rows="3"></textarea>

      <div class="checkbox-wrapper">
        <input type="checkbox" id="terms" name="terms" required>
        <label for="terms">Agree to terms and conditions</label>
      </div>

      <button type="submit" value="register" name="register_button">Register</button>
    </form>
  </div>
</body>
</html>


<?php
  if (isset($_POST['register_button'])) {

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "images/".$filename;
    $upload_success = move_uploaded_file($tempname, $folder);
    if ($upload_success){
      echo "Image uploaded successfully<br>";
    }
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $caste = $_POST['caste'];
    $lang = $_POST['language'];
    $lang1 = implode(",",$lang);
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    if (!empty($fname) && !empty($lname) && !empty($username) && !empty($password) && !empty($gender) && !empty($email) && !empty($phone) && !empty($address)) 
    {
      $query = "INSERT INTO form (image,fname, lname, username, password, gender, email,caste,language, phone, address)
      VALUES ('$folder','$fname', '$lname', '$username', '$password', '$gender', '$email','$caste','$lang1', '$phone', '$address')";

      $data = mysqli_query($conn, $query);

      if ($data) {
          echo "<script> alert('Data Inserted Successfully') </script>";
      } else {
        echo "<script>alert('Failed to Insert Data: " . mysqli_error($conn) . "');</script>";
      }

    } else {
        echo "<script>alert('Please Fill The Form!!!');</script>";
    }
}
?>