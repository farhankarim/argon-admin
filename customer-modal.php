<div class="modal fade" id="customer-delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>Are you sure you want to delete this record</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary  " data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger ">Delete</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="customer-edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="customer-add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="post" enctype="multipart/form-data" >
  <div class="form-group">
    <label for="">First Name</label>
    <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name">
  </div>

  <div class="form-group">
    <label for="">Last Name</label>
    <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter First Name">
  </div>

  <div class="form-group">
    <label for="">Age</label>
    <input type="text" class="form-control" id="age" name="age"  placeholder="Enter First Name">
  </div>

  <div class="form-group">
    <label for="">Image</label><br>
    <input type="file" name="img_path" id="img_path">
  </div>
  
 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="insert-customer" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php

if(isset($_POST['insert-customer'])){
  $fname=$_POST["fname"];
  $lname=$_POST["lname"];
  $age=$_POST["age"];
  print_r($_FILES["img_path"]);
  $name=$_FILES["img_path"]["name"];
  $tmp_name=$_FILES["img_path"]["tmp_name"];
  move_uploaded_file($tmp_name,"images/$name");
  $query="insert into customers(fname,lname,age,img_path) values('$fname','$lname','$age',$name);";
  $insert=mysqli_query($conn,$query);
  header("location:customer_crud.php");
}

if(isset($_POST['update-customer'])){
    
}

if(isset($_POST['delete-customer'])){
    
}

?>