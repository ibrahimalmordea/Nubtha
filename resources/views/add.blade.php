@extends('layouts.app')

@section('content')
<div id="div2" style="display:none;" class="container" >
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-3 btnv">
            <a href="/addVideo">
                <button type="button" class="btn btn-primary btn-lg btn-block">إضافة فيديو</button>
            </a>
        </div>
        <div class="col-md-3 btnv">
            <a href="/managenontent">
                <button  type="button" class="btn btn-primary btn-lg btn-block">التحكم في الأخبار والفيديوهات</button>
            </a>
        </div>
            </div>
</div>
@endsection
