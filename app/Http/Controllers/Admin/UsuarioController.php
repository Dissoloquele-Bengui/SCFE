<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logger;
use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function __construct(){

        $this->logger=new Logger();

    }
    public function loggerData($mensagem){

        $this->logger->Log('info',$mensagem);
    }

    public function index(){
        $data['users']=User::all();
        $this->loggerData("Listou Categoria Estagiários");

        return view('admin.usuario.index', $data);

    }

    //method create
    public function create(){


        return view('admin.usuario.create.index');
    }

    //store method


    public function store(Request $request){
        $request->validate([
            'vc_nome'=>'required',
            'vc_email'=>'required',
            'vc_password'=>'required',
            'vc_classe'=>'required',
            'vc_tipo'=>'required',
        ],[
            'vc_nome.required'=>'O nome é um campo obrigatório',


        ]);


        try{
            $user=User::create([
                'vc_nome'=>$request->vc_nome,
                'vc_email'=>$request->vc_email,
                'vc_password'=>$request->vc_password,
                'vc_classe'=>$request->vc_classe,
                'vc_tipo'=>$request->vc_tipo,


            ]);

             $this->loggerData(" Cadastrou o estagiaário " . $request->vc_nome);

            return redirect()->back()->with('usuario.create.success',1);

         } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('usuario.create.error',1);
        }



    }

    //method show

    public function show(int $id)
    {
        //
    }


    public function edit(int $id)
    {
        //
        $data['users']=User::all();


        return view('admin.usuario.edit.index',$data);
    }


    public function update(Request $request, int $id)
    {
       $request->validate([
           'vc_nome'=>'required',
           'vc_email'=>'required',
           'vc_password'=>'required',
           'vc_classe'=>'required',
           'vc_tipo'=>'required',

       ],[
           'vc_nome.required'=>'O nome é um campo obrigatório',

       ]);
         try {
            //code...
            $user = User::find($id);

            $c =User::findOrFail($id)->update([
               'vc_nome'=>$request->vc_nome,
               'vc_email'=>$request->vc_email,
               'vc_password'=>$request->vc_password,
               'vc_classe'=>$request->vc_classe,
               'vc_tipo'=>$request->vc_tipo,

            ]);
           $this->loggerData("Editou o usuário que possui o id $user->id  e nome  $user->vc_nome");
            return redirect()->back()->with('usuario.update.success',1);
         } catch (\Throwable $th) {
            return redirect()->back()->with('usuario.update.error',1);
         }
    }

    public function destroy(int $id)
    {
        //
        try {
            //code...
            $user =User::findOrFail( $id);

            User::findOrFail($id)->delete();
            $this->loggerData(" Eliminou o usuário , ($user->vc_nome)");
            return redirect()->back()->with('usuario.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('usuario.destroy.error',1);
        }
    }

    public function purge(int $id)
    {
        //
        try {
            //code...
            $user = User::findOrFail($id);
            User::findOrFail($id)->forceDelete();
            $this->loggerData(" Purgou o usuário  ($user->vc_nome)");
            return redirect()->back()->with('usuario.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('usuario.purge.error',1);
        }
    }





}


