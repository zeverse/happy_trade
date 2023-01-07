<?php

namespace App\Models;

use Database\Factories\DepartmentFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * App\Models\Department
 *
 * @property-read Collection|User[] $user
 * @property-read int|null $user_count
 * @method static DepartmentFactory factory(...$parameters)
 * @method static Builder|Department newModelQuery()
 * @method static Builder|Department newQuery()
 * @method static Builder|Department query()
 * @mixin Eloquent
 */
class Department extends Model
{
    use HasFactory;


    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
