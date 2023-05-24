<?php
// model model
require_once "../model/model.php";

class controller
{
	protected $model;
	public function __construct()
	{
		$this->model = new model();
	}
}
