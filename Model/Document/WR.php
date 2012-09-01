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
		if($this->attributes->hasAttributes() && $this->attributes->isFirst()){
			$html .= '<span style="' .$this->attributes .'" >';
		}
		
		$html .= $this->value;
		$html .= $this->drawChildren();

		if($this->attributes->isLast()){
			$html .= '</span>';
		}
		
	 	return $html;
	}

}