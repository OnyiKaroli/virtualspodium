<!-- Replaced content with Virtual Assistant Management UI -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - VA Management</title>
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
    <?php include 'sidebar.php'; ?>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar -->
        <nav class="navbar navbar-expand navbar-light px-4">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h5">Virtual Assistant Management</span>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Notifications <span class="badge bg-danger">4</span></a>
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

        <!-- VA Management Content -->
        <div class="container mt-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5>List of Virtual Assistants</h5>
                <button class="btn btn-primary btn-sm">+ Add VA</button>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Tokens Earned</th>
                            <th>Hire Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Linda VA</td>
                            <td>linda.va@example.com</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>340</td>
                            <td>2024-12-01</td>
                            <td>
                                <button class="btn btn-sm btn-outline-info">Details</button>
                                <button class="btn btn-sm btn-warning">Suspend</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>James VA</td>
                            <td>james.va@example.com</td>
                            <td><span class="badge bg-secondary">Offline</span></td>
                            <td>220</td>
                            <td>2025-01-15</td>
                            <td>
                                <button class="btn btn-sm btn-outline-info">Details</button>
                                <button class="btn btn-sm btn-warning">Suspend</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>