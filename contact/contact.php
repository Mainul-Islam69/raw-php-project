<?php 
    session_start();
    require '../db.php';
    require '../dashboard_parts/header.php';

    $select = "SELECT * FROM contacts";
    $select_contact = mysqli_query($db_connection, $select);
?>

<div class="container-fluid">
    <div class="row">
    <div class="col-lg-8">
    <div class="card">
      <div style="background-color:hotpink" class="card-header">
        <h3 class="text-white">Contact List</h3>
      </div> 
      <div class="card-body">
        <table class="table table-striped">
             <tr>
                <th>SL</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Action</th>
             </tr>
            <?php foreach($select_contact as $key=>$cont){?>
             <tr>
                <td><?=$key+1?></td>
                <td><?=$cont['address']?></td>
                <td><?=$cont['phone']?></td>
                <td><?=$cont['email']?></td>
                <td>
                <div class="dropdown">
                    <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                        <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="delete_contact.php?id=<?=$cont['id']?>">Delete</a>
                    </div>
                </div>
                </td>
             </tr>
             <?php } ?>
        </table>
      </div> 
    </div>
    </div>
    <div class="col-lg-4">
    <div class="card">
    <div style="background-color:blueviolet " class="card-header">
        <h3 class="text-white">Add Contact</h3>
    </div>
    <div class="card-body">
        <form action="contact_post.php" method="POST">
        <div class="mb-3">
        <input type="text" name="address" class="form-control" placeholder="Address">
        </div>

        <div class="mb-3">
        <input type="number" name="phone" class="form-control" placeholder="Phone Number">
        </div>

        <div class="mb-3">
        <input type="email" name="email" class="form-control" placeholder="Email">
        </div>
        <div class="mb-3">
        <button style="background-color: navy" type="submit" class="btn text-white form-control">Add Information</button>
        </div>
        </form>
      </div>
    </div>
  </div>
 </div>
</div>

<?php 
    require '../dashboard_parts/footer.php';
?>