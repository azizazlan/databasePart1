<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use Session;

class ProgramsController extends Controller
{
    // list all programs
    public function listPrograms()
    {
        $programs = Program::get();
        /* dd($programs); */
        Session::put('mode', 'list');
        return view('listPrograms', compact('programs'))->with('mode', 'list');
    }

    // search program by an id
    public function findProgram($id)
    {
        //To retrieve a single row by its id column value, used:
        $program = Program::find($id);

        // If the above return no result, this will causes error in the view page!
        // So we can use findOrFail
        /* $program = Program::findOrFail($id); */

        /* dd($program->name); */
        return view('program', compact('program'));
    }

    public function findProgramsByName($name)
    {
        // The value of param name must be correct, "Program A".
        /* $programs = Program::where('name', $name)->get(); */

        // We want to search with field name but not sure the exact value:
        $programs = Program::where('name', 'like', $name . '%')->get();
        /* dd($programs); */
        return view('niceprograms', compact('programs'));
    }

    // display form to create program
    public function createProgram()
    {
        return view('createprogram');
    }

    // insert program into the database
    public function saveProgram(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $program = new Program();
        $program->name = $request->name;
        $program->description = $request->description;
        $program->user_id = '1';
        $program->save();
        return redirect()
            ->back()
            ->with('success', $request->name . ' has been saved successfully!');

        /* dd($request->all()); */
    }

    public function editProgram($id)
    {
        /* dd('Show edit form for program with an id ' . $id); */
        $program = Program::where('id', $id)
            ->get()
            ->first();

        return view('editprogram', compact('program'));
    }

    public function updateProgram(Request $request)
    {
        $returnValidation = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $program = Program::find($request->id);
        /* $program = Program::where('id', $request->id) */
        /* ->get() */
        /* ->first(); */
        $program->name = $request->name;
        $program->description = $request->description;
        $returnVal = $program->save();

        $programs = Program::get();

        return view('listPrograms', compact('programs'));
    }

    public function searchProgram(Request $request)
    {
        /* dd('User is searching program by name: ' . $request->searchByName); */
        $programs = Program::where(
            'name',
            'like',
            '%' . $request->searchByName . '%'
        )->get();

        Session::put('mode', 'searchresult');
        return view('listPrograms', compact('programs'));
    }

    public function deleteProgram($id)
    {
        $program = Program::find($id);
        $program->delete();

        $programs = Program::get();
        return view('listPrograms', compact('programs'));
    }
}
