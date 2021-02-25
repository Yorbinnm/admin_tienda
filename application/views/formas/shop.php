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
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/estilos-shop.css" />
    <title>Shop</title>
  </head>
  <body>
        <section id="menu">
      <nav
        class="navbar navbar-expand-lg navbar-dark bg-imperial-menu fixed-top nav-menu"
      >
        <!--  Show this only on mobile to medium screens  -->
        <a class="navbar-brand d-lg-none" href="#">Imperial Herb </a>

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
              <a class="nav-link " href="<?php echo base_url(); ?>web/"
                >Home <span class="sr-only">(current)</span></a
              >
            </li>
            <li class="nav-item active">
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
    <div class="contenedor-shop">
<div class="h1-shop"><h1>SHOP</h1></div>
      <div class="filtros">

        <div class="filtro-producto">
          <div class="h2-filtro-producto"><h2>PRODUCT</h2></div>
          <label> <input type="radio" name="producto" value="cartridge" /> Cartridge 
           </label>

          <label>
            <input type="radio" name="producto" value="oil" /> Oil
          </label>

          <label>
            <input type="radio" name="producto" value="preroll" /> Preroll
          </label>
                      <label>
            <input type="radio" name="producto" value="flower" /> Flower
          </label>
        </div>



                <div class="filtro-precio">
                  <div class="h2-filtro-precio"><h2>PRICE RANGE</h2></div>
            <label> <input type="radio" name="precio" value="any" /> Any 
           </label>

          <label>
            <input type="radio" name="precio" value="oil" /> Under $25
          </label>

          <label>
            <input type="radio" name="precio" value="preroll" /> $25 to $50
          </label>
                      <label>
            <input type="radio" name="precio" value="flower" /> $50 to $100
          </label>
                                <label>
            <input type="radio" name="precio" value="flower" /> $100 to $200
          </label>
                                <label>
            <input type="radio" name="precio" value="flower" /> $200 and over
          </label>
                </div>






        <div class="filtro-sabor">
          <div class="h2-filtro-sabor"><h2>FLAVOR</h2></div>
                    <label> <input type="radio" name="sabor" value="lemon" /> Lemon 
           </label>

          <label>
            <input type="radio" name="sabor" value="blueberry" /> Blueberry
          </label>

          <label>
            <input type="radio" name="sabor" value="grape" /> Grape
          </label>
                      <label>
            <input type="radio" name="sabor" value="earthy" /> Earthy
          </label>
                                <label>
            <input type="radio" name="sabor" value="sweet" /> Sweet
          </label>
        </div>
        </div>

      <div class="galeria-productos">


        <div class="tarjeta-producto">
        <div class="img-producto"><img src="../img/producto.jpg" alt=""></div>
        <p class="informacion-producto">
          Cartridge <br>
          <strong>Valley Haze Refined Live</strong><br>
          <strong>Resin 1.0 cartridge</strong><br>
          Raw Garden TM <br>
          $50.00
        </p>
        </div>

        <div class="tarjeta-producto">
        <div class="img-producto"><img src="../img/producto.jpg" alt=""></div>
        <p class="informacion-producto">
          Cartridge <br>
          <strong>Valley Haze Refined Live</strong><br>
          <strong>Resin 1.0 cartridge</strong><br>
          Raw Garden TM <br>
          $50.00
        </p>
        </div>

        <div class="tarjeta-producto">
        <div class="img-producto"><img src="../img/producto.jpg" alt=""></div>
        <p class="informacion-producto">
          Cartridge <br>
          <strong>Valley Haze Refined Live</strong><br>
          <strong>Resin 1.0 cartridge</strong><br>
          Raw Garden TM <br>
          $50.00
        </p>
        </div>

        <div class="tarjeta-producto">
        <div class="img-producto"><img src="../img/producto.jpg" alt=""></div>
        <p class="informacion-producto">
          Cartridge <br>
          <strong>Valley Haze Refined Live</strong><br>
          <strong>Resin 1.0 cartridge</strong><br>
          Raw Garden TM <br>
          $50.00
        </p>
        </div>
                <div class="tarjeta-producto">
        <div class="img-producto"><img src="../img/producto.jpg" alt=""></div>
        <p class="informacion-producto">
          Cartridge <br>
          <strong>Valley Haze Refined Live</strong><br>
          <strong>Resin 1.0 cartridge</strong><br>
          Raw Garden TM <br>
          $50.00
        </p>
        </div>
                <div class="tarjeta-producto">
        <div class="img-producto"><img src="../img/producto.jpg" alt=""></div>
        <p class="informacion-producto">
          Cartridge <br>
          <strong>Valley Haze Refined Live</strong><br>
          <strong>Resin 1.0 cartridge</strong><br>
          Raw Garden TM <br>
          $50.00
        </p>
        </div>
                <div class="tarjeta-producto">
        <div class="img-producto"><img src="../img/producto.jpg" alt=""></div>
        <p class="informacion-producto">
          Cartridge <br>
          <strong>Valley Haze Refined Live</strong><br>
          <strong>Resin 1.0 cartridge</strong><br>
          Raw Garden TM <br>
          $50.00
        </p>
        </div>

                        <div class="tarjeta-producto">
        <div class="img-producto"><img src="../img/producto.jpg" alt=""></div>
        <p class="informacion-producto">
          Cartridge <br>
          <strong>Valley Haze Refined Live</strong><br>
          <strong>Resin 1.0 cartridge</strong><br>
          Raw Garden TM <br>
          $50.00
        </p>
        </div>

                        <div class="tarjeta-producto">
        <div class="img-producto"><img src="../img/producto.jpg" alt=""></div>
        <p class="informacion-producto">
          Cartridge <br>
          <strong>Valley Haze Refined Live</strong><br>
          <strong>Resin 1.0 cartridge</strong><br>
          Raw Garden TM <br>
          $50.00
        </p>
        </div>
                                <div class="tarjeta-producto">
        <div class="img-producto"><img src="../img/producto.jpg" alt=""></div>
        <p class="informacion-producto">
          Cartridge <br>
          <strong>Valley Haze Refined Live</strong><br>
          <strong>Resin 1.0 cartridge</strong><br>
          Raw Garden TM <br>
          $50.00
        </p>
        </div>
                                <div class="tarjeta-producto">
        <div class="img-producto"><img src="../img/producto.jpg" alt=""></div>
        <p class="informacion-producto">
          Cartridge <br>
          <strong>Valley Haze Refined Live</strong><br>
          <strong>Resin 1.0 cartridge</strong><br>
          Raw Garden TM <br>
          $50.00
        </p>
        </div>
                                <div class="tarjeta-producto">
        <div class="img-producto"><img src="../img/producto.jpg" alt=""></div>
        <p class="informacion-producto">
          Cartridge <br>
          <strong>Valley Haze Refined Live</strong><br>
          <strong>Resin 1.0 cartridge</strong><br>
          Raw Garden TM <br>
          $50.00
        </p>
        </div>
      </div>
      </div>
      </div>

    </div>



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
