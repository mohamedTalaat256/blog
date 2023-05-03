@extends('admin.layouts.app')

@section('title')
    View Request
@endsection
@section('content')
    @include('admin.includes.nav')


    <!--begin::Content-->
    <div class="container mb-8" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4  subheader-transparent " id="kt_subheader">
            <div class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Details-->
                <div class="d-flex align-items-center flex-wrap mr-2">
                </div>
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container-fluid ">
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <div class="card-body">
                        <div class="d-flex">


                            <!--begin: Info-->
                            <div class="flex-grow-1">
                                <!--begin: Title-->
                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    <div class="mr-3">


                                        <!--begin::Contacts-->
                                        <div class="d-flex flex-wrap my-2">
                                            <a href="{{ $request->username }}" target="_blank"
                                                class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">

                                                <div id="complain_image" class="image-input-wrapper mr-3"
                                                    style="border-radius: 50%; height: 45px; width: 45px; background-image: url({{ asset('assets/images/' . $request->user_image) }});background-repeat: no-repeat;
                                            background-size: cover; ">
                                                </div>
                                                <p class="mt-3">{{ $request->username }}
                                                </p>
                                            </a>
                                            <a href="#"
                                                class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">

                                                @if ($request->status == 0)
                                                    <i class="fas fa-clock m-2 text-primary"></i>
                                                    Pinding
                                                @elseif ($request->status == 1)
                                                    <i class="fas fa-check-circle m-2 text-success"></i>
                                                    Accepted
                                                @elseif($request->status == 2)
                                                    <i class="fas fa-ban m-2 text-danger"></i>
                                                    Rejeted
                                                @endif
                                            </a>
                                        </div>


                                        <!--end::Contacts-->
                                    </div>
                                    <div class="my-lg-0 my-1">

                                    </div>
                                </div>
                                <!--end: Title-->

                                <!--begin: Content-->
                                <div class="d-flex align-items-center flex-wrap justify-content-between">
                                    <div class="flex-grow-1 font-weight-bold text-dark-50 py-5 py-lg-2 mr-5">
                                        <div class="row mb-5 pb-5">
                                            <div class="col-md-4">{{ $request->desc }}<br /></div>
                                            <div class="col-md-8 text-right">
                                                @if ($request->day_flight == 1)
                                                    <button class="btn btn-light-success m-2">
                                                        <i class="fas fa-plane"></i>
                                                        Day Flight</button>
                                                @endif
                                                @if ($request->night_flight == 1)
                                                    <button class="btn btn-dark m-2">
                                                        <i class="fas fa-plane"></i>
                                                        Night Flight
                                                        <i class="fas fa-moon"></i>

                                                    </button>
                                                @endif
                                                @if ($request->midday_flight == 1)
                                                    <button class="btn btn-light-warning m-2">

                                                        Midday Flight</button>
                                                @endif
                                                @if ($request->short_flight == 1)
                                                    <button class="btn btn-light-info m-2">Short Flight</button>
                                                @endif
                                                @if ($request->midium_flight == 1)
                                                    <button class="btn btn-light-primary m-2">Midium Flight</button>
                                                @endif
                                                @if ($request->one_night == 1)
                                                    <button class="btn btn-light-dark m-2">One Night</button>
                                                @endif
                                                @if ($request->reuld == 1)
                                                    <button class="btn btn-light-warning m-2">Reuld</button>
                                                @endif
                                                @if ($request->leg_x_leg == 1)
                                                    <button class="btn btn-light-danger m-2">Leg X Leg</button>
                                                @endif
                                                @if ($request->extended_flight == 1)
                                                    <button class="btn btn-light-danger m-2">Extended Flight</button>
                                                @endif

                                            </div>
                                        </div>

                                        <div class="row mt-5 pt-5 ">
                                            <div class="col-md-6">
                                                <div class="d-flex flex-wrap align-items-center py-2">
                                                    <div class="d-flex align-items-center mr-10">
                                                        <div class="mr-6">
                                                            <div class="font-weight-bold mb-2">Inserted At</div>
                                                            <span
                                                                class="btn btn-sm btn-text btn-light-primary text-uppercase font-weight-bold">
                                                                {{ $request->created_at }}
                                                            </span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 ">
                                                <div class="form-group row font-weight-bold">
                                                    <label class="col-form-label text-right col-lg-3 col-sm-12">Action</label>
                                                    <div class="col-lg-4 col-md-9 col-sm-12">
                                                        <select class="form-control" data-size="4" onchange="window.location.href=this.value;">
                                                            <option value="">select action</option>
                                                            <option value="{{ route('admin_accept_request', ['id' => $request->id]) }}">Accept</option>
                                                            <option value="{{ route('admin_reject_request', ['id' => $request->id]) }}">Reject</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>


                                </div>
                                <!--end: Content-->
                            </div>
                            <!--end: Info-->
                        </div>
                    </div>
                </div>
                <!--end::Card-->
                <!--begin::Row-->

                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->



    </div>

    <script>
        $(document).ready(function() {
            $('#related_to_select_2').select2();
        });

        function getPostId(postId) {
            $('#post_id').val(postId);
        }

        $('#share_btn').on('click', function() {
            $('#share_modal').modal('show');
        });
    </script>

@endsection
