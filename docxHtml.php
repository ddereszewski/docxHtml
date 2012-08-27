<?php
namespace DocxHtml;


/**
 * Main class. Users only use this
 * @author DawidDereszewski
 *
 */
use DocxHtml\Model\Docx;
require_once "Model/Docx.php";

class docxHtml {
	
	/**
	 * absolute path to docx file
	 * @var string
	 */
	private $filename;
	
	/**
	 * debug enabled / disabled
	 * @var bool
	 */
	private $debug = false;
	
	/** 
	 * file handler
	 * @var Docx
	 */
	private $docx;
	
	
	public function __construct($filename) {
		$this->filename = $filename;
	}
	
	
	/**
	 * render HTML string
	 */
	public function render(){
		$this->prepare();
		return $this->docx->render();
	}
	
	/**
	 * Function starts to analyze docx document
	 */
	private function prepare(){
		$this->docx = new Docx($this->filename);
		$this->docx->parse();
		
	}
	

}