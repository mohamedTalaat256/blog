@extends('admin.layouts.app')


@section('content')
@section('title')
    Admin | Dashboard
@endsection
@section('content')
    @include('admin.includes.nav')

    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-6  subheader-transparent " id="kt_subheader">
            <div class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center flex-wrap mr-2">
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5"> Dashboard</h5>
                </div>

            </div>
        </div>



        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" style="width: 500px; margin: auto; z-index: 8888;"
                role="alert">
                <p>{{ $message }}</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">

                <div class="row">
                    <div class="col-md-6">@include('admin.includes.users')</div>
                    <div class="col-md-6">

                    </div>
                </div>

            </div>
        </div>
    </div>
    @include('admin.includes.footer')
    </div>
    </div>
    </div>



@endsection
