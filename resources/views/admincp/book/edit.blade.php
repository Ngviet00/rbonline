@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Cập nhật truyện</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{route('book.update',$book->id)}}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="name">Tên sách</label>
                                <input type="text" name="name" value="{{ $book->name }}" onkeyup="ChangeToSlug()" class="form-control" id="slug">
                            </div>

                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" value="{{ $book->slug }}" class="form-control" id="convert_slug">
                            </div>
                            <div class="form-group">
                                <label for="description">Tóm tắt</label>
                                <textarea class="form-control" style="resize:none;" rows="5" name="description" id="description">{{ $book->description }}</textarea>
                                <script>CKEDITOR.replace('description')</script>
                            </div>

                            <div class="form-group">
                                <label for="author">Tác giả</label>
                                <input type="text" name="author" value="{{ $book->author }}" class="form-control" id="author">
                            </div>

                            <div class="form-group">
                                <label>Danh mục</label>
                                @if($count_categories == 0)
                                    <p>Không có danh mục nào, <a href="{{ route('category.create') }}">Thêm danh mục</a></p>
                                @else
                                    <select name="category_id" class="custom-select">
                                        @foreach($list_categories as $category)
                                            <option value="{{$category->id}}" {{ $category->id == $book->category_id ? 'selected' : ''}} >
                                                    {{$category->name}}
                                            </option>
                                        @endforeach 
                                    </select>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Hiển thị</label>
                                <select name="active" class="custom-select">
                                    @if($book->active == 1)
                                        <option value="1">Hiển thị</option>
                                        <option value="0">Không hiển thị</option>
                                    @else
                                        <option value="0">Không hiển thị</option>
                                        <option value="1">Hiển thị</option>
                                    @endif
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Nổi bật</label>
                                    <select name="outstanding" class="custom-select">
                                        @if($book->outstanding == 1)
                                            <option value="1">Nổi bật</option>
                                            <option value="0">Không nổi bật</option>
                                        @else
                                            <option value="0">Không nổi bật</option>
                                            <option value="1">Nổi bật</option>
                                        @endif
                                    </select>
                            </div>

                            <div class="form-group">
                                <label>Hình ảnh</label><br/>
                                <input type="file" name="image" id="image"><br/>
                                <img src="{{asset('uploads/books/'.$book->image)}}"
                                     width="150px"
                                     height="150px"
                                     alt="hinh anh"/>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script type="text/javascript" src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js" ></script>
<script>
    function ChangeToSlug()
    {
        var slug;
        //Lấy text từ thẻ input title
        slug = document.getElementById("slug").value;
        slug = slug.toLowerCase();
        //Đổi ký tự có dấu thành không dấu
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
        document.getElementById('convert_slug').value = slug;
    }
</script>
