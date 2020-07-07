<?php
namespace App\Libs;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class FileStorage implements IStorage {
    public function store(array $data)
    {
        $name='claim_'.$data['id'].'_'.Carbon::now()->timestamp;
        $text='';
        foreach (array_filter($data,function($el){return !in_array($el,['id','updated_at']);},ARRAY_FILTER_USE_KEY) as $key => $value) {
            $text.='['.strtoupper($key).']'.PHP_EOL.$value.PHP_EOL;
        }
        Storage::disk('local')->put('claims/'.$name.'.txt', $text);
    }
}