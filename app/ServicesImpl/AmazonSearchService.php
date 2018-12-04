<?php
/**
 * Created by PhpStorm.
 * User: Life
 * Date: 15.11.2018
 * Time: 1:16
 */

namespace App\ServicesImpl;

use App\Services\ISearchService;
use Illuminate\Support\Facades\DB;
use MarcL\AmazonAPI;
use MarcL\AmazonUrlBuilder;

class AmazonSearchService implements ISearchService
{
    private $keyId;
    private $secretKey;
    private $associateId;
    private $amazon;
    private $searchHash;

    public function __construct()
    {
        $this->keyId = config("amazon.key_id");
        $this->secretKey = config("amazon.secret_key");
        $this->associateId = config("amazon.associate_id");

        $urlBuilder = new AmazonUrlBuilder(
            $this->keyId,
            $this->secretKey,
            $this->associateId,
            'ca'
        );

        $this->amazon = new AmazonAPI($urlBuilder, 'simple');


        return $this->amazon;
    }

    public function startSearch($searchHash)
    {
        $this->searchHash = $searchHash;

        $searchInfo = DB::table("searches")->where('hashedname', $searchHash)->first();
        $products = DB::table("upload_{$searchHash}")->select()->limit(20)->get();

        $test = $this->amazon->ItemSearch('harry potter');

        foreach ($products as $product)
            $foundItems = $this->amazon->ItemLookup($product->asin);

    }

    public function stopSearch()
    {
        // TODO: Implement stopScan() method.
    }
}