<?php

namespace Maggomann\Addressable\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $title_translation_key
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 */
class AddressGender extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function __construct(array $attributes = [])
    {
        $this->setTable(config('addressable.tables.address_genders', 'address_genders'));

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
        'title_translation_key',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
