<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index()
    {
        $deliveries = Delivery::paginate(20);
        return view('delivery.index', compact('deliveries'));
    }

    public function show(Delivery $delivery)
    {
        return view('delivery.show', compact('delivery'));
    }

    public function create()
    {
        return view('delivery.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:open,closed',
            'order_deadline' => 'required|date|after:today',
        ]);

        Delivery::create($validated);

        return redirect()->route('deliveries.index')->with('success', 'Delivery succesvol toegevoegd!');
    }

    public function edit(Delivery $delivery)
    {
        return view('delivery.edit', compact('delivery'));
    }

    public function update(Request $request, Delivery $delivery)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:open,closed',
            'order_deadline' => 'required|date',
        ]);

        $delivery->update($validated);

        return redirect()->route('deliveries.index')->with('success', 'Delivery succesvol bijgewerkt!');
    }

    public function destroy(Delivery $delivery)
    {
        $delivery->delete();
        return redirect()->route('deliveries.index')->with('success', 'Delivery succesvol verwijderd!');
    }
}
