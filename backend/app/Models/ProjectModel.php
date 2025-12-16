<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectImage as Image;

class ProjectModel extends Model
{
    protected $table = 'project_data';
    protected $fillable = [
        'logo_project',
        'flyer_image',
        'project_name',
        'Company',
        'start_project',
        'end_project',
        'position',
        'description_project',
        'type',
        'type_project',
        'Tech',
        'feature',
        'link_website',
        'link_app',
    ];
    
    protected $casts = [
        'Tech' => 'array'
    ];

    public function getPreviewImage(){
        return $this->hasMany(Image::class, 'id_Project');
    }
}
