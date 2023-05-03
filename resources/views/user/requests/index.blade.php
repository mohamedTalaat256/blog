@extends('user.layouts.app')
@section('title')
    Posts
@endsection


@section('content')
    @include('user.includes.nav')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" style="width: 500px; margin: auto; z-index: 8888;"
            role="alert">
            <p>{{ $message }}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if ($message = Session::get('danger'))
        <div class="alert alert-danger alert-dismissible fade show" style="width: 500px; margin: auto; z-index: 8888;"
            role="alert">
            <p>{{ $message }}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container" style="margin-top: 80px">

        <!--begin::Notice-->
        <div class="alert alert-custom alert-white alert-shadow fade show gutter-b" role="alert">
            <div class="alert-text">
                <div class="form-inline">
                    {{-- <form action="{{ route('search_posts_date_range_user') }}" class="row" method="get">
                        <div class="form-group mb-2 ">
                            <label class="text-right m-2">Select date</label>
                            <select class="form-control  col" id="search_date" onchange="window.location.href=this.value;">
                                <option value="">select date</option>
                                <option value="{{ route('search_posts_date_user', ['value' => 0]) }}">All</option>
                                <option value="{{ route('search_posts_date_user', ['value' => 1]) }}">Today</option>
                                <option value="{{ route('search_posts_date_user', ['value' => 2]) }}">Yesterday</option>
                                <option value="{{ route('search_posts_date_user', ['value' => 3]) }}">Last 7 Days</option>
                                <option value="{{ route('search_posts_date_user', ['value' => 4]) }}">Last 30 Days</option>
                            </select>
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <div class="form-group col">
                                <label class=" text-right m-2">from</label>
                                <input type="date" name="start_date" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <div class="form-group col">
                                <label class="  text-right m-2">to</label>
                                <input type="date" name="end_date" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">search</button>
                    </form> --}}
                </div>
            </div>
        </div>

        <!--end::Notice-->

        <div class="card card-custom">

            @foreach ($data as $request)
                <div class="card card-custom gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Top-->
                        <div class="d-flex align-items-center">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-60 mr-5">
                                <span class="symbol-label">
                                    <img src="{{ asset('assets/images/' . $request->user_image) }}"
                                        class="h-75 align-self-end" alt="">
                                </span>
                            </div>
                            <!--end::Symbol-->

                            <!--begin::Info-->
                            <div class="d-flex flex-column flex-grow-1">
                                <a href="#"
                                    class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">{{ $request->username }}</a>
                                <span class="text-muted font-weight-bold">
                                    {{ Str::substr($request->created_at, 0, 10) }}</span>
                            </div>
                            <!--end::Info-->

                            <!--begin::Dropdown-->
                            <div class="row ">


                                <a href="{{ route('user_show_request', ['id'=>$request->id ]) }}" class="col btn ">
                                    <i class="fas fa-eye"></i>
                                </a>

                                <div class="col">
                                    <form action="{{ route('user_delete_request') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $request->id }}">
                                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>




                            </div>
                            <!--end::Dropdown-->
                        </div>
                        <!--end::Top-->

                        <!--begin::Bottom-->
                        <div class="pt-4">
                            <p class="text-dark-75 font-size-lg font-weight-normal pt-5 mb-2">
                                {{ $request->title }}
                            </p>
                            <!--begin::Image-->
                            <div class="bgi-no-repeat bgi-size-cover rounded min-h-265px"
                                style="background-image: url({{ asset('assets/images/' . $request->image) }});"></div>
                            <!--end::Image-->

                            <!--begin::Text-->
                            <p class="text-dark-75 font-size-lg font-weight-normal pt-5 mb-2">
                                {{ $request->content }}
                            </p>
                            <!--end::Text-->

                            <!--begin::Action-->
                            <div class="d-flex align-items-center">
                                <Button data-toggle="modal" id="comments-btn" data-target="#commentsModal" onclick="getPostComments({{$request->id}})"
                                    class="btn btn-hover-text-primary btn-hover-icon-primary btn-sm btn-text-dark-50 bg-hover-light-primary rounded font-weight-bolder font-size-sm p-2">
                                    <i class="fas fa-comment"></i> {{ $request->comment_count }}
                                </Button>


                            </div>
                            <!--end::Action-->
                        </div>
                        <!--end::Bottom-->

                        <!--begin::Separator-->
                        <div class="separator separator-solid mt-2 mb-4"></div>
                        <!--end::Separator-->

                        <!--begin::Editor-->
                        <form action="{{ route('user_comment_store') }}" method="post" class="position-relative">
                            @csrf
                            <input name="post_id" type="hidden" value="{{$request->id}}">
                            <textarea name="comment" id="kt_forms_widget_4_input" class="form-control border-0 p-0 pr-10 resize-none" rows="1"
                                placeholder="comment..." style="overflow: hidden; overflow-wrap: break-word; height: 20px;"></textarea>

                            <div class="position-absolute top-0 right-0 mt-n1 mr-n2">
                                <Button class="btn btn-primary"> <i class="fas fa-paper-plane"></i> </Button>

                            </div>
                        </form>
                        <!--edit::Editor-->
                    </div>
                    <!--end::Body-->
                </div>
            @endforeach


        </div>
    </div>


    {{-- modal comments --}}


    <!-- Button trigger modal-->


    <!-- Modal-->
    <div class="modal fade" id="commentsModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">comments</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body" id="comment-modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary font-weight-bold"
                        data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    @include('user.includes.footer')

    <script>
        function getPostComments(post_id) {

            var getPostCommentsAjaxUrl = '{{ URL::to('comments', 'id') }}';
            getPostCommentsAjaxUrl = getPostCommentsAjaxUrl.replace('id', post_id);

            $.ajax({
                type: 'get',
                url: getPostCommentsAjaxUrl,
                data: {
                    '_token': '{{ csrf_token() }}'
                },
                success: function(data) {
                    console.log(data);



                    $('#comment-modal-body').html(data);
                }
            });

        }



        content


    </script>
@endsection
