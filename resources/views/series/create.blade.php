<x-layout title="Nova Série">
    <div class="border rounded container my-2 p-4">
        <div class="mb-4">
            <h1 class="text-center my-4">Adicione os dados sobre a sua série</h1>
        </div>
        <div>
            <form action="/series/salvar" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="mb-3">
                    <label for="nome" class="form-label my-2 mt-2-">Nome:</label>
                    <input type="text" id="nome" name="nome" class="form-control">

                    <label for="descricao" class="form-label my-xl-2">Descrição:</label>
                    <input type="text" id="descricao" name="descricao" class="form-control">

                    <div class="input-group mt-4">
                        <label class="input-group-text " for="avaliacao">Avaliação:</label>
                        <select class="form-select" id="avaliacao" name="avaliacao">
                            <option value="Horrível">Horrível</option>
                            <option value="Ruim">Ruim</option>
                            <option value="Nem bom nem ruim">Nem bom nem ruim </option>
                            <option value="Bom" selected>Bom</option>
                            <option value="Muito bom">Muito bom</option>
                            <option value="Extremamente bom">Extremamente bom</option>
                        </select>
                    </div>

                    <label for="imagem" class="form-label my-xl-2">Imagem:</label>
                    <input type="file" id="imagem" name="imagem" class="form-control">
                </div>
                <button type="submit" class="btn btn-outline-dark me-2">Adicionar</button>
                <a href="{{ route('series.index') }}" class="btn btn-outline-dark ">Cancelar</a>
            </form>
        </div>
    </div>
</x-layout>
