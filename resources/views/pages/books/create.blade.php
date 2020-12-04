@extends('layout.default')

{{-- Content --}}
@section('content')
<div class="card card-custom gutter-b example example-compact">
    <div class="card-header">
        <h3 class="card-title"> Add New Book </h3>
        <div class="card-toolbar">
        </div>
    </div>
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
    </div>
    @endif
    <!--begin::Form-->
<form class="form" enctype="multipart/form-data" action="{{route('books.store')}}" method="POST">
        @csrf  
        <div class="container">
 
        <div class="row">
            <div class="col-md-6">

            <div class="form-group">
                <label>Title :</label>
                <input type="text" name="title" class="form-control form-control-solid" placeholder="Enter Book Title" required>
            </div>
            <br>  
             <div class="form-group">
                <label>Description</label>
                <div class="input-group input-group-solid">
                        <textarea name="desc" class="form-control" cols="30" rows="10" placeholder="Enter Description" required></textarea>
                </div>
            </div>
            <br>
            <div class="form-group">
            <label>Price</label>
            <div class="input-group input-group-solid">
                <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                </div>
                <input type="text" name="price" class="form-control form-control-solid" placeholder="Enter Price" required>
            </div>
            </div>
            <div class="form-group">
                <label>Year: </label>
                <input type="text" name="year" class="form-control form-control-solid" placeholder="Enter Year" required>
            </div>
            <br>
            <div class="form-group">
                <label>ISBN: </label>
                <input type="text" name="ISBN" class="form-control form-control-solid" placeholder="Enter Book ISBN" required>
            </div>
            <br>
            <div class="form-group">
                <label>Book Cover</label>
                <input type="file" name="file" class="form-control form-control-solid" onchange="previewFile(this)" required>
            </div>
            <img  alt="preview img" id="previewImg" style="max-width:230px; margin-top:20px;">
        </div>
        <div class="col-md-6">
                <div class="form-group">
                    <label for="sel1">Select Author:</label>
                    <select class="form-control" name="author_name"  id="ddselect" onchange="changeAuthor();" required>
                        @foreach ($authors as $item)
                             <option value="{{$item['id']}}">{{$item['name']}}</option>
                             @endforeach         
                             <option value="undefined">Other</option>

                            </select>
                </div>
                <br>
                <div class="form-group"  id="author_name">
                    <label>Enter Author Name</label>
                    <input type="text" placeholder="Enter Author Name" name="author_name1"  class="form-control" />
                </div>
                <br>
            <div class="form-group">
                <label>Select Category</label>
                <select class="form-control" name="category"  id="ddselect1" onchange="changeCategory();" required>
                         @foreach ($categories as $item)
                         <option value="{{$item['id']}}">{{$item['name']}}</option>
                         @endforeach         
                         <option value="undefined">Other</option>
                        </select>
            </div>
            <br>
            <div class="form-group"  id="category_name">
                <label>Enter Category</label>
                <input type="text" placeholder="Enter Category Name" name="category_name"  class="form-control" />
            </div>
            <br>
            <div class="form-group">
                <label >Select Genre</label>
                <select class="form-control" name="genre"  id="ddselect2" onchange="changeGenre();" required>
                    @foreach ($genres as $item)
                         <option value="{{$item['id']}}">{{$item['name']}}</option>
                         @endforeach         
                         <option value="undefined">Other</option>

                </select>
                    
            </div>
            <br>
            <div class="form-group"  id="genre_name">
                <label>Enter Genre</label>
                <input type="text" placeholder="Enter Genre Name" name="genre_name"  class="form-control" />
            </div>
            <br>
             <div class="form-group">
            <label >Select Language</label>
            <select class="form-control" name="language"  id="ddselect3" onchange="changeLanguage();" required>
                @foreach ($language as $item)
                     <option value="{{$item['id']}}">{{$item['name']}}</option>
                     @endforeach         
                     <option value="undefined">Other</option>

                    </select>
                </div>
                <br>
                <div class="form-group"  id="language_name">
                    <label>Enter Language </label>
                    <input type="text" placeholder="Enter Language Name" name="language_name"  class="form-control" />
                </div>
                <br>
                <div class="form-group">
                    <label>Available</label>
                    <select name="active" class="form-control">
                        <option value=0>
                            Yes
                        </option>
                        <option value=1>
                            No
                        </option>
                    </select>
                </div>

         
       
            <br>
            {{-- <input type="hidden" name="created_by" value="{{Auth::user()->id}}">
            <input type="hidden" name="updated_by" value="{{Auth::user()->id}}"> --}}
        </div>
    </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
        </div>
    </form>
    <!--end::Form-->
</div>
</div>

@endsection

@section('scripts')
    <script>
    function previewFile(input)
    {
        var file = $('input[type=file]').get(0).files[0];

        if(file)
        {
            var reader = new FileReader();
            reader.onload = function()
            {
                $('#previewImg').attr('src',reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
        

    function changeAuthor()
    {
       
        var d = document.getElementById('ddselect');
        var selectedValue = d.options[d.selectedIndex].value;

        if(selectedValue == "undefined")
        {
            $('#author_name').show();
        }
        else{
            $('#author_name').hide();
        }
    }
    //ui bug
  
   
    


    function changeCategory()
    {
        var d = document.getElementById('ddselect1');
        var selectedValue = d.options[d.selectedIndex].value;

        if(selectedValue == "undefined")
        {
            $('#category_name').show();
        }
        else{
          
            $('#category_name').hide();
        }
    }
    function changeGenre()
    {
        var d = document.getElementById('ddselect2');
        var selectedValue = d.options[d.selectedIndex].value;

        if(selectedValue == "undefined")
        {
          
            $('#genre_name').show();

        }
        else{
            $('#genre_name').hide();
        }
    }
    function changeLanguage()
    {
        var d = document.getElementById('ddselect3');
        var selectedValue = d.options[d.selectedIndex].value;

        if(selectedValue == "undefined")
        {
            $('#language_name').show();
        }
        else{
            $('#language_name').hide();
        }
    }
    </script>
    <script src="{{ asset('js/pages/widgets.js') }}" type="text/javascript"></script>
@endsection