<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginatable;
use App\Models\Pet;

class PetController extends Controller
{
    public function store(Request $request) {
        $pet = new Pet;
        $pet->fill($request->all());

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif',
            ]);

            $file = $request->file('photo');

            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->storeAs('images', $filename, 'public');

            $pet->photo = 'images/' . $filename;

        }

        $pet->save();

        return redirect()->route('pet.list')->with('status', 'successfully added');
    }

    public function destroy($petId) {
        $pet = Pet::find($petId);

        if ($pet) {
            $pet->delete();
            return redirect()->route('pet.list')->with('success', 'Pet Deleted Successfully');
        } else {
            return redirect()->route('pet.list')->with('error', 'Pet Not Found');
        }
    }
}
