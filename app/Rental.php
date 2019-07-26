<?php
namespace App;

/**
 * 租赁
 * Class Rental
 * @package App
 */
class Rental
{
    private $movie = null;
    private $daysRented = 0;

    public function __construct(Movie $movie, int $daysRented)
    {
        $this->movie = $movie;
        $this->daysRented = $daysRented;
    }

    /**
     * @return Movie|null
     */
    public function getMovie(): ?Movie
    {
        return $this->movie;
    }

    /**
     * @return int
     */
    public function getDaysRented(): int
    {
        return $this->daysRented;
    }
	
	/**
	 * 获取租赁碟片的费用
	 */
    public function getCharge(): int
	{
		return $this->getMovie()->getCharge($this->getDaysRented());
	}
	
	public function getFrequentRentalPoints(): int
	{
		return $this->getMovie()->getFrequentRentalPoints($this->getDaysRented());
	}
}
