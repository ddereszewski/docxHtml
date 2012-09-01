<?php

namespace DocxHtml\Model;


/**
 * handler for Docx file
 * @author DawidDereszewski
 *
 */
use DocxHtml\Controller\DocumentModelWalker;

use DocxHtml\Controller\DrawWalker;

use DocxHtml\Controller\Parser\Document;

class Docx {

	/**
	 * path to docx file
	 * @var string
	 */
	private $docxPath;
	
	/**
	 * zip handler
	 * @var unknown_type
	 */
	private $zip;
	
	/**
	 * model based document 
	 * @var Document
	 */
	private $document;
	
	
	public function __construct($docxFile) {
		$this->docxPath = $docxFile;
	}
	
	public function parse(){
		$this->unZip();
		$this->parseDocument();
	}
	
	private function unZip(){
		$this->zip = new \ZipArchive();
		$this->zip->open($this->docxPath);
		if($this->zip->getStatusString() == false){
			throw new \Exception('Invalid file type');
		}
	}
	
	private function parseDocument(){
		$document = $this->zip->getFromName('word/document.xml');

		$this->document = new Document(new \SimpleXMLElement($document));
		$this->document->parse();
		
	}
	
	public function render(){
		$this->optymize();
		$model = $this->document->getModel();
		
		return $model->draw();
	}
	
	public function optymize(){
		$dmw = new DocumentModelWalker($this->document->getModel());
		$dmw->optimize();
		
	}
	
	
}
