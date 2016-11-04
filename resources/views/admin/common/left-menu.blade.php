<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">ARTICLES</li>
            <li>
                <a href="{{ route('administrator.article.index') }}">
                    <i class="fa fa-newspaper-o"></i> <span>Articles</span>
                    <small class="label pull-right bg-green"><?php echo App\Article::all()->count(); ?></small>
                </a>
            </li>
            <li>
                <a href="{{ route('administrator.article.archive.index') }}">
                    <i class="fa fa-archive"></i> <span>Archive</span>
                </a>
            </li>
            <li>
                <a href="{{ route('administrator.category.index') }}">
                    <i class="fa fa-tags"></i> <span>Categories</span>
                </a>
            </li>
        </ul>
        <ul class="sidebar-menu">
            <li class="header">USERS</li>
            <li>
                <a href="{{ route('administrator.user.index') }}">
                    <i class="fa fa-users"></i> <span>Users</span>
                </a>
            </li>
        </ul>
        <ul class="sidebar-menu">
            <li class="header">TRASH</li>
            <li>
                <a href="{{ route('administrator.trash.index') }}">
                    <i class="fa fa-users"></i> <span>Trashed items</span>
                </a>
            </li>
        </ul>
        <ul class="sidebar-menu">
            <li class="header">ADMIN</li>
            <li>
                <a href="{{ route('administrator.trash.index') }}">
                    <i class="fa fa-users"></i> <span>Logs</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>