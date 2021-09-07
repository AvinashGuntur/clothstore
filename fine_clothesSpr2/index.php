   
	<?php include "inc/header.php"; ?>
	
	<!---Slider Starts--->
	<?php include "inc/slider.php"; ?>
 
	
	
	<section>
		<div class="container">
			<div class="row">
			
		 	
				<div class="col-sm-12 padding-0">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
				        
						
						<?php
						$select = "select * from product ORDER BY RAND() LIMIT 0,6";
						$run = mysqli_query($con,$select);
						
							
						
						while($row=mysqli_fetch_array($run)){
							$id = $row['id'];
							$name = $row['p_name'];
							$image = $row['p_image'];
							$price = $row['p_price'];
							
							
							
						
						
						?>
						<div class="col-sm-2">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
									<a href="product_details.php?pid=<?php echo $row['id'];?>" class="btn btn-default add-to-cart padding-0" id='$id'><img src="admin/images/<?php echo $image; ?>" alt="" ></a>
										<h2><span>Rs.</span><?php echo $price; ?></h2>
										<p><?php echo $name; ?></p>
										<a href="javascript:void(0)" class="btn btn-default add-to-cart" onclick="cart(<?php echo $id; ?>)"><i class="fa fa-shopping-cart"></i>Add to cart</a>
 									</div>
									
 								</div>
								
							</div>
						</div>
						<?php } ?>
						
						
					</div><!--features_items-->
				
					
					
				</div>
			</div>
		</div>
	</section>
  <!---Footer Starts--->
	<?php include "inc/footer.php"; ?>
	<!---Footer Ends--->
<script>
	 
		function cart($pro_id){
		var p_id = $pro_id;
		
		$.ajax({
			url:"function.php",
			method:"post",
			data:{p_id:p_id},
			success: function($data){
			    if($data > 0){
					notif({
						msg:"Product Already Added !!!",
						type:"warning",
						width:330,
						height:40,
						timeout:1000,
						
					})
					
				}else{
					notif({
						msg:"Added to Cart",
						type:"success",
						width:330,
						height:40,
						timeout:1000,
						
					})
				}
				   	
			}
			
		})
		
	}

	</script>
	<?php
	if(isset($_GET['logout'])){
		echo "<script>
		window.open('index.php','_self')
		alert('You have logged out successfully')</script>";
		
	}
	
	if(isset($_GET['login'])){
		echo "<script>
		window.open('index.php','_self')
		alert('login successfully')

					</script>
		";
		
	}

		
	
 
	
	
	?>


