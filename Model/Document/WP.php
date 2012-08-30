<?php
namespace DocxHtml\Model\Document;

use DocxHtml\Model\Document\Base;

class WP extends Model  {
	
	public function draw(){
		$html = '<p>';
		$html .= $this->drawChildren();
		$html .= '</p>';
		
	 	return $html;
	}

}