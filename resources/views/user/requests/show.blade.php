@extends('user.layouts.app')

@section('title')
    View Request
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
                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Top-->
                    <form action="{{ route('user_update_request') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $request->id }}">
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
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">title:</label>
                                <div class="col-lg-6">
                                    <input type="text" name="title" class="form-control" value="{{ $request->title }}"/>
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">content:</label>
                                <div class="col-lg-6">
                                    <input type="text" name="content" class="form-control" value="{{ $request->content }}"/>
                                    @error('content')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>




                            <!--begin::Image-->
                            <div class="bgi-no-repeat bgi-size-cover rounded min-h-265px"
                                style="background-image: url({{ asset('assets/images/' . $request->image) }});"></div>

                            <input type="file" class="btn btn-primary w-100 mt-3 p-2" name="image"/>
                            <!--end::Image-->
                            <!--begin::Action-->
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-success mr-2">Update</button>
                                        <button type="reset" class="btn btn-secondary">Cancel</button>
                                    </div>
                                </div>
                            </div>
                            <!--end::Action-->
                        </div>
                        <!--end::Bottom-->

                        <!--begin::Separator-->
                        <div class="separator separator-solid mt-2 mb-4"></div>
                        <!--end::Separator-->

                    </form>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card-->
                <!--begin::Row-->

                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->



    </div>


@endsection
