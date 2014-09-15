<?php namespace Laracasts\Providers;

use GuzzleHttp\Client;
use GuzzleHttp\Subscriber\Oauth\Oauth1;
use Illuminate\Support\ServiceProvider;
use Laracasts\Social\TwitterPublisher;

class SocialServiceProvider extends ServiceProvider {

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerTwitterPublisher();
    }

    /**
     * Register the Twitter publisher.
     */
    private function registerTwitterPublisher()
    {
        $this->app->bindShared('Laracasts\Social\Publisher', function($app)
        {
            $guzzle = new Client(['defaults' => ['auth' => 'oauth']]);

            $oauth = new OAuth1([
                'consumer_key' => getenv('TWITTER_CONSUMER_KEY'),
                'consumer_secret' => getenv('TWITTER_CONSUMER_SECRET'),
                'token' => getenv('TWITTER_API_TOKEN'),
                'token_secret' => getenv('TWITTER_API_TOKEN_SECRET')
            ]);

            $guzzle->getEmitter()->attach($oauth);

            return new TwitterPublisher($guzzle);
        });
    }

}
