<?php
/**
 * Created by PhpStorm.
 * User: guochen
 * Date: 24/07/2019
 * Time: 11:49 AM
 */

namespace App;

/**
 * 顾客
 * Class Customer
 * @package App
 */
class Customer
{
    private $name = '';
    private $rentals = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addRental(Rental $rental)
    {
        $this->rentals[] = $rental;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    function statement()
    {
        $totalAmount = 0;
        $frequentRentalPoints = 0;
        $result = '';
        foreach ($this->rentals as $each) {
            if ($each instanceof Rental) {
                $thisAmount = $each->getCharge();
            }
            $frequentRentalPoints++;
            if ($each->getMovie()->getPriceCode() == Movie::NEW_RELEASE && $each->getDaysRented() > 1) {
                $frequentRentalPoints++;
            }
            $result .= sprintf("%s\t%d\n", $each->getMovie()->getTitle(), $thisAmount);
            $totalAmount += $thisAmount;
        }
        $result .= sprintf("Anmount owned is %d\nYou earned %d frequent points", $totalAmount, $frequentRentalPoints);
        return $result;
    }
	
}
