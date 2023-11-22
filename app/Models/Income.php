<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Income extends Model
{
    use HasFactory, LogsActivity;

    use LogsActivity;

    protected static $recordEvents = ['created','updated','deleted'];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "{$eventName} an income.";
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                                    ->logAll()
                                    ->logOnlyDirty()
                                    ->useLogName('income');
    }

}
