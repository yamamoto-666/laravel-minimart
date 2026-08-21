<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    private $product;
    public function __construct(Product $product){
        $this->product = $product;
    }
    public function index()
    {
        $products = Product::all();

        return view('products.index')->with('products', $products);
    }

    public function create(){
        $sections = Section::all();
        return view('products.create')->with('sections', $sections);
    }

    public function store(Request $request){
        $request->validate ([
             'name'         =>  'required|max:50',
             'description'  =>  'required',
             'price'        =>  'required|numeric|min:0',
             'section_id'   =>  'required|exists:sections,id'
        ]);
        
        $this->product->name        = $request->name;
        $this->product->description = $request->description;
        $this->product->price       = $request->price;
        $this->product->section_id  = $request->section_id;
        $this->product->save();

        return redirect()->route('product.index');
    }
    public function destroy($id){
        $product = $this->product->findOrFail($id);
        $product->delete();

        return redirect()->back();
    }
    public function edit($id){
        $product = $this->product->findOrFail($id);
        $section = Section::all();

        return view('products.edit')->with('product', $product)
                                    ->with('sections', $section);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name'          =>  'required',
            'description'   =>   'required',
            'price'         =>  'required|numeric|min:0',
            'section_id'    =>  'required|exists:sections,id'
        ]);      
        $product = $this->product->findOrFail($id);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->section_id = $request->section_id;
        $product->save();

        return redirect()->route('product.index');
    }
    }
