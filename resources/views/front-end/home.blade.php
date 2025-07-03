@extends('front-end.master')

@section('title', 'Home')

@section('konten')

<!-- slider section -->
<section class="slider_section position-relative">
  <div class="container-fluid">
    <div class="row">
      <div class="detail-box col-lg-4 col-md-5">
        <div class="carousel slide slider_text_carousel" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="detail_content">
                <div>
                  <h1>Photography <br> Studio</h1>
                  <a href="{{ url('/about') }}">Read more</a>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="detail_content">
                <div>
                  <h1>Photography <br> Studio</h1>
                  <a href="{{ url('/about') }}">Read more</a>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="detail_content">
                <div>
                  <h1>Photography <br> Studio</h1>
                  <a href="{{ url('/about') }}">Read more</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="img-box col-lg-8 col-md-7">
        <div class="carousel slide slider_image_carousel carousel-fade" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{ asset('assets/front-end/images/slider-img.jpg') }}" alt="" />
            </div>
            <div class="carousel-item">
              <img src="{{ asset('assets/front-end/images/slider-img2.jpg') }}" alt="" />
            </div>
            <div class="carousel-item">
              <img src="{{ asset('assets/front-end/images/slider-img3.jpg') }}" alt="" />
            </div>
          </div>
        </div>
        <div class="carousel_btn-box">
          <a class="slider_btn_prev" href="#" role="button" data-slide="prev">
            <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="slider_btn_next" href="#" role="button" data-slide="next">
            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end slider section -->

<!-- about section -->
<section class="about_section">
  <div class="container-fluid">
    <div class="row">
      <div class="img-box col-lg-8 col-md-7">
        @if($about && $about->gambar)
          <img src="{{ asset('storage/' . $about->gambar) }}" alt="About Image" />
        @else
          <img src="{{ asset('assets/front-end/images/about-img.jpg') }}" alt="Default About Image" />
        @endif
      </div>
      <div class="detail-box detail_box_common col-lg-4 col-md-5 text_center">
        <div class="heading_container heading_center">
          <h2>About Us</h2>
        </div>
        <p>
          {{ $about->deskripsi ?? 'Belum ada deskripsi tersedia.' }}
        </p>
      </div>
    </div>
  </div>
</section>
<!-- end about section -->
 
<!-- portfolio section -->
<section class="portfolio_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>Portfolio</h2>
    </div>

    <div class="portfolio_container row">
      @forelse ($portfolios as $portfolio)
        <div class="col-md-4 mb-4">
          <div class="img-box">
            <img src="{{ asset('storage/' . $portfolio->gambar) }}" class="img-fluid" alt="portfolio image" />
            <div class="btn-box mt-2 text-center">
              <a href="#" class="btn-1">
                <i class="fa fa-share-alt" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
      @empty
        <p class="text-center">Belum ada data portfolio.</p>
      @endforelse
    </div>
  </div>
</section>
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
