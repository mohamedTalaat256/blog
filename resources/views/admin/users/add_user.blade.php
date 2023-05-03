@extends('admin.layouts.app')


@section('content')

@section('title')
    Admin | New User
@endsection
<style>

</style>
@include('admin.includes.nav')
<div class="container" style="margin-top: 80px">
    <form class="form" action="{{ route('add_user') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card-body">
                <a href="{{ route('all_users') }}" class="btn btn-primary font-weight-bolder btn-sm">  back </a>
            <div class="mb-15">
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Full Name:</label>
                    <div class="col-lg-6">
                        <input type="text" name="name" class="form-control" placeholder="Enter full name" value=""/>
                        <span class="form-text text-muted">Please enter your full name</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Email address:</label>
                    <div class="col-lg-6">
                        <input type="email" name="email" class="form-control" placeholder="Enter email" value=""/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Password:</label>
                    <div class="col-lg-6">
                        <input type="password" name="password" class="form-control" placeholder="Password" value=""/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Phone:</label>
                    <div class="col-lg-6">
                        <input type="text" name="phone" class="form-control" placeholder="Enter Phone" value=""/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Letter:</label>
                    <div class="col-lg-6">
                        <input type="text" name="letter" class="form-control" placeholder="Enter Letter" value=""/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Nikname:</label>
                    <div class="col-lg-6">
                        <input type="text" name="nikename" class="form-control" placeholder="Enter nikename" value=""/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Code:</label>
                    <div class="col-lg-6">
                        <input type="text" name="code" class="form-control" placeholder="Enter code" value=""/>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Image:</label>
                    <div class="col-lg-6">
                        <div class="col-lg-6">
                            <label>profile image:</label>

                                    <input type="file" name="image" class="btn btn-primary font-weight-bold btn-sm" >


                        </div>
                    </div>
                </div>



            </div>

        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <button type="submit" class="btn btn-success mr-2">save</button>
                    <button type="reset" class="btn btn-secondary">cansel</button>
                </div>
            </div>
        </div>
    </form>
</div>
@include('admin.includes.user_drawer')


@endsection
