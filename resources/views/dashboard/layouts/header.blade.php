<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ route('dashboard') }}"> <img
                    src="{{ asset('assets/dashboard/img/290018488_1110770999821005_2691879510461168954_n.png') }}"
                    alt=""></a>
        </div>
    </div>
    <div class="header-text">
        <a href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i>Dashboard</a>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li class="management">Management</li>
                    <li>
                                                                            {{-- show --}}
                        <a href="{{ route('service') }}" data-bs-toggle="collapse" data-bs-target="#Service"
                            aria-controls="Service" aria-expanded="true"><i class="bi bi-graph-up"></i><span>Service
                            </span>
                        </a>

                        <ul class="collapse  " id="Service">
                            <li><a href="{{ route('service')}}"> Service</a></li>
                            <li><a href="{{ route('serviceOne')}}"> Service 1</a></li>
                            <li><a href="{{ route('serviceTwo')}}"> Service 2</a></li>
                        </ul>
                    </li>
                    <li id="user">
                        <a href="{{ route('users') }}" aria-expanded="true"><i
                                class="bi bi-people"></i><span>Users</span></a>
                    </li>
                    <li>
                                                                            {{-- show --}}
                        <a href="{{ route('order') }}" data-bs-toggle="collapse" data-bs-target="#Orders"
                            aria-controls="Orders" aria-expanded="true" <i class="bi bi-cart"></i><span>Orders </span>
                        </a>
                        <ul class="collapse " id="Orders">
                            <li><a href="{{ route('order')}}">Order </a></li>
                            <li><a href="{{ route('subscriber')}}">Subscriber </a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" data-bs-toggle="collapse" data-bs-target="#settings" aria-controls="settings"
                            aria-expanded="true"><i class="bi bi-file-lock"></i><span>Settings </span>
                        </a>
                        <ul class="collapse" id="settings">
                            <li><a href="{{ route('frequencys') }}">Frequency </a></li>
                            <li><a href="{{ route('taxSystem') }}">Tax System </a></li>
                            <li><a href="#">Languages </a></li>
                            <li><a href="#">E-mail Settings </a></li>
                        </ul>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</div>
