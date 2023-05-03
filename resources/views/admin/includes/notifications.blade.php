

  <!--begin::Notifications-->
   <div class="dropdown">
       <!--begin::Toggle-->
       <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
        <a href="#" class="nav-link nav-icon iconClass">
            <i class="fas fa-bell" style="font-size: 25px"></i>
            <span class="badge badge-danger" id="unseen_msg_count">{{$unseen_messages->count()}}</span>
        </a>
       </div>
       <!--end::Toggle-->

       <!--begin::Dropdown-->
       <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
           <form>
               <!--begin::Header-->
               <div class="d-flex flex-column pt-12 bg-dark-o-5 rounded-top">
                   <!--begin::Title-->
                   <h4 class="d-flex flex-center">
                       <span class="text-dark">Unseen Requests</span>
                       <span class="btn btn-text btn-success btn-sm font-weight-bold btn-font-md ml-2">{{$unseen_messages->count()}}</span>
                   </h4>
               </div>
               <!--end::Header-->

               <!--begin::Content-->
               <div class="tab-content">
                   <!--begin::Tabpane-->
                   <div class=" active show p-8" id="topbar_notifications_notifications" role="tabpanel" style="height: 300px; overflow-x: hidden; overflow-y: scroll">
                       <!--begin::Scroll-->
                       <div class="scroll pr-7 mr-n7" data-scroll="true" data-height="300" data-mobile-height="200">

                            @foreach ($unseen_messages as $item)
                                <!--begin::Item-->
                            <div class="d-flex align-items-center mb-6">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40 symbol-light-primary mr-5">
                                        <div id="complain_image" class="image-input-wrapper mr-3" style="border-radius: 50%; height: 45px; width: 45px; background-image: url({{ asset('assets/images/' . $item->user_image) }});background-repeat: no-repeat;
                                            background-size: cover; ">
                                    </div>
                                </div>
                                <!--end::Symbol-->

                                <!--begin::Text-->
                                <div class="d-flex flex-column font-weight-bold">
                                    <a href="{{ route('admin_view_request', ['id' => $item->id]) }}" class="text-dark text-hover-primary mb-1 font-size-lg">{{$item->username}}</a>
                                    <span class="text-muted">{{$item->desc}}</span>
                                </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Item-->
                            @endforeach




                       </div>
                       <!--end::Scroll-->

                       <!--begin::Action-->
                       <div class="d-flex flex-center pt-7"><a href="#"
                               class="btn btn-light-primary font-weight-bold text-center">See
                               All</a></div>
                       <!--end::Action-->
                   </div>
                   <!--end::Tabpane-->




               </div>
               <!--end::Content-->
           </form>
       </div>
       <!--end::Dropdown-->
   </div>
   <!--end::Notifications-->
