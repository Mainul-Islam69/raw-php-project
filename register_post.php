 <?php
    require 'db.php';
    session_start();

    //   print_r($_POST);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $after_hash = password_hash($password, PASSWORD_DEFAULT);
    $uploaded_file = $_FILES['image'];

    $upper = preg_match('@[A-Z]@', $password);
    $lower = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    $special = preg_match('@[$,&,*,!,#]@', $password);
     
 
    $flag = true;

    if (empty($name)) {
        $_SESSION['nam-err'] = 'Please Enter Your Name';
        $flag = false;
    }
    if (empty($email)) {
        $_SESSION['email_err'] = 'Please Enter Your Email';
        $flag = false;
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['email_err'] = 'Please Enter Vaild Email';
            $flag = false;
        }
    }

    if (empty($password)) {
        $_SESSION['pass_err'] = 'Please Enter Your Password';
        $flag = false;
    } else {
        if (!$upper) {
            $_SESSION['pass_err'] = 'Password contain 1 uppercase';
            $flag = false;
        }
        if (!$lower) {
            $_SESSION['pass_err'] = 'Password contain 1 lowercase';
            $flag = false;
        }
        if (!$number) {
            $_SESSION['pass_err'] = 'Password contain 1 number';
            $flag = false;
        }
        if (strlen($password) < 8) {
            $_SESSION['pass_err'] = 'Password contain minimum 8 charcter';
            $flag = false;
        }
    }

    if ($flag) {

        $select = "SELECT COUNT(*) as exist FROM users WHERE email='$email'";
        $select_result = mysqli_query($db_connection, $select);
        $after_assoc = mysqli_fetch_assoc($select_result);

        if($after_assoc['exist'] ==1){
            $_SESSION['extension'] = 'Email Already exist';
            header('location:register.php');
        }
        else{

             $after_explode = explode('.', $uploaded_file['name']);
            $extension = end($after_explode);
            $allowed_extension = array('jpg','png', 'gif', 'jpeg');
            if (in_array($extension, $allowed_extension)) {
                    if ($uploaded_file['size'] <= 512000) {

                    $insert = "INSERT INTO users(name,email,password)VALUES('$name', '$email', '$after_hash')";
                    mysqli_query($db_connection, $insert);
                    $user_id = mysqli_insert_id($db_connection);
                    
                    $file_name= $user_id.'.'.$extension;
                    $new_location = 'uploads/user/'.$file_name;
                    move_uploaded_file($uploaded_file['tmp_name'],$new_location);

                    $update_user = "UPDATE users SET image= '$file_name' WHERE id=$user_id";
                    mysqli_query($db_connection, $update_user);
                    
                    $_SESSION['success'] = 'Registred Successfully';
                    header('location:register.php');
                    
                    } 
            else {
                $_SESSION['extension'] = 'Allowed Extension("jpg","png","gif", "jpeg")';
                header('location:register.php');
            }
            }
            
            else {
                $_SESSION['extension'] = 'Allowed Extension("jpg","png","gif", "jpeg")';
                header('location:register.php');
           }

        }

   }

   else {
        $_SESSION['nam_val'] = $name;
        $_SESSION['email_val'] = $email;
        $_SESSION['pass_val'] = $password;
        header('location:register.php');
    }

    ?> 