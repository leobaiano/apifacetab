<?php
/**
 * Conexão com o banco de dados
 * @author Leo Baiano <leobaiano@leobaiano.com>
 * @version 1.0
 */ 
    $conexao = mysql_connect("HOST", "USER", "PASS")
    or die ("Configuração de Banco de Dados Errada!");
    $db = mysql_select_db("DB")
    or die ("Banco de Dados Inexistente!");