<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\GithubService;
use GrahamCampbell\GitHub\Facades\GitHub;

class GithubServiceTest extends TestCase
{
    public function setup():void
    {
        parent::setup();
        Github::shouldReceive('me->starred')
        ->andReturn(['starred-repos'=>[]]);
    }

    /**
    * Initialise github service with token
    *
    * @test
    */
    public function it_can_set_github_token()
    {
        $token  = 'dummyToken';
        GithubService::invoke($token);
        $this->assertNotNull(app()->config['github.connections.main.token']);
    }

    /**
    * test details
    *
    * @test
    */
    public function it_can_fetch_starred_repos()
    {
        $token         = 'testToken';
        $githubService = GithubService::invoke($token);
        $this->assertArrayHasKey('starred-repos', $githubService->fetchStarredRepos());
    }

    /**
    * api return starred repos
    *
    * @test
    */
    public function api_can_return_paginated_starred_repositories()
    {
        $token         = 'testToken';
        $githubService = GithubService::invoke($token);

        $res = $this->postJson(route('starred.repos'))->json();
        $this->assertIsArray($res);
    }
}
