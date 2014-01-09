<?php
session_start();
    // require_once('classes/conexao.class.php');

    define( 'APP_ID', '213902598798938' );
    define( 'APP_SECRET', '9bc012fdb3a255d11ff8f3b6aa3daeec' );
    define( 'PERMISSOES', 'email, publish_stream, user_interests, user_location, read_friendlists, user_birthday, manage_pages' );
    define( 'URL_APP', 'https://apps.facebook.com/wpfacetab/' );
    define( 'URL_ABSOLUTA', 'https://lbideias.websiteseguro.com/projects/2014/wordpress-plugin-tab/' );

    function __autoload($class_name) {
        require_once 'classes/' . $class_name . '.php';
    }
    
    Facebook::$CURL_OPTS[CURLOPT_SSL_VERIFYPEER] = false;
    Facebook::$CURL_OPTS[CURLOPT_SSL_VERIFYHOST] = 2;
    Facebook::$CURL_OPTS[CURLOPT_CAINFO] = getcwd() . '\classes\fb_ca_chain_bundle.crt';

    $config = array( 'appId'  => APP_ID, 'secret' => APP_SECRET );
    $facebook = new Geral($config);