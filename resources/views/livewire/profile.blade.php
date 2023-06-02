<div class="my-20 mx-60">
    {{-- ------------------------------------- تعديل الصورة الشخصية --------------------------------------- --}}
    <div class="grid grid-cols-4 items-center ">
        <p class="col-span-1 text-center w-full ml-5 text-xl font-bold tracking-tight text-gray-900">تعد يل
            الصورة الشخصية</p>
        <div class="w-full col-span-3 p-6 bg-white rounded-lg border border-gray-200 shadow-md ">
                <div class="flex justify-between items-center flex-col">
                    @if ($img)
                        <img class="w-40 h-40 rounded-full mb-10  shadow-md" src="{{ $img->temporaryUrl() }}">
                        @else
                        <img class="w-40 h-40 rounded-full mb-10  shadow-md" src="{{ asset($user->photo) }}">
                    @endif
                    <input
                        class="block mx-auto text-sm text-gray-900 bg-gray-50 rounded-lg  border-gray-300 cursor-pointer  focus:outline-none focus:border-transparent px-5"
                        type="file" id="input_img" wire:model="img" required>
                    @error('img')
                        <p class="text-xs italic text-red-500 mt-5">{{ $message }}</p>
                    @enderror
                    <button
                        class="text-main border border-main bg-white hover:bg-main hover:text-white transition font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center mt-10" wire:click='change_photo'>حفظ</button>
                </div>
        </div>
    </div>
    <hr class="my-20">
    {{-- ------------------------------------- تعديل البيانات الشخصية --------------------------------------- --}}
    <div class="grid grid-cols-4 items-center">
        <p class="col-span-1  text-center w-full ml-5 text-xl font-bold tracking-tight text-gray-900">تعد يل
            البيانات الشخصية</p>
        <div class="w-full col-span-3 p-6 bg-white rounded-lg border border-gray-200 shadow-md ">
                <div class="relative z-0 mb-6 w-full group">
                    <input type="text" wire:model.defer="name"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-main peer"
                        placeholder=" " required />
                    <label for="name"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-main peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">الاسم</label>
                    @error('name')
                        <p class="text-xs italic text-red-500 mt-5">{{ $message }}</p>
                    @enderror
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="email" wire:model.defer="email" id="email"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-main peer"
                        placeholder=" " required />
                    <label for="email"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-main peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">البريد
                        الإلكتروني</label>
                    @error('email')
                        <p class="text-xs italic text-red-500 mt-5">{{ $message }}</p>
                    @enderror
                </div>

                <div class="relative z-0 mb-6 w-full group">
                    <input type="mobile" wire:model.defer="mobile" id="mobile"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-main peer"
                        placeholder=" " required  />
                    <label for="mobile"
                        class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-main peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">رقم
                        الجوال</label>
                    @error('mobile')
                        <p class="text-xs italic text-red-500 mt-5">{{ $message }}</p>
                    @enderror
                </div>
                @auth('resturant')
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="telephone" wire:model.defer="telephone" id="telephone"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-main peer"
                            placeholder=" " required />
                        <label for="telephone"
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-main peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">رقم
                            الهاتف</label>
                        @error('telephone')
                            <p class="text-xs italic text-red-500 mt-5">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="address" wire:model.defer="address" id="address"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-main peer"
                            placeholder=" " required />
                        <label for="address"
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-main peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">عنوان
                            المطعم</label>
                            @error('address')
                            <p class="text-xs italic text-red-500 mt-5">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <textarea type="description" wire:model.defer="description" id="description"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-main peer"
                            placeholder=" " required>{{ $user->description }}</textarea>
                        <label for="description"
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-main peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">وصف
                            المطعم</label>
                            @error('description')
                            <p class="text-xs italic text-red-500 mt-5">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="time" wire:model.defer="open_at" id="description"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-main peer"
                            placeholder=" " required >
                        <label for="description"
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-main peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">يفتح في</label>
                            @error('open_at')
                            <p class="text-xs italic text-red-500 mt-5">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="time" wire:model.defer="close_at" id="description"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-main peer"
                            placeholder=" " required >
                        <label for="description"
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-main peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">يغلق في</label>
                            @error('close_at')
                            <p class="text-xs italic text-red-500 mt-5">{{ $message }}</p>
                        @enderror
                    </div>
                @endauth
                <button 
                    class="text-main border border-main bg-white hover:bg-main hover:text-white transition font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center " wire:click="change_data">حفظ</button>
        </div>
    </div>
    <hr class="my-20">
    {{-- ------------------------------------- تعديل كلمة المرور --------------------------------------- --}}
    <div class="grid grid-cols-4 items-center">
        <p class="col-span-1  text-center w-full ml-5 text-xl font-bold tracking-tight text-gray-900">تغيير كلمة السر
        </p>
        <div class="w-full col-span-3 p-6 bg-white rounded-lg border border-gray-200 shadow-md ">
                <div class="relative z-0 mb-6 w-full group">
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="password" wire:model.defer="password" id="password"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-main peer"
                            placeholder=" " required />
                        <label for="password"
                            class="absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-main peer-focus: peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">كلمة المرور</label>
                            @error('password')
                            <p class="text-xs italic text-red-500 mt-5">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="relative z-0 mb-6 w-full group">
                        <input type="password" wire:model.defer="password_confirmation" id="password_confirmation"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-main peer"
                            placeholder=" " required />
                        <label for="password_confirmation"
                            class="absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:right-0 peer-focus:text-main  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">تأكيد كلمة المرور</label>
                            @error('password_confirmation')
                            <p class="text-xs italic text-red-500 mt-5">{{ $message }}</p>
                        @enderror
                    </div>

                    <button 
                        class="text-main border border-main bg-white hover:bg-main hover:text-white transition font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center " wire:click="change_password">حفظ</button>
                </div>
        </div>
    </div>

    <hr class="my-20">

    {{-- ------------------------------------- حذف الحساب --------------------------------------- --}}
    <div class="grid grid-cols-4 items-center">
        <p class="col-span-1  text-center w-full ml-5 text-xl font-bold tracking-tight text-gray-900">حذف الحساب</p>
        <div class="w-full col-span-3 p-6 bg-white rounded-lg border border-gray-200 shadow-md ">
                <div class="relative z-0 mb-6 w-full group">
                    <p>هل أنت متأكد من حذف الحساب؟</p>
                    <button 
                        class="text-red-500 border border-red-500 bg-white hover:bg-red-500 hover:text-white transition font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center mt-7" wire:click='delete_account'>تأكيد</button>
                </div>
        </div>
    </div>

</div>
