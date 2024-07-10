@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pendiente a pago</h1>

    <form action="{{ route('pendientes.store') }}" method="POST" id="pendientesForm">
        @csrf
        <div id="itemsContainer">
            <div class="row mb-2">
                <div class="col">
                    <input type="text" name="items[0][nombre]" class="form-control" placeholder="Nombre" required>
                </div>
                <div class="col">
                    <select name="items[0][valor]" class="form-control" required>
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>
        <button type="button" id="addItem" class="btn btn-secondary">+</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>

<script>
let itemCount = 1;

document.getElementById('addItem').addEventListener('click', function() {
    const container = document.getElementById('itemsContainer');
    const newRow = document.createElement('div');
    newRow.className = 'row mb-2';
    newRow.innerHTML = `
        <div class="col">
            <input type="text" name="items[${itemCount}][nombre]" class="form-control" placeholder="Nombre" required>
        </div>
        <div class="col">
            <select name="items[${itemCount}][valor]" class="form-control" required>
                ${[...Array(10)].map((_, i) => `<option value="${i+1}">${i+1}</option>`).join('')}
            </select>
        </div>
    `;
    container.appendChild(newRow);
    itemCount++;
});
</script>
@endsection
