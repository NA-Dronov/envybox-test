<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClaimRequest;
use App\IStorage;

class ClaimController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ClaimRequest $request)
    {
        //Берём зарегистрированные методы хранения
        //Через фабрику вызываем хранилища
        //Сохраняем в хранилищах заявку
        /**
         * @var \Illuminate\Support\Collection
         */
        $storageList=app(IStorage::class);
        foreach($storageList as $storage) {
            $storage->store($request->validated());
        }
        return response([
            'message' => 'Подздравляем! Заявка успешно обработана на сервере.',
            'type' => 'success'
        ]
        , 200);
    }
}