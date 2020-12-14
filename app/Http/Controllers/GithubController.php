<?php

namespace App\Http\Controllers;

use App\Services\GithubService;
use Symfony\Component\HttpFoundation\Response;

class GithubController extends Controller
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
        try {
            return $githubService->fetchStarredRepos();
        } catch (\Exception $e) {
            return response()->json(['error'=>'Invalid Token'], Response::HTTP_BAD_REQUEST);
        }
    }
}
