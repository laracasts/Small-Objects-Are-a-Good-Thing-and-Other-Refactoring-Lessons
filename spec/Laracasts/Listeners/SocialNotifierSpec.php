<?php namespace spec\Laracasts\Listeners;

use Laracasts\Social\Publisher;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SocialNotifierSpec extends ObjectBehavior {

    function let(Publisher $publisher)
    {
        $this->beConstructedWith($publisher);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Laracasts\Listeners\SocialNotifier');
    }

    function it_publishes_a_status_when_a_post_is_created(Publisher $publisher)
    {
        $status = 'Test Status';

        $publisher->publish($status)->shouldBeCalled();

        $this->whenPostWasPublished($status);
    }
}
