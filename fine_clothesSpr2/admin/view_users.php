<?php
include "inc/header.php";
include "inc/sidebar.php";

?>


<div id="page-wrapper">

            <div class="container-fluid">
                 <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            View Users
                        </h1>
                             
                    </div>
                </div>
 				
				
				<div class="row">
				     <div class="col-lg-2 col-sm-2"></div>
				     <div class="col-lg-8 col-sm-8">
					  
					       
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>S.NO</th>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php 
								global $con;
								$select = "select * from customer";
								$run = mysqli_query($con,$select);
								$i = 0;
								while($row=mysqli_fetch_array($run)){
									 
                                    $id = $row['c_id'];
									$name = $row['c_name'];
                                    $email = $row['c_email'];
                                    $password = $row['c_pass'];
								    $i++;
									
									echo "
  
                                    <tr>
                                        <td>$i</td>
                                        <td>$id</td>
                                        <td>$name</td>
                                        <td>$email</td>
                                        <td>$password</td>
										<td align='center'>
						   <a href='view_users.php?edit_id=$id' class='btn btn-primary' style=''><i class='fa fa-pencil' aria-hidden='true'></i></a>                            
										</td>
										<td>
										<a href='view_users.php?d_id=$id' class='btn btn-danger' style=''><i class='fa fa-trash-o' aria-hidden='true'></i></a>
										</td>
                                    </tr>
									";
								}
							?>
                                   
                                </tbody>
                            </table>
                        </div>
						
					 </div>
					 <div class="col-lg-2 col-sm-2"></div>
				</div>
				
		</div>
		<?php 
		   if(isset($_GET['edit_id'])){
			   $e_id = $_GET['edit_id'];
			   
			   $select = "select * from customer where c_id='$e_id'";
			   $query = mysqli_query($con,$select);
			   $row=mysqli_fetch_array($query);
				   $name = $row['c_name'];
				   $email = $row['c_email'];
				   $password = $row['c_pass'];
				   echo "<center><div style='width:50%;'>
				   <form method='post' action='view_users.php?u_id=$e_id'>
				   <input class='form-control' name='c_name' value='$name'><br>
				   <input class='form-control' name='c_email' value='$email'><br>
				   <input class='form-control' name='c_pass' value='$password'><br>


			       <button type='submit' class='btn btn-primary' name='update' style='padding:5px;width:20%;font-size:15px;'>UPDATE</button>
                   </form>
				   </div></center>";
			   
			   
		   }
		?>
		
</div>


<?php
if(isset($_GET['d_id'])){
	$id = $_GET['d_id'];
	
	$delete = "delete from customer where c_id=$id";
	$run = mysqli_query($con,$delete);
	
	if($run){
		echo "<script>window.open('view_users.php','_self')</script>";
	}else{
		echo "<script>alert('Something Went Wrong !!')</script>";
		echo "<script>window.open('view_users.php','_self')</script>";
	}
	
	
}


?>

<?php

if(isset($_GET['u_id'])){
	$id = $_GET['u_id'];
	$name = $_POST['c_name'];
	$email = $_POST['c_email'];
	$password = $_POST['c_pass'];
	
	$update = "update customer set c_name='$name', c_email='$email', c_pass='$password' WHERE c_id='$id'";
	$query = mysqli_query($con,$update);
	
	if($query){
		echo "<script>window.open('view_users.php','_self')</script>";
	}else{
		echo "<script>alert('Something Went Wrong')</script>";
	}
}

?>