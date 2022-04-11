<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.team.index',[
            'team'=> Team::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.team.create',[
            'team'=> Team::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'photo' => 'image|file|max:2048'
        ]);

        
        if($request->file('photo')){
            $validatedData['photo'] = $request->file('photo')->store('team-img');
        }

        Team::create($validatedData);

        return redirect('/dashboard/team')->with('success', 'Tim baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view('dashboard.team.show', [
            'team' => $team
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('dashboard.team.edit',[
            'team' => $team,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $rules = [
            'nama' => 'required',
            'jabatan' => 'required',
            'photo' => 'image|file|max:2048'
        ];

        
        $validatedData =$request->validate($rules);
        
        if($request->file('photo')){
            if($request->oldPhoto){
                Storage::delete($request->oldPhoto);
            }
            $validatedData['photo'] = $request->file('photo')->store('team-img');
        }
        
        Team::where('id' , $team->id)
                ->update($validatedData);

        return redirect('/dashboard/team')->with('success', 'Tim berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Team $team)
    {
        if($team->photo){
            Storage::delete($team->photo);
        }
        Team::destroy($team -> id);
        return redirect('/dashboard/team')->with('success', 'Tim telah dihapus');
    }
}
