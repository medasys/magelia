<?php

// Local DB Constants

define( "FXM_DB_USER" , "root" );
define( "FXM_DB_PASSWORD" , "" );
define( "FXM_DB_SERVER" , "localhost" );
define( "FXM_DB_CLIENT" , "mysql" );
define( "FXM_DB" , "medacloud" );


//dev DB Constants
/*
define( "FXM_DB_USER" , "dev" );
define( "FXM_DB_PASSWORD" , "DeVmEd@" );
define( "FXM_DB_SERVER" , "172.16.10.22" );
define( "FXM_DB_CLIENT" , "mysql" );
define( "FXM_DB" , "dev" );
*/

// SoapClient CloudForms Constants
define( "MC_CF_URL" , "https://manageiq.medacloud.ma/vmdbws/wsdl" );
define( "MC_CF_USER" , "admin" );
define( "MC_CF_PASSWORD" , "smartvm" );


// SoapClient Rhev-m Constants
define( "MC_RM_URL" , 'https://10.10.10.47' );
define( "MC_RM_USER" , 'admin@internal' );
define( "MC_RM_PASSWORD" , 'redhat' );
define( "MC_RM_ENTRY" , '/api' );

// IPA LDAP Constants
define( "IPA_URL" , "cerise.meda.cloud" );
define( "IPA_PORT" , 389 );
define( "IPA_ADM_USER" , "admin" );
define( "IPA_ADM_PASSWORD" , "@DminiP@" );
define( "IPA_DN_BASE" , "dc=meda,dc=cloud" );
define( "IPA_ADM_DN" , "uid=admin,cn=users,cn=accounts,dc=meda,dc=cloud" );

