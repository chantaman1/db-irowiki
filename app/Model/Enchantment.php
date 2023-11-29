<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Enchantment extends Model
{
    protected $table = 'enchantment';
    protected $npc_id;
    protected $location;
    protected $name;
    protected $description;
    protected $type;
    protected $wiki;
    
    protected $fillable=[
        'location', 'name', 'description', 'type', 'wiki'
    ];

    protected $casts = [
        'npc_id' => 'integer',
        'location' => 'string',
        'name' => 'string',
        'description' => 'string',
        'type' => 'string',
        'modifier' => 'string'
    ];
}
