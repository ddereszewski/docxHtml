<?php
namespace DocxHtml\Model\Attributes;

use DocxHtml\Model\Attributes\Attribute;
require_once realpath(dirname(__FILE__) .'/Attribute.php' ) ;


/**
 * Italic class
 * @author DawidDereszewski
 *
 */
class WI extends Attribute {

	public function __construct(){
		
	}
	
	
	public function __toString(){
		return 'font-style: italic';
	}
	
}
