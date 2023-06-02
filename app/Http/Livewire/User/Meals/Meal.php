<?php

namespace App\Http\Livewire\User\Meals;

use App\Models\Meal as ModelsMeal;
use App\Models\Review;
use Livewire\Component;
use Livewire\WithPagination;

class Meal extends Component
{
    public $meal, $value, $review, $updateMode = false, $review_id, $user_id;
    use WithPagination;

    protected $rules = [
        'review' => ['required', 'string', 'min:3'],
        'value' => ['required', 'numeric'],
    ];
    protected $messages = [
        'review.required' => 'يرجى إدحال نص المراجعة',
        'review.min' => 'يجب أن تتكون المراجعة من 3 حروف على الأقل',
        'value.required' => 'يرجى تقييم الوجبة'
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function edit(Review $review)
    {
        $this->value = $review->value;
        $this->review = $review->review;
        $this->review_id = $review->id;
        $this->updateMode = true;
    }

    public function delete(Review $review)
    {
        $review->delete();
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'تم حذف المراجعة بنجاح']);
    }

    public function submit()
    {
        $this->validate();
        if ($this->review_id) {
            $review = Review::findOrFail($this->review_id);
            $review->update([
                'value' => $this->value,
                'review' => $this->review
            ]);
            $this->updateMode = false;
            $this->review_id = null;
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'تم تعديل المراجعة بنجاح']);
        } else {

            Review::create([
                'meal_id' => $this->meal->id,
                'user_id' => $this->user_id,
                'resturant_id' => $this->meal->resturant_id,
                'value' => $this->value,
                'review' => $this->review
            ]);
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'تم إضافة المراجعة بنجاح']);
        }
        $this->reset(['value', 'review']);

    }
    public function mount(ModelsMeal $meal)
    {
        $this->meal = $meal->load('resturant');
        $this->user_id = auth()->id();
    }
    public function render()
    {
        $reviews = Review::with('user')->where('meal_id', $this->meal->id)->latest()->simplePaginate(5);
        return view('livewire.user.meals.meal', compact('reviews'))->extends('layout.users.master')->section('page-main');
    }
}
