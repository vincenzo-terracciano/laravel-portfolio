<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    // collego i progetti alle tecnologie
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
