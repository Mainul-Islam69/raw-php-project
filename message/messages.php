<?php 
    session_start();
    require '../db.php';
    require '../dashboard_parts/header.php';

    $select = "SELECT * FROM messages";
    $select_message = mysqli_query($db_connection, $select);
?>
  

    <div class="container">
        <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div style="background-color: darkviolet ;" class="card-header">
                    <h3 class="text-white">Message List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr style="background-color: gray;" class="text-black">
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach($select_message as $key=>$mssg){ ?>
                        <tr style="background-color: <?=$mssg['status'] ==0?'#ddd' : ''?>;">
                            <td><?=$key+1?></td>
                            <td><?=$mssg['name']?></td>
                            <td><?=$mssg['email']?></td>
                            <td><?=$mssg['message']?></td>
                            <td>
                                <a href="message_view.php?id=<?=$mssg['id']?>" class="btn btn-success">View</a>
                                <a href="delete_mssg.php?id=<?=$mssg['id']?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>
<?php 
    require '../dashboard_parts/footer.php';
?>

<?php if(isset($_SESSION['delete'])){?>
    <script>
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-start',
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
            title: '<?=$_SESSION['delete']?>'
            })
    </script>
<?php } unset($_SESSION['delete'])?>