@extends('base')

@section('content')
    <h1>Se connecter </h1>

    <div class="card">

        <div class="card-body">
            <form action="{{ route('auth.login') }}" method="post" class="vstack gap-3">
                @csrf
            
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" value="{{ old('email')}}">
                @error('email')
                    {{ $message }}
                @enderror


                <label for="password">Mot de passe</label>
                <input class="form-control" type="password" name="password" value="">
                @error('password')
                    {{ $message }}
                @enderror
            
                <button class="btn btn-primary">Se connecter</button>
            </form>

        </div>

    </div>
@endsection
