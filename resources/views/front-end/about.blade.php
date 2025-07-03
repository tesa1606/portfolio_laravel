@extends('front-end.master')

@section('title', 'About')

@section('konten')

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

<!-- Testimonial Section -->
<section class="testimonial_section">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>What Our Clients Say</h2>
    </div>

    <div class="testimonials">
      @foreach($testimonials as $testimonial)
        <div class="testimonial_item">
          <p>"{{ $testimonial->message }}"</p>
          <h5>- {{ $testimonial->name }}</h5>
          <span>{{ $testimonial->email }}</span>
        </div>
      @endforeach
    </div>

    <div class="testimonial_form" style="background-color: #f8f9fa; padding: 50px 0;">
      <div class="heading_container heading_center">
        <h2>Leave a Review</h2>
      </div>
      <form action="{{ url('/testimonials') }}" method="POST">
        @csrf
        <div class="form-group">
          <input type="text" name="name" class="form-control" placeholder="Your Name" required>
        </div>
        <div class="form-group">
          <input type="email" name="email" class="form-control" placeholder="Your Email" required>
        </div>
        <div class="form-group">
          <textarea name="message" class="form-control" rows="4" placeholder="Your Comment" required></textarea>
        </div>
        <div class="form-group text-center">
          <button type="submit" class="btn btn-primary">Submit Review</button>
        </div>
      </form>
    </div>
  </div>
</section>
<!-- End Testimonial Section -->

<!-- contact section -->
<section class="contact_section">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 map_container">
        <div class="map">
          <div id="googleMap" style="height: 450px;"></div>
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
                <span>Kota Bogor</span>
              </a>
              <a href="tel:+62895613179264">
                <i class="fa fa-phone"></i>
                <span>Call +62 895-6131-79264</span>
              </a>
              <a href="mailto:arselyoo@gmail.com">
                <i class="fa fa-envelope"></i>
                <span>arselyoo@gmail.com</span>
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
