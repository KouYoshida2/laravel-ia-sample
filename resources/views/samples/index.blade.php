indexです。
<br>

@if(session('flash_message'))
<div>{{session('flash_message')}}</div>
@endif



@foreach($samples as $sample)
{{$sample->name}}
{{$sample->email}}<br>
@endforeach


<a href="./create">新規作成</a>