<ul>
    <li>
        <div class="menu-title">MAIN</div>
        <ul>
            <li>
                <a href="{{url('/dashboard')}}">
                    <div class="tooltip-item in-active" data-bs-toggle="tooltip" data-bs-placement="right" title=""
                        data-bs-original-title="Contact" aria-label="Contact"></div>

                    <span>
                        <i class="iconly-Curved-Home"></i>
                        <span>Dashboard</span>
                    </span>
                </a>
            </li>
            <li>
                <a href="javascript:;" class="submenu-item">
                    <span>
                        <i class="iconly-Curved-Home"></i>

                        <span>Dropdown</span>
                    </span>

                    <div class="menu-arrow"></div>
                </a>

                <ul class="submenu-children" data-level="1">
                    <li>
                        <a href="">
                            <span>Item</span>
                        </a>
                    </li>

                    <li>
                        <a href="">
                            <span>Item</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>

    <li>
        <div class="menu-title">Setting</div>
        <ul>
            <li>
                <a href="{{url('/dashboard/user')}}">
                    <div class="tooltip-item in-active" data-bs-toggle="tooltip" data-bs-placement="right" title=""
                        data-bs-original-title="Contact" aria-label="Contact"></div>
                    <span>
                        <i class="iconly-Curved-People"></i>
                        <span>User</span>
                    </span>
                </a>
            </li>
            <li>
                <a href="{{url('/dashboard/role')}}">
                    <div class="tooltip-item in-active" data-bs-toggle="tooltip" data-bs-placement="right" title=""
                        data-bs-original-title="Contact" aria-label="Contact"></div>
                    <span>
                        <i class="iconly-Light-Lock"></i>
                        <span>Role & Permission</span>
                    </span>
                </a>
            </li>
            <li>
                <a href="{{url('/dashboard/profile')}}">
                    <div class="tooltip-item in-active" data-bs-toggle="tooltip" data-bs-placement="right" title=""
                        data-bs-original-title="Contact" aria-label="Contact"></div>
                    <span>
                        <i class="iconly-Curved-User"></i>
                        <span>Profil</span>
                    </span>
                </a>
            </li>
        </ul>
    </li>
</ul>
