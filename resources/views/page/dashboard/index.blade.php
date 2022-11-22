@extends('layout/index')
@section('title', 'Dasboard - Absensi')
@section('container')
<div class="row">
    <div class="col-xl-6 col-xxl-12">
        <div class="row">
            <div class="col-sm-6">
                <div class="card avtivity-card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <span class="activity-icon bgl-success mr-md-4 mr-3">
                                <i class="fa fa-check" style="font-size: 20px;"></i>
                            </span>
                            <div class="media-body">
                                <p class="fs-14 mb-2">Hadir</p>
                                <span class="title text-black font-w600">{{ $h }}</span>
                            </div>
                        </div>
                        <div class="progress" style="height:5px;">
                            <div class="progress-bar bg-success" style="width: {{ ($h/$t) * 100 }}%; height:5px;" role="progressbar">
                                <span class="sr-only">{{ ($h/$t) * 100 }}% Complete</span>
                            </div>
                        </div>
                    </div>
                    <div class="effect bg-success"></div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card avtivity-card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <span class="activity-icon bgl-secondary  mr-md-4 mr-3">
                                <i class="fa fa-edit" style="font-size: 20px;"></i>
                            </span>
                            <div class="media-body">
                                <p class="fs-14 mb-2">Izin</p>
                                <span class="title text-black font-w600">{{ $i }}</span>
                            </div>
                        </div>
                        <div class="progress" style="height:5px;">
                            <div class="progress-bar bg-secondary" style="width: {{ ($i/$t) * 100 }}%; height:5px;" role="progressbar">
                                <span class="sr-only">{{ ($i/$t) * 100 }}% Complete</span>
                            </div>
                        </div>
                    </div>
                    <div class="effect bg-secondary"></div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card avtivity-card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <span class="activity-icon bgl-danger mr-md-4 mr-3">
                                <i class="fa fa-ambulance" style="font-size: 20px;"></i>
                            </span>
                            <div class="media-body">
                                <p class="fs-14 mb-2">Sakit</p>
                                <span class="title text-black font-w600">{{ $s }}</span>
                            </div>
                        </div>
                        <div class="progress" style="height:5px;">
                            <div class="progress-bar bg-danger" style="width: {{ ($s/$t) * 100 }}%; height:5px;" role="progressbar">
                                <span class="sr-only">{{ ($s/$t) * 100 }}% Complete</span>
                            </div>
                        </div>
                    </div>
                    <div class="effect bg-danger"></div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card avtivity-card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <span class="activity-icon bgl-warning  mr-md-4 mr-3">
                                <i class="fa fa-plane" style="font-size: 20px;"></i>
                            </span>
                            <div class="media-body">
                                <p class="fs-14 mb-2">Cuti</p>
                                <span class="title text-black font-w600">{{ $c }}</span>
                            </div>
                        </div>
                        <div class="progress" style="height:5px;">
                            <div class="progress-bar bg-warning" style="width: {{ ($c/$t) * 100 }}%; height:5px;" role="progressbar">
                                <span class="sr-only">{{ ($c/$t) * 100 }}% Complete</span>
                            </div>
                        </div>
                    </div>
                    <div class="effect bg-warning"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-xxl-12">
        <div class="card">
            <div class="card-header d-sm-flex d-block pb-0 border-0">
                <div class="mr-auto pr-3 mb-sm-0 mb-3">
                    <h4 class="text-black fs-20">Kehadiran</h4>
                    <p class="fs-13 mb-0 text-black">Grafik Kehadiran Karyawan</p>
                </div>
                <div class="dropdown mb-3 show">
                    <button type="button" class="btn rounded btn-light" data-toggle="dropdown" aria-expanded="true">
                        <svg class="mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip5)">
                                <path d="M0.988957 17.0741C0.328275 17.2007 -0.104585 17.8386 0.0219823 18.4993C0.133362 19.0815 0.644694 19.4865 1.21678 19.4865C1.29272 19.4865 1.37119 19.4789 1.44713 19.4637L6.4592 18.5018C6.74524 18.4461 7.00091 18.2917 7.18316 18.0639L9.33481 15.3503L8.61593 14.9832C8.08435 14.7149 7.71475 14.2289 7.58818 13.6391L5.55804 16.1983L0.988957 17.0741Z" fill="#A02CFA"/>
                                <path d="M18.84 6.49306C20.3135 6.49306 21.508 5.29854 21.508 3.82502C21.508 2.3515 20.3135 1.15698 18.84 1.15698C17.3665 1.15698 16.1719 2.3515 16.1719 3.82502C16.1719 5.29854 17.3665 6.49306 18.84 6.49306Z" fill="#A02CFA"/>
                                <path d="M13.0179 3.15677C12.7369 2.86819 12.4762 2.75428 12.1902 2.75428C12.0864 2.75428 11.9826 2.76947 11.8712 2.79479L7.29203 3.88073C6.6592 4.03008 6.26937 4.66545 6.41872 5.29576C6.54782 5.83746 7.02877 6.20198 7.56289 6.20198C7.65404 6.20198 7.74514 6.19185 7.8363 6.16907L11.7371 5.24513C11.9902 5.52611 13.2584 6.90063 13.4888 7.14364C11.8763 8.87002 10.2639 10.5939 8.65137 12.3202C8.62605 12.3481 8.60329 12.3759 8.58049 12.4038C8.10966 13.0037 8.25397 13.9454 8.96275 14.3023L13.9064 16.826L11.3397 20.985C10.9878 21.5571 11.165 22.3064 11.7371 22.6608C11.9371 22.7848 12.1573 22.843 12.375 22.843C12.7825 22.843 13.1824 22.638 13.4128 22.2659L16.6732 16.983C16.8529 16.6919 16.901 16.34 16.8074 16.0135C16.7137 15.6844 16.4884 15.411 16.1821 15.2566L12.8331 13.553L16.3543 9.78636L19.0122 12.0393C19.2324 12.2266 19.5032 12.3177 19.7716 12.3177C20.0601 12.3177 20.3487 12.2114 20.574 12.0038L23.6243 9.16112C24.1002 8.71814 24.128 7.97392 23.685 7.49803C23.4521 7.24996 23.1383 7.12339 22.8244 7.12339C22.5383 7.12339 22.2497 7.22717 22.0245 7.43727L19.7412 9.56107C19.7386 9.56361 14.0178 4.18196 13.0179 3.15677Z" fill="#A02CFA"/>
                            </g>
                            <defs>
                                <clipPath id="clip5">
                                    <rect width="24" height="24" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                        Kehadiran
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0 pb-0">
                <div id="chartBar"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-xxl-12">
        <div class="row">
            <div class="col-xl-12">	
                <div class="card">
                    <div class="card-header d-sm-flex d-block pb-0 border-0">
                        <div class="mr-auto pr-3">
                            <h4 class="text-black font-w600 fs-20">Daftar Karyawan</h4>
                            <p class="fs-13 mb-0 text-black">Daftar semua karyawan yang bekerja di perusahaan X</p>
                        </div>
                        <a href="{{ route('employe') }}" class="btn btn-primary rounded d-none d-md-block">View More</a>
                    </div>
                    <div class="card-body pt-2">
                        <div class="testimonial-one owl-carousel">
                            @foreach($employes as $employe)
                            <div class="items">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" style="width: 130px;" alt="">
                                        <h5 class="fs-16 font-w500 mb-1"><a href="app-profile.html" class="text-black">{{ $employe->name }}</a></h5>
                                        <p class="fs-14">{{ $employe->address }}</p>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <a href="{{ route('division') }}" class="btn-link fs-14">{{ $employe->division->name }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('style')
<link rel="stylesheet" href="{{ asset('gymove/vendor/chartist/css/chartist.min.css') }}">
<link href="{{ asset('gymove/vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
@endpush
@push('script')
<script src="{{ asset('gymove/vendor/peity/jquery.peity.min.js') }}"></script>
<script src="{{ asset('gymove/vendor/apexchart/apexchart.js') }}"></script>
<script src="{{ asset('gymove/vendor/owl-carousel/owl.carousel.js') }}"></script>
<script src="{{ asset('gymove/vendor/chart.js/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('gymove/js/dashboard/dashboard-1.js') }}"></script>
<script>
    function carouselReview(){
        /*  testimonial one function by = owl.carousel.js */
        jQuery('.testimonial-one').owlCarousel({
            loop:true,
            autoplay:true,
            margin:30,
            nav:false,
            dots: false,
            left:true,
            navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
            responsive:{
                0:{
                    items:1
                },
                484:{
                    items:2
                },
                882:{
                    items:3
                },	
                1200:{
                    items:2
                },			
                
                1540:{
                    items:3
                },
                1740:{
                    items:4
                }
            }
        })			
    }
    jQuery(window).on('load',function(){
        setTimeout(function(){
            carouselReview();
        }, 1000); 
    });

    var hadir = "{{ json_encode($hadir) }}";
    var h = JSON.parse(hadir.replace(/&quot;/g,'"'));

    var tgl = "{{ json_encode($tgl) }}";
    var t = JSON.parse(tgl.replace(/&quot;/g,'"'));
    
    var chartBar = function(){
        var optionsArea = {
            series: [{
                name: "Kehadiran",
                data: h
            }
            ],
            chart: {
                height: 200,
                type: 'area',
                group: 'social',
                toolbar: {
                    show: false
                },
                zoom: {
                    enabled: false
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: [10],
                colors:['#0B2A97'],
                curve: 'smooth'
            },
            legend: {
                show:false,
                tooltipHoverFormatter: function(val, opts) {
                    return val + ' - ' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + ''
                },
                
            },
            markers: {
                strokeWidth: [8],
                strokeColors: ['#0B2A97'],
                border:0,
                colors:['#fff'],
                hover: {
                    size: 13,
                }
            },
            xaxis: {
                categories: t,
                labels: {
                    style: {
                        colors: '#3E4954',
                        fontSize: '14px',
                        fontFamily: 'Poppins',
                        fontWeight: 100,
                        
                    },
                },
            },
            yaxis: {
                labels: {
                    offsetX:-16,
                    style: {
                        colors: '#3E4954',
                        fontSize: '14px',
                        fontFamily: 'Poppins',
                        fontWeight: 100,
                        
                    },
                },
            },
            fill: {
                colors:['#0B2A97'],
                type:'solid',
                opacity: 0
            },
            colors:['#0B2A97'],
            grid: {
                borderColor: '#f1f1f1',
                xaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            responsive: [
            {
                breakpoint:1601,
                options:{
                    chart: {
                        height:400
                    },
                },
            }
            ,{
                breakpoint: 768,
                options: {
                    chart: {
                        height:250
                    },
                    markers: {
                        strokeWidth: [4],
                        strokeColors: ['#0B2A97'],
                        border:0,
                        colors:['#fff'],
                        hover: {
                            size: 6,
                        }
                    },
                    stroke: {
                        width: [6],
                        colors:['#0B2A97'],
                        curve: 'smooth'
                    },
                }
            }
            ] 
        };
        var chartArea = new ApexCharts(document.querySelector("#chartBar"), optionsArea);
        chartArea.render();
        
    }
</script>
@endpush