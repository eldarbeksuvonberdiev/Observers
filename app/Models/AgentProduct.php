<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgentProduct extends Model
{
    protected $fillable = [
        'agent_id',
        'product_id',
        'price'
    ];

    public function agent(){
        return $this->belongsTo(Agent::class,'agent_id');
    }
}
