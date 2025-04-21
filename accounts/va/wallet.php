<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>VA Wallet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Optional: Custom CSS -->
    <link rel="stylesheet" href="main.css">
</head>

<body class="bg-light">

    <div class="d-flex">
        <!-- Sidebar -->
        <div id="sidebar-container"></div>

        <!-- Main -->
        <div class="flex-grow-1">
            <!-- Navbar -->
            <div id="navbar-container"></div>

            <div class="container py-4">
                <h5 class="mb-4">Wallet Overview</h5>

                <!-- Token Stats -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h6>Total Tokens</h6>
                                <p class="fs-4 text-primary">142</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex align-items-end">
                        <button class="btn btn-success btn-lg w-100">
                            <i class="bi bi-cash-coin me-2"></i> Redeem Tokens
                        </button>
                    </div>
                </div>

                <!-- Payout History -->
                <h6 class="mb-3">Recent Payouts</h6>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Date</th>
                                <th>Tokens Redeemed</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>April 10, 2025</td>
                                <td>100</td>
                                <td>$300.00</td>
                                <td><span class="badge bg-success">Paid</span></td>
                            </tr>
                            <tr>
                                <td>March 25, 2025</td>
                                <td>80</td>
                                <td>$240.00</td>
                                <td><span class="badge bg-success">Paid</span></td>
                            </tr>
                            <tr>
                                <td>March 1, 2025</td>
                                <td>60</td>
                                <td>$180.00</td>
                                <td><span class="badge bg-warning text-dark">Pending</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Load Sidebar + Navbar -->
    <script>
        fetch('sidebar.php').then(res => res.text()).then(data => {
            document.getElementById('sidebar-container').innerHTML = data;
        });

        fetch('navbar.php').then(res => res.text()).then(data => {
            document.getElementById('navbar-container').innerHTML = data;
        });
    </script>
</body>

</html>