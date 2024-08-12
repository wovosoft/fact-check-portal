<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 *
 *
 * @property int $id
 * @property string $title
 * @property string|null $date
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FactCheck> $factChecks
 * @property-read int|null $fact_checks_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\IncidentMedia> $medias
 * @property-read int|null $medias_count
 * @method static \Database\Factories\IncidentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Incident newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Incident newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Incident query()
 * @method static \Illuminate\Database\Eloquent\Builder|Incident whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Incident whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Incident whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Incident whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Incident whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Incident whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Tag> $tags
 * @property-read int|null $tags_count
 * @mixin \Eloquent
 */
class Incident extends Model
{
    use HasFactory;

    protected function casts(): array
    {
        return [
            'date' => 'datetime',
        ];
    }

    public function medias(): HasMany
    {
        return $this->hasMany(IncidentMedia::class);
    }

    public function factChecks(): HasMany
    {
        return $this->hasMany(FactCheck::class);
    }


    public function tags(): BelongsToMany
    {
        return $this
            ->belongsToMany(Tag::class,'incident_tags')
            ->withPivot([
                'incident_id',
                'tag_id',
            ]);
    }
}
