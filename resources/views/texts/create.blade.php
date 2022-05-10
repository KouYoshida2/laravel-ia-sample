<a href="index">top</a>
クリエイトページです。


@if($errors->any())
@foreach($errors->all() as $error)
<div>{{$error}}</div>
@endforeach

@endif

<form method="post" action="{{route('text.store')}}">
  @csrf
  <input type="text" name="title" value="{{old('title')}}">
  <input type="text" name="content" value="{{old('content')}}">
  <button>作成</button>
</form>