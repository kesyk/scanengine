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
use MCS\MWSClient;

class AmazonSearchService implements ISearchService
{
    private $keyId;
    private $secretKey;
    private $marketplaceId;
    private $client;
    private $searchHash;

    public function __construct()
    {
        $this->keyId = config("amazon.key_id");
        $this->secretKey = config("amazon.secret_key");
        $this->marketplaceId = config("amazon.marketplace_id");

        $this->client = new MWSClient([
            'Marketplace_Id' => $this->marketplaceId,
            'Access_Key_ID' => $this->keyId,
            'Seller_Id' => 'AWS EMEA SARL',
            'Secret_Access_Key' => $this->secretKey,
        ]);

        

//        $this->client->GetMatchingProductForId()
        return $this->client;
    }

    public function startSearch($searchHash)
    {
        $this->searchHash = $searchHash;

        $searchInfo = DB::table("searches")->where('hashedname', $searchHash)->first();
        $products = DB::table("upload_{$searchHash}")->select()->limit(20)->get();

    }

    public function stopSearch()
    {
        // TODO: Implement stopScan() method.
    }
}