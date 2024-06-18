@extends('layouts.app')

@section('title', __('Curug Pletuk'))

@section('content')
<div class="hero">
    <section class="home-slider owl-carousel">
        <div class="slider-item" style="background-image:url(images/curug.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-center">
                    <div class="col-md-6 ftco-animate">
                        <div class="text">
                            <h2>Nikmati Liburan Anda</h2>
                            <h1 class="mb-3">Temukan Petualangan Baru Di Destinasi Wisata Curug Pletuk</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Fasilitas</span>
                <h2 class="mb-4">Fasilitas Curug Pletuk</h2>
            </div>
        </div>
        <div class="row d-flex">
            <div class="col-md pr-md-1 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services py-4 d-block text-center">
                    <div class="d-flex justify-content-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <img src="images/mosque.png" style="max-width: 70px;" alt="">
                        </div>
                    </div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Mushola</h3>
                    </div>
                </div>
            </div>
            <div class="col-md px-md-1 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services active py-4 d-block text-center">
                    <div class="d-flex justify-content-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <img src="images/cup-of-drink.png" style="max-width: 65px;" alt="">
                        </div>
                    </div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Coffe Shop</h3>
                    </div>
                </div>
            </div>
            <div class="col-md px-md-1 d-flex align-sel Searchf-stretch ftco-animate">
                <div class="media block-6 services py-4 d-block text-center">
                    <div class="d-flex justify-content-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <img src="images/garden.png" style="max-width: 65px;" alt="">
                        </div>
                    </div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Taman</h3>
                    </div>
                </div>
            </div>
            <div class="col-md px-md-1 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services py-4 d-block text-center">
                    <div class="d-flex justify-content-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <img src="images/toilet.png" style="max-width: 60px;" alt="">
                        </div>
                    </div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Toilet</h3>
                    </div>
                </div>
            </div>
            <div class="col-md pl-md-1 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services py-4 d-block text-center">
                    <div class="d-flex justify-content-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <img src="images/parked-car.png" style="max-width: 70px;" alt="">
                        </div>
                    </div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Parkir</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-wrap-about ftco-no-pt ftco-no-pb" id="tentang">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-7 order-md-last d-flex">
                <div class="img img-1 mr-md-2 ftco-animate"
                    style="background-image: url(images/air\ terjun1.jpeg);"></div>
                <div class="img img-2 ml-md-2 ftco-animate"
                    style="background-image: url(images/IMG_20240504_094923.jpg);"></div>
            </div>
            <div class="col-md-5 wrap-about pb-md-3 ftco-animate pr-md-5 pb-md-5 pt-md-4">
                <div class="heading-section mb-4 my-5 my-md-0">
                    <span class="subheading">Tentang Curug Pletuk</span>
                    <h2 class="mb-4">Objek Wisata Alam & Air Terjun</h2>
                </div>
                <p style="text-align: justify;">Curug Pletuk merupakan sebuah tempat wisata alam yang terletak di
                    Desa Jatisari, Pesangkalan, Kecamatan Pangedongan, Kabupaten Banjarnegara. Hanya sekitar 9 KM
                    dari pusat kota Banjarnegara. Jawa Tengah. Curug Pletuk mulai beroperasi pada tahun 2008. Curug
                    Pletuk terdapat sebuah air terjun yang menghadirkan pemandangan alam yang cantik dan menyegarkan
                    dengan memiliki ketinggian air terjun mencapai lebih dari 150 meter.</p>
                <p><a href="#paket" class="btn btn-secondary rounded">Lihat Paket Wisata di Curug Pletuk</a></p>
            </div>
        </div>
    </div>
</section>

<section class="testimony-section">
    <div class="container">
        <div class="row no-gutters ftco-animate justify-content-center">
            <div class="col-md-5 d-flex">
                <div class="testimony-img aside-stretch-2" style="background-image: url(images/camping.jpg);"></div>
            </div>
            <div class="col-md-7 py-5 pl-md-5">
                <div class="py-md-5">
                    <div class="heading-section ftco-animate mb-4">
                        <span class="subheading">Testimoni</span>
                        <h2 class="mb-0">Pengunjung Curug Pletuk</h2>
                    </div>
                    <div class="carousel-testimony owl-carousel ftco-animate">
                        <div class="item">
                            <div class="testimony-wrap pb-4">
                                <div class="text">
                                    <p class="mb-4">Tempatnya bersih, nyaman dan bagus. Pemandangannya yang cantik banget, bisa bbq-an juga. 
                                    Ada banyak spot buat duduk santai sambil ngopi atau ngobrol. Pelayanan ramah, ada mushola, ada kafe tempat ngopi juga.</p>
                                </div>
                                <div class="d-flex">
                                    <div class="user-img" style="background-image: url(images/person_1.jpg)">
                                    </div>
                                    <div class="pos ml-3">
                                        <p class="name">Desty Ristiani</p>
                                        <span class="position">Pengunjung</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap pb-4">
                                <div class="text">
                                    <p class="mb-4">Tempatnya bagus, udara sejuk, banyak pohon rindang. Rekomendasi wisata bila lagi liburan ke Banjarnegara. 
                                        Air terjunya indah dan deras airnya, ada kolam renang juga untuk anak2. Toiletnya bersih, ada musholah, gazebo buat ngadem.</p>
                                </div>
                                <div class="d-flex">
                                    <div class="user-img" style="background-image: url(images/person_2.jpg)">
                                    </div>
                                    <div class="pos ml-3">
                                        <p class="name">Ilhamar</p>
                                        <span class="position">Pengunjung</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap pb-4">
                                <div class="text">
                                    <p class="mb-4">Ada cafenya, ada kolam renangnya. Dengan membayar 15rb sudah dapat free minuman chocholatos panas dan free masuk kolam renang. 
                                    Akses menuju sana juga sudah bagus karena full aspal. Tempat ini keren banget untuk melepas penat.</p>
                                </div>
                                <div class="d-flex">
                                    <div class="user-img" style="background-image: url(images/person_3.jpg)">
                                    </div>
                                    <div class="pos ml-3">
                                        <p class="name">Marheni Dwi</p>
                                        <span class="position">Pengunjung</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap pb-4">
                                <div class="text">
                                    <p class="mb-4">Curug Pletuk sekarang ditata semakin indah dan Instagramable. Prasarana nya juga semakin lengkap. Tangga sudah semakin baik sehingga wisatawan 
                                        bisa mendekati air terjun semakin dekat. Kebersihan juga terpelihara.</p>
                                </div>
                                <div class="d-flex">
                                    <div class="user-img" style="background-image: url(images/person_4.jpg)">
                                    </div>
                                    <div class="pos ml-3">
                                        <p class="name">Brave Coolinner</p>
                                        <span class="position">Pengunjung</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light" id="paket">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Paket Wisata</span>
                <h2>Kami Menyediakan Beberapa Paket Wisata Terbaik</h2>
            </div>
        </div>
        <div class="row d-flex">
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="#outbond" class="block-20 rounded"
                        style="background-image: url('images/outbond.jpg');">
                    </a>
                    <div class="text mt-3 text-center">
                        <h3 class="heading"><a href="#outbond">Wisata Outbond Curug Pletuk</a></h3>
                        <p style="text-align: justify;">Outbound adalah kegiatan yang dilakukan di luar ruangan dengan tujuan untuk membangun
                            kerjasama tim, mengembangkan keterampilan kepemimpinan dan meningkatkan kepercayaan
                            diri.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="#camping" class="block-20 rounded"
                        style="background-image: url('images/camp.jpg');">
                    </a>
                    <div class="text mt-3 text-center">
                        <h3 class="heading"><a href="#camping">Wisata Camping Curug Pletuk</a></h3>
                        <p style="text-align: justify;">Berkemah di Curug Pletuk adalah pengalaman yang memperkaya jiwa dan menyatukan dengan
                            alam. Di tengah keindahan alam pegunungan yang hijau dan segar, pengunjung diajak untuk
                            merasakan kehidupan yang sederhana dan dekat dengan alam.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                    <a href="#susur-sungai" class="block-20 rounded"
                        style="background-image: url('images/susur sungai.jpg');">
                    </a>
                    <div class="text mt-3 text-center">
                        <h3 class="heading"><a href="#susur-sungai">Wisata Susur Sungai Curug Pletuk</a></h3>
                        <p style="text-align: justify;">Susur sungai di Curug Pletuk adalah petualangan menyusuri aliran air yang jernih dan
                            segar di tengah-tengah keindahan alam yang asri dan memukau. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section" id="outbond">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="single-slider-resto mb-4 mb-md-0 owl-carousel">
                    <div class="item">
                        <div class="resto-img rounded"
                            style="background-image: url(images/outbonds.jpg); background-size: auto;"></div>
                    </div>
                    <div class="item">
                        <div class="resto-img rounded" style="background-image: url(images/outbound1.jpg);">
                        </div>
                    </div>
                    <div class="item">
                        <div class="resto-img rounded"
                            style="background-image: url(images/Outbound2.jpg);">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pl-md-5">
                <div class="heading-section mb-4 my-5 my-md-0">
                    <span class="subheading">Paket Wisata</span>
                    <h2 class="mb-4">Outbond / Min. 20 orang</h2>
                </div>
                <p style="text-align: justify;">Paket Standar : Rp. 80.000 /Orang. Tiket masuk wisata, Venue outdoor, Welcome drink (teh/kopi),
                    Snack box (isi 3 macam), Program 3 game non wahana, Fasilitator dan crew, Sound sistem, Banner
                    ukuran 1x3 meter, Dokumentasi foto soft file.</p>
                <p style="text-align: justify;">Paket Gold : Rp. 100.000 /Orang. Tiket masuk wisata, Venue outdoor, Welcome drink (teh/kopi),
                    Makan siang (nasi box), Program 3 game non wahana, Fasilitator dan crew, Sound sistem, Banner
                    ukuran 1x3 meter, Dokumentasi foto soft file.</p>
                <p style="text-align: justify;">Paket Platinum : Rp. 120.000 /Orang. Tiket masuk wisata, Venue outdoor, Welcome drink (teh/kopi),
                    Snack box (isi 3 macam), Makan siang (nasi box), Program 3 game non wahana, Fasilitator dan
                    crew, Sound sistem, Banner ukuran 1x3 meter, Tepung warna, Dokumentasi foto soft file dan video
                    edit (darat).
                </p>
                <!-- ORI <p><a href="#" class="btn btn-secondary rounded">Booking sekarang</a></p> -->

                <p class="{{ $title == 'Booking' ? 'active' : '' }}">
                  <a href="/booking" class="btn btn-secondary rounded">Booking Sekarang </a>
                </p>

            </div>
        </div>
    </div>
</section>
<section class="ftco-section  bg-light" id="camping">
    <div class="container">
        <div class="row">

            <div class="col-md-6 pl-md-5">
                <div class="heading-section mb-4 my-5 my-md-0">
                    <span class="subheading">Paket Wisata</span>
                    <h2 class="mb-4">Camping 4 orang/pack </h2>
                </div>
                <p style="text-align: justify;">Paket Basic : Rp. 200.000 sudah termasuk : Tenda, Matras, Sleeping Bag, Peralatan Api Unggun,
                    Free Parkir, Free All Access Wisata.</p>
                <p style="text-align: justify;">Paket Add On Camp : Rp. 350.000 sudah termasuk : Tenda, Matras, Sleeping Bag, Peralatan Api Unggun, Paket BBQ, Free Parkir, Free All Access Wisata.</p>
                <!-- ORI BUTTON <p><a href="#" class="btn btn-secondary rounded">Booking sekarang</a></p> -->

                <p class="{{ $title == 'Booking' ? 'active' : '' }}">
                  <a href="/booking" class="btn btn-secondary rounded">Booking Sekarang</a>
                </p>

            </div>
            <div class="col-md-6">
                <div class="single-slider-resto mb-4 mb-md-0 owl-carousel">
                    <div class="item">
                        <div class="resto-img rounded" style="background-image: url(images/camping2.jpeg);"></div>
                    </div>
                    <div class="item">
                        <div class="resto-img rounded" style="background-image: url(images/camping1.png);"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section Outbond" id="susur-sungai">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="single-slider-resto mb-4 mb-md-0 owl-carousel">
                    <div class="item">
                        <div class="resto-img rounded" style="background-image: url(images/susur.jpg);"></div>
                    </div>
                    <div class="item">   
                    <div class="resto-img rounded" style="background-image: url(images/OIPS.jpeg);"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pl-md-5">
                <div class="heading-section mb-4 my-5 my-md-0">
                    <span class="subheading">Paket Wisata</span>
                    <h2 class="mb-4">Susur Sungai / Min. 5 orang</h2>
                </div>
                <p style="text-align: justify;">Menyusuri Aliran Sungai Curug Pletuk Rp. 60.000 / Orang (Min. 5 Orang)
                    Sudah termasuk : Kelapa Muda (bakar), Snack, Pemandu / Guide, Kamar Mandi, Mushola, Dokumentasi, Team Resque, Gazebo, Asuransi.
                    </p>

                <!-- ORI BUTTON <p><a href="#" class="btn btn-secondary rounded">Booking sekarang</a></p> -->
                
                <p class="{{ $title == 'Booking' ? 'active' : '' }}">
                  <a href="/booking" class="btn btn-secondary rounded">Booking Sekarang</a>
                </p>


            </div>
        </div>
    </div>
</section>

<section class="instagram">
    <div class="container-fluid">
        <div class="row no-gutters justify-content-center pb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Galery</span>
                <h2><span>Curug Pletuk</span></h2>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-sm-12 col-md ftco-animate">
                <a href="images/IMG_20231008_110018.jpg" class="insta-img image-popup"
                    style="background-image: url(images/IMG_20231008_110018.jpg);">
                    <div class="icon d-flex justify-content-center">
                        <span class="icon-instagram align-self-center"></span>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md ftco-animate">
                <a href="images/IMG_20240504_103322.jpg" class="insta-img image-popup"
                    style="background-image: url(images/IMG_20240504_103322.jpg);">
                    <div class="icon d-flex justify-content-center">
                        <span class="icon-instagram align-self-center"></span>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md ftco-animate">
                <a href="images/IMG_20231008_113553.jpg" class="insta-img image-popup"
                    style="background-image: url(images/IMG_20231008_113553.jpg);">
                    <div class="icon d-flex justify-content-center">
                        <span class="icon-instagram align-self-center"></span>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md ftco-animate">
                <a href="images/IMG_20231008_113558.jpg" class="insta-img image-popup"
                    style="background-image: url(images/IMG_20231008_113558.jpg);">
                    <div class="icon d-flex justify-content-center">
                        <span class="icon-instagram align-self-center"></span>
                    </div>
                </a>
            </div>
            <div class="col-sm-12 col-md ftco-animate">
                <a href="images/IMG_20240504_094923.jpg" class="insta-img image-popup"
                    style="background-image: url(images/IMG_20240504_094923.jpg);">
                    <div class="icon d-flex justify-content-center">
                        <span class="icon-instagram align-self-center"></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection