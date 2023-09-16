<nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard', []) }}">BANK SAMPAH</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                {{-- <li class="nav-item">
                    <a class="nav-link @if (@$title == 'dashboard') {{ 'active' }} @endif" aria-current="page"
                        href="{{ route('admin.dashboard', []) }}">Dashboard</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link @if (@$title == 'type') {{ 'active' }} @endif"
                        href="{{ route('admin.type', []) }}">Trash
                        Type</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (@$title == 'category') {{ 'active' }} @endif"
                        href="{{ route('admin.category', []) }}">Trash
                        Category</a>
                </li>
            </ul>
            <div class="d-flex items-center gap-2">
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">{{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-light">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            @method('post')
                            <button type="submit" name="submit" class="btn">Logout</button>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
