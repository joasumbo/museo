@extends('layouts.app')

@section('title', 'Horários - Museu Municipal de Alcanena')
@section('description', 'Horários de funcionamento do Museu Municipal de Alcanena')

@section('content')
<!--==============================
Breadcumb
============================== -->
<div class="breadcumb-wrapper" style="background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%); padding: 80px 0;">
    <div class="container">
        <div class="breadcumb-content text-center">
            <h1 class="breadcumb-title text-white">Horários de Funcionamento</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{ route('home') }}">Início</a></li>
                <li class="active">Horários</li>
            </ul>
        </div>
    </div>
</div>

<!--==============================
Opening Hours Section
============================== -->
<section class="space" style="padding: 80px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <div class="title-area text-center mb-50">
                    <span class="sub-title" style="color: #D4A574; font-size: 16px; font-weight: 600; text-transform: uppercase; letter-spacing: 2px;">
                        Planeie a Sua Visita
                    </span>
                    <h2 class="sec-title" style="font-size: 42px; font-weight: 700; margin-top: 15px; color: #1a1a1a;">Horários de Funcionamento</h2>
                    <p style="font-size: 18px; color: #666; margin-top: 20px; line-height: 1.7;">
                        O Museu Municipal de Alcanena está aberto ao público durante todo o ano.<br>
                        <strong>Período Atual:</strong> {{ $currentSeason == 'summer' ? 'Verão' : 'Inverno' }}
                    </p>
                </div>

                <div class="schedule-wrapper" style="background: #fff; border-radius: 15px; box-shadow: 0 10px 40px rgba(0,0,0,0.08); overflow: hidden;">
                    @php
                        $diasSemana = [
                            'monday' => 'Segunda',
                            'tuesday' => 'Terça',
                            'wednesday' => 'Quarta',
                            'thursday' => 'Quinta',
                            'friday' => 'Sexta',
                            'saturday' => 'Sábado',
                            'sunday' => 'Domingo'
                        ];
                        
                        // Reordenar para começar na segunda
                        $allDays = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
                        $schedulesArray = $schedules->keyBy('day_of_week');
                    @endphp

                    @foreach($allDays as $day)
                        @php
                            $schedule = $schedulesArray->get($day);
                        @endphp
                        <div class="schedule-item" style="border-bottom: 1px solid #f0f0f0; padding: 25px 40px; display: flex; align-items: center; justify-content: space-between; transition: all 0.3s;">
                            <div class="schedule-day" style="flex: 0 0 150px;">
                                <h4 style="font-size: 18px; font-weight: 600; color: #1a1a1a; margin: 0;">{{ $diasSemana[$day] }}</h4>
                            </div>
                            <div class="schedule-time" style="flex: 1; text-align: center;">
                                @if($schedule && $schedule->is_open)
                                    <div style="display: inline-flex; align-items: center; gap: 30px;">
                                        @if($schedule->morning_open && $schedule->morning_close)
                                            <span style="color: #D4A574; font-weight: 600; font-size: 16px;">
                                                <i class="far fa-sun" style="margin-right: 8px;"></i>
                                                {{ substr($schedule->morning_open, 0, 5) }} - {{ substr($schedule->morning_close, 0, 5) }}
                                            </span>
                                        @endif
                                        @if($schedule->afternoon_open && $schedule->afternoon_close)
                                            <span style="color: #D4A574; font-weight: 600; font-size: 16px;">
                                                <i class="far fa-moon" style="margin-right: 8px;"></i>
                                                {{ substr($schedule->afternoon_open, 0, 5) }} - {{ substr($schedule->afternoon_close, 0, 5) }}
                                            </span>
                                        @endif
                                    </div>
                                @else
                                    <span style="color: #999; font-weight: 500; font-size: 15px;">
                                        <i class="fas fa-ban" style="margin-right: 8px;"></i>
                                        Encerrado
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-50">
                    <div class="alert" style="background: #f8f9fa; border-left: 4px solid #D4A574; padding: 20px 30px; text-align: left; display: inline-block; max-width: 100%; width: 100%; border-radius: 8px;">
                        <i class="fas fa-info-circle" style="color: #D4A574; font-size: 20px; margin-right: 10px;"></i>
                        <span style="color: #555; font-size: 15px; line-height: 1.6;">
                            <strong>Nota:</strong> O museu permanece encerrado nos feriados nacionais e municipais. Sugerimos que confirme a disponibilidade antes da sua visita.
                        </span>
                    </div>
                </div>

                <div class="text-center mt-40">
                    <a href="{{ route('agendar.visita') }}" class="btn" style="padding: 15px 40px; font-size: 16px; font-weight: 600; display: inline-block;">
                        <i class="fas fa-calendar-check me-2"></i>Agendar Visita
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
