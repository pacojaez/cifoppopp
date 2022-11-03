<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'texto',
        'vigencia',
        'importe',
        'rejected'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function anuncio(){
        return $this->belongsTo(Anuncio::class)->withTrashed();
    }
}
