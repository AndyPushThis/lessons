<div class="card-body">
    <table class="table table-bordered">
        <thead>
        <tr>
            @foreach($names as $name)
                <th>{{ str($name)->upper() }}</th>
            @endforeach
            @isset($edit)
                <th>Edit</th>
            @endisset
        </tr>
        </thead>
        <tbody>
        @foreach($collection as $model)
            <tr>
                @foreach($names as $name)
                <td>{{ $model->{ $name } }}</td>
                @endforeach
                @isset($edit)
                    <td style="width: 20px">
                        <x-admin.buttons.edit :$model />
                    </td>
                @endisset
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
