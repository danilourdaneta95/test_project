<?php 
namespace App\Repositories;
use Auth;
use DateTime;
use Carbon\Carbon;
use App\Models\Productos;
use Illuminate\Http\Request;
use App\Http\Requests\ProductosRequest;
use Illuminate\Support\Facades\Storage;

class ProductosRepository
{
    public function get($id){
        $producto = Productos::find($id);
    	return $producto;
    }

	public function getList(){
        $list = Productos::orderBy('id', 'DESC')->paginate(10);
    	return $list;
    }

	public function getAll(){
        $list = Productos::all()->groupBy('id_categoria');
    	return $list;
    }

    public function store(ProductosRequest $request){
        $producto = new Productos();
        if ($request->hasFile('imagen')) {
            $producto->imagen = $request->file('imagen')->store('');          
        }
        $producto->nombre = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio = $request->input('precio');
        $producto->descuento = $request->input('descuento');
        $producto->id_categoria = $request->input('id_categoria');      
        $producto->save();
        return $producto;
    }

    public function update(ProductosRequest $request){
        $producto = Productos::find($request->input('id'));
        if ($request->hasFile('imagen')) {            
            Storage::delete($producto->imagen);
            $producto->imagen = $request->file('imagen')->store('');
        }
        $producto->nombre = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio = $request->input('precio');
        $producto->descuento = $request->input('descuento');
        $producto->id_categoria = $request->input('id_categoria');
        $producto->save();
	}

    public function delete($id){
        $categoria = Productos::find($id);
        $categoria->delete();
	}
	public function getByCategory($categoryid){
        $list = Productos::where('id_categoria', $categoryid)->get();
    	return $list;
    }
}