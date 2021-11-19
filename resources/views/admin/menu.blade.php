<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
         data-menu-dropdown-timeout="500">
        <ul class="menu-nav">
            <li class="menu-item" aria-haspopup="true">
                <a href="/" class="menu-link">
                    <i class="menu-icon flaticon-home"></i>
                    <span class="menu-text">Ana Sayfa</span>
                </a>
            </li>

            <li class="menu-item" aria-haspopup="true">
                <a href="{{ route('referee.currentMatches') }}" class="menu-link">
                    <i class="menu-icon flaticon-list"></i>
                    <span class="menu-text">Güncel Maçlar</span>
                </a>
            </li>

            <li class="menu-section">
                <h4 class="menu-text">Site İşlemleri</h4>
                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
            </li>
            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-web"></i>
                    <span class="menu-text">Menüler</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Menüler</span>
												</span>
                        </li>
                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                            data-menu-toggle="hover">
                            <a href="{{ route('referee.index') }}" class="menu-link menu-toggle">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Hakemler</span>
                            </a>
                        </li>

                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                            data-menu-toggle="hover">
                            <a href="{{ route('match.index') }}" class="menu-link menu-toggle">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Fixtür Tablosu</span>
                            </a>
                        </li>

                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                            data-menu-toggle="hover">
                            <a href="{{ route('match.point') }}" class="menu-link menu-toggle">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Hesaplanmış Puan</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-web"></i>
                    <span class="menu-text">Sistem Ayarları</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">Sistem Ayarları</span>
												</span>
                        </li>
                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                            data-menu-toggle="hover">
                            <a href="{{ route('match.parameters') }}" class="menu-link menu-toggle">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">Parametreler</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>


        </ul>
    </div>
</div>
