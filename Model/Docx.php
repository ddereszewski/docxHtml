<?php

namespace DocxHtml\Model;


/**
 * handler for Docx file
 * @author DawidDereszewski
 *
 */
use DocxHtml\Controller\Parser\Document;
require_once "Controller/Parser/Document.php";

class Docx {

	/**
	 * path to docx file
	 * @var string
	 */
	private $docxPath;
	
	private $zip;
	
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
		$model = $this->document->getModel();
		return $model->draw();
	}
	
	
}
