<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalendarController extends Controller
{
    public function getCurrentCalendar()
    {
        if (request('type') == 'true' || request('type') == null) {
            return view('includes.calendar.calendar')->render();
        }
        return view('includes.calendar.calendarfront')->render();
    }
    public function getCalendarDate(Request $request)
    {
        if ($request->btn == 1) {
            $data['next_date'] = Carbon::parse($request->date);
            $data['next_month'] = $data['next_date']->copy()->localeMonth;
            $data['next_year'] = $data['next_date']->copy()->year;
            $data['current_date'] = $data['next_date']->copy()->subMonth();
            $data['current_month'] = $data['current_date']->copy()->localeMonth;
            $data['current_year'] = $data['current_date']->copy()->year;
        } else {
            if (request('type') == 'true' || request('type') == null) {
                $data['current_date'] = Carbon::parse($request->date);
                $data['current_month'] = $data['current_date']->copy()->localeMonth;
                $data['current_year'] = $data['current_date']->copy()->year;
                $data['next_date'] = $data['current_date']->copy()->addMonth();
                $data['next_month'] = $data['next_date']->copy()->localeMonth;
                $data['next_year'] = $data['next_date']->copy()->year;
            } else {
                $data['current_date'] = Carbon::parse($request->date)->copy()->addMonth();
                $data['current_month'] = $data['current_date']->copy()->localeMonth;
                $data['current_year'] = $data['current_date']->copy()->year;
            }
        }
        return $data;
    }
}
