@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm__content">
  <div class="confirm__heading">
    <h2>confirm</h2>
  </div>
  <form class="form" action="/thanks" method="post">
    @csrf
    <div class="confirm-table">
      <table class="confirm-table__inner">

        <tr class="confirm-table__row">
          <th class="confirm-table__header">お名前</th>
          <td class="confirm-table__text">
            <input type="text" name="last_name" value="{{ $contact['last_name'] }}" readonly />
            <input type="text" name="first_name" value="{{ $contact['first_name'] }}" readonly />
          </td>
        </tr>

        <tr class="confirm-table__row">
          <th class="confirm-table__header">性別</th>
          <td class="confirm-table__text">
            @if($contact['gender'] == "1")
              <p>男性</p>
            @elseif($contact['gender'] == "2")
              <p>女性</p>
            @elseif($contact['gender'] == "3")
              <p>その他</p>
            @endif
            <input type="hidden" name="gender" value="{{ $contact['gender'] }}" readonly />
          </td>
        </tr>
        
        <tr class="confirm-table__row">
          <th class="confirm-table__header">メールアドレス</th>
          <td class="confirm-table__text">
            <input type="email" name="email" value="{{ $contact['email'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">電話番号</th>
          <td class="confirm-table__text">
            <input type="tel" name="tell" value="{{ $tell }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">住所</th>
          <td class="confirm-table__text">
            <input type="text" name="address" value="{{ $contact['address'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">建物名</th>
          <td class="confirm-table__text">
            <input type="text" name="building" value="{{ $contact['building'] }}" readonly />
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お問い合わせ種類
          </th>
          <td class="confirm-table__text">
            @foreach($categories as $category)
              @if($category->id == $contact['category_id'])
                {{$category['content']}}
                <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
              @endif
            @endforeach
          </td>
        </tr>
        <tr class="confirm-table__row">
          <th class="confirm-table__header">お問い合わせ内容</th>
          <td class="confirm-table__text">
            <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly />
          </td>
        </tr>
      </table>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">送信</button>
    </div>
    <div class="form__button">
      <button class="form__button-edit" type="submit" name="edit" value="edit">修正</button>
      <input type="hidden" name="tell1" value="{{ $tell_backup[0] }}">
      <input type="hidden" name="tell2" value="{{ $tell_backup[1] }}">
      <input type="hidden" name="tell3" value="{{ $tell_backup[2] }}">
    </div>
  </form>
</div>
@endsection