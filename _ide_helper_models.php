<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Speedtest
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $tested_at
 * @property mixed $upload
 * @property mixed $download
 * @property mixed|null $ping
 * @property array|null $result
 * @property mixed $duration
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Speedtest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Speedtest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Speedtest query()
 * @method static \Illuminate\Database\Eloquent\Builder|Speedtest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Speedtest whereDownload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Speedtest whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Speedtest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Speedtest wherePing($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Speedtest whereResult($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Speedtest whereTestedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Speedtest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Speedtest whereUpload($value)
 */
	class Speedtest extends \Eloquent {}
}

