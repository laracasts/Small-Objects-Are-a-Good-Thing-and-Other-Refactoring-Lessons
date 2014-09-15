<?php namespace Laracasts\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['events']->listen(
            'PostWasPublished',
            'Laracasts\Listeners\SocialNotifier@whenPostWasPublished'
        );
    }

}