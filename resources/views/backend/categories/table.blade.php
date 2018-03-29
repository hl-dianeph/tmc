<table class="table table-responsive" id="categories-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Short Desc</th>
            <th>Full Desc</th>
            <th>Image</th>
            <th>Keywords</th>
            <th>Og:description</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>{!! $category->name !!}</td>
            <td>{!! $category->short_desc !!}</td>
            <td>{!! $category->full_desc !!}</td>
            <td>{!! $category->image !!}</td>
            <td>{!! $category->keywords !!}</td>
            <td>{!! $category->og_description !!}</td>
            <td>
                {!! Form::open(['route' => ['backend.categories.destroy', $category->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('backend.categories.show', [$category->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('backend.categories.edit', [$category->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>