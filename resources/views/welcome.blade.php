<x-layout title="Login">
    <div class="text-center mt-5">
        <form class="form-signin" action="{{route('login')}}" method="post" >
            @csrf

            <img class="rounded mb-4" src="{{ asset('img/cs-logo.jpg') }}" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Controle de Séries - Faça login</h1>

            <input type="email" id="Email" class="form-control" placeholder="Seu email" name="email" autocomplete="username" autofocus>
            <input type="password" id="Password" class="form-control mt-2" placeholder="Sua Senha" name="password"  autocomplete="current-password">

            <div class="d-flex justify-content-between">
                <button class="btn btn-outline-dark btn-lg btn-block m-3" type="submit">Login</button>
                <a class="btn btn-outline-dark btn-lg btn-block m-3"  href="{{route('auth.registrar')}}">Registrar-se</a>
            </div>

            @if (session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger text-center mt-3">
                        <span>{{ $error }}</span>
                </div>
                @endforeach
            @endif

        </form>
        <p class="mt-4 mb-3 text-muted">&copy; 2023 - by Helon de França</p>
    </div>
</x-layout>
