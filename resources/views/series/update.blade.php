<x-layout title="Editar Série">
    <div class="border rounded container my-4 p-4">
    <h1 class="text-center my-4"> Edição da Série {{ $serie->nome }}</h1>
    <form action="{{ route('series.update', $serie->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label my-xl-2">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" value="{{ $serie->nome }}">

            <label for="descricao" class="form-label my-xl-2">Descrição:</label>
            <input type="text" id="descricao" name="descricao" class="form-control" value="{{ $serie->descricao }}">

            <div class="input-group mt-4">
                <label class="input-group-text " for="avaliacao">Avaliação:</label>
                <select class="form-select" id="avaliacao" name="avaliacao">
                    <option value="Horrível" {{ $serie->avaliacao === 'Horrível' ? 'selected' : '' }}>Horrível</option>
                    <option value="Ruim" {{ $serie->avaliacao === 'Ruim' ? 'selected' : '' }}>Ruim</option>
                    <option value="Nem bom nem ruim" {{ $serie->avaliacao === 'Nem bom nem ruim' ? 'selected' : '' }}>Nem bom nem ruim</option>
                    <option value="Bom" {{ $serie->avaliacao === 'Bom' ? 'selected' : '' }}>Bom</option>
                    <option value="Muito bom" {{ $serie->avaliacao === 'Muito bom' ? 'selected' : '' }}>Muito bom</option>
                    <option value="Extremamente bom" {{ $serie->avaliacao === 'Extremamente bom' ? 'selected' : '' }}>Extremamente bom</option>
                </select>
            </div>

            <label for="imagem" class="form-label my-xl-2">Imagem:</label>
            <input type="file" id="imagem" name="imagem" class="form-control">
        </div>

        <button type="submit" class="btn btn-outline-dark me-2">Atualizar</button>
        <a href="{{ route('series.index') }}" class="btn btn-outline-dark">Cancelar</a>
    </form>
    </div>
</x-layout>
