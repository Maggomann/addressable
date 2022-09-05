<?php

namespace Maggomann\LaravelAddressable\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function __construct(array $attributes = [])
    {
        $this->setTable(config('addressable.tables.addresses', 'addresses'));

        parent::__construct($attributes);
    }

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'addressable_id',
        'addressable_type',
        'first_name',
        'first_name',
        'last_name',
        'name',
        'street',
        'street_addition',
        'street_address',
        'label',
        'postal_code',
        'city',
        'country_code',
        'state',
        'company',
        'job_title',
        'latitude',
        'longitude',
        'is_preferred',
        'is_main',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
