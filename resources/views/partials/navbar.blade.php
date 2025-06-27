<nav class="navbar navbar-expand-md sticky-top navbar-light bg-light border-bottom">
    <div class="container-fluid">
        <a class="navbar-brand me-5" href="#">Inv APP</a>
        <button class="btn ms-5 btn-toggle-sidebar" onclick="toggleSidebar()"><i class="fa-solid fa-bars"></i></button>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav d-flex align-items-center ">
                <li class="nav-item dropdown" style=font-size:13.5px>
                    <div id="search-box" class="me-4">
                        <form action="../fungsi/search.php" id="search-form" method="post" target="_top">
                            <input id="search-text" required name="key" placeholder="Enter dok name"
                                type="text" />
                            <button id="search-button" type="submit"><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                </li>
                <li class="nav-item dropdown" style=font-size:13.5px>
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <font color=orange>Welcome,</font> &nbsp; <font color=black>{namaUser}</font>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item text-dark" href="#form-edit-profil"><small><i
                                        class="fa-sharp fa-solid fa-unlock-keyhole me-2"></i> Edit Profil</small></a></li>
                        <li>
                            <form action="#logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item text-dark fs-7" href="#"><small><i
                                            class="fa-solid fa-right-from-bracket me-2"></i>Logout</small></button>
                        </li>
                        </form>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
