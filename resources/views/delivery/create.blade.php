<x-main>
<div class="container">
    <h1>Nieuwe Delivery Toevoegen</h1>

    <form action="{{ route('delivery.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Naam</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <textarea name="status" class="form-control">{{ old('status') }}</textarea>
            @error('status') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Order Deadline</label>
            <input type="text" name="order_deadline" class="form-control" value="{{ old('order_deadline') }}">
            @error('order_deadline') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Opslaan</button>
        <a href="{{ route('delivery.index') }}" class="btn btn-secondary mt-3">Terug</a>
    </form>
</div>
</x-main>
