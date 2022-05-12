<h1>取得したユーザーに紐ずくテキスト一覧</h1>
@foreach($userTexts as $text)
<div>ユーザーID:{{$text->user_id}}:{{$text->email}}</div>

@endforeach


<h1>一覧ページ</h1>

@if(session('flash_message'))
<div>{{session('flash_message')}}</div>
@endif



@foreach($visibles as $visible)

<div><a href="{{route('texts.show',['id'=>$visible->id])}}">{{$visible->id}}</a>:{{$visible->title}}:{{$visible->price}}</div><br>

@endforeach


<h2>非表示の投稿</h2><br>
@foreach($allpost as $post)
@if($post->is_visible==0)
<div><a href="{{route('texts.show',['id'=>$post->id])}}">{{$post->id}}</a>:{{$post->title}}:{{$post->price}}</div><br>
@endif
@endforeach


<a href="{{route('texts.create')}}">新規作成</a>