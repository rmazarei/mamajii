@include('Admin.Panel.Layouts.Panel')

<!-- Charts Start -->
    <div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-chart-bar"></i>
                </span></span>{{__('all_strings.Chart')}}
            </h3>
        </div>

        <div class="row">

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <!--Users Chart Start-->
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{__('all_strings.allposts')}}</h4>
                        <canvas id="video_make" style="height:250px"></canvas>
                        <script>const video_make_ctx = document.getElementById('video_make').getContext('2d');
                            const video_make = new Chart(video_make_ctx, {
                                type: 'polarArea',
                                data: {
                                    labels: ['{{__('all_strings.all_users')}}','{{__('all_strings.all_doctors')}}'],
                                    datasets: [{
                                        label: '# of Votes',
                                        data: [{{$count_of_all_users}}, {{$count_of_all_doctors}}],
                                        backgroundColor: [
                                            '#ffc400',
                                            '#ff3d00',
                                        ],
                                        borderWidth: 1
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
                        </script>
                    </div>
                </div>
            </div>
            <!--Users Chart End-->


        </div>

    </div>
    <!-- content-wrapper ends -->

<!-- Charts End -->

@include('Admin.Panel.Layouts.Footer_Panel')
