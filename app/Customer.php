<?php
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
            	$result .= sprintf("%s\t%d\n", $each->getMovie()->getTitle(), $thisAmount);
            }
        }
		$result .= sprintf(
			"Anmount owned is %d\nYou earned %d frequent points", 
			$this->getTotalAmount(), 
			$this->getTotalFrequentRentalPoints()
		);
        return $result;
	}

	/**
	 * 获取总费用
	 */
    private function getTotalAmount(): int
    {
        $result = 0;
        foreach ($this->rentals as $each) {
            if ($each instanceof Rental) {
                $result += $each->getCharge();
            }
        }
        return $result;
	}

	/**
	 * 获取总常客积分 
	 */
    private function getTotalFrequentRentalPoints(): int
    {
        $result = 0;
        foreach ($this->rentals as $each) {
            if ($each instanceof Rental) {
            	$result += $each->getFrequentRentalPoints();
            }
        }
        return $result;
	}

}
