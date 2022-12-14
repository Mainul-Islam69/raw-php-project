<?php 
    session_start();
    require '../db.php';
    require '../dashboard_parts/header.php';
    
    $select = "SELECT * FROM banner_images";
    $select_banner_image = mysqli_query($db_connection, $select);
   
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-header bg-primary">
            <h3 class="text-white">Banner Image List</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                <tr class="bg-warning">
                <th>SL</th>
                <th>Banner Image</th>
                <th>Status</th>
                <th>Action</th>
             </tr>
            <?php foreach( $select_banner_image as $key=>$banner_img){?>
            <tr>
                <td><?=$key+1?></td>
                <td><img width="100" src="../uploads/banner/<?=$banner_img['banner_image']?>" alt=""></td>

                <td><a href="banner_img_status.php?id=<?=$banner_img['id']?>"><span class="badge bg-<?=($banner_img['status'] ==1? 'primary' : 'success')?>"><?=($banner_img['status'] ==1? 'Active' : 'Deactive')?></span></a></td>

                <td>
                    <div class="dropdown">
                        <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                            <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                        </button>
                        <div class="dropdown-menu">
                            <button data-link="delete_banner_img.php?id=<?=$banner_img['id']?>" class="dropdown-item delete_btn" >Delete</button>
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
                    <h3 class="text-white">Add Banner Image</h3>
                </div>
                <div class="card-body">
                    <form action="banner_image_post.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="file" name="banner-image" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
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

<script>
    $('.delete_btn').click(function(){
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
           var link = $(this).attr('data-link');
           window.location.href = link;
        }
        })
    })
</script>

<?php if(isset($_SESSION['delete'])){?>
    <script>
       Swal.fire(
      'Deleted!',
      '<?=$_SESSION['delete']?>',
      'success'
    )
    </script>

<?php } unset($_SESSION['delete'])?>

