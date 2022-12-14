<?php 
    session_start();
    require '../db.php';
    require '../dashboard_parts/header.php';
    
    $id = $_GET['id'];
    
    $update = "UPDATE messages SET status=1 WHERE id=$id";
    mysqli_query($db_connection, $update);

    $select = "SELECT * FROM messages WHERE id=$id";
    $select_message = mysqli_query($db_connection, $select);
    $after_assoc = mysqli_fetch_assoc($select_message);
?>

<div class="row mt-5">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div style="background-color: mediumorchid;" class="card-header">
            <h3 class="text-white">Message View</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                  <tr>
                    <td>Name :</td>
                    <td><?=$after_assoc['name']?></td>
                  </tr>

                  <tr>
                    <td>Email :</td>
                    <td><?=$after_assoc['email']?></td>
                  </tr>

                  <tr>
                    <td>Message</td>
                    <td><?=$after_assoc['message']?></td>
                  </tr>
                  
                </table>
               
                <a href="messages.php" class="btn btn-primary">Back</a>
            </div>

        </div>
    </div>
</div>

<?php
require '../dashboard_parts/footer.php';
?>