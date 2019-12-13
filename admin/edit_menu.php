<?php
    $title="Edit news";
     require_once"header.php"; 
     $menu->set('id',$_GET['id']);

      if (isset($_POST['btnUpdate'])) {
        $err=[];
            if(isset($_POST['title'])&&!empty($_POST['title'])&&trim($_POST['title'])!=''){
                $menu->set('title',$_POST['title']);
            }else{
                $err['title']="Enter title";
            }

            $menu->set('category_id',$_POST['category_id']); 
            $menu->set('name',$_POST['name']);
            $menu->set('description',$_POST['description']);
            $menu->set('status',$_POST['status']);
            $menu->set('updated_date',date('Y-m-d H:i:s'));
            $menu->set('updated_by',$_SESSION['admin_username']);
            if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                move_uploaded_file($_FILES['image']['tmp_name'], 'images/'.$_FILES['image']['name']);
                $menu->set('image',$_FILES['image']['name']);           
            }
            $res= $menu->edit();
     }
    $ref= $menu->getMenusByID();

        $data=$category->list();
        // print_r($data);
     ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Edit news</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                 <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            update News
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php if(isset($res)){?>
                                 <div class="alert alert-success"> <?php echo 'News updated'; ?></div>
                                         <?php   }else if (isset($res) && $res==false){ ?>
                                                 <div class="alert alert-danger"> Error updating news</div>
                                         <?php } ?>
                                    <form role="form" action="" method="post" id="create_form" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control" name="category_id">
                                               
                                                    
                                                        <?php foreach ($data as $d) {
                                                            if ($d->id==$ref[0]->category_id) {?>
                                                <option value="<?php echo $d->id;?>" selected><?php echo $d->name;?></option>
                                                               
                                                            <?php }else{ ?>
                                                <option value="<?php echo $d->id;?>"><?php echo $d->name;?></option>
                                            <?php }}?>
                                            </select>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="name" id="name" required=""value="<?php echo $ref[0]->name; ?>" >
                                            <?php if(isset($err['name'])){?>
                                       <div class="alert alert-danger"> <?php echo $err['name'];?></div>
                                    <?php   } ?>
                                        </div>
                                         <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control ckeditor " name="description"><?php echo $ref[0]->description; ?></textarea>
                                        </div>
                                         <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image" id=image">
                                            <img  height="50px" src="images/<?php echo $ref[0]->image;?>">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>status</label>
                                            <?php if ($ref[0]->status==1) { ?>
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
                                            <?php }else{ ?>
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
                                            <?php }     ?>
                                           
                                           
                                            
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
   <script src="js/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#create_form').validate();
        });
    </script>
