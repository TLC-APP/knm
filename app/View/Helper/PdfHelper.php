<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CakePHP PdfHelper
 * @author NguyenThai
 */
App::uses('AppHelper', 'Helper');

class PdfHelper extends AppHelper {

    public $helpers = array();
    public $core;

    public function __construct(View $View, $settings = array()) {
        parent::__construct($View, $settings);

        //$this->core = new TCPDF();
    }

    public function createDocument() {
        $this->loadEssentials();
        $this->core = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    }

    public function addTTFfont($fontpath,$type='TrueTypeUnicode') {
        //debug(APP.'Vendor/tcpdf/fonts/'.$fontpath);die;
       return $this->core->addTTFfont(APP.'Vendor/tcpdf/fonts/'.$fontpath, $type);
    }
    /**
     * Output file to browser
     */
    public function output($filename = 'export.pdf', $type = 'D') {
        // set layout
        $this->_View->layout = '';
        // headers
        ob_end_clean();
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        ob_end_clean();

        // clear memory
        $this->core->Output($filename, $type);
    }

    /**
     * Load vendor classes
     */
    protected function loadEssentials() {
        // load vendor class
        App::import('Vendor', 'tcpdf/tcpdf');
        if (!class_exists('TCPDF')) {
            throw new CakeException('Vendor class TCPDF not found!');
        }
    }

}
