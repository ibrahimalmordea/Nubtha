@extends('layouts.app')

@section('content')
    <style>
        .row {
            width: 60rem;
        }

    </style>
    <div class="container">
        <div class="col-md-11 md11">
            <div class="row justify-content-center" style="width: 192px;">
                <div class="col-xs-1">
                    <p style="font-size: 42px;">اخر الاخبار</p>
                </div>
            </div>
            <div id="div3" style="display:none;" class="row">
                @foreach ($ManageContent2 as $ManageContent)
                    <div class="col-md-3 mb-3">
                        <a href="newsdetails?id={{ $ManageContent->id }}">
                            <div class="card">
                                <img class="card-img-top" src="{{ $ManageContent->image }}" alt="Card image cap"
                                    style="height: 10rem">
                                <div class="card-body">
                                    <h2 class="card-title">{!! \Illuminate\Support\Str::limit($ManageContent->title, 35,
                                        $end = '...') !!}</h2>
                                        <h2 style="text-align: end;" class="card-title">عدد المشاهدات :
                                            {{ $ManageContent->views }}</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
