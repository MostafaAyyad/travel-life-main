<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DynamicBookingField extends Model
{
    use HasFactory;
    protected $table = 'dynamic_booking_fields_tabl';
    protected $fillable = ['section_id', 'label', 'type', 'placeholder', 'default_value'];

}
