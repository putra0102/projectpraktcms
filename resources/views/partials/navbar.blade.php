<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="{{ route('kue.index') }}">Toko Kue</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-lg-2">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('kue.index') ? 'active fw-bold text-primary' : '' }}"
                        href="{{ route('kue.index') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('transaksi.form') ? 'active fw-bold text-primary' : '' }}"
                        href="{{ route('transaksi.form') }}">Transaksi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('kue.upload') ? 'active fw-bold text-primary' : '' }}"
                        href="{{ route('kue.upload') }}">Upload Foto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('form.cek.transaksi') ? 'active fw-bold text-primary' : '' }}"
                        href="{{ route('form.cek.transaksi') }}">Cek</a>
                </li>

                @auth
                    <li class="nav-item d-flex align-items-center">
                        <span class="nav-link text-success fw-semibold">
                            {{ Auth::user()->email }}
                        </span>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button class="nav-link btn btn-link text-danger" type="submit">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('login') ? 'active fw-bold text-primary' : '' }}"
                            href="{{ route('login') }}">Login/Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
