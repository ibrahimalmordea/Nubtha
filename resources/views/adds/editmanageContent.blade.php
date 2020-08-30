@extends('layouts.app')

@section('content')
    <div id="div4" style="display:none;margin-top: 2rem;"  class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header cardheader">{{ __('تعديل خبر') }}</div>

                    <div class="card-bodyadd">
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                {!! \Session::get('success') !!}
                            </div>
                        @endif
                        <form method="POST" action="/submiteditmanagenontent" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $ManageContent->id }}">
                            <div class="form-group row">
                                <label for="newstitle"
                                    class="col-md-3 col-form-label text-md-right">{{ __('عنوان الخبر') }}</label>

                                <div class="col-md-8">
                                    <input id="newstitle" type="text"
                                        class="form-control @error('newstitle') is-invalid @enderror" name="newstitle"
                                        value="{{ $ManageContent->title }}" required autocomplete="newstitle" autofocus>

                                    @error('newstitle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-3 col-form-label text-md-right">صوره الخبر</label>
                                <div class="col-md-8">
                                    <input type="file"  value="{{ $ManageContent->image }}" id="image" name="image"
                                        class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text" class="col-md-3 col-form-label text-md-right">نص الخبر
                                </label>
                                <div class="col-md-8">
                                    <textarea name="text" type="text"
                                        id="summernote">{!!  $ManageContent->news !!}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="subject" class="col-md-3 col-form-label text-md-right">الموضوع</label>

                                <div class="col-md-8">
                                    <select name="subject" class="form-control">
                                        <option selected disabled>اختيار</option>
                                        @foreach ($Subjects as $subject)
                                            <option {{ $subject->id == $ManageContent->subjectidfk ? 'selected' : '' }}
                                                value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
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
    <script>
        $(document).ready(function() {
            $('#ManageContenttable').DataTable();
            $('#summernote').summernote({
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['height', ['height']],
                    ['fontname', ['fontname']]
                ]
            });
        });

    </script>
@endsection
