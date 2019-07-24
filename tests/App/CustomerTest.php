<?php
/**
 * Created by PhpStorm.
 * User: guochen
 * Date: 24/07/2019
 * Time: 3:05 PM
 */

namespace Test\App;

use App\Customer;
use App\Rental;
use PHPUnit\Framework\TestCase;
use App\Movie;

class CustomerTest extends TestCase
{
    private $customer = null;

    public function setUp(): void
    {
        parent::setUp();
        $this->customer = new Customer('digen');
    }

    public function tearDown(): void
    {
        unset($this->customer);
    }

    /**
     * 测试租赁为空
     */
    public function test_statement_for_empty_rental()
    {
        $res = $this->customer->statement();
        $this->assertEquals("Anmount owned is 0\nYou earned 0 frequent points", $res);
    }

    /**
     * 测试租赁常规碟片
     */
    public function test_statment_for_regular_movie_retal()
    {
        $movieStub = $this->createMock(Movie::class);
        $movieStub->method('getPriceCode')->willReturn(0);
        $movieStub->method('getTitle')->willReturn('常规碟片');
        $rentalStub = $this->createMock(Rental::class);
        $rentalStub->method('getMovie')->willReturn($movieStub);
        $rentalStub->method('getDaysRented')->willReturn(10);
        $this->customer->addRental($rentalStub);
        $res = $this->customer->statement();
        $this->assertEquals("常规碟片\t14\nAnmount owned is 14\nYou earned 1 frequent points", $res);
    }

    /**
     * 测试租赁儿童类碟片
     */
    public function test_statement_for_children_movie_rental()
    {
        $movieStub = $this->createMock(Movie::class);
        $movieStub->method('getPriceCode')->willReturn(1);
        $movieStub->method('getTitle')->willReturn('儿童碟片');
        $rentalStub = $this->createMock(Rental::class);
        $rentalStub->method('getMovie')->willReturn($movieStub);
        $rentalStub->method('getDaysRented')->willReturn(10);
        $this->customer->addRental($rentalStub);
        $res = $this->customer->statement();
        $this->assertEquals("儿童碟片	13\nAnmount owned is 13\nYou earned 1 frequent points", $res);
    }

    /**
     * 测试租赁新发布碟片
     */
    public function test_statement_for_new_release_rental()
    {
        $movieStub = $this->createMock(Movie::class);
        $movieStub->method('getPriceCode')->willReturn(2);
        $movieStub->method('getTitle')->willReturn('新发碟片');
        $rentalStub = $this->createMock(Rental::class);
        $rentalStub->method('getMovie')->willReturn($movieStub);
        $rentalStub->method('getDaysRented')->willReturn(10);
        $this->customer->addRental($rentalStub);
        $res = $this->customer->statement();

        $this->assertEquals("新发碟片	30\nAnmount owned is 30\nYou earned 2 frequent points", $res);
    }

    /**
     * 测试租赁所有类型的碟片
     */
    public function test_statement_for_all_type_movie_retal()
    {
        $this->assertTrue(true);
    }

}
