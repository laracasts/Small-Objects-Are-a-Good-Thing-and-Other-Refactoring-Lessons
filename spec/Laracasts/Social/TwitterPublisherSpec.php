<?php namespace spec\Laracasts\Social;

use GuzzleHttp\Client;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TwitterPublisherSpec extends ObjectBehavior {

    function let(Client $client)
    {
        $this->beConstructedWith($client);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Laracasts\Social\TwitterPublisher');
    }

    function it_publishes_a_status(Client $client)
    {
        $status = 'Test Status';

        $client->post('https://api.twitter.com/1.1/statuses/update.json?' . http_build_query(compact('status')))->shouldBeCalled();

        $this->publish($status);
    }
}
