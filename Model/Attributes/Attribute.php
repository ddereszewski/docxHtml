<?php

namespace DocxHtml\Model\Attributes;

class Attribute {

	protected $value;
	
	public function __construct($val){
		$this->value = $val;
	}
	
	/**
	 * return style value
	 */
	public function __toString(){
		
	}
	
}
