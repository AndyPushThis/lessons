<?php

namespace App\Models;

use App\Observers\PostObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[ObservedBy([PostObserver::class])]
class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'body',
        'cover',
        'user_id',
        'category_id'
    ];
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tags() : BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)
            ->whereNull('comment_id')->with('comments.user');
    }

    public function scopeByCategory(Builder $query, $category): void
    {
        $query->when($category, function($query) use ($category){
           $query->where('category_id', $category);
        });
    }
    public function scopeByTag(Builder $query, $tag): void
    {
        $query->when($tag, function ($query) use ($tag){
            $query->whereHas('tags', function ($query) use ($tag){
                $query->where('name', $tag);
            });
        });
    }
    public function scopeSearch(Builder $query, $search){
        $query->when($search, function ($query) use ($search){
            $query->where('title', 'like', '%' . $search . '%');
        });
    }
}
