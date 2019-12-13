
    <?php
    $title="list Menu";
     require_once"header.php";
     $menus=$menu->list();
     $categories=$category->list();
     // print_r($menus);
      ?>
<link rel="stylesheet" type="text/css" href="dist/css/jquery.dataTables.min.css
">
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">list News</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List News
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12 table-responsive">
                                    <table class="table table-bordered" id="category_table">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Category</th>
                                                <th>Name</th>
                                                <th>description</th>
                                                <th> Image</th>
                                                <th>Status</th>
                                                <th>Created Date</th>
                                                <th>Updated Date</th>
                                                <th>Created By</th>
                                                <th>Updated BY</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach ($menus as $ne) { ?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td><?php foreach ($categories as $c) {
                                                  if ($c->id==$ne->category_id) {
                                                    echo $c->name;
                                                  }
                                                 
                                                } ?></td>
                                                <td><?php echo $ne->name;?></td>
                                                <td><?php echo $ne->description;?></td>
                                                <td><img  height="50px" src="images/<?php echo $ne->image;?>"></td>
                                                <td><?php if ($ne->status==1) {?>
                                                   <span class="label label-success">Active</span>
                                               <?php } else{?>
                                                    <span class="label label-danger">De Active</span>
                                               <?php } ?></td>
                                               <td><?php echo $ne->created_date;?></td>
                                                <td><?php echo $ne->updated_date;?></td>
                                                <td><?php echo $ne->created_by;?></td>
                                                <td><?php echo $ne->updated_by;?></td>
                                                <td>
                                                    <a href="delete_menu.php?id=<?php echo $ne->id; ?>" class="btn btn-danger" title="delete" onclick="return confirm('Are you sure want to delete?')"><i class="fa fa-trash"></i></a>
                                                    <a href="edit_menu.php?id=<?php echo $ne->id; ?>" class="btn btn-warning" title="edit")"><i class="fa fa-pencil"></i></a>
                                                </td>
                                            </tr>
                                        <?php }?>
                                        </tbody>
                                        
                                    </table>
                                    
                                   
                                </div>
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

   <?php require_once"footer.php"; ?>
   <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
   <script type="text/javascript">
       $(document).ready(function() {
    $('#category_table').DataTable();
} );
   </script>
