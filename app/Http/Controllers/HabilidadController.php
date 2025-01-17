<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Habilidad;
use App\Usuario;
use Illuminate\Support\Facades\Auth;

class HabilidadController extends Controller
{
    public function create()
    {
        return view('habilidad.create', [
            'habilidad' => new Habilidad,
        ]);
    }

    public function store()
    {
        request()->validate([
            'descripcion' => 'required',
            'dominio' => 'required|numeric|min:1|max:10',
        ]);

        $user = Auth::user();
        $user->habilidades()->create(request()->all());

        return redirect('/');
    }

    public function edit($id)
    {
        return view('habilidad.edit', [
            'habilidad' => Habilidad::find($id),
        ]);
    }

    public function update($id)
    {
        request()->validate([
            'descripcion' => 'required',
            'dominio' => 'required|numeric|min:1|max:10',
        ]);

        Habilidad::find($id)->update(request()->all());

        return redirect('/');
    }
}
