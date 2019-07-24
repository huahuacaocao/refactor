<?php
/**
 * Created by PhpStorm.
 * User: guochen
 * Date: 24/07/2019
 * Time: 9:41 AM
 */

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

	public function getCharge() {
		$result = 0;
		switch ($this->getMovie()->getPriceCode()) {
			case Movie::REGULAR:
 				$result = 2;
            	if ($this->getDaysRented() > 2) {
                	$result += ($this->getDaysRented() - 2) * 1.5;
               	}
             	break;
            case Movie::CHILDREN:
            	$result = 3;
            	if ($this->getDaysRented() > 3) {
              		$result += ($this->getDaysRented() - 3) * 1.5;
             	}
             	break;
        	case Movie::NEW_RELEASE:
            	$result = $this->getDaysRented() * 3;
           		break;
   		 }
		return $result;
	}
}
