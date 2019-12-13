<?php
    $title="create menu";
     require_once"header.php"; 
      if (isset($_POST['btnsave'])) {
        $err=[];
            if(isset($_POST['title'])&&!empty($_POST['title'])&&trim($_POST['title'])!=''){
                $menu->set('title',$_POST['title']);
            }else{
                $err['title']="Enter title";
            }

            $menu->set('category_id',$_POST['category_id']); 
            $menu->set('name',$_POST['name']);
            $menu->set('price',$_POST['price']);
            $menu->set('description',$_POST['description']);
            $menu->set('created_date',date('Y-m-d H:i:s'));
            $menu->set('created_by',$_SESSION['admin_username']);
           
            if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                move_uploaded_file($_FILES['image']['tmp_name'], 'images/'.$_FILES['image']['name']);
                $menu->set('image',$_FILES['image']['name']);           
            }
             $res=   $menu->create();
     }
        $data=$category->list();
     ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Create menu</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                 <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add Elements
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php if(isset($res) && $res>0){?>
                                 <div class="alert alert-success"> <?php echo 'menu created with id='.$res; ?></div>
                                         <?php   }else if (isset($res) && $res==false){ ?>
                                                 <div class="alert alert-danger"> Error creating menu</div>
                                         <?php } ?>
                                    <form role="form" action="" method="post" id="create_form" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Category ID</label>
                                            <select class="form-control" name="category_id">
                                                <option value="">Select Category</option>
                                                <?php foreach ($data as $d) { ?>
                                                <option value="<?php echo $d->id;?>"><?php echo $d->name;?></option>
                                            <?php }?>
                                            </select>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name" id="name" required="" >
                                            <?php if(isset($err['name'])){?>
                                               <div class="alert alert-danger"> <?php echo $err['name'];?></div>
                                            <?php   } ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input type="number" class="form-control" name="price" id="price" required="" >
                                            <?php if(isset($err['price'])){?>
                                               <div class="alert alert-danger"> <?php echo $err['price'];?></div>
                                            <?php   } ?>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control ckeditor" name="description"></textarea>
                                        </div>
                                         <div class="form-group">
                                            <label> Image</label>
                                            <input type="file" name="image" id=image">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>status</label>
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
                                        </div>
                                       
                                        <button type="submit" class="btn btn-info" name="btnsave">Save category</button>
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
   <script src="js/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#create_form').validate();
        });
    </script>
