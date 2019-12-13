 <?php
    $title="Edit category";
     require_once"header.php"; 
     $category->set('id',$_GET['id']);
    // print_r($data);
     if (isset($_POST['btnUpdate'])) {
        $err=[];
            if(isset($_POST['name'])&&!empty($_POST['name'])&&trim($_POST['name'])!=''){
                $category->set('name',$_POST['name']);
            }else{
                $err['name']="Enter name";
            }
            if(isset($_POST['rank'])&&!empty($_POST['rank'])&&trim($_POST['rank'])!=''){
                $category->set('rank',$_POST['rank']);
            }else{
                $err['rank']="Enter rank";
            }
            $category->set('status',$_POST['status']);
            $category->set('description',$_POST['description']);
            $category->set('updated_date',date('Y-m-d H:i:s'));
            $category->set('updated_by',$_SESSION['admin_username']);
             $res=   $category->edit();
     }

    $data= $category->getCategoryByID();

     ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Edit Category</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Update Category 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php if(isset($res)){?>
                                 <div class="alert alert-success"> <?php echo 'category updated '; ?></div>
                                         <?php   }else if (isset($res) && $res==false){ ?>
                                                 <div class="alert alert-danger"> Error updating category</div>
                                         <?php } ?>
                                    <form role="form" action="" method="post" id="category_form">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name" id="name" required="" value="<?php echo $data[0]->name ?>" >
                                             <?php if(isset($err['name'])){?>
                                       <div class="alert alert-danger"> <?php echo $err['name'];?></div>
                                    <?php   } ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Rank</label>
                                            <input class="form-control" type="number" min="1" name="rank" id="rank" required="" value="<?php echo $data[0]->rank ?>" >
                                             <?php if(isset($err['rank'])){?>
                                       <div class="alert alert-danger"> <?php echo $err['rank'];?></div>
                                    <?php   } ?>
                                        </div>
                                        <div class="form-group">
                                            <label>status</label>
                                            <?php if ($data[0]->status==1) { ?>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="status" id=status" value="1" checked="">Active
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="status" id="status" value="0">De Active
                                                </label>
                                            </div>
                                        <?php }else{?>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="status" id=status" value="1">Active
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="status" id="status" value="0" checked>De Active
                                                </label>
                                            </div>
                                        <?php  }?>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="description"><?php echo $data[0]->description ?></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-info" name="btnUpdate">Update category</button>
                                        <button type="reset" class="btn btn-danger">Cancel</button>
                                    </form>
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
            <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

   <?php require_once"footer.php"; ?>
   <script src="js/validation/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#category_form').validate();
        });
    </script>
