<?php

namespace DocxHtml\Controller;
/**
 * Class responsible for walking throw model in correct way and draw
 * @author DawidDereszewski
 *
 */

use DocxHtml\Model\Document\WR;

use DocxHtml\Model\Document\Model;

class DocumentModelWalker {

	private $model;

	/**
	 * used to remember last used style for WI class
	 * @var unknown_type
	 */
	private $lastStyle;

	/**
	 * walk through the model and optymize printed value
	 */
	function __construct($model) {
		$this->model = $model;
	}

	function optimize(&$model = false) {

		if ($model === false) {
			$parent = $this->model;
		}
		
		if ($model instanceof Model) {
			$parent = $model;
		}
		

		foreach ($parent->getChildren() as $key => $model) {

			if ($model instanceof WR) {
				//previous element already renderd the same style
				if ($this->lastStyle != (string) $model->getAttributes()) {
					$model->getAttributes()->setIsFirst();
					$this->lastStyle = (string) $model->getAttributes();
					//becouse of this is first we need to set previous as last
					$prev = $parent->getNthChildern($key - 1);
					if($prev != null){
						$prev->getAttributes()->setIsLast();
					}
				} else {
					
				}
				
				if(count($parent->getChildren()) == $key +1 ){
					$model->getAttributes()->setIsLast();
				}elseif($key == 0){
					$model->getAttributes()->setIsFirst();
				}
	
				
			}

			$this->optimize($model);
		}

	}

}
