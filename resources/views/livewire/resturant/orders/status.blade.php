@if ($for == 'payment')
    <select id="" class="form-control form-control-sm" wire:model="payment_status" wire:change="change_payment_status">
        <option value="unpaid">غير مدفوع</option>
        <option value="paid">مدفوع</option>
    </select>
@else
    <select id="" class="form-control form-control-sm" wire:model="status" wire:change="change_status">
        <option value="pending">في الإنتظار</option>
        <option value="processing">يتم تحضير الطلب</option>
        <option value="shipped">يتم التوصيل</option>
        <option value="completed">مكتمل</option>
        <option value="cancelled">ملغي</option>
    </select>
@endif
