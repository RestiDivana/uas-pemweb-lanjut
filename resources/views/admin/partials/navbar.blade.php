<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>
        <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result row">
                <div>
                    <div class="search-header">
                        Setting
                    </div>
                    <div class="search-item">
                        <ul class="">
                            <li class="@if (@$subMenuActive === 'logo') active @endif">
                                <a class="nav-link" href="{{ route('admin.settings.logo.edit') }}">
                                    Logo
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div>
                    <div class="search-header">
                        Blog
                    </div>
                    <div class="search-item">
                        <ul class="">
                            @can('blog categories read')
                                <li class="@if (@$subMenuActive === 'blog-categories') active @endif">
                                    <a class="nav-link" href="{{ route('admin.blog.categories.index') }}">
                                        Category
                                    </a>
                                </li>
                            @endcan
                            @can('blog posts read')
                                <li class="@if (@$subMenuActive === 'blog-posts') active @endif">
                                    <a class="nav-link" href="{{ route('admin.blog.posts.index') }}">
                                        Posts
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </div>

                <div>
                    <div class="search-header">
                        Users
                    </div>
                    <div class="search-item">
                        <ul class="">
                            <li class="@if (@$subMenuActive === 'users') active @endif">
                                <a class="nav-link" href="{{ route('admin.users.index') }}">Users Data</a>
                            </li>
                            @if (auth()->user()->hasRole('superadmin'))
                            <li class="@if (@$subMenuActive === 'roleAndPermissions') active @endif">
                                <a class="nav-link" href="{{ route('admin.roles.index') }}">Role & Permissions</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Messages
                    <div class="float-right">
                        <a href="#">Mark All As Read</a>
                    </div>
                </div>
                <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Notifications
                    <div class="float-right">
                        <a href="#">Mark All As Read</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-icons">
                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-icon bg-primary text-white">
                            <i class="fas fa-code"></i>
                        </div>
                        <div class="dropdown-item-desc">
                            Template update is available now!
                            <div class="time text-primary">2 Min Ago</div>
                        </div>
                    </a>
                </div>
                <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ auth()->user()->image->sm }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in 5 min ago</div>
                <!-- <a href="#" class="dropdown-item has-icon">
          <i class="far fa-user"></i> Profile
        </a>
        <a href="#" class="dropdown-item has-icon">
          <i class="fas fa-bolt"></i> Activities
        </a> -->
                <a href="{{ route('admin.settings.basic-info.edit') }}" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('admin.auth.logout') }}" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>

<script>
    // Fungsi untuk menambahkan notifikasi inbox baru
    function addInboxNotification(name, email, phone, description) {
        var notificationElement = `
            <a href="#" class="dropdown-item dropdown-item-unread">
                <div class="dropdown-item-avatar">
                    <div class="is-online"></div>
                </div>
                <div class="dropdown-item-desc">
                    b:forea
                    <b>${name}</b>
                    <p>${email}</p>
                    <p>${phone}</p>
                    <p>${description}</p>
                    <div class="time">Just Now</div>
                </div>
            </a>
        `;
        $('#inboxNotifications').prepend(notificationElement);
    }

    // Contoh penggunaan fungsi addInboxNotification
    // Panggil fungsi ini saat ada inbox baru
    // Misalnya:
    // addInboxNotification('John Doe', 'john@example.com', '1234567890', 'This is a new message');

    // Di sini Anda perlu logika untuk memperbarui notifikasi saat ada inbox baru.
    // Anda bisa menggunakan Ajax untuk mengambil data inbox baru dari server secara berkala,
    // dan kemudian memanggil fungsi addInboxNotification untuk menambahkan notifikasi tersebut.
</script> 