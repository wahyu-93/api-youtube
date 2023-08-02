@extends('master')

@section('content')
    <div class="row">
        @foreach($videoLists->items as $list)
            <div class="col-md-3">
                <a href="{{ route('watch', $list->id->videoId) }}" class="text-decoration-none text-secondary">
                    <div class="card mb-3" style="height: 350px;">
                        <img src="{{ $list->snippet->thumbnails->medium->url }}" alt="" class="card-img-top" style="height:200px;">
                        <div class="card-body">
                           <div class="card-title">{{ \Illuminate\Support\Str::limit($list->snippet->title, $limit = 50, $end = '...') }}</div>
                        </div>
    
                        <div class="card-footer">
                            Published At {{ date('D, d M Y', strtotime($list->snippet->publishTime)) }}
                        </div>
                    </div>
                </a>
            </div>
        @endforeach()
    </div> 
@endsection