@extends('layout.users.master')
@section('page-header')
<!-- Container -->
<div class="container mx-auto">
    <div class="flex justify-center px-6 my-12">
        <!-- Row -->
        <div class="grid grid-cols-2 gap-3 justify-center items-center">
            <!-- Col -->
            <img src="{{ asset('image/register.svg') }}" alt="" width="700">
            <!-- Col -->
            <div class=" bg-white p-5 rounded-lg lg:rounded-l-none">
                <h3 class="pt-4 text-2xl text-center">إنشاء حساب جديد
                    ك{{ request()->is('resturant/*')?'مدير مطعم':'زبون' }}
                </h3>
                <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded" action="{{ route('register') }}" enctype="multipart/form-data"
                    method="POST" >
                    @csrf
                    <div class="mb-4 md:flex md:justify-between  ">
                        <div class="mb-4  ">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="firstName">
                                الاسم
                            </label>
                            <input
                                class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline  {{ $errors->has('email')?'border-red-500':'' }}"
                                id="name" name="name" type="text" placeholder="أدخل اسمك" />
                            @error('name')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <div class="mb-4  ">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                            البريد الإلكتروني
                        </label>
                        <input
                            class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow  {{ $errors->has('email')?'border-red-500':'' }} appearance-none focus:outline-none focus:shadow-outline"
                            id="email" type="email" name="email" placeholder="أدخل البريد الإلكتروني" />
                        @error('email')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    @if(request()->is('resturant/*'))
                    <div class="mb-4  ">
                        <label class="block mb-2 text-sm font-bold text-gray-700"> أرفق رخصة المطعم </label>
                        <input type="file" name="img" id="" accept="image/*">
                        @error('img')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4  ">
                        <label class="block mb-2 text-sm font-bold text-gray-700"> وصف المطعم </label>
                        <textarea  name="description" placeholder="أدخل وصف المطعم" class="w-full"></textarea>
                        @error('description')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4  ">
                        <label class="block mb-2 text-sm font-bold text-gray-700"> عنوان المطعم </label>
                        <input type="address" name="address" id="" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline  {{ $errors->has('address')?'border-red-500':'' }}" placeholder="أدخل عنوان المطعم">
                        @error('address')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    @endif
                    <div class="mb-4 md:flex md:justify-between">
                        <div class="mb-4  ">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                                رقم الجوال
                            </label>
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border {{ $errors->has('mobile')?'border-red-500':'' }} rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="mobile" type="number" name="mobile" placeholder="أدخل رقم الجوال" />
                            @error('mobile')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        @if(request()->is('resturant/*'))
                            <div class="md:ml-2">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="telephone">
                                    رقم الهاتف
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline  {{ $errors->has('mobile')?'border-red-500':'' }}"
                                    id="telephone" name="telephone" type="number" placeholder="أدخل رقم الهاتف" />
                                @error('telephone')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        @endif

                    </div>
                    <div class="mb-4 md:flex md:justify-between">
                        <div class="mb-4  ">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                                كلمة السر
                            </label>
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border {{ $errors->has('password')?'border-red-500':'' }} rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="password" type="password" name="password" placeholder="أدخل كلمة السر" />
                            @error('password')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="md:ml-2">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="c_password">
                                تأكيد كلمة السر
                            </label>
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="c_password" name="password_confirmation" type="password"
                                placeholder="تأكيد كلمة السر" />
                        </div>
                    </div>
                    <div class="mb-6 text-center">
                        <button
                            class="w-full px-4 py-2 font-bold text-main bg-white rounded-full hover:bg-main hover:text-white border border-main ease-out duration-200 focus:outline-none focus:shadow-outline"
                            type="submit">
                            تسجيل
                        </button>
                    </div>
                    <hr class="mb-6 border-t" />
                    <div class="text-center">
                        @if(Route::has('password.request'))
                            <a class="inline-block text-sm text-gray-500 align-baseline hover:text-gray-900"
                                href="{{ route('password.request') }}">
                                هل نسيت كلمة المرور؟
                            </a>
                        @endif
                    </div>
                    <div class="text-center">
                        <a class="inline-block text-sm text-gray-500 align-baseline hover:text-gray-900"
                            href="{{ route('login') }}">
                            هل لديك حساب بالفعل؟
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
