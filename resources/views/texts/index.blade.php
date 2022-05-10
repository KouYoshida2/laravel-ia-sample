hellotext

@if(session('flash_message'))
<div>{{session('flash_message')}}</div>
@endif


@foreach($allpost as $post)
<div>{{$post->title}}:{{$post->content}}</div><br>
@endforeach


<a href="./create">新規作成</a>