<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DynamicBookingEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_id',
        'form_data',
    ];

    protected $casts = [
        'form_data' => 'array',
    ];

    public function section()
    {
        return $this->belongsTo(DynamicBookingSection::class, 'section_id');
    }
}
