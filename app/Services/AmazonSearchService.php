<?php
/**
 * Created by PhpStorm.
 * User: Life
 * Date: 15.11.2018
 * Time: 1:16
 */

namespace App\Services;

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

    public function __construct($t_searchHash)
    {
        $this->keyId = config("amazon.key_id");
        $this->secretKey = config("amazon.secret_key");

        $urlBuilder = new AmazonUrlBuilder(
            $this->keyId,
            $this->secretKey,
            "test",
            'us'
        );

        $this->amazon = new AmazonAPI($urlBuilder, 'simple');

        $this->searchHash = $t_searchHash;

        return $this->amazon;
    }

    public function startSearch()
    {
        $searchInfo = DB::table("searches")->where('hashedname', $this->searchHash)->first();
        $products = DB::table("upload_{$this->searchHash}")->select()->limit(20)->get();

        foreach ($products as $product)
            $foundItems = $this->amazon->ItemLookup($product->asin);

    }

    public function stopSearch()
    {
        // TODO: Implement stopScan() method.
    }
}