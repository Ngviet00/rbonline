<div>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div>
                Danh sách danh mục
            </div>
            <div>
                <form class="w-100" action="" method="post">
                    <input wire:model.debounce.350ms="search" type="text" class="form-control w-100 mt-3" id="search" name="search"
                           placeholder="Tìm kiếm">
                </form>
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
                <button formaction="{{ route('deleteManyCategory') }}" class="btn btn-primary"
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
                        <th scope="col">ID</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Kích hoạt</th>
                        <th scope="col" class="text-left">Quản lý</th>
                    </tr>
                    </thead>
                    <tbody id="listCate">
                    @forelse ($list_categories as $key => $category)
                        <tr>
                            <td>
                                <input type="checkbox" name="categories[]" class="child" value="{{ $category->id }}">
                            </td>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                @if($category->active == 1)
                                    <span class="text text-success">Kích hoạt</span>
                                @else
                                    <span class="text text-danger">Không kích hoạt</span>
                                @endif
                            </td>
                            <td class="d-flex">
                                <div>
                                    <a style="height: fit-content"
                                       href="{{route('category.edit',$category->id)}}"
                                       class="btn btn-primary mr-1">
                                        Sửa
                                    </a>
                                </div>
                                <button
                                        formaction="{{route('category.destroy',$category->id)}}"
                                        class="btn btn-danger"
                                        onclick="return confirm('Bạn có muốn xóa danh mục này không?')">
                                    Xóa
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Không tìm thấy dữ liệu</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                {{ $list_categories->links() }}
            </form>
        </div>
    </div>
</div>
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
