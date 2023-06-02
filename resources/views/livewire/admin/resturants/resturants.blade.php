<div class="w-100 mb-5 mt-5">
    @section('title')
    المطاعم
    @endsection
    <h4>المطاعم</h4>
    <div class="row w-100 mx-0 p-3 mb-5 mt-5  bg-white">
        <div class="">
            <button class="btn {{ is_null($confirm) ? 'btn-primary' : 'btn-outline-primary' }}"
                wire:click="filter_by_confirm">جميع المطاعم <span>{{ App\Models\Resturant::count() }}</span></button>
            <button class="btn {{ $confirm == 1 ? 'btn-success' : 'btn-outline-success' }}"
                wire:click="filter_by_confirm(true)">المطاعم المرخصة
                <span>{{ App\Models\Resturant::where('is_confirm', true)->count() }}</span></button>
            <button class="btn {{ $confirm == '0' ? 'btn-danger' : 'btn-outline-danger' }}"
                wire:click="filter_by_confirm(false)">المطاعم الغير مرخصة
                <span>{{ App\Models\Resturant::where('is_confirm', false)->count() }}</span></button>
        </div>
        <table class="table table-hover mt-5">
            <thead>
                <tr>
                    <th class="border-bottom-0">#</th>
                    <th class="border-bottom-0">الاسم</th>
                    <th class="border-bottom-0">الايميل</th>
                    <th class="border-bottom-0">الجوال</th>
                    <th class="border-bottom-0">التلفون</th>
                    <th class="border-bottom-0">العنوان</th>
                    <th class="border-bottom-0">الصورة</th>
                    <th class="border-bottom-0">الحالة</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($resturants as $resturant)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td><a target="_blank" href="{{route('users.show.resturant',$resturant)}}">{{ $resturant->name }} </a></td>
                        <td>{{ $resturant->email }} </td>
                        <td>{{ $resturant->mobile }} </td>
                        <td>{{ $resturant->telephone }} </td>
                        <td>{{ $resturant->address }} </td>
                        <td>
                            <img src="{{ asset($resturant->photo) }}" class="mb-2" alt="" width="40">
                        </td>
                        <td>
                            @if ($resturant->is_confirm)
                                <span class="badge badge-success" style="font-size: 12px">مرخص</span>
                            @else
                                <span class="badge badge-danger" style="font-size: 12px">غير مرخص</span>
                            @endif

                        </td>
                    </tr>
                @empty
                    <td colspan="4">لا يوجد بيانات لعرضها</td>
                @endforelse
            </tbody>
        </table>
        {{ $resturants->links() }}

    </div>
</div>
