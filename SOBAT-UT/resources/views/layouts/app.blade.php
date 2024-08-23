<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Topbar Styling */
        .topbar {
            height: 60px;
            width: 100%;
            background-color: #f8d775;
            padding: 10px 20px;
            display: flex;
            justify-content: flex-end; /* Aligns content to the right */
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        /* Profile Styling */
        .profile-dropdown {
            position: relative;
            display: inline-block;
        }

        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
        }

        /* Wrapper to contain sidebar and content */
        .wrapper {
            display: flex;
            flex: 1; /* Make sure the wrapper takes up the remaining space */
            height: calc(100vh - 60px); /* Full height minus topbar */
            overflow: hidden; /* Prevent content overflow */
        }

        /* Sidebar Styling */
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            padding-top: 20px;
            position: sticky;
            top: 0;
            height: 100%; /* Full height */
            flex-shrink: 0; /* Prevent the sidebar from shrinking */
            overflow-y: auto; /* Scrollable content if needed */
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 15px;
            display: block;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .sidebar .active {
            background-color: #f8d775;
            color: #343a40;
        }

        /* Content Styling */
        .content {
            flex-grow: 1; /* Allow the content area to grow and fill the available space */
            padding: 20px;
            overflow-y: auto; /* Make the content scrollable */
        }

        /* Card Styling */
        .dashboard-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            background-color: white;
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
        }

        .card-icon {
            font-size: 2rem;
            color: #f8d775;
            margin-bottom: 10px;
        }
        .profile-icon {
            font-size: 40px; /* Adjust size to fit the topbar */
            cursor: pointer;
            color: #000; /* Change color if needed */
        }

    </style>
</head>
<body>
    <!-- Topbar -->
    <div class="topbar">
        <div class="profile-dropdown">
            <i class="bi bi-person-circle profile-icon" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false"></i>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="login">Logout</a></li>
            </ul>
        </div>

    </div>

    <!-- Wrapper to contain sidebar and content -->
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <a href="{{ route('dashboard') }}" class="d-flex align-items-center">
                <i class="bi bi-house-door me-2"></i> Dashboard
            </a>
            <a href="{{ route('instansi.index') }}" class="d-flex align-items-center">
                <i class="bi bi-building me-2"></i> Instansi
            </a>
            <a href="#" class="d-flex align-items-center">
                <i class="bi bi-people me-2"></i> Sobat
            </a>
        </div>


        <!-- Main Content -->
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- CHART -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @yield('scripts')


    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>