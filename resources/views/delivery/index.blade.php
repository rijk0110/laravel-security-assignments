<x-main>
<div class="container">
    <h1>Bar Items</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('delivery.create') }}" class="btn btn-primary mb-3">Nieuwe Delivery toevoegen</a>

    <table class="table is-fullwidth">
        <thead>
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>Status</th>
                <th>Order Deadline</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach($delivery as $delivery)
            <tr>
            <td>{{ $delivery->id }}</td>
                <td>{{ $delivery->name }}</td>
                <td>{{ $delivery->status }}</td>
                <td>{{ $delivery->order_deadline }}</td>
                <td>
                    <a href="{{ route('delivery.show', $delivery) }}" class="btn btn-info btn-sm">Details</a>
                    <a href="{{ route('delivery.edit', $delivery) }}" class="btn btn-warning btn-sm">Bewerken</a>
                    <form action="{{ route('delivery.destroy', $delivery) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Weet je zeker dat je deze delivery wilt verwijderen?')">
                            Verwijderen
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>
</x-main>
