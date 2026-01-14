<!doctype html>
<html class="no-js" lang="pt-PT">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Agendar Visita - Museu Municipal de Alcanena - Cultura e História</title>
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
                        <h1 class="breadcumb-title">Agendar Visita</h1>
                    </div>
                    <ul class="breadcumb-menu">
                        <li><a href="#">Início</a></li>
                        <li class="active">Agendar uma visita</li>
                    </ul>
                </div>
            </div>

            <div class="contact-form-wrap">
                <div class="title-area mb-30">
                    <span class="sub-title text-theme">AGENDAMENTO</span>
                    <h2 class="sec-title">Marque a Sua Visita</h2>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('visits.store') }}" method="POST" class="contact-form">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group style-4 form-icon-left">
                                <i class="far fa-user text-theme"></i>
                                <input type="text"
                                    class="form-control style-border @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" placeholder="Nome Completo" required>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group style-4 form-icon-left">
                                <i class="far fa-envelope text-theme"></i>
                                <input type="email"
                                    class="form-control style-border @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" placeholder="Endereço de Email" required>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group style-4 form-icon-left">
                                <i class="fas fa-phone text-theme"></i>
                                <input type="text" class="form-control style-border" name="phone"
                                    placeholder="Telefone/Telemóvel">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group style-4 form-icon-left">
                                <i class="fas fa-building text-theme"></i>
                                <input type="text" class="form-control style-border" name="organization"
                                    placeholder="Escola/Organização (Opcional)">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group style-4 form-icon-left">
                                <i class="fas fa-calendar-alt text-theme"></i>
                                <input type="date"
                                    class="form-control style-border @error('visit_date') is-invalid @enderror"
                                    name="visit_date" value="{{ old('visit_date') }}" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group style-4 form-icon-left">
                                <i class="fas fa-clock text-theme"></i>
                                <input type="time"
                                    class="form-control style-border @error('preferred_time') is-invalid @enderror"
                                    name="preferred_time" value="{{ old('preferred_time') }}" required>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group style-4 form-icon-left">
                                <i class="fas fa-users text-theme"></i>
                                <select name="visit_type" class="form-control style-border" required>
                                    <option value="" disabled selected>Tipo de Visita</option>
                                    <option value="individual">Individual</option>
                                    <option value="group">Grupo</option>
                                    <option value="school">Escolar</option>
                                    <option value="guided">Visita Guiada</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group style-4 form-icon-left">
                                <i class="fas fa-sort-numeric-up text-theme"></i>
                                <input type="number" class="form-control style-border" name="group_size" min="1"
                                    placeholder="Nº de Pessoas" required>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group style-4 form-icon-left">
                                <i class="far fa-comment text-theme"></i>
                                <textarea name="special_requests" placeholder="Algum pedido especial ou observação?" class="form-control style-border">{{ old('special_requests') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-btn col-12">
                        <button type="submit" class="btn">SOLICITAR AGENDAMENTO</button>
                    </div>
                </form>
            </div>


            @include('layouts.footer')

        </div>
    </div>


    @include('components.js')
</body>

</html>
