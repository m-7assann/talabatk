@extends('layout.users.master')
@section('page-header')
<div class="container mx-auto">
    <div class="flex justify-center px-6 my-12">
        <!-- Row -->
        <div class="w-full  lg:w-11/12 flex">
            <!-- Col -->
            <img src="{{ asset('image/login.svg') }}" alt="" width="700">
            <div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
                <h3 class="pt-4 text-2xl text-center"> استرجاع كلمة المرور

                    @if(request()->is('resturant/*'))
                        لمدير مطعم
                    @elseif(request()->is('admin/*'))
                        لمدير
                    @else
                        لزبون
                    @endif

                </h3>
                <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded" method="POST"
                action="{{ route('password.email') }}">
                    @csrf


                    <!-- Email Address -->
                    <div class="mb-4  ">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="email">البريد الإلكتروني</label>

                        <input id="email" placeholder="أدخل البريد الإلكتروني"
                            class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline  {{ $errors->has('email')?'border-red-500':'' }}"
                            type="email" name="email" :value="old('email')" required autofocus />
                        @error('email')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>


                    <button
                        class="my-10 w-full px-4 py-2 font-bold text-main bg-white rounded-full hover:bg-main hover:text-white border border-main ease-out duration-200 focus:outline-none focus:shadow-outline"
                        type="submit">
                        استرجاع كلمة المرور
                        <button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
