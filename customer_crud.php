<?php
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
                        <button id="customer-edit" data-target="#customer-edit-modal"  data-toggle="modal"  class="btn bg-info text-white">Edit</button>
                        <button id="customer-delete" data-target="#customer-delete-modal"  data-toggle="modal"  class="btn bg-danger text-white">Delete</button>
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
include("includes/footer.php");
?>