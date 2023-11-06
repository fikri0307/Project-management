<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class project extends Model
{
    use HasFactory;
    protected $fillable = ['id','name','description','Status_id','owner_id','project_statuses_id','updated_at','created _at','name'];

// public function show($id)
// {
//     $projectManager = User::role('project-management')->get();
//     $project = $this->projectRepository->find($id);


//     return view('projects.show', compact('projectManager', 'status'))->with('project', $project);
// }
public function project_status(): BelongsTo
    {
        return $this->belongsTo(project_statuses::class,"project_statuses_id");
    }

public function owner(): BelongsTo{

    return $this->belongsTo(users::class,"owner_id");
}

public function status(): BelongsTo{

    return $this->belongsTo(Project_statuses::class,"project_statuses_id");
}
}