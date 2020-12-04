@extends('layout.default')

{{-- Content --}}
@section('content')
<div class="container">

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Book Details
            </div>

            <div class="card-body">
            
                
                <br>
                <label>Title: </label>
                <p><strong>{{$books->title}}</strong></p>
                <br>
                <label>Author: </label>
                <p><strong>{{$books->author_name}}</strong></p>
                <br>
                <label>Price: </label>
                <p><strong>{{$books->price}}</strong></p>
                <br>
                <label>Year: </label>
                <p><strong>{{$books->year}}</strong></p>
                <br>
                <label>Created By: </label>
                <p><strong>{{$books->created_By}}</strong></p>
                <br>
                <label>Updated By: </label>
                <p><strong>{{$books->updated_By}}</strong></p>
                <br>
                <label>ISBN: </label>
                <p><strong>{{$books->ISBN}}</strong></p>
                <br>
                <label>Is Author Available: </label>                
                <p><strong>Yes</strong></p>
            </div>
        </div>
        <a href="/books" class="btn btn-primary">Go Back</a>
    </div>
    <br><br>
    <div class="col-md-6">
    <img src="{{asset('images')}}/{{$media->extension}}" alt="image" style="width: 400px; height:400px">
    </div>
</div>
</div>

@endsection