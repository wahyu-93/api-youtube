@extends('master')

@section('content')
    <div class="row">
        @foreach($videoLists->items as $list)
            <div class="d-flex ">
                <div class="p-2">
                    <img src="{{  $list->snippet->thumbnails->medium->url }}" alt="" class="rounded" width="300">
                </div>

                <div class="p-2">
                    <p>{{ \Illuminate\Support\Str::limit($list->snippet->title, $limit = 50, $end = '...') }}</p>
                    <p class="text-muted bg-light">
                        Published At {{ date('D, d M Y', strtotime($list->snippet->publishTime)) }}
                    </p>
                    <p>{{ $list->snippet->description }}</p>
                </div>
            </div>
        @endforeach()
    </div>
@endsection