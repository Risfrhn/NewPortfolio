<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectModel as Project;

class ProjectImage extends Model
{
    protected $table = 'projects_images';
    protected $fillable = [
        'id_Project',
        'path_image'
    ];

    public function getProject(){
        return $this->belongsTo(Project::class, 'id_Project');
    }
}
