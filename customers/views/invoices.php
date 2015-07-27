<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="index.html">
			<img src="../assets/admin/layout/img/logo.png" alt="logo" class="logo-default"/>
			</a>
			<div class="menu-toggler sidebar-toggler hide">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<!-- BEGIN NOTIFICATION DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="icon-bell"></i>
					<!-- <span class="badge badge-default">
					7 </span> -->
					</a>
					<ul class="dropdown-menu">
						<li class="external">
							<h3><span class="bold">7 nouvelles</span> notifications</h3>
							<a href="extra_profile.html">Voir plus</a>
						</li>
						<li>
							<ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
								<li>
									<a href="javascript:;">
									<span class="time">just now</span>
									<span class="details">
									<span class="label label-sm label-icon label-success">
									<i class="fa fa-plus"></i>
									</span>
									New user registered. </span>
									</a>
								</li>
								<li>
									<a href="javascript:;">
									<span class="time">3 mins</span>
									<span class="details">
									<span class="label label-sm label-icon label-danger">
									<i class="fa fa-bolt"></i>
									</span>
									Server #12 overloaded. </span>
									</a>
								</li>
								<li>
									<a href="javascript:;">
									<span class="time">10 mins</span>
									<span class="details">
									<span class="label label-sm label-icon label-warning">
									<i class="fa fa-bell-o"></i>
									</span>
									Server #2 not responding. </span>
									</a>
								</li>
								<li>
									<a href="javascript:;">
									<span class="time">2 days</span>
									<span class="details">
									<span class="label label-sm label-icon label-danger">
									<i class="fa fa-bolt"></i>
									</span>
									Database overloaded 68%. </span>
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<!-- END NOTIFICATION DROPDOWN -->
				<!-- BEGIN INBOX DROPDOWN -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<li class="dropdown dropdown-extended dropdown-notification" id="header_inbox_bar">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="icon-basket-loaded"></i>
					<?php if($cart != NULL && count($cart) != 0) { ?><span class="badge badge-default"><?php echo count($cart); ?></span><?php } ?>
					</a>
					<ul class="dropdown-menu">
						<li class="external">
							<h3><span class="bold"><?php echo count($cart); ?></span> commande(s) <span class="bold">en attente</span></h3>
							<a href="pending-orders.php">Voir plus</a>
						</li>
						<li>
							<ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
								<?php for($i = 0; $i < count($cart); $i++) { ?>
								<li>
									<a href="pending-orders.php?action=view&id=<?php echo $cart[$i]['id']; ?>">
									<span class="time"><?php echo date( "d/m/Y" , strtotime( $cart[$i]['date'] ) ); ?></span>
									<span class="details">
									<span class="label label-sm label-icon label-primary">
									<i class="fa fa-cart-plus"></i>
									</span>
									<?php if($cart[$i]['service'] == 0) echo "Serveur virtuel priv&eacute;"; else echo "Service ".$cart[$i]['name']; ?> </span>
									</a>
								</li>
								<?php } ?>
							</ul>
						</li>
					</ul>
				</li>
				<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<i class="icon-support"></i>
					</a>
					<ul class="dropdown-menu">
						<li class="external">
							<h3>Plus d'informations? <span class="bold">contactez-nous</span></h3>
						</li>
						<li>
							<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
								<li>
									<a href="commercial-support.php">
									<!-- <span class="photo">
									<img src="../assets/admin/layout3/img/avatar3.jpg" class="img-circle" alt="">
									</span> -->
									<span class="subject">
									<span class="from">
									Support commercial </span>
									</span>
									<span class="message">
									Pour toutes vos commandes, vos devis et facturations.</span>
									</a>
								</li>
								<li>
									<a href="technical-support.php">
									<span class="subject">
									<span class="from">
									Support technique </span>
									</span>
									<span class="message">
									Pour des probl&egrave;mes techniques au niveau de vos machines.</span>
									</a>
								</li>
								<li>
									<a href="support-messages.php">
									<span class="subject">
									<span class="from">
									Voir tous mes messages </span>
									</span>
									<span class="message">
									Tous mes messages envoy&eacute;s au service support.</span>
									</a>
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="dropdown dropdown-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<img alt="" class="img-circle" src="../assets/admin/layout/img/avatar3.jpg"/>
					<span class="username username-hide-on-mobile">
					<?php if(isset($_SESSION['customername'])) { echo $_SESSION['customername']; } ?></span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-default">
						<li>
							<a href="extra_profile.html">
							<i class="icon-user"></i> Mon compte</a>
						</li>
						<li class="divider">
						</li>
						<li>
							<a href="authentification.php?action=logout">
							<i class="icon-logout"></i> D&eacute;connexion</a>
						</li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
				<!-- BEGIN QUICK SIDEBAR TOGGLER -->
				<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
				<!-- END QUICK SIDEBAR TOGGLER -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
					<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
					<form class="sidebar-search " action="extra_search.html" method="POST">
						<a href="javascript:;" class="remove">
						<i class="icon-close"></i>
						</a>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Rechercher...">
							<span class="input-group-btn">
							<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
							</span>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-bar-chart"></i>
					<span class="title">Tableau de bord</span>
					<span class="selected"></span>
					</a>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-globe"></i>
					<span class="title">Domaines & Web</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li><a href="#"><i class="icon-arrow-right"></i>
						R&eacute;server un domaine</a></li>
						<li><a href="#"><i class="icon-arrow-right"></i>
						Transf&eacute;rer un domaine</a></li>
						<li>
							<a href="javascript:;">
							<i class="icon-arrow-right"></i>
							<span class="title">Mes domaines</span>
							<span class="arrow "></span>
							</a>
							<ul class="sub-menu">
								<li><a href="#"><i class="icon-arrow-right"></i>
								Domaine 1</a></li>
								<li><a href="#"><i class="icon-arrow-right"></i>
								Domaine 2</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-layers"></i>
					<span class="title">Infrastructure</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<?php foreach ($vpsList as $item) { ?>
							<li><a href="vps.php?action=view&id=<?php echo $item['id']; ?>"><i class="icon-drawer"></i>
							<?php echo $item['hostname']; ?></a></li>
						<?php } ?>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-screen-desktop"></i>
					<span class="title">Services SaaS</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<?php foreach ($servicesList as $item) { ?>
							<li><a href="services.php?action=view&id=<?php echo $item['id']; ?>"><i class="icon-drawer"></i>
							<?php echo $item['hostname']; ?></a></li>
						<?php } ?>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-pointer"></i>
					<span class="title">Adresses IP</span>
					</a>
				</li>
				<li>
					<a href="licenses.php">
					<i class="icon-key"></i>
					<span class="title">Gestion de licences</span>
					</a>
				</li>
				<li class="start active open">
					<a href="javascript:;">
					<i class="icon-basket-loaded"></i>
					<span class="title">Commandes &amp; Factures</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li><a href="pending-orders.php"><i class="icon-basket-loaded"></i>
						Commandes en cours</a></li>
						<li class="start active open"><a href="invoices.php"><i class="icon-book-open"></i>
						Mes factures</a></li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-support"></i>
					<span class="title">Vos supports</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li><a href="commercial-support.php"><i class="icon-arrow-right"></i>
						Support commercial</a></li>
						<li><a href="technical-support.php"><i class="icon-arrow-right"></i>
						Support technique</a></li>
					</ul>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			<b>Mes factures</b>&nbsp; <small>Informations sur mes factures &agrave; imprimer.</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Accueil</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Mes factures</a>
					</li>
				</ul>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- Begin: life time stats -->
					<div class="portlet">
						<div class="portlet-title">
							<div class="caption">
								<i class="icon-book-open"></i>Liste de mes factures
							</div>
							<div class="actions">
								<div class="btn-group">
									<a class="btn default yellow-stripe dropdown-toggle" href="#" data-toggle="dropdown">
									<i class="fa fa-share"></i>
									<span class="hidden-480">
									Exporter </span>
									<i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu pull-right">
										<li>
											<a href="#">
											Sous Excel </a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-container">
								<table class="table table-striped table-bordered table-hover" id="datatable_orders">
								<thead>
								<tr role="row" class="heading table-head">
									<th width="2%">
										<input type="checkbox" class="group-checkable">
									</th>
									<th width="5%">
										 N&#176; facture
									</th>
									<th width="15%">
										 Date de facturation
									</th>
									<th width="15%">
										 Abonnement
									</th>
									<th width="15%">
										 Nom de machine
									</th>
									<th width="10%">
										 Total TTC (en Dhs)
									</th>
									<th width="10%">
										 Actions
									</th>
								</tr>
								</thead>
								<tbody>
								</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- End: life time stats -->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 2015 &copy; Medacloud. Tous droits r&eacute;serv&eacute;s.
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->
<script src="../assets/admin/pages/scripts/invoices.js"></script>