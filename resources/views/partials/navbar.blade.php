<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-warning" href="{{ route('kue.index') }}">
            🍞 RotiBudi
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('kue.index') }}">Beranda</a>
                </li>
                 <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('transaksi.form') ? 'active' : '' }}" href="{{ route('transaksi.form') }}">
                Transaksi
            </a>
        </li>
            </ul>
        </div>
    </div>
</nav>
