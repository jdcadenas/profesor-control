<?php

namespace App\Http\Controllers;

use App\Mail\UserRequestConfirmationEmail;
use App\Models\Faculty;
use App\Models\School;
use App\Models\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('request.index');
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
       
        // $request->validate([
        //     'firstname' => 'required|string',
        //     'lastname' => 'required|string',
        //     'document' => 'required|numeric',
        //     'email' => 'required|email',
        //     'phone' => 'required|string',
        //     'faculty_id' => 'required|integer',
        //     'school_id' => 'required|integer',
            
        //     ]);
           

            $userRequest = new UserRequest();
            $userRequest->firstname = $request->input('firstname');
            $userRequest->lastname = $request->input('lastname');
            $userRequest->username = $request->input('username');

            $userRequest->email = $request->input('email');
            $userRequest->phone = $request->input('phone');
            $userRequest->document = $request->input('document');
            $userRequest->faculty_id = $request->input('faculty');
            $userRequest->school_id = $request->input('school');
            $userRequest->status=False;
            
            $userRequest->save();
            //$userRequest->school->coordinator_email='';
            
            // // Send email notification
             Mail::to()->send(new UserRequestConfirmationEmail($userRequest));
        
            return redirect()->route('user-requests.index')->with('success', 'Solicitud de usuario creada correctamente.');
        
            
            // return redirect()->route('userrequest.create')->with('success', 'Request sent successfully');

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
