<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Espetaculo extends Model
{
    protected $table = 'espetaculos';
    public $timestamps = true;
    protected $fillable = [
        'nomeEsp',
        'tempEsp',
        'duracaoEsp',
        'classifEsp',
        'descEsp',
        'urlCompra',
        'roteiristaEsp',
        'elencoEsp',
        'direcaoEsp',
        'figurinoEsp',
        'cenoEsp',
        'luzEsp',
        'sonoEsp',
        'producaoEsp',
        'costEsp',
        'cenoAssistEsp',
        'cenoTec',
        'designEsp',
        'coProducaoEsp',
        'agradecimentos',
    ];

   // Um espetáculo tem muitos dias
   public function dias()
{
    return $this->hasMany(EspDia::class, 'fk_id_esp');
}
    // Um espetáculo tem várias imagens
public function imagens()
{
    return $this->hasMany(EspImagem::class, 'fk_id_esp');
}
public function imagemPrincipal()
    {
        return $this->hasOne(EspImagem::class, 'fk_id_esp')->where('principal', true);
    }

    public function imagensOpcionais()
    {
        return $this->hasMany(EspImagem::class, 'fk_id_esp')->where('principal', false);
    }
    public function horarios()
    {
        return $this->hasManyThrough(EspHorario::class, EspDia::class, 'fk_id_esp', 'fk_id_dia', 'id', 'id');
    }
    protected $casts = [
        'trash' => 'boolean',
    ];
    
    protected $attributes = [
        'trash' => 0, // Valor padrão
    ];
    
   
}

