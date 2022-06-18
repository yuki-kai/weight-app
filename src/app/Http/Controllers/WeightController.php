<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WeightService;

class WeightController extends Controller
{
    public function __construct(WeightService $weightService)
    {
        $this->weightService = $weightService;
    }

    /**
     * カレンダーを表示する
     *
     * @return \Illuminate\View\View
     */
    public function calendar()
    {
        $calendar = $this->weightService->createCalendar();

        return view('user.calendar', compact('calendar'));
    }
}
