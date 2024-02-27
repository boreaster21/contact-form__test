@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/modal.css') }}">
<script src="{{ asset('js/modal.js') }}"></script>
</head>
@endsection

@section('logout')
<form action="{{ route('logout') }}" method="post">
    @csrf 
    <button type="submit">logout</button>
</form>
@endsection

@section('content')
<div class="admin__content">
  <div class="admin__heading">
    <h2>Admin</h2>
  </div>
  <div class="search">
    <form class="search-form" action="/search" method="get">
      @csrf
      <input class="search-form__keyword" type="text" name="keyword" value="{{ old('keyword') }}">
      <select class="search-form__gender" name="gender" >
        <option value="" hidden>性別</option>
        <option value="1">男性</option>
        <option value="2">女性</option>
        <option value="3">その他</option>
      </select>
      <select class="search-form__category" name="category_id">
        <option value="" hidden>お問い合わせの種類</option>
        @foreach ($categories as $category)
          <option value="{{ $category['id'] }}" >{{$category['content']}}</option>
        @endforeach
      </select>
      <input class="search-form__date" name="date" type="date" />
      <button class="search-form__button-search">検索</button>
      <a class="search-form__button-reset" href="/admin">リセット</a>
    </form>
    
  </div>
    {{$contacts->appends(request()->query())->links('vendor.pagination.default')}}

  <table class="contact-list">
    <tr class="contact-list_row">
      <th class="contact-list_header">お名前</th>
      <th class="contact-list_header">性別</th>
      <th class="contact-list_header">メールアドレス</th>
      <th class="contact-list_header">お問い合わせの種類</th>
      <th class="contact-list_header"></th>
    </tr>
    
    <!-- お問い合わせ一覧 -->
    @foreach ($contacts as $contact)
      <tr class="contact-list_row">
        <td class="contact-list_item">
          {{ $contact->last_name }}　{{ $contact->first_name }}
        </td>
        <td class="contact-list_item">
          @if($contact->gender == "1")
              男性
            @elseif($contact->gender == "2")
              女性
            @elseif($contact->gender == "3")
              その他
            @endif
        </td>
        <td class="contact-list_item">
          {{ $contact->email }}
        </td>
        <td class="contact-list_item">
          @foreach($categories as $category)
            @if($category->id == $contact->category_id)
              {{$category['content']}}
            @endif
          @endforeach
        </td>
        <td class="contact-list_item">
          <div class="container">
            <button class="modal-toggle btn-example" data-modal="{{ $sum += 1 }}">詳細</button>
          </div>

          <!-- modal -->
          
          <div id="{{ $sum }}" class="modal">
            <div class="modal-content">
              <div class="modal-top">
                <span class="modal-close">×</span>
              </div>
              <div class="modal-container">
                <form class="form" action="/delete" method="post">
                  @method('DELETE')
                  @csrf
                  <div class="confirm-table">
                    <table class="confirm-table__inner">
                      <tr class="confirm-table__row">
                        <th class="confirm-table__header">お名前</th>
                        <td class="confirm-table__text">
                          {{ $contact['last_name'] }}　{{ $contact['first_name'] }}
                          <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" readonly />
                          <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" readonly />
                          <input type="hidden" name="id" value="{{ $contact['id'] }}" readonly />
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
                          {{ $contact['email'] }}
                          <input type="hidden" name="email" value="{{ $contact['email'] }}" readonly />
                        </td>
                      </tr>
                      <tr class="confirm-table__row">
                        <th class="confirm-table__header">電話番号</th>
                        <td class="confirm-table__text">
                          {{ $contact['tell'] }}
                          <input type="hidden" name="tell" value="{{ $contact['tell'] }}" readonly />
                        </td>
                      </tr>
                      <tr class="confirm-table__row">
                        <th class="confirm-table__header">住所</th>
                        <td class="confirm-table__text">
                          {{ $contact['address'] }}
                          <input type="hidden" name="address" value="{{ $contact['address'] }}" readonly />
                        </td>
                      </tr>
                      <tr class="confirm-table__row">
                        <th class="confirm-table__header">建物名</th>
                        <td class="confirm-table__text">
                          {{ $contact['building'] }}
                          <input type="hidden" name="building" value="{{ $contact['building'] }}" readonly />
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
                          {{ $contact['detail'] }}
                          <input type="hidden" name="detail" value="{{ $contact['detail'] }}" readonly />
                        </td>
                      </tr>
                    </table>
                  </div>
                  <div class="form__button">
                    <button class="form__button-submit" type="submit">削除</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- modal -->

        </td>
      </tr>
    @endforeach
  </table>
</div>
<script>
  const modalBtns = document.querySelectorAll(".modal-toggle");
  modalBtns.forEach(function (btn) {
    btn.onclick = function () {
      var modal = btn.getAttribute('data-modal');
      document.getElementById(modal).style.display = "block";
    };
  });
  const closeBtns = document.querySelectorAll(".modal-close");
  closeBtns.forEach(function (btn) {
      btn.onclick = function () {
        var modal = btn.closest('.modal');
        modal.style.display = "none";
      };
  });
  window.onclick = function (event) {
    if (event.target.className === "modal") {
      event.target.style.display = "block";
    }
  };
</script>
@endsection

