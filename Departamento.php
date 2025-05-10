<?php

namespace App\Models; 
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model{
    protected $table = "departamentos";
    protected $fillable = ["Nome","QuantidadeFuncionario", "descrição", "funcionario_id"];

    public function funcionarios(){
        return $this->hasMany(
            Funcionario::class,
            "funcionario_id",
            "id"
        );
    }
}