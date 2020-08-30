@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 85vw;">
    <div id="div3" style="display:none;margin: 1rem;margin: 1%;border: 1px solid #404041;" class="row">
        @foreach ($ManageContent2 as $ManageContent)
            <div class="col-md-3 mb-3 p-5">
                <a href="newsdetails?id={{ $ManageContent->id }}">
                    <div class="card">
                        <img class="card-img-top" src="{{ $ManageContent->image }}" alt="Card image cap"
                            style="height: 10rem">
                        <div class="card-body">
                            <h2 class="card-title">{!! \Illuminate\Support\Str::limit($ManageContent->title, 35, $end =
                                '...') !!}</h2>
                                <img src="images/view.png" alt="views" style="width: 15%;float: left;">
                            <p style="text-align: end;" class="card-title">عدد المشاهدات :
                                {{ $ManageContent->views }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
