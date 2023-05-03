

            @foreach ($comments as $comment)
                <div class="card card-custom gutter-b">
                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Top-->
                        <div class="d-flex align-items-center">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-60 mr-5">
                                <span class="symbol-label">
                                    <img src="{{ asset('assets/images/' . $comment->user_image) }}"
                                        class="h-75 align-self-end" alt="">
                                </span>
                            </div>
                            <!--end::Symbol-->

                            <!--begin::Info-->
                            <div class="d-flex flex-column flex-grow-1">
                                <a href="#"
                                    class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">{{ $comment->username }}</a>

                                    <a href="#"
                                    class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">{{ $comment->comment }}</a>
                                <span class="text-muted font-weight-bold">
                                    {{$comment->date }}</span>
                            </div>
                            <!--end::Info-->


                        </div>
                        <!--end::Top-->


                        <!--begin::Editor-->
                        <form action="{{ route('user_comment_delete') }}" method="post" class="position-relative">
                            @csrf
                            <input type="hidden" name="id" value="{{$comment->id}}">

                            <div class="position-absolute top-0 right-0 mt-n1 mr-n2">
                                <Button class="btn btn-danger"> <i class="fas fa-trash"></i> </Button>
                            </div>
                        </form>
                        <!--edit::Editor-->
                    </div>
                    <!--end::Body-->
                </div>
            @endforeach

