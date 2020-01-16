<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductosRepository;
use App\Repositories\CategoriasRepository;
use App\Http\Requests\ProductosRequest;

class ProductosController extends Controller
{
    protected $products;
    public function __construct(ProductosRepository $products, CategoriasRepository $categories){
        $this->products = $products;
        $this->categories = $categories;
    }
    public function index ()
    {
        try{
            $productos = $this->products->getList();
            return view('productos.index')->with('productos', $productos);
        }
        catch(Exception $ex){
            return redirect()->back()->withErrors("Error: \n".$ex);
        }
    }
    public function create ()
    {
        try{
            $categorias = $this->categories->getAll();
            return view('productos.create')->with('categorias', $categorias);
        }
        catch(Exception $ex){
            return redirect()->back()->withErrors("Error: \n".$ex);
        }
    }    
    public function store (ProductosRequest $request)
    {
        try{
            $products = $this->products->store($request);
            return redirect()->route('Productos');
        }
        catch(Exception $ex){
            return redirect()->back()->withErrors("Error: \n".$ex);
        }
    }
    public function edit ($id)
    {
        try{
            $categorias = $this->categories->getAll();
            $producto = $this->products->get($id);
            return view('productos.edit')->with(['producto' => $producto, 'categorias' => $categorias]);
        }
        catch(Exception $ex){
            return redirect()->back()->withErrors("Error: \n".$ex);
        }
    } 
    public function update (ProductosRequest $request)
    {
        try{
            $producto = $this->products->update($request);
            return redirect()->route('Productos');
        }
        catch(Exception $ex){
            return redirect()->back()->withErrors("Error: \n".$ex);
        }
    }
    public function show($id)
    {
        try{
            $producto = $this->products->get($id);
            return view('productos.show')->with('producto', $producto);
        }
        catch(Exception $ex){
            return redirect()->back()->withErrors("Error: \n".$ex);
        }
    }
    public function destroy ($id)
    {
        try{
            $this->products->delete($id);
            return redirect()->route('Productos');
        }
        catch(Exception $ex){
            return redirect()->back()->withErrors("Error: \n".$ex);
        }
    }
}
