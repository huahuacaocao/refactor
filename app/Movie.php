<?php

namespace App;

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
    private $priceCode = 0;

    public function __construct(string $title, int $priceCode)
    {
        $this->title = $title;
        $this->priceCode = $priceCode;
    }

    public function getPriceCode(): int
    {
        return $this->priceCode;
    }

    public function setPriceCode(int $price): void
    {
        $this->priceCode = $price;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
	
	/**
	 * 获取影片的费用
	 */
    public function getCharge(int $daysRented): int
    {
        $result = 0;
        switch ($this->getPriceCode()) {
            case self::REGULAR:
                $result = 2;
                if ($daysRented > 2) {
                    $result += ($daysRented - 2) * 1.5;
                }
                break;
            case self::CHILDREN:
                $result = 3;
                if ($daysRented > 3) {
                    $result += ($daysRented - 3) * 1.5;
                }
                break;
            case self::NEW_RELEASE:
                $result = $daysRented * 3;
                break;
        }
        return $result;
	}

	/**
	 * 获取该影片的常客积分
	 */
	public function getFrequentRentalPoints(int $daysRented): int
	{
		$result = 1;
        if ($this->getPriceCode() == Movie::NEW_RELEASE && $daysRented > 1) {
         	$result++;
		}
		return $result;
	}
}
