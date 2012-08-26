<?php
namespace DocxHtml;


/**
 * Main class. Users only use this
 * @author DawidDereszewski
 *
 */
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
	
	
	public function __construct($filename) {
		$this->filename = $filename;
	}
	
	
	/**
	 * render HTML string
	 */
	public function render(){
		
	}
	
	/**
	 * Function starts to analyze docx document
	 */
	private function prepare(){
		
	}
	

}