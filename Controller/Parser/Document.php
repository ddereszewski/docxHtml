<?php

namespace DocxHtml\Controller\Parser;
use DocxHtml\Model\Attributes\WB;
require_once realpath(dirname(__FILE__) . '/../../Model/Attributes/WB.php');

use DocxHtml\Model\Document\WBody;
require_once realpath(dirname(__FILE__) . '/../../Model/Document/WBody.php');
use DocxHtml\Model\Document\WP;
require_once realpath(dirname(__FILE__) . '/../../Model/Document/WP.php');
use DocxHtml\Model\Document\WR;
require_once realpath(dirname(__FILE__) . '/../../Model/Document/WR.php');
use DocxHtml\Model\Attributes\WT;
require_once realpath(dirname(__FILE__) . '/../../Model/Attributes/WT.php');

use DocxHtml\Controller\Parser;
require_once "Controller/Parser.php";

class Document extends Parser {

	private $model;

	public function getModel() {
		return $this->model;
	}

	public function parse() {
		$w = $this->xml->children($this->namespaces['w']);

		$this->model = new WBody();

		foreach ($w->body->p as $key => $element) {
			$child = $this->parseP($this->model, $element);

			$this->model->addChildren($child);
		}
	}

	private function parseNodes($parent, $xml, $nodeName) {

		$methodName = 'parse' . (ucfirst($nodeName));
		if (method_exists($this, $methodName)) {
			return $this->$methodName($parent, $xml);
		} else {
			#echo 'missing method: ' . $methodName;
		}
		return null;
	}

	private function parseAttributes($parent, $xml, $nodeName) {
		$methodName = 'parseAttr' . (ucfirst($nodeName));
		if (method_exists($this, $methodName)) {
			return $this->$methodName($parent, $xml);
		} else {
			#echo 'missing method: ' . $methodName;
		}
		return null;
	}

	private function parseP($parent, $xml) {

		$p = new WP($parent);

		foreach ($xml as $key => $node) {
			$child = $this->parseNodes($p, $node, $key);
			if($child != null){
				$p->addChildren($child);
			}
			$attr = $this->parseAttributes($p, $node, $key);
		}

		return $p;

	}
	
	private function parseR($parent, $xml){
		$r = new WR();
		
		foreach ($xml as $key => $node) {
			$child = $this->parseNodes($r, $node, $key);
			if($child != null){
				$r->addChildren($child);
			}
			$attr = $this->parseAttributes($r, $node, $key);
			if($attr != null){
				$r->setAttribute($attr);
			}
		}
		
		return $r;
	}

	private function parseAttrT($parent, $xml){	
		$parent->setValue( new WT((string)$xml ) );
	}
	
	private function parseAttrRPr($parent, $xml){
		
		foreach ($xml as $key => $node) {
			$attr = $this->parseAttributes($parent, $node, $key);
			if($attr != null){
				$parent->setAttribute($attr);
			}
		}
	}
	
	private function parseAttrB($parent, $xml){
		$parent->setAttribute(new WB());
	}
	
}
