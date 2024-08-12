<?php

namespace App\Models;

use App\Enums\IncidentMediaType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $id
 * @property int $incident_id
 * @property string $path
 * @property string|null $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Incident $incident
 * @method static \Database\Factories\IncidentMediaFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|IncidentMedia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IncidentMedia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IncidentMedia query()
 * @method static \Illuminate\Database\Eloquent\Builder|IncidentMedia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncidentMedia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncidentMedia whereIncidentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncidentMedia wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncidentMedia whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncidentMedia whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class IncidentMedia extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'type' => IncidentMediaType::class
        ];
    }

    public function incident(): BelongsTo
    {
        return $this->belongsTo(Incident::class);
    }
}
