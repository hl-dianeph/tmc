<table class="table table-responsive" id="types-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Slug</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($types as $type)
        <tr>
            <td>{!! $type->name !!}</td>
            <td>{!! $type->slug !!}</td>
            <td>
                {!! Form::open(['route' => ['backend.types.destroy', $type->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('backend.types.show', [$type->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('backend.types.edit', [$type->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>