<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Storage;
use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Submission;

class SubmissionController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');

    }
    
    public function index()
    {
        //
        $assignments = Assignment::latest()->paginate(5);

        return view('submissions.index',compact('assignments'))

            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function show(int $id)
    {
        //
        $assignments = DB::table('assignments')->where('id', '=', $id)->get();
        $assignment = $assignments->first();
        return view('submissions.show',compact('id', 'assignment'));
    }

    public function store(Request $request)
    {
        //
        
        $request->validate([
            'file' => 'required',
        ]);
        
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $path = $file->storeAs('files', $fileName);

        Submission::create([
            'assignment_id' => $request['assignment_id'],
            'student_id' => Auth::id(),
            'filename' => $fileName,
        ]);

        return redirect()->route('assignments.index')
            ->with('success', 'Turned in assignment successfully.');
    }

    public function download(string $filename)
    {
        if(Storage::exists('files/'.$filename))
        { 
            return Storage::download('files/'.$filename);
        }
        else
        {
            return redirect()->back()

                        ->with('success', 'Something went wrong, please try again');
        }
    }
}