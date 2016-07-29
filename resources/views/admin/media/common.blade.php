<div class="container" style="margin-top: 2em;">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb" dir="ltr">
                <li><a href="/demo/Bootstrap-Listr-2"><i class="fa fa-home fa-lg fa-fw"></i> </a></li>
            </ol>
        </div>
    </div>
    <div class="table-responsive">
        <table id="bs-table" class="table table-hover">
            <thead>
            <tr>
                <th class="text-right" data-sort="int">#</th>
                <th class="col-md-6 text-left" data-sort="string">Name</th>
                <th class="col-md-2 text-right" data-sort="int">Size</th>
                <th class="col-md-2 text-right" data-sort="int">Modified</th>
                <th class="col-md-2"> Actions</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <td colspan="4">
                    <small class="pull-left text-muted" dir="ltr">3 folders and 15 files, 17.62 MB in total</small>
                    <a class="pull-right small text-muted" href="https://github.com/idleberg/Bootstrap-Listr" title="Bootstrap Listr on GitHub" target="_blank">Fork me on GitHub</a>
                </td>
            </tr>
            </tfoot>
            <tbody>
            @foreach($list as $key => $l)
                <tr style="background-color: inherit;">
                    <td class="text-muted text-right" data-sort-value="1">{{ ++$key }}</td>
                    <td class="text-left" data-sort-value="checksum"><i class="fa fa-folder "></i>&nbsp;&nbsp;&nbsp;
                        <a href="?path={{ $l['link'] }}">
                            @if ($l['is_dir'] === true)
                                <strong>{{ $l['value'] }}</strong>
                            @else
                                {{ $l['value'] }}
                            @endif
                        </a></td>
                    <td class="text-right" data-sort-value="0">
                        @if ($l['size'] !== 0)
                            {{ \App\Model\DirectoryListing::fileSizeConverter($l['size']) }}
                        @endif
                    </td>
                    <td class="text-right" data-sort-value="1460763836" title="2016-04-15 23:43:56">3 months ago</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: transparent;">
                                <span class="fa fa-ellipsis-v" style="font-size: 1.5em; color: grey;"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <li><a href="{{ route('administrator.media.destroy', ['path' => $l['value']]) }}" data-redirect="{{ route('administrator.media.index') }}" data-method="delete" class="jquery-postback"><span class="fa fa-trash"></span>Trash</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>