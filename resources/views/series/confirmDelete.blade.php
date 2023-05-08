<x-layout title="Confirmar Exclusão da Série {{ $serie->nome }}">
    <div class="border d-flex flex-column justify-content-center align-items-center mt-3">
        <div class="text-center my-4">
            <h1>Confirmar Exclusão</h1>
        </div>
        <div class="text-center my-2">
            <h4 class="font-weight-bold">Você tem certeza que deseja excluir a série {{ $serie->nome }}?</h4>
        </div>
        <div class="my-3">
            <form action="{{ route('series.delete', $serie->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger me-2">Excluir</button>
                <a href="{{ route('series.index') }}" class="btn btn-outline-dark">Cancelar</a>
            </form>
        </div>
    </div>
</x-layout>
