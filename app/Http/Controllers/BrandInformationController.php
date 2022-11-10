<?php

namespace App\Http\Controllers;

use App\Models\BrandInformation;
use Illuminate\Http\Request;

class BrandInformationController extends Controller
{
    public function index()
    {
        return BrandInformation::all();
    }
    public function show($infoId)
    {
        return BrandInformation::find($infoId);
    }
}
