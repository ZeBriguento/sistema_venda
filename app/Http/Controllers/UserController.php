<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserAdminRequest;
use App\Http\Requests\UpdateUserAdminRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Admin;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::get()->where('is_deleted', '0');
        return view('admin.user.index', compact('users'));
    }


    public function create()
    {
        return view('admin.user.create');
    }


    public function store(StoreUserAdminRequest $request)
    {

        // $rol = $request->rol; 

        $user = new User;
        // $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->status = $request->status;
        $user->rol = 'ADMIN';
        // dd($user);
        $user->save();

        $admin = new Admin;
        $admin->user_id = $user->id;
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->phone = $request->phone;
        $admin->nif_number = $request->nif_number;
        $admin->address = $request->address;

        if ($request->hasFile('img_url')) {
            $file = $request->file('img_url');
            $image_name = asset('uploads/user').'/'.time(). '_' . $file->getClientOriginalName();
            $admin->img_url = $image_name;
        }

        $admin->save();
        return redirect()->route('users.index')->with('status', 'Usuário criado com sucesso');
    }


    public function show(User $user)
    {
        if ($user->rol == 'ADMIN') {
            $profile = Admin::get()->where('user_id', $user->id)->first();
            return view('admin.user.show', compact('user', 'profile'));
        }
        if ($user->rol == 'CLIENT') {
            $profile = Client::get()->where('user_id', $user->id)->first();
            return view('client.layouts.show', compact('user', 'profile'));
        }
        
    }

    public function edit(User $user)
    {
        // dd();

        if ($user->rol == 'ADMIN') {
            $profile = Admin::get()->where('user_id', $user->id)->first();
            return view('admin.user.edit', compact('user', 'profile'));
        }
        if ($user->rol == 'CLIENT') {
            $profile = Client::get()->where('user_id', $user->id)->first();
            return view('client.layouts.edit', compact('user', 'profile'));
        }

        // $admin = Admin::get()->where('user_id', $user->id)->first();
        // dd($profile);
        // return view('admin.user.edit', compact('user', 'admin'));
    }

    public function update(Request $request, User $user)
    {
        // $admin = Admin::get()->where('user_id', $user->id)->first();
        if ($user->rol == 'ADMIN') {
            $profile = Admin::get()->where('user_id', $user->id)->first();
            $table_name = 'admins';
            // return view('admin.user.edit', compact('user', 'profile'));
        }
        if ($user->rol == 'CLIENT') {
            $profile = Client::get()->where('user_id', $user->id)->first();
            $table_name = 'clients';
            // return view('client.layouts.edit', compact('user', 'profile'));
        }
         
        // Val
        $validate = $request->validate(
            //rule
            [
                // 'name' => 'required|string|max:255',
                'email' => 'required|string|email|unique:users,email,' . $user->id . '|max:255',
                'password' => 'nullable|string|max:255',
                // Admin
                'first_name' => 'required|string|max:50',
                'last_name' => 'required|string|max:50',
                // 'email' => 'nullable|string|email|max:255|unique:users',
                'nif_number' => 'required|string|min:15|unique:'.$table_name.',nif_number,' . $profile->id . '|max:15',
                'phone' => 'required|string|min:9|unique:'.$table_name.',phone,' . $profile->id . '|max:9',
                'nif_number' => 'required|string|min:15|max:15',
                'img_url' => 'nullable|image|mimes:jpeg,png,jpg',

                // 'phone' => 'required|string|min:9||max:9',
                // 'address' => 'nullable|string|max:255',
            ],
            // message
            [
                'name.required' => 'Campo obrigatório',
                'name.string' => 'Valor incorreto',
                'name.max' => 'Só são permitidos 255 caracteres',

                'email.required' => 'Campo obrigatório',
                'email.string' => 'Valor incorreto',
                'email.max' => 'Só são permitidos 255 caracteres',
                'email.unique' => 'Já registrado',
                'email.email' => 'Email inválido',
                'password.string' => 'Valor incorreto',
                'password.max' => 'Só são permitidos 255 caracteres',
                'img_url.image' => 'Imagem inválida',
                'img_url.mimes' => 'Tem de fornecer uma imagem no formato jpeg,png,jpg',

            ]
        );
        // Val

        if (!empty($request->password)) {
            // dd($request->password);
            $user->password = Hash::make($request->password);
        }

        // $user = new User;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->status = $request->status;
        // $user->rol = 'ADMIN';

        // dd($user);
        $user->update();

        if ($request->hasFile('img_url')) {
            $file = $request->file('img_url');
            $image_name = asset('uploads/user').'/'.time(). '_' . $file->getClientOriginalName();
            $file->move(public_path('/uploads/user'), $image_name);
            $profile->img_url = $image_name;
        }


        $profile->user_id = $user->id;
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->phone = $request->phone;
        $profile->nif_number = $request->nif_number;
        $profile->address = $request->address;
        $profile->update();

        // $profile->update();
        if ($user->rol == 'ADMIN') {
            // $profile = Admin::get()->where('user_id', $user->id)->first();
            // $table_name = 'admins';
            return redirect()->route('users.index')->with('status', 'Usuário editado com sucesso');
            // return view('admin.user.edit', compact('user', 'profile'));
        }
        if ($user->rol == 'CLIENT') {
            // $profile = Client::get()->where('user_id', $user->id)->first();
            // $table_name = 'clients';
            // return view('client.layouts.edit', compact('user', 'profile'));
            return redirect()->route('login.index')->with('status', 'Usuário editado com sucesso');
        }
    }

    public function destroy(User $user)
    {
        $user->is_deleted = true;
        $user->update();
        return redirect()->route('users.index')->with('status', 'Usuário eliminado com sucesso');
    }
}
