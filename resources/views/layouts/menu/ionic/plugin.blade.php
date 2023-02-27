<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-diamond"></i>
        <p>
            PLUGIN
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>

    <ul class="nav nav-treeview">
        @include('layouts.menu.ionic.self-defined')
        @include('layouts.menu.ionic.cordova')
        @include('layouts.menu.ionic.capacitor')

        <li class="nav-item">
            <a href="#" class="nav-link">
                <p>Moment JS</p>
            </a>
        </li>
    </ul>
</li>
