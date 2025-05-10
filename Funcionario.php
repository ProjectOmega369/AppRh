<?php

namespace App\Models; 
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model{
    protected $table = "funcionarios";
    protected $fillable = ["Nome","Email","Telefone"];

    public function departamento(){
        return $this->belongsTo(
            Departamento::class,
            'funcionario_id',
            'id'
        );
    }
}