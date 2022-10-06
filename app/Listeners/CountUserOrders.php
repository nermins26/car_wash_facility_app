<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Models\OrderCount;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class CountUserOrders
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderCreated  $event
     * @return void
     */
    public function handle(OrderCreated $event)
    {
        $user = $event->user;
        $count = OrderCount::where('user_id', $user->id)->first();

        DB::table('order_counts')
            ->where('user_id', $user->id)
            ->update([
                'count' => $count->count + 1
        ]);
        
    }
}
