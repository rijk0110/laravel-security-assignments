@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Nieuwe delivery aanmaken</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('deliveries.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Naam</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="open">Open</option>
                    <option value="closed">Gesloten</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="order_deadline" class="form-label">Besteldeadline</label>
                <input type="date" name="order_deadline" id="order_deadline" class="form-control" value="{{ old('order_deadline') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>
@endsection
