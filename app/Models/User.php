<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
use App\Models\Locale;
use App\Models\District;
use App\Models\Division;
use App\Models\Inbox;
use App\Models\History;
use App\Models\ProgressReport;
use App\Models\ClientProfile;
class User extends Authenticatable
{
    use HasFactory;

    public static function newUser($data)
    {
        $user = new static;
        $user->fill($data);
        if ($user->save()) {
            return $user;
        }
        return false;
    }

    protected $fillable = [
        "picture",
        "first_name",
        "middle_name",
        "last_name",
        "username",
        "password",
        "contact_number",
        "status",
        "role_id",
        "locale_id",
        "district_id",
        "division_id"
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function locale()
    {
        return $this->belongsTo(Locale::class);
    }

    public function clientProfiles()
    {
        return $this->hasMany(ClientProfile::class);
    }

    public function progressReport()
    {
        return $this->hasMany(ProgressReport::class);
    }

    public function histories()
    {
        return $this->hasMany(History::class);
    }

    public function inboxes()
    {
        return $this->hasMany(Inbox::class);
    }

    public function getId()
    {
        return $this->id;
    }

    public static function getFullName($user_id)
    {
        $user = User::find($user_id);
        $firstName = $user->first_name;
        $middleName = $user->middle_name;
        $lastName = $user->last_name;

        return $firstName . " " . $middleName . " " . $lastName;
    }

    public static function getLFName($user_id)
    {
        $user = User::find($user_id);
        $firstName = $user->first_name;
        $middleName = $user->middle_name;
        $lastName = $user->last_name;

        return $lastName . ", ". $firstName . " " . $middleName;
    }

    public static function getRoleName($role_id)
    {
        return Role::getRoleName($role_id);
    }

    public static function getSecurityLevel($role_id)
    {
        $security_level = Role::getSecurityLevel($role_id);

        return $security_level;
    }

    public static function getLocaleName($locale_id)
    {
        return Locale::getLocaleName($locale_id);
    }

    public static function getDistrictName($district_id)
    {
        return District::getDistrictName($district_id);
    }

    public static function getDivisionName($division_id)
    {
        return Division::getDivisionName($division_id);
    }
}
