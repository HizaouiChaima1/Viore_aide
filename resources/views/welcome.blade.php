<!doctype html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-wide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="front-pages">
     <link rel="icon" type="image/png" href="T/images/favicon.png">
    <link rel="stylesheet" href="T/css/all.min.css">
    <link rel="stylesheet" href="T/css/bootstrap.min.css">
    <link rel="stylesheet" href="T/css/spacing.css">
    <link rel="stylesheet" href="T/css/slick.css">
    <link rel="stylesheet" href="T/css/nice-select.css">
    <link rel="stylesheet" href="T/css/venobox.min.css">
    <link rel="stylesheet" href="T/css/animate.css">
    <link rel="stylesheet" href="T/css/jquery.exzoom.css">

    <link rel="stylesheet" href="T/css/style.css">
    <link rel="stylesheet" href="T/css/responsive.css">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Welcome</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="slims.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="assets/vendor/fonts/tabler-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />
    <link rel="stylesheet" href="assets/vendor/css/pages/front-page.css" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/node-waves/node-waves.css" />

    <link rel="stylesheet" href="assets/vendor/libs/nouislider/nouislider.css" />
    <link rel="stylesheet" href="assets/vendor/libs/swiper/swiper.css" />

    <!-- Page CSS -->

    <link rel="stylesheet" href="assets/vendor/css/pages/front-page-landing.css" />

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/front-config.js"></script>
  </head>

  <body>
    <script src="assets/vendor/js/dropdown-hover.js"></script>
    <script src="assets/vendor/js/mega-dropdown.js"></script>

    <!-- Navbar: Start -->
    <nav class="layout-navbar shadow-none " style="background-color: ">
      <div class="container">
        <div class="navbar navbar-expand-lg landing-navbar px-3 px-md-4">
          <!-- Menu logo wrapper: Start -->
          <div class="navbar-brand app-brand demo d-flex py-0 py-lg-2 me-4">
            <!-- Mobile menu toggle: Start-->
            <a href="https://vioredigital.com/" style="width=90% !important;">
            <button
              class="navbar-toggler border-0 px-0 me-2"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation">
              <i class="ti ti-menu-2 ti-sm align-middle"></i>
            </button>
            <a href="https://vioredigital.com/" class="app-brand-link" style="width=90% !important;">
              <span class="app-brand-logo demo">
                       
              </span>
             
            </a>
          </div>
          <!-- Menu logo wrapper: End -->
          <!-- Menu wrapper: Start -->
          <div class="collapse navbar-collapse landing-nav-menu" id="navbarSupportedContent">
            <button
              class="navbar-toggler border-0 text-heading position-absolute end-0 top-0 scaleX-n1-rtl"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation">
              <i class="ti ti-x ti-sm"></i>
            </button>
            <ul class="navbar-nav ">
              <li class="nav-item">
                <a class="nav-link fw-medium" aria-current="page" href="/">Home</a>
              </li>   
              <li class="nav-item">
                <a class="nav-link fw-medium" href="landing-page.html#landingContact">Contactez-nous</a>
              </li>
              
            </ul>
          </div>
          <div class="landing-menu-overlay d-lg-none"></div>
          <!-- Menu wrapper: End -->
          <!-- Toolbar: Start -->
          <ul class="navbar-nav flex-row align-items-center ms-auto">
            <li>
              <a href="{{ route('restaurant.create')}}" class="btn btn-primary" target="_blank"
                ></span
                ><span class="d-none d-md-block" style="color:white!important;">Partenariat</span></a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar: End -->

    <!-- Sections:Start -->

    <div data-bs-spy="scroll" class="scrollspy-example"  >
      <!-- Hero: Start -->
      <section class="fp__banner" style="background: url(images/banner_bg.jpg);">
      <div class="fp__banner_overlay">
          <div class="row banner_slider">
              <div class="col-12">
                  <div class="fp__banner_slider">
                      <div class=" container">
                          <div class="row">
                              <div class="col-xl-5 col-md-5 col-lg-5">
                                  <div class="fp__banner_img wow fadeInLeft" data-wow-duration="1s">
                                      <div class="img">
                                          <img src="s.png" alt="food item" class="img-fluid w-100" width="10% !important">
                                          <span>  </span>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-xl-5 col-md-7 col-lg-6">
                                  <div class="fp__banner_text wow fadeInRight" data-wow-duration="1s">
                                      <h1>Welcome To
                            Slims Digital</h1>
                                      
                                      <p></p>
                                      <ul class="d-flex flex-wrap">
                                          <li><a class="common_btn" href="{{ route('restaurant.create')}}">rejoingrez-nous</a></li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-12">
                  <div class="fp__banner_slider">
                      <div class=" container">
                          <div class="row">
                              <div class="col-xl-5 col-md-5 col-lg-5">
                                  <div class="fp__banner_img wow fadeInLeft" data-wow-duration="1s">
                                      <div class="img">
                                          <img src="a.jpg" alt="food item" class="img-fluid w-100">
                                          <span style="background: url(images/offer_shapes.png);">
                                            
                                          </span>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-xl-5 col-md-7 col-lg-6">
                                  <div class="fp__banner_text wow fadeInRight" data-wow-duration="1s">
                                      <h1>Digitalisez Votre Restaurant</h1>
                                      <h3>avec nous</h3>
                                      <p></p>
                                      <ul class="d-flex flex-wrap">
                                          <li><a class="common_btn" href="{{ route('restaurant.create')}}">rejoingrez-nous</a></li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-12">
                  <div class="fp__banner_slider">
                      <div class=" container">
                          <div class="row">
                              <div class="col-xl-5 col-md-5 col-lg-5">
                                  <div class="fp__banner_img wow fadeInLeft" data-wow-duration="1s">
                                      <div class="img">
                                          <img src="Orderfood.png" alt="food item" class="img-fluid w-100">
                                          <span style="background: url(images/offer_shapes.png);">
                                             
                                          </span>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-xl-5 col-md-7 col-lg-6">
                                  <div class="fp__banner_text wow fadeInRight" data-wow-duration="1s">
                                      <h1>Great food. Tastes good.</h1>
                                      <h3>Moderniser votre restaurant</h3>
                                    
                                      <ul class="d-flex flex-wrap">
                                          <li><a class="common_btn" href="{{ route('restaurant.create')}}">rejoingrez-nous</a></li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <section id="landingReviews" class="section-py bg-body landing-reviews pb-0">
    <!-- What people say slider: Start -->
    <div class="container">
      <div class="row align-items-center gx-0 gy-4 g-lg-5">
        <div class="col-md-6 col-lg-5 col-xl-3">
          <div class="mb-3 pb-1">
            <span class="badge ">Avis de vrais clients</span>
          </div>
          <h3 class="mb-1">
            <span class="position-relative fw-bold " style="color: rgb(52, 52, 52) !important;"
              >Ce que disent les gens
              <img
                src="assets/img/front-pages/icons/section-title-icon.png"
                alt="laptop charging"
                class="section-title-img position-absolute object-fit-contain bottom-0 z-n1" />
            </span>
          </h3>
          <p class="mb-3 mb-md-5">
            Découvrez ce que nos clients disent<br class="d-none d-xl-block" />
            de leur expérience.
          </p>
          <div class="landing-reviews-btns">
            <button
              id="reviews-previous-btn"
              class="btn btn-label-primary reviews-btn me-3 scaleX-n1-rtl"
              type="button">
              <i class="ti ti-chevron-left ti-sm"></i>
            </button>
            <button id="reviews-next-btn" class="btn btn-label-primary reviews-btn scaleX-n1-rtl" type="button">
              <i class="ti ti-chevron-right ti-sm"></i>
            </button>
          </div>
        </div>
        <div class="col-md-6 col-lg-7 col-xl-9">
          <div class="swiper-reviews-carousel overflow-hidden mb-5 pb-md-2 pb-md-3">
            <div class="swiper" id="swiper-reviews">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <div class="card h-100">
                    <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                      <div class="mb-3">
                        
                      </div>
                      <p>
                        “Grâce à leur solution, nous avons pu optimiser nos opérations et offrir une expérience client exceptionnelle !”
                      </p>
                      <div class="text-warning mb-3">
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="avatar me-2 avatar-sm">
                          <img src="assets/img/avatars/1.png" alt="Avatar" class="rounded-circle" />
                        </div>
                        <div>
                          <h6 class="mb-0">Adem Anouar</h6>
                          <p class="small text-muted mb-0">Directrice café et restaurant M&C</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="card h-100">
                    <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                      <div class="mb-3">
                      
                      </div>
                      <p>
                        “Utiliser leur site a été un jeu d'enfant. Ça a vraiment amélioré notre efficacité et notre rentabilité”
                      </p>
                      <div class="text-warning mb-3">
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="avatar me-2 avatar-sm">
                          <img src="assets/img/avatars/2.png" alt="Avatar" class="rounded-circle" />
                        </div>
                        <div>
                          <h6 class="mb-0">Nour hizaoui</h6>
                          <p class="small text-muted mb-0">Directrice restaurant slouvenya</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="card h-100">
                    <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                      <div class="mb-3">
                       
                      </div>
                      <p>
                        "Je recommande vivement leur service. La digitalisation de notre restaurant a été un succès grâce à leur expertise."
                      </p>
                      <div class="text-warning mb-3">
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="avatar me-2 avatar-sm">
                          <img src="assets/img/avatars/3.png" alt="Avatar" class="rounded-circle" />
                        </div>
                        <div>
                          <h6 class="mb-0">Jasser ben arbi</h6>
                          <p class="small text-muted mb-0">Directeur de restaurant jasser</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="card h-100">
                    <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                      <div class="mb-3">
                     
                      </div>
                      <p>
                       " Notre chiffre d'affaires a augmenté depuis que nous avons adopté leur solution. C'est un investissement qui en vaut vraiment la peine !"
                      </p>
                      <div class="text-warning mb-3">
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star ti-sm"></i>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="avatar me-2 avatar-sm">
                          <img src="assets/img/avatars/4.png" alt="Avatar" class="rounded-circle" />
                        </div>
                        <div>
                          <h6 class="mb-0">Meryam bey</h6>
                          <p class="small text-muted mb-0">Restaurant Mimi</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="card h-100">
                    <div class="card-body text-body d-flex flex-column justify-content-between h-100">
                      <div class="mb-3">
                     
                      </div>
                      <p>
                       " Bien que sceptique au début, j'ai été agréablement surpris par l'impact positif de leur solution sur notre restaurant. Une expérience client plus fluide et des processus simplifiés ont vraiment fait la différence pour nous"
                      </p>
                      <div class="text-warning mb-3">
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star-filled ti-sm"></i>
                        <i class="ti ti-star ti-sm"></i>
                      </div>
                      <div class="d-flex align-items-center">
                        <div class="avatar me-2 avatar-sm">
                          <img src="assets/img/avatars/1.png" alt="Avatar" class="rounded-circle" />
                        </div>
                        <div>
                          <h6 class="mb-0">Sara Smith</h6>
                          <p class="small text-muted mb-0">Founder of Bistrot Instinct</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- What people say slider: End -->
    <hr class="m-0" />
    <!-- Logo slider: Start -->
    <div class="container">
      <div class="swiper-logo-carousel py-4 my-lg-2">
        <div class="swiper" id="swiper-clients-logos">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img
                src="R1.jpg"
                alt="client logo"
                class="client-logo"
                />
            </div>
            <div class="swiper-slide">
              <img
                src="R2.jpg"
                alt="client logo"
                class="client-logo"
               />
            </div>
            <div class="swiper-slide">
              <img
                src="R1.jpg"
                alt="client logo"
                class="client-logo"
                />
            </div>
            <div class="swiper-slide">
              <img
                src="R2.jpg"
                alt="client logo"
                class="client-logo"
                />
            </div>
            <div class="swiper-slide">
              <img
                src="R1.jpg"
                alt="client logo"
                class="client-logo"
                 />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Logo slider: End -->
  </section>
      <!-- Contact Us: Start -->
      <section id="landingContact" class="section-py bg-body landing-contact">
        <div class="container">
          <div class="text-center mb-3 pb-1">
            <span class=" bg-label-primary">Contactez-nous</span>
          </div>
          <h3 class="text-center mb-1">
            <span class="position-relative fw-bold"
              >Allons travailler
              <img
                src="assets/img/front-pages/icons/section-title-icon.png"
                alt="laptop charging"
                class="section-title-img position-absolute object-fit-contain bottom-0 z-n1" />
            </span>
            ensemble
          </h3>
          <p class="text-center mb-4 mb-lg-5 pb-md-3">Une question ou une remarque ? écris-nous simplement un message</p>
          <div class="row gy-4">
            <div class="col-lg-5">
              <div class="contact-img-box position-relative border p-2 h-100">
                <img
                  src="assets/img/front-pages/icons/contact-border.png"
                  alt="contact border"
                  class="contact-border-img position-absolute d-none d-md-block scaleX-n1-rtl" />
                <img
                  src="assets/img/front-pages/landing-page/contact-customer-service.png"
                  alt="contact customer service"
                  class="contact-img w-100 scaleX-n1-rtl" />
                <div class="pt-3 px-4 pb-1">
                  <div class="row gy-3 gx-md-4">
                    <div class="col-md-6 col-lg-12 col-xl-6">
                      <div class="d-flex align-items-center">
                        <div class="badge bg-label-primary rounded p-2 me-2"><i class="ti ti-mail ti-sm"></i></div>
                        <div>
                          <p class="mb-0">Email</p>
                          <h5 class="mb-0">
                            <a href="mailto:example@gmail.com" class="text-heading">contact@vioredigital.com</a>
                          </h5>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-12 col-xl-6">
                      <div class="d-flex align-items-center">
                        <div class="badge bg-label-success rounded p-2 me-2">
                          <i class="ti ti-phone-call ti-sm"></i>
                        </div>
                        <div>
                          <p class="mb-0">Telephone:</p>
                          <h5 class="mb-0"><a href="tel:+1234-568-963" class="text-heading">+216 50 584 150</a></h5>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-7">
              <div class="card">
                <div class="card-body">
                  <h4 class="mb-1">Envoyer un message</h4>
                  <p class="mb-4">
                    Si vous souhaitez discuter de tout ce qui concerne le paiement, le compte<br
                      class="d-none d-lg-block" />
                    des partenariats ou si vous avez des questions avant-vente, vous êtes au bon endroit.
                  </p>
                  <form>
                    <div class="row g-3">
                      <div class="col-md-6">
                        <form action="" method="POST">
                          @csrf
                        <label class="form-label" for="contact-form-fullname">Nom:</label>
                        <input type="text" class="form-control" id="contact-form-fullname" placeholder="john" name="nom"/>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label" for="contact-form-email">Email:</label>
                        <input
                        name="email"
                          type="text"
                          id="contact-form-email"
                          class="form-control"
                          placeholder="exemple@gmail.com" />
                      </div>
                      <div class="col-12">
                        <label class="form-label" for="contact-form-message">Message :</label>
                        <textarea
                        name="msg"
                          id="contact-form-message"
                          class="form-control"
                          rows="8"
                          placeholder="Ecrire un message"></textarea>
                      </div>
                      <div class="col-12">
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                      </form>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Contact Us: End -->
    </div>

    <!-- / Sections:End -->

    <!-- Footer: Start -->
    <footer class="landing-footer bg-body footer-text">
      <div class="footer-top position-relative overflow-hidden z-1">
        <img
          src="assets/img/front-pages/backgrounds/footer-bg-light.png"
          alt="footer bg"
          class="footer-bg banner-bg-img z-n1"
          data-app-light-img="front-pages/backgrounds/footer-bg-light.png"
          data-app-dark-img="front-pages/backgrounds/footer-bg-dark.png" />
        <div class="container">
          <div class="row gx-0 gy-4 g-md-5">
            <div class="col-lg-5">
              <a href="landing-page.html" class="app-brand-link mb-4">
                <span class="app-brand-logo demo">
                </span>
              
              </a>
              <p class="footer-text footer-logo-description mb-4">
             
              </p>
              <form class="footer-form">
                <label for="footer-email" class="small">S'inscrire à la Newsletter</label>
                <div class="d-flex mt-1">
                  <input
                    type="email"
                    class="form-control rounded-0 rounded-start-bottom rounded-start-top"
                    id="footer-email"
                    placeholder="Votre email" />
                  <button
                    type="submit"
                    class="btn btn-primary shadow-none rounded-0 rounded-end-bottom rounded-end-top">
                    S'inscrire
                  </button>
                </div>
              </form>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
            
              <ul class="list-unstyled">
             
                
              </ul>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
              
              <ul class="list-unstyled">
                
              </ul>
            </div>
            <div class="col-lg-3 col-md-4">
              <h6 class="footer-title mb-4">Téléchargez notre application</h6>
              <a href="javascript:void(0);" class="d-block footer-link mb-3 pb-2"
                ><img src="assets/img/front-pages/landing-page/apple-icon.png" alt="apple icon"
              /></a>
              <a href="javascript:void(0);" class="d-block footer-link"
                ><img src="assets/img/front-pages/landing-page/google-play-icon.png" alt="google play icon"
              /></a>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom py-3">
        <div
          class="container d-flex flex-wrap justify-content-between flex-md-row flex-column text-center text-md-start">
          <div class="mb-2 mb-md-0">
            <span class="footer-text"
              >©
              <script>
                document.write(new Date().getFullYear());
              </script>
            </span>
            <a href="https://vioredigital.com/" target="_blank" class="fw-medium text-white footer-link">Slims</a>
            <span class="footer-text"> Made with ❤️ for a better restauration solution .</span>
          </div>
          <div>
            <a href="https://github.com/pixinvent" class="footer-link me-3" target="_blank">
              <img
                src="assets/img/front-pages/icons/github-light.png"
                alt="github icon"
                data-app-light-img="front-pages/icons/github-light.png"
                data-app-dark-img="front-pages/icons/github-dark.png" />
            </a>
            <a href="https://www.facebook.com/viore.digital/" class="footer-link me-3" target="_blank">
              <img
                src="assets/img/front-pages/icons/facebook-light.png"
                alt="facebook icon"
                data-app-light-img="front-pages/icons/facebook-light.png"
                data-app-dark-img="front-pages/icons/facebook-dark.png" />
            </a>
            <a href="https://www.instagram.com/viore.digital/" class="footer-link" target="_blank">
              <img
                src="assets/img/front-pages/icons/instagram-light.png"
                alt="google icon"
                data-app-light-img="front-pages/icons/instagram-light.png"
                data-app-dark-img="front-pages/icons/instagram-dark.png" />
            </a>
          </div>
        </div>
      </div>
    </footer>
    <!-- Footer: End -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/node-waves/node-waves.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/nouislider/nouislider.js"></script>
    <script src="assets/vendor/libs/swiper/swiper.js"></script>

    <!-- Main JS -->
    <script src="assets/js/front-main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/front-page-landing.js"></script>
        <!--jquery library js-->
        <script src="T/js/jquery-3.6.0.min.js"></script>
        <!--bootstrap js-->
        <script src="T/js/bootstrap.bundle.min.js"></script>
        <!--font-awesome js-->
        <script src="T/js/Font-Awesome.js"></script>
        <!-- slick slider -->
        <script src="T/js/slick.min.js"></script>
        <!-- isotop js -->
        <script src="T/js/isotope.pkgd.min.js"></script>
        <!-- simplyCountdownjs -->
        <script src="T/js/simplyCountdown.js"></script>
        <!-- counter up js -->
        <script src="T/js/jquery.waypoints.min.js"></script>
        <script src="T/js/jquery.countup.min.js"></script>
        <!-- nice select js -->
        <script src="T/js/jquery.nice-select.min.js"></script>
        <!-- venobox js -->
        <script src="T/js/venobox.min.js"></script>
        <!-- sticky sidebar js -->
        <script src="T/js/sticky_sidebar.js"></script>
        <!-- wow js -->
        <script src="T/js/wow.min.js"></script>
        <!-- ex zoom js -->
        <script src="T/js/jquery.exzoom.js"></script>
    
        <!--main/custom js-->
        <script src="T/js/main.js"></script>
    
  </body>
</html>
