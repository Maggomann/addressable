<?php

namespace Maggomann\LaravelAddressable\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Maggomann\LaravelAddressable\Models\Address;

trait Addressable
{
    public function addresses(): MorphMany
    {
        return $this->morphMany(Address::class, 'addressable', 'addressable_type', 'addressable_id');
    }
}
