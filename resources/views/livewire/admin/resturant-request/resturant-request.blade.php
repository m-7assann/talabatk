<div class="w-100 mb-5 mt-5">
    @section('title')
    طلبات تسجيل المطاعم
    @endsection
    <h4>طلبات تسجيل المطاعم</h4>
    <div class="row w-100 mx-0 p-3 mb-5 mt-5  bg-white">

            <table class="table table-hover mt-5">
                <thead>
                    <tr>
                        <th class="border-bottom-0">#</th>
                        <th class="border-bottom-0">اسم المطعم</th>
                        <th class="border-bottom-0">صورة الترخيص</th>
                        <th class="border-bottom-0">تأكيد الطلب</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($requests as $request)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $request->name }} </td>
                            <td><a target="_blank" href="{{asset('storage/'.$request->confirm)}}"><img src="{{asset('storage/'.$request->confirm)}}" alt="" width="100"></a></td>
                            <td>
                                <button class="btn btn-outline-primary btn-sm" wire:click="confirm({{$request->id}})">تأكيد</button>
                            </td>
                        </tr>
                    @empty
                        <td colspan="4">لا يوجد بيانات لعرضها</td>
                    @endforelse
                </tbody>
            </table>
            {{ $requests->links() }}
            
    </div>
</div>
