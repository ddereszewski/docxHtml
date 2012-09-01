<?php

namespace DocxHtml\Model\Attributes;

class AttributeHolder {

	protected $attributes;

	
	/**
	 * This flag tells that style must be pritned
	 * @var bool
	 */
	protected $isFirst;
	
	/**
	 * This flag tells thatr </style> must be printed
	 * @var bool
	 */
	protected $isLast;
	
	public function __construct(){
		$this->attributes = array();
		$this->isFirst = false;
		$this->isLast = false;
	}

	
	public function setIsFirst(){
		$this->isFirst = true;
	}
	
	public function setIsLast(){
		$this->isLast = true;
	}
	
	public function isFirst(){
		return $this->isFirst;
	}
	
	public function isLast(){
		return $this->isLast;
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
