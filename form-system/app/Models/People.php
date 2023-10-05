<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    // protected $photo;

    protected $table = 'peoples';

    public function getPhotoAttribute()
    {
        // dd($this->get('photo'));

        return $this->attributes['photo'] ?: 'https://fopiess.org.br/wp-content/uploads/freshizer/0b1f361e677313b6aef1865d15def4f9_default1-600-600-c-63.jpg';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'birth',
        'photo',
    ];

    protected $casts = [
        'birth' => 'date',
    ];

    public static $rulesMessages = [
        'cNome.required'     => 'O campo nome é obrigatório.',
        'cNome.string'       => 'O campo nome deve ser uma string.',
        'cNome.max'          => 'O campo nome deve ter no máximo 255 caracteres.',
        'cEmail.required'    => 'O campo e-mail é obrigatório.',
        'cEmail.email'       => 'O campo e-mail deve ser um e-mail válido.',
        'cEmail.max'         => 'O campo e-mail deve ter no máximo 255 caracteres.',
        'cDataNasc.required' => 'O campo data de nascimento é obrigatório.',
        'cDataNasc.max_age'  => 'A idade máxima permitida é de 120 anos.',
        'cDataNasc.date'     => 'O campo data de nascimento deve ser uma data válida.',
        'cFoto.image'        => 'O campo foto deve ser uma imagem válida.',
        'cFoto.max'          => "Por favor, escolha outra foto. O tamanho da foto não pode ser maior do que 200kb.",
    ];

}
