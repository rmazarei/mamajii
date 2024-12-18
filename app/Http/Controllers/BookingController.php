<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;

class BookingController extends Controller
{
    public function stepOne(User $user): \Inertia\Response
    {
        if ($user->user_type != 'midwife') {
            abort(404);
        }

        $months = [
            [verta()->format("F"), verta()->format("Y")],
            [verta()->addMonths(1)->format("F"), verta()->addMonths(1)->format("Y")],
            [verta()->addMonths(2)->format("F"), verta()->addMonths(2)->format("Y")],
        ];

        $weekDaysList = [
            'sat' => 'شنبه',
            'sun' => 'یک‌شنبه',
            'mon' => 'دوشنبه',
            'tue' => 'سه‌شنبه',
            'wed' => 'چهارشنبه',
            'thu' => 'پنج‌شنبه',
            'fri' => 'جمعه',
        ];
        $weekDays = [];
        $counter = 0;
        if($user->times != null && count($user->times) > 0) {
            foreach ($user->times as $title => $value) {
                if ($value == "on") {
//                echo $title . ": " . $value . '<br>';
                    /*
                    $weekDays[$weekDaysList[$title]] = [
                        'start' => date("H:i", strtotime(($user->times)['start_'.(($counter + 1) / 3) - 1])),
                        'end' => date("H:i", strtotime(($user->times)['end_'.(($counter + 1) / 3) - 1]))
                    ];
                    */
                    $weekDays[] = $weekDaysList[$title];
                }
                $counter++;
            }
        }

//        dd(date("H:i", strtotime("21:00")));

        // dd($weekDays);

        return Inertia::render('Booking/StepOne', ['doctor' => $user, 'months' => $months, 'weekDays' => $weekDays]);
    }
}
