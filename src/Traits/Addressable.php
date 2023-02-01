<?php

namespace Maggomann\Addressable\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Maggomann\Addressable\Models\Address;

trait Addressable
{
    public function addresses(): MorphMany
    {
        return $this->morphMany(Address::class, 'addressable', 'addressable_type', 'addressable_id');
    }

    public function address(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable', 'addressable_type', 'addressable_id');
    }
}
