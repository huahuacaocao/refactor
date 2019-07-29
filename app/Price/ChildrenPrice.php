<?php
namespace App\Price;

use App\Movie;

class  ChildrenPrice extends Price{
	public function getPriceCode(): int
	{
		return Movie::CHILDREN;
	}

	public function getCharge(int $daysRented): float {
    	$result = 3;
   		if ($daysRented > 3) {
        	$result += ($daysRented - 3) * 1.5;
      	}
		return $result;
	}
}
