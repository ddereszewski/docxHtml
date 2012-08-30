<?php
namespace DocxHtml\Model\Attributes;

use DocxHtml\Model\Attributes\Attribute;

class WT extends Attribute {
	
	public function __toString(){
		return $this->value;
	}

}
