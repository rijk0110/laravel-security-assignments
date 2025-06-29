{{-- resources/views/delivery/index.blade.php --}}
<x-main>
    <div class="container">
        <h1>Leveringen</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('deliveries.create') }}" class="btn btn-primary mb-3">Nieuwe levering toevoegen</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Status</th>
                    <th>Besteldeadline</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deliveries as $delivery)
                    <tr>
                        <td>{{ $delivery->name }}</td>
                        <td>{{ $delivery->status }}</td>
                        <td>{{ $delivery->order_deadline }}</td>
                        <td>
                            <a href="{{ route('deliveries.show', $delivery) }}" class="btn btn-info btn-sm">Bekijken</a>
                            <a href="{{ route('deliveries.edit', $delivery) }}" class="btn btn-warning btn-sm">Bewerken</a>
                            <form action="{{ route('deliveries.destroy', $delivery) }}" method="POST" class="d-inline" onsubmit="return confirm('Weet je zeker dat je dit wilt verwijderen?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $deliveries->links() }}
    </div>
</x-main>
