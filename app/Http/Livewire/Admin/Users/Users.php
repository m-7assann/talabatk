<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    public $name, $email,$mobile,$edit_mode = false, $create_mode = false, $user_id,$key;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected function rules(){
        return[
            'name' => ['required','string'],
            'mobile' => 'required|unique:users,mobile,'.$this->user_id,
            'email' => ['email','required','unique:users,email,'.$this->user_id],
        ];
        
    }
        
    protected $messages = [
        'name.required' => 'يرجى ادخال اسم المستخدم',
        'mobile.required' => 'يرجى ادخال رقم جوال المستخدم',
        'mobile.unique' => 'رقم الجوال مستخدم من قبل, يرجى ادخال رقم جوال جديد',
        'email.unique' => 'الايميل مستخدم من قبل, يرجى ادخال ايميل جديد',
        'email.email' => 'يرجى ادخال ايميل صحيح',
        'email.required' => 'يرجى ادخال الايميل',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function hide_form()
    {
        if ($this->user_id) {
            $this->edit_mode = !$this->edit_mode;
            $this->user_id = null;
            $this->reset(['name', 'mobile', 'email']);
        } else {
            $this->create_mode = !$this->create_mode;
        }
    }
    public function edit($id)
    {
        $user=User::findOrFail($id);
        $this->name = $user->name;
        $this->mobile = $user->mobile;
        $this->email = $user->email;
        $this->user_id = $user->id;
        $this->edit_mode = true;
    }
    public function submit()
    {
        $data=$this->validate();
        if ($this->user_id) {
            $user = User::findOrFail($this->user_id);
            $user->update($data);
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'تم تعديل المستخدم بنجاح']);
        } else {
            $data['password']=Hash::make('123456');
            $user=User::create($data);
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'تم إضافة المستخدم بنجاح']);
        }
        $this->edit_mode = false;
        $this->create_mode = false;
        $this->user_id = null;
        $this->reset(['name', 'mobile', 'email']);
    }
    public function delete($id)
    {
        User::destroy($id);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'تم حذف المستخدم بنجاح']);
    }

    public function render()
    {
        $users=User::latest()->paginate(10);
        return view('livewire.admin.users.users',compact('users'))->extends('layout.dashboard.admin.app')->section('content');
    }
}
