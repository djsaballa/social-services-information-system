<?php

namespace App\Http\Controllers;

use App\Models\ClientProfile;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\District;
use App\Models\Locale;
use App\Models\Employee;
use App\Models\FamilyComposition;
use App\Models\MedicalCondition;

class EmployeeController extends Controller
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

        $login_info = Employee::where('username', '=', $request->username)->first();

        if (!$login_info) {
            return back()->with('fail', 'Username not recognized');
        } else {
            if ($request->password != $login_info->password) {
                return back()->with('fail','Incorrect password');
            } else {
                $employee_id = $login_info->id;

                return redirect(route('dashboard', $employee_id));
            }
        }
    }
   
    // DASHBOARD -------------------------------------------------------------------------------------------------------
    public function dashboard($employee_id)
    {
        $employee_info = Employee::find($employee_id);

        return view('pages.dashboard', compact('employee_info'));
    }
    
    // LIST OF PROFILES ------------------------------------------------------------------------------------------------
    public function listOfProfiles($employee_id)
    {
        $employee_info = Employee::find($employee_id);

        $divisions = Division::orderBy('division', 'ASC')->get();
        $districts = District::orderBy('district', 'ASC')->get();
        $locales = Locale::orderBy('locale', 'ASC')->get();

        $client_profiles = ClientProfile::all();

        return view(('pages.client-profiles.list-of-profiles'), compact('employee_info', 'divisions', 'districts', 'locales', 'client_profiles' ));
    }

    // VIEW PROFILE ----------------------------------------------------------------------------------------------------
    public function viewProfile1($employee_id, $client_profile_id)
    {
        $employee_info = Employee::find($employee_id);
        $client_profile_info = ClientProfile::find($client_profile_id);
        $family_compositions = FamilyComposition::where('client_profile_id', '=', $client_profile_id)->get();
        $medical_conditions = MedicalCondition::where('client_profile_id', '=', $client_profile_id)->get();

        return view('pages.client-profiles.view.view-profile-1', compact('employee_info', 'client_profile_info', 'family_compositions', 'medical_conditions'));
    }
    public function viewProfile2($employee_id, $client_profile_id)
    {
        $employee_info = Employee::find($employee_id);
        $client_profile_info = ClientProfile::find($client_profile_id);

        return view('pages.client-profiles.view.view-profile-2', compact('employee_info', 'client_profile_info'));
    }

    // ADD PROFILE -----------------------------------------------------------------------------------------------------
    public function addProfilePrivacy()
    {
        return view('pages.client-profiles.add.add-profile-privacy');
    }

    public function addProfile1()
    {
        return view('pages.client-profiles.add.add-profile-1');
    }

    public function addProfile2()
    {
        return view('pages.client-profiles.add.add-profile-2');
    }

    public function addProfile3()
    {
        return view('pages.client-profiles.add.add-profile-3');
    }

    public function addProfile4()
    {
        return view('pages.client-profiles.add.add-profile-4');
    }

    public function addProfile5()
    {
        return view('pages.client-profiles.add.add-profile-5');
    }

    // EDIT PROFILE ----------------------------------------------------------------------------------------------------
    public function editProfile1()
    {
        return view('pages.client-profiles.edit.edit-profile-1');
    }

    public function editProfile2()
    {
        return view('pages.client-profiles.edit.edit-profile-2');
    }

    public function editProfile3()
    {
        return view('pages.client-profiles.edit.edit-profile-3');
    }

    public function editProfile4()
    {
        return view('pages.client-profiles.edit.edit-profile-4');
    }

    public function editProfile5()
    {
        return view('pages.client-profiles.edit.edit-profile-5');
    }

    // PROGRESS REPORTS ------------------------------------------------------------------------------------------------
    public function viewProgressReport($employee_id, $client_profile_id)
    {
        $employee_info = Employee::find($employee_id);
        $client_profile_info = ClientProfile::find($client_profile_id);

        return view('pages.progress-reports.view-progress-report', compact('employee_info', 'client_profile_info'));
    }
    public function addProgressReport()
    {
        return view('pages.progress-reports.add-progress-report');
    }

    // LIST OF USERS ---------------------------------------------------------------------------------------------------
    public function listOfUsers($employee_id)
    {
        $employees = Employee::all();
        $employee_info = Employee::find($employee_id);

        return view('pages.users.list-of-users', compact('employees', 'employee_info'));
    }

    public function addUser()
    {
        return view('pages.users.add-user');
    }
    
    public function editUser()
    {
        return view('pages.users.edit-user');
    }

    // INBOX -----------------------------------------------------------------------------------------------------------
    public function inbox($employee_id)
    {
        $employee_info = Employee::find($employee_id);

        return view('pages.inbox', compact('employee_info'));
    }

    // AUDIT LOGS ------------------------------------------------------------------------------------------------------
    public function auditLogs($employee_id)
    {
        $employee_info = Employee::find($employee_id);

        return view('pages.audit-logs', compact('employee_info'));
    }
     

    // ARCHIVE ---------------------------------------------------------------------------------------------------------
    public function archive($employee_id)
    {
        $employee_info = Employee::find($employee_id);

        return view('pages.archive', compact('employee_info'));
    }


}
