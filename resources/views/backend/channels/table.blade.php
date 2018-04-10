<table class="table table-responsive" id="channels-table">
    <thead>
        <tr>
            <th>Title</th>
        <th>Name</th>
        <th>Type Id</th>
        <th>Category Id</th>
        <th>Avatar</th>
        <th>Description</th>
        <th>Keywords</th>
        <th>Og Description</th>
        <th>Status</th>
        <th>Published At</th>
        <th>Members Count</th>
        <th>Telegram Id</th>
        <th>Telegram Type</th>
        <th>Author Id</th>
        <th>Moder Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($channels as $channel)
        <tr>
            <td>{!! $channel->title !!}</td>
            <td>{!! $channel->name !!}</td>
            <td>{!! $channel->type_id !!}</td>
            <td>{!! $channel->category_id !!}</td>
            <td>{!! $channel->avatar !!}</td>
            <td>{!! $channel->description !!}</td>
            <td>{!! $channel->keywords !!}</td>
            <td>{!! $channel->og_description !!}</td>
            <td>{!! $channel->status !!}</td>
            <td>{!! $channel->published_at !!}</td>
            <td>{!! $channel->members_count !!}</td>
            <td>{!! $channel->telegram_id !!}</td>
            <td>{!! $channel->telegram_type !!}</td>
            <td>{!! $channel->author_id !!}</td>
            <td>{!! $channel->moder_id !!}</td>
            <td>
                {!! Form::open(['route' => ['backend.channels.destroy', $channel->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('backend.channels.show', [$channel->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('backend.channels.edit', [$channel->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>