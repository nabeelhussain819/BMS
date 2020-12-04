@extends('layout.default')

{{-- Content --}}
@section('content')
<div class="container">
    <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($authors as $item)

            <tr>
            <th scope="row">{{$item['id']}}</th>
            <td>{{$item['name']}}</td>
              </tr>
    
            @endforeach

        </tbody>
      </table>
   
</div>
@endsection