<?php
namespace DocxHtml\Model\Document;

use DocxHtml\Model\Document\Base;
require_once realpath(dirname(__FILE__) .'/Model.php' ) ;

class WR extends Model  {
	
	protected $value;
	
	public function setAttribute($attribute){
		$this->attributes[] = $attribute;
	}
	
	public function setValue($val){
		$this->value = $val;
	}
	
	public function draw(){
		$html = $this->value;
		$html .= $this->drawChildren();
	//	$html .= '</r>';
		
	 	return $html;
	}

}