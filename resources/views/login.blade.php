@extends('layouts.auth')

@section('main-content')
    <div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">

        </div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="index.html">Neptune</a>
            </div>
            <p class="auth-description">Please sign-in to your account and continue to the dashboard.<br>Don't have an account? <a href="sign-up.html">Sign Up</a></p>
            <!-- Jika ada session pesan_gagal -->
            @if(session()->get('pesan_gagal') !== null)
            <div class="alert alert-danger" role="alert">
                {{ session()->get('pesan_gagal') }}
            </div>
            @endif
            
            <form method="post" action="auth/login">
                @csrf
                <div class="auth-credentials m-b-xxl">
                    <label for="signInEmail" class="form-label">Email address</label>
                    <input name="email" type="email" class="form-control m-b-md" id="signInEmail" aria-describedby="signInEmail" placeholder="example@neptune.com">

                    <label for="signInPassword" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="signInPassword" aria-describedby="signInPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                </div>

                <div class="auth-submit">
                    <button type="submit" class="btn btn-primary">Sign In</button>
                </div>
            </form>
            <div class="divider"></div>
        </div>
    </div>
@endsection
