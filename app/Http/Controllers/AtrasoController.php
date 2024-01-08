<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atraso;

class AtrasoController extends Controller
{
    //
    public function index(Request $id)
    {
        // Lógica para obter os dados atrasados com base no ID
        $dadosAtrasados = Atraso::where('it_id_tarefa_usuario', $id)->get();

        return view('admin.atraso.index', ['dadosAtrasados' => $dadosAtrasados]);
    }

    public function create(Request $request)
    {
        // Validar os dados do formulário, se necessário.
        $this->validate($request, [
            // Adicione regras de validação aqui, se necessário.
        ]);

        // Criar um novo atraso usando os dados do formulário.
        Atraso::create([
            'it_id_tarefa_usuario' => $request->it_id_tarefa_usuario,
            'qtd_dias' => $request->qtd_dias,
            // Adicione outras colunas conforme necessário.
        ]);

        // Redirecionar o usuário para uma view ou rota específica.
        return redirect()->route('index');
    }

    public function update(Request $request, $id)
    {
        // Encontrar o atraso que você deseja atualizar.
        $atraso = Atraso::findOrFail($id);

        // Validar os dados do formulário, se necessário.
        $this->validate($request, [
            // Adicione regras de validação aqui, se necessário.
        ]);

        // Atualizar os dados do atraso com base nos dados do formulário.
        $atraso->update([
            'it_id_tarefa_usuario' => $request->it_id_tarefa_usuario,
            'qtd_dias' => $request->qtd_dias,
            // Adicione outras colunas conforme necessário.
        ]);

        // Redirecionar o usuário para uma view ou rota específica.
        return redirect()->route('index');
    }

    public function delete($id)
    {
        // Encontrar o atraso que você deseja excluir.
        $atraso = Atraso::findOrFail($id);

        // Excluir o atraso.
        $atraso->delete();

        // Redirecionar o usuário para uma view ou rota específica.
        return redirect()->route('index');
    }

    public function purge($id)
    {
        // Encontrar o atraso que você deseja purgar (remover permanentemente).
        $atraso = Atraso::withTrashed()->findOrFail($id);

        // Remover permanentemente o atraso.
        $atraso->forceDelete();

        // Redirecionar o usuário para uma view ou rota específica.
        return redirect()->route('index');
    }
}
