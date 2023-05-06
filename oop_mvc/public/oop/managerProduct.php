<?php

class ManagerProduct extends Person implements calculatePay
{
	protected $typeWorker;
	protected $level;
	protected $noun;
	public function setTypeWorker($typeWorker)
	{
		$this->typeWorker = $typeWorker;
	}
	public function getTypeWorker()
	{
		return $this->typeWorker;
	}
	public function setLevel($level)
	{
		$this->level = $level;
	}
	public function getLevel()
	{
		return $this->level;
	}
	public function setNoun($noun)
	{
		$this->noun = $noun;
	}
	public function getNoun()
	{
		return $this->noun;
	}
	public function calculatePay()
	{
		return $Pay = $this->getBasicPay() + $this->getHourDo() * (30000 + 50000 * $this->getNoun());
	}
}
