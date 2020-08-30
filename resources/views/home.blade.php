@extends('layouts.app')

@section('content')

    <div class="container container1" id="div3">
        <div class="row">
            <div class="col-md-2" style="margin-top: 9px;">
                @foreach ($ManageContent2 as $item)
                    <div class="row">
                        <div class="col-md-12">
                            <a href="newsdetails?id={{ $item->id }}"data-toggle="tooltip" data-placement="left" title="{{ $item->title }}">
                                <img src="{{ $item->image }}" alt="" class="side-images hover">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-md-8 row background-section">
                <div class="col-md-2"></div>
                <div class="text-center col-md-8" style="padding-top: 25%">
                    <h1 class="text-center" style="color: #404041;">
                        ابحث
                        عن اخبار قد تهمك الان في نبذة</h1>
                    <input type="text" class="form-control" placeholder="البحث" aria-label="Recipient's username"
                        id="myInput" onkeyup="filterFunction()"
                        onfocus="document.getElementById('myDropdown').classList.add('show');"
                        aria-describedby="basic-addon2" style=" font-size: 25px;background: #ffffff83">

                    <div id="myDropdown" class="dropdown-content">

                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>

            <div class="col-md-2" style="margin-top: 9px;">
                @foreach ($ManageContent3 as $item)
                    <div class="row">
                        <div class="col-md-12">
                            <a href="newsdetails?id={{ $item->id }}" data-toggle="tooltip" data-placement="right" title="{{ $item->title }}">
                                <img src="{{ $item->image }}" alt="" class="side-images">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>



    <div class="container">
        <div class="row">
            <div class="text-center">
                <p style="font-size: 42px;">تصنيفات المواضيع</p>
            </div>

        </div>
        <div id="div5" style="display:none;width: 100%;" class="row">
            @foreach ($subject as $subject)
                <div class="col-md-4 mb-3">
                    <a href="NewsDetailsOne?id={{ $subject->id }}">
                        <div class="card" style="border-bottom: 2px solid #b31515;">
                            <div class="card-body hover-title" id="{{ $subject->id }}">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{ $subject->image }}" alt="{{ $subject->image }}" style="width: 50px;height: 50px;">
                                    </div>
                                    <div class="col-md-4 text-right">
                                        <h2 class="card-title card-font card-font_{{ $subject->id }}">{{ $subject->name }}</h2>                                  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @foreach ($ManageContent4 as $MC)
                        @if ($MC->subjectidfk == $subject->id)
                            <div class="card" style="border: 0px;">
                                <div class="card-body">
                                    <h2><a class="card-title" href="newsdetails?id={{ $MC->id }}">{{ $MC->title }}</a></h2>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>

        <br>
        {{--
        <hr>
        <br>

        <div class="col-md-12" style="margin: 1%;border: 1px solid #404041;">

            <div class="row">
                <div class="col-md-8 text-right">
                    <p style="font-size: 42px;">اخر الاخبار</p>
                </div>
                <div class="col-md-4 mt-4">
                    <a style="font-size: 1.3rem;color: #ec1944" href="/latestnews">المزيد من اخر الاخبار</a>
                </div>
            </div>

            <div id="div5" style="display:none;" class="row">
                @foreach ($ManageContent2 as $ManageContent2)
                    <div class="col-md-3 mb-3">
                        <a href="newsdetails?id={{ $ManageContent2->id }}">
                            <div class="card">
                                <img class="card-img-top" src="{{ $ManageContent2->image }}" alt="Card image cap"
                                    style="height: 10rem">
                                <div class="card-body">
                                    <h2 class="card-title">{!! \Illuminate\Support\Str::limit($ManageContent2->title, 35,
                                        $end = '...') !!}</h2>
                                    <h2 style="text-align: end;" class="card-title">عدد المشاهدات :
                                        {{ $ManageContent2->views }}</h2>

                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>

        <br>
        <hr>
        <br>

        <div class="col-md-12" style="margin: 1%;border: 1px solid #404041;">

            <div class="row">
                <div class="col-md-8 text-right">
                    <p style="font-size: 42px;">اهم الاخبار</p>
                </div>
                <div class="col-md-4 mt-4">
                    <a style="font-size: 1.3rem;color: #ec1944" href="/latestnews">المزيد من اهم الاخبار</a>
                </div>
            </div>

            <div id="div2" style="display:none;" class="row">
                @foreach ($ManageContent3 as $ManageContent3)
                    <div class="col-md-3 mb-3">
                        <a href="newsdetails?id={{ $ManageContent3->id }}">
                            <div class="card">
                                <img class="card-img-top" src="{{ $ManageContent3->image }}" alt="Card image cap"
                                    style="height: 10rem">
                                <div class="card-body">
                                    <h2 class="card-title">{!! \Illuminate\Support\Str::limit($ManageContent3->title, 35,
                                        $end = '...') !!}</h2>
                                    <h2 style="text-align: end;" class="card-title">عدد المشاهدات :
                                        {{ $ManageContent3->views }}</h2>

                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>--}}

    </div>

    <script>

        $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip()
                $(".hover-title").hover(function(){
                    $(".card-font_"+$(this).attr('id')).css('color', '#fff')
                }, function(){
                    $(".card-font").css("color", "#000");
                });
        });
        var count = 0;

        function filterFunction() {
            var length = document.getElementById("myInput").value;
            if (length == '') {
                $(".remove").remove();
            } else {
                $.ajax({
                    url: 'search?q=' + length,
                    type: 'get',
                    success: function(res) {
                        $(".remove").remove();
                        res.forEach(mc => {
                            $('#myDropdown').append('<a class="remove" href="newsdetails?id=' + mc.id +
                                '">' + mc.title + '</a>')
                        });


                    },
                });
            }
        }

    </script>
@endsection
