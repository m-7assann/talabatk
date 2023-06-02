<div class="modal fade" id="delete_agent{{$cat->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف القسم {{$cat->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    هل أنت متأكد من حذف القسم {{$cat->name}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">لا</button>
                    <button class="btn btn-outline-primary" type="submit" wire:click="delete({{$cat}})" data-dismiss="modal">نعم</button>
                </div>

            </form>
        </div>
    </div>
</div>
