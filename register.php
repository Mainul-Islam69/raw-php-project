<?php
   session_start();
  
 ?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Gymove - Fitness Bootstrap Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="/Project1/dashboard_asset/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
        .pass_field{
        position: relative;
        }
        .pass_field i{
        position: absolute;
        top: 28px;
        right: 0;
        width:45px;
        height: 56px;
        background: teal;
        color: #ffff;
        line-height: 56px;
        border-radius: 0 10px 10px 0;
        text-align: center;
        }
        </style>
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
					
					<div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.html"><img src="/Project1/dashboard_asset/images/logo-full.png" alt=""></a>
									</div>
                 <h4 class="text-center mb-4 text-white">Sign up your account</h4>
              <form action="register_post.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                  <label class="mb-1 text-white"><strong>Name</strong></label>
                  <input type="text" name="name" class="form-control" placeholder="Name" value ="<?=(isset($_SESSION['nam_val']))?$_SESSION['nam_val']: ''?>">

                  <?php
            if(isset($_SESSION['nam-err'])){ ?>
                        <strong class="text-danger"><?= $_SESSION['nam-err'] ?></strong>
                <?php } ?>
              </div>
              <div class="form-group">
                  <label class="mb-1 text-white"><strong>Email</strong></label>
                  <input type="email" name="email" class="form-control" placeholder="hello@example.com" value="<?=(isset($_SESSION['email_val']))?$_SESSION['email_val']:'' ?>">

                  <?php 
                if(isset($_SESSION['email_err'])){ ?>
                <strong class="text-danger"><?= $_SESSION['email_err'] ?></strong>
            <?php } ?>

              </div>

              <!-- Password field -->
                <div class="form-group pass_field">
                    <label class="mb-1 text-white"><strong>Password</strong></label>
                    <input type="password" id="pass" name="password" class="form-control" value="Password">
                    <i class = "fa fa-eye" onclick="myFunction()"></i>
                    <?php 
                  if(isset($_SESSION['pass_err'])){ ?>
                  <strong class="text-danger"><?= $_SESSION['pass_err'] ?></strong>
                  <?php } ?>
                </div>

                <!-- image field -->
             <div class="form-group">
                <label class="mb-1 text-white"><strong>Image</strong></label>
                <input type="file" name="image" class="form-control" onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0])">
                <div class="my-2">
                <img width="200" src="" id="img" alt="">
            </div>
            </div>

            <!-- Button field -->
            <div class="text-center mt-4">
            
            <button type="submit" class="btn bg-white text-primary btn-block">Sign me up</button>
            </div>
            </form>
            <div class="new-account mt-3">
            <p class="text-white">Already have an account? <a class="text-white" href="login.php">Sign in</a></p>
           </div>

                   </div>
                 </div>
              </div>
             </div>
          </div>
        </div>
     </div>
</div>

<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
<script src="/Project1/dashboard_asset/vendor/global/global.min.js"></script>
<script src="/Project1/dashboard_asset/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="/Project1/dashboard_asset/js/custom.min.js"></script>
<script src="/Project1/dashboard_asset/js/deznav-init.js"></script>

  <!-- sweet alert mssg field -->
<script>
          function myFunction() {
              var x = document.getElementById("pass");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
          }
          
    </script>
         
          <!-- Sweet Alert field -->
     <?php if(isset($_SESSION['success'])){?>
           <script>
           const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000,
              timerProgressBar: true,
              didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

            Toast.fire({
            icon: 'success',
            title: '<?=$_SESSION['success']?>'
          })
           </script>
          <?php } unset($_SESSION['success'])?>

     <?php if(isset($_SESSION['extension'])){?>
           <script>
           Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: '<?=$_SESSION['extension'] ?>',
          
        })
           </script>
          <?php } unset($_SESSION['extension'])?>

</body>
</html>
<?php
 unset($_SESSION['nam-err']);
 unset($_SESSION['email_err']);
 unset($_SESSION['pass_err']);
 unset($_SESSION['nam_val']);
 unset($_SESSION['email_val']);
?>