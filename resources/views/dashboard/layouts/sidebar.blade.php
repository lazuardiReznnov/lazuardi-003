<nav
    id="sidebarMenu"
    class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse"
>
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a
                    class="nav-link {{ Request::is('/') ? 'active' : '' }} "
                    aria-current="page"
                    href="/"
                >
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file"></span>
                    Orders
                </a>
            </li>
        </ul>

        <h6
            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"
        >
            <span>UNIT MANAGEMENT</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a
                    class="nav-link {{ Request::is('dashboard/units*') ? 'active' : '' }}"
                    href="/dashboard/units"
                >
                    <span data-feather="grid"></span>
                    UNIT LIST
                </a>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link {{ Request::is('dashboard/unit/types*') ? 'active' : '' }}"
                    href="/dashboard/unit/types"
                >
                    <span data-feather="grid"></span>
                    TYPE UNIT LIST
                </a>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link {{ Request::is('dashboard/unit/models*') ? 'active' : '' }}"
                    href="/dashboard/unit/models"
                >
                    <span data-feather="grid"></span>
                    MODELS LIST
                </a>
            </li>
        </ul>

        <h6
            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"
        >
            <span>SPAREPART MANAGEMENT</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a
                    class="nav-link {{ Request::is('dashboard/sparepart/categories*') ? 'active' : '' }}"
                    href="/dashboard/sparepart/categorieParts"
                >
                    <span data-feather="grid"></span>
                    CATEGORY
                </a>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link {{ Request::is('dashboard/spareparts*') ? 'active' : '' }}"
                    href="/dashboard/spareparts"
                >
                    <span data-feather="grid"></span>
                    SPAREPART
                </a>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link {{ Request::is('dashboard/stocks*') ? 'active' : '' }}"
                    href="/dashboard/stocks"
                >
                    <span data-feather="grid"></span>
                    STOCK
                </a>
            </li>
        </ul>

        <h6
            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"
        >
            <span>MAINTENANCE MANAGEMENT</span>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a
                    class="nav-link {{ Request::is('dashboard/maintenance*') ? 'active' : '' }}"
                    href="/dashboard/maintenances"
                >
                    <span data-feather="grid"></span>
                    MAINTENANCE UNIT
                </a>
            </li>
        </ul>
        <h6
        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"
    >
        <span>MANAGEMENT DATA MANAGEMENT</span>
    </h6>
    <ul class="nav flex-column mb-2">
        <li class="nav-item">
            <a
                class="nav-link {{ Request::is('dashboard/owners*') ? 'active' : '' }}"
                href="/dashboard/owners"
            >
                <span data-feather="grid"></span>
                OWNERS
            </a>
        </li>
    </ul>
    </div>
</nav>
