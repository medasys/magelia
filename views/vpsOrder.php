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
            <li class="dropdown dropdown-megamenu active">
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

    <div class="main">
      <div class="row quote-v1 margin-bottom-30 breadory-body">
          <div class="container">
          <div class="col-md-9">
            <span>Votre commande de serveur virtuel priv&eacute;</span>
          </div>
          <div class="col-md-3 text-right breadcrumb">
            <a href="#">Accueil</a> / <a href="#">Serveurs virtuels priv&eacute;s</a>
          </div>
          </div>
      </div>
      <div class="container">
	      <div class="col-md-3 col-sm-3">
	      	<a href="authentification.php" class="link-step"><div class="order-step"><i class="icon-lock"></i> &nbsp;Authentification
	      	<div class="order-step-info">Cr&eacute;ez un nouveau compte ou authentifiez-vous.</div>
	      	</div></a>
	      	<a href="vpsOrder.php?product_id=<?php echo $staticProduct['id']; ?>" class="link-step"><div class="order-step-selected"><i class="icon-basket-loaded"></i> &nbsp;Commande
	      	<div class="order-step-info">Choisissez une des offres disponibles selon vos besoins.</div>
	      	</div></a>
	      	<a href="vpsConfigure.php?product_id=<?php echo $staticProduct['id']; ?>" class="link-step"><div class="order-step"><i class="icon-settings"></i> &nbsp;Configuration
	      	<div class="order-step-info">Renseignez les informations concernant votre machine.</div>
	      	</div></a>
	      	<div class="order-step"><i class="icon-credit-card"></i> &nbsp;Paiement
	      	<div class="order-step-info">Les modalit&eacute;s de paiement pour effectuer votre commande.</div>
	      	</div>
	      	<div class="order-step"><i class="icon-check"></i> &nbsp;Validation
	      	<div class="order-step-info">Votre machine sera cr&eacute;e apr&egrave;s r&eacute;ception de votre paiement.</div>
	      	</div>
	      </div>
	      <div class="col-md-6 col-sm-6">
	      <div class="input-bottom">
	      <h3 class="form-title">Param&egrave;tres de votre pack s&eacute;lectionn&eacute;</h3><br/>
	      <span class="cpu-text">CPU Cores : <?php echo $staticProduct['cpu']; ?></span>
	      <img src="assets/frontend/layout/img/slider-cpu.png" /><br/><br/>
	      <span class="cpu-text">M&eacute;moire RAM : <?php echo $staticProduct['ram']; ?></span>
	      <img src="assets/frontend/layout/img/slider-ram.png" /><br/><br/>
	      <span class="cpu-text">Espace disque : <?php echo $staticProduct['disk']; ?></span>
	      <img src="assets/frontend/layout/img/slider-disk.png" /><br/><br/>
	      <span class="cpu-text">Bande passante : <?php echo $staticProduct['bandwidth']; ?></span>
	      <img src="assets/frontend/layout/img/slider-cpu.png" />
	      </div><br/>
	      <h3 class="form-title">Les services inclus dans votre serveur</h3><br/>
	      <div class="col-md-3 col-sm-3">
	      <center><img src="assets/frontend/layout/img/ddos.png" width="80" /><span class="vps-services">S&eacute;curit&eacute; Anti-DDoS</span></center>
	      </div>
	      <div class="col-md-3 col-sm-3">
	      <center><img src="assets/frontend/layout/img/upgrade.png" width="80" /><span class="vps-services">Evolutivit&eacute;</span></center>
	      </div>
	      <div class="col-md-3 col-sm-3">
	      <center><img src="assets/frontend/layout/img/console.png" width="80" /><span class="vps-services">Espace de gestion</span></center>
	      </div>
	      <div class="col-md-3 col-sm-3">
	      <center><img src="assets/frontend/layout/img/reboot.png" width="80" /><span class="vps-services">Red&eacute;marrage et Installation</span></center>
	      </div>
	      </div>
	      <div class="col-md-3 col-sm-3">
	      <div class="order-item">
	      <h3 class="order-title"><b>Votre commande</b></h3>
              <div class="price-availability-block clearfix">
              	<div class="price">
                	<span class="order-item-price">Total HT : </span><strong><?php echo $staticProduct['ht_total']; ?> <span>DHS<span class="total_unity">/Mois</span></span></strong>
                </div>
              </div>
              <div class="description">
                <p><b>Serveur virtuel priv&eacute;</b> de type <b><?php echo $staticProduct['type']; ?></b>, de <b><?php echo $staticProduct['cpu']; ?></b> de cpu, une m&eacute;moire RAM de <b><?php echo $staticProduct['ram']; ?></b> avec un espace disque de <b><?php echo $staticProduct['disk']; ?></b> et une bande passante de <b><?php echo $staticProduct['bandwidth']; ?></b></p>
              </div>
              <div class="order-item-price-small">Montant HT : <?php echo $staticProduct['ht_total']; ?> DHS / Mois</div>
              
              <div class="product-page-cart">
              	<a class="btn yellow button-vps" href="vpsConfigure.php?product_id=<?php echo $staticProduct['id']; ?>"><i class="icon-settings"></i> &nbsp;Configurer</a>
              </div>
	      </div>
	      <div class="help-item">
	      <h4 class="order-title"><b>Besoin d'aide ?</b></h4>
              <div class="description">
                <p><i class="fa fa-phone"></i>&nbsp; N'h&eacute;sitez pas &agrave; nous contacter au <b>08909086</b> pour plus d'informations...</p>
              </div>
              <div class="order-item-price-small"></div>
              
              <div class="product-page-cart">
              	<i class="fa fa-life-ring"></i>&nbsp; ...ou consulter notre <b><a href="faq.php">FAQ</a></b> pour en savoir plus.
              </div>
	      </div>
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