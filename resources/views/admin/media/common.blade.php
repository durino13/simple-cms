<div class="container" style="margin-top: 2em;">
    <div class="row">
        <div class="col-md-8">
            <ol class="breadcrumb" dir="ltr">
                <li><a href="/demo/Bootstrap-Listr-2"><i class="fa fa-home fa-lg fa-fw"></i> </a></li>
            </ol>
        </div>
        <div class="col-md-4">
            <div class="form-group has-feedback">
                <label class="control-label sr-only" for="search">Search</label>
                <input type="text" class="form-control" id="search" placeholder="Search">
                <i class="fa fa-search form-control-feedback"></i>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table id="bs-table" class="table table-hover">
            <thead>
            <tr>
                <th class="text-right" data-sort="int">#</th>
                <th class="col-sm-8 text-left" data-sort="string">Name</th>
                <th class="col-sm-2 text-right" data-sort="int">Size</th>
                <th class="col-sm-2 text-right" data-sort="int">Modified</th>
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
            @foreach($list as $l)
                <tr style="background-color: inherit;">
                    <td class="text-muted text-right" data-sort-value="1">1</td>
                    <td class="text-left" data-sort-value="checksum"><i class="fa fa-folder "></i>&nbsp;&nbsp;&nbsp;
                        <a href="Checksum/">
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
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>