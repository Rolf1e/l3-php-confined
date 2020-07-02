<?php

namespace App\Entity;


class LeagueEntry
{

	private $leagueId;
	private $summonerId;
	private $summonerName;
	private $queueType;
	private $tier;
	private $rank;	
	private $leaguePoints; 	
	private $wins;
	private $losses;
	private $hotStreak; 	
	private $veteran;
	private $freshBlood; 	
	private $inactive;

	public function __construct($leagueId, $summonerId, $summonerName, $queueType, $tier, $rank, $leaguePoints, $wins, $losses, $hotStreak, $veteran, $freshBlood, $inactive)
	{
		$this->leagueId = $leagueId;
		$this->summonerId = $summonerId;
		$this->summonerName = $summonerName;
		$this->queueType = $queueType;
		$this->tier = $tier;
		$this->rank = $rank;
		$this->leaguePoints = $leaguePoints;
		$this->wins = $wins;
		$this->losses = $losses;
		$this->hotStreak = $hotStreak;
		$this->veteran = $veteran;
		$this->freshBlood = $freshBlood;
		$this->inactive = $inactive;
	}

	public function getLeagueId()
	{
		return $this->leagueId;
	}

	public function getSumonnerId()
	{
		return $this->summonerId;
	}

	public function getSummonerName()
	{
		return $this->summonerName;
	}

	public function getQueueType()
	{
		return $this->queueType;
	}

	public function getTier()
	{
		return $this->tier;
	}

	public function getRank()
	{
		return $this->rank;
	}

	public function getLeaguePoints()
	{
		return $this->leaguePoints;
	}
	
	public function getWins()
	{
		return $this->wins;
	}

	public function getLosses()
	{
		return $this->losses;
	}


	public function getHotStreak()
	{
		return $this->hotStreak;
	}

	public function getVeteran()
	{
		return $this->veteran;
	}

	public function getFreshBlood()
	{
		return $this->freshBlood;
	}

	public function getInactive()
	{
		return $this->inactive;
	}

}

