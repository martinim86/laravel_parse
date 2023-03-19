<?php foreach ($autos as $auto): ?>
    
    <div class="card-body">
        <a data-attr="{{ route('auto.make',['id' => $auto->make, 'id2' => $auto->id]) }}" id = "NewWindowSubmit"
        ><img src="{{ asset('img/'.$auto->image) }}" alt="" class="img-fluid"></a>
        <p class="mt-3 mb-0"><?= $auto->make; ?><?= $auto->model; ?></p>
    </div>
            <!-- <a href= "{{ route('auto.make', ['id' => $auto->make]) }}"><li><?= $auto->make; ?></li></a> -->
            
            
    <?php endforeach; ?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>Закрыть
        </button>
    </div>