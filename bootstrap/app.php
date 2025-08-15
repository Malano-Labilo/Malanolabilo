<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Storage;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'secret.login.access' => \App\Http\Middleware\EnsureSecretLoginAccess::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })
    ->withSchedule(function (Schedule $schedule) {
        $schedule->call(function () {
            // Hapus file di storage/app/public/tmp/avatar yang lebih dari 1 jam
            $avatar = Storage::disk('public')->files('tmp/avatar');
            foreach ($avatar as $file) {
                $lastModified = Carbon::createFromTimestamp(Storage::disk('public')->lastModified($file));
                if ($lastModified->diffInMinutes(now()) > 1) {
                    Storage::disk('public')->delete($file);
                }
            }
            //Hapus Juga Di Tmp/Thumbnail
            $thumbnails = Storage::disk('public')->files('tmp/thumbnail');
            foreach ($thumbnails as $file) {
                $lastModified = Carbon::createFromTimestamp(Storage::disk('public')->lastModified($file));
                if ($lastModified->diffInMinutes(now()) > 1) {
                    Storage::disk('public')->delete($file);
                }
            }
            Log::info('Scheduler test via bootstrap: ' . now());
        })->everyMinute();
    })
    ->create();
