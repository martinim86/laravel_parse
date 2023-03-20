<?php foreach ($autos as $auto): ?>
    <div class="col-sm-4">
    <div class="card-body">
        <a data-attr="{{ route('auto.make',['id' => $auto->make, 'id2' => $auto->id]) }}" id = "NewWindowSubmit"
        ><img width="100" height="100"  src="{{ asset('img/'.$auto->image) }}" alt="" class="img-fluid"></a>
        <p class="mt-3 mb-0"><?= $auto->make; ?><?= $auto->model; ?></p>
    </div>
    </div>
         
            
<?php endforeach; ?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>Закрыть
        </button>
    </div>