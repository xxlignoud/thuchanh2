<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;
use Storage;
use DB;

class ChallengeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('teacher')->except('index', 'show', 'submit');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $challenges = Challenge::latest()->paginate(5);

        return view('challenges.index', compact('challenges'))
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
        return view('challenges.create');
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
            'challenge_name' => 'required',
            'hint' => 'required',
            'file' => 'required'
        ]);

                
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $path = $file->storeAs('challenge_files', $fileName);

        Challenge::create([
            'challenge_name' => $request['challenge_name'],
            'hint' => $request['hint'],
            'filename' => $fileName,
        ]);

        return redirect()->route('challenges.index')
            ->with('success', 'Challenges created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function show(Challenge $challenge)
    {
        //
        return view('challenges.show',compact('challenge'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function edit(Challenge $challenge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Challenge $challenge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Challenge $challenge)
    {
        //
        $challenge->delete();

        return redirect()->route('challenges.index')

                        ->with('success','Challenge deleted successfully');
    }

    public function submit(Request $request)
    {
        $student_answer = $request['answer'];

        $answer = DB::table('challenges')->where([
            ['filename', 'like', $student_answer.'.%'],
            ['id', '=', $request['challenge_id']],
        ])->get();

        if(count($answer) > 0)
        {
            if(Storage::exists('challenge_files/'.$answer->first()->filename))
            {
                $content = Storage::get('challenge_files/'.$answer->first()->filename);  
                return redirect()->back()
                            ->with('success', $content);
            }
            else
            {
                return redirect()->back()

                            ->with('success', 'Something went wrong, please try again');
            }
        }
        else
        {
            return redirect()->back()
                            ->with('success', 'Incorrect');
        }
        
    }

}