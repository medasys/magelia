<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/medacloud/config/defines.inc.php';

$base_dn = "uid=m.ouajib,cn=users,cn=accounts,dc=meda,dc=cloud";
$info["givenname"] = "Mohamed";
$info["sn"] = "Ouajib";
$info["uid"] = "m.ouajib";
$info["homedirectory"] = "/home/m.ouajib";
$info["mail"] = "mohamedouajib@gmail.com";
$info["displayname"]= "Mohamed Ouajib";
$info["cn"] = "Mohamed Ouajib";
$info["userpassword"] = "sherriffot";
$info["memberof"][0] = "cn=ipausers,cn=groups,cn=accounts,dc=meda,dc=cloud";
$info["memberof"][1] = "cn=prospects,cn=groups,cn=accounts,dc=meda,dc=cloud";
$info["objectclass"][0] = "top";
$info["objectclass"][1] = "person";
$info["objectclass"][2] = "organizationalperson";
$info["objectclass"][3] = "inetorgperson";
$info["objectclass"][4] = "inetuser";
$info["objectclass"][5] = "posixaccount";
$info["objectclass"][6] = "krbprincipalaux";
$info["objectclass"][7] = "krbticketpolicyaux";
$info["objectclass"][8] = "ipaobject";
$info["objectclass"][9] = "ipasshuser";
$info["objectclass"][10] = "ipaSshGroupOfPubKeys";
$info["objectclass"][11] = "mepOriginEntry";

$conn = ldap_connect(IPA_URL);

if($conn) {
	ldap_set_option($conn, LDAP_OPT_PROTOCOL_VERSION, 3);
	ldap_set_option($connect, LDAP_OPT_REFERRALS, 0);
	$bindServerLDAP = ldap_bind($conn, 'uid=admin,cn=users,cn=accounts,dc=meda,dc=cloud', '@DminiP@');
	if($bindServerLDAP) {
		/*$sr = ldap_search($conn, "cn=users,cn=accounts,dc=meda,dc=cloud", "uid=ousmane.tc");
  		$info = ldap_get_entries($conn, $sr);
		
		$data = array (
				"name" => $info[0]["displayname"][0],
				"login" => $info[0]["uid"][0]
			);
		echo $data['name'];*/
		$r = ldap_add($conn, $base_dn, $info);
		echo $r;
		
		ldap_close($conn);
	}
	else {
		die("Connexion impossible au serveur LDAP.");
	}
}
else
    die("Connexion impossible au serveur LDAP.");

?>