<div class="col-2 mb-3">
    <div class="card h-100 border-0 item_book" style="background: none">
        <a href="/detail/{{$value->slug}}">
            <img class="card-img-top"
                 style="height: 240px"
                 src="{{asset('uploads/books/'.$value->image)}}"
                 alt="image" />
            <div class="card-body px-0 py-2">
                <div class="text-left">
                    <a href="/detail/{{$value->slug}}" class="font-weight-bold text-left name_story title_dark" style="color: #343a40cc">
                        {{$value->name}}
                    </a>
                    <span class="d-block font-weight-bolder text-danger">{{$value->author}}</span>
                    <a href="{{ route('categoryBySlug', [$value->category->slug]) }}" class="text-secondary">{{$value->category->name}}</a>
                </div>
            </div>
        </a>
    </div>
</div>

