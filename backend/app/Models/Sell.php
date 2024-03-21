<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sell extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'sells';
    
    protected $fillable = [
        'user_id',
        'data',
        'descrizione',
        'importo',
    ];
    
    protected $hidden = [
        'user_id',
        'deleted_at',        
        'created_at',
        'updated_at',
    ]; 
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function documents(){
        return $this->morphMany(Document::class, 'documentable');
    }
    
}
