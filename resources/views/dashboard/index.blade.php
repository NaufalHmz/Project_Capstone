@extends('admin.index')
@section('content')
<section class="section">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Line Chart</h5>

              <!-- Line Chart -->
              <canvas id="lineChart" style="max-height: 400px;"></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#lineChart'), {
                    type: 'line',
                    data: {
                      labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                      datasets: [{
                        label: 'Line Chart',
                        data: [65, 59, 80, 81, 56, 55, 40],
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                      }]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    }
                  });
                });
              </script>
              <!-- End Line CHart -->

            </div>
          </div>
        </div>

        

      

        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Grafik Perbandingan Gender Pasien Periksa</h5>

              <!-- Doughnut Chart -->
              <canvas id="doughnutChart" style="max-height: 300px;"></canvas>
              <script>
                var lbl2 = [@foreach($ar_gender as $g) '{{ $g->gender }}', @endforeach];
                var jml = [@foreach($ar_gender as $g) {{ $g->jumlah }}, @endforeach];
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#doughnutChart'), {
                    type: 'doughnut',
                    data: {
                      labels:  lbl2,
                      datasets: [{
                        label: 'My First Dataset',
                        data: jml,
                        backgroundColor: [
                          'rgb(255, 99, 132)',
                          'rgb(54, 162, 235)',
                          'rgb(255, 205, 86)'
                        ],
                        hoverOffset: 4
                      }]
                    }
                  });
                });
              </script>
              <!-- End Doughnut CHart -->

            </div>
          </div>
        </div>

          

        
    </section>
@endsection