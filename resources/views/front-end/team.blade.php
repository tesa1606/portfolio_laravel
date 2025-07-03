@extends('front-end.master')

@section('title', 'Team')

@section('konten')

<!-- Team Section -->
<div class="container py-5">
  <div class="text-center mb-5">
    <h2 class="fw-bold">Meet Our Team</h2>
    <p class="text-muted">Kami adalah tim yang berdedikasi untuk mengabadikan momen terbaik Anda.</p>
  </div>

  <div class="row justify-content-center g-4 mt-5">
    @foreach($teams as $team)
    <div class="col-md-4 mb-4">
      <div class="card shadow rounded-4 text-center p-3 border-0 h-100">
        <img src="{{ asset('storage/' . $team->image) }}" class="rounded-circle mx-auto mb-3" style="width: 150px; height: 150px; object-fit: cover;" alt="{{ $team->name }}">
        <div class="card-body">
          <h5 class="card-title mb-1">{{ $team->name }}</h5>
          <small class="text-muted d-block mb-3">{{ $team->position }}</small>
          <p class="text-muted">{{ $team->description }}</p>
          <div>
            @if($team->facebook)
              <a href="{{ $team->facebook }}"><i class="fa fa-facebook me-2"></i></a>
            @endif
            @if($team->twitter)
              <a href="{{ $team->twitter }}"><i class="fa fa-twitter me-2"></i></a>
            @endif
            @if($team->instagram)
              <a href="{{ $team->instagram }}"><i class="fa fa-instagram"></i></a>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
<!-- End Team Section -->


<!-- Services Section -->
<section class="service_section py-5" style="background: #85310c;">
  <div class="container">
    <div class="heading_container heading_center mb-5">
      <h2 class="fw-bold text-white">Layanan Kami</h2>
      <p class="text-white">Kami hadir untuk mengabadikan momen Anda dengan layanan profesional.</p>
    </div>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100 text-center p-4 bg-white">
          <div class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center mx-auto mb-3" style="width: 80px; height: 80px;">
            <i class="fa fa-camera fa-2x"></i>
          </div>
          <h5 class="fw-semibold">Foto Prewedding</h5>
          <p class="text-muted">Abadikan cinta Anda dengan gaya yang elegan, penuh makna dan sinematik.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100 text-center p-4 bg-white">
          <div class="rounded-circle bg-success text-white d-flex justify-content-center align-items-center mx-auto mb-3" style="width: 80px; height: 80px;">
            <i class="fa fa-video-camera fa-2x"></i>
          </div>
          <h5 class="fw-semibold">Video Dokumentasi</h5>
          <p class="text-muted">Video profesional untuk pernikahan, ulang tahun, atau event khusus lainnya.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100 text-center p-4 bg-white">
          <div class="rounded-circle bg-warning text-white d-flex justify-content-center align-items-center mx-auto mb-3" style="width: 80px; height: 80px;">
            <i class="fa fa-edit fa-2x"></i>
          </div>
          <h5 class="fw-semibold">Editing Profesional</h5>
          <p class="text-muted">Hasil akhir berkualitas tinggi dengan sentuhan editing yang memukau.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Services Section -->


<!-- Contact Section -->
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
              <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><span>Kota Bogor</span></a>
              <a href="#"><i class="fa fa-phone" aria-hidden="true"></i><span>Call +62 895-6131-79264</span></a>
              <a href="#"><i class="fa fa-envelope" aria-hidden="true"></i><span>arselyoo@gmail.com</span></a>
            </div>
            <div class="info_social">
              <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Contact Section -->

@endsection
