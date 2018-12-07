<?php
/**
 * Created by PhpStorm.
 * User: aymen
 * Date: 07/12/2018
 * Time: 14:28
 */

namespace AppBundle\Service;


class UtilitiesService
{


    /**
     * UtilitiesService constructor.
     */
    public function __construct($secretKey)
    {
        $this->secretKey = $secretKey;
    }

    private $secretKey;
    public function getRandomString($nb){
        $char = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $chaine = str_shuffle($char);
        return substr($chaine,0,$nb).$this->secretKey;
    }


}