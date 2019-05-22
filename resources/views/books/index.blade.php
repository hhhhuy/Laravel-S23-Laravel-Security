@extends('layouts.home')
@section('content')
    @if(count($books)==0)
        <h3 class="text-danger text-center">Không Có Dữ Liệu</h3>
    @else
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Quản Lý Thư Viện</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('books.index')}}">Trang Chủ <span
                                    class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('books.create')}}">Thêm Mới<span
                                    class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('home')}}">Đăng Nhập<span
                                    class="sr-only">(current)</span></a>
                    </li>

                </ul>
{{--                action="{{route('books.search')}}"--}}
                <form class="form-inline my-2 my-lg-0" >
                    @csrf
                    <input class="form-control mr-sm-2" name="keyword" type="search"
                           value="{{(isset($_GET['keyword'])) ? $_GET['keyword']: ''}}"
                           placeholder="Nhập tên sách cần tìm" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm</button>
                </form>
            </div>
        </nav>
        <div class="col-12">
            @if (Session::has('success'))
                <p class="text-success">
                    <i class="fa fa-check" aria-hidden="true"></i>
                    {{ Session::get('success') }}
                </p>
            @endif
            @if(Session::has('fail'))
                <p class="text-danger">
                    <i class="fa fa-check" aria-hidden="true"></i>
                    {{ Session::get('fail') }}
                </p>
            @endif
        </div>
        <h3 class="text-center mt-5">Danh Sách</h3>
        <table class="table text-center mt-3 table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên Sách</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Tác Giả</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Số Lượng</th>
                <th scope="col">Ngày Xuất Bản</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $key =>$book)
                <tr>
                    <th scope="row">{{++$key}}</th>
                    <td>{{$book->name}}</td>
                    <td>{{$book->description}}</td>
                    <td>{{$book->author}}</td>
                    <td><img src="{{ asset('storage/' . $book->image) }}"
                             alt="img"
                             style="width: 150px"></td>
                    <td>{{$book->quantity}}</td>
                    <td>{{$book->publication_date}}</td>
                    <td><a href="{{route('books.show',$book->id)}} " class="btn btn-outline-success">Xem</a></td>
                    <td><a href="{{route('books.edit',$book->id)}} " class="btn btn-outline-warning">Sửa</a></td>
                    <td><a href="{{route('books.delete',$book->id)}} "
                           onclick="return confirm('Bạn chắc chắn muốn xóa sách {{$book->name}} ?')"
                           class="btn btn-outline-danger">Xóa</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
    <div>
        <a href="{{route('books.create')}} " class="btn btn-info">Thêm Mới</a>
    </div>
@endsection