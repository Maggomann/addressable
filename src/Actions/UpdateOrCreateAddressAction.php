<?php

namespace Maggomann\LaravelAddressable\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Maggomann\LaravelAddressable\DTO\AddressData;
use Maggomann\LaravelAddressable\Models\Address;

class UpdateOrCreateAddressAction
{
    protected AddressData $addressData;

    protected Model $model;

    /**
     * @throws ModelNotFoundException
     */
    public function execute(Model $model, AddressData $addressData, ?Address $address = null): Address
    {
        return DB::transaction(function () use ($model, $addressData, $address) {
            $this->addressData = $addressData;
            $this->model = $model;

            return $this->firstOrCreateAddress($address)
                ->address();
        });
    }

    public function makeAddress(AddressData $addressData, ?Address $address = null): Address
    {
        if (is_null($address)) {
            $address = new Address();
        }

        $address->fill($addressData->toArray());
        $address->withCategory($addressData->category_id);
        $address->withGender($addressData->gender_id);

        return $address;
    }

    public function firstOrCreateAddress(?Address $address = null): self
    {
        $address = $this->makeAddress($this->addressData, $address);

        $this->model->address()->save($address);

        return $this;
    }

    /**
     * @throws ModelNotFoundException
     */
    public function address(): Address
    {
        return $this->model->address()->firstOrFail();
    }
}
