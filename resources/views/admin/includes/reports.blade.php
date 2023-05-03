<div class="card card-custom gutter-b">
    <div class="card card-custom card-stretch gutter-b">
        <div class="card-body py-3">
            <form action="{{ route('admin_requests_filter') }}" class="my-5" method="get">
                <div class="row">

                    <div class="col-md-3">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">From</label>
                            <div class="col-lg-8">
                                <input type="date" name="dateFrom" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">To</label>
                            <div class="col-lg-8">
                                <input type="date" name="dateTo" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group row">
                            <input type="submit" class="col btn btn-primary"/>
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
                    <thead>
                        <tr class="text-left">
                            <th>Reports</th>
                            <th>Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="pr-0">
                                <div class="symbol symbol-50 symbol-light">
                                    <i class="fas fa-clock m-2 text-primary"></i>
                                    Pinded
                                </div>
                            </td>
                            <td class="pl-0">
                                <a href="{{ route('get_income_requests_by_status', ['status'=>0]) }}" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{$pinding_count}}</a>
                            </td>
                        </tr>

                        <tr>
                            <td class="pr-0">
                                <div class="symbol symbol-50 symbol-light">
                                    <i class="fas fa-check-circle m-2 text-success"></i>
                                    Accepted
                                </div>
                            </td>
                            <td class="pl-0">
                                <a href="{{ route('get_income_requests_by_status', ['status'=>1]) }}" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{$accepted_count}}</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="pr-0">
                                <div class="symbol symbol-50 symbol-light">
                                    <i class="fas fa-ban m-2 text-danger"></i>
                                    Rejected
                                </div>
                            </td>
                            <td class="pl-0">
                                <a href="{{ route('get_income_requests_by_status', ['status'=>2]) }}" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{$rejected_count}}</a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
