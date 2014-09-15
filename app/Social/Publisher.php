<?php namespace Laracasts\Social;

interface Publisher {

    /**
     * Publish a new status.
     *
     * @param $status
     */
    public function publish($status);

}