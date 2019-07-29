<?php

namespace App;

use App\Price\RegularPrice;
use App\Price\ChildrenPrice;
use App\Price\NewReleasePrice;

/**
 * 影片磁带
 * Class Movie
 * @package App
 */
class Movie
{
    public const  REGULAR = 0;
    public const  CHILDREN = 1;
    public const  NEW_RELEASE = 2;

    private $title = '';
    private $priceCode = null;

    public function __construct(string $title, int $priceCode)
    {
		$this->setTitle($title);
		$this->setPriceCode($priceCode);
    }

    public function getPriceCode(): int
    {
        return $this->priceCode->getPriceCode();
    }

    public function setPriceCode(int $arg): void
	{
		switch($arg) {
		case self::REGULAR:
			$this->priceCode = new RegularPrice();
		case self::CHILDREN:
			$this->priceCode = new ChildrenPrice();
			break;
		case self::NEW_RELEASE:
			$this->priceCode = new NewReleasePrice();
			break;
		default:
			throw new \InvalidArgumentException('Price Code 无效');
		}
    }

    public function getTitle(): string
    {
        return $this->title;
	}

	private function setTitle(string $title): void {
		$this->title = $title;
	}
	
	/**
	 * 获取影片的费用
	 */
    public function getCharge(int $daysRented): float
	{
		return $this->priceCode->getCharge($daysRented);
	}

	/**
	 * 获取该影片的常客积分
	 */
	public function getFrequentRentalPoints(int $daysRented): int
	{	
		return $this->priceCode->getFrequentRentalPoints($daysRented);
	}
}
