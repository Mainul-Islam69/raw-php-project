<?php 
    session_start();
    require '../db.php';
    require '../dashboard_parts/header.php';

    $select = "SELECT * FROM reviews";
    $select_review = mysqli_query($db_connection, $select);
?>

<div class="container-fluid">
    <div class="row">
    <div class="col-lg-8">
    <div class="card">
      <div class="card-header bg-success">
        <h3 class="text-white">Review List</h3>
      </div> 
      <div class="card-body">
        <table class="table table-striped">
             <tr class="bg-">
                <th>SL</th>
                <th>Name</th>
                <th>Title</th>
                <th>Comment</th>
                <th>Image</th>
                <th>Action</th>
             </tr>
            <?php foreach($select_review as $key=>$rew){?>
             <tr>
                <td><?=$key+1?></td>
                <td><?=$rew['name']?></td>
                <td><?=$rew['title']?></td>
                <td><?=substr($rew['comment'], 0, 100). '...more'?></td>
                <td><img width="70" src="../uploads/review/<?=$rew['image']?>" alt=""></td>
                <td>
                <div class="dropdown">
                    <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                        <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="delete_review.php?id=<?=$rew['id']?>">Delete</a>
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
    <div style="background-color: darkorchid;" class="card-header">
        <h3 class="text-white">Add Review</h3>
    </div>
    <div class="card-body">
        <form action="review_post.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
        <input type="text" name="name" class="form-control" placeholder="Name">
        </div>

        <div class="mb-3">
        <input type="text" name="title" class="form-control" placeholder="Title">
        </div>

        <div class="mb-3">
        <input type="text" name="comment" class="form-control" placeholder="Comment">
        </div>

        <div class="mb-3">
        <input type="file" name="img" class="form-control">
        </div>
        <div class="mb-3">
        <button style="background-color: tomato;" type="submit" class="btn text-white form-control">Add Review</button>
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