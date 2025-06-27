<div class="sidebar" id="sidebar">
    <div class="row no-gutters h-100">
        <div class="col bg-dark">
            {{-- <div class="row text-white">
                <div class="data pt-2 d-flex bg-black align-items-center pb-2" id="sidebar-user">
                    <div class="row text-white">
                <img src="{{ url('/private-image/' . 'admin1.png') }}">
                        <div class="">
                            <small></small>
                            <br>
                            <small class="text-secondary"></small>
                        </div>
            </div>
                </div>
            </div> --}}

            <ul class="nav flex-column mt-3">
                <li class="nav-item">
                    <div class="ms-3" style="margin-bottom:12px;text-decoration:none; color:#C0BFBF;font-size:12px;">
                        Navigation &nbsp;&nbsp;<i class="fa-solid fa-paper-plane fa-xs"></i>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/dashboard">
                        <i class="icon-dashboard me-3"></i>Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/produk">
                        <i class="fa-solid fa-box-open me-3"></i>Produk
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/lokasi">
                        <i class="fa-solid fa-location-dot me-3"></i>Lokasi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/produk-lokasi">
                        <i class="fa-solid fa-warehouse me-3"></i>Produk Lokasi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/mutasi">
                        <i class="fa-solid fa-right-left me-3"></i>Mutasi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="logout()">
                        <i class="fa-solid fa-right-from-bracket me-3"></i>Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="overlay" id="overlay"></div>
