<div class="w-100 mb-5 mt-5">
    @section('title')
    الوجبات
    @endsection
    <h4>الوجبات</h4>
    <div class="row w-100 mx-0 p-3 mb-5 mt-5  bg-white">
        @if ($create_mode == false && $edit_mode == false && $show_mode == false)
            <button wire:click="hide_form()" class="btn btn-outline-primary mr-2">إضافة وجبة جديدة</button>
            <table class="table table-hover mt-5">
                <thead>
                    <tr>
                        <th class="border-bottom-0">#</th>
                        <th class="border-bottom-0">اسم الوجبة</th>
                        <th class="border-bottom-0">سعر الوجبة</th>
                        <th class="border-bottom-0">خصم الوجبة</th>
                        <th class="border-bottom-0">قسم الوجبة</th>
                        {{-- <th class="border-bottom-0">وصف الوجبة</th> --}}
                        <th class="border-bottom-0">العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($meals as $meal)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $meal->name }} </td>
                        <td>{{ $meal->price }} </td>
                        <td>{{ $meal->discount }} </td>
                        <td>{{ $meal->category->name }} </td>
                        {{-- <td>{{ $meal->description }}</td> --}}
                        <td>
                            {{-- <button class="btn btn-outline-primary btn-sm" wire:click="show({{ $meal->id }})"><i
                                    class="fas fa-eye"></i></button> --}}
                            <button class="btn btn-outline-info btn-sm" wire:click="edit({{ $meal }})"><i
                                    class="fas fa-edit"></i></button>
                            <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                data-target="#delete_agent{{ $meal->id }}"><i></i>
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            @include('livewire.resturant.meals.delete')
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $meals->links() }}
        {{-- @elseif($show_mode == true)
            @include('livewire.resturant.meals.show') --}}
        @else
            @include('livewire.resturant.meals.create')
        @endif
    </div>
</div>
