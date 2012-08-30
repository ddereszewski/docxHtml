<?php
namespace DocxHtml\Model\Document;

use DocxHtml\Model\Document\Base;

class WR extends Model  {
	
	protected $value;
	
	public function setValue($val){
		$this->value = $val;
	}
	
	public function draw(){
		$html = '';
		if($this->attributes->hasAttributes()){
			$html .= '<span style="' .$this->attributes .'" >';
		}
		
		$html .= $this->value;
		$html .= $this->drawChildren();

		if($this->attributes->hasAttributes()){
			$html .= '</span>';
		}
		
	 	return $html;
	}

}