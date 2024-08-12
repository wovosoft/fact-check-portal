<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $id
 * @property int $incident_id
 * @property \Illuminate\Support\Carbon|null $fact_check_date
 * @property string|null $source
 * @property string|null $verdict
 * @property string|null $details
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Incident $incident
 * @method static \Database\Factories\FactCheckFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|FactCheck newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FactCheck newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FactCheck query()
 * @method static \Illuminate\Database\Eloquent\Builder|FactCheck whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FactCheck whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FactCheck whereFactCheckDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FactCheck whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FactCheck whereIncidentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FactCheck whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FactCheck whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FactCheck whereVerdict($value)
 * @mixin \Eloquent
 */
class FactCheck extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'fact_check_date' => 'date',
        ];
    }

    public function incident(): BelongsTo
    {
        return $this->belongsTo(Incident::class);
    }
}
