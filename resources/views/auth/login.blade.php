@extends('layouts.layout')

@section('content')

<div class="loginBackground">
    <h1 class="loginH1">ログイン</h1>

    <div class="loginFormCard">
        <form method="POST" action="{{ route('login') }}">
            @csrf

        <!-- mail -->
        <div class="formItem">
            <input id="email" placeholder=" メールアドレス" class="" type="email" name="email" :value="old('email')" required />
        </div>

        <!-- password -->
        <div class="formItem">
            <input id="password" placeholder=" パスワード" class="" type="password" name="password" :value="old('password')" required autocomplete="new-password" />
        </div>

        </form>
    </div>
    <p class="registerMessage">アカウントをお持ちでない方はこちら</p>
    <div class="registerTransition">
        <a href="register">会員登録</a>
    </div>

</div>




@endsection
