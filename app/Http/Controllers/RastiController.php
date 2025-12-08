<?php

namespace App\Http\Controllers;

use App\Models\Rasti;
use Illuminate\Http\Request;

class RastiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rasti = Rasti::latest()->paginate(10);
        return view('rasti.index', compact('rasti'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rasti.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'emer' => 'required|string|max:255',
            'rasti' => 'required|string|max:255',
            'lloji_i_rastit' => 'required|string|max:255',
        ]);

        Rasti::create($request->all());

        return redirect()->route('rasti.index')
            ->with('success', 'Rasti u krijua me sukses.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rasti $rasti)
    {
        return view('rasti.show', compact('rasti'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rasti $rasti)
    {
        return view('rasti.edit', compact('rasti'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rasti $rasti)
    {
        $request->validate([
            'emer' => 'required|string|max:255',
            'rasti' => 'required|string|max:255',
            'lloji_i_rastit' => 'required|string|max:255',
        ]);

        $rasti->update($request->all());

        return redirect()->route('rasti.index')
            ->with('success', 'Rasti u përditësua me sukses.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rasti $rasti)
    {
        $rasti->delete();

        return redirect()->route('rasti.index')
            ->with('success', 'Rasti u fshi me sukses.');
    }
}

