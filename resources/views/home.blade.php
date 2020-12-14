@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <base-component :user="{{ Auth::check() ? Auth::user() : '' }}"/>
        </div>
    </div>
</div>
@endsection
