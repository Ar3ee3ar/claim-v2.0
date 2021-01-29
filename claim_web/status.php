<?php
/* [SEARCH FOR USERS] */
if (isset($_POST['search'])) {
  require "search.php";
}

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Local Directory | Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 4 DatePicker</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<script type="text/javascript">
	$(document).ready(function(){
		$('.search-box input[type="text"]').on("click", function(){
			/* Get input value on change */
			var inputVal = $(this).val();
			var resultDropdown = $(this).siblings(".result");
			if(inputVal.length){
				$.get("search.php", {term: inputVal}).done(function(data){
					// Display the returned data in browser
					resultDropdown.html(data);
				});
			} else{
				resultDropdown.empty();
			}
		});
		
		// Set search input value on click of result item
		/*$(document).on("click", ".result p", function(){
			$(this).parents(".search-box").find('input[type="text"]').val($(this).text());
			$(this).parent(".result").empty();
		});*/
		
	});
</script>
<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="logo">
                <a href="./index.php"><img src="img/logo_edit.png" alt=""></a>
            </div>
            <div class ="logo">
                <a href ="#">                      </a>
            </div>
            <nav class="main-menu mobile-menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="claims.php">Claims</a></li>
                    <li class="active"><a href="status.php">Status</a></li>
                    <li><a href="policy.html">Policy</a></li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- bg Section Begin -->
    <section class="hero-section-claims set-bg" data-setbg="img/bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-text">
                        <h1>Check Status</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- bg Section End -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
					<div class="search-box">
						<input type="text" autocomplete="off" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>" readonly="readonly"/>
						<div class="result"></div>
					</div>
                </div>
				
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section spad">
      <div class="container">
          <div class="row footer-bottom">
              <div class="col-lg-5 order-2 order-lg-1">
                  <div class="copyright"><p class="text-white">
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p></div>
              </div>
              <div class="col-lg-7 text-center text-lg-right order-1 order-lg-2">
                  <div class="footer-menu">
                      <a class="active" href="index.php">Home</a>
                      <a href="claims.php">Claims</a>
                      <a href="status.html">Status</a>
                      <a href="policy.html">Policy</a>
                  </div>
              </div>
              <div class="col-lg-12 text-lg-right">
                  <div class="footer-icon">
                      <a href="#" class="fa fa-facebook-square" aria-hidden="true"></a>
                      <a href="#" class="fa fa-twitter-square" aria-hidden="true"></a>
                      <a href="#" class="fa fa-instagram" aria-hidden="true"></a>
                      <a href="#" class="fa fa-envelope" aria-hidden="true"></a>
                  </div>
              </div>
          </div>
      </div>
  </footer>

    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>