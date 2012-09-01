<?php
namespace DocxHtml\Model\Attributes;

use DocxHtml\Model\Attributes\Attribute;
/**
 * Class that holds text value
 * @author DawidDereszewski
 *
 */
class WT extends Attribute {
	
	public function __toString(){
		return $this->value;
	}

}
