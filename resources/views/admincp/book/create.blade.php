@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Thêm sách</div>
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

                    <form method="POST" action="{{route('book.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên sách</label>
                            <input type="text" name="name" value="{{old('name')}}" onkeyup="ChangeToSlug()" class="form-control" id="slug">
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" value="{{old('slug')}}" class="form-control" id="convert_slug">
                        </div>

                        <div class="form-group">
                            <label for="author">Tác giả</label>
                            <input type="text" name="author" value="{{old('author')}}" class="form-control" id="author">
                        </div>

                        <div class="form-group">
                            <label>Danh mục</label>
                            @if($count_categories == 0)
                                <p>Không có danh mục nào, <a href="{{ route('category.create') }}">Thêm danh mục</a></p>
                            @else
                                <select name="category_id" class="custom-select">
                                    @foreach($list_categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="description">Tóm tắt</label>
                            <textarea class="form-control" style="resize:none;" rows="5" name="description" id="description" value="{{old('description')}}"></textarea>
                            <script>CKEDITOR.replace('description')</script>
                        </div>

                        <div class="form-group">
                            <label>Hiển thị</label>
                            <select name="active" class="custom-select">
                                <option value="1">Hiển thị</option>
                                <option value="0">Không hiển thị</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Nổi bật</label>
                            <select name="outstanding" class="custom-select">
                                <option value="1">Nổi bật</option>
                                <option value="0">Không nổi bật</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="file" name="image" id="image">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Thêm</button>
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
        slug = document.getElementById("slug").value;
        slug = slug.toLowerCase();
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        slug = slug.replace(/ /gi, "-");
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

