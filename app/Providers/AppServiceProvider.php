<?php

namespace App\Providers;

use App\Models\ChatSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.app', function ($view) {
            $chatWidgetSettings = null;

            try {
                if (Schema::hasTable('chat_settings')) {
                    $chatWidgetSettings = ChatSetting::current();
                }
            } catch (\Throwable $e) {
                $chatWidgetSettings = null;
            }

            $view->with('chatWidgetSettings', $chatWidgetSettings);
        });
    }
}
