<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
    <div class="container-fluid d-flex flex-column p-0"><a
            class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="/">
            <div class="sidebar-brand-icon"><img style="height: 3rem;" src="https://cdn.frankerfacez.com/emoticon/428011/4" alt=""></div>
            <div class="sidebar-brand-text mx-3"><span>STONKS | POS</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item"><a class="nav-link {{ $__env->yieldContent('title') === 'Dashboard' ? 'active' : '' }}"
                    href="/"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
            </li>
            @if (Auth()->user()->role == 'admin')
                <li class="nav-item"><a
                        class="nav-link {{ $__env->yieldContent('title') === 'Category' ? 'active' : '' }}"
                        href="{{ route('category.index') }}"><i class="fas fa-tags"></i><span>Category</span></a></li>
                <li class="nav-item"><a
                        class="nav-link {{ $__env->yieldContent('title') === 'Product' ? 'active' : '' }}"
                        href="{{ route('product.index') }}"><i class="fas fa-box"></i></i><span>Product</span></a></li>
            @endif
            <hr class="sidebar-divider mt-2">
            <div class="sidebar-heading">Transaction</div>
            <li class="nav-item">
                <a class="nav-link {{ $__env->yieldContent('title') === 'Transaction' ? 'active' : '' }}"
                    href="{{ route('transaction.index') }}">
                    <i class="fas fa-cart-plus"></i>
                    <span>Transaction</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $__env->yieldContent('title') === 'Sale' ? 'active' : '' }}"
                    href="{{ route('sale.index') }}">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Sale</span>
                </a>
            </li>

            @if (Auth()->user()->role == 'admin')
                <hr class="sidebar-divider mt-2">
                <div class="sidebar-heading">Report</div>
                <li class="nav-item"><a
                        class="nav-link {{ $__env->yieldContent('title') === 'Report' ? 'active' : '' }}"
                        href="{{ route('report.index') }}"><i class="fas fa-file"></i><span>Report</span></a>
                </li>
                <hr class="sidebar-divider mt-2">
                <div class="sidebar-heading">Arrangement</div>
                <li class="nav-item"><a
                        class="nav-link {{ $__env->yieldContent('title') === 'User' ? 'active' : '' }}"
                        href="{{ route('user.index') }}"><i class="fas fa-user"></i><span>User</span></a>
                </li>
            @endif
            <hr class="sidebar-divider mt-2">
        </ul>
        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle"
                type="button"></button></div>
    </div>
</nav>
