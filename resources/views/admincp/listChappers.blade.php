@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            Danh sách chương <b></b>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="post">
                            @CSRF
                            @method('DELETE')
                            <button formaction="{{ route('deleteManyChappers') }}" class="btn btn-primary"
                                    style="width: fit-content"
                                    disabled
                                    id="btnDeleteMany"
                                    type="submit"
                            >
                                Xóa
                            </button>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">
                                        <input type="checkbox" id="parent"/>
                                    </th>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên chương</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Truyện</th>
                                    <th scope="col" class="text-left">Quản lý</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($listChappers as $key => $chapper)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="chappers[]" class="child" value="{{ $chapper->id }}">
                                        </td>
                                        <th scope="row">{{ $chapper->id }}</th>
                                        <td>{{ $chapper->name_chapper }}</td>
                                        <td>{{ $chapper->slug }}</td>
                                        <td>{{ $chapper->book->name }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('book.chappers.edit',[$chapper->book->id,$chapper->id]) }}" class="btn btn-primary mr-1">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                            <button
                                                formaction="{{ route('book.chappers.destroy',[$chapper->book->id,$chapper->id]) }}"
                                                class="btn btn-danger"
                                                onclick="return confirm('Bạn có muốn xóa chương này không?')">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $listChappers->links() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    ul.pagination {
        display: flex;
        justify-content: center;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        $("#parent").click(function() {
            $(".child").prop("checked", this.checked);

            if(this.checked){
                $("#btnDeleteMany").removeAttr('disabled');
            }else{
                $("#btnDeleteMany").attr('disabled', true);
            }
        });

        $('.child').click(function() {
            if ($('.child:checked').length == $('.child').length) {
                $('#parent').prop('checked', true);
            } else {
                $('#parent').prop('checked', false);
            }
            if ($('.child:checked').length >=1){
                $("#btnDeleteMany").removeAttr('disabled');
            }else{
                $("#btnDeleteMany").attr('disabled', true);
            }
        });
    });
</script>
