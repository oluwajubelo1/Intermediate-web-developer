<?php

namespace App;

use App\Traits\Useruuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlockUser extends Model
{
    // use SoftDeletes;
    protected $fillable = ['customer_id', 'reason'];

    public function __construct(array $attributes = [])
    {
        // $attributes['customer_id'] = auth()->user()->id;
        parent::__construct($attributes);
    }

    public static function create(array $attributes = [])
    {
        if (!array_key_exists('customer_id', $attributes)) {
            $attributes['customer_id'] = auth()->user()->id;
        }
        return static::query()->create($attributes);
    }
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
