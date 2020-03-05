<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Agent
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agent query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agent whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agent wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agent whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agent whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Agent whereUsername($value)
 * @mixin \Eloquent
 */
class Agent extends Model
{
    protected $table = 'agent';
}
