@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-lg overflow-hidden">
                <div class="card-header d-flex justify-content-between align-items-center" 
                     style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); padding: 1.5rem;">
                    <h5 class="mb-0 fw-bold text-white">
                        <i class="fas fa-tachometer-alt me-2"></i>{{ __('Panou de control') }}
                    </h5>
                    <a href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form-dashboard').submit();"
                       class="btn btn-light btn-sm px-3 rounded-pill">
                        <i class="fas fa-sign-out-alt me-1"></i>{{ __('Deconectare') }}
                    </a>
                    <form id="logout-form-dashboard" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>

                <div class="card-body p-4">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show rounded-3 border-0 shadow-sm" role="alert"
                             style="background: linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%);">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="alert rounded-3 border-0 shadow-sm mb-4 text-white" role="alert"
                         style="background: linear-gradient(135deg, #2193b0 0%, #6dd5ed 100%);">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ __('Ești autentificat!') }}
                    </div>

                    <div class="mb-4 p-4 rounded-3 border-0 shadow-sm" 
                         style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">
                        <h5 class="fw-bold">{{ __('Bine ai venit, ') }} {{ Auth::user()->name }}!</h5>
                        <p class="text-muted mb-0">{{ __('Acesta este panoul tău de control unde poți gestiona contul și setările.') }}</p>
                    </div>

                    <div class="row g-4 mt-2">
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm hover-card">
                                <div class="card-body text-center p-4">
                                    <div class="rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                                         style="width: 80px; height: 80px; background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                                        <i class="fas fa-user fa-2x text-white"></i>
                                    </div>
                                    <h5 class="card-title fw-bold">{{ __('Profil') }}</h5>
                                    <p class="card-text text-muted">{{ __('Gestionează informațiile profilului tău') }}</p>
                                    <a href="#" class="btn btn-sm rounded-pill px-4" 
                                       style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); color: white;">
                                        {{ __('Editează') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm hover-card">
                                <div class="card-body text-center p-4">
                                    <div class="rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                                         style="width: 80px; height: 80px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                        <i class="fas fa-cog fa-2x text-white"></i>
                                    </div>
                                    <h5 class="card-title fw-bold">{{ __('Setări') }}</h5>
                                    <p class="card-text text-muted">{{ __('Configurează preferințele contului') }}</p>
                                    <a href="#" class="btn btn-sm rounded-pill px-4" 
                                       style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                                        {{ __('Configurează') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm hover-card">
                                <div class="card-body text-center p-4">
                                    <div class="rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" 
                                         style="width: 80px; height: 80px; background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                                        <i class="fas fa-shield-alt fa-2x text-white"></i>
                                    </div>
                                    <h5 class="card-title fw-bold">{{ __('Securitate') }}</h5>
                                    <p class="card-text text-muted">{{ __('Actualizează setările de securitate') }}</p>
                                    <a href="#" class="btn btn-sm rounded-pill px-4" 
                                       style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); color: white;">
                                        {{ __('Gestionează') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mt-5">
                        <a href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); document.getElementById('logout-form-bottom').submit();"
                           class="btn btn-danger rounded-pill px-5 py-2 shadow-sm">
                            <i class="fas fa-sign-out-alt me-2"></i>{{ __('Deconectare') }}
                        </a>
                        <form id="logout-form-bottom" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
    }
</style>
@endsection
