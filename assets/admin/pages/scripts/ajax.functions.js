function ajaxFormVmRestart( urlAction , data , loadingId, divId ) {
	document.getElementById(loadingId).innerHTML="<span class='dashboard-stat color-gray link-functions-gray'><img src='../assets/admin/layout/img/loading-spinner-grey.gif' /></span>";
	var OAjax;
	if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
	else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
	OAjax.open('POST', urlAction, true);
	OAjax.onreadystatechange = function() {
		if (OAjax.readyState == 4 && OAjax.status==200) {
			if (document.getElementById) {   
				if(OAjax.responseText=='clear') {
					document.getElementById(divId).innerHTML="";
				}
				else if (OAjax.responseText =='success') {
					document.getElementById(loadingId).innerHTML="<a class='dashboard-stat blue-madison link-functions' href='#' onclick='if(confirm('Attention, vous &ecirc;tes sur le point de r&eacute;d&eacute;marrer votre machine, voulez-vous continuer ?')) ajaxFormVmRestart( 'controllers/web/vpsAction.php', 'action=restart', 'vps-restart', 'note');return false;'><i class='icon-reload icon-functions'></i><br/><span class='details-functions'>Red&eacute;marrer ma machine</span></a>";
					document.getElementById(divId).innerHTML="<div class='alert alert-success'><button class='close' data-close='alert'></button><span>Votre machine a &eacute;t&eacute; red&eacute;marr&eacute;e avec succ&egrave;s.</span></div>";
				}
			}     
		}
	}
	OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	OAjax.send( data );
}

function ajaxFormVmPasswordReset( urlAction , data , loadingId, divId ) {
	document.getElementById(loadingId).innerHTML="<span class='dashboard-stat color-gray link-functions'><img src='../assets/admin/layout/img/validating.gif' width='62' /></span>";
	var OAjax;
	if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
	else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
	OAjax.open('POST', urlAction, true);
	OAjax.onreadystatechange = function() {
		if (OAjax.readyState == 4 && OAjax.status==200) {
			if (document.getElementById) {   
				if(OAjax.responseText=='clear') {
					document.getElementById(divId).innerHTML="";
				}
				else if (OAjax.responseText =='success') {
					document.getElementById(loadingId).innerHTML="<a class='dashboard-stat blue-madison link-functions' href='#' onclick='if(confirm('Attention, vous &ecirc;tes sur le point de r&eacute;d&eacute;marrer votre machine, voulez-vous continuer ?')) ajaxFormVmRestart( 'controllers/web/vpsAction.php', 'action=restart', 'vps-restart', 'note');return false;'><i class='icon-reload icon-functions'></i><br/><span class='details-functions'>Red&eacute;marrer ma machine</span></a>";
					document.getElementById(divId).innerHTML="<div class='row'><div class='col-md-12 col-sm-12'><div class='note note-success'><p>Le mot de passe de votre machine a &eacute;t&eacute; r&eacute;initialis&eacute; avec succ&egrave;s.</p></div></div></div>";
				}
			}     
		}
	}
	OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	OAjax.send( data );
}