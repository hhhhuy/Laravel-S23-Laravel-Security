@extends('layouts.home')
@section('content')
    <h3 class="text-center">Sửa thông tin sách</h3>
    <form action="{{route('books.update', $book->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$book->id}}">
        <div class="form-group">
            <label>Tên Sách</label>
            <input type="text" name="name" class="form-control" value="{{$book->name}}">
            @if($errors->has('name'))
                <p style="color: red">*{{$errors->first('name')}}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Mô Tả</label>
            <textarea rows="3" name="description" class="form-control">{{$book->description}}</textarea>
            @if($errors->has('description'))
                <p style="color: red">*{{$errors->first('description')}}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Tác Giả</label>
            <input type="text" name="author" class="form-control" value="{{$book->author}}">
            @if($errors->has('author'))
                <p style="color: red">*{{$errors->first('author')}}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Ảnh bìa</label>
            <input type="file" name="image" class="form-control" value="{{$book->image}}">
            @if($errors->has('image'))
                <p style="color: red">*{{$errors->first('image')}}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Số Lượng</label>
            <input type="text" name="quantity" class="form-control" value="{{$book->quantity}}">
            @if($errors->has('quantity'))
                <p style="color: red">*{{$errors->first('quantity')}}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Ngày Xuất Bản</label>
            <input type="date" name="publication_date" class="form-control" value="{{$book->publication_date}}">
            @if($errors->has('publication_date'))
                <p style="color: red">*{{$errors->first('publication_date')}}</p>
            @endif
        </div>
        <button type="submit" class="btn btn-info">Sửa</button>
    </form>
@endsection