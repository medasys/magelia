function ajaxDisplay( urlAction , divId ) {
	var OAjax;
	document.getElementById("loading_msg").innerHTML="Chargement...";
    if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
    else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
    OAjax.open('POST', urlAction, true);
    OAjax.onreadystatechange = function() {
    	if (OAjax.readyState == 4 && OAjax.status==200) {
    		document.getElementById("loading_msg").innerHTML="";
    		document.getElementById(divId).innerHTML=OAjax.responseText;
            var AllScripts = document.getElementById(divId).getElementsByTagName('script');     
            for (var i=0; i<AllScripts.length; i++) {
            	var s = AllScripts[i];
            	if ( s.src && s.src != "" ) {
            		if ( window.execScript ) {
            			window.execScript( getFileContent( s.src ) );
            		} else {
            			window.eval( getFileContent( s.src ) );  
                	}
            	}
            	else {
            		if ( window.execScript ) {
            			window.execScript( s.innerHTML );
            		} else {
            			window.eval( s.innerHTML );  
            		}
            	} 
            }
    	}
    }
    OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    OAjax.send( null );
}

function ajaxFormAuthentificate( urlAction , data , divId, loadingId, page ) {
	document.getElementById(loadingId).innerHTML="<center><div class='validation'><img src='resources/img/loading_orange.gif' /><br/>Veuillez patienter quelques temps...<br/></div></center>";
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
					document.location.href="vpsOrder.php";
				}
				else {
					if(OAjax.responseText=='data_error') {
						document.getElementById(divId).innerHTML="<div class='confirmation-form'><div class='confirmation'><br/><center><img src='resources/img/error.png' width='100' /><br/><span class='confirmation-text'>Erreur de validation</span><br/>Certains champs sont vides, merci de v&eacute;rifier et re-valider.<br/><a href='"+page+"' class='button small orange orange-link-login'>Retour au pr&eacute;c&eacute;dent</a></center></div></div>";
					}
					else if(OAjax.responseText=='db_error') {
						document.getElementById(divId).innerHTML="<div class='confirmation-form'><div class='confirmation'><br/><center><img src='resources/img/error.png' width='100' /><br/><span class='confirmation-text'>Erreur de validation</span><br/>Vous avez entr&eacute; des informations incorrectes, merci de v&eacute;rifier et re-valider.<br/><a href='"+page+"' class='button small orange orange-link-login'>Retour au pr&eacute;c&eacute;dent</a></center></div></div>";
					}
					else {
						document.getElementById(divId).innerHTML="<div class='confirmation-form'><div class='confirmation'><br/><center><img src='resources/img/error.png' width='100' /><br/><span class='confirmation-text'>Erreur de validation</span><br/>"+OAjax.responseText+"<br/><a href='"+page+"' class='button small orange orange-link-login'>Retour au pr&eacute;c&eacute;dent</a></center></div></div>";
					}
				}
			}     
		}
	}
	OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	OAjax.send( data );
}

function ajaxFormRegisterCustomerStepOne( urlAction , data , divId, loadingId, page ) {
	document.getElementById(loadingId).innerHTML="<center><div class='validation'><img src='resources/img/loading_orange.gif' /><br/>Veuillez patienter quelques temps...<br/></div></center>";
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
					document.getElementById(divId).innerHTML="<div class='confirmation-form'><div class='confirmation'><br/><center><img src='resources/img/mail-box.png' width='100' /><br/><span class='confirmation-text'>Confirmation de vos informations</span><br/>Vous allez recevoir un e-mail, merci de cliquer sur le lien qu'il contient pour valider la cr&eacute;ation de votre compte.<br/><a href='registration.php' class='button small orange orange-link-login'>Passez cette &eacute;tape</a></center></div></div>";
				}
				else {
					if(OAjax.responseText=='data_error') {
						document.getElementById(divId).innerHTML="<div class='confirmation-form'><div class='confirmation'><br/><center><img src='resources/img/error.png' width='100' /><br/><span class='confirmation-text'>Erreur de validation</span><br/>Certains champs sont vides ou vous avez entrer des informations incorrectes, merci de v&eacute;rifier et re-valider.<br/><a href='"+page+"' class='button small orange orange-link-login'>Retour au pr&eacute;c&eacute;dent</a></center></div></div>";
					}
					else if(OAjax.responseText=='db_error') {
						document.getElementById(divId).innerHTML="<div class='confirmation-form'><div class='confirmation'><br/><center><img src='resources/img/error.png' width='100' /><br/><span class='confirmation-text'>Erreur de validation</span><br/>Un utilisateur est d&eacute;j&agrave; cr&eacute;&eacute; avec cet email, merci de v&eacute;rifier et re-valider.<br/><a href='"+page+"' class='button small orange orange-link-login'>Retour au pr&eacute;c&eacute;dent</a></center></div></div>";
					}
					else {
						document.getElementById(divId).innerHTML="<div class='confirmation-form'><div class='confirmation'><br/><center><img src='resources/img/error.png' width='100' /><br/><span class='confirmation-text'>Erreur de validation</span><br/>"+OAjax.responseText+"<br/><a href='"+page+"' class='button small orange orange-link-login'>Retour au pr&eacute;c&eacute;dent</a></center></div></div>";
					}
				}
			}     
		}
	}
	OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	OAjax.send( data );
}

function ajaxFormRegisterCustomerStepTwo( urlAction , data , divId, loadingId, page ) {
	document.getElementById(loadingId).innerHTML="<center><div class='validation'><img src='resources/img/loading_orange.gif' /><br/>Veuillez patienter quelques temps...<br/></div></center>";
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
					document.getElementById(divId).innerHTML="<div class='confirmation-form'><div class='confirmation'><br/><center><img src='resources/img/success.png' width='100' /><br/><span class='confirmation-text'>Confirmation de vos informations</span><br/>Vos informations ont &eacute;t&eacute; ajout&eacute;es avec succ&egrave;s. Vous pouvez maintenant effectuer la commande de votre machine.<br/><a href='vpsOrder.php' class='button small orange orange-link-login'>Continuer</a></center></div></div>";
				}
				else {
					if(OAjax.responseText=='data_error') {
						document.getElementById(divId).innerHTML="<div class='confirmation-form'><div class='confirmation'><br/><center><img src='resources/img/error.png' width='100' /><br/><span class='confirmation-text'>Erreur de validation</span><br/>Certains champs sont vides ou vous avez entrer des informations incorrectes, merci de v&eacute;rifier et re-valider.<br/><a href='"+page+"' class='button small orange orange-link-login'>Retour au pr&eacute;c&eacute;dent</a></center></div></div>";
					}
					else if(OAjax.responseText=='db_error') {
						document.getElementById(divId).innerHTML="<div class='confirmation-form'><div class='confirmation'><br/><center><img src='resources/img/error.png' width='100' /><br/><span class='confirmation-text'>Erreur de validation</span><br/>Un probl&egrave;me est survenu lors cette op&eacute;ration, merci de v&eacute;rifier et re-valider.<br/><a href='"+page+"' class='button small orange orange-link-login'>Retour au pr&eacute;c&eacute;dent</a></center></div></div>";
					}
					else {
						document.getElementById(divId).innerHTML="<div class='confirmation-form'><div class='confirmation'><br/><center><img src='resources/img/error.png' width='100' /><br/><span class='confirmation-text'>Erreur de validation</span><br/>"+OAjax.responseText+"<br/><a href='"+page+"' class='button small orange orange-link-login'>Retour au pr&eacute;c&eacute;dent</a></center></div></div>";
					}
				}
			}     
		}
	}
	OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	OAjax.send( data );
}

function ajaxSaaSFormRegisterCustomerStepTwo( urlAction , data , divId, loadingId, page ) {
	document.getElementById(loadingId).innerHTML="<center><div class='validation'><img src='resources/img/loading_orange.gif' /><br/>Veuillez patienter quelques temps...<br/></div></center>";
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
					document.getElementById(divId).innerHTML="<div class='confirmation-form'><div class='confirmation'><br/><center><img src='resources/img/success.png' width='100' /><br/><span class='confirmation-text'>Confirmation de vos informations</span><br/>Vos informations ont &eacute;t&eacute; ajout&eacute;es avec succ&egrave;s. Vous pouvez maintenant effectuer la commande de votre machine.<br/><a href='marketplaceOrder.php' class='button small orange orange-link-login'>Cliquez pour continuer</a></center></div></div>";
				}
				else {
					if(OAjax.responseText=='data_error') {
						document.getElementById(divId).innerHTML="<div class='confirmation-form'><div class='confirmation'><br/><center><img src='resources/img/error.png' width='100' /><br/><span class='confirmation-text'>Erreur de validation</span><br/>Certains champs sont vides ou vous avez entrer des informations incorrectes, merci de v&eacute;rifier et re-valider.<br/><a href='"+page+"' class='button small orange orange-link-login'>Retour au pr&eacute;c&eacute;dent</a></center></div></div>";
					}
					else if(OAjax.responseText=='db_error') {
						document.getElementById(divId).innerHTML="<div class='confirmation-form'><div class='confirmation'><br/><center><img src='resources/img/error.png' width='100' /><br/><span class='confirmation-text'>Erreur de validation</span><br/>Un probl&egrave;me est survenu lors cette op&eacute;ration, merci de v&eacute;rifier et re-valider.<br/><a href='"+page+"' class='button small orange orange-link-login'>Retour au pr&eacute;c&eacute;dent</a></center></div></div>";
					}
					else {
						document.getElementById(divId).innerHTML="<div class='confirmation-form'><div class='confirmation'><br/><center><img src='resources/img/error.png' width='100' /><br/><span class='confirmation-text'>Erreur de validation</span><br/>"+OAjax.responseText+"<br/><a href='"+page+"' class='button small orange orange-link-login'>Retour au pr&eacute;c&eacute;dent</a></center></div></div>";
					}
				}
			}     
		}
	}
	OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	OAjax.send( data );
}

function ajaxFormDeleteOrderline( urlAction , data , divId, loadingId ) {
	document.getElementById(loadingId).innerHTML="<img src='resources/img/loading.gif' />";
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
					document.location.href="cart.php";
				}
				else {
					if(OAjax.responseText=='data_error') {
						document.getElementById(divId).innerHTML="data_error";
					}
					else if(OAjax.responseText=='db_error') {
						document.getElementById(divId).innerHTML="db_error";
					}
					else {
						document.getElementById(divId).innerHTML=OAjax.responseText;
					}
				}
			}     
		}
	}
	OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	OAjax.send( data );
}