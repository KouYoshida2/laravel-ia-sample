<x-app-layout>
  <x-slot name="header"></x-slot>
  {{$container_test}}

  <p>取得中のレクチャー</p>
  @if(count($nowlectures) < 1) 選択中のレクチャーはありません。 <br>
    @endif
    @foreach($nowlectures as $nowlecture)
    <div>{{$nowlecture->name}}</div>
    @endforeach

    <x-button><a href="{{route('lectures.edit')}}">レクチャーを更新する</a></x-button>


</x-app-layout>