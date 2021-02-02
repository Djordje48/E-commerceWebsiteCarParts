<?php

session_start();
require_once('./php/CreateDb.php');
require_once('./php/component.php');
require_once('./sendEmail.php');



$database=new CreateDb("Productdb","Producttb");
if(isset($_POST['add'])){
	//print_r($_POST['product_id']);
	if(isset($_SESSION['cart'])){
		$item_array_id=array_column($_SESSION['cart'],"product_id");
		
		
		if(in_array($_POST['product_id'],$item_array_id)){
			echo "<script>alert('Proizvod je vec dodat u korpu!')</script>";
			echo "<script>window.location='bmw.php'</script>";
		}else{
			$count=count($_SESSION['cart']);
			$item_array=array(
				'product_id'=>$_POST['product_id']
			);
			$_SESSION['cart'][$count]=$item_array;
			
		}
		
	}else{
		$item_array=array(
			'product_id'=>$_POST['product_id']
		);
		
		$_SESSION['cart'][0]=$item_array;
		//print_r($_SESSION['cart']); 
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
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="http://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
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
				<a href="cart.php"><button style="font-size:24px " class="btn btn-danger">Korpa <i class="fa fa-shopping-cart"></i>
					<?php
						if(isset($_SESSION['cart'])){
							$count=count($_SESSION['cart']);
							echo "<span id=\"cart_count\" style=\"text-align:center; padding: 0 0.9rem 0.1rem 0.9rem; border-radius:3rem; font-family:'Lato-Light';\" class=\"text-secondary bg-light\">$count</span>";
						}else{
							echo "<span id=\"cart_count\" style=\"text-align:center; padding: 0 0.9rem 0.1rem 0.9rem; border-radius:3rem; font-family:'Lato-Light';\" class=\"text-secondary bg-light\">0</span>";
						}
					?>
				</button></a>
			</div>
		</div>
		
		
		<div class="Navigacija">
			<ul>
				<li>
					<a href="index.php">Pocetna</a>
				</li>
				<li>
					<a href="akumulatori.php">Akumulatori</a>
					<ul>
						<li>
							<a href="bosch.php">Bosch</a>
						</li>
						<li>
							<a href="energizer.php">Energizer</a>
						</li>
						<li>
							<a href="varta.php">Varta</a>
						</li>
					</ul>
					
				
				</li>
				<li>
					<a href="motornaulja.php">Motorna ulja</a>
					<ul>
						<li>
							<a href="total.php">Total</a>
						</li>
						<li>
							<a href="castrol.php">Castrol</a>
						</li>
						<li>
							<a href="elf.php">Elf</a>
						</li>
						
					</ul>
					
						
					
				</li>
				<li>
					<a href="delovi.php">Vrste delova</a>
				</li>
				<li>
					<a href="servis.php">Servis</a>
				</li>
				<li class="booking">
					<a href="kontakt.php">Kontakt</a>
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
								<a href="index.php">Pocetna</a>
							</li>
							<li>
								<a href="kontakt.php">Kontakt</a>
							</li>
						
						</ul>
				</div>
				<div class="company">
					<h3>Kontakt</h3>
					<p>Poštovani posetioci, za svaku vašu i najmanju nedoumicu, vezanu za proizvode i poručivanje možete nas kontaktirati. Postoji mogućnost direktnog kontakta putem emaila na ovoj stranici. Tačni kontakt podaci su neophodni radi lakše komunikacije i radi smanjenja mogućnosti greške prilikom poručivanja. Hvala vam na razumevanju.</p>
					<div class="row">
								<div class="col-md-4">
									<h2>Kontakt podaci</h2>
									<p>O-G d.o.o <br> 34000 Kragujevac, Srbija <br> Luja Pastera br:20 <br> 034 361 95 95</p>
									<p>
										
								</div>
								<div class="col-md-4">
									<h2>Radno vreme </h2>
									<p>Pon. – Pet. 8:00 – 16:00 <br> Subotom. 9:00 – 13:00  <br> ogautodelovi@gmail.com</p>
								</div>
								<div class="col-md-4">
									<h2>O-G autoservis</h2>
									<p>Miodraga Vlajica Suke br:33 <br> 034 361 95 93 <br> +381 66 364 855</p>
										
								</div>
					</div>
				</div>
				<div class="contact-title">
					<h2>Kontaktirajte nas</h2>
				</div>
				<div class="contact-form">	
					<form>
					
						<div class="cod-md-6 col-md-offset-3" align="center">
							<input id="name" placeholder="Ime" class="form-control">
							<input id="email" placeholder="Email" class="form-control">
							<input id="subject" placeholder="Naslov" class="form-control">
							<textarea  id="bodyy" placeholder="Poruka" class="form-control"></textarea>
							<input type="button" onclick="sendEmail()" value="Posalji" style="background:#DC143C; border-color:transparent; color:#fff; font-size:20px; font-weight:bold; letter-spacing:2px; height:50px; margin-top:20px; font-family:'PT_Sans-Web-Regular';" >
						</div>
					</form>
					
				</div>
				
				
		</div>
	</div>

	<div id="footer">
		<div>
			<div class="contact">
				<h3>Kontakt informacije</h3>
				<ul>
					<li>
						<b>Adresa:</b> <span>Kragujevac,Luja Pastera br:20</span>
					</li>
					<li>
						<b>Telefon:</b> <span>+38169345867</span>
					</li>
					<li>
						<b>Fiksni:</b> <span>034 361 95 95</span>
					</li>
					<li>
						<b>email:</b> <span>ogautodelovi@gmail.com</span>
					</li>
				</ul>
			</div>
			<div class="contact">
				<h3>Kontakt informacije servis</h3>
				<ul>
					<li>
						<b>Adresa:</b> <span>Miodraga Vlajica Suke br:33</span>
					</li>
					<li>
						<b>Telefon:</b> <span>+38166364855</span>
					</li>
					<li>
						<b>Fiksni:</b> <span>034 361 95 95</span>
					</li>
					<li>
						<b>Radno vreme</b> <span>Pon. – Pet. 8:00 – 16:00 Subotom. 9:00 – 13:00</span>
					</li>
				</ul>
			</div>
			
			<div class="posts">
				<h3>O firmi</h3>
				<ul>
					<li>
						<a>Naziv firme:O-G d.o.o</a>
					</li>
					<li>
						<a>34000 Kragujevac, Srbija</a>
					</li>
					<li>
						<a>Matični broj: 20369185</a>
					</li>
					<li>
						<a>Pib: 105372638 </a>
					</li>
				</ul>
			</div>
			<div class="connect">
				<h3>Ostanite u kontaktu</h3>
				<p>
					<a>Pratite nas na drustvenim mrezama,saznajte novosti o popustima i novim delovima!</a>
				</p>
				<ul>
					<li id="facebook">
						<a href="http://freewebsitetemplates.com/go/facebook/">facebook</a>
					</li>
					<li id="twitter">
						<a href="http://freewebsitetemplates.com/go/twitter/">twitter</a>
					</li>
					<li id="googleplus">
						<a href="http://freewebsitetemplates.com/go/googleplus/">googleplus</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="section">
			<p>
				&copy; this is the copyright area
			</p>
			<ul>
				<li>
					<a href="index.php">Pocetna</a>
				</li>
				<li>
					<a href="akumulatori.php">Akumulatori</a>
				</li>
				<li>
					<a href="motornaulja.php">Motorna ulja</a>
				</li>
				<li>
					<a href="delovi.php">Vrste delova</a>
				</li>
				<li>
					<a href="servis.php">Servis</a>
				</li>
				<li>
					<a href="kontakt.php">Kontakt</a>
				</li>
			</ul>
		</div>
		
		
		
		
		
		
		
	
	
	
	
	</div>
	<script type="text/javascript">
					function sendEmail() {
						
						var name=$("#name");
						var email=$("#email");
						var subject=$("#subject");
						var bodyy=$("#bodyy");
						
						if(isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(bodyy)) {
							$.ajax({
								url: 'sendEmail.php',
								method: 'POST',
								dataType: 'json',
								data: {
									name: name.val(),
									email:email.val(),
									subject: subject.val(),
									bodyy:bodyy.val()
								}, success:function (response) {
									console.log(response);
								}
							});
						}
					}
					
					function isNotEmpty(caller){
						if(caller.val()==""){
							caller.css('border','1px solid red');
							return false;
						}else
							caller.css('border','');
						
						return true;
						
					}
	</script>
</body>
</html>