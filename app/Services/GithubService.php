<?php

namespace App\Services;

use GrahamCampbell\GitHub\Facades\GitHub;

class GithubService
{
    public static function invoke($token)
    {
        app()->config['github.connections.main.token']=$token;
        return new static();
    }

    public function fetchStarredRepos()
    {
        return GitHub::me()->starred();
    }
}
