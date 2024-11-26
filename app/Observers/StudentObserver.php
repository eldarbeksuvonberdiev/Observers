<?php

namespace App\Observers;

use App\Models\Student;
use Illuminate\Support\Facades\Log;

class StudentObserver
{
    /**
     * Handle the Student "created" event.
     */
    public function created(Student $student): void
    {
        Log::info('Student is created under the id of: '.$student->id);
    }

    /**
     * Handle the Student "updated" event.
     */
    public function updated(Student $student): void
    {
        Log::info('A student with id ' . $student->id . '. Has been successfuly updated at time: '. now());
    }
    
    /**
     * Handle the Student "deleted" event.
     */
    public function deleted(Student $student): void
    {
        Log::info('A student with id ' . $student->id . '. Has been successfuly deleted at time: '. now());
    }

    /**
     * Handle the Student "restored" event.
     */
    public function restored(Student $student): void
    {
        //
    }

    /**
     * Handle the Student "force deleted" event.
     */
    public function forceDeleted(Student $student): void
    {
        //
    }
}
