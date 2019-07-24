<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Rental;
use App\Customer;
use App\Movie;

$customer = new Customer("digen");
//$rental = new Rental(new Movie("儿童碟片", 1), 10);
//$rental2 = new Rental(new Movie("常规碟片", 0), 10);
$rental3 = new Rental(new Movie("新发碟片", 2), 10);
//$customer->addRental($rental);
//$customer->addRental($rental2);
$customer->addRental($rental3);

$result = $customer->statement();
echo $result;
