<?php
ob_start();
session_start();
include("includes/header.php");
include("includes/sidenav.php");
include("includes/topnav.php");
include("includes/db.php");
include("customer-modal.php");

?>  

<div class="row">
    <div class="table-responsive">
    
    <div class="col-12">
    <h1 class="p-2">Customer Data</h1>
    <button id="customer-add" data-target="#customer-add-modal"  data-toggle="modal"  class="btn bg-success m-3 text-white">Add Customer</button>
    <?php
    print_r($_SESSION);
        if(isset($_SESSION['update_msg'])){
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?php
     echo $_SESSION['update_msg'];
    ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
    <?php      
     unset($_SESSION['update_msg']);
       
        }
    ?>

<?php
        if(isset($_SESSION['update_msg_error'])){
    ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?php echo $_SESSION['update_msg_error']?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
    <?php
    unset($_SESSION['update_msg_error']);       
        }
    ?>
    
    <table id="customer-data" class=" p-2 table align-items-center table-light table-flush">
            <thead>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Image</th>
                <th>Age</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <?php
                    $query="select * from customers";
                    $customers=mysqli_query($conn,$query);
                    // print_r($customers);
                    foreach($customers as $customer){
                        echo "<tr>";
                        echo "<td>".$customer['id']."</td>";
                        echo "<td>".$customer['fname']."</td>";
                        echo "<td>".$customer['lname']."</td>";
                        echo "<td>".$customer['img_path']."</td>";
                        echo "<td>".$customer['age']."</td>";
                        echo '<td>
                        <button id="customer-edit" data-target="#customer-edit-modal"  data-toggle="modal"  class="btn bg-info text-white updateBtn">Edit</button>
                        <form action="" method="POST">
                        <input type="hidden" id="delete_id" name="delete_id">
                        <button id="customer-delete" name="customer-delete" type="submit"  class="btn bg-danger text-white">Delete</button>
                        </form>
                        </td>';
                        echo "</tr>";
                    }


                ?>
            </tbody>
        </table>
    </div>
    </div>
    
</div>

<?php
ob_flush();
include("includes/footer.php");
?>

<script>
    $(document).ready(function () {
        // pass update button class
      $('.updateBtn').on('click', function(){

        //pass model id
        $('#customer-edit-modal').modal('show');

        // Get the table row data.
        $tr = $(this).closest('tr');
        //map functions td text extract and save in array
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);
        
        $('#id').val(data[0]);
        $('#fname').val(data[1]);
        $('#lname').val(data[2]);
        $('#age').val(data[4]);   
        $('#delete_id').val(data[0]);   
        });
        
    });
  </script>