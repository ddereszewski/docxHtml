<?php

namespace DocxHtml\Controller;

abstract class Parser {
	
	protected $xml;
	
	protected $namespaces;
	
	public function __construct($xml){
		$this->xml = $xml;
		$this->namespaces =  $this->xml->getNamespaces();
	}
	

}
