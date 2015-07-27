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

            <li class="active"><a href="marketplace.php">Marketplace</a></li>
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

    <div class="main">
      <div class="row quote-v1 margin-bottom-30 breadory-body">
          <div class="container">
          <div class="col-md-9">
            <span>Marketplace</span>
          </div>
          <div class="col-md-3 text-right breadcrumb">
            <a href="index.php">Accueil</a> / <a href="marketplace.php">Marketplace</a>
          </div>
          </div>
      </div>
      <div class="container">
      <div class="col-md-9 col-sm-9">
      <!-- BEGIN SERVICE BOX -->   
        <div class="row service-box margin-bottom-40">
          <div class="col-md-6 col-sm-6">
            <h3>Des solutions d&eacute;di&eacute;s pour votre activit&eacute;</h3>
            <p>Toutes sortes d'applications r&eacute;pondant &agrave; vos besoins vous sont fournies dans notre plateforme.</p>
            <p><b>Choisissez votre solution convenable pour votre activit&eacute; pour travailler plus ais&eacute;ment.</b></p>
            <p><a href="#"><i class="fa fa-angle-right"></i> En savoir plus</a></p>
          </div>
          <div class="col-md-3 col-sm-3">
            <img src="assets/frontend/layout/img/marketplace.png" width="400" />
          </div>
        </div>
      <!-- END SERVICE BOX -->
      <div class="row vps-order">
        <div class="col-md-12 col-sm-12">
            <div class="content-page">
                <div class="filter-v1">
                  <ul class="mix-filter">
                    <li data-filter="all" class="filter active">Tous</li>
                    <li data-filter="category_1" class="filter">Applications web</li>
                    <li data-filter="category_2" class="filter">E-commerce</li>
                    <li data-filter="category_3" class="filter">Serveur de Messagerie</li>
                    <li data-filter="category_4" class="filter">Applications m&eacute;tier</li>
                  </ul>
                  <div class="row mix-grid thumbnails">
                  <?php for($i = 0; $i < count($distributions); $i++) { ?>
                      <div class="col-md-3 col-sm-4 mix category_<?php echo $distributions[$i]['service_category']; ?> mix_all" style="display: block; opacity: 1; ">
                      	<div class="mix-inner">
                        	<img alt="" src="assets/frontend/pages/img/works/<?php echo $distributions[$i]['logo']; ?>" class="img-responsive">
                            <div class="mix-details">
                            	<h4><?php echo $distributions[$i]['small_description']; ?></h4>
                                <a title="Plus d'informations..." class="mix-link"><i class="fa fa-link"></i></a>
                                <a title="Commander" href="marketplaceOrder.php?service_id=<?php echo $distributions[$i]['id']; ?>" class="mix-preview fancybox-button"><i class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                      </div>
                  <?php } ?>
                  </div>
              </div>
            </div>
          </div>
       </div>
      </div>
      <div class="col-md-3 col-sm-3">
      <h3>Recherchez</h3>
          <div class="panel-group" id="accordion1">
                            <div class="panel panel-info">
                               <div class="panel-heading">
                                  <h4 class="panel-title">
                                     <a href="#accordion1_1" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle">
                                     Type de solutions
                                     </a>
                                  </h4>
                               </div>
                               <div class="panel-collapse collapse in" id="accordion1_1">
                                  <div class="panel-body">
                                     <ul class="category-list">
	                                     <li><h5><a href="#">Ressources humaines</a></h5></li>
	                                     <li><h5><a href="#">Finance et Comptabilit&eacute;</a></h5></li>
	                                     <li><h5><a href="#">Commercial et Relation clients</a></h5></li>
	                                 </ul>
                                  </div>
                               </div>
                            </div>
                            <div class="panel panel-default">
                               <div class="panel-heading">
                                  <h4 class="panel-title">
                                     <a href="#accordion1_2" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle">
                                     Secteur d'activit&eacute;s
                                     </a>
                                  </h4>
                               </div>
                               <div class="panel-collapse collapse" id="accordion1_2">
                                  <div class="panel-body">
                                     <ul class="category-list">
	                                     
                                     </ul>
                                  </div>
                               </div>
                            </div>
                            <div class="panel panel-default">
                               <div class="panel-heading">
                                  <h4 class="panel-title">
                                     <a href="#accordion1_3" data-parent="#accordion1" data-toggle="collapse" class="accordion-toggle">
                                     Taille de l'entreprise
                                     </a>
                                  </h4>
                               </div>
                               <div class="panel-collapse collapse" id="accordion1_3">
                                  <div class="panel-body">
                                     <ul class="category-list">
	                                     <li><h5><a href="#">TPE (1 &agrave; 9 salari&eacute;s)</a></h5></li>
									     <li><h5><a href="#">Petites PME (10 &agrave; 49 salari&eacute;s)</a></h5></li>
									     <li><h5><a href="#">Moyennes PME (50 &agrave; 199 salari&eacute;s)</a></h5></li>
									   	 <li><h5><a href="#">Grosses PME (200 &agrave; 499 salari&eacute;s)</a></h5></li>
                                     </ul>
                                  </div>
                               </div>
                            </div>
                         </div>
          </div>
		<!-- BEGIN CLIENTS -->
        <!-- <div class="row margin-bottom-40 our-clients os">
          <div class="col-md-4">
            <h2><a href="#" class="os-title">Syst&egrave;mes d'exploitation disponibles</a></h2>
            <p>Lorem dipsum folor margade sitede lametep eiusmod psumquis dolore.</p>
          </div>
          <div class="col-md-8">
            <div class="owl-carousel owl-carousel6-brands">
              <div class="client-item">
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
              </div>
            </div>
          </div> -->
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
    <script src="assets/global/plugins/jquery-mixitup/jquery.mixitup.min.js" type="text/javascript"></script>
    
    <script src="assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
    <script src="assets/frontend/pages/scripts/portfolio.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();
            Layout.initTwitter();
            Portfolio.init();
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->