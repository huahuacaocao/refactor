<?php
namespace App\Price;

use App\Movie;

class  RegularPrice extends Price{
	public function getPriceCode(): int
	{
		return Movie::REGULAR;
	}

	public function getCharge(int $daysRented): float
	{
    	$result = 2;
        if ($daysRented > 2) {
			$result += ($daysRented - 2) * 1.5;
    	}
		return $result;
	}
}
