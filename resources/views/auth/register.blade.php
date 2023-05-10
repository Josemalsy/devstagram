@extends('layouts.app')

@section('titulo')
  Regístrate en DevStagram
@endsection

@section('contenido')
  <div class="md:flex md:justify-center md:gap-10 md:items-center">
    <div class="md:w-6/12 p-5">
      <img src="{{asset('img/registrar.jpg')}}" alt="imagen registro de usuario">
    </div>

    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
      <form action="{{route('register')}}" method="POST">
        @csrf

        <div class="mb-5">
          <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">Tu nombre</label>
          <input id="name" name="name" type="text" placeholder="Tu Nombre" class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"value="{{old('name')}}"/>
        
          @error('name')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
          @enderror       
        </div>
          
              
        <div class="mb-5">
          <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Tu nombre de usuario</label>
          <input type="text" name="username" id="username" placeholder="Tu nombre de usuario" class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror "value="{{old('username')}}" />
        
          @error('username')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
          @enderror        
        </div>

        <div class="mb-5">
          <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
          <input type="email" name="email" id="email" placeholder="Tu email de registro" class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror "value="{{old('email')}}" />
        
          @error('email')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
          @enderror
        
        </div>


        <div class="mb-5">
          <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Contraseña</label>
          <input type="password" name="password" id="password" placeholder="Contraseña de registro" class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror "value="{{old('password')}}" />
        
          @error('password')
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{$message}}</p>
          @enderror
        
        </div>

        <div class="mb-5">
          <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repetir Contraseña</label>
          <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repite tu contraseña" class="border p-3 w-full rounded-lg @error('password_confirmation') border-red-500 @enderror "value="{{old('password')}}" />
        
        </div>
        
        <input type="submit" value="crear cuenta" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" />
        
      </form>
    </div>
    
  </div>
@endsection