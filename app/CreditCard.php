<?php

namespace App;

use App\Http\Controllers\CreditCardController;
use App\Traits\Useruuid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CreditCard extends Model
{
    use SoftDeletes, Useruuid;
    public $incrementing = false;
    protected $fillable = ['id', 'customer_id', 'number', 'expire', 'brand'];

    protected $with = ['customer'];

    protected $appends = ['links', 'permissions'];


    public function __construct(array $attributes = [])
    {
        self::bootUsesUuid();
        // if (!array_key_exists('customer_id', $attributes)) {
        //     $attributes['customer_id'] = auth()->user()->id;
        // }
        parent::__construct($attributes);
    }

    public static function create(array $attributes = [])
    {
        if (!array_key_exists('customer_id', $attributes)) {
            $attributes['customer_id'] = auth()->user()->id;
        }
        return static::query()->create($attributes);
    }
    public function getLinksAttribute()
    {
        return [
            'edit' => action([CreditCardController::class, 'edit'], $this),
            'update' => action([CreditCardController::class, 'update'], $this),
            'destroy' => action([CreditCardController::class, 'destroy'], $this),
            // 'restore' => action([CreditCardController::class, 'restore'], $this),
        ];
    }

    public function getPermissionsAttribute()
    {
        return [
            'update' => Auth::user()->can('update', $this),
            'delete' => Auth::user()->can('delete', $this),
            'restore' => Auth::user()->can('restore', $this),
        ];
    }


    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
