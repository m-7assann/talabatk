<div class="w-100 mb-5 mt-5">
    @section('title')
    المستخدمين
    @endsection
    <h4>المستخدمين</h4>
    <div class="row w-100 mx-0 p-3 mb-5 mt-5  bg-white">
        @if ($create_mode == false && $edit_mode == false)
            <button wire:click="hide_form()" class="btn btn-outline-primary mr-2">إضافة مستخدم جديد</button>
            <table class="table table-hover mt-5">
                <thead>
                    <tr>
                        <th class="border-bottom-0">#</th>
                        <th class="border-bottom-0">الاسم</th>
                        <th class="border-bottom-0">الايميل</th>
                        <th class="border-bottom-0">الجوال</th>
                        <th class="border-bottom-0">الصورة</th>
                        <th class="border-bottom-0">العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }} </td>
                            <td>{{ $user->mobile }} </td>
                            <td>
                                <img src="{{ asset($user->photo) }}" alt="" class="mb-2" style="width:60px">
                            </td>
                            <td>
                                <button class="btn btn-outline-info btn-sm" wire:click="edit({{ $user->id }})"><i
                                    class="fas fa-edit"></i></button>
                                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                    data-target="#delete_agent{{ $user->id }}"><i></i>
                                    <i class="fas fa-trash-alt"></i></button>
                                @include('livewire.admin.users.delete')
                            </td>
                        </tr>
                    @empty
                        <td colspan="4">لا يوجد بيانات لعرضها</td>
                    @endforelse
                </tbody>
            </table>
            {{ $users->links() }}
        @else
            @include('livewire.admin.users.create')
        @endif
    </div>
</div>
