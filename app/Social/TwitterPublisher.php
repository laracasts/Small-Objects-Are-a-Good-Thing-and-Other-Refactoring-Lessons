<?php namespace Laracasts\Social;

use GuzzleHttp\Client;

class TwitterPublisher implements Publisher {

    /**
     * The endpoint URL for creating a new tweet with the Twitter API.
     *
     * @var string
     */
    private $makeTweetUrl = 'https://api.twitter.com/1.1/statuses/update.json';

    /**
     * The HTTP client.
     *
     * @var Client
     */
    private $guzzle;

    /**
     * Create a new TwitterPublisher instance.
     *
     * @param Client $guzzle
     */
    public function __construct(Client $guzzle)
    {
        $this->guzzle = $guzzle;
    }

    /**
     * Publish a new status.
     *
     * @param $status
     */
    public function publish($status)
    {
        return $this->guzzle->post($this->getMakeTweetUrl($status));
    }

    /**
     * Get the full URL endpoint for publishing a new tweet.
     *
     * @param $status
     * @return string
     */
    private function getMakeTweetUrl($status)
    {
        return $this->makeTweetUrl . '?' . http_build_query(compact('status'));
    }

} 