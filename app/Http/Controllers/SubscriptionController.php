<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subscribe(Request $request, $id)  {
        $user =auth()->user();
        if ($user->isSubscribeToCategory($id)) {
            $user->unsubscribeToCategory($id);
            return redirect(route('home'))->with('success', 'You have unsubscribed!');
        }
        $user->subscribeToCategory($id);
        return redirect(route('home'))->with('success', 'You have subscribed!');
    }
}
