<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap');
            *{
                font-family: 'Prompt', sans-serif;
            }
            .sL{
                text-align: left;
                list-style-type: circle;
            }
            .sL a{                        
                text-decoration: none;
            }


            .img-comp-container {
                position: relative;
                height: 450px;
            }

            .img-comp-img {
                position: absolute;
                overflow: hidden;
            }

            .img-comp-img img {
                display: block;
                vertical-align: middle;
            }

            .img-comp-slider {
                position: absolute;
                z-index: 9;
                cursor: ew-resize;
                width: 40px;
                height: 40px;
                background-color: #2196F3;
                opacity: 0.7;
                border-radius: 50%;
            }
            
            @media only screen and (max-width: 800px) {
                .hidden-mobile {
                    display: none;
                }
            }
            @media only screen and (min-width: 801px) {
                .hidden-lg {
                    display: none;
                }
            }
        </style>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fontawesome/css/all.min.css">

        <script>
            function initComparisons() {
  var x, i;
  /*find all elements with an "overlay" class:*/
  x = document.getElementsByClassName("img-comp-overlay");
  for (i = 0; i < x.length; i++) {
    /*once for each "overlay" element:
    pass the "overlay" element as a parameter when executing the compareImages function:*/
    compareImages(x[i]);
  }
  function compareImages(img) {
    var slider, img, clicked = 0, w, h;
    /*get the width and height of the img element*/
    w = img.offsetWidth;
    h = img.offsetHeight;
    /*set the width of the img element to 50%:*/
    img.style.width = (w / 2) + "px";
    /*create slider:*/
    slider = document.createElement("DIV");
    slider.setAttribute("class", "img-comp-slider");
    /*insert slider*/
    img.parentElement.insertBefore(slider, img);
    /*position the slider in the middle:*/
    slider.style.top = (h / 2) - (slider.offsetHeight / 2) + "px";
    slider.style.left = (w / 2) - (slider.offsetWidth / 2) + "px";
    /*execute a function when the mouse button is pressed:*/
    slider.addEventListener("mousedown", slideReady);
    /*and another function when the mouse button is released:*/
    window.addEventListener("mouseup", slideFinish);
    /*or touched (for touch screens:*/
    slider.addEventListener("touchstart", slideReady);
    /*and released (for touch screens:*/
    window.addEventListener("touchend", slideFinish);
    function slideReady(e) {
      /*prevent any other actions that may occur when moving over the image:*/
      e.preventDefault();
      /*the slider is now clicked and ready to move:*/
      clicked = 1;
      /*execute a function when the slider is moved:*/
      window.addEventListener("mousemove", slideMove);
      window.addEventListener("touchmove", slideMove);
    }
    function slideFinish() {
      /*the slider is no longer clicked:*/
      clicked = 0;
    }
    function slideMove(e) {
      var pos;
      /*if the slider is no longer clicked, exit this function:*/
      if (clicked == 0) return false;
      /*get the cursor's x position:*/
      pos = getCursorPos(e)
      /*prevent the slider from being positioned outside the image:*/
      if (pos < 0) pos = 0;
      if (pos > w) pos = w;
      /*execute a function that will resize the overlay image according to the cursor:*/
      slide(pos);
    }
    function getCursorPos(e) {
      var a, x = 0;
      e = (e.changedTouches) ? e.changedTouches[0] : e;
      /*get the x positions of the image:*/
      a = img.getBoundingClientRect();
      /*calculate the cursor's x coordinate, relative to the image:*/
      x = e.pageX - a.left;
      /*consider any page scrolling:*/
      x = x - window.pageXOffset;
      return x;
    }
    function slide(x) {
      /*resize the image:*/
      img.style.width = x + "px";
      /*position the slider:*/
      slider.style.left = img.offsetWidth - (slider.offsetWidth / 2) + "px";
    }
  }
}
        </script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">

                <a class="col-lg-1 col-2" href="<?php echo base_url(); ?>">
                    <img src="<?php echo base_url(); ?>img/33.png" alt="" width="100%">
                </a>
                
                <i class="fa-solid fa-bars navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"></i>

                <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
                    <div class="col-0 col-lg-3"></div>
                    <div class="col-12 col-lg-6">
                        <div class="navbar-nav me-auto col-12 d-flex justify-content-evenly">
                            <div class="nav-item mr-3">
                                <a class="nav-link" aria-current="page" href="<?php echo base_url(); ?>">หน้าแรก <br>
                                <small class="text-muted">Home</small></a>
                            </div>
                            <div class="nav-item mr-3">
                                <a class="nav-link" href="<?php echo base_url(); ?>">บริการ <br>
                                <small class="text-muted">Service</small></a>
                            </div>
                            <div class="nav-item mr-3">
                                <a class="nav-link" href="<?php echo base_url(); ?>">โปรโมชั่น <br>
                                <small class="text-muted">Promotion</small></a>
                            </div>
                            <div class="nav-item">
                                <a class="nav-link" href="<?php echo base_url(); ?>">ติดต่อเรา <br>
                                <small class="text-muted">Contact us</small></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-0 col-lg-3"></div>
                </div>


            </div>
        </nav>

        <div class="row m-0">
            <div class="col-12 col-lg-12 d-flex justify-content-center">
                <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <!-- <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                        <img src="<?php echo base_url(); ?>img/banner.png" class="d-block " alt="..." width="100%">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                        </div>
                        <!-- <div class="carousel-item" data-bs-interval="2000">
                        <img src="..." class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                        </div>
                        <div class="carousel-item">
                        <img src="..." class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                        </div> -->
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="row m-0">
            <div class="col-12 p-4" style="background-color: #F7F7F7;">
                <div class="row">
                    <div class="col-0 col-lg-3"></div>
                    <div class="col-12 col-lg-6 hidden-lg">
                        <div class="img-comp-container">
                            <div class="img-comp-img">
                                <img src="<?php echo base_url(); ?>img/33.png" width="400" height="400">
                            </div>
                            <div class="img-comp-img img-comp-overlay">
                                <img src="<?php echo base_url(); ?>img/22.png" width="400" height="400">
                            </div>
                        </div>
                    </div>
                    <div class="col-0 col-lg-6 hidden-mobile">
                        <div class="img-comp-container">
                            <div class="img-comp-img">
                                <img src="<?php echo base_url(); ?>img/33.png" width="800" height="450">
                            </div>
                            <div class="img-comp-img img-comp-overlay">
                                <img src="<?php echo base_url(); ?>img/22.png" width="800" height="450">
                            </div>
                        </div>
                    </div>
                    <div class="col-0 col-lg-3"></div>
                </div>
                
            </div>
        </div>

        <div class="container" style="margin-top: -50px;">
            <div class="row text-center p-3 m-0">
                <div class="col-sm mb-3">
                    <img src="<?php echo base_url(); ?>img/service.jpg" alt="..." 
                    class="rounded-circle mb-3" width="200px" height="200px">
                    <h5>สปา & ทำความสะอาด</h5>
                    <small>ทำความสะอาด บำรุงรักษา</small>
                </div>
                <div class="col-sm">
                    <img src="<?php echo base_url(); ?>img/service.jpg" alt="..." 
                    class="rounded-circle mb-3" width="200px" height="200px">
                    <h5>ทำสี & เพ้นท์</h5>
                    <small>ซ่อมบำรุงรักษาสีกระเป๋า...</small>
                </div>
                <div class="col-sm">
                    <img src="<?php echo base_url(); ?>img/service.jpg" alt="..." 
                    class="rounded-circle mb-3" width="200px" height="200px">
                    <h5>ซ่อมแซมอะไหล่</h5>
                    <small>ซ่อมแซมอะไหล่ชิ้นส่วนกระเป๋า</small>
                </div>
            </div>
        </div>

        <div class="row m-0">
            <div class="col-12 p-4 text-center" style="background-color: #F7F7F7;">
                <br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br>
            </div>
        </div>

        
		<?php require(APPPATH.'views/footer.php'); ?>

        <script>

            initComparisons();

            let tabs = document.querySelectorAll('.tab');
            let content = document.querySelectorAll('.content-item');
            for (let i = 0; i < tabs.length; i++) {            
                tabs[i].addEventListener('click', () => tabClick(i));
            }

            function tabClick(currentTab) {
                removeActive();
                tabs[currentTab].classList.add('active');
                content[currentTab].classList.add('active');
                console.log(currentTab);
            }

            function removeActive() {
                for (let i = 0; i < tabs.length; i++) {
                    tabs[i].classList.remove('active');
                    content[i].classList.remove('active');
                }
            }
            
            if (window.innerWidth < 992) {
                $('#collapseExample').hide();
                let reToProd = `<a href="http://toyotatest.sub-ly.me/product" class="nav-link text-white">สินค้า <br>
                                <small class="text-muted">Products</small></a>`;
                $('#trin').html(reToProd);
            }else{
                let reToProd = `<a class="nav-link text-white">สินค้า <br>
                                <small class="text-muted">Products</small></a>`;
                $('#trin').html(reToProd);
            }

        </script>

    </body>
</html>