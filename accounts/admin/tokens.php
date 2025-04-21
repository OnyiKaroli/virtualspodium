<!-- Replaced content with Token Sales UI -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Token Sales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .sidebar {
            min-width: 240px;
            max-width: 240px;
            background-color: #343a40;
            color: #fff;
            flex-shrink: 0;
        }

        .sidebar a {
            color: #ddd;
            text-decoration: none;
            padding: 15px;
            display: block;
        }

        .sidebar a:hover,
        .sidebar .active {
            background-color: #495057;
            color: #fff;
        }

        .main-content {
            flex-grow: 1;
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #fff;
            border-bottom: 1px solid #dee2e6;
        }
    </style>
</head>

<body>
    <?php include 'sidebar.php' ?>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand navbar-light px-4">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h5">Token Sales</span>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Notifications <span class="badge bg-danger">2</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Admin
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Token Sales Content -->
        <div class="container mt-4">
            <h5 class="mb-3">Token Purchase Records</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Client Name</th>
                            <th>Email</th>
                            <th>Tokens Purchased</th>
                            <th>Amount Paid ($)</th>
                            <th>Payment Method</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Alice Client</td>
                            <td>alice@example.com</td>
                            <td>3</td>
                            <td>$9</td>
                            <td>PayPal</td>
                            <td>2025-04-14</td>
                        </tr>
                        <tr>
                            <td>Mark Client</td>
                            <td>mark@example.com</td>
                            <td>5</td>
                            <td>$15</td>
                            <td>PayPal</td>
                            <td>2025-04-12</td>
                        </tr>
                        <tr>
                            <td>Joan Client</td>
                            <td>joan@example.com</td>
                            <td>2</td>
                            <td>$6</td>
                            <td>PayPal</td>
                            <td>2025-04-10</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>