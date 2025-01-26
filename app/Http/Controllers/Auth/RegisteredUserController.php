<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\prodi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use App\Models\poin_minim;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $prodi = prodi::all();
        return view('auth.register',compact('prodi'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => ['required', 'string', 'max:255', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'prodi_id' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'nim' => $request->nim,
            'name' => $request->name,
            'prodi_id' => $request->prodi_id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $poin = prodi::where('id',$request->prodi_id)->get('poin')->first();

        $poin_minimal = poin_minim::create([
            'point_minim' => $poin->poin,
            'nim' => $request->nim,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::DASHBOARD);
    }
}
