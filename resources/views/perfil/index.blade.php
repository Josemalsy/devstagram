@extends('layouts.app')

@section('titulo')
  Editar perfil: {{auth()->user()->username}}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
      <div class="md:w-1/2 bg-white shadow p-6">
        <form action="{{route('perfil.store')}}" method="post" class="mt-10 md:mt-0" enctype="multipart/form-data">
          @csrf

          <div class="mb-5">
            <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
            <input id="username" name="username" type="text" placeholder="Tu nombre de usuario" class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"value="{{auth()->user()->username}}"/>
          
            @error('username')
              <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
            @enderror
          </div>

          <div class="mb-5">
            <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
            <input type="email" name="email" id="email" placeholder="Tu nuevo email" class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror "value="{{old('email')}}" />
          
            @error('email')
              <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
            @enderror
          </div>

          <div class="mb-5">
            <label for="oldpassword" class="mb-2 block uppercase text-gray-500 font-bold">Antigua Contraseña</label>
            <input id="oldpassword" name="oldpassword" type="password" placeholder="Tu Password" class="border p-3 w-full rounded-lg @error('oldpassword') border-red-500 @enderror">
            @error('oldpassword')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ $message }}</p>
            @enderror
          </div>

          <div class="mb-5">
            <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Nueva Contraseña</label>
            <input type="password" name="password" id="password" placeholder="Contraseña de registro" class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror "value="{{old('password')}}" />
          
            @error('password')
              <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
            @enderror
          
          </div>
  
          <div class="mb-5">
            <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repetir Nueva Contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repite tu contraseña" class="border p-3 w-full rounded-lg @error('password_confirmation') border-red-500 @enderror "value="{{old('password')}}" />
          
          </div>

          @if (session('mensaje'))
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{session('mensaje')}}</p>
          @endif

          <div class="mb-5">
            <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">Imagen perfil</label>
            <input 
              id="imagen" name="imagen" type="file" 
              class="border p-3 w-full rounded-lg"
              value="{{auth()->user()->imagen}}"
              accept=".jpg, .jpeg, .png"
            />
          </div>

          <input type="submit" value="Guardar cambios" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" />


        </form>
      </div>
    </div>
@endsection

