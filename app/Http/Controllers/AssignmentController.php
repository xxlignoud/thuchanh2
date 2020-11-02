<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Submissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Auth;

class AssignmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('teacher')->except('index');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $assignments = Assignment::latest()->paginate(5);
        if (Auth::user()->role == "Teacher"){
            return view('assignments.index',compact('assignments'))

            ->with('i', (request()->input('page', 1) - 1) * 5);
        }
        return view('submissions.index',compact('assignments'))

            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('assignments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $request->validate([
            'due_to' => 'required',
            'description' => 'required',
            'file' => 'required',
        ]);
        
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $path = $file->storeAs('files', $fileName);

        Assignment::create([
            'due_to' => $request['due_to'],
            'description' => $request['description'],
            'filename' => $fileName,
        ]);

        return redirect()->route('assignments.index')
            ->with('success', 'Assignment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment)
    {
        //
        $filepath = "file://" . Storage::path($assignment->filename);
        $filename = $assignment->filename;
        $submissions = DB::select('SELECT * FROM submissions INNER JOIN users ON submissions.student_id=users.id WHERE assignment_id = ?', [$assignment->id]);

        return view('assignments.show',compact('assignment', 'filepath', 'filename', 'submissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignment $assignment)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignment $assignment)
    {
        //
        $assignment->delete();

        return redirect()->route('assignments.index')

                        ->with('success','Assignment deleted successfully');
    }
}