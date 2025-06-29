<div class="shadow" id="sidebar-wrapper-L" style="padding: 0;">
    <!-- Main Navigation -->
    <ul class="list-unstyled" style="margin: 0; padding: 0;">
        <!-- Dashboard -->
        <li class="card-header-accordion-L" style="padding: 10px; display: flex; align-items: center;">
            <i class="fa fa-dashboard icon-accordion" style="margin-right: 15px;"></i>
            <a class="button-accordion" href="/dashboard">Dashboard</a>
        </li>
    </ul>

    <!-- Setup Data Section with Dropdown -->
    <div id="accordion-setup-data" style="padding: 0;">
        <div class="card card-accordion-L border-0" style="padding: 0;">
            <!-- Header -->
            <div class="card-header card-header-accordion-L" role="tab"
                style="display: flex; align-items: center; padding: 10px;">
                <i class="fa fa-pencil-square-o icon-accordion" style="margin-right: 15px;"></i>
                <a class="button-accordion" data-toggle="collapse" href="#setup-data-menu" aria-expanded="false">
                    Setup Data
                </a>
                <i class="fa fa-caret-down float-right" style="color: #938d76; margin-left: auto;"></i>
            </div>
            <!-- Collapsible Menu -->
            <div id="setup-data-menu" class="collapse smsp-sub-sidebar" role="tabpanel" style="padding: 0;">
                <ul class="list-unstyled" style="margin: 0; padding: 0;">
                    <!-- RAM Data -->
                    <li class="smsp-text-sidebar" style="padding: 8px; display: flex; align-items: center;">
                        <img class="img-fluid smsp-icon-sidebar" src="/assets/img/transparent-ram.png"
                            style="margin-right: 15px;">
                        <a href="/dashboard/rams"><span style="color: rgb(98, 95, 95);">Data RAM</span></a>
                    </li>
                    <!-- Processor Data -->
                    <li class="smsp-text-sidebar" style="padding: 8px; display: flex; align-items: center;">
                        <img class="img-fluid smsp-icon-sidebar" src="/assets/img/procesor.png"
                            style="margin-right: 15px;">
                        <a href="/dashboard/prosesors"><span style="color: rgb(98, 95, 95);">Data Processor</span></a>
                    </li>
                    <!-- Laptop Data -->
                    <li class="smsp-text-sidebar" style="padding: 8px; display: flex; align-items: center;">
                        <img class="img-fluid smsp-icon-sidebar" src="/assets/img/laptop.png"
                            style="margin-right: 15px;">
                        <a href="/dashboard/laptops"><span style="color: rgb(98, 95, 95);">Data Laptop</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- User Section -->
    {{-- <ul class="list-unstyled" style="margin: 0; padding: 0;">
        <li class="card-header-accordion-L" style="padding: 10px; display: flex; align-items: center;">
            <i class="fa fa-user icon-accordion" style="margin-right: 18px;"></i>
            <a class="button-accordion" href="data_admin.html">User</a>
        </li>
    </ul> --}}
</div>
