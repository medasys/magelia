<!-- BEGIN LOGO -->
<div class="logo">
	<a href="index.php">
	<img src="../assets/admin/layout/img/logo-login.png" alt=""/>
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form" action="authentification.php" method="post">
		<h3 class="form-title">Authentification</h3>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			Identifiant / mot de passe incorrecte(s). </span>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Identifiant</label>
			<div class="input-icon">
				<i class="fa fa-envelope"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Entrez votre identifiant" name="userLogin"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Mot de passe</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Entrez votre mot de passe" name="userPassword"/>
			</div>
		</div>
		<div class="form-actions">
			<input type="hidden" name="action" value="authentificate" />
			<button type="submit" class="btn yellow pull-right">
			Connectez-vous <i class="m-icon-swapright m-icon-white"></i>
			</button><br/>
		</div>
		<div class="forget-password">
			<h4>Vous avez oubli&eacute; votre mot de passe ?</h4>
			<p>
				<a href="javascript:;" id="forget-password">
				Cliquez ici </a>
				pour le r&eacute;initialiser.
			</p>
		</div>
	</form>
	<!-- END LOGIN FORM -->
	<!-- BEGIN FORGOT PASSWORD FORM -->
	<form class="forget-form" action="authentification.php" method="post">
		<h3>Mot de passe oubli&eacute; ?</h3>
		<p>
			 Entrez votre email de r&eacute;cup&eacute;ration pour le r&eacute;initialiser.
		</p>
		<div class="form-group">
			<div class="input-icon">
				<i class="fa fa-envelope"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Entrez votre email" name="email"/>
			</div>
		</div>
		<div class="form-actions">
			<button type="button" id="back-btn" class="btn">
			<i class="m-icon-swapleft"></i> Pr&eacute;c&eacute;dent </button>
			<button type="submit" class="btn yellow pull-right">
			Envoyer <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	</form>
	<!-- END FORGOT PASSWORD FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
	 2015 &copy; Medacloud. Tous droits r&eacute;serv&eacute;s.
</div>