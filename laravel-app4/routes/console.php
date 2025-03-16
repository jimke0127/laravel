<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schedule;
use \App\Models\Profile;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::call(function () {
    //DB::table('recent_users')->delete();
    //file_put_contents("test.log",date("Y-m-d H:i:s")." hehe...".PHP_EOL,8);
    (new Profile())->testCron();
})->hourly();
