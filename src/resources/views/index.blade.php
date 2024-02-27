@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="contact-form__content">
  <div class="contact-form__heading">
    <h2>Contact</h2>
  </div>

  <form class="form" action="/confirm" method="post">
    @csrf
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お名前</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
            <input type="text" name="last_name" placeholder="例：山田" value="{{ old('last_name') }}" />
        </div>
        <div class="form__error">
          @error('last_name')
            {{ $message }}
          @enderror
          <div class="form__input--text">
            <input type="text" name="first_name" placeholder="例：太郎" value="{{ old('first_name') }}" />
          </div>  
        </div>
        <div class="form__error">
          @error('first_name')
            {{ $message }}
          @enderror
        </div>
      </div>
    </div>

    <!-- 性別 -->
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">性別</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--radio">
          <input type="radio" name="gender" value=1 checked> 男性
          <input type="radio" name="gender" value=2 > 女性
          <input type="radio" name="gender" value=3 > その他
        </div>
        <div class="form__error">
          @error('gender')
            {{ $message }}
          @enderror
        </div>
      </div>
    </div>


    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">メールアドレス</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="email" name="email" placeholder="test@example.com" value="{{ old('email') }}" />
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
        <span class="form__label--item">電話番号</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="tel" name="tell1" placeholder="080" value="{{ old('tell1') }}" />
          <input type="tel" name="tell2" placeholder="1234" value="{{ old('tell2') }}" />
          <input type="tel" name="tell3" placeholder="5678" value="{{ old('tell3') }}" />
        </div>
        <div class="form__error">
        @if ($errors->has('tell1'))
          {{ $errors->first('tell1') }}
        @elseif ($errors->has('tell2'))
          {{ $errors->first('tell3') }}
        @elseif ($errors->has('tell3'))
          {{ $errors->first('tell3') }}
        @endif
        </div>
      </div>
    </div>

    <!-- 住所 -->
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">住所</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="address" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
        </div>
        <div class="form__error">
          @error('address')
            {{ $message }}
          @enderror
        </div>
      </div>
    </div>

    <!-- 建物名 -->
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">建物名</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="text" name="building" placeholder="例：千駄ヶ谷マンション101" value="{{ old('building') }}" />
        </div>
      </div>
    </div>

    <!-- お問い合わせ種類 -->
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お問い合わせ種類</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--item">
          <select class="form__input__item-select" name="category_id">
            <option value="" hidden>選択してください</option>
            @foreach($categories as $category)
                <option value="{{ $category['id'] }}" @if(old('category_id') == $category['id']) selected @endif>{{$category['content']}}</option>
            @endforeach
        </select>
        </div>
        <div class="form__error">
          @error('category_id')
            {{ $message }}
          @enderror
        </div>
      </div>
    </div>

    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">お問い合わせ内容</span>
        <span class="form__label--required">※</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--textarea">
          <textarea name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
        </div>
        <div class="form__error">
          @error('detail')
            {{ $message }}
          @enderror
        </div>
      </div>
    </div>


    <div class="form__button">
      <button class="form__button-submit" type="submit">確認画面</button>
    </div>
  </form>
</div>
@endsection