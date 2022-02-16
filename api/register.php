<?php
 include("connect.php");

 $name = $_POST['name'];
 $mobile = $_POST['mobile'];
 $passward = $_POST['passward'];
 $cpassward = $_POST['cpassward'];
 $address = $_POST['address'];
 $image = $_FILES['photo']['name'];
 $tmp_name = $_FILES['photo']['tmp_name'];

 $role = $_POST['role'];

 if($passward==$cpassward){
    move_uploaded_file($tmp_name, "../uploads/$image");
    $insert = mysqli_query($connect, "INSERT INTO user (name, mobile, address, passward, photo, role, status, votes ) VALUES ('$name', '$mobile', '$address', '$passward', '$image', '$role', 0,0)");
    if($insert){
        echo '
      <script>
         alert("registration successful!");
         window.location = "../"; 
      </script>
     ';
    }
    else{
    echo '
      <script>
         alert("some error occured!");
         window.location = "../routes/register.html"; 
      </script>
     ';
    }
 }
 else{
     echo '
      <script>
         alert("passward and confirm passward does not match!");
         window.location = "../routes/register.html"; 
      </script>
     ';
 }

?>