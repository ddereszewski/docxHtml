<?php

namespace DocxHtml\Model\Document;


use DocxHtml\Interfaces\IDrawable;
require_once realpath(dirname(__FILE__) .'/../IDrawable.php' ) ;

class Model implements IDrawable{

	/**
	 * List of children of element
	 * @var Array of Model
	 */
	protected $children;
	
	protected $parent;
	
	protected $attributes;
	
	public function __construct($parent = null){
		$this->children = array();
		$this->parent = $parent;
		$this->attributes = array();
	}
	
	public function draw(){
			throw new \Exception('not implement yet');
	}
	
	public function addChildren(Model $children){
		$this->children[] = $children;
	}
	
	protected function drawChildren(){
		$children = '';
		foreach($this->children as $child){
			$children .= $child->draw();
		}
		return $children;
	}
	
	public function setAttribute($attribute){
		$this->attributes[] = $attribute;
	}
	
	
}
