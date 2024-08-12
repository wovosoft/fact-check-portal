<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $incident_id
 * @property int $tag_id
 * @property-read \App\Models\Incident $incident
 * @property-read \App\Models\Tag $tag
 * @method static \Database\Factories\IncidentTagFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|IncidentTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IncidentTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|IncidentTag query()
 * @method static \Illuminate\Database\Eloquent\Builder|IncidentTag whereIncidentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|IncidentTag whereTagId($value)
 * @mixin \Eloquent
 */
class IncidentTag extends Model
{
    use HasFactory;

    public function incident(): BelongsTo
    {
        return $this->belongsTo(Incident::class);
    }

    public function tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }
}
