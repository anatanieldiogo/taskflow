@section('aside')
    <aside class="aside-menu">
        <div class="aside-menu-separate">
            <div class="aside-menu-header">
                <div class="aside-menu-header-label">
                    <h2 class="logo">TaskFlow</h2>
                    <button class="click"><i class="fas fa-bars"></i></button>
                </div>
                <div class="aside-menu-header-form">
                    <form action="">
                        <i class="fas fa-search"></i>
                        <input type="text" name="" placeholder="Search">
                    </form>
                </div>
            </div>
            <div class="aside-menu-title">
                <span>Tasks</span>
            </div>
            <nav class="aside-menu-menu">
                <ul>
                    <li><a href="" class="click"><i class="fas fa-chevron-right"></i> Upcoming <span>12</span></a>
                    </li>
                    <li><a href="" class="aside-menu-acive click"><i class="fas fa-tasks"></i> Today
                            <span>5</span></a></li>
                    <li><a href="" class="click"><i class="fas fa-calendar-alt"></i> Calendar</a></li>
                    <li><a href="" class="click"><i class="fas fa-sticky-note"></i> Sticky wall</a></li>
                </ul>
            </nav>
            <div class="aside-menu-title">
                <span>Lists</span>
            </div>
            <nav class="aside-menu-menu">
                <ul>
                    <div class="aside-menu-menu-lists">
                        {{-- <li><a href="" class="click">
                                <div class="aside-list-color"></div> Personal <span>3</span>
                            </a></li>
                        <li><a href="" class="click">
                                <div class="aside-list-color"></div> Work <span>6</span>
                            </a></li>
                        <li><a href="" class="click">
                                <div class="aside-list-color"></div> List1 <span>3</span>
                            </a></li> --}}
                    </div>
                    <li><a href="" class="click"><i class="fas fa-plus"></i> Add new list</a></li>
                </ul>
            </nav>
        </div>
        <nav class="aside-menu-menu">
            <ul>
                <li><a href="" class="click"><i class="fas fa-sliders-h"></i> Settings</a></li>
                <li><a href="" class="click"><i class="fas fa-sign-out-alt"></i> Sign out</a></li>
            </ul>
        </nav>
    </aside>
@endsection
