<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DynamicBookingSection extends Model
{
    use HasFactory;
    protected $fillable = ['title'];

    public function fields()
    {
        return $this->hasMany(DynamicBookingField::class, 'section_id');
    }
    public function entries()
{
    return $this->hasMany(DynamicBookingEntry::class, 'section_id');
}

}
