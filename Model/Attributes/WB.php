<?php
namespace DocxHtml\Model\Attributes;

use DocxHtml\Model\Attributes\Attribute;
require_once realpath(dirname(__FILE__) .'/Attribute.php' ) ;


/**
 * BOLD class
 * @author DawidDereszewski
 *
 */
class WB extends Attribute {

	public function __construct(){
		
	}
	
	
	public function __toString(){
		return 'font-weight: bold';
	}
	
}
