@extends('layouts.app')

@section('content')
    <div id="div4" style="display:none;margin-top: 2rem;"  class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                <div class="card-header cardheader">{{ __('تعديل الموضوع') }}</div>

                    <div class="card-bodyadd">
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                {!! \Session::get('success') !!}
                            </div>
                        @endif
                        <form method="POST" action="/submiteditsubject" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $subject->id }}">
                            <div class="form-group row">
                                <label for="subject"
                                    class="col-md-3 col-form-label text-md-right">{{ __('اسم الموضوع') }}</label>

                                <div class="col-md-8">
                                    <input id="subject" type="text"
                                        class="form-control @error('subject') is-invalid @enderror" name="subject"
                                        value="{{ $subject->name }}" required autocomplete="subject" autofocus>

                                    @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-3 col-form-label text-md-right">صوره الخبر</label>
                                <div class="col-md-8">
                                    <input type="file" value="{{ $subject->image }}" id="image" name="image" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4 ">
                                    <button type="submit" class="buttonconfarme btn btn-primary">
                                        {{ __('تاكيد') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
