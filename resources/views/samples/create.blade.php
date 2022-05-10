createページです。


@if($errors->any())
<div>

  <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>

@endif

<form method="post" action="{{route('samples.store')}}">
  @csrf
  <label for="name">名前</label>
  <input type="text" name="name" value="{{old('name')}}"><br>
  <label for="email">メールアドレス</label>
  <input type="text" name="email" value="{{old('email')}}"><br>
  <button>送信</button>
</form>