<style>
    .logo-container {
        display: flex;
        width: 180px;
        justify-content: center;
    }
</style>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo" style="background: #eceff1;margin-top:0">
        <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
            <div class="logo-container">
                <img src="{{asset("assets/img/basis.png")}}" style="width: 45% ">
            </div>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    <div class="menu-inner-shadow"></div>
    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{request()->routeIs('admin.dashboard')?'active':''}}">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                Dashboard
            </a>
        </li>
        <!--Menu Header-->
        @php
        $committee = request()->routeIs('committee.index');
        @endphp
        <li class="menu-item {{ $committee ? 'active' : '' }}">
            <a  href="{{route('committee.index' ,['status'=>'pending'])}}" class="menu-link">
                <i class="fa-solid fa-address-card me-2"></i>
                <div data-i18n="Payments">Standing And Forums</div>
            </a>
        </li>

    </ul>
</aside>
