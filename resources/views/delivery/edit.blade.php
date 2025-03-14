<x-main>
<div class="container">
    <h1>Delivery Bewerken</h1>

    <form action="{{ route('delivery.update', $delivery) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Naam</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $delivery->name) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">status</label>
            <textarea name="status" class="form-control">{{ old('status', $delivery->status) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Order Deadline</label>
            <input type="text" name="order_deadline" class="form-control" value="{{ old('order_deadline', $delivery->order_deadline) }}">
        </div>

        <button type="submit" class="btn btn-success">Opslaan</button>
    </form>
</div>
</x-main>
