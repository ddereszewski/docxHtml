<?php

namespace DocxHtml\Model\Document;


use DocxHtml\Model\Attributes\AttributeHolder;
use DocxHtml\Model\IDrawable;

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
		$this->attributes = new AttributeHolder();
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
		$this->attributes->addAttribute($attribute);
	}
	
	public function getAttributes(){
		return $this->attributes;
	}
	
	public function getChildren(){
		return $this->children;
	}
	
	public function getNthChildern($no){
		if(isset($this->children[$no])){
			return $this->children[$no];
		}
		return null;
	}
	
	
}
