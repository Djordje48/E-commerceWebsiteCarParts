<?php

function component(){



	$element="<div class="col-md-3 col-sm-6 my-3 my-md-0">
				 <form action="bmw.php" method="post">
					<div class="card shadow">
						<div>
							<img src="slike/autodelovi/bmw/grejac motora.jpg" alt="image1" class="img-fluid card-img-top">
						</div>
						<div class="card-body">
							<h5 class="card-title">Grejac motora</h5>
							<p class="card-text">
								BMW N47/N57N BMW ORIGINAL
							</p>
							<h5>
								<span class="price">5.268,00 DIN</span>
							</h5>
							<button type="submit" class="btn btn-danger my-3" name="add">Dodaj u korpu<i class="fas fa-shopping-cart"></i></button>
						</div>
					</div>
				</form>	
			</div> 
	";
								
		
	
	
	echo $element;
	
}
?>