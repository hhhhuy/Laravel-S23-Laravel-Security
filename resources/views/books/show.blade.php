@extends('home')
@section('content')
    <div class="text-center">
        <h3 class="text-dark mt-5">Thông Tin Sách</h3>
        <div class="col-sm-4 offset-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Tên sách: {{$book->name}}</h5>
                    <p class="card-text">Mô tả: {{$book->description}}</p>
                    <h6 class="card-text ">Tác Giả: {{$book->author}}</h6>
                    <p class="card-text">Ảnh bìa: <br> <img src="{{ asset('storage/' . $book->image) }}"
                                                            alt="img"
                                                            style="width: 300px"></p>
                    <p>Số Lượng: {{$book->quantity}}</p>
                    <p>Ngày Xuất Bản: {{$book->publication_date}}</p>
                </div>
            </div>
        </div>
        <a href="{{route('books.index')}}" class="btn btn-success mt-3">Quay Lại</a>
    </div>
@endsection
