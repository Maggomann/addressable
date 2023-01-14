<?php

namespace Maggomann\LaravelAddressable\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int|null $gender_id
 * @property int|null $category_id
 * @property int $addressable_id
 * @property string $addressable_type
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $name
 * @property string|null $street_address
 * @property string|null $street_addition
 * @property string|null $postal_code
 * @property string|null $city
 * @property string|null $country_code
 * @property string|null $state
 * @property string|null $company
 * @property string|null $job_title
 * @property string|null $latitude
 * @property string|null $longitude
 * @property int|bool $is_preferred
 * @property int|bool $is_main
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 */
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
        'last_name',
        'name',
        'street_address',
        'street_addition',
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

    public function addressable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @throws ModelNotFoundException
     */
    public function withCategory(AddressCategory|int $addressCategory): self
    {
        if ($addressCategory instanceof AddressCategory) {
            $this->category_id = $addressCategory->id;

            return $this;
        }

        $this->category_id = AddressCategory::query()->findOrFail($addressCategory)->id;

        return $this;
    }

    /**
     * @throws ModelNotFoundException
     */
    public function withGender(AddressGender|int $addressGender): self
    {
        if ($addressGender instanceof AddressGender) {
            $this->gender_id = $addressGender->id;

            return $this;
        }

        $this->gender_id = AddressGender::query()->findOrFail($addressGender)->id;

        return $this;
    }
}
