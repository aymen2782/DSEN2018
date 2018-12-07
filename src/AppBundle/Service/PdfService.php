<?php
/**
 * Created by PhpStorm.
 * User: aymen
 * Date: 07/12/2018
 * Time: 15:54
 */

namespace AppBundle\Service;


use Spipu\Html2Pdf\Html2Pdf;

class PdfService
{
    private $pdf;
    private $orientation = 'P';
    private $format = 'A4';
    private $lang = 'fr';
    private $unicode = true;
    private $encoding = 'UTF-8';
    private $margin = array(
        10,15,10,15
    );
    public function create(
        $orientation=null,
        $format = null,
        $lang = null,
        $unicode = null,
        $encoding = null,
        $margin = null
    ){
        $this->pdf = new Html2Pdf(
            $orientation?$orientation : $this->orientation,
            $format?$format : $this->format,
            $lang?$lang : $this->lang,
            $unicode?$unicode : $this->unicode,
            $encoding?$encoding : $this->encoding,
            $margin?$margin : $this->margin
        );
    }

    public function generatePdf($template, $name) {
        $this->pdf->writeHTML($template);
        return $this->pdf->Output($name.'.pdf','S');
    }

}