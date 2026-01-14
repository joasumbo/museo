@extends('layouts.app')

@section('title', 'Coleções - Museu Municipal de Alcanena')
@section('description', 'Explore as diversas coleções do Museu Municipal de Alcanena, desde arqueologia até arte contemporânea.')

@section('content')
<!--==============================
Breadcumb
============================== -->
@php
    $bgImage = $latestGallery && $latestGallery->image 
        ? url('storage/' . $latestGallery->image) 
        : asset('assets/img/gallery/DSC_3932.jpg');
@endphp
<div class="breadcumb-wrapper text-center" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ $bgImage }}'); background-size: cover; background-position: center; min-height: 400px; display: flex; align-items: center;">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Coleções</h1>
        </div>
        <ul class="breadcumb-menu">
            <li><a href="{{ route('home') }}">Início</a></li>
            <li class="active">Coleções</li>
        </ul>                
    </div>
</div>

<!--==============================
Portfolio Area  
==============================-->
<div class="portfolio-standard-area space overflow-hidden">
    <div class="container">
        @if($galleries->count() > 0)
        <div class="row gx-120 gy-120 masonary-active justify-content-center">                    
            @foreach($galleries as $gallery)
            <div class="col-lg-6 filter-item">
                <div class="portfolio-card-4">
                    <div class="portfolio-thumb">
                        <a href="{{ route('colecao.detalhes', $gallery->slug) }}">
                            <img src="{{ $gallery->image ? url('storage/' . $gallery->image) : asset('assets/img/portfolio/mma_portfolio_1.jpg') }}" alt="{{ $gallery->title }}">
                        </a>
                    </div>
                    <div class="portfolio-details">
                        <span class="portfilio-card-subtitle">Coleção</span>
                        <h3 class="portfilio-card-title">
                            <a href="{{ route('colecao.detalhes', $gallery->slug) }}">{{ $gallery->title }}</a>
                        </h3>
                        @if($gallery->description)
                        <p class="portfolio-text">{{ Str::limit($gallery->description, 120) }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="row">
            <div class="col-12">
                <div class="alert alert-info text-center" style="padding: 60px 20px;">
                    <i class="fas fa-images" style="font-size: 48px; color: #d4a574; margin-bottom: 20px;"></i>
                    <h3 style="margin-bottom: 15px;">Nenhuma Coleção Disponível</h3>
                    <p style="color: #666; font-size: 16px;">As coleções do museu estão sendo organizadas e estarão disponíveis em breve.</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
