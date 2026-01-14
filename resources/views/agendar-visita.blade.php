@extends('layouts.app')

@section('title', 'Agendar Visita - Museu Municipal de Alcanena')

@section('description', 'Agende a sua visita ao Museu Municipal de Alcanena')

@section('content')
<div class="breadcumb-wrapper text-center" data-bg-src="{{ asset('assets/img/gallery/DSC_3893.jpg') }}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Agendar Visita</h1>
        </div>
        <ul class="breadcumb-menu">
            <li><a href="{{ route('home') }}">Início</a></li>
            <li class="active">Agendar Visita</li>
        </ul>
    </div>
</div>

<section class="space">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div style="background: #f8f9fa; padding: 30px 20px; border-radius: 15px;">
                    <div class="text-center mb-4">
                        <span style="color: #d4a574; font-weight: 600; font-size: 13px; letter-spacing: 2px; text-transform: uppercase;">Agendamento</span>
                        <h2 style="font-size: 28px; margin-top: 10px; margin-bottom: 10px;">Marque a Sua Visita</h2>
                        <p style="color: #666; margin: 0;">Preencha o formulário para agendar a sua visita</p>
                    </div>

                    @if(session('success'))
                        <div style="background: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 25px;">
                            <i class="fas fa-check-circle"></i> {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div style="background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 25px;">
                            <i class="fas fa-exclamation-circle"></i> Corrija os erros:
                            <ul style="margin: 10px 0 0 20px;">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('visits.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label style="font-weight: 600; color: #333; margin-bottom: 8px; display: block; font-size: 14px;">
                                    <i class="far fa-user me-1"></i>Nome *
                                </label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       name="name" value="{{ old('name') }}" required 
                                       style="padding: 12px; border: 2px solid #e0e0e0; border-radius: 8px;">
                            </div>

                            <div class="col-md-6">
                                <label style="font-weight: 600; color: #333; margin-bottom: 8px; display: block; font-size: 14px;">
                                    <i class="far fa-envelope me-1"></i>Email *
                                </label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       name="email" value="{{ old('email') }}" required 
                                       style="padding: 12px; border: 2px solid #e0e0e0; border-radius: 8px;">
                            </div>

                            <div class="col-md-6">
                                <label style="font-weight: 600; color: #333; margin-bottom: 8px; display: block; font-size: 14px;">
                                    <i class="fas fa-phone me-1"></i>Telefone
                                </label>
                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" 
                                       style="padding: 12px; border: 2px solid #e0e0e0; border-radius: 8px;">
                            </div>

                            <div class="col-md-6">
                                <label style="font-weight: 600; color: #333; margin-bottom: 8px; display: block; font-size: 14px;">
                                    <i class="fas fa-building me-1"></i>Escola/Organização
                                </label>
                                <input type="text" class="form-control" name="organization" value="{{ old('organization') }}" 
                                       style="padding: 12px; border: 2px solid #e0e0e0; border-radius: 8px;">
                            </div>

                            <div class="col-md-6">
                                <label style="font-weight: 600; color: #333; margin-bottom: 8px; display: block; font-size: 14px;">
                                    <i class="fas fa-calendar-alt me-1"></i>Data *
                                </label>
                                <input type="date" class="form-control @error('visit_date') is-invalid @enderror" 
                                       name="visit_date" value="{{ old('visit_date') }}" required 
                                       style="padding: 12px; border: 2px solid #e0e0e0; border-radius: 8px;">
                            </div>

                            <div class="col-md-6">
                                <label style="font-weight: 600; color: #333; margin-bottom: 8px; display: block; font-size: 14px;">
                                    <i class="fas fa-clock me-1"></i>Hora *
                                </label>
                                <input type="time" class="form-control @error('preferred_time') is-invalid @enderror" 
                                       name="preferred_time" value="{{ old('preferred_time') }}" required 
                                       style="padding: 12px; border: 2px solid #e0e0e0; border-radius: 8px;">
                            </div>

                            <div class="col-md-6">
                                <label style="font-weight: 600; color: #333; margin-bottom: 8px; display: block; font-size: 14px;">
                                    <i class="fas fa-users me-1"></i>Tipo de Visita *
                                </label>
                                <select name="visit_type" class="form-control" required 
                                        style="padding: 12px; border: 2px solid #e0e0e0; border-radius: 8px;">
                                    <option value="">Selecione</option>
                                    <option value="individual" {{ old('visit_type') == 'individual' ? 'selected' : '' }}>Individual</option>
                                    <option value="group" {{ old('visit_type') == 'group' ? 'selected' : '' }}>Grupo</option>
                                    <option value="school" {{ old('visit_type') == 'school' ? 'selected' : '' }}>Escolar</option>
                                    <option value="guided" {{ old('visit_type') == 'guided' ? 'selected' : '' }}>Visita Guiada</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label style="font-weight: 600; color: #333; margin-bottom: 8px; display: block; font-size: 14px;">
                                    <i class="fas fa-sort-numeric-up me-1"></i>Nº Pessoas *
                                </label>
                                <input type="number" class="form-control" name="group_size" min="1" 
                                       value="{{ old('group_size', 1) }}" required 
                                       style="padding: 12px; border: 2px solid #e0e0e0; border-radius: 8px;">
                            </div>

                            <div class="col-12">
                                <label style="font-weight: 600; color: #333; margin-bottom: 8px; display: block; font-size: 14px;">
                                    <i class="far fa-comment me-1"></i>Observações
                                </label>
                                <textarea name="special_requests" rows="4" class="form-control" 
                                          style="padding: 12px; border: 2px solid #e0e0e0; border-radius: 8px; resize: vertical;" 
                                          placeholder="Pedidos especiais ou observações">{{ old('special_requests') }}</textarea>
                            </div>

                            <div class="col-12 text-center mt-3">
                                <button type="submit" class="btn" style="padding: 14px 40px;">
                                    <i class="fas fa-calendar-check me-2"></i>SOLICITAR AGENDAMENTO
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="row mt-4 g-3">
                    <div class="col-md-4">
                        <div class="text-center" style="background: #fff; padding: 25px 20px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.08);">
                            <i class="fas fa-clock" style="font-size: 36px; color: #d4a574; margin-bottom: 12px;"></i>
                            <h5 style="font-size: 15px; margin-bottom: 8px; font-weight: 600;">Horário</h5>
                            <p style="color: #666; font-size: 13px; margin: 0; line-height: 1.6;">Quarta a Domingo<br>10h - 13h | 14h - 18h</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center" style="background: #fff; padding: 25px 20px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.08);">
                            <i class="fas fa-ticket-alt" style="font-size: 36px; color: #d4a574; margin-bottom: 12px;"></i>
                            <h5 style="font-size: 15px; margin-bottom: 8px; font-weight: 600;">Entrada</h5>
                            <p style="color: #666; font-size: 13px; margin: 0; line-height: 1.6;">Gratuita<br>Visitas guiadas sob consulta</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center" style="background: #fff; padding: 25px 20px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.08);">
                            <i class="fas fa-phone-alt" style="font-size: 36px; color: #d4a574; margin-bottom: 12px;"></i>
                            <h5 style="font-size: 15px; margin-bottom: 8px; font-weight: 600;">Contacto</h5>
                            <p style="color: #666; font-size: 13px; margin: 0; line-height: 1.6;">+351 249 580 170<br>museu@cm-alcanena.pt</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
@media (max-width: 768px) {
    .breadcumb-wrapper {
        padding: 80px 0 60px;
    }
    .breadcumb-title {
        font-size: 28px !important;
    }
    section.space {
        padding: 40px 0;
    }
    div[style*="padding: 30px 20px"] {
        padding: 25px 15px !important;
    }
    h2[style*="font-size: 28px"] {
        font-size: 24px !important;
    }
    .btn {
        width: 100%;
        padding: 14px 20px !important;
    }
    .row.mt-4 {
        margin-top: 30px !important;
    }
}
</style>
@endsection
