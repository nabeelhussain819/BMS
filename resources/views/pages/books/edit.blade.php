@extends('layout.default')

{{-- Content --}}
@section('content')
<div class="card card-custom gutter-b example example-compact">
    <div class="card-header">
        <h3 class="card-title"> Add New Book </h3>
        <div class="card-toolbar">
        </div>
    </div>
    <!--begin::Form-->
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
    </div>
    @endif
<form class="form" enctype="multipart/form-data" method="POST" action="{{route('books.update')}}">
        @csrf 
<input type="hidden" value="{{$books->id}}" name="id">  
    <div class="card-body">
            <div class="form-group">
                <label>Author:</label>
                <div class="form-group">
                    <label for="sel1">Select Author:</label>
                <select class="form-control" name="author_name" id="sel1" value="{{$books->author_name}}">
                    @foreach ($authors as $item)
                    <option value="{{$item['id']}}">{{$item['name']}}</option>
                    @endforeach     
                    </select>
                  </div>
           </div>
            <div class="form-group">
                <label>Title :</label>
            <input type="text" name="title" value="{{$books->title}}" class="form-control form-control-solid" placeholder="Enter Book Title">
            </div>
            <div class="form-group">
                <label>Price</label>
                <div class="input-group input-group-solid">
                    <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                    </div>
                <input type="text" name="price" value="{{$books->price}}" class="form-control form-control-solid" placeholder="Enter Price">
                </div>
            </div>
            <div class="form-group">
                <label>Year: </label>
            <input type="text" name="year" value="{{$books->year}}" class="form-control form-control-solid" placeholder="Enter Year">
            </div>
            <div class="form-group">
                <label>ISBN: </label>
            <input type="text" name="ISBN" value="{{$books->ISBN}}" class="form-control form-control-solid" placeholder="Enter Book ISBN">
            </div>
            
            <div class="form-group">
                <label>Book Cover</label>
                <input type="file" name="file" class="form-control form-control-solid" onchange="previewFile(this)">
            </div>
            <img  alt="preview img" id="previewImg" src="{{asset('images')}}/{{$media->extension}}" style="max-width:230px; margin-top:20px;">

     
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <a href="/books" class="btn btn-secondary">Go Back</a>
        </div>
    </form>
    <!--end::Form-->
</div>

@endsection