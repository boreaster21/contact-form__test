@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('logout')
<div class="logout">
  <a class="logout-button" href="/login">login</a>
</div>
@endsection

@section('content')
<div class="contact-form__content">
  <div class="contact-form__heading">
    <h2>Register</h2>
  </div>

  <form class="form" action="{{ url()->current() }}" method="post">
    @csrf
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お名前</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
            <input type="text" name="name" placeholder="例：山田　太郎" value="{{ old('name') }}" required autofocus/>
        </div>
        <div class="form__error">
          @error('name')
            {{ $message }}
          @enderror 
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">メールアドレス</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="email" name="email" placeholder="test@example.com" value="{{ old('email') }}" required/>
        </div>
        <div class="form__error">
          @error('email')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">パスワード</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="password" placeholder="coachtechno6" value="{{ old('password') }}" required/>
        </div>
        <div class="form__error">
        @error('password')
          {{ $message }}
        @enderror
        </div>
      </div>
    </div>

    <div class="form__button">
      <button class="form__button-submit" type="submit">新規登録</button>
    </div>
  </form>
</div>
@endsection