@extends('layouts.site')

@section('content')

<div class="row">
    <div class="col-sm-4">
        <h3 class="mb-4">Выберите модель</h3>
        <form action="{{ route('auto.filter') }}" method="POST" >
            @csrf

            <ul>
            <?php foreach ($autos as $auto): ?>
                    <li><input type="checkbox" value=<?= $auto->make; ?> name="camera_video[]"><?= $auto->make; ?></li></a>
                <?php endforeach; ?>
            </ul>
            <h3 class="mb-4">Выберите даты</h3>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker'>
                <input placeholder="начальная дата" type='text' name="from" class="form-control" />
                <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
                </span>
                </div>
                <div class='input-group date' id='datetimepicker1'>
                <input placeholder="конечная дата" type='text' name="to" class="form-control" />
                <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
                </span>
                </div>
            </div>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>          
        </form>
    </div>
    @if ($auto_dates !== 0)
    <div class="col-sm-4">
        <h3 class="mb-4">Карточки АМ с числом голосов за каждую карточку</h3>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Модель</th>
                <th scope="col">Марка</th>
                <th scope="col">Год</th>
                <th scope="col">Голосов</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($auto_dates as $auto): ?>
                    <tr>
                        <td><?= $auto->make; ?></td>
                        <td><?= $auto->model; ?></td>
                        <td><?= $auto->year; ?></td>
                        <td><?= $auto->count; ?></td>
                    </tr>
                    <!-- model: <?= $auto->make; ?>;год <?= $auto->year; ?>; голосов ( <?= $auto->count; ?> ) -->
                <?php endforeach; ?>
                
                
            </tbody>
        </table>

    </div>

    @endif
    @if ($autos_group_model !== 0)
    <div class="col-sm-4">
        <h3 class="mb-4">Сумма голосов по выбранным маркам</h3>
        <ul>
        <?php foreach ($autos_group_model as $auto): ?>
            <li>Модель: <?= $auto->make; ?>, марка: <?= $auto->model; ?>, Голосов: (<?= $auto->total_field_name; ?>)</li></a>
        <?php endforeach; ?>
        </ul>
    </div>
    @endif
</div>



@endsection