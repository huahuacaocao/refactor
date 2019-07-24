<?php

namespace App;

/**
 * 影片磁带
 * Class Movie
 * @package App
 */
class Movie
{
    public const  REGULAR = 0;
    public const  CHILDREN = 1;
    public const  NEW_RELEASE = 2;

    private $title = '';
    private $priceCode = 0;

    public function __construct(string $title, int $priceCode)
    {
        $this->title = $title;
        $this->priceCode = $priceCode;
    }

    public function getPriceCode(): int
    {
        return $this->priceCode;
    }

    public function setPriceCode(int $price): void
    {
        $this->priceCode = $price;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

}