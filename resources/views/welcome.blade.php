@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <p>Welcome to the Sarthak Github Star Project</p>
                    @if(auth()->guest())
                    <p><a href="/login">Login</a> to Proceed</p>
                    @else
                    <p>Go to <a href="/home">Home</a></p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
