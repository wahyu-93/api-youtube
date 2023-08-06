@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $singleVideo->items[0]->id }}" width="100%" height="560"></iframe>
                </div>

                <div class="card-body">
                    <h5>{{ $singleVideo->items[0]->snippet->title }}</h5>
                    <p>Published {{ date('D, d M Y', strtotime($singleVideo->items[0]->snippet->publishedAt)) }}</p>
                    <h5>{{ $singleVideo->items[0]->snippet->description }}</h5>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            @foreach ($videoLists->items as $list)
                <a href="{{ route('watch', $list->id->videoId ) }}" class="text-decoration-none text-secondary">
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <img src="{{ $list->snippet->thumbnails->medium->url }}" alt="" class="card-img-top">
                            <div class="card-body">
                                {{ \Illuminate\Support\Str::limit($list->snippet->title, $limit = 50, $end = '...') }}
                            </div>
            
                            <div class="card-footer">
                                Published At {{ date('D, d M Y', strtotime($list->snippet->publishTime)) }}
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

    </div>
@endsection