<?php

function indonesia_format($number)
{
    return number_format($number, 0, ',', '.');
}

function indonesia_date($dates, $show_day = true)
{
    $day_name  = array(
        'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'
    );
    $month_name = array(
        1 =>
        'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
    );

    $year = substr($dates, 0, 4);
    $month = $month_name[(int) substr($dates, 5, 2)];
    $date = substr($dates, 8, 2);
    $text = '';

    if ($show_day) {
        $order_day = date('w', mktime(0, 0, 0, substr($dates, 5, 2), $date, $year));
        $day = $day_name[$order_day];
        $text .= "$day, $date $month $year";
    } else {
        $text .= "$date $month $year";
    }

    return $text;
}

function add_zero_infront($value, $threshold = null)
{
    return sprintf("%0" . $threshold . "s", $value);
}
