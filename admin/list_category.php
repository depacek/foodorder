
    <?php
    $title="list category";
     require_once"header.php";
     $categories=$category->list();
     // print_r($categories);
      ?>
<link rel="stylesheet" type="text/css" href="dist/css/jquery.dataTables.min.css
">
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">list Category</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List Category
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12 table-responsive">
                                    <table class="table table-bordered" id="category_table">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Name</th>
                                                <th>Rank</th>
                                                <th>Status</th>
                                                <th>description</th>
                                                <th>Created Date</th>
                                                <th>Updated Date</th>
                                                <th>Created By</th>
                                                <th>Updated BY</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach ($categories as $cat) { ?>
                                            <tr>
                                                <td><?php echo $i++;?></td>
                                                <td><?php echo $cat->name;?></td>
                                                <td><?php echo $cat->rank;?></td>
                                                <td><?php if ($cat->status==1) {?>
                                                   <span class="label label-success">Active</span>
                                               <?php } else{?>
                                                    <span class="label label-danger">De Active</span>
                                               <?php } ?></td>

                                                <td><?php echo $cat->description;?></td>
                                                <td><?php echo $cat->created_date;?></td>
                                                <td><?php echo $cat->updated_date;?></td>
                                                <td><?php echo $cat->created_by;?></td>
                                                <td><?php echo $cat->updated_by;?></td>
                                                <td>
                                                    <a href="delete_category.php?id=<?php echo $cat->id; ?>" class="btn btn-danger" title="delete" onclick="return confirm('Are you sure want to delete?')"><i class="fa fa-trash"></i></a>
                                                    <a href="edit_category.php?id=<?php echo $cat->id; ?>" class="btn btn-warning" title="edit" onclick="return")"><i class="fa fa-pencil"></i></a>
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
