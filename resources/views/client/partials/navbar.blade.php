<nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('dashboard', []) }}">BANK SAMPAH</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link @if (@$title == 'dashboard') {{ 'active' }} @endif" aria-current="page"
                        href="{{ route('dashboard', []) }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if (@$title == 'depo') {{ 'active' }} @endif"
                        href="{{ route('depo', []) }}">Trash
                        Deposit</a>
                </li>
            </ul>
            <div class="d-flex items-center gap-2">
                <a href="{{ route('login', []) }}" class="btn btn-success btn-sm">Login</a>
            </div>
        </div>
    </div>
</nav>
