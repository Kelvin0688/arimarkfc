<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    /* Navbar styling */
    .navbar {
        background-color: #212529; /* Dark background for better contrast */
        padding: 15px 20px; /* Add padding to the navbar */
        border-bottom: 1px solid #495057;
    }

    /* Navbar brand styling */
    .navbar-brand {
        display: flex;
        align-items: center;
        color: #ffffff;
        font-size: 1.1rem; 
        font-weight: bold;
    }

    .navbar-brand img {
        height: 100px;
        width: 70px;
        margin-right: 10px;
    }

    /* Toggler button styling */
    .navbar-toggler {
        border-color: #6c757d;
        background: #fff;
        color: #fff
    }

    .navbar-toggler-icon {
        color: #ffffff;
        background: #fff;

    }

    /* Make nav items more visible */
    .navbar-nav .nav-link {
        color: #f8f9fa; /* Light text for visibility */
        font-size: 16px;
        padding: 10px 15px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link.active {
        color: #ffffff;
        background-color: #495057; /* Dark hover and active color */
        border-radius: 5px; /* Rounded edges for better aesthetics */
    }

    /* Dropdown menu styling */
    .dropdown-menu {
        background-color: #343a40;
        border: none;
    }

    .dropdown-item {
        color: #adb5bd;
        padding: 10px 15px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .dropdown-item:hover {
        background-color: #495057;
        color: #ffffff;
    }
    /* Toggler button styling */
    .navbar-toggler {
        border-color: #6c757d;
        background: #212529;
    }

    .navbar-toggler-icon {
        color: #ffffff;
    }



    /* Responsive media queries for smaller screens */
    @media (max-width: 768px) {
        .navbar-brand {
            font-size: 1.1rem;
        }

        .navbar-brand img {
            height: 100px;
            margin-right: 10px;
        }

        .navbar-toggler {
            margin-top: 8px;
        }

        /* Full-width dropdown on small screens */
        .dropdown-menu {
            width: 100%;
        }

        .dropdown-item {
            text-align: center;
        }
        
    }
</style>

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
            <a class="navbar-brand text-white" href="index.php">
                <img src="../public/arimark.png" class="logo" alt="Logo">
                ARIMARK FOOTBALL CLUB
            </a>
        </div>

        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarItems" aria-controls="navbarItems" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>


        <div class="collapse navbar-collapse" id="navbarItems">
            <ul class="navbar-nav ml-auto">
                <!-- <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#" onclick="loadContent('dashboard.php'); event.preventDefault();">
                        <i class="fas fa-home"></i>
                        Dashboard
                    </a>
                </li> -->

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="addPlayerDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        Add Player
                    </a>
                    <div class="dropdown-menu" aria-labelledby="addPlayerDropdown">
                        <a class="dropdown-item" href="#" onclick="loadContent('player.php'); event.preventDefault();">U-17</a>
                        <a class="dropdown-item" href="#" onclick="loadContent('u-15.php'); event.preventDefault();">U-15</a>
                        <a class="dropdown-item" href="#" onclick="loadContent('u-13.php'); event.preventDefault();">U-13</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="viewPlayerDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        View Players
                    </a>
                    <div class="dropdown-menu" aria-labelledby="viewPlayerDropdown">
                        <a class="dropdown-item" href="#" onclick="loadContent('view-players.php'); event.preventDefault();">U-17</a>
                        <a class="dropdown-item" href="#" onclick="loadContent('view-u15.php'); event.preventDefault();">U-15</a>
                        <a class="dropdown-item" href="#" onclick="loadContent('view-u13.php'); event.preventDefault();">U-13</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="loadContent('add-event.php'); event.preventDefault();">
                        <i class="fas fa-calendar-plus"></i>
                        Add Event
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="loadContent('view-events.php'); event.preventDefault();">
                        <i class="fas fa-calendar-alt"></i>
                        View Events
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="loadContent('add-staff.php'); event.preventDefault();">
                        <i class="fas fa-user-tie"></i>
                        Add Staff
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="loadContent('view-staff.php'); event.preventDefault();">
                        <i class="fas fa-user-friends"></i>
                        View Staff
                    </a>
                </li>
            </ul>

            <div class="dropdown ml-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                    Hello, Admin
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

