{{--
    * ausbilder.org - the free course management and planning software.
    * Copyright (C) 2020 Holger Schmermbeck & others (see the AUTHORS file)
    *
    * This program is free software: you can redistribute it and/or modify
    * it under the terms of the GNU Affero General Public License as published
    * by the Free Software Foundation, either version 3 of the License, or
    * (at your option) any later version.
    *
    * This program is distributed in the hope that it will be useful,
    * but WITHOUT ANY WARRANTY; without even the implied warranty of
    * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    * GNU Affero General Public License for more details.
    *
    * You should have received a copy of the GNU Affero General Public License
    * along with this program.  If not, see <https://www.gnu.org/licenses/>.
--}}

<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('img/favicons/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('img/favicons/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/favicons/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/favicons/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/favicons/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/favicons/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('img/favicons/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/favicons/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicons/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('img/favicons/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/favicons/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('img/favicons/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('img/favicons/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <meta name="description" content="@yield('metadescription', __('metadescription.general', ['name' => 'ausbilder.org']))"/>

    <title>@yield('title', 'ausbilder.org')</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('home') }}" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>

        {{--
        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
        --}}

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-mg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">{{ __('no notifications') }}</span>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile') }}">
                    <i class="fas fa-address-card"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            @include('layouts.language-dropdown')
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('home') }}" class="brand-link">
            <img src="/img/logo_128.png" alt="ausbilder.org Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light"><b>ausbilder.org</b></span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('img/logo_128.png') }}" class="img-circle elevation-2" alt="Company Image">
                </div>
                <div class="info">
                    <a href="{{ route('company-change') }}" class="d-block">{{ session('company') ?? __('no company selected') }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-flat" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link {{ (Request::is(LaravelLocalization::getCurrentLocale() . '/home') ? 'active' : '') }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Home
                                {{-- <span class="right badge badge-danger">New</span> --}}
                            </p>
                        </a>
                    </li>
                    @if(session('company'))
                        <li class="nav-item has-treeview
                            {{
                                (Request::is(LaravelLocalization::getCurrentLocale() . '/course')
                                    || Request::is(LaravelLocalization::getCurrentLocale() . '/course/*')
                                ? 'menu-open' : '')
                            }}
                                ">
                            <a href="#" class="nav-link
                                {{
                                    (Request::is(LaravelLocalization::getCurrentLocale() . '/course')
                                        || Request::is(LaravelLocalization::getCurrentLocale() . '/course/*')
                                    ? 'active' : '')
                                }}
                            ">
                                <i class="nav-icon fas fa-graduation-cap"></i>
                                <p>
                                    {{ __('courses') }}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            @permission('course.add', session('company_id'))
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('course.create') }}" class="nav-link
                                            {{
                                                (Request::is(LaravelLocalization::getCurrentLocale() . '/course/create')
                                                ? 'active' : '')
                                            }}
                                        ">
                                            <i class="fas fa-plus-circle"></i>
                                            <p>{{ __('add course') }}</p>
                                        </a>
                                    </li>
                                </ul>
                            @endpermission
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('course.overview') }}" class="nav-link
                                        {{
                                            (Request::is(LaravelLocalization::getCurrentLocale() . '/course')
                                                || Request::is(LaravelLocalization::getCurrentLocale() . '/course/old')
                                                || Request::is(LaravelLocalization::getCurrentLocale() . '/course/*/show')
                                            ? 'active' : '')
                                        }}
                                    ">
                                        <i class="fas fa-table"></i>
                                        <p>{{ __('courses') }}</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview
                            {{
                                (Request::is(LaravelLocalization::getCurrentLocale() . '/trainer*')
                                || Request::is(LaravelLocalization::getCurrentLocale() . '/permission*')
                                ? 'menu-open' : '')
                            }}
                            ">
                            <a href="#" class="nav-link
                                {{
                                    (Request::is(LaravelLocalization::getCurrentLocale() . '/trainer*')
                                    || Request::is(LaravelLocalization::getCurrentLocale() . '/permission*')
                                    ? 'active' : '')
                                }}
                            ">
                                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                                <p>
                                    {{ __('trainer') }}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            @permission('trainer.add', session('company_id'))
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('trainer.create') }}" class="nav-link {{ (Request::is(LaravelLocalization::getCurrentLocale() . '/trainer/create') ? 'active' : '') }}">
                                            <i class="fas fa-user-plus"></i>
                                            <p>{{ __('add trainer') }}</p>
                                        </a>
                                    </li>
                                </ul>
                            @endpermission
                            @permission(['trainer.details', 'permissions.edit'], session('company_id'))
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('trainer.show') }}" class="nav-link
                                        {{
                                            (Request::is(LaravelLocalization::getCurrentLocale() . '/trainer')
                                            || Request::is(LaravelLocalization::getCurrentLocale() . '/permission*')
                                            ? 'active' : '')
                                        }}
                                        ">
                                            <i class="fas fa-users"></i>
                                            <p>{{ __('trainer') }}</p>
                                        </a>
                                    </li>
                                </ul>
                            @endpermission
                        </li>
                    @endif
                    <li class="nav-item has-treeview {{ (Request::is(LaravelLocalization::getCurrentLocale() . '/company*')
                        || Request::is(LaravelLocalization::getCurrentLocale() . '/course-types*')
                        || Request::is(LaravelLocalization::getCurrentLocale() . '/price*') ? 'menu-open' : '') }}"
                    >
                        <a href="#" class="nav-link {{
                            (Request::is(LaravelLocalization::getCurrentLocale() . '/company*')
                            || Request::is(LaravelLocalization::getCurrentLocale() . '/course-types*')
                            || Request::is(LaravelLocalization::getCurrentLocale() . '/price*') ? 'active' : '')
                        }}">
                            <i class="nav-icon far fa-building"></i>
                            <p>
                                {{ __('Company') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('company-change') }}" class="nav-link {{
                                    (Request::is(LaravelLocalization::getCurrentLocale() . '/company/change') ? 'active' : '')
                                }}">
                                    <i class="fas fa-exchange-alt"></i>
                                    <p>{{ __('change company') }}</p>
                                </a>
                            </li>
                        </ul>
                        @if(session('company'))
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('company.show') }}" class="nav-link {{
                                        (Request::is(LaravelLocalization::getCurrentLocale() . '/company') ? 'active' : '')
                                    }}">
                                        <i class="fas fa-pen"></i>
                                        <p>{{ __('company details') }}</p>
                                    </a>
                                </li>
                            </ul>
                        @endif
                        @permission('course-types.edit', session('company_id'))
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('course-types.show') }}" class="nav-link {{
                                        (Request::is(LaravelLocalization::getCurrentLocale() . '/course-types') ? 'active' : '')
                                    }}">
                                        <i class="fas fa-graduation-cap"></i>
                                        <p>{{ __('course types') }}</p>
                                    </a>
                                </li>
                            </ul>
                        @endpermission
                        @permission('price.edit', session('company_id'))
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                {{--    <a href="{{ route('price.overview') }}" class="nav-link {{
                                        (Request::is(LaravelLocalization::getCurrentLocale() . '/price*') ? 'active' : '')
                                    }}"> --}}
                                    <a href="#" class="nav-link {{
                                        (Request::is(LaravelLocalization::getCurrentLocale() . '/price*') ? 'active' : '')
                                    }}">
                                        <i class="fas fa-coins"></i>
                                        <p>{{ __('prices') }} <span class="right badge badge-danger">coming soon</span></p>
                                    </a>
                                </li>
                            </ul>
                        @endpermission
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-balance-scale-left"></i>
                            <p>
                                {{ __('Legal') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('imprint') }}" class="nav-link">
                                    <i class="fas fa-balance-scale"></i>
                                    <p>{{ __('Imprint') }}</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('data-protection') }}" class="nav-link">
                                    <i class="fas fa-user-secret"></i>
                                    <p>{{ __('Data protection') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">@yield('site_title', 'ausbilder.org')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                                @section('breadcrumb')
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Starter Page</li>
                                @show
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            @yield('content')
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('layouts.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script src="{{ asset('js/app.js') }}"></script>

@yield('js')

</body>
</html>
