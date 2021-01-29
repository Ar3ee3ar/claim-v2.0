<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: claims.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: claims.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Local Directory | Template</title>

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
                <a href="./index.php"><img src="img/logo_edit.png" alt=""></a>
            </div>
            <div class ="logo">
                <a href ="#">                      </a>
            </div>
            <nav class="main-menu mobile-menu">
                <ul>
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="claims.php">Claims</a></li>
                    <li><a href="status.php">Status</a></li>
                    <li><a href="policy.html">Policy</a></li>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero-section set-bg" data-setbg="img/volcano.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero-text">
                        <h1>E-GUARANTEE</h1>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="filter-search">
                            <div class="form-group">
                                <h5>Customer ID</h5>
                                <input class="form-control" name="username" id="username" placeholder="Enter ID (number 5-digit)" maxlength = "5" value="<?php echo $username; ?>">
 								<span class="help-block alert-danger" role="alert"><?php echo $username_err; ?></span>
                           </div>
                            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                <h5>Password</h5>
                                <input type ="password" name="password" class="form-control" id="pwd" placeholder="Enter password">
 								<span class="help-block alert-danger"><?php echo $password_err; ?></span>
                           </div>
							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Login">
							</div>
							</form>
                    </div>
                </div>
            </div>
        </div>
    </section>    <!-- Hero Section End -->

    <!-- Trending Restaurant Section Begin -->
    <section class="trending-restaurant spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Top notebook for your style</h2>
                        <p>Explore some of recommend from us</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="trend-item">
                        <div class="trend-pic">
                            <img src="img/com.jpg" alt="">
                            <div class="rating">-5%</div>
                        </div>
                        <div class="trend-text">
                            <h4>DELL INSPIRON 3593</h4>
                            <span>BLACK</span>
                            <p>โน๊ตบุ๊คสำหรับการใช้งานในชีวิตประจำวัน <br>สีดำ รูปทรงมาตรฐาน ดูเรียบง่าย ใช้งานสะดวก</p>
                            <div class="col-lg-12 text-lg-right">
                                <span>17,900 THB</span>
                            </div>
                        </div>
                        <a href="https://www.jib.co.th/web/product/readProduct/35717/24/NOTEBOOK--%E0%B9%82%E0%B8%99%E0%B9%89%E0%B8%95%E0%B8%9A%E0%B8%B8%E0%B9%8A%E0%B8%84--DELL-INSPIRON-3593-W566055131OPPTHW10--BLACK-" class="primary-btn-buy">Continue Shopping  <i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
                        <!-- Add icon library -->
                        <div class="row">
                            <div class="col-lg-12 text-lg-right">
                                <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                            </div>
                        </div>
                        <div class="tic-text">Hot Pick</div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="trend-item nightlife">
                        <div class="trend-pic">
                            <img src="img/com_1.webp" alt="">
                            <div class="rating">-10%</div>
                        </div>
                        <div class="trend-text">
                            <h4>HP PAVILION 15-EC0033AX</h4>
                            <span>ULTRA VIOLET</span>
                            <p>โน๊ตบุ๊คสำหรับสายGamer <br>ออกแบบให้มีความเหลี่ยมสัน เล่นกับโทนสีม่วง</p>
                            <div class="col-lg-12 text-lg-right">
                                <span>17,900 THB</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="trend-text">
                                <div class="col-lg-12 text-center">
                                    <div class="open">Out of stock</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Add icon library -->
                        <div class="row">
                            <div class="col-lg-12 text-lg-right">
                                <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                            </div>
                        </div>
                        <div class="tic-text">Best Seller</div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="trend-item hotels">
                        <div class="trend-pic">
                            <img src="img/com_2.webp" alt="">
                            <div class="rating">4.6</div>
                        </div>
                        <div class="trend-text">
                            <h4>LENOVO IDEAPAD 3</h4>
                            <span>Black</span>
                            <p>โน้ตบุ๊คทำงานดีไซน์เรียบ สวยน้ำหนักเบา <br>สเปคโดนใจ</p>
                            <div class="col-lg-12 text-lg-right">
                                <span>6,990 THB</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="trend-text">
                                <div class="col-lg-12 text-center">
                                    <div class="open">Out of stock</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Add icon library -->
                        <div class="row">
                            <div class="col-lg-12 text-lg-right">
                                <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star "></span>
                            </div>
                        </div>
                        <div class="tic-text">Hot Pick</div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="trend-item events">
                        <div class="trend-pic">
                            <img src="img/com_3.jpg" alt="">
                            <div class="rating">-5%</div>
                        </div>
                        <div class="trend-text">
                            <h4>HP PAVILION 15-CS3016TX</h4>
                            <span>Silver</span>
                            <p>โน้ตบุ๊คดีไซน์โฉบเฉี่ยว น้ำหนักเบา พกพาสะดวก</p>
                            <div class="col-lg-12 text-lg-right">
                                <span>22,900 THB</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="trend-text">
                                <div class="col-lg-12 text-center">
                                    <div class="open">Out of stock</div>
                                </div>
                            </div>
                        </div>
                        <!-- Add icon library -->
                        <div class="row">
                            <div class="col-lg-12 text-lg-right">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                        <div class="tic-text">Recommend</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Trending Restaurant Section End -->

    <!-- Categories Section Begin -->
    <section class="categories-section spad">
        <div class="container-fluid">
            <div class="categories-left">
                <div class="categories-item set-bg large-img" data-setbg="img/categories/cat-1.png">
                        <a href="https://www.jib.co.th/web/product/product_list/3/32" class="img-hover"><img src="img/zoom-point.png" alt=""></a>
                        <div class="categories-text">
                            <h4>ACER</h4>
                            <p>29 Listings</p>
                        </div>
                    </div>
            </div>
            <div class="categories-right">
                <div class="row">
                    <div class="col-md-6">
                        <div class="categories-item set-bg" data-setbg="img/categories/lenovo.jpg">
                            <a href="https://www.jib.co.th/web/product/product_list/3/124" class="img-hover"><img src="img/zoom-point.png" alt=""></a>
                            <div class="categories-text">
                                <h4>LENOVO</h4>
                                <p>10 Listings</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="categories-item set-bg" data-setbg="img/categories/asus.png">
                            <a href="https://www.jib.co.th/web/product/product_list/3/121" class="img-hover"><img src="img/zoom-point.png" alt=""></a>
                            <div class="categories-text">
                                <h4>ASUS</h4>
                                <p>53 Listings</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="categories-item set-bg" data-setbg="img/categories/hp.png">
                            <a href="https://www.jib.co.th/web/product/product_list/3/123" class="img-hover"><img src="img/zoom-point.png" alt=""></a>
                            <div class="categories-text">
                                <h4>HP</h4>
                                <p>13 Listings</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="categories-item set-bg" data-setbg="img/categories/dell.png">
                            <a href="https://www.jib.co.th/web/product/product_list/3/122" class="img-hover"><img src="img/zoom-point.png" alt=""></a>
                            <div class="categories-text">
                                <h4>DELL</h4>
                                <p>30 Listings</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Testimonial Section Begin -->
    <section class="testimonial-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="testimonial-item owl-carousel">
                        <div class="single-testimonial-item">
                            <img src="img/pro-mix.png" alt="">
                            <p>ภาควิชาวิทยาการคอมพิวเตอร์และสารสนเทศ<br> สาขาวิทยาการคอมพิวเตอร์ (CS)  คณะวิทยาศาสตร์ประยุกต์<br>มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ</p>
                            <h4>นายคุณัช    เฉิดฉาย</h4>
                            <span>5904062630039</span>
                        </div>
                        <div class="single-testimonial-item">
                            <img src="img/pro-zezar.png" alt="">
                            <p>ภาควิชาวิทยาการคอมพิวเตอร์และสารสนเทศ<br> สาขาวิทยาการคอมพิวเตอร์ (CS)  คณะวิทยาศาสตร์ประยุกต์<br>มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ</p>
                            <h4>นางสาวอาซีซ่าร์    ลอดิง</h4>
                            <span>6104062610092</span>
                        </div>
                        <div class="single-testimonial-item">
                            <img src="img/pro-top.png" alt="">
                            <p>ภาควิชาวิทยาการคอมพิวเตอร์และสารสนเทศ<br> สาขาวิทยาการคอมพิวเตอร์ (CS)  คณะวิทยาศาสตร์ประยุกต์<br>มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ</p>
                            <h4>นายชลกวิน    วัตรศิริทรัพย์</h4>
                            <span>6104062610122</span>
                        </div>
                        <div class="single-testimonial-item">
                            <img src="img/pro-aum.png" alt="">
                            <p>ภาควิชาวิทยาการคอมพิวเตอร์และสารสนเทศ<br> สาขาวิทยาการคอมพิวเตอร์ (CS)  คณะวิทยาศาสตร์ประยุกต์<br>มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ</p>
                            <h4>นางสาวเบญญา    ประเสริฐสิริสิทธิ์</h4>
                            <span>6104062620071</span>
                        </div>
                        <div class="single-testimonial-item">
                            <img src="img/pro-bas.png" alt="">
                            <p>ภาควิชาวิทยาการคอมพิวเตอร์และสารสนเทศ<br> สาขาวิทยาการคอมพิวเตอร์ (CS)  คณะวิทยาศาสตร์ประยุกต์<br>มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ</p>
                            <h4>นายอภิสิทธิ์    ผิวผ่อง</h4>
                            <span>6104062620179</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="bg-img">
                <img src="img/testimonial-bg.png" alt="">
            </div>
        </div>
    </section>
    <!-- Testimonial Section End -->

    <!-- How It Works Section Begin -->
    <section class="work-section set-bg" data-setbg="img/line-bg_Fi.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>How to Claims</h2>
                        <p>ถ้าสินค้าเสียหายในเวลาประกัน ส่งมาเคลมกับเราได้!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-work-item">
                        <div class="number">01.</div>
                        <div class="work-text">
                            <h4>เข้าระบบ</h4>
                            <p>ใช้รหัสที่ได้จากการซื้อสินค้าเพื่อเข้าสู่ระบบ</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-work-item">
                        <div class="number">02.</div>
                        <div class="work-text">
                            <h4>ทำการเคลมสินค้า</h4>
                            <p>กรอกหรือแก้ไขข้อมูลตามที่ถูกต้องเลือกวันที่ซื้อสินค้าเพื่อทำการเคลมสินค้า</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-work-item">
                        <div class="number">03.</div>
                        <div class="work-text">
                            <h4>ยืนยัน!</h4>
                            <p>รอบริษัททำการตรวจสอบข้อมูลสินค้าส่งสินค้ามาเคลมกับเราและรอรับได้ภายใน 1 วันทำการ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- How It Works Section End -->

    <!-- App Section Begin -->
    <section class="app-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <img src="img/phone_new.png" alt="">
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="app-text">
                        <div class="section-title">
                            <h2>Get the App now!</h2>
                            <p>Explore some of the best price from us</p>
                        </div>
                        <ul>
                            <li><img src="img/check-icon.png" alt="">เปรียบเทียบราคาโน้ตบุ้คแต่ละรุ่น</li>
                            <li><img src="img/check-icon.png" alt="">ดูรีวิวการใช้งานจากลูกค้าของเรา</li>
                            <li><img src="img/check-icon.png" alt="">ค้นหาปัญหาที่พบมากในกลุ่มผู้ใช้ได้
                            </li>
                        </ul>
                        <a href="#"><img src="img/apple-store.jpg" alt=""></a>
                        <a href="#"><img src="img/google-store.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- App Section End -->



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