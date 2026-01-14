<!doctype html>
<html class="no-js" lang="pt-PT">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Eventos - Museu Municipal de Alcanena - Cultura e História</title>
    @include('components.css')

</head>

<body>
    <!--********************************
   Code Start From Here
 ******************************** -->


    <!-- Cursor -->
    <div class="cursor"></div>
    <div class="cursor-follower"></div>
    <!-- Cursor End -->

    @include('layouts.navbar')
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <!--==============================
        Breadcumb
        ============================== -->
            <div class="breadcumb-wrapper text-center" data-bg-src="{{ asset('assets/img/gallery/DSC_3893.jpg') }}">
                <!-- bg animated image/ -->
                <div class="container">
                    <div class="breadcumb-content">
                        <h1 class="breadcumb-title">Eventos</h1>
                    </div>
                    <ul class="breadcumb-menu">
                        <li><a href="/">INÍCIO</a></li>
                        <li class="active">TODOS OS EVENTOS</li>
                    </ul>
                </div>
            </div>

            <!--==============================
        Exhibition Area
        ==============================-->
            <div class="space bg-title">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-8">
                            <div class="title-area">
                                <h2 class="sec-title text-white">Eventos e Exposições</h2>
                            </div>
                        </div>
                       
                    </div>
                    <div class="row justify-content-center exhibition-wrap-1 gy-40 gx-30">
                        @forelse($events as $event)
                            <div class="col-lg-4 col-md-6 exhibition-card-wrap">
                                <div class="exhibition-card">
                                    <div class="exhibition-card-thumb">
                                        @if ($event->image)
                                            <img src="{{ asset('storage/' . $event->image) }}"
                                                alt="{{ $event->title }}">
                                        @else
                                            <img src="{{ asset('assets/img/exhibition/default.png') }}" alt="Default">
                                        @endif
                                        <div class="shadow-text">{{ $event->getTypeLabel() }}</div>
                                    </div>
                                    <div class="exhibition-card-details">
                                        <div class="post-meta-item blog-meta">
                                            <a><i class="fas fa-calendar-alt"></i>
                                                {{ $event->getFormattedDateRange() }}</a>
                                            
                                        </div>
                                        <h3 class="event-card-title">
                                            <a href="{{ route('eventoShow', $event->slug) }}">{{ $event->title }}</a>
                                        </h3>
                                        <a class="btn style2" href="{{ route('eventoShow', $event->slug) }}">
                                            {{ strtoupper($event->getTypeLabel()) }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center">
                                <p class="text-white">Não existem eventos disponíveis de momento.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            @include('layouts.footer')

        </div>
    </div>

    <!--********************************
   Code End  Here
 ******************************** -->

    @include('components.js')
</body>

</html>
