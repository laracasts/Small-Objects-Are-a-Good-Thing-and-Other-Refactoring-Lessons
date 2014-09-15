<?php namespace Laracasts\Listeners;

use Laracasts\Social\Publisher;

class SocialNotifier {

    /**
     * The social publisher.
     *
     * @var Publisher
     */
    private $social;

    /**
     * Create a new SocialNotifier instance.
     *
     * @param Publisher $social
     */
    public function __construct(Publisher $social)
    {
        $this->social = $social;
    }

    /**
     * Update social media when a new post is published.
     */
    public function whenPostWasPublished($status)
    {
        $this->social->publish($status);
    }

} 