<?php

namespace App\DTO;

class DishDetail extends \Spatie\DataTransferObject\DataTransferObject
{
    public string $name;
    public float $price;
    public ?string $photo;

}
