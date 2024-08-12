<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string|null $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\FactSourceFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|FactSource newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FactSource newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FactSource query()
 * @method static \Illuminate\Database\Eloquent\Builder|FactSource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FactSource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FactSource whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FactSource whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FactSource whereUrl($value)
 * @mixin \Eloquent
 */
class FactSource extends Model
{
    use HasFactory;
}
