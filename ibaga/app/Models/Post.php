<?php
namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Str;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends AbstractModel
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    public $dates = [
        'published_at',
    ];
    /**
     * The attributes that should be casted.
     *
     * @var array
     */
    protected $casts = [
        'meta' => 'array',
        'published' => 'boolean',
    ];

    protected $with = ['user'];
    /**
     * The tags the post belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'posts_tags', 'post_id', 'tag_id');
    }
    /**
     * The post author.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->user();
    }
    /**
     * Get the user relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
     /**
     * Get the views relationship.
     *
     * @return HasMany
     */
    public function views(): HasMany
    {
        return $this->hasMany(View::class);
    }
    
    /**
     * Get the top 10 referring websites for a post.
     *
     * @return array
     */
    public function getTopReferersAttribute(): array
    {
        // Get the views associated with the post
        $data = $this->views;
        // Filter the view data to only include referrers
        $collection = collect();
        $data->each(function ($item, $key) use ($collection) {
            is_null($item->referer) ? $collection->push(__('stats.details.referer.other')) : $collection->push(parse_url($item->referer)['host']);
        });
        // Count the unique values and assign to their respective keys
        $array = array_count_values($collection->toArray());
        // Only return the top 10 referrers with their view count
        $sliced = array_slice($array, 0, 10, true);
        // Sort the array in a descending fashion
        arsort($sliced);
        return $sliced;
    }
       /**
     * Get the 10 most popular reading times rounded to the nearest 30 minutes.
     *
     * @return array
     */
    public function getPopularReadingTimesAttribute(): array
    {
        // Get the views associated with the post
        $data = $this->views;
        // Filter the view data to only include hours:minutes
        $collection = collect();
        $data->each(function ($item, $key) use ($collection) {
            $collection->push($item->created_at->minute(0)->format('H:i'));
        });
        // Count the unique values and assign to their respective keys
        $filtered = array_count_values($collection->toArray());
        $popular_reading_times = collect();
        foreach ($filtered as $key => $value) {
            // Use each given time to create a 60 min range
            $start_time = Carbon::createFromTimeString($key);
            $end_time = $start_time->copy()->addMinutes(60);
            // Find the percentage based on the value
            $percentage = number_format($value / $data->count() * 100, 2);
            // Get a human-readable hour range and floating percentage
            $popular_reading_times->put(
                sprintf('%s - %s', $start_time->format('g:i A'), $end_time->format('g:i A')),
                $percentage
            );
        }
        // Cast the collection to an array
        $array = $popular_reading_times->toArray();
        // Only return the top 5 reading times and percentages
        $sliced = array_slice($array, 0, 5, true);
        // Sort the array in a descending fashion
        arsort($sliced);
        return $sliced;
    }


    /**
    * Return a view count for the last 30 days.
    *
    * @return array
    */
   public function getViewTrendAttribute(): array
   {
       // Get the views associated with the post
       $data = $this->views;
       // Filter views to only include the last 30 days
       $filtered = $data->filter(function ($value, $key) {
           return $value->created_at >= now()->subDays(30);
       });
       // Filter the view data to only include created_at time strings
       $collection = collect();
       $filtered->sortBy('created_at')->each(function ($item, $key) use ($collection) {
           $collection->push($item->created_at->toDateString());
       });
       // Count the unique values and assign to their respective keys
       $views = array_count_values($collection->toArray());
       // Create a 30 day range to hold the default date values
       $period = CarbonPeriod::create(now()->subDays(30)->toDateString(), 30)->excludeStartDate();
       // Prep the array to perform a comparison with the actual view data
       $range = collect();
       foreach ($period as $key => $date) {
           $range->push($date->toDateString());
       }
       // Compare the view data and date range arrays, assigning view counts where applicable
       $total = collect();
       foreach ($range as $date) {
           if (array_key_exists($date, $views)) {
               $total->put($date, $views[$date]);
           } else {
               $total->put($date, 0);
           }
       }
       return $total->toArray();
   }
    /**
     * Scope a query to only include published posts.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->where('published', true);
    }

    /**
     * Scope a query to only include published posts.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublie($query)
    {
        return $query->where('published', true);
    }

    
    /**
     * Scope a query to only include drafts (unpublished posts).
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDraft($query)
    {
        return $query->where('published', false);
    }
    /**
     * Scope a query to only include posts whose publish date is in the past (or now).
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLive($query)
    {
        return $query->publie()->where('published_at', '<=', now());
    }
    /**
     * Scope a query to only include posts whose publish date is in the future.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeScheduled($query)
    {
        return $query->where('publish_date', '>', now());
    }
    /**
     * Scope a query to only include posts whose publish date is before a given date.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $date
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBeforePublishDate($query, $date)
    {
        return $query->where('publish_date', '<=', $date);
    }
    /**
     * Scope a query to only include posts whose publish date is after a given date.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $date
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAfterPublishDate($query, $date)
    {
        return $query->where('publish_date', '>', $date);
    }

        /**
     * Get the human-friendly reading time of a post.
     *
     * @param $value
     * @return string
     */
    public function getReadTimeAttribute($value): string
    {
        // Only count words in our estimation
        $words = str_word_count(strip_tags($this->body));

        // Divide by the average number of words per minute
        $minutes = ceil($words / 250);

        return sprintf('%s %s %s', $minutes, Str::plural(' min', $minutes), ' read');
    }
}