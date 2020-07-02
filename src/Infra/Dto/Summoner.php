<?php


namespace App\Infra\Dto;


class Summoner
{
	private $accountId;
	private $profileIconId;
	private $revisionDate;
	private $name;
	private $id;
	private $puuid;
	private $summonerLevel;

	public function __construct($accountId, $profileIconId, $revisionDate, $name, $id, $puuid, $summonerLevel)
	{
		$this->accountId = $accountId;
		$this->profileIconId = $profileIconId;
		$this->revisionDate = $revisionDate;
		$this->name = $name;
		$this->id = $id;
		$this->puuid = $puuid;
		$this->summonerLevel = $summonerLevel;
	}

	public function getAccoundId()
	{
		return $this->accountId;
	}

	public function getProfileIcon()
	{
		return  HTTPS_DDRAGON_LEAGUEOFLEGENDS_COM. HTTPS_SUMMONER_ICON . $this->profileIconId . '.png';
	}

	public function getRevisionDate()
	{
		return $this->revisionDate;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getPuuid()
	{
		return $this->puuid;
	}

	public function getSummonerLevel()
	{
		return $this->summonerLevel;
	}

}
