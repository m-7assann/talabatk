<form wire:submit.prevent="submit()">
    <button wire:click.prevent="hide_form()" type="button" class="btn btn-primary mr-2">عرض الوجبات</button>

    <div class="row w-100 mx-0 p-3 mb-5 mt-5  bg-white">

        <div class="col-md-12 mb-3">
            @if ($meal_id == false)
                <h3 class="mb-3">إضافة وجبة</h3>
            @else
                <h3 class="mb-3">تعديل وجبة</h3>
            @endif
        </div>

        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label for="" class="mb-2">اسم الوجبة</label>
                <input type="text" wire:model="name" class="form-control">
            </div>
            @error('name')
                <p class="text-danger" style="font-size: 12px">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label for="" class="mb-2">الصنف</label>
                <select wire:model="category_id" id="" class="form-control">
                    <option value="">اختر الصنف</option>
                    @foreach ($cats as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('category_id')
                <p class="text-danger" style="font-size: 12px">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label for="" class="mb-2">السعر</label>
                <input type="number" class="form-control" wire:model="price">
            </div>
            @error('price')
                <p class="text-danger" style="font-size: 12px">{{ $message }}</p>
            @enderror
        </div>
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label for="" class="mb-2">الخصم</label>
                <input type="number" class="form-control" wire:model="discount">
            </div>
            @error('discount')
                <p class="text-danger" style="font-size: 12px">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label for="" class="mb-2">صورة الوجبة </label>
                <input type="file" class="form-control" wire:model="image">
                @if ($image)
                    <img style="width:90px;height:90px" src="{{ $image->temporaryUrl() }}" width="100">
                @else
                    <img style="width:90px;height:90px" src="{{ asset('storage/' . $photo) }}" width="100">
                @endif
            </div>
            @error('image')
                <p class="text-danger" style="font-size: 12px">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="" class="mb-2">وصف الوجبة</label>
                <textarea class="form-control" wire:model="description"></textarea>
            </div>
            @error('description')
                <p class="text-danger" style="font-size: 12px">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-12 mb-3">
            <button class="btn btn-primary">حفظ</button>
        </div>

    </div>
</form>
