<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title')</title>
	<base href="{{asset('')}}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Animate.css -->
	<link rel="stylesheet" href="frontend/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="frontend/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="frontend/css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="frontend/css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="frontend/css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="frontend/css/owl.carousel.min.css">
	<link rel="stylesheet" href="frontend/css/owl.theme.default.min.css">

	<!-- Date Picker -->
	<link rel="stylesheet" href="frontend/css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="frontend/css/style.css">
	<link rel="stylesheet" href="frontend/css/custome.css">
	<!-- Modernizr JS -->
	<script src="frontend/js/modernizr-2.6.2.min.js"></script>


</head>
<body>
    @include('frontend.master.header')
    @yield('content')
    @include('frontend.master.sidebar')


	<!-- jQuery -->
	<script src="frontend/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="frontend/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="frontend/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="frontend/js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="frontend/js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="frontend/js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="frontend/js/jquery.magnific-popup.min.js"></script>
	<script src="frontend/js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="frontend/js/bootstrap-datepicker.js"></script>
	<!-- Stellar Parallax -->
	<script src="frontend/js/jquery.stellar.min.js"></script>
	<!-- Main -->
	<script src="frontend/js/main.js"></script>
	<script>
			$(document).ready(function () {

				var quantitiy = 0;
				$('.quantity-right-plus').click(function (e) {

					// Stop acting like a button
					e.preventDefault();
					// Get the field name
					var quantity = parseInt($('#quantity').val());

					// If is not undefined

					$('#quantity').val(quantity + 1);


					// Increment

				});

				$('.quantity-left-minus').click(function (e) {
					// Stop acting like a button
					e.preventDefault();
					// Get the field name
					var quantity = parseInt($('#quantity').val());

					if (quantity > 0) {
						$('#quantity').val(quantity - 1);
					}
				});

			});
		</script>

</body>

</html>