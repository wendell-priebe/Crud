<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateClientsFormRequest;
use App\Models\Clients;
use App\Models\GlobalPages;
use Illuminate\Http\Request;
use PDO;

class ClientsController extends Controller
{
    protected $model;
    public function __construct(Clients $clients)
    {
        $this->model = $clients;
    }

    public function index(Request $req){
        $clients = $this->model
            ->getClients(search: $req->get('search', ''));

        return view('clients.index', compact('clients')); // ou
        // FAZER ->paginate(10)
        //   return view('clients.index', [
        //    'clients' => $clients 
        // ]);
    }

    public function show($id){
        if(!$client = $this->model->where('id', $id)->first()){
            return redirect()->route('clients.index');
        }else{
            $client = $this->model->where('id', $id)->first();
            return view('clients.show', compact('client'));
        }
    }

    public function create(){
        return view('clients.create');
    }

    // dentro da pasta Requests é criado o aruivo de validação e chamado na função
    public function store(StoreUpdateClientsFormRequest $req){ 
        //dd($req->all());

        $id = new GlobalPages();
        if($req->is_cpf == 'on'){
            $is_cpf = false;
        }else{
            $is_cpf = true;
        }

        $data = $req->all();
        $data['id'] = $id->uuid4();
        $data['is_cpf'] = $is_cpf;
        // $data['password'] = bcrypt($req->password);

        $this->model->create($data); // cadastrar

        return redirect()->route('clients.index');
 
    }

    public function edit($id){
        if(!$client = $this->model->where('id', $id)->first()){
            return redirect()->route('clients.index');
        }
        $client = $this->model->where('id', $id)->first();
        return view('clients.edit', compact('client'));
        
    }

    public function update(StoreUpdateClientsFormRequest $req, $id){
        if(!$client = $this->model->where('id', $id)->first()){
            return redirect()->route('clients.index');
        }
        if($req->is_cpf == 'on'){
            $is_cpf = false;
        }else{
            $is_cpf = true;
        }
        $data = $req->only('name', 'email', 'cpf_cnpj');
        $data['is_cpf'] = $is_cpf;
        $client->update($data);

        return redirect()->route('clients.index');
    }

    public function destroy($id){
        if(!$client = $this->model->where('id', $id)->first()){
            return redirect()->route('clients.index');
        }
        $client->delete();
        return redirect()->route('clients.index');
    }

}
