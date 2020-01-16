<?php 
namespace App\Repositories;
use Auth;
use App\Models\Categorias;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DateTime;
use App\Http\Requests\CategoriasRequest;

class CategoriasRepository
{
    public function get($id){
        $categoria = Categorias::find($id);
    	return $categoria;
    }

	public function getAll(){
        $list = Categorias::all();
    	return $list;
    }
    public function getList(){
        $list = Categorias::orderBy('id', 'DESC')->paginate(10);;
    	return $list;
    }

    public function store(CategoriasRequest $request){
        $categoria = Categorias::create([
            'nombre' => $request->input('nombre'), 
            'descripcion' => $request->input('descripcion')
        ]);
        return $categoria;
    }

    public function update(CategoriasRequest $request){
		$categoria = Categorias::find($request->input('id'));
        $categoria->nombre = $request->input('nombre');
        $categoria->descripcion = $request->input('descripcion');
        $categoria->save();
	}

    public function delete($id){
        $categoria = Categorias::find($id);
        $categoria->delete();
	}
}