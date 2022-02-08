<?php
require_once ('db/dbhelper.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Quản lí sản phẩm</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <style>
      body {
        font: 400 15px Lato, sans-serif;
        line-height: 1.8;
        color: #818181;
      }
      h2 {
        font-size: 24px;
        text-transform: uppercase;
        color: #303030;
        font-weight: 600;
        margin-bottom: 30px;
      }
      h4 {
        font-size: 19px;
        line-height: 1.375em;
        color: #303030;
        font-weight: 400;
        margin-bottom: 30px;
      }  
      .jumbotron {
        background-color: #f41e1e;
        color: #fff;
        padding: 100px 25px;
        font-family: Montserrat, sans-serif;
      }
      .container-fluid {
        padding: 60px 50px;
      }
      .bg-grey {
        background-color: #f6f6f6;
      }
      .logo-small {
        color: #f41e1e;
        font-size: 50px;
      }
      .logo {
        color: #f41e1e;
        font-size: 200px;
      }
      .thumbnail {
        padding: 0 0 15px 0;
        border: none;
        border-radius: 0;
      }
      .thumbnail img {
        width: 100%;
        height: 100%;
        margin-bottom: 10px;
      }
      .carousel-control.right, .carousel-control.left {
        background-image: none;
        color: #f41e1e;
      }
      .carousel-indicators li {
        border-color: #f4251e;
      }
      .carousel-indicators li.active {
        background-color: #f4251e;
      }
      .item h4 {
        font-size: 19px;
        line-height: 1.375em;
        font-weight: 400;
        font-style: italic;
        margin: 70px 0;
      }
      .item span {
        font-style: normal;
      }
      .panel {
        border: 1px solid #f41e1e; 
        border-radius:0 !important;
        transition: box-shadow 0.5s;
      }
      .panel:hover {
        box-shadow: 5px 0px 40px rgba(0,0,0, .2);
      }
      .panel-footer .btn:hover {
        border: 1px solid #f41e1e;
        background-color: #fff !important;
        color: #f41e1e;
      }
      .panel-heading {
        color: #fff !important;
        background-color: #f41e1e !important;
        padding: 25px;
        border-bottom: 1px solid transparent;
        border-top-left-radius: 0px;
        border-top-right-radius: 0px;
        border-bottom-left-radius: 0px;
        border-bottom-right-radius: 0px;
      }
      .panel-footer {
        background-color: white !important;
      }
      .panel-footer h3 {
        font-size: 32px;
      }
      .panel-footer h4 {
        color: #aaa;
        font-size: 14px;
      }
      .panel-footer .btn {
        margin: 15px 0;
        background-color: #f41e1e;
        color: #fff;
      }
      .navbar {
        margin-bottom: 0;
        background-color: #f41e1e;
        z-index: 9999;
        border: 0;
        font-size: 12px !important;
        line-height: 1.42857143 !important;
        letter-spacing: 4px;
        border-radius: 0;
        font-family: Montserrat, sans-serif;
      }
      .navbar li a, .navbar .navbar-brand {
        color: #fff !important;
      }
      .navbar-nav li a:hover, .navbar-nav li.active a {
        color: #f41e1e !important;
        background-color: #fff !important;
      }
      .navbar-default .navbar-toggle {
        border-color: transparent;
        color: #fff !important;
      }
      footer .glyphicon {
        font-size: 20px;
        margin-bottom: 20px;
        color: #f4251e;
      }
      .slideanim {visibility:hidden;}
      .slide {
        animation-name: slide;
        -webkit-animation-name: slide;
        animation-duration: 1s;
        -webkit-animation-duration: 1s;
        visibility: visible;
      }
      @keyframes slide {
        0% {
          opacity: 0;
          transform: translateY(70%);
        } 
        100% {
          opacity: 1;
          transform: translateY(0%);
        }
      }
      @-webkit-keyframes slide {
        0% {
          opacity: 0;
          -webkit-transform: translateY(70%);
        } 
        100% {
          opacity: 1;
          -webkit-transform: translateY(0%);
        }
      }
      .carousel-inner img {
        -webkit-filter: grayscale(90%);
        filter: grayscale(90%); /* make all photos black and white */
        width: 100%; /* Set width to 100% */
        margin: auto;
      }

      .carousel-caption h3 {
        color: #fff !important;
      }
      @media (max-width: 600px) {
          .carousel-caption {
          display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
          }
      }
      @media screen and (max-width: 768px) {
        .col-sm-4 {
          text-align: center;
          margin: 25px 0;
        }
        .btn-lg {
          width: 100%;
          margin-bottom: 35px;
        }
      }
      @media screen and (max-width: 480px) {
        .logo {
          font-size: 150px;
        }
      }
      </style>
  </head>
  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
      
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="images/anh.PNG" alt="kho hang 1">
            <div class="carousel-caption">
              <h3>New Yorw</h3>
              <p>Kho hàng với khối lượng hàng hóa lớn</p>
            </div>
          </div>
          <div class="item">
            <img src="images/anh1.PNG" alt="Chicago">
            <div class="carousel-caption">
              <h3>Chicago</h3>
              <p>Lực lượng nhân viên quản lý chuyên nghiệp</p>
            </div>
          </div>
          <div class="item">
            <img src="images/anh2.PNG" alt="Los Angeles">
            <div class="carousel-caption">
              <h3>LA</h3>
              <p>Kho bãi rộng rãi, làm việc chuyên nghiệp</p>
            </div>
          </div>
        </div>
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    <div class="container text-center">
        <h1>Công Ty TAN DAT</h1>
        <p>Chuyên cung cấp phần mềm quản lí sản phẩm</p>
        <form class="form-inline">   
            <div class="input-group">
              <input type="email" class="form-control" size="50" placeholder="Địa chỉ Email" required>
              <div class="input-group-btn">
                <button type="button" class="btn btn-danger">Đăng ký</button>
              </div>
            </div>
        </form>
    </div>
    <div id ="about" class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                <h2>Giới thiệu về công ty</h2>
                <h4> Công ty TAN DAT được thành lập ngày 2/1/2000 với 21 năm làm việc trong lĩnh vực quản lý sản phẩm</h4>      
                <p> Những ngày đầu thành lập còn rất nhiều khó khăn như cơ sở vật chất còn chưa được nâng cấp, cách quản lý chưa được tối ưu. Nhưng qua thời gian chúng tôi đã dần cải thiện hệ thống và luôn cập nhật những xu hướng mới, những công nghệ mới của thế giới để mang lại nhiều giá trị cho khách hàng ! Do đó đã có rất nhiều khách hàng tin tưởng, ủng hộ và cùng đồng hàng với chúng tôi. Chúng tôi vô cùng biết ơn những điều đó. Nó như là động lực để thúc đẩy sự phát triển của công ty.</p>
                <button class="btn btn-default btn-lg">Liên hệ ngay !</button>
            </div>
            <div class="col-sm-4">
                <span class="glyphicon glyphicon-signal logo"></span>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-grey">
        <div class="row">
            <div class="col-sm-4">
                <span class="glyphicon glyphicon-globe logo"></span>
            </div>
            <div class="col-sm-8">
                <h2>Giá trị chúng tôi mang lại</h2>
                <h4><strong>Sứ mệnh:</strong> Mang lại thật nhiều giá trị cho khách hàng và mang về nhiều tiền cho công ty, chúng tôi quan niệm giá trị mang lại cho khách là giá trị cốt lõi.</h4>
                <p><strong>Tầm nhìn:</strong> Đến năm 2030 sẽ là 1 trong những công ty lớn nhất thế giới với doanh thu hàng tỷ đô là Mỹ. Giúp xây dựng được một hệ sinh thái hoàn thiện với nhiều giá trị bền vững.</p>
            </div>
        </div>
    </div>
    <div id="services" class="container-fluid text-center">
        <h2>Dịch vụ</h2>
        <h4>Những gì chúng tôi cung cấp</h4>
        <br>
        <div class="row">
          <div class="col-sm-4">
            <span class="glyphicon glyphicon-off logo-small"></span>
            <h4>Sức mạnh</h4>
            <p>Cung cấp động lực cùng nhau phát triển</p>
          </div>
          <div class="col-sm-4">
            <span class="glyphicon glyphicon-heart logo-small"></span>
            <h4>Tình yêu</h4>
            <p>Giúp làm việc một cách hiệu quả hơn</p>
          </div>
          <div class="col-sm-4">
            <span class="glyphicon glyphicon-lock logo-small"></span>
            <h4>Hoàn thành công việc </h4>
            <p>Giúp công việc hoành thành nhanh chóng</p>
          </div>
        </div>
        <br><br>
        <div class="row">
          <div class="col-sm-4">
            <span class="glyphicon glyphicon-leaf logo-small"></span>
            <h4>Bảo vệ môi trường</h4>
            <p>Giữ gìn môi trường xanh - sạch - đẹp</p>
          </div>
          <div class="col-sm-4">
            <span class="glyphicon glyphicon-certificate logo-small"></span>
            <h4>Được công nhận</h4>
            <p>Được nhiều khách hàng trên thế giới tin dùng</p>
          </div>
          <div class="col-sm-4">
            <span class="glyphicon glyphicon-wrench logo-small"></span>
            <h4 style="color:#303030;">Chăm chỉ làm việc</h4>
            <p>Để đem lại thành công ngoài mong đợi</p>
          </div>
        </div>
    </div>
    <div id="portfolio" class="container-fluid text-center bg-grey">
        <h2>Danh mục đầu tư</h2>
        <h4>Những gì chúng tôi tạo ra</h4>
        <div class="row text-center">
          <div class="col-sm-4">
            <div class="thumbnail">
              <img src="images/anh3.jpg" alt="Tối ưu hóa">
              <p><strong>Tối ưu hóa</strong></p>
              <p>Giúp tiết kiệm thời gian và công sức</p>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="thumbnail">
              <img src="images/anh4.png" alt="Chuyên ngiệp">
              <p><strong>Chuyên nghiệp</strong></p>
              <p>Với kinh nghiệm lâu năm trong việc quản lí sản phẩm</p>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="thumbnail">
              <img src="images/anh5.png" alt="Hiện đại">
              <p><strong>Hiện đại</strong></p>
              <p>Được đầu tư máy móc và trang thiết bị tiên tiến</p>
            </div>
          </div>
    </div>
    <h2>Khách hàng nói gì về chúng tôi</h2>
    <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
    <!-- Indicators -->
        <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

    <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <h4>"Tôi rất tin tưởng vào công ty, công ty là số 1. Oke !"<br><span>Trần Tuấn Cảnh, khách hàng</span></h4>
            </div>
            <div class="item">
                <h4>"Đứng đầu thế giới về quản lý đơn hàng"<br><span>Vũ Huy Hoàng, giám đốc TNT</span></h4>
            </div>
            <div class="item">
                <h4>"Dịch vụ thật tuyệt vời !"<br><span>Phan Quân, khách hàng mới</span></h4>
            </div>
        </div>

    <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Trước đó</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Tiếp theo</span>
        </a>
    </div>
    </div>
    <div class="container-fluid">
		<div class="panel panel-primary">
    <div class="text-center">
          <h2>Công ty liên kết và sản phẩm</h2>
        </div>
		
				
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th width="50px">STT</th>
							<th>Tên Công Ty</th>
							
						</tr>
					</thead>
					<tbody>
<?php
//Lay danh sach danh muc tu database
$sql          = 'select * from category';
$categoryList = executeResult($sql);

$index = 1;
foreach ($categoryList as $item) {
	echo '<tr>
				<td>'.($index++).'</td>
				<td><a href="category.php?id='.$item['id'].'">'.$item['name'].'</a></td>
			</tr>';
}
?>
					</tbody>
				</table>
			</div>
		
    </div>
    <div id="contact" class="container-fluid bg-grey">
        <h2 class="text-center">Liên Hệ</h2>
        <div class="row">
          <div class="col-sm-5">
            <p>Liên hệ với chúng tôi, và chúng tôi sẽ liên hệ lại cho bạn trong vòng 24 giờ</p>
            <p><span class="glyphicon glyphicon-map-marker"></span> Số 239, Vũ Tông Phan, Thanh Xuân, Hà Nội</p>
            <p><span class="glyphicon glyphicon-phone"></span> 0975311262</p>
            <p><span class="glyphicon glyphicon-envelope"></span> tandatld2099@gmail.com</p>
          </div>
          <div class="col-sm-7">
            <div class="row">
              <div class="col-sm-6 form-group">
                <input class="form-control" id="name" name="name" placeholder="Tên" type="text" required>
              </div>
              <div class="col-sm-6 form-group">
                <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
              </div>
            </div>
            <textarea class="form-control" id="comments" name="comments" placeholder="Bình luận" rows="5"></textarea><br>
            <div class="row">
              <div class="col-sm-12 form-group">
                <button class="btn btn-default pull-right" type="submit">Gửi</button>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="container-fluid bg-grey">
        <div class="row">
            <div class="col-sm-9">
                <h1 class="text-center">Bản đồ chỉ dẫn</h1>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.94000553318!2d105.81310855060835!3d20.99504188594801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac91bbe795ab%3A0xa7799e6b142bf643!2zMjM5IFAuIFbFqSBUw7RuZyBQaGFuLCBLaMawxqFuZyBUcnVuZywgVGhhbmggWHXDom4sIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1638503339385!5m2!1svi!2s" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="col-sm-3">
                <h1 class="text-center">Fanpage công ty</h1>
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2F20-Sneakers-Gi%C3%A0y-v%C3%A0-ph%E1%BB%A5-ki%E1%BB%87n-Nam-122897072437843%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="100%" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
            </div>
    </div>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">TAN DAT</a>
          </div>
          
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#about">Giới Thiệu</a></li>
              <li><a href="#services">Dịch Vụ</a></li>
              <li><a href="#portfolio">Danh Mục</a></li>
              <li><a href="#pricing">Định Giá</a></li>
              <li><a href="#contact">Liên Hệ</a></li>
              <li><a href="admin/admin-login.php" >Đăng nhập</a></li>
              
            </ul>
            
          </div>
          
        </div>
    </nav>

    <footer class="container-fluid text-center">
        <a href="#myPage" title="To Top">
          <span class="glyphicon glyphicon-chevron-up"></span>
        </a>
        <p>Trang web được tạo bởi Trần Tấn Đạt - B18DCCCN145 - TL209 </p>
    </footer>
    <script>
        $(document).ready(function(){
          // Add smooth scrolling to all links in navbar + footer link
          $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
        
           // Make sure this.hash has a value before overriding default behavior
          if (this.hash !== "") {
        
            // Prevent default anchor click behavior
            event.preventDefault();
        
            // Store hash
            var hash = this.hash;
        
            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
              scrollTop: $(hash).offset().top
            }, 900, function(){
        
              // Add hash (#) to URL when done scrolling (default click behavior)
              window.location.hash = hash;
              });
            } // End if
          });
          $(window).scroll(function() {
          $(".slideanim").each(function(){
          var pos = $(this).offset().top;

          var winTop = $(window).scrollTop();
          if (pos < winTop + 600) {
          $(this).addClass("slide");
          }
          });
         });
        })
    </script>
  </body>
</html>