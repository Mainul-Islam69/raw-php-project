<?php 
    session_start();
    require '../db.php';
    require '../dashboard_parts/header.php';

    $select = "SELECT * FROM brands";
    $select_brands = mysqli_query($db_connection, $select);
?>
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="text-white">Brand List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr class="bg-warning">
                            <th>SL</th>
                            <th>Logo</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach($select_brands as $key=>$brand){ ?>
                        <tr>
                            <td><?=$key+1?></td>
                            <td><img width="100" src="/Project1/uploads/brand/<?=$brand['logo']?>" alt=""></td>
                           <td>
                            <a href="brand_status.php?id=<?=$brand['id']?>"><span class="badge bg-<?=($brand['status'] ==1? 'primary' : 'success')?>"><?=($brand['status'] ==1? 'Active' : 'Deactive')?></span></a>
                           </td>
                           <td>
                            <a href="delete_brand.php?id=<?=$brand['id']?>" class="btn btn-danger">Delete</a>
                           </td>

                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-success">
                    <h3 class="text-white">Add Brand</h3>
                </div>
                <div class="card-body">
                    <form action="brand_post.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="file" name="logo" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            <br>
                            <img id="blah" width="200" src="" alt="">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Add Brand</button>
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