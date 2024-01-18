<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    // All
    
    public function index()
    {
        $people = Person::all();
        return response()->json($people);
    }

    // One person
    public function show($id)
    {
        $person = Person::find($id);
        return $person ? response()->json($person) : response()->json(['message' => 'Person not found'], 404);
    }

    // Adding to DB
    public function store(Request $request)
    {
        $person = Person::create($request->all());
        return response()->json($person, 201);
    }

    // Updating info
    public function update(Request $request, $id)
    {
        $person = Person::find($id);
        if ($person) {
            $person->update($request->all());
            return response()->json($person);
        }
        return response()->json(['message' => 'Person not found'], 404);
    }

    // Deleting data
    public function destroy($id)
    {
        if (Person::destroy($id)) {
            return response()->json(['message' => 'Person deleted']);
        }
        return response()->json(['message' => 'Person not found'], 404);
    }
}
