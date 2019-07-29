<?php
namespace App\Price;

abstract class Price {
	abstract public function getPriceCode();
	abstract public function getCharge(int $daysRented): float;

	public function getFrequentRentalPoints(int $dayRented): int
	{
		return 1;
	}
}
