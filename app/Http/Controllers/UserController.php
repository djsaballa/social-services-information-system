<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // LOGIN ----------------------------------------------------------------------------------------------------------
    public function login()
    {
        return view('login/login', [

        ]);
    }

    // LOGIN AUTH
    public function loginAuth(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        
        if ($request->username == 'username') {
            if ($request->password == 'password') {
                return redirect(route('dashboard'));
            } else {
                return back()->with('fail', 'Incorrect Password');
            }
        } else {
            return back()->with('fail', 'Username not recognized');
        }
    }
   
    // DASHBOARD -------------------------------------------------------------------------------------------------------
    public function dashboard()
    {
        return view('pages.dashboard');
    }
    
    // LIST OF PROFILES ------------------------------------------------------------------------------------------------
    public function listOfProfiles()
    {
        return view('pages.list-of-profiles');
    }

    // ADD PROFILE 
    public function addProfilePrivacy()
    {
        return view('pages.add-profile-privacy');
    }

    public function addProfile1()
    {
        return view('pages.add-profile-1');
    }

    public function addProfile2()
    {
        return view('pages.add-profile-2');
    }

    public function addProfile3()
    {
        return view('pages.add-profile-3');
    }

    public function addProfile4()
    {
        return view('pages.add-profile-4');
    }

    public function addProfile5()
    {
        return view('pages.add-profile-5');
    }

    // LIST OF USERS ---------------------------------------------------------------------------------------------------
    public function listOfUsers()
    {
        return view('pages.list-of-users');
    }

    public function addUser()
    {
        return view('pages.add-user');
    }
    
    public function editUser()
    {
        return view('pages.edit-user');
    }

    // INBOX -----------------------------------------------------------------------------------------------------------
    public function inbox()
    {
        return view('pages.inbox');
    }

    // AUDIT LOGS ------------------------------------------------------------------------------------------------------
    public function auditLogs()
    {
        return view('pages.audit-logs');
    }
     

    // ARCHIVE ---------------------------------------------------------------------------------------------------------
    public function archive()
    {
        return view('pages.archive');
    }


}