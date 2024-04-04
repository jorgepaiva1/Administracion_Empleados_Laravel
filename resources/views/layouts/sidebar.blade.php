<aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed;">
    <a href="{{ route('home') }}" class="brand-link">
        <span class="logo-mini logo-xs">Ad<b>U</b></span>
        <span class="brand-text font-weight-light logo-lg">{{ config('app.name') }}</span>

    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>

</aside>
