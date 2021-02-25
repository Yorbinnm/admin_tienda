


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.1/assets/owl.carousel.css'>
    <link rel="stylesheet" href="css/styles.css">
    <title>Imperial Herb</title>
</head>
<body> 

<section id="modal">

    <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
      <div class="modal-content bg-imperial">
        <div class="modal-header text-center">
          <h1 class="modal-title w-100 blanco" id="exampleModalLongTitle">IMPERIAL HERB</h1>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body justify-content-center w-100">
          <h3 class="blanco">ARE YOU 21 YEARS OF AGE OLDER?</h3>
            </div>
        <div class="modal-footer justify-content-center">
            <a href="#"><h3 class="font-weight-bold blanco mr-4" data-dismiss="modal">YES</h3></a>
            <a href="#"><h3 class="font-weight-bold blanco ml-4">NO</h3></a>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="menu">
    <nav class="navbar navbar-expand-lg navbar-dark bg-imperial-menu fixed-top">

        <!--  Show this only on mobile to medium screens  -->
          <a class="navbar-brand d-lg-none" href="#">Navbar</a>
        
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle" aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
        <!--  Use flexbox utility classes to change how the child elements are justified  -->
          <div class="collapse navbar-collapse justify-content-between" id="navbarToggle">
        
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Shop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Merch</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
            </ul>
            
            
            <div class="mr-5">
              <div class="mr-5">
                <a class="navbar-brand d-none d-lg-block mr-5" href="#">Imperial Herb</a>
              </div>
            </div>

            
            
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-lg fa-shopping-cart"></i></a>
              </li>
              <li class="nav-item">
                <button style="border-radius: 60px;" type="button" class="btn btn-primary-outline btn-sm mt-1">Shop now</button>
              </li>
            </ul>
          </div>
        </nav>
</section>
<section id="cabecera">
  
  <!-- Full Page Image Header with Vertically Centered Content -->
  <header class="masthead">
    <div class="container h-100 align-items-center">
      <div class="row h-100 align-items-center">
        <div class="col-12 text-center">
          <h1 class="font-weight-lighter blanco fuente-imperial">IMPERIAL HERB</h1>
          <h1 class="font-weight-bold blanco">LOS ANGELES</h1>
          <button type="button" class="btn btn-primary-outline btn-lg">Shop now</button>
        </div>
      </div>
    </div>
  </header>
</section>

<section id="carrusel" class="mt-3 mb-3">
    <div class="container-fluid bg-imperial2">
      <div class="row align-items-center">
        <div class="col-lg-12 mt-3 aling-self-center text-center">
          <h1 font-weight-bold blanco >NEWEST STRAINS</h1>
        </div>
      </div>
      
      <div class="row align-items-center">
          <div class="col-12 col-carousel">
              <div class="owl-carousel carousel-main">
                  <div class="grid d-flex flex-column align-items-center justify-content-center"><img class="img-responsive" src="<?php echo base_url(); ?>img/header.png" alt=""><h5 class="text-center logoFont">Slide 1</h5>
                  </div>
                  <div class="grid d-flex flex-column align-items-center justify-content-center"><img class="img-responsive" src="/home/fernando/Desktop/Vfinal/img/header.png" alt=""><h5 class="text-center logoFont">Slide 2</h5>
                  </div>
                  <div class="grid d-flex flex-column align-items-center justify-content-center"><img class="img-responsive" src="/home/fernando/Desktop/Vfinal/img/header.png" alt=""><h5 class="text-center logoFont">Slide 3</h5>
                  </div>
                  <div class="grid d-flex flex-column align-items-center justify-content-center"><img class="img-responsive" src="/home/fernando/Desktop/Vfinal/img/header.png" alt=""><h5 class="text-center logoFont">Slide 4</h5>
                  </div>
                  <div class="grid d-flex flex-column align-items-center justify-content-center"><img class="img-responsive" src="/home/fernando/Desktop/Vfinal/img/header.png" alt=""><h5 class="text-center logoFont">Slide 5</h5>
                  </div>
                  <div class="grid d-flex flex-column align-items-center justify-content-center"><img class="img-responsive" src="/home/fernando/Desktop/Vfinal/img/header.png" alt=""><h5 class="text-center logoFont">Slide 6</h5>
                  </div>
              </div>
          </div>
    </div>
</section>
<section id="products">
<div class="container-fluid mb-lg-5 mt-lg-5">
    <div class="row justify-content-center">
      <div class="col-lg-12 mt-3 aling-self-center text-center">
        <h1>PRODUCTS</h1>
      </div>
        <div class="col-lg-4 mt-3">
            <div class="card border-0 rounded-0">
                <img class="img-fluid rounded mx-auto d-block" src="img/fidel.png" alt="fidel" width="200" height="200">
            </div> 
            <div class="card-img-overlay row justify-content-center">
                <div class="align-self-center mb-lg-5">
                    <a href="#"><h3 class="font-weight-bold blanco mb-lg-5">FLOWER</h3></a>
                </div>
            </div>  
        </div>
        <div class="col-lg-4 mt-3">
            <div class="card border-0 rounded-0">
                <img class="img-fluid rounded mx-auto d-block" src="img/fidel.png" alt="fidel" width="200" height="200">
            </div> 
            <div class="card-img-overlay row justify-content-center">
                <div class="align-self-center mb-lg-5">
                    <a href="#"><h3 class="font-weight-bold blanco mb-lg-5">PREROLL</h3></a>
                </div>
            </div>  
        </div>
        <div class="col-lg-4 mt-3">
            <div class="card border-0 rounded-0">
                <img class="img-fluid rounded mx-auto d-block" src="img/fidel.png" alt="fidel" width="200" height="200">
            </div> 
            <div class="card-img-overlay row justify-content-center">
                <div class="align-self-center mb-lg-5">
                    <a href="#"><h3 class="font-weight-bold blanco mb-lg-5">OIL</h3></a>
                </div>
            </div>  
        </div>
    </div>
</div>
</section>
<section id="instagram" class="mb-5">
    <div class="redes-sociales">
        <div class="imagen">
          <img class="img-paisaje" src="img/fidel.png" />
        </div>
        <div class="informacion">
          <div class="info-contenido">
            <h1>INSTAGRAM</h1>
            <h2>FOLLOW OUR PRODUCTS AND DEALS</h2>
            <hr />
            <span>LEARN MORE</span>
            <a href=""><img class="icon-ir" src="img/ir.png" /></a>
          </div>
        </div>
      </div>
      <div class="iconos">
        <div class="icon-contenido">
          <div class="fondo-icon-flecha">
           
            <a href=""><img class="icon" src="<?php echo base_url(); ?>img/atras.png" /></a>
          </div>
          <div class="fondo-icon">
            <a href=""><img class="icon" src="<?php echo base_url(); ?>/img/instagram.png" /></a>
          </div>
          <div class="fondo-icon">
            <a href=""><img class="icon" src="<?php echo base_url(); ?>/img/snapchat.png" /></a>
          </div>
          <div class="fondo-icon">
            <a href=""><img class="icon" src="<?php echo base_url(); ?>img/twitter.png" /></a>
          </div>
          <div class="fondo-icon-flecha">
            <a href=""> <img class="icon" src="<?php echo base_url(); ?>img/adelante.png" /></a>
          </div>
        </div>
      </div>
</section>
<section id="footer" class="mt-4">
    <div class="container-fluid bg-imperial mt-4 justify-content-center">
        <div class="row">
            <div class="col-lg-6">
                <img class="img-fluid" src="img/footer.png" alt="">
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6 justify-content-center">
                        <h1><a href="#">Home</a></h1>
                        <h1><a href="#">Shop</a></h1>
                        <h1><a href="#">About Us</a></h1>
                        <h1><a href="#">Contact</a></h1>
                        <h1><a href="#">Merch</a></h1>
                    </div>
                    <div class="col-lg-6 justify-content-center">
                        <h1 class="font-weight-bold blanco">OFFICE HOURS</h1>   
                        <h2>MONDAY-SUNDAY</h2>
                        <h2>11:00AM - 9:00PM</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <h1 class="font-weight-bold blanco">Suscribe</h1> 
                    <div class="col-lg-12">
                        <div class="d-flex justify-content-center">
                            <form class="form-inline">
                                <input type="text" class="form-control form-control-lg" placeholder="Enter text" id="suscribe">
                                <button type="submit" class="btn btn-lg btn-imperial">Submit</button>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
          <div class="col-lg-6">
            <h3 class="font-weight-bold blanco">Terms of use | Legal disclaimers</h3> 
          </div>
          <div class="col-lg-6 text-right">
            <h3 class="font-weight-bold blanco"> © Imperial herb USA</h3> 
          </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.1/owl.carousel.min.js'></script>
<script src="js/carousel.js"></script>
</body>
</html>