<?php

namespace App\Http\Controllers;

use App\Services\MarketServices;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    protected $marketService;

    public function __construct(MarketServices $marketService)
    {
        $this->marketService = $marketService;
    }
}
