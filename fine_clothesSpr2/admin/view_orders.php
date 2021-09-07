<?php
include "inc/header.php";
include "inc/sidebar.php";

?>


<div id="page-wrapper">

            <div class="container-fluid">
			     <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           View Orders
                        </h1>
                         
                    </div>
                </div>
                <!-- /.row -->
				
				
				<div class="row">
				     <div class="col-lg-2 col-sm-2"></div>
				     <div class="col-lg-8 col-sm-8">
					  
					       
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>S.NO</th>
                                        <th>Order Id.</th>
                                        <th>User Id</th>
                                        <th>User Name</th>
                                        <th>City</th>
                                        <th>Address</th>
                                        <th>Total Amount</th>
                                        <th>Order Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php 
								global $con;
								$select = "select * from order_address";
								$run = mysqli_query($con,$select);
								$i = 0;
								while($row=mysqli_fetch_array($run)){
									$id = $row['id'];
									$order_id = $row['order_id'];
                                    $user_id = $row['user_id'];
                                    $order_name = $row['order_name'];
                                    $city = $row['city'];
                                    $address = $row['address'];
                                    $total_amount = $row['total_amount'];
                                    $order_status = $row['order_status'];
								    $i++;
									
									echo "
  
                                    <tr>
                                        <td>$i</td>
                                        <td>$order_id</td>
                                        <td>$user_id</td>
                                        <td>$order_name</td>
                                        <td>$city</td>
                                        <td>$address</td>
                                        <td>$total_amount</td>
                                        <td>$order_status</td>
										 
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
		
		
</div>




