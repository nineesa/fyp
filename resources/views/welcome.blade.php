

</style>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none;}
</style>
@extends('layouts.app2')
@section('content')
<!---728x90--->
<!-- start slider -->

									<!-- <div class="panel panel-default">
										<div class="panel-heading">
											<h2>Portal Pengurusan Latihan UKM</h2>
											<p><span class="hide_text"> </span></p>

										</div>
									</div> -->

		<div class="w3-content w3-display-container">

	<div class="w3-display-container mySlides">
	  <img src="../images/b.jpg" style="width:100%">
	  <div class="w3-display-middle w3-large w3-container w3-padding-16 w3-black">
	    PORTAL PENGURUSAN LATIHAN UKM (e-Latihan)
	  </div>
	</div>

	<div class="w3-display-container mySlides">
	  <img src="../images/b.jpg" style="width:100%">
	  <div class="w3-display-middle w3-large w3-container w3-padding-16 w3-pale-yellow">
			<h3>Place to achieve good results</h3>
 							<h4> Make the best choice for your education</h4>

	  </div>
	</div>

	<div class="w3-display-container mySlides">
	  <img src="../images/b.jpg" style="width:100%">
	  <div class="w3-display-middle w3-large w3-container w3-padding-16 w3-light-gray">
	    Beautiful Mountains
	  </div>
	</div>

	<div class="w3-display-container mySlides">
	  <img src="../images/b.jpg" style="width:100%">
	  <div class="w3-display-middle w3-large w3-container w3-padding-16 w3-black">
	    The Rain Forest
	  </div>
	</div>

	<div class="w3-display-container mySlides">
	  <img src="../images/b.jpg" style="width:100%">
	  <div class="w3-display-middle w3-large w3-container w3-padding-16 w3-black">
	    Mountains!
	  </div>

		<div class="w3-container">
		  <p>A car is a wheeled, self-powered motor vehicle used for transportation. Most definitions of the term specify that cars are designed to run primarily on roads. (Wikipedia)</p>
		</div>
	<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 2000);
		 // Change image every 2 seconds
}
</script>


	</div>
</div>
<!---728x90--->
<div class="footer_bg"><!-- start footer -->
	<div class="container">
		<div class="row  footer">
			<div class="copy text-center">
				<br>
				<p class="link"><span>Hakcipta Terpelihara &copy; 2017 | e-Latihan UKM.</a></span></p>

			</div>
		</div>
	</div>
</div>

@endsection
