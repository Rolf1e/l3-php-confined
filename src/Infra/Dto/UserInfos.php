<?php


namespace App\Infra\Dto;


class UserInfos
{
	private $summoner;
	private $leagueEntry;
	
	public function __construct($summoner, $leagueEntry)
	{
		$this->summoner = $summoner;
		$this->leagueEntry = $leagueEntry;
	}

	public function getSummoner() 
	{
		return $this->summoner;
	}

	public function getLeagueEntry()
	{
		return $this->leagueEntry;
	}		
}

