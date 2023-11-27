<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class ProjectController
{
    /**
     * Store a newly created Project in storage.
     */
    public function store(Request $request)
    {
        $form->store();

        Flash::success('Project saved successfully.');
    
        return redirect(route('filament.resources.projects.index'));
        return redirect(route('projects.index'));
    }

    
   
}
