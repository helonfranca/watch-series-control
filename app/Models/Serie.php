<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;
    protected $fillable =['nome', 'descricao', 'imagem','avaliacao','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
