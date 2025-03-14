<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    // Index: Lijst van alle deliveries
    public function index()
    {
        $delivery = Delivery::paginate(20);
        return view('delivery.index', compact('delivery'));
    }

    // Show: Details van één delivery
    public function show(Delivery $delivery)
    {
        return view('delivery.show', compact('delivery'));
    }

    // Create: Form voor nieuwe delivery
    public function create()
    {
        return view('delivery.create');
    }

    // Store: Opslaan van nieuwe Bar met validatie
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|string',
            'order_deadline' => 'required|string'
        ]);

        Delivery::create($validated);

        return redirect()->route('delivery.index')->with('success', 'delivery succesvol toegevoegd!');
    }

    // Edit: Form voor bewerken van bestaande delivery
    public function edit(Delivery $delivery)
    {
        return view('delivery.edit', compact('delivery'));
    }

    // Update: Opslaan van bewerkte delivery met validatie
    public function update(Request $request, Delivery $delivery)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|string',
            'order_deadline' => 'required|string'
        ]);

        $delivery->update($validated);

        return redirect()->route('delivery.index')->with('success', 'delivery succesvol bijgewerkt!');
    }

    // Delete: Verwijderen van een Bar
    public function destroy(Delivery $delivery)
    {
        $delivery->delete();

        return redirect()->route('delivery.index')->with('success', 'delivery succesvol verwijderd!');
    }
}
