<?php 

namespace Daoo\Aula03\controller\api;

use Daoo\Aula03\model\Model;

abstract class Controller{

	public abstract function index();

	protected function setHeader(int $statusCode = 0,string $message = ''){
		header("Content-Type:application/json;charset=utf-8'");
		header("HTTP/1.0 $statusCode $message");
	}

	protected function validatePostRequest(array $fields):bool{
		foreach($fields as $field)
			if(!isset($_POST[$field])){
				$this->setHeader(400,'Bad Request');
				return false;
			}
		return true;
	}
}