<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\School;
use App\Models\UserRequest;
use Illuminate\Http\Request;

class UserRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $faculties = Faculty::all();
        $schools = School::all(); // Retrieve all schools
        return view('request.userrequest', compact('faculties', 'schools'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'document' => 'required|numeric',
            'email' => 'required|email',
            'phone' => 'required|string',
            'faculty_id' => 'required|integer',
            'school_id' => 'required|integer',
            
            ]);
            $userRequest = new UserRequest();
            $userRequest->firstname = $request->input('firstname');
            $userRequest->lastname = $request->input('lastname');
            $userRequest->email = $request->input('email');
            $userRequest->phone = $request->input('phone');
            $userRequest->phone = $request->input('document');
            $userRequest->faculty_id = $request->input('faculty_id');
            $userRequest->school_id = $request->input('school_id');
            $userRequest->status=False;
            $userRequest->save();
            return redirect()->route('userrequest.create')->with('success', 'Request sent successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(UserRequest $userRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserRequest $userRequest)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserRequest $userRequest)
    {
        $userRequest = UserRequest::find($userRequest);
        $userRequest->firsname = $request->input('firstname');
        $userRequest->email = $request->input('email');
        $userRequest->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserRequest $userRequest)
    {
        //
    }


    
}
