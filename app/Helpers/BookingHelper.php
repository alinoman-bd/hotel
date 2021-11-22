<?php
class BookingHelper
{
    public static function addsbtotal($key, $value)
    {
        request()->session()->put($key, $value);
    }
    public static function put($key, $value)
    {
        $is_matched = false;
        $data = [];
        if (request()->session()->has($key)) {
            $data = self::get($key);
        }

        if (count($data)) {
            $tempdata = [];
            foreach ($data as $session) {
                if ($session['id'] == $value['id'] && $session['arrive_date'] == $value['arrive_date'] && $session['departure_date'] == $value['departure_date']) {
                    $session['number_of_room'] += $value['number_of_room'];
                    $is_matched = true;
                }
                $session['calculation'] = $session['number_of_room'] . ' * $' . $session['price'];
                array_push($tempdata, $session);
            }
        }
        if (!$is_matched) {
            $value['calculation'] = $value['number_of_room'] . ' * $' . $value['price'];
            array_push($data, $value);
        } else {
            $data = $tempdata;
        }
        request()->session()->put($key, $data);
    }
    public static function delete($key, $value)
    {
        $data = [];
        if (request()->session()->has($key)) {
            $data = self::get($key);
        }
        if (count($data)) {
            $tempdata = [];
            foreach ($data as $session) {
                if ($session['id'] != $value) {
                    array_push($tempdata, $session);
                }
            }
        }
        $data = $tempdata;
        request()->session()->put($key, $data);
    }
    public static function get($key)
    {
        return request()->session()->get($key);
    }

    public static function forget($key)
    {
        request()->session()->forget($key);
    }
}
