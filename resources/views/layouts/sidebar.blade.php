        <div class="app-sidebar">
            <div class="logo">
                <a href="index.html" class="logo-icon"><span class="logo-text">Neptune</span></a>
                <div class="sidebar-user-switcher user-activity-online">
                    <a href="#">
                        <img src="../../assets/images/avatars/avatar.png">
                        <span class="activity-indicator"></span>
                        <span class="user-info-text">Chloe<br><span class="user-state-info">On a call</span></span>
                    </a>
                </div>
            </div>
            <div class="app-menu">
                <ul class="accordion-menu">
                    <li
                        @if( Request::is('dashboard')) 
                        class="active-page"
                        @endif
                        >
                        <a href="{{ route('dashboard') }}"><i class="material-icons-two-tone">dashboard</i>Dashboard</a>
                    </li>
                    <li
                        @if( Request::is('rak')) 
                        class="active-page"
                        @endif
                    >
                        <a href="{{ route('rak') }}"><i class="material-icons-two-tone">inbox</i>Rak</a>
                    </li>
                    <li
                        @if( Request::is('kategori')) 
                        class="active-page"
                        @endif
                    >
                        <a href="kategori"><i class="material-icons-two-tone">inbox</i>Kategori</a>
                    </li>
                    <li
                        @if( Request::is('produk')) 
                        class="active-page"
                        @endif
                    >
                        <a href="{{ route('produk') }}"><i class="material-icons-two-tone">cloud_queue</i>Produk</a>
                    </li>
                    <li
                        @if( Request::is('peminjam')) 
                        class="active-page"
                        @endif
                    >
                        <a href="todo.html"><i class="material-icons-two-tone">done</i>Peminjam</a>
                    </li>
                    <li
                        @if( Request::is('peminjaman')) 
                        class="active-page"
                        @endif
                    >
                        <a href="calendar.html"><i class="material-icons-two-tone">calendar_today</i>Peminjaman</a>
                    </li>
                    <li>
                        <a href="logout"><i class="material-icons-two-tone">calendar_today</i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>