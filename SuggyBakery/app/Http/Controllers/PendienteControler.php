<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendiente;

class PendienteController extends Controller
{
    public function index()
    {
        $pendientes = Pendiente::all();
        return view('pendientes.index', compact('pendientes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'items' => 'required|array',
            'items.*.nombre' => 'required|string',
            'items.*.valor' => 'required|integer|min:1|max:10',
        ]);

        foreach ($data['items'] as $item) {
            Pendiente::create($item);
        }

        return redirect()->back()->with('success', 'Pendientes guardados exitosamente.');
    }
}
