<nav class="sidebar-wrapper no-print">
    <div class="sidebar-tabs">
        <div class="nav" role="tablist" aria-orientation="vertical">
            <a href="#" class="logo">
                <img src="/assets/img/logo.svg" alt="Uni Pro Admin">
            </a>
            <a class="nav-link track" id="home-tab" data-bs-toggle="tab" href="#tab-tracking" role="tab" aria-controls="tab-tracking" aria-selected="true">
                <i class="icon-home2"></i>
                <span class="nav-link-text">Tracking</span>
            </a>
            <a class="nav-link portal" id="portal-tab" data-bs-toggle="tab" href="#tab-portal" role="tab" aria-controls="tab-portal" aria-selected="false">
                <i class="icon-box"></i>
                <span class="nav-link-text">Portal</span>
            </a>
            <a class="nav-link mngt" id="management-tab" data-bs-toggle="tab" href="#tab-management" role="tab" aria-controls="tab-management" aria-selected="false">
                <i class="icon-settings1"></i>
                <span class="nav-link-text">Management</span>
            </a>
            <a class="nav-link settings" href="/logout">
                <i class="icon-log-out1"></i>
                <span class="nav-link-text">Logout</span>
            </a>
        </div>
        

        <div class="tab-content">
                    
            <!-- Chat tab -->
            <div class="tab-pane fade show active" id="tab-tracking" role="tabpanel" aria-labelledby="home-tab">
                @include('layout.tabs.track')
            </div>
            
            <!-- Components tab -->
            <div class="tab-pane fade" id="tab-portal" role="tabpanel" aria-labelledby="portal-tab">
                @include('layout.tabs.portal')
            </div>
            
            <!-- Management tab -->
            <div class="tab-pane fade" id="tab-management" role="tabpanel" aria-labelledby="management-tab">
                @include('layout.tabs.mngt')
            </div>
        </div>
    </div>
</nav>