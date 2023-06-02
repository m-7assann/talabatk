<div class="w-100 mb-5 mt-5">
    @section('title')
    العروض
    @endsection
    <h4>العروض</h4>
    <div class="row w-100 mx-0 p-3 mb-5 mt-5  bg-white">
            <table class="table table-hover mt-5">
                <thead>
                    <tr>
                        <th class="border-bottom-0">#</th>
                        <th class="border-bottom-0">اسم الوجبة</th>
                        <th class="border-bottom-0">سعر الوجبة</th>
                        <th class="border-bottom-0">خصم الوجبة</th>
                        <th class="border-bottom-0">قسم الوجبة</th>
                        <th class="border-bottom-0">عمليات</th>
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
                        <td>
                            <button class="btn btn-outline-primary" wire:click='cancel_offer({{ $meal->id }})'>إلغاء العرض</button>
 
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $meals->links() }}
    </div>
</div>
