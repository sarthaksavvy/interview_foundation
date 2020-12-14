<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GithubService;

class TokenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Handle the incoming request.
     *
     * @return Array
     */
    public function __invoke()
    {
        $token         = auth()->user()->token;
        $githubService = GithubService::invoke($token);
        return $githubService->fetchStarredRepos();
    }
}
