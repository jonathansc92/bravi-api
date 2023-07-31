<?php

namespace App\Http\Controllers;

use App\Http\Services\BalancedService;
use Illuminate\Http\Request;

class BalancedController extends Controller
{
    protected $service;

    public function __construct(BalancedService $service)
    {
        $this->service = $service;
    }

    public function checkBalanced(Request $request)
    {
        return $this->service->checkStack($request->sequence);
    }
}
