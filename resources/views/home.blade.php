

@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title">
              Dashboard
        </div>
        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <h2>
              Hi ! {{ Auth::user()->name}}
            </h2>
        </div>
        <div class="links">
          @if (Route::has('login'))
              <div class="links">
                  @auth
                  @else
                      <a href="{{ route('login') }}">Login</a>
                      <a href="{{ route('register') }}">Register</a>
                  @endauth
              </div>
          @endif
        </div>
    </div>
</div>
@endsection
