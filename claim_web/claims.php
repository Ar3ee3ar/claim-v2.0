<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}


?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Local Directory | Template</title>
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

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="logo">
                <a href="#"><img src="img/logo_edit.png" alt=""></a>
            </div>
            <div class ="logo">
                <a href ="#">                      </a>
            </div>
            <nav class="main-menu mobile-menu">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li class="active"><a href="claims.php">Claims</a></li>
                    <li><a href="status.php">Status</a></li>
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
                        <h1>Claims System</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- bg Section End -->

    <!--------style-->
    <style>
        * {
          box-sizing: border-box;
        }
        
        body {
          background-color: #f1f1f1;
        }
        
        #regForm {
          background-color: #ffffff;
          margin: 100px auto;
          font-family: Raleway;
          padding: 40px;
          width: 70%;
          min-width: 300px;
        }
        
        h1 {
          text-align: center;  
        }
        
        input {
          padding: 10px;
          width: 100%;
          font-size: 17px;
          font-family: Raleway;
          border: 1px solid #aaaaaa;
        }
        
        /* Mark input boxes that gets an error on validation: */
        input.invalid {
          background-color: #ffdddd;
        }
        
        /* Hide all steps by default: */
        .tab {
          display: none;
        }
        
        button {
          background-color: #4CAF50;
          color: #ffffff;
          border: none;
          padding: 10px 20px;
          font-size: 17px;
          font-family: Raleway;
          cursor: pointer;
        }
        
        button:hover {
          opacity: 0.8;
        }
        
        #prevBtn {
          background-color: none;
        }
        
        /* Make circles that indicate the steps of the form: */
        .step {
          height: 15px;
          width: 15px;
          margin: 0 2px;
          background-color: #bbbbbb;
          border: none;  
          border-radius: 50%;
          display: inline-block;
          opacity: 0.5;
        }
        
        .step.active {
          opacity: 1;
        }
        
        /* Mark the steps that are finished and valid: */
        .step.finish {
          background-color: #4CAF50;
        }
        </style>
    <!--------style End-->

    <!--------js-->
    <script>
	

		$(document).ready(function() {
			
			$("#btnSend").click(function() {
				
					$.ajax({
					   type: "POST",
					   url: "save.php",
					   data: $("#regForm").serialize(),
					   success: function(result) {
							if(result.status == 1) // Success
							{
								alert(result.message); 
							}
							else // Err
							{
								alert(result.message);
							}
					   }
					 });

			});
			
			$("#Clear").click(function() {
				$('#regForm')[0].reset();
			});
	
		});
        </script>
    <!--------js End-->

    <!-- Contact Section Begin -->
    <form id="regForm" method="post" action="javascript:void(0)">

      <div class="col-lg-12 text-lg-right">
        <h5>Fill every filed that have asterisk</h5>
        <small>กรอกทุกจุดที่มีดอกจัน *</small>
    </div>
      
      <!-- One "tab" for each step in the form: -->
      <div class="col-lg-6 form-group">
        <label for="validationCustomCusCode">Customer Username (รหัสลูกค้า) <i class="fa fa-asterisk" aria-hidden="true"></i></label>
        <div class ="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend">@</i></span>
              </div>
            <input type="text" class = "form-control" id="validationCustomCusCode" placeholder="" style="text-transform: uppercase" name="validationCustomCusCode" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>" readonly="readonly" required>
            <div class="invalid-feedback">
                Please input customer username.
            </div>
        </div>
        <small id="helpId" class="text-muted">
            <i class="fas fa-engine-warning">
                do not fill @ - ไม่ต้องเติม @
            </i>
            </small>
		</div>
		<br>
		<div class="col-lg-6  form-group">
        <label for="validationCustomEngName">Name - Surname (ชื่อ-นามสกุล) <i class="fa fa-asterisk" aria-hidden="true"></i></label></label>
        <div class ="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
              </div>
            <input type="text" class = "form-control" id="validationCustomEngName" placeholder="" style="text-transform: uppercase" name="validationCustomEngName" required>
            <div class="invalid-feedback">
                Please input your name.
            </div>
        </div>
        <small id="helpId" class="text-muted">
            <i class="fas fa-engine-warning">
                name before surname and do not fill name title- ชื่อก่อนนามสกุลไม่ต้องเติมคำนำหน้าชื่อ
            </i>
            </small>
          
		</div>
		<br>
		<div class ="col-lg-6">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fa fa-desktop" aria-hidden="true"></i><label for="validationCustomEmail">  Email Address <i class="fa fa-asterisk" aria-hidden="true"></i></label></label></span>
			</div>
			<input type="text" class="form-control" id="validationCustomEmail" placeholder="" name="validationCustomEmail" required>
		</div>
		<br>
        <div class="col-lg-6 form-group">
            <label for="validationCustomTel">Contact number (เบอร์โทรที่ติดต่อได้) <i class="fa fa-asterisk" aria-hidden="true"></i></label></label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-tablet" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" id="validationCustomTel" placeholder="08XXXXXXXX" name="validationCustomTel" maxlength = "10" required>
              <div class="invalid-feedback">
                Please input number.
              </div>
            </div>
          <small id="helpId" class="text-muted">
            <i class="fas fa-engine-warning">
                do not use hyphen - พิมพ์ติดกันทั้งบรรทัดไม่ต้องเติมยัติภังค์ (-)
            </i>
            </small>
        </div>
 		<br>
	   <div class="col-lg-12">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-address-card" aria-hidden="true"></i><label for="validationCustomAdd">  Present Address (ที่อยู่ที่สามารถติดต่อได้) <i class="fa fa-asterisk" aria-hidden="true"></i></label></label></span>
         </div>
         <input type="text" class="form-control" id="validationCustomAdd" placeholder="" name="validationCustomAdd" required>
         <div class="invalid-feedback">
           Please input your address.
         </div>
         <small id="helpId" class="text-muted">
            <i class="fas fa-engine-warning">
                do not forget to fill postal code after address - ใส่รหัสไปรษณีย์ด้วย
            </i>
            </small>
          </div>
		<br>
        <div class="col-lg-12">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-shopping-cart    "></i><label for="validationCustomDate">  Bought date (วันที่ซื้อสินค้า) <i class="fa fa-asterisk" aria-hidden="true"></i></label></label></span>
         </div>
          <input id="datepicker" width="276" id="validationCustomDate" name="validationCustomDate" readonly="readonly"  />
        <script>
            $('#datepicker').datepicker({
                uiLibrary: 'bootstrap4'
            });
        </script>
        </div>
		<br>
        <div class ="col-lg-12">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-desktop" aria-hidden="true"></i><label for="validationCustomModel">  Model (รุ่น) <i class="fa fa-asterisk" aria-hidden="true"></i></label></label></span>
         </div>
          <input type="text" class="form-control" id="validationCustomModel" placeholder="" name="validationCustomModel" required>

        </div>
		<br>
        <div class ="col-lg-12">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-eyedropper" aria-hidden="true"></i><label for="validationCustomColor">  Color (สี) <i class="fa fa-asterisk" aria-hidden="true"></i></label></label></span>
         </div>
          <input type="text" class="form-control" id="validationCustomColor" placeholder="" name="validationCustomColor" required>
        </div>
		<br>
        <div class ="col-lg-12">
          <div class="input-group-prepend">
            <span class="input-group-text"><span class="glyphicon glyphicon-remove"></span><label for="validationCustomoutOrder">  Out of order (อาการเสีย) <i class="fa fa-asterisk" aria-hidden="true"></i></label></label></span>
         </div>
          <input type="text" class="form-control" id="validationCustomoutOrder" placeholder="" name="validationCustomoutOrder" required>
        </div>
        <!--เพิ่มเติมม--หน้านี้ให้กรอกแค่วันที่กับอาการเสียเพิ่ม drop down ของเลขใบเคลมที่ดึงมาจาก db -->
            
      <div style="overflow:auto;">
        <div style="float:right;">
		<div class ="col-lg-6">
		<table style="width:100%">
		<tr>
		<td><a href="logout.php" class="btn btn-danger">Sign Out</a></td>
			<td><input id="Clear" class="btn btn-primary btn-send" value="Clear" readonly="readonly" ></td>
			<td><input id="btnSend" class="btn btn-success btn-send" value="Send" readonly="readonly" ></td>
		</tr>
		</table>
          </div>
        </div>
      </div>
      
      
      </form>
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
    <script src="js/step-form.js"></script>
</body>

</html>