<?php

namespace App\Http\Livewire;

use App\Models\Resturant;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
class Profile extends Component
{
    public $user,$img,$name,$email,$mobile,$telephone,$description,$address,$password,$password_confirmation,$open_at,$close_at;
    use WithFileUploads;
    public function change_photo()
    {
        $this->validate(
            [
                'img' => 'required | mimes:png,jpg'
            ],
            [
                'img.required'=>'يرجى اختيار صورة',
                'img.mimes'=>'يجب أن يكون نوع الصورة png أو jpg'
            ]
        );
        $file=store_file($this->img,'attachments/users');
        if($this->user->getRawOriginal('photo')){
            delete_file($this->user->getRawOriginal('photo'));
        }
        $this->user->photo=$file;
        $this->user->save();
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'تم تعديل الصورة الشخصية بنجاح']);
        return back();
    }

    public function change_data()
    {

        $data=$this->validate(
            [
                'name' => 'required | string |max:255',
                'mobile' => 'required',
                'email'=>['required','string','email','max:255',activeGuard()=="resturant"?Rule::unique(Resturant::class,'email')->ignore($this->user->id):Rule::unique(User::class,'email')->ignore($this->user->id)],
                'telephone' => [activeGuard()=="resturant"?'required':''],
                'address' => [activeGuard()=="resturant"?'required':''],
                'description' => [activeGuard()=="resturant"?'required':''],
                'open_at' => 'nullable',
                'close_at' => 'nullable',
            ],
            [
                'name.required'=>'يرجى ادخال الاسم',
                'email.required'=>'يرجى ادخال البريد الإلكتروني',
                'email.unique'=>'البريد الإلكتروني موجود مسبقا , يرجى ادخال بريد إلكتروني آخر',
                'mobile.required'=>'يرجى ادخال رقم الجوال',
                'telephone.required'=>'يرجى ادخال رقم هاتف المطعم',
                'address.required'=>'يرجى ادخال عنوان المطعم',
                'description.required'=>'يرجى ادخال وصف المطعم',
            ]
        );
 
        $this->user->update($data);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'تم تعديل البيانات الشخصية بنجاح']);
        return back();
    }

    public function change_password()
    {
        $this->validate(
            [
                'password' => 'required | string | confirmed |min:6'
            ],
            [
                'password.required'=>'يرجى ادخال كلمة المرور',
                'password.confirmed'=>'تأكيد كلمة المرور غير متطابق. ',
                'password.min'=>'يجب أن تتكون كلمة المرور من 6 أحرف على الأقل'
            ]
        );
        $this->user->password=Hash::make($this->password);
        $this->user->save();
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'تم تعديل كلمة المرور بنجاح']);
        return back();
    }

    public function delete_account()
    {
        $this->user->delete();
        toastr()->success('تم حذف حسابك بنجاح');
        return redirect()->route('landPage');
    }

    public function mount(){
        $this->user=auth()->guard(activeGuard())->user();
        $this->name=$this->user->name;
        $this->email=$this->user->email;
        $this->description=$this->user->description;
        $this->address=$this->user->address;
        $this->mobile=$this->user->mobile;
        $this->open_at=$this->user->open_at;
        $this->close_at=$this->user->close_at;
        $this->telephone=$this->user->telephone;
    }

    public function render()
    {
        return view('livewire.profile')->extends('layout.users.master')->section('page-main');
    }
}
