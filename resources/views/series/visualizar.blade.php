<x-layout title="Detalhes da Série">
    <div class="border container my-4 pb-4">
        <h1 class="text-center my-4" >Detalhes da Série</h1>

        <div class="card">
            <div class="row g-0">
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    <img style="width:200px; heigth: auto;" src="{{ asset('storage/' . $serie->imagem ) }}" alt="{{ $serie->nome }}" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h4 class="card-title my-4">{{ $serie->nome }}</h4>
                        <p class="card-text">{{ $serie->descricao }}</p>
                        <p class="card-text">Sua avaliação: {{ $serie->avaliacao }}</p>
                    </div>
                    <div class="d-flex justify-content-center ">
                        <a href="{{ route('series.index') }}" class="btn btn-outline-dark my-3 ">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
