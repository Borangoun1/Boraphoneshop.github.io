<!-- top navbar -->
<div class="container-fluid">
    <a class="navbar-brand" href="../srvc/upload/srvc.png" target="_blank">
        <a class="navbar-brand" href="index.html" id="logo"><span id="span1">E</span>Lectronic <span>Shop</span></a>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item ">
                <a class="nav-link hover-underline-animation pb-1 active" aria-current="page" href="./Sarch.php">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link hover-underline-animation pb-1 active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Category
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: rgb(0, 91, 228);">
                    <li><a class="dropdown-item" href="./catesamsung.php">Samsung Phone</a></li>
                    <li><a class="dropdown-item" href="./cateiphone.php">Iphone Phone</a></li>
                    <li><a class="dropdown-item" href="./cateoppo.php">Oppo</a></li>
                    <li><a class="dropdown-item" href="./catevivo.php">vivo</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link hover-underline-animation pb-1 active" href="./Sarch.php">Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link hover-underline-animation pb-1 active" href="./bar-container/about.php">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link hover-underline-animation pb-1 active" href="./bar-container/contact.php">Contact</a>
            </li>
        </ul>
        <form class="d-flex" action="?" method="POST" id="formSearch">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="name">
            <button class="btn btn-outline-light" type="submit" name="submit">Search</button>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>
        </form>
    </div>
</div>