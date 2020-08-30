@extends('layouts.app')

@section('content')
    <div id="div3" class="container div3">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header cardheader">{{ __('اضافة موضوع') }}</div>

                    <div class="card-bodyadd">
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                {!! \Session::get('success') !!}
                            </div>
                        @endif
                        <form method="POST" action="/addnewsubject" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="subject"
                                    class="col-md-3 col-form-label">{{ __('اسم الموضوع') }}</label>

                                <div class="col-md-8">
                                    <input id="subject" type="text"
                                        class="form-control @error('subject') is-invalid @enderror" name="subject"
                                        value="{{ old('subject') }}" required autocomplete="subject" autofocus>

                                    @error('subject')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-3 col-form-label">صوره الخبر</label>
                                <div class="col-md-8">
                                    <input type="file" id="image" name="image" class="form-control" required>
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

        <br>
        <br>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header cardheader">المواضيع</div>
                    <div class="card-bodyadd">
                        @if (\Session::has('error'))
                            <div class="alert alert-danger">
                                {!! \Session::get('error') !!}
                            </div>
                        @endif
                        <table id="storetable">

                            <thead>
                                <tr>
                                    <th>
                                        الموضوع
                                    </th>
                                    <th>
                                        صورة الموضوع
                                    </th>
                                    <th>
                                        العمليات
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subject as $subject)
                                    <tr>
                                        <td>{{ $subject->name }}</td>
                                        <td style="width: 20%"><img src="{{ $subject->image }}" alt="" width="100%"></td>
                                        <td>
                                            <a href="editsubject?id={{ $subject->id }}"
                                                class="btn btn-primary">edit</a>
                                            <a href="deletesubject?id={{ $subject->id }}"
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
            $('#storetable').DataTable();
        });

    </script>
@endsection
