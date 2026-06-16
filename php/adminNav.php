<aside id="sidebar" class="js-sidebar">
    <!-- Content For Sidebar -->
    <div class="h-100">

        <div class="sidebar-logo">
            <a href="adminMenu.php">Culturanet</a>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Admin
            </li>
            <li class="sidebar-item">
                <a href="adminMenu.php" class="sidebar-link2">
                    <i class="fa-solid fa-list pe-2"></i>
                    Dashboard
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-solid fa-file-lines pe-2"></i>
                    Event
                </a>
                <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="addEvent.php" class="sidebar-link">Add Event</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="eventList.php" class="sidebar-link">View Event</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#posts" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-solid fa-sliders pe-2"></i>
                    Admin
                </a>
                <ul id="posts" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="addAdmin.php" class="sidebar-link">Add Admin</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="adminList.php" class="sidebar-link">View Admin</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#auth" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-regular fa-user pe-2"></i>
                    User
                </a>
                <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="addUser.php" class="sidebar-link">Add User</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="userList.php" class="sidebar-link">View User</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="bookingList.php" class="sidebar-link2">
                    <i class="fa-solid fa-list pe-2"></i>
                    Booking List
                </a>
            </li>
        </ul>

    </div>
</aside>