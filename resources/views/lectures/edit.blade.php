<x-app-layout>
  <x-slot name="header"></x-slot>
  レクチャーを選択<br>
  <form method="post" action="{{route('lectures.store')}}">
    @csrf
    @foreach($alllectures as $lecture)
    <label>{{$lecture->name}}</label>
    <input value="{{$lecture->id}}" @if(in_array($lecture->name,$lecturearray)) checked @endif type="checkbox" name="lecture[]">
    @endforeach
    <br>
    <x-button>
      更新
    </x-button>

  </form>
</x-app-layout>