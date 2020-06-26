@extends('layouts.app')
@section('content')
    <div class="container py-3">
        <div class="row justify-content-center">
            @if(session()->has('mensagem')) 
                <div class="col-12 col-md-8">
                    <div class="alert {{ session()->get('alert') }}" role="alert">
                        {{ session()->get('mensagem') }}
                    </div>
                </div>
            @endif

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Alterar') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('perfil.atualizar', Auth::user()->id) }}">
                            @csrf
                            <input id="id" name="id" type="text" value="{{ Auth::user()->id }}" style="display: none;">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>



                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar senha') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-7">
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                    <a class="btn btn-danger" href="javascript: if(confirm('Deletar esse registro?')){ window.location.href = '{{ route('perfil.deletar', Auth::user()->id) }}' }">Deletar</a>

                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
