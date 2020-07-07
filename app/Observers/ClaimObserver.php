<?php

namespace App\Observers;

use App\Libs\IStorage;
use App\Models\Claim;

class ClaimObserver
{
    /**
     * Handle the models claim "created" event.
     *
     * @param  \App\ModelsClaim  $modelsClaim
     * @return void
     */
    public function created(Claim $claim)
    {
        //Берём зарегистрированные методы хранения
        //Через фабрику вызываем хранилища
        //Сохраняем в хранилищах заявку
        /**
         * @var \Illuminate\Support\Collection
         */
        $storageList=app(IStorage::class);
        foreach($storageList as $storage) {
            $storage->store($claim->toArray());
        }
    }
}
