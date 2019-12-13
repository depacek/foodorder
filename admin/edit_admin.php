<?php
    $title="create Admin";
     require_once"header.php"; 
     $admin->set('id',$_GET['id']);
     $d= $admin->getAdminByID();
      if (isset($_POST['btnUpdate'])) {
        $err=[];
            if(isset($_POST['name'])&&!empty($_POST['name'])&&trim($_POST['name'])!=''){
                $admin->set('name',$_POST['name']);
            }else{
                $err['name']="Enter name";
            }
            if(isset($_POST['username'])&&!empty($_POST['username'])&&trim($_POST['username'])!=''){
                $admin->set('username',$_POST['username']);
            }else{
                $err['username']="Enter username";
            }
            if(isset($_POST['password'])&&!empty($_POST['password'])&&trim($_POST['password'])!=''){
                if ($d[0]->password==$_POST['password']) {
                    $admin->set('password',$d[0]->password);
                }else{
                    $admin->set('password',md5($_POST['password']));

                }
            }else{
                $err['password']="Enter password";
            }
            if(isset($_POST['email'])&&!empty($_POST['email'])&&trim($_POST['email'])!=''){
                $admin->set('email',$_POST['email']);
            }else{
                $err['email']="Enter email";
            }
            if(isset($_POST['role'])&&!empty($_POST['role'])&&trim($_POST['role'])!=''){
                $admin->set('role',$_POST['role']);
            }else{
                $err['role']="Enter role";
            }

            
            $admin->set('name',$_POST['name']);
            $admin->set('username',$_POST['username']);
            $admin->set('password',$_POST['password']);
            $admin->set('email',$_POST['email']);
            $admin->set('role',$_POST['role']);
            $admin->set('status',$_POST['status']);
            
            $admin->set('last_login',date('Y-m-d H:i:s'));
            // $admin->set('created_by',$_SESSION['admin_username']);
            $res=   $admin->edit();
     }

     $data= $admin->getAdminByID();
     // print_r($data);

     ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Add Admin</h1>
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
                                    <?php if(isset($res) ){?>
                                 <div class="alert alert-success"> <?php echo 'Admin updated '; ?></div>
                                         <?php   }else if (isset($res) && $res==false){ ?>
                                                 <div class="alert alert-danger"> Error updating Admin</div>
                                         <?php } ?>
                                    <form role="form" action="" method="post" id="create_admin" novalidate="">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name" id="name" required="" value="<?php echo $data[0]->name ?>" >
                                            <?php if(isset($err['name'])){?>
                                       <div class="alert alert-danger"> <?php echo $err['name'];?></div>
                                    <?php   } ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" name="username" id="username" required="" value="<?php echo $data[0]->username ?>" >
                                            <?php if(isset($err['username'])){?>
                                       <div class="alert alert-danger"> <?php echo $err['username'];?></div>
                                    <?php   } ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" name="password" id="password" type="password" required="" value="<?php echo $data[0]->password ?>" >
                                            <?php if(isset($err['password'])){?>
                                       <div class="alert alert-danger"> <?php echo $err['password'];?></div>
                                    <?php   } ?>
                                        </div>
                                         <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control"  name="email" type="email" autofocus required="" value="<?php echo $data[0]->email; ?>">
                                            <?php if(isset($err['email'])){?>
                                               <div class="alert alert-danger"> <?php echo $err['email'];?></div>
                                            <?php   } ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Role</label>
                                            <input class="form-control" name="role" id="role" required="" value="<?php echo $data[0]->role; ?>" >
                                            <?php if(isset($err['role'])){?>
                                       <div class="alert alert-danger"> <?php echo $err['role'];?></div>
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
            // $('#create_admin').validate();
        });
    </script>
