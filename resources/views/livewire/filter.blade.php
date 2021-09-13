<div>
    <div class="d-flex justify-content-between flex-wrap">
        <div class="form-group" style="flex-basis: 49%">
            <select wire:model="type" class="form-control" id="type">
                <option value="" selected>Thể loại</option>
                @foreach($list_categories as $key => $value)
                    <option value="{{$value->id}}">{{ $value->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group" style="flex-basis: 49%">
            <select class="form-control" id="view" wire:model="view">
                <option value="" selected>Lượt xem</option>
                <option value="<1k">Dưới 1000</option>
                <option value="1k-2k">1000 đến 2000</option>
                <option value="2k-5k">2000 đến 5000</option>
                <option value="5k-10k">5000 đến 10000</option>
                <option value=">10k">Trên 10000</option>
            </select>
        </div>
        <div class="form-group" style="flex-basis: 49%">
            <select class="form-control" id="orderBy" wire:model="orderBy">
                <option value="" selected>Sắp xếp theo</option>
                <option value="1">Truyện nổi bật</option>
                <option value="2">Truyện hot</option>
            </select>
        </div>
        <div class="form-group" style="flex-basis: 49%">
            <select class="form-control" id="sortBy" wire:model="sortBy">
                <option value="" selected>Mức độ</option>
                <option value="desc">Giảm dần</option>
                <option value="asc">Tăng dần</option>
            </select>
        </div>
    </div>
    <div class="w-100 text-center">
        <a class="btn btn-danger mb-4" id="deleteFilter" wire:click="deleteFilter">Xóa bộ lọc</a>
    </div>
    <div class="list_books mt-4">
        <div>
            <div class="row mb-2">
                @forelse($listBooks as $key => $value)
                    <div class="col-2 mb-3">
                        <div class="card h-100 border-0 item_book" style="background: none">
                            <a href="/detail/{{$value->slug}}">
                                <img class="card-img-top"
                                     style="height: 240px"
                                     src="{{asset('uploads/books/'.$value->image)}}"
                                     alt="image" />
                                <div class="card-body px-0 py-2">
                                    <div class="text-left">
                                        <a href="/detail/{{$value->slug}}" class="font-weight-bold text-danger text-left name_story" style="color: #343a40cc">
                                            {{$value->name}}
                                        </a><br>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <h3 class="pl-3">Không tìm thấy sách cần tìm!</h3>
                @endforelse
            </div>
        </div>
    </div>
</div>
