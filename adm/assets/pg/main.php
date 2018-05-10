<div ng-controller="HomeController">
<div class="jcon" ng-init="getRecords()"><h1>selamat datang di halaman admin</h1></div>
<div class="row layer">
    <div class="col-sm-4 kotak">
        <a href="#!admin">
        <div class="icon re" style="cursor:pointer">
            Data Admin
        </div>
        </a>
        <div class="icon re2">
            Kelola Data Admin, Terdapat {{ juma }} Akun
        </div>
    </div>
    <div class="col-sm-4 kotak">
        <a href="#!berita">
        <div class="icon ye" style="cursor:pointer">
            Data Berita
        </div>
        </a>
        <div class="icon ye2">
            Kelola Data Berita, Terdapat {{ jumb }} Berita
        </div>
    </div>
    <div class="col-sm-4 kotak">
        <a href="#!booking">
        <div class="icon gr" style="cursor:pointer">
            Data Booking
        </div>
        </a>
        <div class="icon gr2">
            Kelola Data Booking, {{ jumo }} Data Belum Terverifikasi
        </div>
    </div>
</div>

<div class="layer">
    <h3>Laporan Bulan {{ today | date : "MMMM"}}</h3>
    <div class="row layer">
        <div class="col-sm-3 kotak" ng-repeat="lap in lapb">
            <div class="icon bl2" style="cursor:pointer">Lapangan {{ lap.KODE_LAP }} </div>
            <div class="icon bl">
                {{ lap.jumlah }}x Dibooking <br>
                Pemasukan : Rp. {{ formatRp(lap.total) }}
            </div>
        </div>  
    </div>
    <div class="col-sm-12">
        <div class="icon bl2" style="cursor:pointer">Total Terdapat {{ getJum(lapb) }}x Booking </div>
        <div class="icon bl">
            Pemasukan : Rp. {{ formatRp(getTotal(lapb)) }}
        </div>
    </div>
</div>

<div class="layer">
    <h3>Laporan Tahun {{ today | date : "y" }}</h3>
    <div class="row layer">
        <div class="col-sm-3 kotak" ng-repeat="lap in lapt">
            <div class="icon bl2" style="cursor:pointer">Lapangan {{ lap.KODE_LAP }} </div>
            <div class="icon bl">
                {{ lap.jumlah }}x Dibooking <br>
                Pemasukan : Rp. {{ formatRp(lap.total) }}
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="icon bl2" style="cursor:pointer">Total Terdapat {{ getJum(lapt) }}x Booking </div>
        <div class="icon bl">
            Pemasukan : Rp. {{ formatRp(getTotal(lapt)) }}
        </div>
    </div>
</div>

<div class="layer">
    <h3>Laporan Keseluruhan</h3>
    <div class="row layer">
        <div class="col-sm-3 kotak" ng-repeat="lap in lapa">
            <div class="icon bl2" style="cursor:pointer">Lapangan {{ lap.KODE_LAP }} </div>
            <div class="icon bl">
                {{ lap.jumlah }}x Dibooking <br>
                Pemasukan : Rp. {{ formatRp(lap.total) }}
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="icon bl2" style="cursor:pointer">Total Terdapat {{ getJum(lapa) }}x Booking </div>
        <div class="icon bl">
            Pemasukan : Rp. {{ formatRp(getTotal(lapa)) }}
        </div>
    </div>
</div>

</div>