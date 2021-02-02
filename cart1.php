<?php

session_start();

require_once("php/CreateDb.php");
require_once("php/component1.php");
$db=new CreateDb("Productdb","Producttb1");

if(isset($_POST['remove'])){
	if($_GET['action']=='remove'){
		foreach($_SESSION['cart'] as $key => $value){
			if($value["product_id"]==$_GET['id']){
				unset($_SESSION['cart'][$key]);
				echo "<script>alert('Proizvod je uklonjen!')</script>";
				echo "<script>window.location='cart1.php'</script>";
			}
		}
	}
}

?>




<!DOCTYPE HTML>

<html>
<head>
	<meta charset="UTF-8">
	<title>O-G</title>
	<link rel="stylesheet" href="css/stil.css" type="text/css">
	<link rel="stylesheet" href="css/stil.css" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"/>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	
	<!--[if lt IE 9]>
		<link rel="stylesheet" type="text/css" href="css/iee.css">
	<![endif]-->

</head>	
<body>
	<div id="header">
		<div>
			<a href="index.html" class="logo"><img src="slike/logo.jpg" alt=""></a>
			<form action="index.html">
					<input type="text" name="Pretraga" id="Pretraga" value="">
					<input type="submit" name="pretragaBtn" id="pretragaBtn" value="">
			</form>
			<div class="korpa">
				<button style="font-size:24px " class="btn btn-danger">Korpa <i class="fa fa-shopping-cart"></i><span id="cart_count" style="text-align:center; padding: 0 0.9rem 0.1rem 0.9rem; border-radius:3rem;">0</span></button>
			</div>
		</div>
		
		
		<div class="Navigacija">
			<ul>
				<li>
					<a href="index.html">Pocetna</a>
				</li>
				<li class="selektovano">
					<a href="akumulatori.html">Akumulatori</a>
					<ul>
						<li>
							<a href="bosch.html">Bosch</a>
						</li>
						<li>
							<a href="energizer.html">Energizer</a>
						</li>
						<li>
							<a href="varta.html">Varta</a>
						</li>
					</ul>
					
				
				</li>
				<li>
					<a href="motornaulja.html">Motorna ulja</a>
					<ul>
						<li>
							<a href="services.html">Total</a>
						</li>
						<li>
							<a href="services.html">Castrol</a>
						</li>
						<li>
							<a href="services.html">Elf</a>
						</li>
						
					</ul>
					
						
					
				</li>
				<li>
					<a href="blog.html">Vrste delova</a>
				</li>
				<li>
					<a href="contact.html">Servis</a>
				</li>
				<li class="booking">
					<a href="booking.html">Kontakt</a>
				</li>
			
			</ul>
		</div>
	</div>
	<div id="body">
		<div class="content1">
				<div class="breadcrumb">
					<span>Putanja:</span>
						<ul>
							<li>
								<a href="cart.php">Korpa</a>
							</li>
							
						
						</ul>
				</div>
				
				<div class="container-fluid">
					<div class="row px-5">
						<div class="col-md-7">
							<div class="shopping-cart">
								<h6>Moja Korpa</h6>
								<hr>
								<?php
								$total=0;
								if(isset($_SESSION['cart'])){
									$product_id=array_column($_SESSION['cart'],'product_id');
									$result=$db->getData();
									while($row=mysqli_fetch_assoc($result)){
										foreach($product_id as $id){
											if($row['id']==$id){
												cartElement($row['product_image'],$row['product_name'],$row['product_price'],$row['product_text'],$row['id']);
												$total=$total+(int)$row['product_price'];
												
											}
										}
										
									}
								}else{
									echo "<h5>Korpa je prazna</h5>";
								}
								
								?>																																								
							</div>
						</div>
						<div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
							<div class="pt-4">
								<h6>Detalji cene</h6>
								<hr>
								<div class="row price-details">
									<div class="col-md-6">
									<?php
										if(isset($_SESSION['cart'])){
											$count=count($_SESSION['cart']);
											echo "<h6>Cena($count kol)</h6>";											
										}else{
											echo "<h6>Cena (0 kol) </h6>";
										
										}
									?>
									<h6>Dostava</h6>
									<hr>
									<h6>Ukupno</h6>
									</div>
									<div class="col-md-6">
										<h6><?php echo $total; ?> RSD</h6>
										<h6 class="text-success">Besplatna</h6>
										<hr>
										<h6><?php echo $total?> RSD</h6>
									</div>
								</div>							
							</div>
						</div>
					</div>
				</div>
				
				
				
				
				
		</div>
	</div>
</body>
</html>