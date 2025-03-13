<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class HistoryController extends Controller
{
    /**
     * Get historical events data
     * 
     * @return array
     */
    private function getHistoricalEvents()
    {
        // This could be moved to a database or service in a real application
        return [
            1 => [
                'year' => '1950',
                'title' => 'Department Founded',
                'description' => 'The police department was officially established with just 5 officers.'
            ],
            3 => [
                'year' => '1965',
                'title' => 'First Headquarters',
                'description' => 'Opening of the first dedicated headquarters building in the downtown area.'
            ],
            5 => [
                'year' => '1982',
                'title' => 'Community Outreach Program',
                'description' => 'Launch of our first community engagement initiative.'
            ],
            7 => [
                'year' => '1997',
                'title' => 'Technology Upgrade',
                'description' => 'Implementation of computerized record keeping and dispatch systems.'
            ],
            9 => [
                'year' => '2010',
                'title' => 'Modern Training Facility',
                'description' => 'Opening of state-of-the-art training center for officers.'
            ],
            11 => [
                'year' => '2023',
                'title' => 'Present Day',
                'description' => 'Current operations with over 200 officers serving the community.'
            ]
        ];
    }

    /**
     * Display the history page with timeline data
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Get the current month (1-12)
        $currentMonth = Carbon::now()->month;
        
        return $this->renderHistoryView($currentMonth);
    }
    
    /**
     * Display specific month's history
     *
     * @param int $month The month to display (1-12)
     * @return \Illuminate\View\View
     */
    public function showMonth($month)
    {
        $month = (int)$month;
        
        // Validate month
        if ($month < 1 || $month > 12) {
            $month = Carbon::now()->month;
        }
        
        return $this->renderHistoryView($month);
    }
    
    /**
     * Prepare and render the history view
     * 
     * @param int $currentMonth
     * @return \Illuminate\View\View
     */
    private function renderHistoryView($currentMonth)
    {
        // Historical events data
        $historicalEvents = $this->getHistoricalEvents();
        
        // Calculate the percentage for the timeline indicator position
        // January (1) = 0%, December (12) = 100%
        $currentMonthPercentage = ($currentMonth - 1) * (100 / 11);
        
        // Find events for the current month
        $currentMonthEvents = $historicalEvents[$currentMonth] ?? null;
        
        // Get events for the previous and next months for navigation
        $previousMonth = $currentMonth > 1 ? $currentMonth - 1 : 12;
        $nextMonth = $currentMonth < 12 ? $currentMonth + 1 : 1;
        
        return view('about.history', compact(
            'currentMonth',
            'currentMonthPercentage',
            'historicalEvents',
            'currentMonthEvents',
            'previousMonth',
            'nextMonth'
        ));
    }
}