<div class="w-100 mb-5 mt-5">
    @section('title')
    التقارير
    @endsection
    <h4>التقارير</h4>
    <div class="row w-100 mx-0 p-3 mb-5 mt-5  bg-white">
        <div class="filter row p-2">
            <div class="form-groub">
                <label for="">من</label>
                <input type="date" wire:model="from" class="form-control">
            </div>
            <div class="form-groub mx-3">
                <label for="">الى</label>
                <input type="date" wire:model="to" class="form-control" id="">
            </div>
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
                        {{ __($item->status) }}
                    </td>
                    <td class="">
                        {{ __($item->payment_status) }}
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