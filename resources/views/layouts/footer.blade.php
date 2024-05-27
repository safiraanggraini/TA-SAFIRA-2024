
<footer class="ftco-footer ftco-section img" style="background-image: url(images/bg_4.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Curug Pletuk</h2>
                    <p>Curug Pletuk adalah sebuah objek wisata alam yang terletak di Desa Jatisari, Pesangkalan, Kecamatan Pangedongan, Kabupaten Banjarnegara. Tempat ini menawarkan pemandangan alam yang indah dan menyegarkan.</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a target="_blank" href="https://youtube.com/@pletukofficial8590?si=QbKVxHtf3oVFXLNQ"><span class="icon-youtube"></span></a></li>
                        <li class="ftco-animate"><a target="_blank" href="https://www.facebook.com/curug.pletuk.1"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a target="_blank" href="https://www.instagram.com/curug_pletuk/"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Menu</h2>
                    <ul class="list-unstyled">

                        <!-- ORI  <li><a href="#" class="py-2 d-block">Beranda</a></li>
                        <li><a href="#" class="py-2 d-block">Tentang Kami</a></li>
                        <li><a href="#" class="py-2 d-block">Paket Wisata</a></li>
                        <li><a href="#" class="py-2 d-block">Booking</a></li> -->

                    <li class="{{ Request::is('/') || Request::is('/#') ? 'active' : '' }}"><a href="/#" class="py-2 d-block">Beranda</a></li>
                    <li class="{{ Request::is('/#tentang') ? 'active' : '' }}"><a href="/#tentang" class="py-2 d-block">Tentang Kami</a></li>
                    <li class="{{ Request::is('/#paket') ? 'active' : '' }}" ><a href="/#paket" class="py-2 d-block">Paket Wisata</a></li>
                    <li class="{{ $title == 'Booking' ? 'active' : '' }}"><a href="/booking" class="py-2 d-block">Booking</a></li>
                  
                </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Info Lebih lanjut ? </h2>
                    <div class="block-23 mb-3">
                        <ul>
                        <li>
                            <a href="https://maps.app.goo.gl/EyZDhrxwawbUcXBr8" target="_blank">
                                <span class="icon icon-map-marker"></span>
                                <span class="text">Dukuh Pletuk, Pesangkalan, Kec. Pagedongan, Kab. Banjarnegara, Jawa Tengah 53418</span>
                            </a>
                        </li>
                            <li><a href="https://wa.me/6287848414339" target="_blank" ><span class="icon icon-whatsapp"></span><span class="text">+62 878-4841-4339</span></a></li>
                            <li><a href="mailto:curugpletukkinayung@gmail.com" target="_blank" ><span class="icon icon-envelope"></span><span
                                        class="text">curugpletukkinayung@gmail.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>