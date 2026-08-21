<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{
    private $section;
    public function __construct(Section $section){
      $this->section = $section;
    }
    public function index(){
        $sections = Section::all();
        return view('sections.index')->with('sections', $sections);
    }

    public function store(Request $request){
        $request->validate([
                'name'   =>  'required|max:50'
            ]);  

        $this->section->name = $request->name;
        $this->section->save();
        return redirect()->back();
    }
    public function destroy($id){
        // $section = $this->section->findOrFail($id);
        $this->section->destroy($id);
        return redirect()->back();
    }
}
