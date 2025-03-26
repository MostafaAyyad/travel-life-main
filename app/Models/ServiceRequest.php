<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'country',
        'project_type',
        'budget',
        'time_frame',
        'company',
        'message',
        'service_id',
    ];
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
