<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atraso;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;

class AtrasoController extends Controller
{
    //
    public function index(Request $request)
    {
        // Lógica para obter os dados atrasados com base no ID
        $atrasos = Atraso::all();
        $user = User::find(Auth::id());

        foreach ($atrasos as $atraso) {
            // Adicione esta linha para obter o nome do usuário associado ao ID
            $atraso->nome_usuario = $this->getNomeUsuario($user->id);

            $atraso->tempo_atraso = $this->calcularTempoAtraso($atraso->dt_data_atribuicao, $atraso->qtd_dias);
        }

        return view('admin.atraso.index', ['atrasos' => $atrasos]);
    }

    public function create(Request $request)
    {
        // Validar os dados do formulário, se necessário.
        $this->validate($request, [
            // Adicione regras de validação aqui, se necessário.
        ]);

        $user = User::find(Auth::id());

        // Criar um novo atraso usando os dados do formulário.
        Atraso::create([
            'it_id_tarefa_usuario' => $request->it_id_tarefa_usuario,
            'qtd_dias' => $request->qtd_dias,
            'id_user' => $user->id,
            // Adicione outras colunas conforme necessário.
        ]);

        // Redirecionar o usuário para uma view ou rota específica.
        return redirect()->route('index');
    }

    public function update(Request $request, $id)
    {
        // Encontrar o atraso que você deseja atualizar.
        $atraso = Atraso::findOrFail($id);
        $user = User::find(Auth::id());

        // Validar os dados do formulário, se necessário.
        $this->validate($request, [
            // Adicione regras de validação aqui, se necessário.
        ]);

        // Atualizar os dados do atraso com base nos dados do formulário.
        $atraso->update([
            'it_id_tarefa_usuario' => $request->it_id_tarefa_usuario,
            'qtd_dias' => $request->qtd_dias,
            'id_user' => $user->id,
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

    private function calcularTempoAtraso($dataAtribuicao, $qtdDias,)
    {
        // Configurar o fuso horário para Casablanca
        $fusoHorario = 'Africa/Casablanca';

        // Obter a data atual com o fuso horário configurado
        $dataAtual = Carbon::now($fusoHorario);

        // Remover a hora e minutos da data de atribuição
        $dataAtribuicao = Carbon::parse($dataAtribuicao, $fusoHorario)->startOfDay();

        // Calcular a data de término com base nos dias fornecidos
        $dataTermino = $dataAtribuicao->copy()->addDays($qtdDias);

        // Calcular a diferença em dias, horas e minutos
        $diferenca = $dataTermino->diff($dataAtual);

        return [
            'dias' => $diferenca->days,
            'horas' => $diferenca->h,
            'minutos' => $diferenca->i,
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
    // Adicione este método ao seu controlador para obter o nome do usuário
    private function getNomeUsuario($userId)
    {
        $usuario = User::find($userId);
    
        if ($usuario) {
            return $usuario->name; // Substitua 'nome' pela coluna real do nome na tabela users
        }
    
        return 'Usuário não encontrado';
    }
}
