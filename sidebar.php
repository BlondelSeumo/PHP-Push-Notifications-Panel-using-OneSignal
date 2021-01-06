<div class="sidebar">

    <ul>
        <li<?=($activePage == 'index') ? ' class="active"':''; ?>>
            <a href="./">
                <span class="fa fa-tachometer"></span>
                <span class="title">
                    Dashboard
                </span>
            </a>
        </li>
        <li<?=($activePage == 'single') ? ' class="active"':''; ?>>
            <a href="./single.php">
                <span class="fa fa-user"></span>
                <span class="title">
                    Send Single User
                </span>
            </a>
        </li>
        <li<?=($activePage == 'schedule') ? ' class="active"':''; ?>>
            <a href="./schedule.php">
                <span class="fa fa-user"></span>
                <span class="title">
                    Send Later
                </span>
            </a>
        </li>
        <li<?=($activePage == 'devices') ? ' class="active"':''; ?>>
            <a href="./devices.php">
                <span class="fa fa-users"></span>
                <span class="title">
                    All Users 
                </span>
            </a>
        </li>
        <li<?=($activePage == 'sent') ? ' class="active"':''; ?>>
            <a href="./sent.php">
                <span class="fa fa-paper-plane-o"></span>
                <span class="title">
                    Sent 
                </span>
            </a>
        </li>
        <li<?=($activePage == 'settings') ? ' class="active"':''; ?>>
            <a href="./settings.php">
                <span class="fa fa-cog"></span>
                <span class="title">
                    Settings
                </span>
            </a>
        </li>
        <li<?=($activePage == 'rsspush') ? ' class="active"':''; ?>>
            <a href="./rsspush.php">
                <span class="fa fa-cog"></span>
                <span class="title">
                    RSS Notification
                </span>
            </a>
        </li>
        <li class="line">
            <span></span>
        </li>
    </ul>
    <a href="#" class="collapse-menu">
        <span class="fa fa-arrow-circle-left"></span>
        <span class="title">
            Collapse menu
        </span>
    </a>

</div>
