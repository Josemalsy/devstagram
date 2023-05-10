<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
  /**
   * Display a listing of the resource.
   */

  public function __construct(){
    $this->middleware('auth');
  }
  
  public function index()
  {
    return view('perfil.index');
  }

  /**
   * Show the form for creating a new resource.
   */

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {

    $request->request->add(['username' => Str::slug($request->username)]);
    
    $this->validate($request, [
      'username' => ['required','unique:users,username,' . auth()->user()->id,'min:3','max:20', 'not_in:twitter,editar-perfil'],
      'email' => ['required','unique:users,email,' . auth()->user()->id,'email','max:60'],
      'oldpassword' => 'current_password',
    ]);
    
    if($request->imagen){
    $imagen = $request->file('imagen');
    
    $nombreImagen = Str::uuid() . "." . $imagen->extension();
    
    $imagenServidor = Image::make($imagen);
    $imagenServidor->fit(1000,1000);
    
    $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
    $imagenServidor->save($imagenPath);
  }
  
    $usuario = User::find(auth()->user()->id);
    
    $usuario->username = $request->username;
    $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
    $usuario->password = Hash::make($request->password_confirmation ?? auth()->user()->password);
    $usuario->save();
    
    return redirect()->route('posts.index', $usuario->username);
    
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
