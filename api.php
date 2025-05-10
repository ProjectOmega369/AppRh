<?php

use App\Models\Funcionario;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/funcionarios', function (Request $request) {
    $funcionario = new Funcionario();
    $funcionario->Nome = $request->input('Nome');
    $funcionario->Email = $request->input('Email');
    $funcionario->Telefone = $request->input("Telefone");
    $funcionario->save();
    return response()->json($funcionario); 
});


Route::get('/funcionarios' , function () {
    $funcionario = Funcionario::all();
    return response()->json($funcionario);
});


Route::get('/funcionarios/{id}' , function ($id) {
    $funcionario = Funcionario::find($id);
    return response()->json($funcionario);
});


Route::patch('/funcionarios/{id}', function (Request $request, $id) {
    $funcionario = Funcionario::find($id);
    if($request->input('Nome') !== null){
    $funcionario->Nome = $request->input('Nome');
    }
    if($request->input('Email') !== null){
    $funcionario->Email = $request->input('Email');
    }
    if($request->input('Telefone') !== null){
    $funcionario->Telefone = $request->input('Telefone');
    }
    $funcionario->save();
    return response()->json($funcionario);
});



Route::delete('/funcionarios/{id}' , function ($id) {
    $funcionario = Funcionario::find($id);
    $funcionario->delete();
    return response()->json($funcionario);
});



Route::post('/departamentos', function (Request $request) {
    $departamento = new Departamento();
    $departamento->Nome = $request->input('Nome');
    $departamento->QuantidadeFuncionario = $request->input('QuantidadeFuncionario');
    $departamento->descrição = $request->input("descrição");
    $departamento->funcionario_id = $request->input("funcionario_id");
    $funcionario = Funcionario::find("funcionario_id");
    $departamento->funcionario()->associate($funcionario);
    $departamento->save();
    return response()->json($departamento); 
});


Route::get('/departamentos' , function () {
    $departamento = Departamento::all();
    return response()->json($departamento);
});


Route::get('/departamentos/{id}' , function ($id) {
    $departamento = Departamento::find($id);
    return response()->json($departamento);
});

Route::patch('/departamentos/{id}', function (Request $request, $id) {
    $departamento = Departamento::find($id);
    if($request->input('Nome') !== null){
    $departamento->Nome = $request->input('Nome');
    }
    if($request->input('QuantidadeFuncionario') !== null){
    $departamento->QuantidadeFuncionario = $request->input('QuantidadeFuncionario');
    }
    if($request->input('descrição') !== null){
    $departamento->descrição = $request->input('descrição');
    }
    $departamento->save();
    return response()->json($departamento);
});

Route::delete('/departamentos/{id}' , function ($id) {
    $departamento = Departamento::find($id);
    $departamento->delete();
    return response()->json($departamento);
});


Route::get('/departamentos/funcionarios/{id}', function ($id) {
    $departamento = Departamento::find($id);
    $funcionario = $departamento->funcionario;
    return response()->json($departamento);
});

Route::get('/departamentos/funcionarios', function ($id) {
    $departamento = Departamento::with('funcionarios')->get();
    return response()->json($departamento);
});


Route::get('/funcionarios/departamento/{id}', function ($id) {
    $funcionario = Funcionario::find($id);
    $departamento = $funcionario->departamento;
    return response()->json($funcionario);
});
