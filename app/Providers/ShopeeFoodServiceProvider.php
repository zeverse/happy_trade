<?php

namespace App\Providers;

use App\Common\Constant\Http\External\ShopeeFood\ShopeeFoodDishListRequest;
use App\DTO\DishDetail;
use App\DTO\Vendor;
use App\Interfaces\VendorService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;


class ShopeeFoodServiceProvider extends ServiceProvider implements VendorService
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public function searchRestaurant(string $keyword): array
    {
        // TODO: Implement searchRestaurant() method.
        return [];
    }

    public function getDishList(Vendor $vendor): array
    {
        $deliveryId = $this->getDataFromURL($vendor->url);
        $response = Http::withHeaders(
            ShopeeFoodDishListRequest::$headers
        )->get(ShopeeFoodDishListRequest::$getDishListURL, [
            "id_type" => 2,
            "request_id" => $deliveryId
        ])->json();

        return $this->getUniqueDishFromResponse($response);

    }

    public function getDishDetail(): DishDetail
    {
        // TODO: Implement getDishDetail() method.
        return new DishDetail();
    }

    private function getDataFromURL(string $url): int
    {
        $getDataFromURLURL = ShopeeFoodDishListRequest::$getIdFromURLURL;
        $response = Http::withHeaders(
            ShopeeFoodDishListRequest::$headers
        )->get(
            "$getDataFromURLURL?url=$url"
        );

        return $response->json()["reply"]["delivery_id"];
    }

    /**
     * @param array $response Response of get dish list request
     * @return array Array of unique dish in selected restaurant
     */
    private function getUniqueDishFromResponse(array $response): array
    {
        $repeatedDishList = $response["reply"]["menu_infos"];
        $uniqueDishList = array();

        foreach ($repeatedDishList as $singleDishList) {
            foreach ($singleDishList["dishes"] as $dish) {
                if (!array_key_exists($dish["id"], $singleDishList)) {
                    $uniqueDishList[$dish["id"]] = $dish;
                }
            }
        }

        return array_values($uniqueDishList);

    }
}
