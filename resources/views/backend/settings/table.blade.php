<table class="table table-responsive" id="siteConfigs-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Type</th>
        <th>Value</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($siteConfigs as $siteConfig)
        <tr>
            <td>{!! $siteConfig->name !!}</td>
            <td>{!! $siteConfig->type !!}</td>
            <td>{!! $siteConfig->value !!}</td>
            <td>
                {!! Form::open(['route' => ['backend.siteConfigs.destroy', $siteConfig->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('backend.siteConfigs.show', [$siteConfig->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('backend.siteConfigs.edit', [$siteConfig->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>