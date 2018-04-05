<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class ScheduleController extends Controller
{
    public function selectUrlsToCheck()
    {
        Artisan::call('select-urls-to-check');

        return 'Launched';
    }
}
