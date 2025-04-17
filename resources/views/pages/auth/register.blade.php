@extends('layouts.default')

@section('content')
<section class="py-12">
    <div class="container mx-auto px-4">
      <div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
          <h2 class="text-2xl font-bold mb-6 text-center">Create Your Account</h2>

          <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Your Name</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-600" placeholder="Ahmudul Hossen" required>
                @error('email')
                  <p class="text-red-400">{{ $message }}</p>
                  @enderror
              </div>

            <div class="mb-4">
              <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
              <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-600" placeholder="your@email.com" required>
              @error('email')
                <p class="text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
              <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
              <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-600" placeholder="••••••••" required>
              @error('password')
                <p class="text-red-400">{{ $message }}</p>
                @enderror
              <div class="flex justify-end mt-2">
                <a href="#" class="text-sm text-emerald-600 hover:underline">Forgot Password?</a>
              </div>
            </div>

            <div class="mb-6">
              <button type="submit" class="w-full bg-emerald-600 text-white py-2 px-4 rounded-md font-medium hover:bg-emerald-700 transition">Register</button>
            </div>

            <div class="flex items-center justify-center">
              <span class="text-gray-600">Already have an account?</span>
              <a href="{{ route('login') }}" class="ml-2 text-emerald-600 hover:underline">Login</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
