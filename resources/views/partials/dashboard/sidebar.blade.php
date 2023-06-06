<ul>
    <li>
        <div class="menu-title">MAIN</div>
        <ul>
            <li>
                <a href="{{route('dashboard.index')}}" class="{{ \App\Helper\Url::url(route('dashboard.index')) ? 'active' : '' }}">
                    <div class="tooltip-item in-active" data-bs-toggle="tooltip" data-bs-placement="right" title=""
                        data-bs-original-title="Dashboard" aria-label="Dashboard"></div>
                    <span>
                        <i class="iconly-Curved-Home"></i>
                        <span>Dashboard</span>
                    </span>
                </a>
            </li>
            @can('crud-index')
            <li>
                <a href="{{route('dashboard.crud.index')}}" class="{{ \App\Helper\Url::url(route('dashboard.crud.index')) ? 'active' : '' }}">
                    <div class="tooltip-item in-active" data-bs-toggle="tooltip" data-bs-placement="right" title=""
                        data-bs-original-title="Crud" aria-label="Crud"></div>
                    <span>
                        <i class="iconly-Light-Document"></i>
                        <span>Crud</span>
                    </span>
                </a>
            </li>
            @endcan
            @can('blog-index')
            <li>
                <a href="javascript:;" class="submenu-item">
                    <span>
                        <i class="iconly-Light-Paper"></i>
                        <span>Blog</span>
                    </span>
                    <div class="menu-arrow"></div>
                </a>

                <ul class="submenu-children" data-level="1" style="display: {{ \App\Helper\Url::url(route('dashboard.kategori-blog.index')) || \App\Helper\Url::url(route('dashboard.blog.index')) ? 'block' : 'none' }}">
                    <li>
                        <a href="{{route('dashboard.kategori-blog.index')}}" class="{{ \App\Helper\Url::url(route('dashboard.kategori-blog.index')) ? 'active' : '' }}">
                            <span>Kategori</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('dashboard.blog.index')}}" class="{{ \App\Helper\Url::url(route('dashboard.blog.index')) ? 'active' : '' }}">
                            <span>Blog</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan
        </ul>
    </li>

    <li>
        <div class="menu-title">Setting</div>
        <ul>
            @can('user-index')
            <li>
                <a href="{{route('dashboard.user.index')}}" class="{{ \App\Helper\Url::url(route('dashboard.user.index')) ? 'active' : '' }}">
                    <div class="tooltip-item in-active" data-bs-toggle="tooltip" data-bs-placement="right" title=""
                        data-bs-original-title="User" aria-label="User"></div>
                    <span>
                        <i class="iconly-Curved-People"></i>
                        <span>User</span>
                    </span>
                </a>
            </li>
            @endcan
            @can('role-index')
            <li>
                <a href="{{route('dashboard.role.index')}}" class="{{ \App\Helper\Url::url(route('dashboard.role.index')) ? 'active' : '' }}">
                    <div class="tooltip-item in-active" data-bs-toggle="tooltip" data-bs-placement="right" title=""
                        data-bs-original-title="Role & Permission" aria-label="Role & Permission"></div>
                    <span>
                        <i class="iconly-Light-Lock"></i>
                        <span>Role & Permission</span>
                    </span>
                </a>
            </li>
            @endcan
            <!-- <li>
                <a href="{{route('dashboard.crud.index')}}">
                    <div class="tooltip-item in-active" data-bs-toggle="tooltip" data-bs-placement="right" title=""
                        data-bs-original-title="Contact" aria-label="Contact"></div>
                    <span>
                        <i class="iconly-Curved-User"></i>
                        <span>Profil</span>
                    </span>
                </a>
            </li> -->
        </ul>
    </li>
</ul>
