<?php

namespace App\Observers;

use App\Jobs\SendMail;
use App\Models\Agent;
use Illuminate\Support\Facades\Log;

class AgentObserver
{
    /**
     * Handle the Agent "created" event.
     */
    public function created(Agent $agent): void
    {
        Log::info('The user has been created under this ' .$agent->id.'id');
        SendMail::dispatch('Created '.$agent->name . '  agent under id:' . $agent->id);
    }

    /**
     * Handle the Agent "updated" event.
     */
    public function updated(Agent $agent): void
    {
        Log::info('The user has been updated under this ' .$agent->id.'id');
        SendMail::dispatch('Updated '.$agent->name . '  agent under id:' . $agent->id);
    }

    /**
     * Handle the Agent "deleted" event.
     */
    public function deleted(Agent $agent): void
    {
        Log::info('The user has been updated under this ' .$agent->id.'id');
        SendMail::dispatch('Deleted '.$agent->name . '  agent under id:' . $agent->id);
    }

    /**
     * Handle the Agent "restored" event.
     */
    public function restored(Agent $agent): void
    {
        //
    }

    /**
     * Handle the Agent "force deleted" event.
     */
    public function forceDeleted(Agent $agent): void
    {
        //
    }
}
