<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // collego i tipi di progetto
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    // collego le tecnologie del progetto
    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}
