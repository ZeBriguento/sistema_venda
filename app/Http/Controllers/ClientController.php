<?php

namespace App\Http\Controllers;

// use App\Http\Requests\StoreClientRequest;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\StoreUserRequest;
// use App\Http\Requests\UpdateClientRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        if (Auth::user()->rol == 'ADMIN') {
            $users = User::where('is_deleted', '0')->where('rol', 'CLIENT');
            return view('admin.client.index', compact('users'));
        } else {
            return redirect()->action([LoginController::class, 'index']);
        }
    }


    public function create()
    {
        if (Auth::user()->rol == 'ADMIN') {
            return view('admin.client.create');
        } else {
            return redirect()->action([LoginController::class, 'index']);
        }
    }


    public function store(StoreClientRequest $request)
    {
        // $rol = $request->rol; 
        if (Auth::user()->rol == 'ADMIN') {

            $user = new User;
            $user->password = Hash::make($request->password);
            $user->email = $request->email;
            $user->status = $request->status;
            $user->rol = 'CLIENT';
            $user->save();

            $client = new Client;
            $client->user_id = $user->id;
            $client->first_name = $request->first_name;
            $client->last_name = $request->last_name;
            $client->phone = $request->phone;
            $client->nif_number = $request->nif_number;
            $client->address = $request->address;

            if ($request->hasFile('img_url')) {
                $file = $request->file('img_url');

                $image_name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('/uploads/user'), $image_name);
                $image_my_name = $image_name;
            }
            // Validate Image
            if (!empty($image_my_name)) {
                $client->img_url = $image_my_name;
            }
            // Validate Image
            $client->save();
            return redirect()->route('clients.index')->with('status', 'Cliente criado com sucesso');
        } else {
            return redirect()->action([LoginController::class, 'index']);
        }
    }


    public function show(Client $client)
    {
        if (Auth::user()->rol == 'ADMIN') {
            $user = User::where('id', $client->user_id)->first();
            return view('admin.client.show', compact('user', 'client'));
        } else {
            return redirect()->action([LoginController::class, 'index']);
        }
    }

    public function edit(Client $client)
    {

        if (Auth::user()->rol == 'ADMIN') {
            $user = User::where('id', $client->user_id)->first();
            return view('admin.client.edit', compact('user', 'client'));
        } else {
            return redirect()->action([LoginController::class, 'index']);
        }
    }

    public function update(Request $request, Client $client)
    {

        if (Auth::user()->rol == 'ADMIN') {

            $user = User::where('id', $client->user_id)->first();

            // Val
            $validate = $request->validate(
                //rule
                [
                    'email' => 'required|string|email|unique:users,email,' . $user->id . '|max:255',
                    'password' => 'nullable|string|max:255',
                    // Admin
                    'first_name' => 'required|string|max:50',
                    'last_name' => 'required|string|max:50',
                    'img_url' => 'nullable|image|mimes:jpeg,png,jpg',
                    'nif_number' => 'required|string|min:15|unique:admins,nif_number,' . $client->id . '|max:15',
                    'phone' => 'required|string|min:9|unique:admins,phone,' . $client->id . '|max:9',
                    'nif_number' => 'required|string|min:15|max:15',
                ],
                // message
                [
                    'name.required' => 'Campo obrigatório',
                    'name.string' => 'Valor incorreto',
                    'name.max' => 'Só são permitidos 255 caracteres',

                    'img_url.image' => 'Deve inserir uma imagem',
                    'img_url.mimes' => 'Deve inserir uma imagem no formato jpeg, jpg ou png',

                    'email.required' => 'Campo obrigatório',
                    'email.string' => 'Valor incorreto',
                    'email.max' => 'Só são permitidos 255 caracteres',
                    'email.unique' => 'Já registrado',
                    'email.email' => 'Email inválido',
                    'password.string' => 'Valor incorreto',
                    'password.max' => 'Só são permitidos 255 caracteres',

                ]
            );
            // Val
            $image_my_name = '';
            if (!empty($request->password)) {
                $user->password = Hash::make($request->password);
            }

            $user->email = $request->email;
            $user->status = $request->status;
            $user->update();
            $image_my_name = $request->img_url;

            if ($request->hasFile('img_url')) {

                $file = $request->file('img_url');
                $image_name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('/uploads/user'), $image_name);
                $image_my_name = $image_name;
            }

            if (!empty($image_my_name)) {
                $client->img_url = $image_my_name;
            }
            // k

            $client->first_name = $request->first_name;
            $client->last_name = $request->last_name;
            $client->nif_number = $request->nif_number;
            $client->phone = $request->phone;
            $client->address = $request->address;

            $client->update();
            return redirect()->route('clients.index')->with('status', 'Cliente editado com sucesso');
        } else {
            return redirect()->action([LoginController::class, 'index']);
        }
    }

    public function destroy(Client $client)
    {

        if (Auth::user()->rol == 'ADMIN') {
            $user = User::where('id', $client->user_id)->first();
            $user->is_deleted = true;
            $user->update();
            return redirect()->route('clients.index')->with('status', 'Cliente eliminado com sucesso');
        } else {
            return redirect()->action([LoginController::class, 'index']);
        }
    }
}
