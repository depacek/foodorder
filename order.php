<?php
  require_once "header.php";
  $category->set('id',$_GET['id']);
  $data= $category->getMenubyCategoryID();
  // print_r($data); 
?>
      <div class="row" style="width: 100%">
        <?php foreach ($data as $item) { ?>

         <div class="card col-md-4" style="width: 18rem; float: left;">
          <img src="admin/images/<?php echo $item->image;?>" class="card-img-top" alt="<?php echo $item->name;?>" height="100px">
          <div class="card-body">
            <h5 class="card-title"><?php echo $item->name;?></h5>
            <p class="card-text"><?php echo $item->description;?></p>
            <a href="order.php?id=<?php echo $item->id ?>" class="btn btn-primary">Place Order</a>
          </div>
        </div>
        <?php } ?>

         <hr/>

         <div class="card col-md-4" style="width: 18rem;">
          <div class="card-body">
          </div>
        </div>

          

         <div class="card col-md-4" style="width: 18rem;">
          <div class="card-body">
          </div>
        </div>
      </div>

    </div>


<!-- <footer class="page-footer font-small blue  head">

  <div class="footer-copyright text-center py-3">© 2019 Copyright:
    <a href=""> Saurav Pokhrel</a>
  </div>

</footer> -->


     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="assets/js/main.js" type="text/javascript"></script>
  </body>
</html>