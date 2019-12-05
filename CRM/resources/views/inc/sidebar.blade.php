@section('sidebar')

<div class="wrapper ">
  <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
      <a href="http://www.creative-tim.com" class="simple-text logo-normal">
        A+ CRM
      </a>
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item active  ">
          <a class="nav-link" href="./dashboard.html">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="../resources/views/user.blade.php">
            <i class="material-icons">Company</i>
            <p>Profile</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="../resources/views/tables.blade.php">
            <i class="material-icons">content_paste</i>
            <p>Table List</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="../resources/views/typography.blade.php">
            <i class="material-icons">library_books</i>
            <p>Typography</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="../resources/views/customers.blade.php">
            <i class="material-icons">bubble_chart</i>
            <p>customers</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="../resources/views/calendar.blade.php">
            <i class="material-icons">location_ons</i>
            <p>Calendar</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="../resources/views/notifications.blade.php">
            <i class="material-icons">notifications</i>
            <p>Notifications</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="../resources/views/messages.blade.php">
            <i class="material-icons">language</i>
            <p>Messages</p>
          </a>
        </li>
        <li class="nav-item active-pro ">
          <a class="nav-link" href="../resources/views/help.blade.php">
            <i class="material-icons">unarchive</i>
            <p>Help</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div class="main-panel">
