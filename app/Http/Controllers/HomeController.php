<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class HomeController extends Controller
{
    public function index(){
        $properties = Property::all();
        return view('home', ['properties' => $properties]);
    }

    public function delete($id){
        $property = Property::findOrFail($id);
        $property->comments()->delete();
        $property->delete();
        return redirect()->route('home')->with('success', 'La propiedad se ha eliminado correctamente.');
    }

    public function update(Request $request, $id){
        $property = Property::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'address' => 'required',
            'image' => 'required',
            'type' => 'required',
            'garden' => 'required',
            'state' => 'required',
            'bedrooms' => 'required',
            'bathrooms' => 'required',
            'm2' => 'required',
        ]);

        $property->update($request->all());

        return redirect()->route('home')->with('success', 'La propiedad se ha actualizado correctamente.');
    }
}
