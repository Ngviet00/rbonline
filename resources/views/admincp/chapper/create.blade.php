@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Thêm chương mới</div>
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

                    <form method="POST" action="{{ route('book.chappers.store',[$idBook]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name_chapper">Tên chương</label>
                            <input type="text" name="name_chapper" value="{{old('name_chapper')}}" onkeyup="ChangeToSlug()" class="form-control" id="slug">
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" value="{{old('slug')}}" class="form-control" id="convert_slug">
                        </div>
                        <div class="form-group">
                            <label for="content">Nội dung</label>
                            <textarea class="form-control" style="resize:none;" rows="5" placeholder="Nội dung"  name="contents" id="contents" value="{{old('contents')}}"></textarea>
                            <script>CKEDITOR.replace('contents');</script>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script type="text/javascript" src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js" >
</script>
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
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        document.getElementById('convert_slug').value = slug;
    }
</script>
