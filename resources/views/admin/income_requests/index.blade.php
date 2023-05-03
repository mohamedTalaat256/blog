@extends('admin.layouts.app')

@section('title')
    Admin | Inbox
@endsection


@section('content')
    @include('admin.includes.nav')


    <div class="container mb-8" style="margin-top: 50px">
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
                            <div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title=""
                                data-placement="left" data-original-title="Quick actions">




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


                    </div>
                    <!--end::Body-->
                </div>
            @endforeach


        </div>
    </div>


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


    <script>
        function getPostComments(post_id) {

            var getPostCommentsAjaxUrl = '{{ URL::to('admin/comments', 'id') }}';
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
