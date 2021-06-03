<?php

/**
 * codeCracker
 * Permet de chiffrer ou déchiffrer un message en fonction d'une clée
 */
class codeCracker
{
    private static $alphabet = "abcdefghijklmnopqrstuvwxyz";
    private $desc_key;

    /**
     * @param string $desc_key clé de déchiffrage
     */
    function __construct(string $desc_key){
        $this->desc_key = explode(" ", $desc_key);
    }

    /**
     * @param string $message message à déchiffrer
     * @return string message déchiffrer
     */
    public function decrypt(string $message){
        $message_array = mb_str_split($message);
        return $this->translate($message_array, $this->desc_key, str_split(self::$alphabet));
    }

    /**
     * @param string $message message à chiffrer
     * @return string message chiffrer
     */
    public function encrypt(string $message){
        $message_array = mb_str_split($message);
        return $this->translate($message_array, str_split(self::$alphabet), $this->desc_key);
    }

    /**
     * fonction privée de translation de caractère
     * 
     * @param $msg message à chiffrer/déchiffrer
     * @param $arr_source alphabet de base qui sera translaté
     * @param $arr_dest alphabet qui sera utilisé pour crée le message translaté
     * @return string message translater
     */
    private function translate($msg, $arr_source, $arr_dest){
        $pos_chr;
        $result = "";
        foreach ($msg as &$chr){
            if($chr === ' '){
                $result .= $chr;
                continue;
            }
            $pos_chr = array_search($chr, $arr_source);
            $result .= $arr_dest[$pos_chr];
        }
        return $result;
    }

}
