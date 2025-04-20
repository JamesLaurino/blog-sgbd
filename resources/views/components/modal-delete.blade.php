@props(["articleId"])

<!-- Modal delete -->
<div class="modal fade" id="delete-{{ $articleId }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppression</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Est-ce que vous certain de vouloir supprimer l'article ?
            </div>
            <form method="POST" action="{{ route('admin.destroy', $articleId) }}">
                @csrf
                @method("DELETE")
                <div class="modal-footer">
                    <button type="button" id="btnClose" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
