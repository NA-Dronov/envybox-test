<?php

namespace App\Models;

use App\IStorage;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model implements IStorage
{
    protected $fillable = ['name', 'phone', 'message'];

    public function store(array $data)
    {
        self::create($data);
    }
}
