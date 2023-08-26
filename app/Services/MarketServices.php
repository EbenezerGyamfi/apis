<?php

namespace App\Services;

use App\Traits\AuthorizationMarketRequest;
use App\Traits\ConsumeExternalServices;
use App\Traits\InteractMarketAccessResponses;

class MarketServices
{

    use ConsumeExternalServices, AuthorizationMarketRequest, InteractMarketAccessResponses;


    protected $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.market.base_uri');
    }


    public function getProducts()
    {

        return  $this->makeRequest('GET', 'products');
    }
}

