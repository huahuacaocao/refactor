<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Rental;
use App\Customer;
use App\Movie;

$customer = new Customer("digen");
$rental = new Rental(new Movie("葫芦娃", 1), 7);
$rental2 = new Rental(new Movie("倩女幽魂", 0), 30);
$rental3 = new Rental(new Movie("镜花水月", 2), 30);
$customer->addRental($rental);
$customer->addRental($rental2);
$customer->addRental($rental3);

$result = $customer->statement();
echo $result;
