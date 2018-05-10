<div ng-controller="MenuController" ng-init="getUser()">
<header>
    <div class="container">
    <div class="row">
        <div class="col-sm-5">
            <nav>
                <ul class="nav">
                    <li class="menu"><a href="#!main">Beranda</a></li>
                    <div class="menu"><a href="#!admin">Admin</a></div>
                    <div class="menu"><a href="#!berita">Berita</a></div>
                    <div class="menu"><a href="#!booking">Booking</a></div>
                </ul>
            </nav>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-5">
            <nav>
                <div class="menu"><a href="assets/pg/login/logout.php">Logout</a></div>    
                <div class="menu">{{user.nama}}</div>
            </nav>
        </div>
    <div>
    </div>
</header>
</div>