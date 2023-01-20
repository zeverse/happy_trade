<?php

namespace App\Interfaces;
use App\DTO\DishDetail;
use App\DTO\Vendor;

interface VendorService {

    public function searchRestaurant(string $keyword): array;
    public function getDishList(Vendor $vendor): array;
    public function getDishDetail(): DishDetail;

}
