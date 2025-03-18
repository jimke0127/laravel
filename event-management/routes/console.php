<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command("app:send-event-reminders",function(){
    return "ok";
})->everyMinute();

Schedule::call(function () {
    //DB::table('recent_users')->delete();
    file_put_contents(public_path()."/test4.log",date("Y-m-d H:i:s")." hehe...".PHP_EOL,8);
})->everyMinute();
