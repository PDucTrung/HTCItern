<?php

class Employee
{
	protected $id;
	protected $name;
	protected $age;
	protected $job;

	public function setId($id)
	{
		$this->id = $id;
	}
	public function getId()
	{
		return $this->id;
	}

	public function setName($name)
	{
		$this->name = $name;
	}
	public function getName()
	{
		return $this->name;
	}

	public function setAge($age)
	{
		$this->age = $age;
	}
	public function getAge()
	{
		return $this->age;
	}

	public function setAddress($job)
	{
		$this->job = $job;
	}
	public function getAddress()
	{
		return $this->job;
	}
}
