<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoriasRepository;
use App\Http\Requests\CategoriasRequest;

class CategoriasController extends Controller
{
    protected $categories;
    public function __construct(CategoriasRepository $categories){
        $this->categories = $categories;
    }
    public function index ()
    {
        try{
            $categorias = $this->categories->getList();
            return view('categorias.index')->with('categorias', $categorias);
        }
        catch(Exception $ex){
            return redirect()->back()->withErrors("Error: \n".$ex);
        }
    }
    public function create ()
    {
        try{
            return view('categorias.create');
        }
        catch(Exception $ex){
            return redirect()->back()->withErrors("Error: \n".$ex);
        }
    }    
    public function store (CategoriasRequest $request)
    {
        try{
            $categories = $this->categories->store($request);
            return redirect()->route('Categorias');
        }
        catch(Exception $ex){
            return redirect()->back()->withErrors("Error: \n".$ex);
        }
    }
    public function edit ($id)
    {
        try{
            $categoria = $this->categories->get($id);
            return view('categorias.edit')->with('categoria', $categoria);
        }
        catch(Exception $ex){
            return redirect()->back()->withErrors("Error: \n".$ex);
        }
    } 
    public function update (CategoriasRequest $request)
    {
        try{
            $categories = $this->categories->update($request);
            return redirect()->route('Categorias');
        }
        catch(Exception $ex){
            return redirect()->back()->withErrors("Error: \n".$ex);
        }
    }
    public function show($id)
    {
        try{
            $categoria = $this->categories->get($id);
            $categoria->setRelation('productos', $categoria->productos()->paginate(5));
            return view('categorias.show')->with('categoria', $categoria);
        }
        catch(Exception $ex){
            return redirect()->back()->withErrors("Error: \n".$ex);
        }
    }
    public function destroy ($id)
    {
        try{
            $categoria = $this->categories->delete($id);
            return redirect()->route('Categorias');
        }
        catch(Exception $ex){
            return redirect()->back()->withErrors("Error: \n".$ex);
        }
    } 
}
