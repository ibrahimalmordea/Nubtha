@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-11" style="text-align: center">
                <h1 style="font-weight: bold;">{{ $ManageContent->title }}</h1>
            </div>
        </div>
        <hr>
        <br>
        <div class="row">
            <img class="col-md-11" src="{{ $ManageContent->image }}" alt="news image" style="height: 40rem">
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-11">
                <p>{!! $ManageContent->news !!}</p>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-11">
                <p>عدد المشاهدات : {!! $ManageContent->views !!}</p>
            </div>
        </div>
        <br>
        <hr>
        <div class="row">
            <div class="col-md-11">
                <h4 style="color: #3E4145;text-align: right;">التعليقات</h4>
            </div>
            @foreach ($comments as $comments)
                <div class="col-md-11 md121">
                    <div class="col-md-11">
                        <h5 style="color: #3E4145;margin-top: 2%;">{{ $comments->username }}</h5>
                    </div>
                    <div class="col-md-11">
                        <?php
                        $date = $comments->updated_at;
                        $newDate = date('M o d, h:i A', strtotime($date));
                        ?>
                        <p style="color: #959596;"> {{ $newDate }} </p>
                    </div>
                    <div class="col-md-11">
                        <p style="color: #3E4145 ;margin-top: 1%;">{{ $comments->comment }}</p>
                    </div>
                </div>
            @endforeach
            @auth
                <div class="col-md-11" style="margin-top: 4%;">
                    <form action="/newcomment" method="POST">
                        @csrf

                        <div class="input-group mb-3">
                            <div class="col-md-12">
                                <input class="form-control" type="hidden" name="ManageContentidfk"
                                    value="{{ $ManageContent->id }}">
                            </div>
                            <div class="col-md-12" style="display: flex;">
                                <input id="comment" name="comment" type="text" class="form-control" placeholder="إضافة تعليق"
                                    aria-label="" aria-describedby="basic-addon1">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-primary" type="submit">إضافة</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            @else
                <h5>الرجاء <a href="{{ route('login') }}">تسجيل الدخول</a> لتتمكن من اضافة التعليقات</h5>
            @endauth
        </div>
        <br>
        <hr>
        <br>
        <div class="row justify-content-center" style="width: 192px;">
            <div class="col-xs-1">
                <p style="font-size: 42px;">اهم الاخبار</p>
            </div>
        </div>
        <div class="row">
            @foreach ($ManageContentget as $ManageContent)
                <div class="col-md-3 mt-3 shadowb">
                    <a href="newsdetails?id={{ $ManageContent->id }}">
                        <div class="card">
                            <img class="card-img-top" src="{{ $ManageContent->image }}" alt="Card image cap"
                                style="height: 10rem">
                            <div class="card-body">
                                <h2 class="card-title">{!! \Illuminate\Support\Str::limit($ManageContent->title, 35, $end =
                                    '...') !!}</h2>
                                <img class="imgg"src="images/view.png" alt="views">
                                <p style="text-align: end;" class="card-title">
                                    {{ $ManageContent->views }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
