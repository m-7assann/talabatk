<?php

namespace App\Http\Livewire\Resturant\Meals;

use App\Models\Category;
use App\Models\Meal;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Meals extends Component
{
    public $name, $category_id, $description, $price, $discount, $image, $photo, $count_buy, $edit_mode = false, $create_mode = false, $meal_id, $meal = null, $show_mode = false;
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    protected function rules()
    {
        return [
            'name' => ['required'],
            'price' => ['required', 'numeric'],
            'category_id' => ['required', 'exists:categories,id'],
            'description' => ['nullable'],
            'image' => ['nullable', 'max:1024'],
            'discount' => ['required', 'numeric'],

        ];
    }
    protected $messages = [
        'name.required' => 'يرجى ادخال اسم الوجبة',
        'price.required' => 'يرجى ادخال سعر الوجبة',
        'price.numeric' => 'يجب أن يكون سعر الوجبة رقما',
        'category_id.required' => 'يرجى تحديد القسم الذي تنتمي اليه الوجبة',
        'pic.required_without' => 'يرجى ادخال صورة للوجبة',
        'discount.required' => 'يرجى ادخال خصم للوجبة',
        'discount.numeric' => 'يجب أن يكون خصم الوجبة رقما',

    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function hide_form()
    {
        if ($this->meal_id) {
            $this->edit_mode = !$this->edit_mode;
            $this->meal_id = null;
            $this->reset(['name', 'category_id', 'description', 'price', 'discount', 'image', 'count_buy']);
        } else {
            $this->create_mode = !$this->create_mode;
        }
    }
    public function edit($meal)
    {
        $meal = Meal::findOrFail($meal['id']);
        $this->name = $meal->name;
        $this->category_id = $meal->category_id;
        $this->description = $meal->description;
        $this->price = $meal->price;
        $this->discount = $meal->discount;
        $this->photo = $meal->image;
        $this->count_buy = $meal->count_buy;
        $this->meal_id = $meal->id;
        $this->edit_mode = true;
    }
    public function submit()
    {
        $data = $this->validate();
        $data['resturant_id'] = auth()->id();
        if ($this->meal_id) {
            $meal = Meal::findOrFail($this->meal_id);
            $old_image = $meal->image;
            if ($this->image) {
                $data['image'] = $this->image->storeAs('attachments/meals/', 'meal' . time(), 'public');
            } else {
                $data['image'] = $old_image;
            }
            $meal->update($data);
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'تم تعديل الوجبة بنجاح']);
        } else {
            if ($this->image) {
                $data['image'] = $this->image->storeAs('attachments/meals/', 'meal' . time(), 'public');
            }
            $meal = Meal::create($data);
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'تم إضافة الوجبة بنجاح']);
        }

        $this->edit_mode = false;
        $this->create_mode = false;
        $this->meal_id = null;
        $this->reset(['name', 'category_id', 'description', 'price', 'discount', 'image', 'count_buy']);
    }
    public function delete($meal)
    {
        $meal = Meal::findOrFail($meal['id']);
        $meal->delete();
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'تم حذف الوجبة بنجاح']);
    }

    public function show(Meal $meal)
    {
        $this->show_mode = !$this->show_mode;
        if ($this->show_mode) {
            $this->meal = $meal;
        } else {
            $this->meal = null;
        }
    }

    public function render()
    {
        $cats = Category::all();
        $meals = Meal::with('category')->where('resturant_id', auth()->id())->paginate(10);
        return view('livewire.resturant.meals.meals', compact('meals', 'cats'))->extends('layout.dashboard.resturants.app')->section('content');
    }
}
