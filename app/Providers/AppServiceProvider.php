<?php

namespace App\Providers;

use App\Notifications\TelegramFailedJob;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Queue\QueueManager;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\ServiceProvider;

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
        Blade::directive('currency', function ($value) {
            return "<?php echo App\Util\Currency::format($value); ?>";
        });

        app(QueueManager::class)->failing(function (JobFailed $event) {
            Notification::send('telegram-bot-api', new TelegramFailedJob());
        });
    }
}
