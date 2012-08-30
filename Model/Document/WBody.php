<?php
namespace DocxHtml\Model\Document;

use DocxHtml\Model\Document\Base;

class WBody extends Model  {
	
	public function draw(){
		return $this->drawChildren();
	}
	
}