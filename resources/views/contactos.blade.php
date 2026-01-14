@extends('layouts.app')

@section('title', 'Contactos - Museu Municipal de Alcanena')
@section('description', 'Entre em contacto com o Museu Municipal de Alcanena. Estamos à sua disposição para qualquer informação.')

@section('content')
<!--==============================
Breadcumb
============================== -->
<div class="breadcumb-wrapper text-center" style="background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%); padding: 80px 0;">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title text-white">Contactos</h1>
        </div>
        <ul class="breadcumb-menu">
            <li><a href="{{ route('home') }}">Início</a></li>
            <li class="active">Contactos</li>
        </ul>                
    </div>
</div>

<!--==============================
Contact Area  
==============================-->
<div class="space" style="padding: 80px 0;">
    <div class="container">
        <div class="row justify-content-center mb-60">
            <div class="col-lg-8 text-center">
                <h2 class="sec-title mb-3" style="font-size: 36px;">Entre em Contacto</h2>
                <p style="font-size: 18px; color: #666;">Estamos à sua disposição para esclarecer qualquer dúvida ou fornecer informações sobre o museu, exposições e eventos.</p>
            </div>
        </div>

        <!-- Contact Info Cards -->
        <div class="row g-4 mb-60">
            <div class="col-lg-4 col-md-6">
                <div class="contact-info-card" style="background: #f8f9fa; padding: 40px 30px; border-radius: 10px; text-align: center; height: 100%; transition: transform 0.3s;">
                    <div class="icon-box" style="width: 70px; height: 70px; background: #d4a574; border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-map-marker-alt" style="color: #fff; font-size: 28px;"></i>
                    </div>
                    <h4 style="font-size: 20px; margin-bottom: 15px; color: #1a1a1a;">Morada</h4>
                    <p style="color: #666; font-size: 15px; margin: 0; line-height: 1.6;">
                        Rua Pedro Teixeira, nº 8<br>
                        2380-077 Alcanena<br>
                        Portugal
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="contact-info-card" style="background: #f8f9fa; padding: 40px 30px; border-radius: 10px; text-align: center; height: 100%; transition: transform 0.3s;">
                    <div class="icon-box" style="width: 70px; height: 70px; background: #d4a574; border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-phone-alt" style="color: #fff; font-size: 28px;"></i>
                    </div>
                    <h4 style="font-size: 20px; margin-bottom: 15px; color: #1a1a1a;">Telefone</h4>
                    <p style="color: #666; font-size: 15px; margin: 0;">
                        <a href="tel:+351249580170" style="color: #d4a574; font-weight: 600; font-size: 18px;">+351 249 580 170</a>
                    </p>
                    <p style="color: #999; font-size: 13px; margin-top: 10px;">Terça a Domingo<br>10:00 - 13:00 | 14:00 - 18:00</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="contact-info-card" style="background: #f8f9fa; padding: 40px 30px; border-radius: 10px; text-align: center; height: 100%; transition: transform 0.3s;">
                    <div class="icon-box" style="width: 70px; height: 70px; background: #d4a574; border-radius: 50%; margin: 0 auto 20px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-envelope" style="color: #fff; font-size: 28px;"></i>
                    </div>
                    <h4 style="font-size: 20px; margin-bottom: 15px; color: #1a1a1a;">Email</h4>
                    <p style="color: #666; font-size: 15px; margin: 0;">
                        <a href="mailto:museu@cm-alcanena.pt" style="color: #d4a574; font-weight: 600;">museu@cm-alcanena.pt</a>
                    </p>
                    <p style="color: #999; font-size: 13px; margin-top: 10px;">Resposta em 24-48 horas</p>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="contact-form-wrap" style="background: #f8f9fa; padding: 50px; border-radius: 15px;">
                    <div class="title-area text-center mb-40">
                        <h3 class="sec-title" style="font-size: 28px; margin-bottom: 15px;">Envie-nos uma Mensagem</h3>
                        <p style="color: #666;">Preencha o formulário abaixo e entraremos em contacto consigo o mais brevemente possível.</p>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success" style="background: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 30px;">
                            <i class="fas fa-check-circle"></i> {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger" style="background: #f8d7da; border: 1px solid #f5c6cb; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 30px;">
                            <i class="fas fa-exclamation-circle"></i> Por favor, corrija os seguintes erros:
                            <ul style="margin: 10px 0 0 20px;">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form action="{{ route('contactos.store') }}" method="POST" class="contact-form">
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="font-weight: 600; color: #333; margin-bottom: 10px; display: block;">Nome Completo *</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" required style="padding: 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 15px;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="font-weight: 600; color: #333; margin-bottom: 10px; display: block;">Email *</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required style="padding: 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 15px;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="font-weight: 600; color: #333; margin-bottom: 10px; display: block;">Telefone</label>
                                    <input type="tel" class="form-control" name="phone" value="{{ old('phone') }}" style="padding: 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 15px;">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label style="font-weight: 600; color: #333; margin-bottom: 10px; display: block;">Assunto *</label>
                                    <select class="form-control" name="subject" required style="padding: 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 15px;">
                                        <option value="">Selecione o assunto</option>
                                        <option value="Informações Gerais" {{ old('subject') == 'Informações Gerais' ? 'selected' : '' }}>Informações Gerais</option>
                                        <option value="Visitas Guiadas" {{ old('subject') == 'Visitas Guiadas' ? 'selected' : '' }}>Visitas Guiadas</option>
                                        <option value="Eventos" {{ old('subject') == 'Eventos' ? 'selected' : '' }}>Eventos</option>
                                        <option value="Exposições" {{ old('subject') == 'Exposições' ? 'selected' : '' }}>Exposições</option>
                                        <option value="Reservas" {{ old('subject') == 'Reservas' ? 'selected' : '' }}>Reservas</option>
                                        <option value="Outro" {{ old('subject') == 'Outro' ? 'selected' : '' }}>Outro</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label style="font-weight: 600; color: #333; margin-bottom: 10px; display: block;">Mensagem *</label>
                                    <textarea class="form-control" name="message" rows="6" required style="padding: 15px; border: 2px solid #e0e0e0; border-radius: 8px; font-size: 15px; resize: vertical;" placeholder="Escreva aqui a sua mensagem...">{{ old('message') }}</textarea>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn" style="padding: 15px 50px; font-size: 16px;">
                                    <i class="fas fa-paper-plane me-2"></i>ENVIAR MENSAGEM
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Additional Info -->
        <div class="row justify-content-center mt-60">
            <div class="col-lg-10">
                <div class="info-box" style="background: linear-gradient(135deg, #d4a574 0%, #c99565 100%); padding: 40px; border-radius: 15px; text-align: center;">
                    <h4 style="color: #fff; font-size: 24px; margin-bottom: 15px;">Horário de Funcionamento</h4>
                    <div style="color: #fff; font-size: 16px; line-height: 1.8;">
                        <p style="margin: 0;"><strong>Terça a Domingo:</strong> 10:00 - 13:00 | 14:00 - 18:00</p>
                        <p style="margin: 10px 0 0 0;"><strong>Segunda-feira:</strong> Encerrado</p>
                    </div>
                    <div style="margin-top: 25px;">
                        <a href="{{ route('horarios') }}" class="btn" style="background: #fff; color: #d4a574; padding: 12px 30px;">
                            VER HORÁRIOS COMPLETOS
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Social Media -->
        <div class="row justify-content-center mt-60">
            <div class="col-lg-10 text-center">
                <h4 style="font-size: 22px; margin-bottom: 20px; color: #1a1a1a;">Siga-nos nas Redes Sociais</h4>
                <div class="social-links" style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
                    <a href="https://www.facebook.com/museumunicipaldealcanena" target="_blank" style="width: 50px; height: 50px; border-radius: 50%; background: #3b5998; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 20px; transition: transform 0.3s;">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.instagram.com/museumunicipalalcanena" target="_blank" style="width: 50px; height: 50px; border-radius: 50%; background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); display: flex; align-items: center; justify-content: center; color: #fff; font-size: 20px; transition: transform 0.3s;">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="mailto:museu@cm-alcanena.pt" style="width: 50px; height: 50px; border-radius: 50%; background: #d4a574; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 20px; transition: transform 0.3s;">
                        <i class="fas fa-envelope"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.contact-info-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.form-control:focus {
    border-color: #d4a574 !important;
    box-shadow: 0 0 0 0.2rem rgba(212, 165, 116, 0.25) !important;
}

.social-links a:hover {
    transform: scale(1.15);
}

@media (max-width: 767px) {
    .contact-form-wrap {
        padding: 30px 20px !important;
    }
}
</style>

@endsection
