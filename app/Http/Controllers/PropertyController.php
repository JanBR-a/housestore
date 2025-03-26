<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Property;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function index($id)
    {
        if (!Auth::check() || auth()->user()->role === 'guest') {
            return abort(403, 'No puedes acceder a este contenido, autentifícate e inténtalo de nuevo.');
        }

        $property = Property::findOrFail($id);
        $property = Property::findOrFail($id);
        $comments = $property->comments;

        return view('property', ['property' => $property, 'comments' => $comments]);
    }

    public function reservation($id)
    {
        $property = Property::findOrFail($id);
        $user = auth()->user();

        // Crear la transacción
        $reservation = new Reservation();
        $reservation->user_id = $user->id;
        $reservation->property_id = $property->id;
        $reservation->save();

        return view('reservation', ['property' => $property, 'user' => $user]);
    }

    public function delete($id)
    {
        $property = Property::findOrFail($id);
        $property->comments()->delete();
        $property->delete();

        return redirect()->route('home')->with('success', 'Propiedad eliminada exitosamente.');
    }

    public function update(Request $request, $id)
    {
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

        $property = Property::findOrFail($id);
        $property->fill($request->all());
        $property->save();

        return redirect()->route('home')->with('success', 'Propiedad actualizada exitosamente.');
    }

    public function create()
    {
        return view('addproperty');
    }

    public function store(Request $request)
    {
        // Depuración: Verificar los datos recibidos en la solicitud
        // dd($request->all()); // Descomenta esta línea para ver los datos enviados

        // Validar los datos enviados en el formulario
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'address' => 'required',
            'image' => 'required',  // Validar que sea una imagen
            'type' => 'required|in:casa,chalet,apartamento,solar',
            'garden' => 'required|in:1,0',
            'state' => 'required|in:compra,alquiler',
            'bedrooms' => 'required|integer|min:1',
            'bathrooms' => 'required|integer|min:1',
            'm2' => 'required|integer|min:1',
        ]);

        // dd($validatedData);

        $property = new Property();
        $property->title = $validatedData['title'];
        $property->description = $validatedData['description'];
        $property->price = $validatedData['price'];
        $property->address = $validatedData['address'];
        $property->image = $validatedData['image'];  // Asegúrate de manejar la imagen correctamente
        $property->type = $validatedData['type'];
        $property->garden = $validatedData['garden'];
        $property->state = $validatedData['state'];
        $property->bedrooms = $validatedData['bedrooms'];
        $property->bathrooms = $validatedData['bathrooms'];
        $property->m2 = $validatedData['m2'];
        $property->user_id = auth()->user()->id;  // Asigna el usuario autenticado
        $property->save();

        return redirect()->route('home')->with('success', 'Propiedad creada exitosamente.');
    }

    public function addComment(Request $request, $id)
    {
        // Validar los datos del comentario
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'valoration' => 'required|integer|min:0|max:5',
        ]);

        // Buscar la propiedad
        $property = Property::findOrFail($id);

        // Crear el comentario
        $comment = new Comments();
        $comment->title = $request->title;
        $comment->description = $request->description;
        $comment->valoration = $request->valoration;
        $comment->user_id = auth()->user()->id;  // Asigna el comentario al usuario autenticado
        $comment->property_id = $property->id;  // Relaciona el comentario con la propiedad
        $comment->save();

        // Redirigir a la vista con éxito
        return redirect()->back()->with('success', 'Comentario añadido correctamente.');
    }
}
