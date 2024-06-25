<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DateTime;
use Illuminate\Database\Events\TransactionBeginning;
use Illuminate\Database\Events\TransactionCommitted;
use Illuminate\Database\Events\TransactionRolledBack;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        DB::listen(function ($query): void {
            $sql = $query->sql;
    
            foreach ($query->bindings as $binding) {
                if (is_string($binding)) {
                   $binding = "'{$binding}'";
                } elseif (is_bool($binding)) {
                    $binding = $binding ? '1' : '0';
                } elseif (is_int($binding)) {
                    $binding = (string) $binding;
                } elseif ($binding === null) {
                    $binding = 'NULL';
                } elseif ($binding instanceof Carbon || $binding instanceof \Carbon\Carbon) {
                    $binding = "'{$binding->toDateTimeString()}'";
                } elseif ($binding instanceof DateTime) {
                    $binding = "'{$binding->format('Y-m-d H:i:s')}'";
                }
        
                $sql = preg_replace('/\\?/', $binding, $sql, 1);
            }
        
            Log::debug("SQL", ["time" => sprintf("%.2f ms", $query->time), "sql" => $sql]);
        });
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \URL::forceScheme('https'); // リンクをHTTPSにする設定に修正
    }
}
