<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getResult(Request $request)
    {

        $person = $request->find;
        if (!$person) {
            return redirect()->route('home');
        }

        $users = User::where('id', '!=', auth()->user()->id)

            ->where(function ($query) use ($request) {

                return $query->when($request->find, function ($q) use ($request) {

                    return $q->where('user_name', 'like', '%' . $request->find . '%')
                        ->orWhere('first_name', 'like', '%' . $request->find . '%')
                        ->orWhere('last_name', 'like', '%' . $request->find . '%');
                });
            })->get();

        return view('search.find-people', compact('users'));

    }
}
