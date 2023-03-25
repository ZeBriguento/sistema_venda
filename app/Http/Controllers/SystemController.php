<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSystemRequest;
use App\Http\Requests\UpdateSystemRequest;
use App\Models\System;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $system = System::get()->first();
        return view('admin.system.index', compact('system'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSystemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSystemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\System  $system
     * @return \Illuminate\Http\Response
     */
    public function show(System $system)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\System  $system
     * @return \Illuminate\Http\Response
     */
    public function edit(System $system)
    {
        //
        //
        //  $subCategories = SubCategory::get()->where('is_deleted', '0');
        return view('admin.system.edit', compact('system'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSystemRequest  $request
     * @param  \App\Models\System  $system
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, System $system)
    {
        //
        // dd($request->all());
        $validate = $request->validate(
            //rule
            [
                'email' => 'required|string|email|unique:systems,email,' . $system->id . '|max:255',
                // Admin
                'name' => 'required|string|max:255',
                'address' => 'nullable|string|max:255',
                'img_url' => 'nullable|image|mimes:jpeg,png,jpg',
                'nif_number' => 'required|string|min:15|unique:systems,nif_number,' . $system->id . '|max:15',
                'phone' => 'required|string|min:9|unique:systems,phone,' . $system->id . '|max:9',
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

                'phone.required' => 'Campo obrigatório',
                'phone.string' => 'Valor incorreto',
                'phone.max' => 'Só são permitidos 9 caracteres',
                'phone.min' => 'Só são permitidos 9 caracteres',
                'phone.unique' => 'Já registrado',
                // 'phone.email' => 'Email inválido',

                'password.string' => 'Valor incorreto',
                'password.max' => 'Só são permitidos 255 caracteres',

                'address.string' => 'Valor incorreto'

            ]
        );
        if ($request->hasFile('main_image')) {
            $file = $request->file('main_image');
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('/uploads/system'), $image_name);
            $system->img_url = $image_name;
        }

        $system->name = $request->name;
        $system->nif_number = $request->nif_number;
        $system->phone = $request->phone;
        $system->email = $request->email;
        $system->address = $request->address;

        // dd('teste');
        $system->update();
        return redirect()->route('systems.index')->with('status', 'Site editado com sucesso');
    }
    public function updatepaypal(Request $request)
    {
        $system = System::find($request->id);
        // dd($request);
        // SystemDB::update('update users set votes = 100 where name = ?', ['John']);;
        // $system->id = $request->paypal_client_id;
        $system->paypal_client_id = $request->paypal_client_id;
        $system->paypal_client_secret = $request->paypal_client_secret;
        $system->paypal_mode = $request->paypal_mode;
        $system->paypal_current = $request->paypal_current;
        
        // dd('teste');
        $system->update();
        return redirect()->route('systems.index')->with('status', 'Atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\System  $system
     * @return \Illuminate\Http\Response
     */
    public function destroy(System $system)
    {
        //
    }
}
