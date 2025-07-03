@extends('front-end.master')

@section('title', 'Portfolio')

@section('konten')

@section('konten')

<section class="portfolio_section layout_padding">
  <div class="container">
    
    <div class="heading_container heading_center mb-4">
      <h2>Portfolio</h2>
    </div>

    <div class="row" data-masonry='{"percentPosition": true }'>
      @forelse ($portfolios as $portfolio)
      <div class="col-sm-6 col-lg-4 mb-4">
        <div class="card shadow rounded-4 h-100 border-0">
          <img src="{{ asset('storage/' . $portfolio->gambar) }}" class="card-img-top rounded-4" alt="Portfolio Image">
        </div>
      </div>
      @empty
      <div class="col-12">
        <p class="text-center text-muted">Tidak ada data portfolio.</p>
      </div>
      @endforelse
    </div>

  </div>
</section>

<!-- Masonry.js CDN -->
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<!-- end portfolio section -->

<!-- contact section -->
<section class="contact_section">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 map_container">
        <div class="map">
          <div id="googleMap"></div>
        </div>
      </div>
      <div class="col-md-4 detail-box detail_box_common">
        <div>
          <div class="heading_container">
            <h2>Contact Us</h2>
          </div>
          <div class="info_contact">
            <div class="contact_link_box">
              <a href="#">
                <i class="fa fa-map-marker"></i>
                <span>{{ $contact->alamat ?? '-' }}</span>
              </a>

              <a href="tel:{{ $contact->nomor_telepon }}">
                <i class="fa fa-phone"></i>
                <span>Call {{ $contact->nomor_telepon ?? '-' }}</span>
              </a>

              <a href="mailto:{{ $contact->email }}">
                <i class="fa fa-envelope"></i>
                <span>{{ $contact->email ?? '-' }}</span>
              </a>

            </div>
            <div class="info_social">
              <a href="#"><i class="fa fa-facebook"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-linkedin"></i></a>
              <a href="#"><i class="fa fa-instagram"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end contact section -->


@endsection
