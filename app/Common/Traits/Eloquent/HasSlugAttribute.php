<?php


namespace App\Common\Traits\Eloquent;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Rennokki\QueryCache\Traits\QueryCacheable;

trait HasSlugAttribute
{

    /**
     * Boot function from Laravel.
     */
    protected static function bootHasSlugAttribute()
    {
        static::creating(function ($model) {
            $slugKey = $model->getSlugKeyName();
            if (empty($model->{$slugKey})) {
                $slug = Str::slug($model->title ?? $model->name ?? '');

                if(!empty($slug)){
                    $traits = collect(class_uses($model));
                    $lastModel = $traits->has(QueryCacheable::class) ? $model->dontCache() : $model;
                    $lastModel = $lastModel->where('slug', 'like', "{$slug}%")
                        ->orderBy($model->getKeyName(), 'desc')
                        ->first();

                    if($lastModel){
                        $number = Str::replaceFirst($slug,'', $lastModel->slug);
                        $number = abs($number) + 1;
                        $slug = "{$slug}-{$number}";
                    }
                }

                $model->{$slugKey} = $slug;
            }
        });
    }


    /**
     * @return string
     */
    public function getSlugKeyName(): string
    {
        return !empty($this->slugKey)
            ? $this->slugKey
            : 'slug';
    }

    /**
     * @return string
     */
    public function getSlugKey(): string
    {
        return $this->getAttribute($this->getSlugKeyName());
    }

    /**
     * @param string $slug
     * @return Model|null
     */
    public static function findBySlug(string $slug): ?Model
    {
        return static::where((new static())->getSlugKeyName(), $slug)->first();
    }

}
