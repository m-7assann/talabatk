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
                        <th class="border-bottom-0">اسم المطعم</th>
                        <th class="border-bottom-0">اسم الوجبة</th>
                        <th class="border-bottom-0">سعر الوجبة</th>
                        <th class="border-bottom-0">خصم الوجبة</th>
                        <th class="border-bottom-0">قسم الوجبة</th>
                        {{-- <th class="border-bottom-0">وصف الوجبة</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($offers as $offer)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $offer->resturant->name }} </td>
                        <td>{{ $offer->name }} </td>
                        <td>{{ $offer->price }} </td>
                        <td>{{ $offer->discount }} </td>
                        <td>{{ $offer->category->name }} </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $offers->links() }}
    </div>
</div>
