<?php 
    session_start();
    require '../db.php';
    require '../dashboard_parts/header.php';
    
    $select = "SELECT * FROM about_section_images";
    $select_about_image = mysqli_query($db_connection, $select);
   
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-header bg-primary">
            <h3 class="text-white">About Section Image List</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                <tr class="bg-warning">
                <th>SL</th>
                <th>About Sec Image</th>
                <th>Status</th>
                <th>Action</th>
             </tr>
            <?php foreach( $select_about_image as $key=>$about_img){?>
            <tr>
                <td><?=$key+1?></td>
                <td><img width="100" src="../uploads/about/<?=$about_img['about_section_image']?>" alt=""></td>

                <td><a href="ab_img_status.php?id=<?=$about_img['id']?>"><span class="badge bg-<?=($about_img['status'] ==1? 'primary' : 'success')?>"><?=($about_img['status'] ==1? 'Active' : 'Deactive')?></span></a></td>

                <td>
                    <div class="dropdown">
                        <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                            <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="delete_ab_img.php?id=<?=$about_img['id']?>">Delete</a>
                        </div>
                    </div>
                    </td>
             </tr>
            <?php }?>
            </table>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-success">
                    <h3 class="text-white">Add About Section Image</h3>
                </div>
                <div class="card-body">
                    <form action="about_sec_image_post.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="file" name="ab_sec_image" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            <br>
                            <img id="blah" width="100" src="" alt="">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Add Image</button>
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