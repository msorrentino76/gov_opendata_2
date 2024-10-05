<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailableConstraints extends Model
{
    use HasFactory;
    
    protected $table = 'available_constraints';
    
    protected $fillable = ['dataflow_id', 'flow_ref', 'data_struct', 'key', 'json_value'];
    
}
