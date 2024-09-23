{{-- Puxando o layout --}}
@extends('layouts.layout_admin')

{{-- Mudando o título da página dinamicamente --}}
@section('view-title', 'Login - Administrador')

{{-- Conteúdo da página --}}
@section('content')

    <div id="login-area">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center vh-100">

                <div id="login-box" class="col-md-6">

                    {{-- Título de Login --}}
                    <h1 class="roboto-medium text-center mb-5">Login</h1>

                    {{-- Form Login --}}

                    <form action="/admin/login" method="POST">
                    
                        @csrf

                        {{-- Input de Email --}}
                        <h2 class="roboto-regular mb-3">E-mail</h2>
                        <div class="form-floating mb-3">

                            {{-- Input e Label de Email --}}
                            <input type="email" class="form-control" id="user" name="user" placeholder="nome@exemplo.com" required>
                            <label for="user">Insira seu e-mail</label>

                            {{-- Mensagem de erro para o usuário --}}
                            @error('user')
                                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center mt-3" role="alert">
                                    <span class="jam--triangle-danger-f bi flex-shrink-0 me-2"></span>
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @enderror

                        </div>

                        {{-- Input de Senha --}}
                        <h2 class="roboto-regular mb-3">Senha</h2>
                        <div class="form-floating mb-5">

                            {{-- Input e Label de Senha --}}
                            <input type="password" class="form-control" id="pass" name="pass" placeholder="Senha" required>
                            <label for="pass">Insira sua senha</label>

                            {{-- Mensagem de erro para a senha --}}
                            @error('pass')
                                <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center mt-3" role="alert">
                                    <span class="jam--triangle-danger-f bi flex-shrink-0 me-2"></span>
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @enderror
                        
                        </div>

                        {{-- Botão de Entrar --}}
                        <div class="d-flex justify-content-center">
                            <button class="main-btn" type="submit" name="submit">Entrar</button> 
                        </div>
                        
                    </form>

                    {{-- Verificação e exibição de mensagem de sucesso --}} 
                    @if(session('success'))
                       <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                       </div>
                    @endif

                    {{-- Verificação e exibição de mensagem de erro --}}
                    @if(session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection