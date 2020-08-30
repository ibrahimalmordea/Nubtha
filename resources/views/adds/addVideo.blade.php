@extends('layouts.app')

@section('content')

    <div class="container" style="margin: 5%;position: absolute;">
        <div class="row" style="margin-right: 17rem;width: 50rem;">
            <div class="col-md-12">
                <h1 class="big-text">موقع نبذة</h1>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="البحث" style="margin: 3px; height: 45px; font-size: 25px;">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" style="background: #D62131;margin: 2%"><img src="images/search.png" alt="search" style="width: 60%;"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection