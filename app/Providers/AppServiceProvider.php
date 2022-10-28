<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('currency_format', function ($amount) {
            return "<?php echo number_format($amount, 0 , ',', '.') . ' vnđ'; ?>";
        });

        Blade::directive('date_format', function ($date) {
            return "<?php echo \Carbon\Carbon::parse($date)->format('d/m/Y') ?>";
        });
    }
}
