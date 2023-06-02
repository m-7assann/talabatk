<div class="w-100 mb-5 mt-5">
    @section('title')
    الأقسام
    @endsection
    <h4>الأقسام</h4>
    <div class="row w-100 mx-0 p-3 mb-5 mt-5  bg-white">

        <div class="d-flex">
            <input type="text" wire:model="name" placeholder="أضف قسم جديد" class="form-control">
            <button wire:click="submit" class="btn btn-outline-primary mr-2">حفظ</button>
        </div>
            @error('name')
            <p class="text-danger" style="font-size: 12px">{{ $message }}</p>
            @enderror

            <table class="table table-hover mt-5">
                <thead>
                    <tr>
                        <th class="border-bottom-0">#</th>
                        <th class="border-bottom-0">اسم القسم</th>
                        <th class="border-bottom-0">العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cats as $cat)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $cat->name }} </td>
                            <td>
                                <button class="btn btn-sm btn-outline-info" wire:click="edit({{$cat}})"><i
                                        class="fas fa-edit"></i> 
                                </button>
                                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                data-target="#delete_agent{{ $cat->id }}"><i></i>
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            @include('livewire.admin.categories.delete')
                            </td>
                        </tr>
                    @empty
                        <td colspan="4">لا يوجد بيانات لعرضها</td>
                    @endforelse
                </tbody>
            </table>
            {{ $cats->links() }}
            
    </div>
</div>
