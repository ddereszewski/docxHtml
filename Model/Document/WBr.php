<?php
namespace DocxHtml\Model\Document;

use DocxHtml\Model\Document\Base;
require_once realpath(dirname(__FILE__) .'/Model.php' ) ;

class WBr extends Model  {
	
	
	
	public function draw(){
	 	return '<br />';
	}

}