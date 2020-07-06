<?php
namespace App\Libs;

use App\IStorage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class FileStorage implements IStorage {
    public function store(array $data)
    {
        $name='claim_'.$data['name'].'_'.Carbon::now()->toDateString().'_'.Carbon::now()->timestamp;
        Storage::disk('local')->put('claims/'.$name.'.json', json_encode($data));
    }
}