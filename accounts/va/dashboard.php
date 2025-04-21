<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>VA Dashboard</title>
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
        <div id="sidebar-container">
            <!-- Will load sidebar.html via JS or backend include -->
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1">
            <!-- Navbar -->
            <div id="navbar-container">
                <!-- Will load navbar.html via JS or backend include -->
            </div>

            <div class="container-fluid py-4">
                <!-- Stats Section -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card text-white bg-primary mb-3 shadow">
                            <div class="card-body">
                                <h5 class="card-title">Total Tokens Earned</h5>
                                <p class="card-text fs-4">142</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card text-white bg-success mb-3 shadow">
                            <div class="card-body">
                                <h5 class="card-title">Messages Handled</h5>
                                <p class="card-text fs-4">1,830</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card text-white bg-warning mb-3 shadow">
                            <div class="card-body">
                                <h5 class="card-title">Available Balance</h5>
                                <p class="card-text fs-4">$426.00</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Chats Section -->
                <h5 class="mb-3">Active Chats</h5>
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <!-- Chat preview card (repeatable block) -->
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h6 class="card-title">Client: Sarah K.</h6>
                                <p class="card-text text-muted">“Thank you so much for your help today…”</p>
                            </div>
                            <div class="card-footer bg-transparent">
                                <a href="chat.html" class="btn btn-sm btn-outline-primary">Open Chat</a>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h6 class="card-title">Client: Leo D.</h6>
                                <p class="card-text text-muted">“Can you update the spreadsheet by…”</p>
                            </div>
                            <div class="card-footer bg-transparent">
                                <a href="chat.html" class="btn btn-sm btn-outline-primary">Open Chat</a>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h6 class="card-title">Client: Maria T.</h6>
                                <p class="card-text text-muted">“Let’s finalize the invoice tonight…”</p>
                            </div>
                            <div class="card-footer bg-transparent">
                                <a href="chat.html" class="btn btn-sm btn-outline-primary">Open Chat</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- /.container-fluid -->
        </div> <!-- /.main-content -->
    </div> <!-- /.d-flex -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Load sidebar and navbar -->
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