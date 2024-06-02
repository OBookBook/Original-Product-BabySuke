<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Children extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'gender', 'birth_date'];

    public function familyGroups(): HasMany
    {
        return $this->hasMany(FamilyGroup::class, 'child_id');
    }
}
