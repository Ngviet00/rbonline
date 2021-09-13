<div>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div>
                Liệt kê sách
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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên sách</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Tác giả</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Nổi bật</th>
                        <th scope="col" style="width:100px">Trạng thái</th>
                        <th scope="col" class="text-center">Quản lý</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $key => $book)
                        <tr>
                            <th scope="row">{{ $book->id }}</th>
                            <td>{{ $book->name }}</td>
                            <td>
                                <img src="{{asset('uploads/books/'.$book->image)}}"
                                     width="70px"
                                     height="90px"
                                     alt="hinh anh"/>
                            </td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->category->name }}</td>
                            <td>
                                @if($book->outstanding == 1)
                                    <span class="text text-success">Nổi bật</span>
                                @else
                                    <span class="text text-danger">Không nổi bật</span>
                                @endif
                            </td>
                            <td>
                                @if($book->active == 1)
                                    <span class="text text-success">Hiển thị</span>
                                @else
                                    <span class="text text-danger">Không hiển thị</span>
                                @endif
                            </td>
                            <td  class="d-flex-column" style="width:70px">
                                <div class="d-flex justify-content-center">
                                    <div>
                                        <a href="{{ route('book.edit',$book->id) }}" class="btn btn-primary mr-1" style="height: fit-content">
                                            Sửa
                                        </a>
                                    </div>

                                    <form method="POST" action="{{route('book.destroy',$book->id)}}">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger"
                                                onclick="return confirm('Bạn có muốn xóa sách này không?')">
                                            Xóa
                                        </button>
                                    </form>
                                </div>
                                <a style="width:150px" href="{{ route('book.chappers.index',$book->id) }}" class="btn btn-primary mr-1 my-2">
                                    Danh sách chương
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Không tìm thấy sách</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $books->links() }}
        </div>
    </div>
</div>
