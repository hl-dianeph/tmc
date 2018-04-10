

<li class="{{ Request::is('types*') ? 'active' : '' }}">
    <a href="{!! route('backend.types.index') !!}"><i class="fa fa-edit"></i><span>Types</span></a>
</li>

<li class="{{ Request::is('channels*') ? 'active' : '' }}">
    <a href="{!! route('backend.channels.index') !!}"><i class="fa fa-edit"></i><span>Channels</span></a>
</li>

