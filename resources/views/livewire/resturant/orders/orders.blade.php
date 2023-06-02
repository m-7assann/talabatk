<div class="w-100 mb-5 mt-5" wire:poll>
    @section('title')
    الطلبات
    @endsection
    <h4>الطلبات</h4>
    <div class="row w-100 mx-0 p-3 mb-5 mt-5  bg-white">

        <div class="mr-4">
            <button class="btn {{is_null($filter_status)?'btn-primary':'btn-outline-primary'}}" wire:click="filter_by_status">كل الطلبات</button>
            <button class="btn {{$filter_status=='pending'?'btn-warning':'btn-outline-warning'}}" wire:click="filter_by_status('pending')">بالانتظار</button>
            <button class="btn {{$filter_status=='processing'?'btn-info':'btn-outline-info'}}" wire:click="filter_by_status('processing')">يتم تحضير الطلب</button>
            <button class="btn  {{$filter_status=='shipped'?'btn-dark':'btn-outline-dark'}}" wire:click="filter_by_status('shipped')">يتم التوصيل</button>
            <button class="btn {{$filter_status=='completed'?'btn-success':'btn-outline-success'}}" wire:click="filter_by_status('completed')">مكتمل</button>
        </div>

        <table class="table table-hover mt-5">
            <thead>
                <tr>
                    <th class="border-bottom-0">#</th>
                    <th class="border-bottom-0">اسم الزبون</th>
                    <th class="border-bottom-0">عنوان الزبون</th>
                    <th class="border-bottom-0">اسم الوجبة</th>
                    <th class="border-bottom-0">الكمية</th>
                    <th class="border-bottom-0">السعر الإجمالي</th>
                    <th class="border-bottom-0">حالة الطلب</th>
                    <th class="border-bottom-0">حالة الدفع</th>
                    <th class="border-bottom-0">تاريخ الطلب</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <tr>
                        <td style="">{{ $loop->index + 1 }}</td>
                        <td>{{ $item->user?->name }} </td>
                        <td>{{ $item->address }} </td>
                        <td>{{ $item->meal?->name }} </td>
                        <td>{{ $item->quantity }} </td>
                        <td>{{ $item->total }} شيكل</td>
                        <td class="">
                            @livewire('resturant.orders.status', ['item' => $item,'for'=>'status'],
                            key($item->id))
                        </td>
                        <td class="">
                            @livewire('resturant.orders.status', ['item' => $item,'for'=>'payment'],
                            key(time().$item->id))
                        </td>
                        <td>{{ $item->created_at->format('Y-m-d') }} </td>
 
                    </tr>
                @empty
                    <td colspan="6">لا يوجد بيانات لعرضها</td>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $items->links() }}

</div>
