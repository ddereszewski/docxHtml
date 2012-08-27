<?php
namespace DocxHtml\Model\Attributes;

use DocxHtml\Model\Attributes\Attribute;
require_once realpath(dirname(__FILE__) .'/Attribute.php' ) ;

class WT extends Attribute {
	
	public function __toString(){
		return $this->value;
	}

}
