<div class="menubar-scroll">
    <div class="menubar-scroll-inner">
        <ul class="app-menu">
            <li class="{{ Request::is('backend') ? 'active' : '' }}">
                <a href="{{ route('backend.index') }}">
                    <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
                    <span class="menu-text">Главная</span>
                </a>
            </li>
            <li class="{{ Request::is('backend/channels*') ? 'active' : '' }}">
                <a href="javascript:void(0)">
                    <i class="menu-icon zmdi zmdi-layers zmdi-hc-lg"></i>
                    <span class="menu-text">Каналы</span>
                    <!-- <span class="label label-warning menu-label">2</span> -->
                </a>
            </li>
            <li class="has-submenu {{ Request::is('backend/categories*') ? 'active' : '' }}">
                <a href="{{ route('backend.categories.index') }}" class="submenu-toggle">
                    <i class="menu-icon zmdi zmdi-puzzle-piece zmdi-hc-lg"></i>
                    <span class="menu-text">Категории</span>
                    <!-- <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i> -->
                </a>
                <!-- <ul class="submenu">
                    <li><a href="buttons.html"><span class="menu-text">Buttons</span></a></li>
                    <li><a href="alerts.html"><span class="menu-text">Alerts</span></a></li>
                    <li><a href="panels.html"><span class="menu-text">Panels</span></a></li>
                    <li><a href="lists.html"><span class="menu-text">Lists</span></a></li>
                    <li><a href="icons.html"><span class="menu-text">Icons</span></a></li>
                    <li><a href="media.html"><span class="menu-text">Media</span></a></li>
                    <li><a href="widgets.html"><span class="menu-text">Widgets</span></a></li>
                    <li><a href="tabs.html"><span class="menu-text">Tabs &amp; Accordions</span></a></li>
                    <li><a href="progress.html"><span class="menu-text">Progress</span></a></li>
                </ul> -->
            </li>
            <li class="{{ Request::is('backend/pages*') ? 'active' : '' }}">
                <a href="javascript:void(0)">
                    <i class="menu-icon zmdi zmdi-google-pages zmdi-hc-lg"></i>
                    <span class="menu-text">Страницы</span>
                    <!-- <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i> -->
                </a>
            </li>
            <li class="{{ Request::is('backend/moderation*') ? 'active' : '' }}">
                <a href="javascript:void(0)">
                    <i class="menu-icon zmdi zmdi-flash zmdi-hc-lg"></i>
                    <span class="menu-text">Модерация</span>

                </a>
            </li>
            <li class="hidden-lg hidden-md hidden-sm {{ Request::is('backend/settings*') ? 'active' : '' }}">
                <a href="javascript:void(0)">
                    <i class="menu-icon zmdi zmdi-settings zmdi-hc-lg"></i>
                    <span class="menu-text">Настройки сайта</span>
                </a>
            </li>
            <li class="hidden-lg hidden-md hidden-sm">
                <a href="{!! url('/logout') !!}" aria-expanded="false" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="menu-icon zmdi zmdi-power zmdi-hc-lg"></i>
                    <span class="menu-text">Выход</span>
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>

            <!-- <li class="">
                <a href="javascript:void(0)">
                    <i class="menu-icon zmdi zmdi-settings zmdi-hc-lg"></i>
                    <span class="menu-text">Настройки сайта</span>
                </a>
            </li> -->

            <!-- <li class="has-submenu">
                <a href="javascript:void(0)" class="submenu-toggle">
                    <i class="menu-icon zmdi zmdi-pages zmdi-hc-lg"></i>
                    <span class="menu-text">Pages</span>
                    <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                </a>
                <ul class="submenu">
                    <li><a href="profile.html"><span class="menu-text">Profile</span></a></li>
                    <li><a href="price.html"><span class="menu-text">Prices</span></a></li>
                    <li><a href="invoice.html"><span class="menu-text">Invoice</span></a></li>
                    <li><a href="gallery.1.html"><span class="menu-text">Gallery</span></a></li>
                    <li><a href="gallery.2.html"><span class="menu-text">Gallery 2</span></a></li>
                    <li><a href="support.html"><span class="menu-text">FAQ</span></a></li>
                    <li class="has-submenu">
                        <a href="javascript:void(0)" class="submenu-toggle">
                            <i class="menu-icon zmdi zmdi-plus zmdi-hc-lg"></i>
                            <span class="menu-text">Misc Pages</span>
                            <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                        </a>
                        <ul class="submenu">
                            <li><a href="login.html"><span class="menu-text">Login</span></a></li>
                            <li><a href="signup.html"><span class="menu-text">Sign Up</span></a></li>
                            <li><a href="password-forget.html"><span class="menu-text">Reset Password</span></a></li>
                            <li><a href="unlock.html"><span class="menu-text">Unlock Screen</span></a></li>
                            <li><a href="404.html"><span class="menu-text">404 Error</span></a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="has-submenu">
                <a href="javascript:void(0)" class="submenu-toggle">
                    <i class="menu-icon zmdi zmdi-check zmdi-hc-lg"></i>
                    <span class="menu-text">Forms</span>
                    <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                </a>
                <ul class="submenu">
                    <li><a href="form.layouts.html"><span class="menu-text">Form Layouts</span></a></li>
                    <li><a href="form.elements.html"><span class="menu-text">Form Elements</span></a></li>
                    <li><a href="form.custom.html"><span class="menu-text">Customized Elements</span></a></li>
                    <li><a href="form.plugins.html"><span class="menu-text">Form Plugins</span></a></li>
                    <li><a href="file-upload.html"><span class="menu-text">File Upload</span></a></li>
                    <li><a href="form.datetime.html"><span class="menu-text">DateTime Pickers</span></a></li>
                    <li><a href="editors.html"><span class="menu-text">Editors</span></a></li>
                </ul>
            </li>
            <li class="has-submenu">
                <a href="javascript:void(0)" class="submenu-toggle">
                    <i class="menu-icon zmdi zmdi-storage zmdi-hc-lg"></i>
                    <span class="menu-text">Tables</span>
                    <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                </a>
                <ul class="submenu">
                    <li><a href="tables.basic.html"><span class="menu-text">Basic Tables</span></a></li>
                    <li><a href="datatables.html"><span class="menu-text">DataTables</span></a></li>
                </ul>
            </li>
            <li class="has-submenu">
                <a href="javascript:void(0)" class="submenu-toggle">
                    <i class="menu-icon zmdi zmdi-chart zmdi-hc-lg"></i>
                    <span class="menu-text">Charts</span>
                    <span class="label label-success menu-label">7</span>
                    <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                </a>
                <ul class="submenu">
                    <li><a href="charts.flot.html"><span class="menu-text">Flot Charts</span></a></li>
                    <li><a href="echarts.bar.html"><span class="menu-text">Bar echarts</span></a></li>
                    <li><a href="echarts.pie.html"><span class="menu-text">Pie echarts</span></a></li>
                    <li><a href="echarts.line.html"><span class="menu-text">Line echarts</span></a></li>
                    <li><a href="echarts.map.html"><span class="menu-text">Map echarts</span></a></li>
                    <li><a href="echarts.scatter.html"><span class="menu-text">Scatter echarts</span></a></li>
                    <li><a href="echarts.custom.html"><span class="menu-text">Custom echarts</span></a></li>
                </ul>
            </li>
            <li class="has-submenu">
                <a href="javascript:void(0)" class="submenu-toggle">
                    <i class="menu-icon zmdi zmdi-pin zmdi-hc-lg"></i>
                    <span class="menu-text">Maps</span>
                    <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                </a>
                <ul class="submenu">
                    <li><a href="map-google.html"><span class="menu-text">Google Maps</span></a></li>
                    <li><a href="map-vector.html"><span class="menu-text">Vector Maps</span></a></li>
                </ul>
            </li>
            <li class="has-submenu">
                <a href="javascript:void(0)" class="submenu-toggle">
                    <i class="menu-icon zmdi zmdi-apps zmdi-hc-lg"></i>
                    <span class="menu-text">Apps</span>
                    <span class="label label-info menu-label">2</span>
                    <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
                </a>
                <ul class="submenu">
                    <li><a href="calendar.html"><span class="menu-text">Calendar</span></a></li>
                    <li><a href="contacts.html"><span class="menu-text">Contacts</span></a></li>
                </ul>
            </li>
            <li class="menu-separator">
                <hr>
            </li>
            <li>
                <a href="documentation.html">
                    <i class="menu-icon zmdi zmdi-file-text zmdi-hc-lg"></i>
                    <span class="menu-text">Documentation</span>
                </a>
            </li>
            
            <li>
                <a href="javascript:void(0)">
                    <i class="menu-icon zmdi zmdi-language-javascript zmdi-hc-lg"></i>
                    <span class="menu-text">Angular Version</span>
                </a>
            </li> -->
        </ul>
        <!-- .app-menu -->
    </div>
    <!-- .menubar-scroll-inner -->
</div>