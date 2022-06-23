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
        $today_weight = $this->weightService->getTodaysWeight();

        return view('user.calendar', compact('calendar', 'today_weight'));
    }

    /**
     * 体重を記録する
     *
     * @return \Illuminate\View\View
     */
    public function register(Request $request)
    {
        $this->weightService->registerWeight($request);

        return redirect()->route('user.calendar');
    }
}
