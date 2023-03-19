@extends('layouts.site')

@section('content')

<h1>Модели</h1>
<ul>
    <?php foreach ($autos as $auto): ?>
        <a id = "btnSubmit" data-attr="{{ route('auto.make',['id' => $auto->make]) }}" href= "{{ route('auto.make', ['id' => $auto->make]) }}"><li><?= $auto->make; ?></li></a>
        <!-- <input data-attr="{{ route('auto.make',['id' => $auto->make]) }}" id = "btnSubmit" type="submit" value="Make"/> -->
        <!-- <img src="{{ asset('img/'.$auto->image) }}" alt="" class="img-fluid"> -->
    <?php endforeach; ?>
</ul>
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="mediumBody">
                <div>
                    <!-- the result to be displayed apply here -->
                    
                </div>
            </div>
        </div>
    </div>
</div>



@endsection