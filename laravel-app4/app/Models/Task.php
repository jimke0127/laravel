<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    //
    protected $fillable = ['name','desc','long_desc'];

    public function toggleComplete(){

        $this->completed = !$this->completed;
        $this->save();
        
    }
    
}
