<x-main>
<div class="container">
    <h1>Details van {{ $delivery->name }}</h1>

    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $delivery->id }}</li>
        <li class="list-group-item"><strong>Naam:</strong> {{ $delivery->name }}</li>
        <li class="list-group-item"><strong>Status:</strong> {{ $delivery->status }}</li>
        <li class="list-group-item"><strong>Order Deadline</strong> {{ $delivery->order_deadline }}</li>
    </ul>

    <a href="{{ route('delivery.index') }}" class="btn btn-secondary mt-3">Terug</a>
</div>
</x-main>
