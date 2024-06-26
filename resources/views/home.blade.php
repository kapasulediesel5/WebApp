@extends('layouts.app')

@section('content')

    <div class="container" id="home">
        @if($contents->isEmpty())
            <p>No Content Available</p>
        @else
            @foreach ($contents as $content)

            <div class="row section1 ">
        <div class="col-md-6 homeHeading ">
            <h2>  {{ $content->header }}</h2>
            <p>
               {{ $content->description }}
            </p>
            <div class="light-rounded-buttons">
                <a href="javascript:void(0)" class="btn primary-btn-outline">Get Started</a>
            </div>
        </div>

        <div class="col-md-6">
            <img src="{{ asset('img/p1.jpeg') }}" alt="Service 1 Image" class="img-fluid w-100">
        </div>
    </div>

    <div class="row section2">
        <div class="col-md-6">
            <img src="{{ asset('img/p1.jpeg') }}" alt="Service 2 Image" class="img-fluid w-100">
        </div>
        <div class="col-md-6 ">
            <div class="tab">
            <button class="tablinks" onclick="openTab(event, 'WhoWeAre')" id="defaultOpen">Who We Are</button>
            <button class="tablinks" onclick="openTab(event, 'OurVision')">Our Vision</button>
            <button class="tablinks" onclick="openTab(event, 'OurHistory')">Our History</button>
        </div>

        <div id="WhoWeAre" class="tabContent">
            <h2>Who We Are</h2>
            <p> {{ $content->who_we_are }}</p>
        </div>

        <div id="OurVision" class="tabContent">
            <h2>Our Vision</h2>
            <p>{{ $content->our_vision }}.</p>
        </div>

        <div id="OurHistory" class="tabContent">
            <h2>Our History</h2>
            <p>{{ $content->our_history }}</p>
        </div>
        </div>

    </div>
            @endforeach
        @endif
</div>

    <div class="container" id="services">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section-title text-center mb-4 pb-2">
                    <h4 class="title mb-4 button">Services</h4>
                </div>
            </div>
        </div>

        <div class="row">
            @if($services->isEmpty())
                <div class="col-12">
                    <p class="text-center">No Content Available</p>
                </div>
            @else
                @foreach ($services->chunk(3) as $chunk)
                    <div class="d-flex flex-wrap justify-content-between w-100">
                        @foreach ($chunk as $service)
                            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2 d-flex">
                                <div class="card service-wrapper rounded border-0 shadow p-4 flex-fill d-flex flex-column mx-2">
                                    <div class="icon text-center text-custom h1 shadow rounded bg-white">
                                        <span class="uim-svg" style=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1em"><rect width="20" height="15" x="2" y="3" class="uim-tertiary" rx="3"></rect><path class="uim-primary" d="M16,21H8a.99992.99992,0,0,1-.832-1.55469l4-6a1.03785,1.03785,0,0,1,1.66406,0l4,6A.99992.99992,0,0,1,16,21Z"></path></svg></span>
                                    </div>
                                    <div class="content mt-4">
                                        <h5 class="title"> {{ $service->header }} </h5>
                                        <p class="text-muted mt-3 mb-0"> {{ $service->description }}</p>
                                    </div>
                                    <div class="big-icon h1 text-custom mt-auto">
                                        <span class="uim-svg" style=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1em"><rect width="20" height="15" x="2" y="3" class="uim-tertiary" rx="3"></rect><path class="uim-primary" d="M16,21H8a.99992.99992,0,0,1-.832-1.55469l4-6a1.03785,1.03785,0,0,1,1.66406,0l4,6A.99992.99992,0,0,1,16,21Z"></path></svg></span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="section" id="pricing">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-box text-center">
                        <h3 class="title-heading mt-5 button">Pricing</h3>
                    </div>
                </div>
            </div>

            <div class="row mt-2 pt-4">
                @if($packages->isEmpty())
                    <div class="col-12">
                        <p class="text-center">No Content Available</p>
                    </div>
                @else
                    @foreach ($packages as $package)
                        <div class="col-lg-4 d-flex align-items-stretch">
                            <div class="pricing-box mt-2 d-flex flex-column">
                                <h4 class="f-20 text-center">{{ $package->name }}</h4>
                                <div class="content mt-4">
                                    <p class="text-muted">{{ $package->description }}</p>
                                </div>
                                <div class="pricing-plan mt-4 pt-2">
                                    <h4 class="text-muted">$ {{ $package->price }} /mo</h4>
                                </div>
                                <div class="mt-4 pt-3">
                                    <a href="" class="btn btn-primary btn-rounded">Purchase Now</a>
                                </div>
                                <div class="mt-4 pt-2">
                                    <p class="mb-2"><i class="mdi mdi-checkbox-marked-circle text-success f-18 mr-2"></i><b>Unlimited</b> Target Audience</p>
                                    <p class="mb-2"><i class="mdi mdi-checkbox-marked-circle text-success f-18 mr-2"></i><b>1</b> User Account</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-box text-center">
                        <h5 class="title-heading mt-5">We love to make perfect solutions for your business</h5>
                        <h6 class="lead">Why I say old chap is, spiffing off his nut</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection