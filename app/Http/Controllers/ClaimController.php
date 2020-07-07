<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClaimRequest;
use App\IStorage;
use App\Models\Claim;

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
        Claim::create($request->validated());
        return response([
            'message' => 'Подздравляем! Заявка успешно обработана на сервере.',
            'type' => 'success'
        ]
        , 200);
    }
}