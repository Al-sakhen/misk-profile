<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::with('details')->get();

        return response()->json([
            'status' => true,
            'services' => $services,
        ]);
    }
}
