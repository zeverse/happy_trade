<?php

namespace Tests\Feature;

use App\DTO\Vendor;
use App\Providers\ShopeeFoodServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class VendorTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $sampleVendor = new Vendor(
            id: "",
            name: "",
            address: "",
            url: "ho-chi-minh/bep-ba-muoi-an-vat-online"
        );

        $shopeeProvider = new ShopeeFoodServiceProvider($this->app);
        $sampleResponse = ($shopeeProvider->getDishList($sampleVendor));
        $this->assertTrue($sampleResponse[0]["id"] == 10250362);
    }
}
