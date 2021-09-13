@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cập nhật danh mục</div>
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

                    <form method="post" action="{{route('category.update',$category->id)}}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên danh mục</label>
                            <input type="text" name="name" value="{{$category->name}}" onkeyup="ChangeToSlug()" class="form-control" id="slug">
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" value="{{$category->slug}}" class="form-control" id="convert_slug">
                        </div>
                        <div class="form-group">
                            <label for="title">Trạng thái</label>
                            <select name="active" class="custom-select">
                                @if($category->active == 1)
                                    <option value="1">Kích hoạt</option>
                                    <option value="0">Không kích hoạt</option>
                                @else
                                    <option value="0">Không kích hoạt</option>
                                    <option value="1">Kích hoạt</option>
                                @endif
                            </select>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Cập nhật danh mục</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
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