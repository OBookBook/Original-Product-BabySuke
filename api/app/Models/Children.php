<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Children extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'gender', 'birth_date', 'icon_image'];

    public function familyGroups(): HasMany
    {
        return $this->hasMany(FamilyGroup::class, 'child_id');
    }

    public function likes()
    {
        return $this->hasMany(ChildrenLike::class, 'child_id');
    }
}
