<div class="w-100 mb-5 mt-5">
    @section('title')
    لوحة التحكم
    @endsection
    <h4>لوحة التحكم</h4>
    <div class="row row-gap-24 w-100 mt-3 mx-0 px-0">
        <div class="col-sm-6 col-xl-3">
            <div class="box-info green">
                <div class="d-flex px-2 py-3  align-items-center justify-content-between">
                    <i class="bg-i fas fa-chart-pie"></i>
                    <div class="text">
                        <div class="num ">{{ App\Models\Meal::where('resturant_id',auth()->id())->count() }}</div>
                        <div class="name">عدد الوجبات</div>
                    </div>
                </div>
                <a href="{{ route('resturant.meals') }}" class="link">
                    <i class="fas fa-arrow-alt-circle-right"></i>
                    المزيد
                </a>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="box-info yellow">
                <div class="d-flex px-2 py-3  align-items-center justify-content-between">
                    <i class="bg-i fas fa-file-contract"></i>
                    <div class="text">
                        <div class="num ">{{ App\Models\Order::where('resturant_id',auth()->id())->count() }}</div>
                        <div class="name"> كل الطلبات</div>
                    </div>
                </div>
                <a href="{{ route('resturant.orders') }}" class="link">
                    <i class="fas fa-arrow-alt-circle-right"></i>
                    المزيد
                </a>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="box-info blue">
                <div class="d-flex px-2 py-3  align-items-center justify-content-between">
                    <i class=" bg-i fas fa-money-check-alt"></i>
                    <div class="text">
                        <div class="num ">{{ App\Models\Order::where('resturant_id',auth()->id())->where('status','pending')->count() }}</div>
                        <div class="name"> الطلبات الجديدة </div>
                    </div>
                </div>
                <a href="{{ route('resturant.orders',['status'=>'pending']) }}" class="link">
                    <i class="fas fa-arrow-alt-circle-right"></i>
                    المزيد
                </a>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="box-info red">
                <div class="d-flex px-2 py-3  align-items-center justify-content-between">
                    <i class="bg-i fas fa-clock"></i>
                    <div class="text">
                        <div class="num ">{{ App\Models\Order::where('resturant_id',auth()->id())->where('status','completed')->count() }}</div>
                        <div class="name"> الطلبات المكتملة </div>
                    </div>
                </div>
                <a href="{{ route('resturant.orders',['status'=>'completed']) }}" class="link">
                    <i class="fas fa-arrow-alt-circle-right"></i>
                    المزيد
                </a>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h3>آخر الطلبات</h3>
        <div class="row w-100 mx-0 p-3 mb-5 mt-2  bg-white">
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
    </div>
</div>