@extends('layouts.app',['pageSlug'=>'side-bar test', 'contentClass'=>'bg-white'])
@section('content')

    <style>

        .card-background {
            background-image: url('/black/img/card-pimary.png');
        }

        .carousel-item {
            position: relative;
        }

        .black-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
        }

        .carousel-text {
            line-height: 2em;
            font-size: 1.3em
        }
    </style>
<div class="bg-white">
    <header>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="img-fluid w-100"
                         src="black/img/first-slide.jpg{{--http://via.placeholder.com/800x450/caa8f5/ffffff?text=Image+1--}}"
                         alt="First Image"/>
                    <div class="carousel-caption d-none d-md-block">
                        <h1 class="display-2">Free Courses Online</h1>
                        <p class="carousel-text lead text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit. Adipisci aspernatur consectetur dignissimos eaque itaque nisi obcaecati odio similique
                            ut voluptates? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aperiam id
                            incidunt ipsa neque quia rem saepe ullam unde velit!</p>
                        <a href="{{route('forum')}}" class="btn btn-lg btn-primary mt-3 mb-5">Get Started</a>
                    </div>
                    <div class="black-overlay"></div>
                </div>
                <div class="carousel-item">
                    <img class="img-fluid w-100"
                         src="black/img/second-slide.jpg{{--http://via.placeholder.com/800x450/caa8f5/ffffff?text=Image+1--}}"
                         alt="Second Image"/>
                    <div class="carousel-caption d-none d-md-block">
                        <h1 class="display-2">Discuss Your Problems</h1>
                        <p class="lead carousel-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad
                            aperiam id incidunt ipsa neque
                            quia rem saepe ullam unde velit! Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Aliquid corporis dicta distinctio dolore eaque explicabo, illo itaque necessitatibus
                            pariatur sapiente?</p>
                        <a href="{{route('forum')}}" class="btn btn-lg btn-primary mt-3 mb-5">Get Started</a>
                    </div>
                    <div class="black-overlay"></div>
                </div>
                <div class="carousel-item">
                    <img class="img-fluid w-100"
                         src="black/img/third-slide.jpg{{--http://via.placeholder.com/800x450/caa8f5/ffffff?text=Image+1--}}"
                         alt="Third Image"/>
                    <div class="carousel-caption d-none d-md-block">
                        <h1 class="display-2">Share Your Experiences</h1>
                        <p class="lead carousel-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad
                            aperiam id incidunt ipsa neque
                            quia rem saepe ullam unde velit! Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Amet, debitis magnam nulla qui quo sequi similique tempora temporibus velit vitae.</p>
                        <a href="{{route('forum')}}" class="btn btn-lg btn-primary mt-3 mb-5">Get Started</a>
                    </div>
                    <div class="black-overlay"></div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </header>

    {{--       What we Offer   --}}
    <section class="">
        <div class="container py-lg-5 py-md-3 mt-2">
            <h1 class="display-1 text-center text-dark">Wha<span class="border-bottom border-primary">t we offer</span>
            </h1>
            <div class="row justify-content-center">
                <div class="col- col-md-8 col-lg-4">
                    <div class="card">
                        <div class="card-header text-center">
                            <i class="fas fa-graduation-cap fa-5x"></i>
                            <h2 class="display-4"><span class="border-bottom border-primary">Courses</span> <span
                                    class="border-bottom border-primary">online</span> <span
                                    class="border-bottom border-primary">free</span></h2>
                        </div>
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquid beatae consequatur
                                doloribus, earum eius eveniet ex inventore minus modi molestiae non odio, omnis porro
                                quos recusandae sed voluptatem voluptatibus.</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('channels.index')}}" class="btn btn-lg btn-primary">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col- col-md-8 col-lg-4">
                    <div class="card">
                        <div class="card-header text-center">
                            <i class="fas fa-comments fa-5x"></i>
                            <h2 class="display-4"><span class="border-bottom border-primary">Discuss</span> <span
                                    class="border-bottom border-primary">your</span> <span
                                    class="border-bottom border-primary">topics</span></h2>
                        </div>
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquid beatae consequatur
                                doloribus, earum eius eveniet ex inventore minus modi molestiae non odio, omnis porro
                                quos recusandae sed voluptatem voluptatibus.</p>
                        </div>
                        <div class="card-footer m-auto">
                            <a href="{{route('forum')}}" class="btn btn-lg btn-primary">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col- col-md-8 col-lg-4">
                    <div class="card">
                        <div class="card-header text-center">
                            <i class="fas fa-share-alt fa-5x"></i>
                            <h2 class="display-4"><span class="border-bottom border-primary">Share</span> <span
                                    class="border-bottom border-primary">your</span> <span
                                    class="border-bottom border-primary">experience</span></h2>

                        </div>
                        <div class="card-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquid beatae consequatur
                                doloribus, earum eius eveniet ex inventore minus modi molestiae non odio, omnis porro
                                quos recusandae sed voluptatem voluptatibus.</p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-lg btn-primary float-right">Get Started</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--   Team  --}}
    <section class="bg-dark" id="team">
        <div class="container p-lg-5 p-md-3 mt-2">
            <h1 class="display-1 text-center">
                <span class="border-bottom border-primary">Our Te</span>am</h1>
            <div class="row justify-content-center">
                <div class="col- col-md-8 col-lg-4">
                    <div class="card card-white">
                        {{-- style="background-image: url('black/img/card-primary.png');
                                background-size: cover;--}}
                        <img width="500px" height="300px" src="black/img/thiam.jpg" alt=""
                             class="card-img-top border-bottom border-primary">
                        <div class="card-body">
                            <h2 class="card-title"><span class="border-bottom border-primary">Mamoudou T</span>hiam</h2>
                            <p class="text-dark card-text text-justify">Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. A
                                aliquid beatae consequatur
                                doloribus, earum eius eveniet ex inventore minus modi molestiae non odio, omnis porro
                                quos recusandae sed voluptatem voluptatibus.</p>
                        </div>
                        <div class="card-footer text-center">
                            <div class="button-container">
                                <button class="btn btn-icon btn-round btn-facebook">
                                    <i class="fab fa-facebook"></i>
                                </button>
                                <button class="btn btn-icon btn-round btn-twitter mx-3">
                                    <i class="fab fa-twitter"></i>
                                </button>
                                <button class="btn btn-icon btn-round btn-google">
                                    <i class="fab fa-google-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col- col-md-8 col-lg-4">
                    <div class="card card-white">
                        <img src="black/img/hamoud.jpg" alt=""
                             class="card-img-top">
                        <div class="card-body">
                            <h2 class="card-title text-center">Ha<span
                                    class="border-bottom border-primary">moud De</span>de</h2>
                            <p class="text-dark card-text text-justify">Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. A
                                aliquid beatae consequatur
                                doloribus, earum eius eveniet ex inventore minus modi molestiae non odio, omnis porro
                                quos recusandae sed voluptatem voluptatibus.</p>
                        </div>
                        <div class="card-footer text-center">
                            <div class="button-container">
                                <button class="btn btn-icon btn-round btn-facebook">
                                    <i class="fab fa-facebook"></i>
                                </button>
                                <button class="btn btn-icon btn-round btn-twitter mx-3">
                                    <i class="fab fa-twitter"></i>
                                </button>
                                <button class="btn btn-icon btn-round btn-google">
                                    <i class="fab fa-google-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col- col-md-8 col-lg-4">
                    <div class="card card-white">
                        <img src="black/img/cheikh.jpg" alt=""
                             class="card-img-top border-bottom border-primary">
                        <div class="card-body card-background">
                            <h2 class="card-title text-right">Che<span
                                    class="border-bottom border-primary">ikh Ahmed</span></h2>
                            <p class="text-dark card-text text-justify">Lorem ipsum dolor sit amet, consectetur
                                adipisicing elit. A
                                aliquid beatae consequatur
                                doloribus, earum eius eveniet ex inventore minus modi molestiae non odio, omnis porro
                                quos recusandae sed voluptatem voluptatibus.</p>
                        </div>
                        <div class="card-footer text-center">
                            <div class="button-container">
                                <button class="btn btn-icon btn-round btn-facebook">
                                    <i class="fab fa-facebook"></i>
                                </button>
                                <button class="btn btn-icon btn-round btn-twitter mx-3">
                                    <i class="fab fa-twitter"></i>
                                </button>
                                <button class="btn btn-icon btn-round btn-google">
                                    <i class="fab fa-google-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection

@push('js')

    <script>

    </script>

@endpush
