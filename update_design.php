<?php
include("connection.php");
$id = $_GET['id'];

$query = "SELECT * FROM form WHERE id='$id'";
$data = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($data);
$language = $result['language'];
$language1 = explode(",",$language);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update Details!!!</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>UPDATE FORM</h2>
    <form action="" method="POST">
      <label for="fname">First Name</label>
      <input type="text" value="<?php echo $result['fname']; ?>" id="fname" name="fname" required>

      <label for="lname">Last Name</label>
      <input type="text" value="<?php echo $result['lname']; ?>" id="lname" name="lname" required>

      <label for="username">Username</label>
      <input type="text" value="<?php echo $result['username']; ?>" id="username" name="username" required>

      <label for="password">Password</label>
      <input type="text" value="<?php echo $result['password']; ?>" id="password" name="password">

      <label for="gender">Gender</label>
      <select id="gender" name="gender" required>
        <option value="not selected" disabled>Select</option>
        <option value="male" <?php if($result['gender']=='male'){echo "selected";} ?>>Male</option>
        <option value="female" <?php if($result['gender']=='female'){echo "selected";} ?>>Female</option>
        <option value="other" <?php if($result['gender']=='other'){echo "selected";} ?>>Other</option>
      </select>

      <label for="email">Email Address</label>
      <input type="email" value="<?php echo $result['email']; ?>" id="email" name="email" required>

      <div class="input_field" style="margin-bottom: 15px;">
        <label style="margin-right: 10px;">Caste:</label>

          <span style="display: inline-flex; gap: 15px; align-items: center;">
            <label><input type="radio" name="caste" value="General"
            <?php
              if($result[caste]=="General")
              {
                echo "checked";  
              }
            ?>
            > General</label>
            <label><input type="radio" name="caste" value="OBC"
            <?php
              if($result[caste]=="OBC")
              {
                echo "checked";
              }
            ?>
            > OBC</label>
            <label><input type="radio" name="caste" value="SC"
            <?php
              if($result[caste]=="SC")
              {
                echo "checked";
              }
            ?>
            > SC</label>
            <label><input type="radio" name="caste" value="ST"
            <?php
              if($result[caste]=="ST")
              {
                echo "checked";
              }
            ?>
            > ST</label>
          </span>
      </div>

      <div class="input_field" style="margin-bottom: 15px;">
        <label style="margin-right: 10px;">Languages Known</label>

          <span style="display: inline-flex; gap: 15px; align-items: center;">
            <label><input type="checkbox" name="language[]" value="Hindi"
            <?php
            if(in_array(Hindi,$language1))
            {
              echo "checked";
            }
            ?>
            >Hindi</label>
            <label><input type="checkbox" name="language[]" value="English"
            <?php
            if(in_array(English,$language1))
            {
              echo "checked";
            }
            ?>
            > English</label>
            <label><input type="checkbox" name="language[]" value="Gujarati"
             <?php
            if(in_array(Gujarati,$language1))
            {
              echo "checked";
            }
            ?>
            > Gujarati</label>
            
          </span>
      </div>

      <label for="phone">Phone Number</label>
      <input type="tel" value="<?php echo $result['phone']; ?>" id="phone" name="phone" required>

      <label for="address">Address</label>
      <textarea id="address" name="address" rows="3"><?php echo $result['address']; ?></textarea>

      <div class="checkbox-wrapper">
        <input type="checkbox" id="terms" name="terms" required>
        <label for="terms">Agree to terms and conditions</label>
      </div>

      <button type="submit" value="update" name="update_button">Update</button>
    </form>
  </div>
</body>
</html>

<?php
// ---------- Update Logic ----------
if (isset($_POST['update_button'])) {
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

    if (!empty($fname) && !empty($lname) && !empty($username) && !empty($password) && !empty($gender) && !empty($email) && !empty($caste) && !empty($lang1) && !empty($phone) && !empty($address)) {
        $updateQuery = "UPDATE form SET 
            fname='$fname', 
            lname='$lname', 
            username='$username', 
            password='$password', 
            gender='$gender', 
            email='$email',
            caste='$caste',
            language ='$lang1', 
            phone='$phone', 
            address='$address' 
            WHERE id='$id'";

        $data = mysqli_query($conn, $updateQuery);

        if ($data) {
          echo "<script>alert('Data Updated Successfully');</script>";
          echo "<meta http-equiv='refresh' content='1;url=display.php'>";
        } else {
          echo "<script>alert('Failed to Update Data');</script>";
        }
    } else {
        echo "<script>alert('Please Fill All Fields!');</script>";
    }
}
?>
