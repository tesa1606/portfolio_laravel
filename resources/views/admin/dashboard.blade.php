@extends('admin.main')

@section('judul', 'Dashboard')

@section('konten')
<div class="row">
  <!-- Small Box: Contacts -->
  <div class="col-lg-3 col-6">
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{ $jumlahContact }}</h3>
        <p>Total Contacts</p>
      </div>
      <div class="icon">
        <i class="fas fa-envelope"></i>
      </div>
      <a href="{{ route('contacts.index') }}" class="small-box-footer">
        Lihat Kontak <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>

  <!-- Small Box: Testimonials -->
  <div class="col-lg-3 col-6">
    <div class="small-box bg-purple">
      <div class="inner">
        <h3>{{ $jumlahTestimonial }}</h3>
        <p>Total Testimonial</p>
      </div>
      <div class="icon">
        <i class="fas fa-comment-dots"></i>
      </div>
      <a href="/admin/testimonials" class="small-box-footer">
        Lihat Testimonial <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>

  <!-- Small Box: Portfolio -->
  <div class="col-lg-3 col-6">
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{ $jumlahPortfolio }}</h3>
        <p>Total Portfolio</p>
      </div>
      <div class="icon">
        <i class="fas fa-images"></i>
      </div>
      <a href="/admin/portfolio" class="small-box-footer">
        Lihat Portfolio <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>

  <!-- Small Box: Team -->
  <div class="col-lg-3 col-6">
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{ $jumlahTeam }}</h3>
        <p>Total Team</p>
      </div>
      <div class="icon">
        <i class="fas fa-users"></i>
      </div>
      <a href="/admin/team" class="small-box-footer">
        Lihat Tim <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
</div>

<!-- Row: Charts -->
<div class="row">
  <!-- Bar Chart: Monthly Contact -->
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Monthly Contacts</h3>
      </div>
      <div class="card-body">
        <canvas id="contactChart" height="150"></canvas>
      </div>
    </div>
  </div>

  <!-- Pie Chart: Komposisi Data -->
  <div class="col-md-4">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Komposisi Data</h3>
      </div>
      <div class="card-body">
        <canvas id="dataPieChart" height="200"></canvas>
      </div>
    </div>
  </div>
</div>

<!-- Progress Bars -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Kinerja dan Feedback</h3>
  </div>
  <div class="card-body">
    <p class="mb-1">Feedback Positif</p>
    <div class="progress mb-3">
      <div class="progress-bar bg-success" style="width: 85%">85%</div>
    </div>

    <p class="mb-1">Proyek Selesai</p>
    <div class="progress mb-3">
      <div class="progress-bar bg-info" style="width: 70%">70%</div>
    </div>

    <p class="mb-1">Tim Aktif</p>
    <div class="progress">
      <div class="progress-bar bg-warning" style="width: 60%">60%</div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Bar Chart: Monthly Contacts
  const ctx = document.getElementById('contactChart').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: {!! json_encode($labels) !!},
      datasets: [{
        label: 'Jumlah Kontak',
        data: {!! json_encode($data) !!},
        backgroundColor: 'rgba(54, 162, 235, 0.7)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true,
          ticks: { stepSize: 1 }
        }
      }
    }
  });

  // Pie Chart: Komposisi Data
  const pieCtx = document.getElementById('dataPieChart').getContext('2d');
  new Chart(pieCtx, {
    type: 'pie',
    data: {
      labels: ['Contacts', 'Testimonials', 'Portfolio', 'Team'],
      datasets: [{
        data: [
          {{ $jumlahContact }},
          {{ $jumlahTestimonial }},
          {{ $jumlahPortfolio }},
          {{ $jumlahTeam }}
        ],
        backgroundColor: [
          'rgba(0, 123, 255, 0.7)',
          'rgba(153, 102, 255, 0.7)',
          'rgba(40, 167, 69, 0.7)',
          'rgba(255, 193, 7, 0.7)'
        ],
        borderColor: '#fff',
        borderWidth: 2
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: 'bottom'
        }
      }
    }
  });
</script>
@endsection
