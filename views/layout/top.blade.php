<div class="page-header">
    <div class="row gutters">
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 col-9">

            <!-- Search container start -->
            <div class="search-container">

                <!-- Toggle sidebar start -->
                <div class="toggle-sidebar" id="toggle-sidebar">
                    <i class="icon-menu"></i>
                </div>
                
                <div class="ui fluid category search">
                    <div class="ui icon input">
                        <input class="prompt" type="text" placeholder="Search">
                        <i class="search icon icon-search1"></i>
                    </div>
                    <div class="results"></div>
                </div>
                <!-- Search input group end -->

            </div>
            <!-- Search container end -->

        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-3">

            @php $jobs = JobsController::available(); @endphp
            <!-- Header actions start -->
            <ul class="header-actions">
                <li class="dropdown">
                    <a href="#" id="taskss" data-toggle="dropdown" aria-haspopup="true">
                        <i class="icon-check-square"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end lrg" aria-labelledby="taskss">
                        <div class="dropdown-menu-header">
                            Jobs &amp; Tasks ({{JobsController::count()}})
                        </div>
                        <div class="customScroll">
                            <ul class="activity">
                                @foreach ($jobs as $job)
                                    <li class="activity-list warning">
                                        <div class="detail-info">
                                            <p class="date">Portal Job</p>
                                            <p class="info">{{$job['created']}}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="p-3">
                                <a href="javascript:void(0)" class="btn btn-primary w-100 p-3 text-bold ">View all Jobs</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
                        <i class="icon-alert-triangle"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end lrg" aria-labelledby="notifications">
                        <div class="dropdown-menu-header">
                            Notifications (0)
                        </div>
                        <div class="customScroll">
                            <ul class="header-notifications">
                                											
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="/profile/view" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                        <span class="avatar">
                            <img src="/assets/img/user.svg" alt="User Avatar">
                            <span class="status busy"></span>
                        </span>
                    </a>
                </li>
            </ul>
            <!-- Header actions end -->

        </div>
    </div>
    <!-- Row end -->					

</div>