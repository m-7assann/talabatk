<form wire:submit.prevent="submit()">
    <button wire:click.prevent="hide_form()" class="btn btn-outline-primary mr-2">عرض المستخدمين</button>
    <div class="row w-100 mx-0 p-3 mb-5 mt-5  bg-white">

        <div class="col-md-12 mb-3">
            @if ($user_id == false)
                <h3 class="mb-3">إضافة مستخدم</h3>
            @else
                <h3 class="mb-3">تعديل مستخدم</h3>
            @endif
        </div>

        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label for="" class="mb-2">اسم المستخدم</label>
                <input type="text" class="form-control" wire:model="name">
            </div>
            @error('name')
                <p class="text-danger" style="font-size: 12px">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label for="" class="mb-2">البريد الإلكتروني</label>
                <input type="text" class="form-control" wire:model="email">
            </div>
            @error('email')
                <p class="text-danger" style="font-size: 12px">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label for="" class="mb-2">جوال المستخدم</label>
                <input type="text" class="form-control" wire:model="mobile">
            </div>
            @error('mobile')
                <p class="text-danger" style="font-size: 12px">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-md-12 mb-3">
            <button class="btn btn-primary">حفظ</button>
        </div>

    </div>
</form>
