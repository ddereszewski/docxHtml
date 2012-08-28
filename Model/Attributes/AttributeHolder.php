<?php

namespace DocxHtml\Model\Attributes;

class AttributeHolder {

	protected $attributes;
	
	public function __construct(){
		$this->attributes = array();
	}
	
	public function addAttribute($attr){
		$this->attributes[] = $attr;
	}
	
	public function hasAttributes(){
		return count($this->attributes) > 0;
	}
	/*
	 * return styles values based on given attributes
	 * @return string
	 */
	public function __toString(){
		$style = '';
		foreach($this->attributes as $attr){
			$style .= $attr. '; ';
		}
		return $style;
	}
	
}
