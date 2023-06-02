<div class="modal fade" id="delete_agent{{$meal->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف الوجبة {{$meal->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    هل أنت متأكد من حذف الوجبة {{$meal->name}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">لا</button>
                    <button class="btn btn-outline-primary" type="submit" wire:click="delete({{$meal}})" data-dismiss="modal">نعم</button>
                </div>

            </form>
        </div>
    </div>
</div>
