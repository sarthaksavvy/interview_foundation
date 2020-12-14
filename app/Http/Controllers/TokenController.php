<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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
    public function __invoke(Request $request)
    {
        $request->validate(['token'=>'required|alpha_num']);

        auth()->user()->update(['token'=>$request->token]);

        return response($request->token, Response::HTTP_CREATED);
    }

    public function destroy()
    {
        auth()->user()->update(['token' => null]);
        return response('deleted', Response::HTTP_NO_CONTENT);
    }
}
