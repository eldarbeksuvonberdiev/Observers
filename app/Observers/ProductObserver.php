<?php

namespace App\Observers;

use App\Jobs\SendMail;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        Log::info('The user has been created under this ' .$product->id.'id');
        SendMail::dispatch('Created '.$product->name . '  product under id:' . $product->id);
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        Log::info('The user has been updated under this ' .$product->id.'id');
        SendMail::dispatch('Updated '.$product->name . '  product under id:' . $product->id);
    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        Log::info('The user has been updated under this ' .$product->id.'id');
        SendMail::dispatch('Deleted '.$product->name . '  product under id:' . $product->id);
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }
}
