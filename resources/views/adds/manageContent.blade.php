@extends('layouts.app')

@section('content')
    <div id="div3" style="display:none;margin-top: 2rem;"  class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header cardheader">اضافة خبر</div>
                    <div class="card-bodyadd">
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                {!! \Session::get('success') !!}
                            </div>
                        @endif
                        @if (isset($success))
                            <div class="alert alert-success">
                                {{ $success }}
                            </div>
                        @endif
                        <form method="POST" action="/addnewmanagenontent" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="newstitle"
                                    class="col-md-3 col-form-label text-md-right">عنوان الخبر</label>

                                <div class="col-md-8">
                                    <input id="newstitle" type="text"
                                        class="form-control @error('newstitle') is-invalid @enderror" name="newstitle"
                                        value="{{ old('newstitle') }}" required autocomplete="newstitle" autofocus>

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
                                    <input type="file" id="image" name="image" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text" class="col-md-3 col-form-label text-md-right">نص الخبر
                                </label>
                                <div class="col-md-8">
                                    <textarea style="border-radius: 0.25rem;" name="text" type="text" id="summernote"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="subject" class="col-md-3 col-form-label text-md-right">الموضوع</label>

                                <div class="col-md-8">
                                    <select name="subject" class="form-control">
                                        <option selected disabled>اختيار</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <input type="hidden" name="views" value="0">

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

        <br>
        <br>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header cardheader">الاخبار</div>
                    <div class="card-bodyadd">
                        @if (\Session::has('error'))
                            <div class="alert alert-danger">
                                {!! \Session::get('error') !!}
                            </div>
                        @endif
                        <table id="ManageContenttable">
                            <thead>
                                <tr>
                                    <th>
                                        صوره الخبر
                                    </th>
                                    <th>
                                        عنوان الخبر
                                    </th>
                                    <th>
                                        تاريخ النشر
                                    </th>
                                    <th>
                                        الناشر
                                    </th>
                                    <th>
                                        عدد المشاهدات
                                    </th>
                                    <th>
                                        العمليات
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ManageContent as $ManageContent)
                                    <tr>
                                        <td style="width: 20%"><img src="{{ $ManageContent->image }}" alt="" width="100%"></td>
                                        <td>{!! \Illuminate\Support\Str::limit($ManageContent->title, 60, $end = '...') !!}</td>
                                        <td>{{ $ManageContent->created_at }}</td>
                                        <td>{{ Auth::user()->name }}</td>
                                        <td>{{ $ManageContent->views }}</td>
                                        <td>
                                            <a href="editmanagenontent?id={{ $ManageContent->id }}"
                                                class="btn btn-primary">edit</a>
                                            <a href="deletemanagenontent?id={{ $ManageContent->id }}"
                                                class="btn btn-danger">delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
                    ['height', ['height']]
                ]
            });
        });

    </script>
@endsection
