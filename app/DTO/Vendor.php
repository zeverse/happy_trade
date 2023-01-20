<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class Vendor extends DataTransferObject
{
    public string $id;
    public string $name;
    public string $address;
    public string $url;
}
