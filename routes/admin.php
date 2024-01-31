<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Admin\OperadorController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('operadores', function () {
    return view('welcome');
});

Route::get('operadores', ['as' => 'admin.operadores', 'uses' => 'Admin\OperadorController@index']);




/*START Estagiários*/
Route::prefix('usuario')->group(function () {
    Route::get('index', ['as' => 'admin.usuario.index', 'uses' => 'Admin\UsuarioController@index']);
    Route::get('create', ['as' => 'admin.usuario.create', 'uses' => 'Admin\UsuarioController@create']);
    Route::post('store', ['as' => 'admin.usuario.store', 'uses' => 'Admin\UsuarioController@store']);
    Route::get('show/{id}', ['as' => 'admin.usuario.show', 'uses' => 'Admin\UsuarioController@show']);
    Route::get('edit/{id}', ['as' => 'admin.usuario.edit', 'uses' => 'Admin\UsuarioController@edit']);
    Route::post('update/{id}', ['as' => 'admin.usuario.update', 'uses' => 'Admin\UsuarioController@update']);
    Route::get('destroy/{id}', ['as' => 'admin.usuario.destroy', 'uses' => 'Admin\UsuarioController@destroy']);
    Route::get('purge/{id}', ['as' => 'admin.usuario.purge', 'uses' => 'Admin\UsuarioController@purge']);
});

/*END */

/*START PROJECTOS*/
Route::prefix('projecto')->group(function () {
    Route::get('index', ['as' => 'admin.projecto.index', 'uses' => 'Admin\ProjectoController@index']);
    Route::get('create', ['as' => 'admin.projecto.create', 'uses' => 'Admin\ProjectoController@create']);
    Route::post('store', ['as' => 'admin.projecto.store', 'uses' => 'Admin\ProjectoController@store']);
    Route::get('show/{id}', ['as' => 'admin.projecto.show', 'uses' => 'Admin\ProjectoController@show']);
    Route::get('edit/{id}', ['as' => 'admin.projecto.edit', 'uses' => 'Admin\ProjectoController@edit']);
    Route::post('update/{id}', ['as' => 'admin.projecto.update', 'uses' => 'Admin\ProjectoController@update']);
    Route::get('destroy/{id}', ['as' => 'admin.projecto.destroy', 'uses' => 'Admin\ProjectoController@destroy']);
    Route::get('purge/{id}', ['as' => 'admin.projecto.purge', 'uses' => 'Admin\ProjectoController@purge']);
});

/*END */
Route::prefix('tarefa')->group(function () {
    Route::get('index', ['as' => 'admin.tarefa.index', 'uses' => 'Admin\tarefaController@index']);
    Route::get('create', ['as' => 'admin.tarefa.create', 'uses' => 'Admin\tarefaController@create']);
    Route::post('store', ['as' => 'admin.tarefa.store', 'uses' => 'Admin\tarefaController@store']);
    Route::get('show/{id}', ['as' => 'admin.tarefa.show', 'uses' => 'Admin\tarefaController@show']);
    Route::get('edit/{id}', ['as' => 'admin.tarefa.edit', 'uses' => 'Admin\tarefaController@edit']);
    Route::post('update/{id}', ['as' => 'admin.tarefa.update', 'uses' => 'Admin\tarefaController@update']);
    Route::get('destroy/{id}', ['as' => 'admin.tarefa.destroy', 'uses' => 'Admin\tarefaController@destroy']);
    Route::get('purge/{id}', ['as' => 'admin.tarefa.purge', 'uses' => 'Admin\tarefaController@purge']);
});
/*START categoriaTarefa*/
Route::prefix('categoriaTarefa')->group(function () {
    Route::get('index', ['as' => 'admin.categoriaTarefa.index', 'uses' => 'Admin\CategoriaTarefaController@index']);
    Route::get('create', ['as' => 'admin.categoriaTarefa.create', 'uses' => 'Admin\CategoriaTarefaController@create']);
    Route::post('store', ['as' => 'admin.categoriaTarefa.store', 'uses' => 'Admin\CategoriaTarefaController@store']);
    Route::get('show/{id}', ['as' => 'admin.categoriaTarefa.show', 'uses' => 'Admin\CategoriaTarefaController@show']);
    Route::get('edit/{id}', ['as' => 'admin.categoriaTarefa.edit', 'uses' => 'Admin\CategoriaTarefaController@edit']);
    Route::post('update/{id}', ['as' => 'admin.categoriaTarefa.update', 'uses' => 'Admin\CategoriaTarefaController@update']);
    Route::get('destroy/{id}', ['as' => 'admin.categoriaTarefa.destroy', 'uses' => 'Admin\CategoriaTarefaController@destroy']);
    Route::get('purge/{id}', ['as' => 'admin.categoriaTarefa.purge', 'uses' => 'Admin\CategoriaTarefaController@purge']);
});

/*END categoriaTarefa*/




/*START CategoriaTituloHabitante*/
Route::prefix('categoria_titulo_habitante')->group(function () {
    Route::get('index', ['as' => 'admin.categoria_titulo_habitante.index', 'uses' => 'Admin\CategoriaTituloHabitanteController@index']);
    Route::get('create', ['as' => 'admin.categoria_titulo_habitante.create', 'uses' => 'Admin\CategoriaTituloHabitanteController@create']);
    Route::post('store', ['as' => 'admin.categoria_titulo_habitante.store', 'uses' => 'Admin\CategoriaTituloHabitanteController@store']);
    Route::get('show/{id}', ['as' => 'admin.categoria_titulo_habitante.show', 'uses' => 'Admin\CategoriaTituloHabitanteController@show']);
    Route::get('edit/{id}', ['as' => 'admin.categoria_titulo_habitante.edit', 'uses' => 'Admin\CategoriaTituloHabitanteController@edit']);
    Route::post('update/{id}', ['as' => 'admin.categoria_titulo_habitante.update', 'uses' => 'Admin\CategoriaTituloHabitanteController@update']);
    Route::get('destroy/{id}', ['as' => 'admin.categoria_titulo_habitante.destroy', 'uses' => 'Admin\CategoriaTituloHabitanteController@destroy']);
    Route::get('purge/{id}', ['as' => 'admin.categoria_titulo_habitante.purge', 'uses' => 'Admin\CategoriaTituloHabitanteController@purge']);
});

/*END CategoriaTituloHabitante*/






Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
