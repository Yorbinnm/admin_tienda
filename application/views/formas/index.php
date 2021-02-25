<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
      integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.1/assets/owl.carousel.css"
    />
    <link rel="stylesheet" href="../css/styles.css" />
    <title>Imperial Herb</title>
  </head>
  <body>
    <!--
    <section id="modal">
      <div
        class="modal fade"
        id="exampleModalCenter"
        tabindex="-1"
        role="dialog"
        aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true"
        data-backdrop="static"
        data-keyboard="false"
      >
        <div
          class="modal-dialog modal-lg modal-dialog-centered"
          role="document"
        >
          <div class="modal-content bg-imperial">
            <div class="modal-header text-center">
              <h1 class="modal-title w-100 blanco" id="exampleModalLongTitle">
                IMPERIAL HERB
              </h1>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body justify-content-center">
              <h3 class="blanco" style="text-align: center; margin-top: 70px">
                ARE YOU 21 YEARS OF AGE OLDER?
              </h3>
            </div>
            <div class="modal-footer justify-content-center">
              <a href="#"
                ><h3 class="font-weight-bold blanco mr-4" data-dismiss="modal">
                  YES
                </h3></a
              >
              <a href="#"><h3 class="font-weight-bold blanco ml-4">NO</h3></a>
            </div>
          </div>
        </div>
      </div>
    </section>
-->
    <section id="menu">
      <nav
        class="navbar navbar-expand-lg navbar-dark bg-imperial-menu fixed-top nav-menu"
      >
        <!--  Show this only on mobile to medium screens  -->
        <a class="navbar-brand d-lg-none" href="#">Imperial Herb</a>

        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarToggle"
          aria-controls="navbarToggle"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <!--  Use flexbox utility classes to change how the child elements are justified  -->
        <div
          class="collapse navbar-collapse justify-content-between"
          id="navbarToggle"
        >
          <ul class="navbar-nav align-self-start">
            <li class="nav-item">
              <a class="nav-link active" href="#"
                >Home <span class="sr-only">(current)</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>web/shop">Shop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Merch</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/secciones/about.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/secciones/contact.html">Contact</a>
            </li>
          </ul>

          <div class="mx-auto div-imperial-1 align-self-center">
            <div class="div-imperial-2">
              <h1 class="font-weight-bold titulo-imperial">
                <a class="navbar-brand d-none d-lg-block" href="#"></a>IMPERIAL
                HERB
              </h1>
            </div>
          </div>

          <ul class="navbar-nav align-self-start">
            <li class="nav-item">
              <a class="nav-link" href="#"
                ><i class="fas fa-lg fa-shopping-cart"></i
              ></a>
            </li>
            <li class="navbar-nav ml-2">
              <div class="lineavertical"></div>
            </li>
            <li class="nav-item ml-2" style="margin-top: 3px">
              <button
                type="button"
                class="btn btn-primary-outline btn-sm mt-1 btn-login"
              >
                LOG IN
              </button>
            </li>
          </ul>
        </div>
      </nav>
    </section>
    <section id="cabecera">
      <!-- Full Page Image Header with Vertically Centered Content -->
      <header class="masthead" >
        <div class="container h-100 align-items-center">
          <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
              <h1
                class="font-weight-lighter blanco fuente-imperial display-1 h1-imperial"
              >
                IMPERIAL HERB
              </h1>
              <h1 class="font-weight-bold blanco h1-angeles">LOS ANGELES</h1>
              <button href="<?php echo base_url(); ?>web/shop"  class="btn btn-lg btn-cabecera" >
                Shop now
              </button>
            </div>
          </div>
        </div>
      </header>
    </section>

    <section id="carrusel" class="mb-3 margenarriba margenarribaproducto">
      <div
        class="container-fluid bg-imperial2"
        style="background-color: #c0c4c4"
      >
        <div class="row align-items-center">
          <div class="col-lg-12 mt-3 aling-self-center text-center">
            <h1
              class="font-weight-bold blanco display-3 ajustatextoproducto"
              style="color: #ca9155; margin-top: -65px"
            >
              NEWEST STRAINS
            </h1>
          </div>
        </div>

        <div class="row align-items-center">
          <div class="col-12 col-carousel">
            <div class="owl-carousel carousel-main justify-content-between">
              <div
                class="grid d-flex flex-column align-items-center justify-content-center"
              >
                <img
                  class="img-responsive"
                  src="../img/Category.png"
                  alt="Category"
                  style="max-width: 75%; width: auto; height: auto"
                />
                <h3 class="text-center logoFont">Imperial 1</h3>
              </div>
              <div
                class="grid d-flex flex-column align-items-center justify-content-center"
              >
                <img
                  class="img-responsive"
                  src="../img/Category-2.png"
                  alt="Category"
                  style="max-width: 75%; width: auto; height: auto"
                />
                <h3 class="text-center logoFont">Imperial 2</h3>
              </div>
              <div
                class="grid d-flex flex-column align-items-center justify-content-center"
              >
                <img
                  class="img-responsive"
                  src="../img/Category-3.png"
                  alt="Category"
                  style="max-width: 75%; width: auto; height: auto"
                />
                <h3 class="text-center logoFont">Imperial 3</h3>
              </div>
              <div
                class="grid d-flex flex-column align-items-center justify-content-center"
              >
                <img
                  class="img-responsive"
                  src="../img/Category-3.png"
                  alt="Category"
                  style="max-width: 75%; width: auto; height: auto"
                />
                <h3 class="text-center logoFont">Imperial 4</h3>
              </div>
              <div
                class="grid d-flex flex-column align-items-center justify-content-center"
              >
                <img
                  class="img-responsive"
                  src="../img/Category-3.png"
                  alt="Category"
                  style="max-width: 75%; width: auto; height: auto"
                />
                <h3 class="text-center logoFont">Imperial 5</h3>
              </div>
              <div
                class="grid d-flex flex-column align-items-center justify-content-center"
              >
                <img
                  class="img-responsive"
                  src="../img/Category.png"
                  alt="Category"
                  style="max-width: 75%; width: auto; height: auto"
                />
                <h3 class="text-center logoFont">Imperial 6</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="products">
      <div class="container-fluid mb-lg-5 mt-lg-5">
        <div class="row justify-content-center">
          <div class="col-lg-12 mt-3 aling-self-center text-center">
            <div class="div-barra-negra">
              <div class="div-barra-azul">
                <h1 class="font-weight-bold display-4 h1-productos">
                  PRODUCTS
                </h1>
              </div>
            </div>
          </div>

          <div class="col-lg-3 mt-3">
            <div class="card border-0 rounded-0">
              <img
                class="img-fluid rounded mx-auto d-block"
                src="../img/Category.png"
                alt="fidel"
                width="300"
                height="300"
              />
            </div>
            <!--
            <div class="card-img-overlay row justify-content-center">
              <div class="align-self-center mb-lg-5">
                <a href="#"
                  ><h3 class="font-weight-bold blanco mb-lg-5"></h3
                ></a>
              </div>
            </div>
            -->
          </div>

          <div class="col-lg-3 mt-3">
            <div class="card border-0 rounded-0">
              <img
                class="img-fluid rounded mx-auto d-block"
                src="../img/Category-2.png"
                alt="fidel"
                width="300"
                height="300"
              />
            </div>
            <!--
            <div
              class="card-img-overlay row justify-content-center"
              style="background-color: pink"
            >
              <div class="align-self-center mb-lg-5">
                <a href="#"
                  ><h3 class="font-weight-bold blanco mb-lg-5"></h3
                ></a>
              </div>
            </div>
            -->
          </div>

          <div class="col-lg-3 mt-3">
            <div class="card border-0 rounded-0">
              <img
                class="img-fluid rounded mx-auto d-block"
                src="../img/Category-3.png"
                alt="fidel"
                width="300"
                height="300"
              />
            </div>
            <!--
            <div class="card-img-overlay row justify-content-center">
              <div class="align-self-center mb-lg-5">
                <a href="#"
                  ><h3 class="font-weight-bold blanco mb-lg-5"></h3
                ></a>
              </div>
            </div>
            -->
          </div>
        </div>
      </div>
    </section>

    <section id="instagram">
      <div class="redes-sociales">
        <div class="imagen">
          <img class="img-paisaje" src="../img/fidel.png" />
        </div>
        <div class="informacion">
          <div class="info-contenido">
            <h1 class="font-weight-bold blanco">INSTAGRAM</h1>
            <h2 class="font-weight-bold blanco">
              FOLLOW OUR PRODUCTS AND DEALS
            </h2>
            <hr style="height: 2px; background-color: #ffffff" />
            <span class="font-weight-bold blanco">LEARN MORE</span>
            <a href=""><img class="icon-ir" src="../img/ir.png" /></a>
          </div>
        </div>
      </div>
      <div class="iconos">
        <div class="icon-contenido">
          <div class="fondo-icon-flecha">
            <a href=""><img class="icon" src="../img/atras.png" /></a>
          </div>
          <div class="fondo-icon">
            <a href=""><img class="icon" src="../img/instagram.png" /></a>
          </div>
          <div class="fondo-icon">
            <a href=""><img class="icon" src="../img/snapchat.png" /></a>
          </div>
          <div class="fondo-icon">
            <a href=""><img class="icon" src="../img/twitter.png" /></a>
          </div>
          <div class="fondo-icon-flecha">
            <a href=""> <img class="icon" src="../img/adelante.png" /></a>
          </div>
        </div>
      </div>
    </section>

    <section id="footer" class="margenarriba">
      <div class="container-fluid bg-imperial justify-content-center">
        <div class="row align-items-center menu-formulario">
          <div class="col-lg-6">
            <img class="img-fluid" src="../img/footer.png" alt="" width="70%" />
          </div>
          <div class="col-lg-6">
            <div class="row mb-5">
              <div class="col-lg-6 justify-content-center">
                <h1 class="links-menu">
                  <a href="#">HOME</a>
                </h1>
                <h1 class="links-menu">
                  <a class="color-links-menu" href="#">SHOP</a>
                </h1>
                <h1 class="links-menu">
                  <a class="color-links-menu" href="#">ABOUT US</a>
                </h1>
                <h1 class="links-menu">
                  <a class="color-links-menu" href="#">CONTACT</a>
                </h1>
                <h1 class="links-menu">
                  <a class="color-links-menu" href="#">MERCH</a>
                </h1>
              </div>
              <div class="col-lg-6 justify-content-center;">
                <h1 class="font-weight-bold blanco h1-oficina">OFFICE HOURS</h1>
                <h2 class="font-weight-bold blanco h2-semana-horas">
                  MONDAY-SUNDAY
                </h2>
                <h2 class="font-weight-bold blanco h2-semana-horas">
                  11:00AM - 9:00PM
                </h2>
              </div>
            </div>
            <div class="row justify-content-center">
              <h1 class="font-weight-bold blanco h1-suscribirse">SUBSCRIBE</h1>
              <div class="col-lg-12">
                <div class="d-flex justify-content-center">
                  <form class="form-inline">
                    <input
                      type="text"
                      class="form-control form-control-lg input-suscribirse"
                      placeholder="Enter your email here*"
                      id="suscribe"
                    />
                    <button
                      type="submit"
                      class="btn btn-lg btn-imperial ajustaboton btn-submit"
                    >
                      SUBMIT
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row align-items-center contenedor-terminos">
          <div class="col-md-12 col-lg-6">
            <h3 class="font-weight-bold blanco footer12 h3-terminos-imperial">
              TERMS OF USE | LEGAL DISCLAIMERS
            </h3>
          </div>
          <div class="col-md-12 col-lg-6 text-right footer12">
            <h3 class="font-weight-bold blanco h3-terminos-imperial">
              © IMPERIAL HERB USA
            </h3>
          </div>
        </div>
      </div>
    </section>

    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
      integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
      integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.1/owl.carousel.min.js"></script>
    <script src="../js/carousel.js"></script>
  </body>
</html>
