<?php namespace Laracasts\Http\Controllers;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Routing\Controller;
use Laracasts\Http\Requests\CreatePostRequest;

class PostsController extends Controller {

    /**
     * Store a new post.
     *
     * @param CreatePostRequest $request
     * @param Dispatcher $events
     * @return string
     */
    public function store(CreatePostRequest $request, Dispatcher $events)
    {
        // Do what you need to do to create a new post.

        // And then make an announcement that a post was published.
        // You can put this here, an application service, wherever.
        $events->fire('PostWasPublished', $request->title);

        return 'Done'; // redirect somewhere
    }

}
