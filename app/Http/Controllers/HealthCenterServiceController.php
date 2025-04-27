<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthCenterService;
use App\Models\HealthCenter;

class HealthCenterServiceController extends Controller
{
    /**
     * Display the list of active services and health center information.
     */
    public function healthCenter()
    {
        
        // Get health center info
        $healthCenter = HealthCenter::getActiveInfo();

        // Get active services
        $services = HealthCenterService::getActiveServices();
        $healthCenterInfo = HealthCenter::getActiveInfo();

      
        $backgroundImageUrl = asset('/api/placeholder/1200/400'); // default placeholder

        if ($healthCenterInfo && $healthCenterInfo->header_image) {
            $backgroundImageUrl = Storage::disk('public')->url($healthCenterInfo->header_image);
        }else{
        $backgroundImageUrl = asset('/api/placeholder/1200/400'); 
        }

        // dd($healthCenterInfo);

        // Pass data to the view
        return view('Services.health-center', compact('services', 'healthCenter', 'healthCenterInfo', 'backgroundImageUrl'));
    }
}
