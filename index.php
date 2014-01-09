<?php
    include('load.php');
    $user = $facebook->getUser();
    $auth_url = "http://www.facebook.com/dialog/oauth?client_id=" . APP_ID . "&redirect_uri=" . urlencode( URL_APP ) . "&scope=" . PERMISSOES;
    if(empty($user))
    {
       echo( "<script>top.location.href='" . $auth_url . "';</script>" );
    }
    else
    {
        // $usuario = new Usuarios($user);
        $contas_usuario = $facebook->api('me/accounts', 'GET', $params);
        foreach($contas_usuario['data'] as $contas)
        {
            if($contas['category'] != 'Website' && $contas['category'] != 'Application')
                $paginas[] = $contas;
        }
    }

    // if(!empty($_POST['add_pagina']))
    // {
    //     $loja = new Lojas($_POST);
    // }
?>
<!DOCTYPE HTML>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
        <meta charset="UTF-8">
        <title>Loja Social</title>
        <script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js'></script>
    </head>  
    <body>
        <?php
            print_r( $paginas );
        ?>
    </body>  
</html>