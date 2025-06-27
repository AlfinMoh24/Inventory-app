@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mt-2 mb-4">
        <h4><i class="icon-dashboard me-1"></i> Dashboard</h4>
        <div class="btn btn-primary font-monospace fs-7 fw-bold">
            <i class="fa-solid fa-calendar-day me-1"></i> {{ date('j F Y') }}
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-dashboard">
                <div class="card-body bg-info d-flex justify-content-between align-items-center text-white">
                    <div>
                        <h6 class="card-title">Storage</h6>
                        <h4 id="lokasi-count">-</h4>
                        <small>Ruang Penyimpanan</small>
                    </div>
                    <i class="fa-brands fa-dropbox"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-dashboard">
                <div class="card-body bg-warning d-flex justify-content-between align-items-center text-white">
                    <div>
                        <h6 class="card-title">Produk</h6>
                        <h4 id="produk-count">-</h4>
                        <small>Total Produk</small>
                    </div>
                    <i class="bi bi-folder-fill"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-dashboard">
                <div class="card-body bg-danger d-flex justify-content-between align-items-center text-white">
                    <div>
                        <h6 class="card-title">User</h6>
                        <h4 id="user-count">-</h4>
                        <small>Total User</small>
                    </div>
                    <i class="fa-solid fa-user"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-dashboard">
                <div class="card-body bg-success d-flex justify-content-between align-items-center text-white">
                    <div>
                        <h6 class="card-title">Mutasi</h6>
                        <h4 id="mutasi-count">-</h4>
                        <small>Transaksi Mutasi</small>
                    </div>
                    <i class="bi bi-card-checklist"></i>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const token = localStorage.getItem("token");

            Promise.all([
                fetch('/api/lokasi', { headers: { "Authorization": "Bearer " + token, "Accept": "application/json" }}).then(res => res.json()),
                fetch('/api/produk', { headers: { "Authorization": "Bearer " + token, "Accept": "application/json" }}).then(res => res.json()),
                fetch('/api/users', { headers: { "Authorization": "Bearer " + token, "Accept": "application/json" }}).then(res => res.json()),
                fetch('/api/mutasi', { headers: { "Authorization": "Bearer " + token, "Accept": "application/json" }}).then(res => res.json())
            ]).then(([lokasi, produk, users, mutasi]) => {
                document.getElementById("lokasi-count").innerText = lokasi.data?.length || 0;
                document.getElementById("produk-count").innerText = produk.data?.length || 0;
                document.getElementById("user-count").innerText = users.data?.length || 0;
                document.getElementById("mutasi-count").innerText = mutasi.data?.length || 0;
            }).catch(err => {
                console.error(err);
                alert("Gagal memuat dashboard!");
            });
        });
    </script>
@endsection
