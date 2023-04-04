<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EnrolledSubjects;

class EnrolledSubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $enrolled_subjects = EnrolledSubjects::all();

        return view('subjects.index', compact('enrolled_subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validateData =$request->validate([
            'xsubjectCode' => ['required', 'max:12'],
            'xdescription' =>['required', 'max:100'],
            'xunits'=>['required'],
            'xschedule' =>['required', 'max:30'],
        ]);
        
        $enrolled_subjects = new EnrolledSubjects();

        $enrolled_subjects->subjectCode=$request->xsubjectCode;
        $enrolled_subjects->description=$request->xdescription;
        $enrolled_subjects->units=$request->xunits;
        $enrolled_subjects->schedule=$request->xschedule;
        
        $enrolled_subjects ->save();
        return redirect()->route('subjects');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $enrolled_subjects = EnrolledSubjects::where('esNo', $id)->get();
        return view('subjects.show', compact('enrolled_subjects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $enrolled_subjects = EnrolledSubjects::where('esNo', $id)->get();
        return view('subjects.edit', compact('enrolled_subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validateData =$request->validate([
            'xsubjectCode' => ['required', 'max:12'],
            'xdescription' =>['required', 'max:100'],
            'xunits'=>['required'],
            'xschedule' =>['required', 'max:30'],
            
        ]);


        $enrolled_subjects = EnrolledSubjects::where('esNo', $id)
        ->update(
             ['subjectCode' => $request->xsubjectCode,
             'description'=> $request->xdescription,
             'units'=> $request->xunits,
             'schedule'=> $request->xschedule,
             ]);
          return redirect()->route('subjects');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
       $enrolled_subjects = EnrolledSubjects::where('esNo', $id);
       $enrolled_subjects->delete();
       return redirect()->route('subjects');
    }
}
