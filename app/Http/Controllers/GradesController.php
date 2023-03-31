<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grades;

class GradesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $grades = Grades:: all();
        return view('grade.index' , compact('grades'));
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
            'xgNo' => ['required'],
            'xesNo' =>['required'],
            'xsNo'=>['required'],
            'xprelim' =>['required','precision:3','scale:2'],
            'xmidterm' =>['required','precision:3','scale:2'],
            'xfinal' =>['required','precision:3','scale:2'],
            'xremarks' =>['required','max:4']
        ]);
        
        $grades = new Grades();
        $grades->gNo=$request->xgNo;
        $grades->esNo=$request->xesNo;
        $grades->sNo=$request->sNo;
        $grades->prelim=$request->xprelim;
        $grades->midterm=$request->xmidterm;
        $grades->final=$request->xfinal;
        $grades->remarks=$request->xremarks;
        $grades ->save();
        return redirect()->route('grade');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $integer)
    {
        //
        $grades = Grades::where('esNo', $integer)->get();
        return view('grade.show', compact('grade'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $grades = Grades::where('esNo', $id)->get();
        return view('grade.edit', compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validateData =$request->validate([
            'xgNo' => ['required'],
            'xesNo' =>['required'],
            'xsNo'=>['required'],
            'xprelim' =>['required','precision:3','scale:2'],
            'xmidterm' =>['required','precision:3','scale:2'],
            'xfinal' =>['required','precision:3','scale:2'],
            'xremarks' =>['required','max:4']
        ]);

        
        $grades = Grades::where('esNo', $id)
        ->update(
             [  'gNo'=> $request->xgNo,
                'esNo'=>$request->xesNo,
                'sNo'=>$request->sNo,
                'prelim'=>$request->xprelim,
                'midterm'=>$request->xmidterm,
                'final'=>$request->xfinal,
                'remarks'=>$request->xremarks
             ]);
        return redirect()->route('grade');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $grades = Grades::where('esNo', $id);
        $grades->delete();
        return redirect()->route('grade');
    }
}
