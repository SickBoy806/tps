<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
{
    // Main services listing page
    return view('services.index');
}

public function drivingSchool()
{
    return view('services.driving-school');
}

public function healthCenter()
{
    return view('services.health-center');
}

public function poetry()
{
    return view('services.poultry');
}

public function dogsHorses()
{
    return view('services.dogs-horses');
}

public function catering()
{
    return view('services.catering');
}
}
