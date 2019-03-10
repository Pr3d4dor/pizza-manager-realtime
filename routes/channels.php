<?php

use App\Models\Order;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('pizza-tracker.{id}', function ($user, $id) {
    return $user->id === Order::find($id)->user_id;
});
