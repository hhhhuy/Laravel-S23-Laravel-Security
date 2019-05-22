@extends('layouts.home')
@section('content')
    <h3 class="text-center">Thêm Mới Sách</h3>
    <form action="{{route('books.create')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Tên Sách</label>
            <input type="text" name="name" class="form-control">
            @if($errors->has('name'))
                <p style="color: red">*{{$errors->first('name')}}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Mô Tả</label>
            <textarea rows="3" name="description" class="form-control"></textarea>
            @if($errors->has('description'))
                <p style="color: red">*{{$errors->first('description')}}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Tác Giả</label>
            <input type="text" name="author" class="form-control">
            @if($errors->has('author'))
                <p style="color: red">*{{$errors->first('author')}}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Ảnh bìa</label>
            <input type="file" name="image" class="form-control">
            @if($errors->has('image'))
                <p style="color: red">*{{$errors->first('image')}}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Số Lượng</label>
            <input type="number" name="quantity" class="form-control">
            @if($errors->has('quantity'))
                <p style="color: red">*{{$errors->first('quantity')}}</p>
            @endif
        </div>
        <div class="form-group">
            <label>Ngày Xuất Bản</label>
            <input type="date" name="publication_date" class="form-control">
            @if($errors->has('publication_date'))
                <p style="color: red">*{{$errors->first('publication_date')}}</p>
            @endif
        </div>
        <button type="submit" class="btn btn-info">Thêm</button>
    </form>
@endsection