<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Filament\Resources\Form;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function store(Request $request ,Form $form)
    {

        $request->validate([
            'team' => 'required|array',
            'team.*' => 'exists:users,id,role,teams', // Validasi bahwa pengguna dengan peran "teams" tersedia
        ]);

        $form->store();

        return redirect(route('filament.resources.projects.index'));
    }
}
