    <!-- BEGIN TOP BAR -->
    <div id="validation-body" class="validation-body">
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
        <a class="site-logo" href="index.html"><img src="assets/frontend/layout/img/logos/logo.png" alt="Metronic FrontEnd"></a>

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

    <div class="main">
      <div class="row quote-v1 margin-bottom-30 breadory-body">
          <div class="container">
          <div class="col-md-9">
            <span>Validation de votre commande</span>
          </div>
          <div class="col-md-3 text-right breadcrumb">
            <a href="#">Accueil</a> / <a href="#">Marketplace</a>
          </div>
          </div>
      </div>
      <div class="container">
	      <div class="col-md-3 col-sm-3">
	      	<a href="authentification.php" class="link-step"><div class="order-step"><i class="icon-lock"></i> &nbsp;Authentification
	      	<div class="order-step-info">Cr&eacute;ez un nouveau compte ou authentifiez-vous.</div>
	      	</div></a>
	      	<a href="marketplaceOrder.php" class="link-step"><div class="order-step"><i class="icon-basket-loaded"></i> &nbsp;Commande
	      	<div class="order-step-info">Choisissez une des offres disponibles selon vos besoins.</div>
	      	</div></a>
	      	<a href="marketplaceConfigure.php" class="link-step"><div class="order-step"><i class="icon-settings"></i> &nbsp;Configuration
	      	<div class="order-step-info">Renseignez les informations concernant votre machine.</div>
	      	</div></a>
	      	<a href="marketplacePayment.php" class="link-step"><div class="order-step"><i class="icon-credit-card"></i> &nbsp;Paiement
	      	<div class="order-step-info">Les modalit&eacute;s de paiement pour effectuer votre commande.</div>
	      	</div></a>
	      	<a href="marketplaceValidation.php" class="link-step"><div class="order-step-selected"><i class="icon-check"></i> &nbsp;Validation
	      	<div class="order-step-info">Votre machine sera cr&eacute;e apr&egrave;s r&eacute;ception de votre paiement.</div>
	      	</div></a>
	      </div>
	      <div class="col-md-9 col-sm-9">
	      	  <h3 class="form-title">Pr&eacute;visualisation de votre commande</h3>
		      <span class="payment-title"><i class="icon-book-open"></i> Rubrique Service : <?php echo $vmName; ?></span>
		      <table class="invoice-table">
		        <thead>
		          <tr>
		            <th>Abonnement</th>
		            <th>Quantit&eacute;</th>
		            <th>Prix unitaire</th>
		            <th>Montant HT</th>
		          </tr>
		        </thead>
		        <tbody>
		          <tr>
		          	<td>Service <?php echo $version['name']; ?> - <?php echo $vmSubscription; ?> mois</td>
		            <td>1</td>
		            <td><?php echo $version['ht_total']*$vmSubscription; ?> DH</td>
		            <td><?php echo $version['ht_total']*$vmSubscription; ?> DH</td>
		          </tr>
		          <tr>
		          	<td></td>
		            <td></td>
		            <td><b>Total HT</b></td>
		            <td><b><?php echo $version['ht_total']*$vmSubscription; ?> DH</b></td>
		          </tr>
		          <tr>
		          	<td></td>
		            <td></td>
		            <td><b>TVA (20 %)</b></td>
		            <td><b><?php echo $version['ht_total']*$vmSubscription*0.2; ?> DH</b></td>
		          </tr>
		          <tr>
		          	<td></td>
		            <td></td>
		            <td><b>Total TTC</b></td>
		            <td><b><?php echo $version['ht_total']*$vmSubscription*1.2; ?> DH</b></td>
		          </tr>
		        </tbody>
		      </table><br/>
		      <div class="total-complement">
		      <p>Un bon de commande contenant les informations de votre commande effectu&eacute;e vous sera envoy&eacute;e dans votre bo&icirc;te email. Utilisez-le pour r&eacute;gler votre commande dans les plus brefs d&eacute;lais avant son expiration.</p>
		      <p>Pour plus d'informations, veuillez nous contactez sur : <b>contact@medacloud.ma</b></p>
		      </div><br/>
		      <a href="#" onclick="printOrder('validation-body', 'command'); return false;" class="btn yellow pull-right"><i class="icon-printer"></i> &nbsp;Imprimer</a>
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
    </div>
    </div>
    <!-- END FOOTER -->
	<div id="command" class="command">
		<img class="order-footer" src="assets/frontend/layout/img/order-header.png" />
		<div class="print-title">Bon de commande</div><br/><br/>
		<div class="order-block">
			<b>Bon de commande :</b><br/>
			Num&eacute;ro : <b><?php echo $orderline['command_num']; ?></b><br/>
			Date : <b><?php echo date( "d/m/Y H:i:s" , strtotime( $orderline['date'] ) ); ?></b><br/>
			Expiration : <b><span class="important-field"><?php echo date( "d/m/Y H:i:s" , strtotime( $orderline['expire_command_date'] ) ); ?></span></b><br/>
		</div>
		<div class="invoice-block">
			<b>Contact facturation :</b><br/>
			Nom : <b><?php echo $orderline['firstname'].' '.$orderline['lastname']; ?></b><br/>
			T&eacute;l&eacute;phone : <b><?php echo $orderline['telephone']; ?></b><br/>
			Adresse : <b><?php echo $orderline['address']; ?></b><br/>
			<b><?php echo $orderline['zip_code'].' - '.$orderline['city']; ?></b><br/>
		</div>
		<div class="print-table">
		<table class="invoice-table">
		        <thead>
		          <tr>
		            <th>Abonnement</th>
		            <th>Quantit&eacute;</th>
		            <th>Prix unitaire</th>
		            <th>Montant HT</th>
		          </tr>
		        </thead>
		        <tbody>
		          <tr>
		          	<td>Service <?php echo $version['name']; ?> - <?php echo $vmSubscription; ?> mois</td>
		            <td>1</td>
		            <td><?php echo $version['ht_total']*$vmSubscription; ?> DH</td>
		            <td><?php echo $version['ht_total']*$vmSubscription; ?> DH</td>
		          </tr>
		          <tr>
		          	<td></td>
		            <td></td>
		            <td><b>Total HT</b></td>
		            <td><b><?php echo $version['ht_total']*$vmSubscription; ?> DH</b></td>
		          </tr>
		          <tr>
		          	<td></td>
		            <td></td>
		            <td><b>TVA (20%)</b></td>
		            <td><b><?php echo $version['ht_total']*$vmSubscription*0.2; ?> DH</b></td>
		          </tr>
		          <tr>
		          	<td></td>
		            <td></td>
		            <td><b>Total TTC</b></td>
		            <td><b><?php echo $version['ht_total']*$vmSubscription*1.2; ?> DH</b></td>
		          </tr>
		        </tbody>
		      </table><br/>
		      <div class="total-print-complement">
		      <p><b>N.B : </b>Utilisez ce bon pour r&eacute;gler votre commande dans les plus brefs d&eacute;lais avant la date d'expiration renseign&eacute;e ci-haut.</p>
		      <p>Pour plus d'informations, veuillez nous contactez sur : <b>contact@medacloud.ma</b></p>
		      </div><br/>
		      <div class="footer-text">
		      <center><span class='boldField'>Medasys :</span> 05, Rue Haroun Rachid Appt n&#176;1 Agdal RABAT, <span class='boldField'>T&eacute;l : </span>0537.67.05.53/0537.67.07.29  - <span class='boldField'>Fax : </span>0537.67.05.57 - <span class='boldField'>R.C : </span>45141 - <span class='boldField'>Patente : </span>25736776 - <span class='boldField'>P.F : </span>522029 - <span class='boldField'>CNSS : </span>2443456 - <span class='boldField'>Cpte n&#176; </span>022 810 000 09100050083 07 23 S.G Agdal RABAT - <span class='boldField'>IF : 03331417 - Email : medasys@medasys.ma</span></center>
		      </div>
		</div>
		<!-- <img class="order-footer" src="assets/frontend/layout/img/order-footer.jpg" /> -->
	</div>
    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="assets/global/plugins/respond.min.js"></script>
    <![endif]--> 
    <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
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
    <script type="text/javascript">
	function ajaxSelect( urlAction , data , selectId ) {
		var OAjax;
		if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
		else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
		OAjax.open('POST', urlAction, true);
		OAjax.onreadystatechange = function() {
			if (OAjax.readyState == 4 && OAjax.status==200) {
				if (document.getElementById) {
					if (OAjax.responseText =='data_error') {
						var select = document.getElementById(selectId);
						while( select.length > 1 ) {
							select.remove(select.length);
							select.length = select.length - 1;
						}
					}
					else {
						var select = document.getElementById(selectId);
						while( select.length > 1 ) {
							select.remove(select.length);
							select.length = select.length - 1;
						}
						var elementData = OAjax.responseText.split(';');
						for( i = 0; i < elementData.length-1; i++ ) {
							/*if(document.getElementById("totalHidden"+i)) {
								var totalHidden = document.getElementById("totalHidden"+i);
							}
							else {
								var totalHidden = document.createElement("input");
								totalHidden.type = "hidden";
								totalHidden.setAttribute( "id" , "totalHidden"+i );
							}*/
							var option = document.createElement('option');
						    var element = elementData[i].split('&');
						    option.value = element[0];
						    option.text = element[1];
							var selects = select.options[select.selectedIndex+1];  
						    try {
						      select.add(option, selects);
						    }
						    catch(ex) {
						      select.add(option, select.selectedIndex+1);
						    }
						}
					}
				}
			}
		}
		OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
		OAjax.send( data );
	}
	</script>
	<script type="text/javascript">
	function ajaxSelectTotal( urlAction , data , hiddenId ) {
		var OAjax;
		if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
		else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
		OAjax.open('POST', urlAction, true);
		OAjax.onreadystatechange = function() {
			if (OAjax.readyState == 4 && OAjax.status==200) {
				if (document.getElementById) {
					var idBlock = document.getElementById('os-block');
					var idPrice = document.getElementById('order-item-price-small-os');
					if (OAjax.responseText == 'data_error') {
						document.getElementById(hiddenId).value = "";
						idBlock.innerHTML = "";
						idPrice.innerHTML = "";
					}
					else {
						document.getElementById(hiddenId).value = OAjax.responseText;
						var select = document.getElementById('versionId');
						var totalHidden = document.getElementById('totalHidden');
						var os = "Syst&egrave;me d'exploitation : "+select.options[select.selectedIndex].text;
						if(totalHidden.value == '')
							var price = "Montant TTC : 0 DHS / Mois";
						else
							var price = "Montant TTC : "+totalHidden.value+" DHS / Mois";
						idBlock.innerHTML = os;
						idPrice.innerHTML = price;
						if(document.getElementById("totalHidden").value == '')
							document.getElementById("totalPrice").innerHTML = parseFloat(<?php echo $staticProduct['ttc_total']; ?>);
						else 
							document.getElementById("totalPrice").innerHTML = parseFloat(<?php echo $staticProduct['ttc_total']; ?>) + parseFloat(document.getElementById("totalHidden").value);						
					}
				}
			}
		}
		OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
		OAjax.send( data );
	}
	</script>
	<script language="javascript" type="text/javascript">
	function printOrder(id1, id2) {
		document.getElementById(id1).style.display = "none";
		document.getElementById(id2).style.display = "inline";
		window.print();
		document.getElementById(id1).style.display = "inline";
		document.getElementById(id2).style.display = "none";
	}
	</script>