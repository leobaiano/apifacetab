<?php
/**
 * Classe geral com funções genericas do sistema
 *
 * @author Leo Baiano <leobaiano@leobaiano.com>
 * @version 1.0
 * @since 
 */
class Geral extends Facebook
{
    private $config;
    private $reqPerms;

    /**
     * Runs a FQL query agains the API
     *
     * @author Rafael Dohms
     *
     * @param string $query
     * @return array
     */
    public function fql($query)
    {
        $params = array(
            'method' => 'fql.query',
            'query' =>$query,
        );
        return $this->api($params);
    }

    /**
     * função para retirar acentos e passar a frase para minúscula
     *
     * @param string $string - String a ser verificada
     * @return string $string - String retornada
    */
    function normaliza($string){
        $a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
        $b = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
        $string = utf8_decode($string);
        $string = strtr($string, utf8_decode($a), $b);
        $string = str_replace(" ","_",$string);
        $string = strtolower($string);
        return utf8_encode($string);
    }
}