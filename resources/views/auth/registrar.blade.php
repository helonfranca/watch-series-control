<x-layout title="Cadastro">
    <div class="text-center mt-5">
        <form class="form-signin" action="{{route('registrar')}}" method="post">
            @csrf

            <img class="rounded mb-4" src="{{ asset('img/cs-logo.jpg') }}" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Controle de Séries - Cadastro</h1>

            <input type="text" id="Nome" class="form-control" placeholder="Seu primeiro nome" name="name" autocomplete="username">

            <input type="email" id="Email" class="form-control mt-2" placeholder="Seu email" name="email" autocomplete="username" autofocus>

            <input type="password" id="Password" class="form-control mt-2" placeholder="Senha" name="password" autocomplete="current-password">

            <input type="password" id="ConfirmPassword" class="form-control mt-2" placeholder="Repita sua Senha" name="confirm_password" autocomplete="current-password">

            <div class="d-flex justify-content-between">
                <button class="btn btn-outline-dark btn-lg btn-block m-3" type="submit">Enviar</button>
                <a class="btn btn-outline-dark btn-lg btn-block m-3"  href="{{route('welcome')}}">Voltar</a>
            </div>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger mt-3">
                        <span class="align-middle">{{ $error }}</span>
                </div>
                @endforeach
            @endif
        </form>
        <p class="mt-4 mb-3 text-muted">&copy; 2023 - by Helon de França</p>
    </div>
</x-layout>
