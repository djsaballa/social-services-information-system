<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\ClientProfile;
use Carbon\Carbon;

class History extends Model
{
    use HasFactory;

    public static function newHistory($data)
    {
        $history = new static;
        $history->fill($data);
        if ($history->save()) {
            return $history;
        }
        return false;
    }

    protected $fillable = [
        "action_taken",
        "date",
        "user_id",
        "client_profile_id",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function clientProfile()
    {
        return $this->belongsTo(ClientProfile::class);
    }

    public function getId()
    {
        return $this->id;
    }

    public function dateFormatMdY($date)
    {
        $formattedDate = Carbon::parse($date)->format("M. d, Y");

        return $formattedDate;
    }
}
