<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductosRepository;
use App\Repositories\CategoriasRepository;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $products;
    protected $category;
    public function __construct(ProductosRepository $products, CategoriasRepository $category)
    {
        $this->products = $products;
        $this->category = $category;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $productos = $this->products->getAll();
        return view('home')->with(['productos' => $productos]);
    }
    public function get ()
    {
        $categories = $this->category->getAll();
        $data = [];
        foreach ($categories as $category) {
            $data[] = [
                'categoria' => $category->nombre,
                'productos' => $this->products->getByCategory($category->id)
            ];
        }
        return $data;
    }
}
