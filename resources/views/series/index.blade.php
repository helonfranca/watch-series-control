<x-layout title="Séries assistidas">
    <div class="border rounded container ">
        <div class="d-flex justify-content-end align-items-end mt-4">
            <a class="btn btn-outline-dark" href="{{route('logout')}}">Logout</a>
        </div>

        <h1 class="text-center mt-2 mb-5">Controle de Séries Assistidas do {{ session('nome_usuario') }}</h1>

        <table class="table table-bordered">
            <thead class="table-dark">
            <tr>
                <th scope="col" class="text-center">Nº</th>
                <th scope="col" class="text-center">Nome da Série</th>
                <th scope="col" class="text-center col-md-5">Ações</th>
            </tr>
            </thead>
            <tbody>
            @php
                $count = 1;
            @endphp
            @foreach ($series as $serie)
                <tr>
                    <th scope="row" class="text-center">{{ $count++ }}</th>
                    <td class="text-center align-middle mt-lg-2">{{ $serie->nome }}</td>
                    <td>
                        <div class="d-flex justify-content-center my-1">
                            <a href="{{ route('series.visualizar', $serie->id) }}" class="btn btn-outline-dark btn-block me-2">Visualizar</a>
                            <a href="{{ route('series.pageUpdate', $serie->id) }}" class="btn btn-outline-dark  me-2">Editar</a>
                            <a href="{{ route('series.confirmDelete', $serie->id) }}" class="btn btn-outline-dark ">Remover</a>
                        </div>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{route('series.create')}}" class="btn btn-outline-dark  my-2" >Adicionar novas séries</a>
    </div>
</x-layout>
