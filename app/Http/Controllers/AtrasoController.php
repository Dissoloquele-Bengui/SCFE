<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atraso;
use App\Models\Tarefa;
use Carbon\Carbon;

class AtrasoController extends Controller
{
    //
    public function index(Request $request)
    {
        // Lógica para obter os dados atrasados com base no ID
        $atrasos = Atraso::all();

        foreach ($atrasos as $atraso) {
            $atraso->tempo_atraso = $this->calcularTempoAtraso($atraso->dt_data_atribuicao, $atraso->dt_data_termino);
        }

        return view('admin.atraso.index', ['atrasos' => $atrasos]);
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

    private function calcularTempoAtraso($dataAtribuicao, $dataTermino)
    {
        $dataAtribuicao = Carbon::parse($dataAtribuicao);
        $dataTermino = Carbon::parse($dataTermino);

        // Calcular a diferença em dias, horas e semanas
        $diferenca = $dataTermino->diff($dataAtribuicao);

        return [
            'dias' => $diferenca->days,
            'horas' => $diferenca->h,
            'semanas' => floor($diferenca->days / 7),
        ];
    }

    public function registrarAtraso(Request $request)
    {
        $atraso = new Atraso();
        $atraso->it_id_tarefa_usuario = $request->it_id_tarefa_usuario;
        $atraso->dt_data_atribuicao = now(); // Ou utilize a data de atribuição fornecida pelo usuário

        // Calcular a data de término com base nos dias fornecidos
        $qtdDias = $request->qtd_dias;
        $atraso->dt_data_termino = Carbon::parse($atraso->dt_data_atribuicao)->addDays($qtdDias);

        $atraso->save();

        return redirect()->route('atraso.index'); // Ou qualquer outra rota após salvar
    }

    public function justificarAtraso($id)
    {
        // Lógica para obter os dados do atraso a ser justificado
        $atraso = Atraso::findOrFail($id);

        return view('admin.atraso.justificar', ['atraso' => $atraso]);
    }
}
