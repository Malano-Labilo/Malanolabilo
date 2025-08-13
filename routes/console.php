<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Support\Facades\Storage;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// // Crontab adalah fitur menghapus otomatis semua file avatar 1 jam sekali
// Schedule::call(function () {
//     $files = Storage::disk('public')->files('tmp/avatar');
//     foreach ($files as $file) {
//         $fullPath = storage_path('app/public/' . $file);
//         if (file_exists($fullPath) && now()->diffInMinutes(filemtime($fullPath)) > 60) {
//             Storage::disk('public')->delete($file);
//         }
//     }
// })->hourly();
