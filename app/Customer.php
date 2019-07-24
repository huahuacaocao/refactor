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
                $thisAmount = 0;
                switch ($each->getMovie()->getPriceCode()) {
                    case Movie::REGULAR:
                        $thisAmount = 2;
                        if ($each->getDaysRented() > 2) {
                            $thisAmount += ($each->getDaysRented() - 2) * 1.5;
                        }
                        break;
                    case Movie::CHILDREN:
                        $thisAmount = 3;
                        if ($each->getDaysRented() > 3) {
                            $thisAmount += ($each->getDaysRented() - 3) * 1.5;
                        }
                        break;
                    case Movie::NEW_RELEASE:
                        $thisAmount = $each->getDaysRented() * 3;
                        break;
                }
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