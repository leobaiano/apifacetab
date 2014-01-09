<?php
	include('load.php');
	$request = $facebook->getSignedRequest();
	$loja = new Lojas(false, $request['page']['id']);
	// echo '<pre>';
	// 	print_r($loja);
	// echo '</pre>';

	$produto = new Produtos();
	$produtosQuery = $produto->get_produtos($loja->get_id_pagina());
	// while($produtos = mysql_fetch_assoc($produtosQuery))
	// {
	// 	echo '<pre>';
	// 		print_r($produtos);
	// 	echo '</pre>';
	// }
?>
<!DOCTYPE HTML>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
        <meta charset="UTF-8">
        <title>Loja Social</title>

        <link href="<?php echo URL_ABSOLUTA; ?>bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo URL_ABSOLUTA; ?>style.css" rel="stylesheet">
    </head>  
    <body>
        <div class="input-append">
            <form method='post' action=''>
                <input class="span2" id="appendedInputButtons" size="16" type="text">
                <button class="btn" type="button">Pesquisar</button>
            </form>
        </div>
        <?php
            while($produtos = mysql_fetch_assoc($produtosQuery))
            {
        ?>
                <div class='thumbnails'>
                    <img src='<?php echo URL_ABSOLUTA . $produtos['imagem']; ?>' width='150' class='img-rounded' />
                    <div class='caption'>
                        <h3><?php echo $produtos['titulo']; ?></h3>
                        <small>R$ <?php echo number_format($produtos['preco'], 2, ',' ,'.'); ?></small>
                        <p><?php echo $produtos['descricao']; ?></p>
                        <p>
                            <a href="#" class="btn btn-primary">Adicionar</a> 
                            <a href="#" class="btn">Ver+</a>
                        </p>
                    </div>
                </div>
        <?php
            }
        ?>

        <div id="fb-root"></div>
        <script type="text/javascript">
           window.fbAsyncInit = function() {
                FB.init({appId: '<?php echo APP_ID; ?>', status: true, cookie: true, xfbml: true, oauth: true});
            window.setTimeout(function() {
                FB.Canvas.setAutoGrow(); }, 250);
            }; 
         
            (function() { var e = document.createElement('script');
            e.async = true;
            e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
            document.getElementById('fb-root').appendChild(e); }());
        </script>

        <!-- JAVA SCRIPT -->
        <script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js'></script>
        <script src="<?php echo URL_ABSOLUTA; ?>bootstrap/js/bootstrap.js"></script>
        <script>
            $(document).ready(function() {
                
            });
        </script>
    </body>
</html>