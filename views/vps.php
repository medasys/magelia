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
            <span>Serveurs virtuels priv&eacute;s</span>
          </div>
          <div class="col-md-3 text-right breadcrumb">
            <a href="#">Accueil</a> / <a href="#">Serveurs virtuels priv&eacute;s</a>
          </div>
          </div>
      </div>
      <div class="container">
      <div class="col-md-9 col-sm-9">
      <!-- BEGIN SERVICE BOX -->   
        <div class="row service-box margin-bottom-40">
          <div class="col-md-12 col-sm-12">
            <div class="vps-text">Notre plateforme vous offre<br/> le plus stable des serveurs virtuels priv&eacute;s (VPS).
            <img src="assets/frontend/layout/img/vps.jpg" />
            </div>
            <p><center><b>D&eacute;terminez exactement la configuration voulue et cr&eacute;er votre serveur virtuel priv&eacute; avec une vitesse &eacute;poustouflante. L'offre VPS de Medacloud d&eacute;finit de nouveaux standards en termes de performance, s&eacute;curit&eacute; et qualit&eacute; de service.</b></center></p>
          </div>
          <!-- <div class="col-md-6 col-sm-6">
            <div class="service-box-heading vps-box">
              <img src="assets/frontend/pages/img/works/vps-img.png" class="img-responsive">
            </div>
          </div> -->
        </div>
      <!-- END SERVICE BOX -->
      <div class="row vps-order margin-bottom-40">
        <div class="col-md-12 col-sm-12">
        	<h3><b>Nos offres</b></h3>
        	<div class="hosting_page_plan_main">
            
            <div class="hosting_page_plan first">
            	<div class="title">Mod&egrave;le</div>
                <div class="cont-list">
                	<ul>
                    	<li>CPU cores</li>
                        <li>M&eacute;moire RAM</li>
                        <li>Espace disque</li>
                        <li>Bande passante</li>
                        <li>Trafic</li>
                        <li>Anti DDOS</li>
                        <li>Adresses IP</li>
                        <li>Evolutivit&eacute;<br/><br/></li>
                        <li>Gestion</li>
                        <li>Reboot &amp; Installation</li>
                        <li>Monitoring</li>
                        <li>SLA<br/><br/></li>
                        <li>Haute disponibilit&eacute;</li>
                    </ul>
                </div>
                <div class="ordernow"><h4><b>Montant HT</b></h4></div>
            </div><!-- end section -->
            
            <?php for($i = 0; $i < count($staticProducts); $i++) { if($staticProducts[$i]['type'] != 'Gold') { ?>
			<div class="hosting_page_plan">
            	<div class="title"><?php echo $staticProducts[$i]['type']; ?></div>
                <div class="cont-list">
                	<ul>
                    	<li><?php echo $staticProducts[$i]['cpu']; ?></li>
                        <li><?php echo $staticProducts[$i]['ram']; ?></li>
                        <li><?php echo $staticProducts[$i]['disk']; ?></li>
                        <li><?php echo $staticProducts[$i]['bandwidth']; ?></li>
                        <li><?php echo $staticProducts[$i]['traffic']; ?></li>
                        <li><?php echo $staticProducts[$i]['ddos']; ?></li>
                        <li><?php echo $staticProducts[$i]['addr_ip']; ?></li>
                        <?php if($staticProducts[$i]['id'] == '4') { ?>
                        <li><?php echo $staticProducts[$i]['upgrade']; ?><br/><br/></li>
                        <?php } else { ?>
                        <li><?php echo $staticProducts[$i]['upgrade']; ?></li>
                        <?php } ?>
                        <li><?php echo $staticProducts[$i]['management']; ?></li>
                        <li><?php echo $staticProducts[$i]['reboot']; ?></li>
                        <li><?php echo $staticProducts[$i]['monitoring']; ?></li>
                        <?php if($staticProducts[$i]['id'] == '2') { ?>
                        <li><?php echo $staticProducts[$i]['sla']; ?><br/><br/></li>
                        <?php } else { ?>
                        <li><?php echo $staticProducts[$i]['sla']; ?></li>
                        <?php } ?>
                        <li><?php echo $staticProducts[$i]['ha']; ?></li>
                    </ul>
                </div>
                <div class="ordernow"> <span class="price">DH <?php echo $staticProducts[$i]['ht_total']; ?><i>/Mois</i></span> <a href="vpsOrder.php?product_id=<?php echo $staticProducts[$i]['id']; ?>" class="btn yellow"><i class="fa fa-arrow-circle-o-right"></i> Commander</button></a></div>
            </div><!-- end section -->
			<?php } else { ?>
            <div class="hosting_page_plan hosting_page_plan_important">
            	<div class="title"><?php echo $staticProducts[$i]['type']; ?></div>
                <div class="cont-list">
                	<ul>
                    	<li><?php echo $staticProducts[$i]['cpu']; ?></li>
                        <li><?php echo $staticProducts[$i]['ram']; ?></li>
                        <li><?php echo $staticProducts[$i]['disk']; ?></li>
                        <li><?php echo $staticProducts[$i]['bandwidth']; ?></li>
                        <li><?php echo $staticProducts[$i]['traffic']; ?></li>
                        <li><?php echo $staticProducts[$i]['ddos']; ?></li>
                        <li><?php echo $staticProducts[$i]['addr_ip']; ?></li>
                        <?php if($staticProducts[$i]['id'] == '4') { ?>
                        <li><?php echo $staticProducts[$i]['upgrade']; ?><br/><br/></li>
                        <?php } else { ?>
                        <li><?php echo $staticProducts[$i]['upgrade']; ?></li>
                        <?php } ?>
                        <li><?php echo $staticProducts[$i]['management']; ?></li>
                        <li><?php echo $staticProducts[$i]['reboot']; ?></li>
                        <li><?php echo $staticProducts[$i]['monitoring']; ?></li>
                        <?php if($staticProducts[$i]['id'] == '2') { ?>
                        <li><?php echo $staticProducts[$i]['sla']; ?><br/><br/></li>
                        <?php } else { ?>
                        <li><?php echo $staticProducts[$i]['sla']; ?></li>
                        <?php } ?>
                        <li><?php echo $staticProducts[$i]['ha']; ?></li>
                    </ul>
                </div>
                <div class="ordernow"> <span class="price">DH <?php echo $staticProducts[$i]['ht_total']; ?><i>/Mois</i></span> <a href="vpsOrder.php?product_id=<?php echo $staticProducts[$i]['id']; ?>" class="btn yellow"><i class="fa fa-arrow-circle-o-right"></i> Commander</button></a></div>
            </div><!-- end section -->
            <?php } } ?>
           </div>
		</div>
       </div>
       <div class="row vps-order">
        <div class="col-md-12 col-sm-12">
        	<h3><b>OS disponibles</b></h3>
        	<div class="content-page">
                <div class="filter-v1">
                  <ul class="mix-filter">
                    <li data-filter="all" class="filter active">Tous</li>
                    <li data-filter="category_1" class="filter">Windows</li>
                    <li data-filter="category_2" class="filter">Linux</li>
                  </ul>
                              <div class="row mix-grid thumbnails">
                                  <div class="col-md-3 col-sm-4 mix category_1 mix_all" style="display: block; opacity: 1; ">
                                    <div class="mix-inner">
                                       <img alt="" src="assets/frontend/pages/img/works/win-2012.jpg" class="img-responsive">
                                       <div class="mix-details">
                                          <h4>Cascusamus et iusto odio</h4>
                                          <a class="mix-link"><i class="fa fa-link"></i></a>
                                          <a data-rel="fancybox-button" title="Project Name" href="assets/frontend/pages/img/works/win-2012.jpg" class="mix-preview fancybox-button"><i class="fa fa-search"></i></a>
                                       </div>           
                                    </div>                       
                                  </div>
                                  <div class="col-md-3 col-sm-4 mix category_1 mix_all" style="display: block; opacity: 1; ">
                                    <div class="mix-inner">
                                       <img alt="" src="assets/frontend/pages/img/works/win-2008.jpg" class="img-responsive">
                                       <div class="mix-details">
                                          <h4>Cascusamus et iusto odio</h4>
                                          <a class="mix-link"><i class="fa fa-link"></i></a>
                                          <a data-rel="fancybox-button" title="Project Name" href="assets/frontend/pages/img/works/win-2008.jpg" class="mix-preview fancybox-button"><i class="fa fa-search"></i></a>
                                       </div>           
                                    </div>                       
                                  </div>
                                  <div class="col-md-3 col-sm-4 mix category_2 mix_all" style="display: block; opacity: 1; ">
                                    <div class="mix-inner">
                                       <img alt="" src="assets/frontend/pages/img/works/centos.jpg" class="img-responsive">
                                       <div class="mix-details">
                                          <h4>Cascusamus et iusto odio</h4>
                                          <a class="mix-link"><i class="fa fa-link"></i></a>
                                          <a data-rel="fancybox-button" title="Project Name" href="assets/frontend/pages/img/works/centos.jpg" class="mix-preview fancybox-button"><i class="fa fa-search"></i></a>
                                       </div>           
                                    </div>                       
                                  </div>
                                  <div class="col-md-3 col-sm-4 mix category_2 mix_all" style="display: block; opacity: 1; ">
                                    <div class="mix-inner">
                                       <img alt="" src="assets/frontend/pages/img/works/rhel.jpg" class="img-responsive">
                                       <div class="mix-details">
                                          <h4>Cascusamus et iusto odio</h4>
                                          <a class="mix-link"><i class="fa fa-link"></i></a>
                                          <a data-rel="fancybox-button" title="Project Name" href="assets/frontend/pages/img/works/rhel.jpg" class="mix-preview fancybox-button"><i class="fa fa-search"></i></a>
                                       </div>           
                                    </div>                       
                                  </div>
                                  <div class="col-md-3 col-sm-4 mix category_2 mix_all" style="display: block; opacity: 1; ">
                                    <div class="mix-inner">
                                       <img alt="" src="assets/frontend/pages/img/works/ubuntu.jpg" class="img-responsive">
                                       <div class="mix-details">
                                          <h4>Cascusamus et iusto odio</h4>
                                          <a class="mix-link"><i class="fa fa-link"></i></a>
                                          <a data-rel="fancybox-button" title="Project Name" href="assets/frontend/pages/img/works/ubuntu.jpg" class="mix-preview fancybox-button"><i class="fa fa-search"></i></a>
                                       </div>           
                                    </div>                       
                                  </div>
                              </div>
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
        <!-- END CLIENTS -->
		
        <!-- BEGIN TABS AND TESTIMONIALS -->
        <div class="col-md-9">
        <div class="row mix-block margin-bottom-40">
          <!-- TABS -->
          <div class="col-md-12 tab-style-1">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab-1" data-toggle="tab"><b>Qu'est-ce-qu'un serveur virtuel priv&eacute;</b></a></li>
              <li><a href="#tab-2" data-toggle="tab"><b>Les avantages que vous aviez</b></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane row fade in active" id="tab-1">
                <div class="col-md-3 col-sm-3">
                  <a href="assets/frontend/pages/img/works/vps.jpg" class="fancybox-button" title="Image Title" data-rel="fancybox-button">
                    <img src="assets/frontend/pages/img/works/vps.jpg" alt="" class="img-responsive">
                  </a>
                </div>
                <div class="col-md-9 col-sm-9">
                  <p class="margin-bottom-10">Pour faire simple, un serveur est un ordinateur tr&egrave;s puissant qui contient et permet le partage des donn&eacute;es essentielles entre le cr&eacute;ateur d'un site par exemple et les internautes. Cet ordinateur est connect&eacute; en permanence et sans interruption &agrave; Internet via une liaison tr&egrave;s haut d&eacute;bit. Les potentiels utilisateurs pourront par cons&eacute;quent acc&eacute;der aux pages de votre site 24h/24.</p><p>Les serveurs ont &eacute;galement d'autres fonctions tr&egrave;s avantageuses : le gestionnaire du site peut par exemple manager son site &agrave; distance et r&eacute;soudre les diff&eacute;rents probl&egrave;mes gr&acirc;ce &agrave; des outils de gestion. Ces derniers sont tr&egrave;s pratiques puisqu'ils vous permettent de manager votre site &agrave; distance quelque soit votre situation g&eacute;ographique.</p>
                  <p><b>Medacloud vous propose des serveurs performants et haut d&eacute;bit pour une s&eacute;curit&eacute; optimale pour le stockage de vos donn&eacute;es.</b></p>
                  <p><a class="more" href="#"><i class="fa fa-angle-right"></i> Plus d'informations <i class="icon-angle-right"></i></a></p>
                </div>
              </div>
              <div class="tab-pane row fade" id="tab-2">
                <div class="col-md-12 col-sm-12">
                  <div class="col-md-3 col-sm-3">
			      <center><img src="assets/frontend/layout/img/ddos.png" width="80" /><br/>
			      <span class="vps-services"><h5><b>S&eacute;curit&eacute; Anti-DDoS</b></h5></span>
			      Vous disposez d'une infrastructure hautement s&eacute;curis&eacute;e avec une proactivit&eacute; et d&eacute;tection en temps r&eacute;el des attaques.
			      </center>
			      </div>
			      <div class="col-md-3 col-sm-3">
			      <center><img src="assets/frontend/layout/img/upgrade.png" width="80" /><br/>
			      <span class="vps-services"><h5><b>Evolutivit&eacute;</b></h5></span>
			      Chaque serveur Cloud peut &eacute;voluer &agrave; la demande et &ecirc;tre livr&eacute; en standard avec le syst&egrave;me de votre choix.
			      </center>
			      </div>
			      <div class="col-md-3 col-sm-3">
			      <center><img src="assets/frontend/layout/img/console.png" width="80" /><br/>
			      <span class="vps-services"><h5><b>Espace de gestion</b></h5></span>
			      Vous disposez d'un espace d'administration de votre serveur pour le g&eacute;rer &agrave; distance &agrave; votre guise.
			      </center>
			      </div>
			      <div class="col-md-3 col-sm-3">
			      <center><img src="assets/frontend/layout/img/reboot.png" width="80" /><br/>
			      <span class="vps-services"><h5><b>Red&eacute;marrage et Installation</b></h5></span>
			      Installez vos applications &agrave; distance sur votre serveur et proposez-les ensuite en ligne &agrave; vos clients depuis une m&ecirc;me plateforme web.
			      </center>
			      </div>
                </div>
              </div>
            </div>
          </div>
          </div>
          <!-- END TABS -->
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

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
    <script src="assets/global/plugins/jquery-mixitup/jquery.mixitup.min.js" type="text/javascript"></script>
    
    <script src="assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
    <script src="assets/frontend/pages/scripts/portfolio.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();    
            Layout.initOWL();
            RevosliderInit.initRevoSlider();
            Layout.initTwitter();
            Metronic.init();
            Portfolio.init();
            //Layout.initFixHeaderWithPreHeader(); /* Switch On Header Fixing (only if you have pre-header) */
            //Layout.initNavScrolling(); 
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->