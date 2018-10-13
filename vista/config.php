<?php 

//url aquispe
define('URL_SITIO', 'http://localhost/pc/vista/');

require '../libs/paypal/autoload.php';

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'ASOCsVDmiPT4RB9oPXRcboHgcIMnAeJKIwgVZ9Z5m7nuIJyT8X_3ZHNgz1j1o07UaRAtVvjkhyqUDufx',     // ClientID
        'EAVIb0gt1q24WdhC6W_CwzHC8mqTYr7hcHO58KdwPe_kdjl37tnKdcc4MZm3Vs2j8HmJUFXgNqggF3Pc'      // ClientSecret
    )
);
