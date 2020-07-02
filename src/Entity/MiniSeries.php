<?php

namespace App\Entity;

class MiniSeries
{
	private $losses;
	private $progress;
	private $target;
	private $wins;

	public function __construct($losses, $progress, $target, $wins)
       	{
		$this->losses = $losses;
		$this->progress = $progress;
		$this->target = $target;
		$this->wins = $wins;
	}

	public function getLosses()
	{
		return $this->losses;
	}

	public function getProgress()
	{
		return $this->progress;
	}

	public function getTarget()
	{
		return $this->target;
	}

	public function getWins()
	{
		return $this->wins;
	}
}

