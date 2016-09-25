<div class="btn-group">
    <button id="actions_container_{{ $article->id }}" type="button" class="btn btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: transparent;">
        <span class="fa fa-ellipsis-v" style="font-size: 1.5em; color: grey;"></span>
    </button>
    <ul class="dropdown-menu">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{--TODO Fix redirects here, they need to be dynamic--}}
        @if (in_array(url()->getRequest()->path(), config()->get('custom.action_buttons.archive')))
            <li><a href="{{ route('administrator.archive.archive', $article->id) }}" data-redirect="{{ route('administrator.article.index') }}" data-method="delete" class="jquery-postback"><span class="fa fa-archive"></span>Archive</a></li>
        @endif
        @if (in_array(url()->getRequest()->path(), config()->get('custom.action_buttons.trash')))
            <li><a href="{{ route('administrator.article.destroy', $article->id) }}" data-redirect="{{ route('administrator.trash.index') }}" data-method="delete" class="jquery-postback"><span id="trash_{{ $article->id }}" class="fa fa-trash"></span>Trash</a></li>
        @endif
        @if (in_array(url()->getRequest()->path(), config()->get('custom.action_buttons.restore')))
            <li><a href="{{ route('administrator.archive.restore', $article->id) }}" data-redirect="{{ route('administrator.archive.index') }}" class="jquery-postback"><span class="fa fa-recycle"></span>Restore</a></li>
        @endif
        @if (in_array(url()->getRequest()->path(), config()->get('custom.action_buttons.wipe')))
            <li><a href="{{ route('administrator.trash.wipe', $article->id) }}" data-redirect="{{ route('administrator.trash.index') }}" data-method="delete" class="jquery-postback"><span class="fa fa-trash"></span>Completely delete</a></li>
        @endif
    </ul>
</div>