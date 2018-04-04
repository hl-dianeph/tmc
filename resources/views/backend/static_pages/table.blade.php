<table class="table table-responsive" id="staticPages-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Slug</th>
        <th>Content</th>
        <th>Keywords</th>
        <th>Og Description</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($staticPages as $staticPage)
        <tr>
            <td>{!! $staticPage->name !!}</td>
            <td>{!! $staticPage->slug !!}</td>
            <td>{!! $staticPage->content !!}</td>
            <td>{!! $staticPage->keywords !!}</td>
            <td>{!! $staticPage->og_description !!}</td>
            <td>
                {!! Form::open(['route' => ['backend.staticPages.destroy', $staticPage->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('backend.staticPages.show', [$staticPage->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('backend.staticPages.edit', [$staticPage->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>