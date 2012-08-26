<?php

namespace DocxHtml\Model\Document\Base;

abstract class Model implements Drawable{

	/**
	 * List of children of element
	 * @var Array of Model
	 */
	protected $children;
	
	protected $parent;
	
	public function draw();
	
}
