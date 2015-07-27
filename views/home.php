    <!-- BEGIN TOP BAR -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                <div class="col-md-6 col-sm-6 additional-shop-info">
                    <ul class="list-unstyled list-inline">
                        <li><i class="fa fa-phone"></i><span>+212 537 221 908</span></li>
                        <li><i class="fa fa-envelope-o"></i><span>contact@medacloud.ma</span></li>
                    </ul>
                </div>
                <!-- END TOP BAR LEFT PART -->
                <!-- BEGIN TOP BAR MENU -->
                <div class="col-md-6 col-sm-6 additional-nav">
                    <ul class="list-unstyled list-inline pull-right">
                        <li><a href="#"><img class="flag-icon" src="assets/global/img/flags/fr.png"/> Fran&ccedil;ais</a></li>
                        <li><a href="support.php"><i class="fa fa-life-ring"></i> Aide &amp; support</a></li>
                        <?php if(isset($_SESSION['login'])) { ?>
                        <li><a href="customers/index.php" target="_blank"><i class="fa fa-user"></i> <?php echo $_SESSION['customername']; ?></a></li>
                        <li><a href="logout.php" />D&eacute;connexion <i class="fa fa-sign-out"></i></a></li>
                        <?php } else { ?>
                        <li><a href="login.php"><i class="fa fa-lock"></i> Connectez-vous</a></li>
                        <?php } ?>
                    </ul>
                </div>
                <!-- END TOP BAR MENU -->
            </div>
        </div>        
    </div>
    <!-- END TOP BAR -->
    <!-- BEGIN HEADER -->
    <div class="header">
      <div class="container">
        <a class="site-logo" href="index.php"><img src="assets/frontend/layout/img/logos/logo.png" alt="Medacloud"></a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation pull-right font-transform-inherit">
          <ul>
            <li class="dropdown dropdown-megamenu">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#">
                Infrastructure serveurs
                
              </a>
              <ul class="dropdown-menu">
                <li>
                  <div class="header-navigation-content">
                    <div class="row">
                      <div class="col-md-12 header-navigation-col">
                        <h4>Infrastructure as a service</h4>
                        <ul>
                          <li><a href="vps.php">Serveurs virtuels priv&eacute;s</a></li>
                          <li><a href="dedicated-servers.php">Serveurs d&eacute;di&eacute;s</a></li>
                          <li><a href="cloud-datacenter.php">Cloud datacenter</a></li>
                        </ul>
                      </div>
                     </div>
                  </div>
                </li>
              </ul>
            </li>
            
            <li class="dropdown dropdown-megamenu">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#">
                Cloud storage
                
              </a>
              <ul class="dropdown-menu">
                <li>
                  <div class="header-navigation-content">
                    <div class="row">
                      <div class="col-md-12 header-navigation-col">
                        <h4>Vos stockages et sauvegardes</h4>
                        <ul>
                          <li><a href="cloud-storage.php">Stockage d'objets</a></li>
                          <li><a href="cloud-backup.php">Sauvegarde et restauration</a></li>
                        </ul>
                      </div>
                     </div>
                  </div>
                </li>
              </ul>
            </li>
            
            <li class="dropdown dropdown-megamenu">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#">
                H&eacute;bergement
                
              </a>
              <ul class="dropdown-menu">
                <li>
                  <div class="header-navigation-content">
                    <div class="row">
                      <div class="col-md-12 header-navigation-col">
                        <h4>Vos h&eacute;bergements et noms de domaines</h4>
                        <ul>
                          <li><a href="hosting.php">H&eacute;bergement web</a></li>
                          <li><a href="domain-name.php">Nom de domaine</a></li>
                          <li><a href="hosted-email.php">Hosted Email</a></li>
                        </ul>
                      </div>
                     </div>
                  </div>
                </li>
              </ul>
            </li>

            <li><a href="marketplace.php">Marketplace</a></li>
            <li><a href="contact.php">D&eacute;couvrez Medacloud</a></li>
            <!-- BEGIN TOP SEARCH -->
            <li class="menu-search">
              <span class="sep"></span>
              <i class="fa fa-search search-btn"></i>
              <div class="search-box">
                <form action="#">
                  <div class="input-group">
                    <input type="text" placeholder="Entrez votre texte..." class="form-control">
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit">Recherche</button>
                    </span>
                  </div>
                </form>
              </div> 
            </li>
            <!-- END TOP SEARCH -->
          </ul>
        </div>
        <!-- END NAVIGATION -->
      </div>
    </div>
    <!-- Header END -->

    <!-- BEGIN SLIDER -->
    <div class="page-slider margin-bottom-40">
      <div class="fullwidthbanner-container revolution-slider">
        <div class="fullwidthabnner">
          <ul id="revolutionul">
            <!-- THE NEW SLIDE -->
            <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="9400" data-thumb="assets/frontend/pages/img/revolutionslider/thumbs/thumb2.jpg">
              <!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
              <img src="assets/frontend/pages/img/revolutionslider/bg10.jpg" alt="">
              
              <div class="caption lft slide_title_white slide_item_left"
                data-x="30"
                data-y="90"
                data-speed="400"
                data-start="1500"
                data-easing="easeOutExpo">
                adipiscing elit<br><span class="slide_title_white_bold">sed do eiusmod</span>
              </div>
              <div class="caption lft slide_subtitle_white slide_item_left"
                data-x="87"
                data-y="245"
                data-speed="400"
                data-start="2000"
                data-easing="easeOutExpo">
                Lorem ipsum dolor sit amet, consectetur
              </div>
              <a class="caption lft btn dark slide_btn slide_item_left" href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes"
                data-x="187"
                data-y="315"
                data-speed="400"
                data-start="3000"
                data-easing="easeOutExpo">
                Commander
              </a>                        
              <div class="caption lfb"
                data-x="640" 
                data-y="0" 
                data-speed="700" 
                data-start="1000" 
                data-easing="easeOutExpo">
              </div>
            </li>
           </ul>
            <div class="tp-bannertimer tp-bottom"></div>
            </div>
        </div>
    </div>
    <!-- END SLIDER -->

    <div class="main">
    	<div class="row quote-v2 margin-bottom-10">
          <div class="col-md-9">
            
          </div>
        </div>
      <div class="container">
      	<div class="row service-box margin-bottom-20">
          <div class="col-md-4 col-sm-4">
            <div class="service-box-heading">
              <img src="assets/frontend/layout/img/server_lock_open.png" width="100" /><br/>
              &nbsp;<span class="features-complements-title">S&eacute;curit&eacute; des donn&eacute;es</span>
              <p>Disposez d'une infrastructure hautement s&eacute;curis&eacute;e de classe Entreprise et conservez la ma&icirc;trise de la localisation de vos donn&eacute;es.</p>
            </div>  
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="service-box-heading">
              <img src="assets/frontend/layout/img/1425913734_toolbox.png" width="100" /><br/>
              &nbsp;<span class="features-complements-title">Disponibilit&eacute; et fiabilit&eacute;</span>
              <p>Garantissez d'un niveau &eacute;lev&eacute; de s&eacute;curit&eacute; par l'interm&eacute;diaire de pare-feu et d'un syst&egrave;me de surveillance 24h/24 de vos solutions.</p>
            </div>  
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="service-box-heading">
              <img src="assets/frontend/layout/img/clipboard_gear.png" width="100" /><br/>
              &nbsp;<span class="features-complements-title">Simplicit&eacute; et flexibilit&eacute;</span>
              <p>Lib&eacute;rez-vous de toutes contraintes et ajustez votre infrastructure en fonction de vos besoins pour une meilleure organisation.</p>
            </div>
          </div>
        </div>
        <div class="row quote-v1 margin-bottom-30">
          <div class="col-md-9">
            <span>D&eacute;couvrez les offres Medacloud</span>
          </div>
        </div>
      <!-- BEGIN RECENT WORKS -->
        <div class="row recent-work margin-bottom-40">
          <div class="col-md-3">
            <h3><b>Nos services offerts</b></h3><br/>
            <p>Medacloud vous offre une gamme de produits pour satisfaire &agrave; tous vos besoins.</p>
            <p>Fa&icirc;tes la commande du produit de votre choix et profitez d'une panoplie de fonctionnalit&eacute;s et services offerts.</p>
            <p><a href="#"><i class="fa fa-angle-right"></i> En savoir plus</a></p>
          </div>
          <div class="col-md-9">
            <div class="owl-carousel owl-carousel3">
              <div class="recent-work-item">
                <em>
                  <img src="assets/frontend/pages/img/works/vps.jpg" alt="Amazing Project" class="img-responsive">
                  <a href="vps.php"><i class="fa fa-link"></i></a>
                  <a href="#" class="fancybox-button" title="Project Name #1" data-rel="fancybox-button"><i class="fa fa-search"></i></a>
                </em>
                <a class="recent-work-description" href="#">
                  <strong>Serveurs virtuels priv&eacute;s</strong>
                  <b>Voir nos offres</b>
                </a>
              </div>
              <div class="recent-work-item">
                <em>
                  <img src="assets/frontend/pages/img/works/dedicated-server.jpg" alt="Amazing Project" class="img-responsive">
                  <a href="portfolio-item.html"><i class="fa fa-link"></i></a>
                  <a href="#" class="fancybox-button" title="Project Name #1" data-rel="fancybox-button"><i class="fa fa-search"></i></a>
                </em>
                <a class="recent-work-description" href="#">
                  <strong>Serveurs d&eacute;di&eacute;s</strong>
                  <b>Voir nos offres</b>
                </a>
              </div>
              <div class="recent-work-item">
                <em>
                  <img src="assets/frontend/pages/img/works/cloud.jpg" alt="Amazing Project" class="img-responsive">
                  <a href="portfolio-item.html"><i class="fa fa-link"></i></a>
                  <a href="#" class="fancybox-button" title="Project Name #1" data-rel="fancybox-button"><i class="fa fa-search"></i></a>
                </em>
                <a class="recent-work-description" href="#">
                  <strong>Cloud datacenter</strong>
                  <b>Plus de d&eacute;tails</b>
                </a>
              </div>
              <div class="recent-work-item">
                <em>
                  <img src="assets/frontend/pages/img/works/email.jpg" alt="Amazing Project" class="img-responsive">
                  <a href="portfolio-item.html"><i class="fa fa-link"></i></a>
                  <a href="#" class="fancybox-button" title="Project Name #1" data-rel="fancybox-button"><i class="fa fa-search"></i></a>
                </em>
                <a class="recent-work-description" href="#">
                  <strong>Hosted Email</strong>
                  <b>Plus de d&eacute;tails</b>
                </a>
              </div> 
        </div>   
        <!-- END RECENT WORKS -->
      </div>
      </div>
    </div>
    <div class="marketplace">
    </div>
    <div class="">
        <!-- BEGIN SERVICE BOX -->   
        <!-- <div class="row service-box margin-bottom-40">
          <div class="col-md-4 col-sm-4">
            <em>
              <img src="assets/frontend/pages/img/works/marketplace.png" class="img-responsive">
            </em>
          </div>
          <div class="col-md-8 col-sm-8 marketplace-box">
            <div class="service-box-heading">
              <span>Marketplace</span><br/>
              <span class="orange">D&eacute;couvrez votre catalogue &agrave; des tarifs exceptionnels !</span>
            </div>
            <p>Entreprises ou particuliers, visitez votre catalogue, et cr&eacute;ez votre service en quelques clics ! Wordpress, Drupal, Magento, Dolibarr sont des outils intuitifs qui ne demande aucune connaissance particuli&egrave;re.</p>
          	<p><a href="#" class="btn yellow"><i class="fa fa-arrow-circle-o-right"></i> Plus de d&eacute;tails</button></a></p><br/>
          </div>
        </div> -->
        <!-- END SERVICE BOX -->
        <!-- BEGIN SERVICE BOX -->
        <!-- BEGIN TABS AND TESTIMONIALS --><br/><br/>
        <div class="container">
        <div class="row quote-v1 margin-bottom-30">
          <div class="col-md-9">
            <span>Pourquoi choisir Medacloud ?</span>
          </div>
        </div>
        <div class="row mix-block margin-bottom-40">
          <!-- TABS -->
          <div class="col-md-7 tab-style-1">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab-1" data-toggle="tab"><b>Qui sommes-nous ?</b></a></li>
              <li><a href="#tab-2" data-toggle="tab"><b>Nos services et m&eacute;tiers</b></a></li>
              <li><a href="#tab-3" data-toggle="tab"><b>Types de clients cibl&eacute;s</b></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane row fade in active" id="tab-1">
                <div class="col-md-3 col-sm-3">
                  <a href="assets/temp/photos/img7.jpg" class="fancybox-button" title="Image Title" data-rel="fancybox-button">
                    <img class="img-responsive" src="assets/frontend/pages/img/photos/img7.jpg" alt="">
                  </a>
                </div>
                <div class="col-md-9 col-sm-9">
                  <p class="margin-bottom-10">Medacloud est propri&eacute;taire de son Datacenter d'une superficie de 2000 m2 situ&eacute; &agrave;  T&eacute;mara, p&eacute;riph&eacute;rie de Rabat, &agrave; 15 min du centre de la capitale.<br/>Le datacenter est localis&eacute; dans la zone industrielle r&eacute;cente Attasnia et est plac&eacute; sous l'unique juridiction de la loi marocaine.</p>
                  <p><a class="more" href="#">Plus d'informations <i class="icon-angle-right"></i></a></p>
                </div>
              </div>
              <div class="tab-pane row fade" id="tab-2">
                <div class="col-md-9 col-sm-9">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  <p><a class="more" href="#">Plus d'informations <i class="icon-angle-right"></i></a></p>
                </div>
                <div class="col-md-3 col-sm-3">
                  <p><a href="assets/temp/photos/img10.jpg" class="fancybox-button" title="Image Title" data-rel="fancybox-button">
                    <img class="img-responsive" src="assets/frontend/pages/img/photos/img10.jpg" alt="">
                  </a></p>
                </div>
              </div>
              <div class="tab-pane row fade" id="tab-3">
                <div class="col-md-9 col-sm-9">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  <p><a class="more" href="#">Plus d'informations <i class="icon-angle-right"></i></a></p>
                </div>
                <div class="col-md-3 col-sm-3">
                  <p><a href="assets/temp/photos/img10.jpg" class="fancybox-button" title="Image Title" data-rel="fancybox-button">
                    <img class="img-responsive" src="assets/frontend/pages/img/photos/img10.jpg" alt="">
                  </a></p>
                </div>
              </div>
            </div>
        </div>
          <!-- END TABS -->
        
          <!-- TESTIMONIALS -->
          <div class="col-md-5 testimonials-v1">
            <div id="myCarousel" class="carousel slide">
              <!-- Carousel items -->
              <div class="carousel-inner">
                <div class="active item">
                  <blockquote><p>Denim you probably haven't heard of. Lorem ipsum dolor met consectetur adipisicing sit amet, consectetur adipisicing elit, of them jean shorts sed magna aliqua. Lorem ipsum dolor met.</p></blockquote>
                  <div class="carousel-info">
                    <img class="pull-left" src="assets/frontend/pages/img/people/img1-small.jpg" alt="">
                    <div class="pull-left">
                      <span class="testimonials-name">Lina Mars</span>
                      <span class="testimonials-post">Commercial Director</span>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <blockquote><p>Raw denim you Mustache cliche tempor, williamsburg carles vegan helvetica probably haven't heard of them jean shorts austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.</p></blockquote>
                  <div class="carousel-info">
                    <img class="pull-left" src="assets/frontend/pages/img/people/img5-small.jpg" alt="">
                    <div class="pull-left">
                      <span class="testimonials-name">Kate Ford</span>
                      <span class="testimonials-post">Commercial Director</span>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <blockquote><p>Reprehenderit butcher stache cliche tempor, williamsburg carles vegan helvetica.retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid Aliquip placeat salvia cillum iphone.</p></blockquote>
                  <div class="carousel-info">
                    <img class="pull-left" src="assets/frontend/pages/img/people/img2-small.jpg" alt="">
                    <div class="pull-left">
                      <span class="testimonials-name">Jake Witson</span>
                      <span class="testimonials-post">Commercial Director</span>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Carousel nav -->
              <a class="left-btn" href="#myCarousel" data-slide="prev"></a>
              <a class="right-btn" href="#myCarousel" data-slide="next"></a>
            </div>
          </div>
          <!-- END TESTIMONIALS -->
        </div>                
        <!-- END TABS AND TESTIMONIALS -->

        <!-- BEGIN CLIENTS -->
        <div class="row margin-bottom-40 our-clients">
          <div class="col-md-3">
            <h3><b>Nos partenaires</b></h3>
            <p>Lorem dipsum folor margade sitede lametep eiusmod psumquis dolore.</p>
          </div>
          <div class="col-md-9">
            <div class="owl-carousel owl-carousel6-brands">
              <!-- <div class="client-item">
                <a href="#">
                  <img src="assets/frontend/pages/img/clients/client_1_gray.png" class="img-responsive" alt="">
                  <img src="assets/frontend/pages/img/clients/client_1.png" class="color-img img-responsive" alt="">
                </a>
              </div>
              <div class="client-item">
                <a href="#">
                  <img src="assets/frontend/pages/img/clients/client_2_gray.png" class="img-responsive" alt="">
                  <img src="assets/frontend/pages/img/clients/client_2.png" class="color-img img-responsive" alt="">
                </a>
              </div> -->
            </div>
          </div>          
        </div>
        <!-- END CLIENTS -->
      </div>
    </div>

    <!-- BEGIN PRE-FOOTER -->
    <div class="pre-footer">
      <div class="container">
        <div class="row">
          <!-- BEGIN BOTTOM ABOUT BLOCK -->
          <div class="col-md-4 col-sm-6 pre-footer-col">
            <h2>A propos de nous</h2>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam sit nonummy nibh euismod tincidunt ut laoreet dolore magna aliquarm erat sit volutpat.</p>
          	
          	<h2>Nos actualit&eacute;s</h2>
          </div>
          <!-- END BOTTOM ABOUT BLOCK -->

          <!-- BEGIN BOTTOM CONTACTS -->
          <div class="col-md-4 col-sm-6 pre-footer-col">
            <h2>Contactez-nous</h2>
            <address class="margin-bottom-40">
              14, Rue Annasime, Av. Al Arz<br>
              Hay Riad, Rabat, Maroc<br>
              T&eacute;l.: +212 537 870 890<br>
              Fax: +212 537 870 895<br>
              Email: <a href="mailto:contact@medacloud.ma">contact@medacloud.ma</a>
            </address>
			
            <div class="pre-footer-subscribe-box pre-footer-subscribe-box-vertical">
              <h2>Abonnez-vous &agrave; notre newsletter</h2>
              <p>Subscribe to our newsletter and stay up to date with the latest news and deals!</p>
              <form action="#">
                <div class="input-group">
                  <input type="text" placeholder="Entrez votre email" class="form-control">
                  <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">Envoyer</button>
                  </span>
                </div>
              </form>
            </div>
          </div>
          <!-- END BOTTOM CONTACTS -->

          <!-- BEGIN TWITTER BLOCK --> 
          <div class="col-md-4 col-sm-6 pre-footer-col">
            <h2 class="margin-bottom-0">Latest Tweets</h2>
            <a class="twitter-timeline" href="https://twitter.com/twitterapi" data-tweet-limit="2" data-theme="dark" data-link-color="#57C8EB" data-widget-id="455411516829736961" data-chrome="noheader nofooter noscrollbar noborders transparent">Loading tweets by @keenthemes...</a>
          </div>
          <!-- END TWITTER BLOCK -->
        </div>
      </div>
    </div>
    <!-- END PRE-FOOTER -->

    <!-- BEGIN FOOTER -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <!-- BEGIN COPYRIGHT -->
          <div class="col-md-6 col-sm-6 padding-top-10">
            2015 &copy; Medacloud. Tous droits r&eacute;serv&eacute;s. <a href="#">Mentions l&eacute;gales</a> | <a href="#">Paiement</a>
          </div>
          <!-- END COPYRIGHT -->
          <!-- BEGIN PAYMENTS -->
          <div class="col-md-6 col-sm-6">
            <ul class="social-footer list-unstyled list-inline pull-right">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            </ul>  
          </div>
          <!-- END PAYMENTS -->
        </div>
      </div>
    </div>
    <!-- END FOOTER -->

    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="assets/global/plugins/respond.min.js"></script>
    <![endif]--> 
    <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
    <script src="assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
    <script src="assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->

    <!-- BEGIN RevolutionSlider -->  
    <script src="assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script> 
    <script src="assets/global/plugins/slider-revolution-slider/rs-plugin/js/jquery.themepunch.tools.min.js" type="text/javascript"></script> 
    <script src="assets/frontend/pages/scripts/revo-slider-init.js" type="text/javascript"></script>
    <!-- END RevolutionSlider -->

    <script src="assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();    
            Layout.initOWL();
            RevosliderInit.initRevoSlider();
            Layout.initTwitter();
            Metronic.init();
            //Layout.initFixHeaderWithPreHeader(); /* Switch On Header Fixing (only if you have pre-header) */
            //Layout.initNavScrolling(); 
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->