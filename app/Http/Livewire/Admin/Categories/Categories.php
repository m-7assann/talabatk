<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
{
    public $name,$edit_mode = false, $create_mode = false, $cat_id,$cat, $show_mode = false;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected function rules()
    {
        return [
            'name' => ['required'],
        ];
    }
    protected $messages = [
        'name.required' => 'يرجى ادخال اسم القسم',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function edit(Category $category)
    {
        $this->name = $category->name;
        $this->cat_id = $category->id;
        $this->edit_mode = true;
    }
    public function submit()
    {
        $data = $this->validate();
        
        if ($this->cat_id) {
            $cat = Category::findOrFail($this->cat_id);
            $cat->update($data);
            $this->edit_mode = false;
            $this->cat_id = null;
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'تم تعديل القسم بنجاح']);
        } else {
            Category::create($data);
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'تم إضافة القسم بنجاح']);
        }
        $this->reset(['name']);

    }
    public function delete(Category $category)
    {
        $category->delete();
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'تم حذف القسم بنجاح']);
    }
    public function render()
    {
        $cats=Category::paginate(10);
        return view('livewire.admin.categories.categories',compact('cats'))->extends('layout.dashboard.admin.app')->section('content');
    }
}
