<header>
    <link rel="stylesheet" href="{{asset('assets/css/all.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.min.css')}}">
</header>
<style>
    @include('Layuots.main');

    i {
        direction: ltr;
        margin-right: 140px;
        font-size: 10px;
    }

</style>

<div class="sidebar">
    <h5 class="sidebarhedin">
        <span style="color: rgb(77, 140, 221)">F</span>
        <span style="color:red">U</span>
        <span style="color:rgb(170, 5, 170)">T</span>
        <span style="color:rgb(77, 140, 221)">U</span>
        <span style="color:yellow">R</span>
        <span style="color:red">E </span>
        &nbsp;
        <span style="color:yellow">H</span>
        <span style="color:rgb(77, 140, 221)">O</span>
        <span style="color:red">P</span>
        <span style="color:rgb(170, 5, 170)">E</span>
    </h5>
    <div>
        <ul style='margin: 0 0 0 -30px'>
            <li style="list-style-type: none">
                <a href="/" class="sidebarItem">
                    <i class="fa fa-home fa-1x "></i>
                    <h6>Home</h6>
                </a>
            </li>
            <li>
                <a href="/addStudent" class="sidebarItem">
                    <i class="fa fa-users fa-1x "></i>
                    <h6>Student</h6>
                </a>
            </li>
            <li>
                <a href="/viewTeacher" class="sidebarItem">
                    <i class="fa fa-user-circle fa-1x "></i>
                    <h6>Employes</h6>
                </a>
            </li>
            <li>
                <a href="expenses" class="sidebarItem">
                    <i class="fa fa-university fa-1x "></i>
                    <h6>Expenses</h6>
                </a>
            </li>
            <li>
                <a href="installments" class="sidebarItem">
                    <i class="fa fa-university fa-1x"></i>
                    <h6>Installments</h6>
                </a>
            </li>
            <li>
                <a href="/Material" class="sidebarItem">
                    <i class="fa fa-folder fa-1x "></i>
                    <h6>Material</h6>
                </a>
            </li>
            <li>
                <a href="library" class="sidebarItem">
                    <i class="fa fa-address-book fa-1x"></i>
                    <h6>Library</h6>
                </a>
            </li>
            <li>
                <a href="all" class="sidebarItem">
                    <i class="fa fa-book fa-1x"></i>
                    <h6>Class Room</h6>
                </a>
            </li>
            <li>
                <a href="/Work" class="sidebarItem">
                    <i class="fa fa-calendar fa-1x"></i>
                    <h6>work schedule</h6>
                </a>
            </li>
            <li>
                <a href="/exam" class="sidebarItem">
                    <i class="fa fa-table fa-1x"></i>
                    <h6>exam schedule</h6>
                </a>
            </li>
            <li>
                <a href="instructions" class="sidebarItem">
                    <i class="fa fa-info-circle "></i>
                    <h6>Instructions</h6>
                </a>
            </li>
        </ul>
    </div>
</div>
