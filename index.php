<?php
// altijd bovenaan, dit is de database connectie!
include 'inc/inc.database.php';
// leden:
include 'inc/inc.leden.php';
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
    <title>Hello, world!</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <h2>Leden</h2>
            <a class="btn btn-primary btn-sm float-left">Toevoegen</a>
            <table class="table table-striped" id="dtleden">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Naam</th>
                    <th>Telefoon</th>
                    <th>Email</th>
                    <th>Acties</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach (getLeden() as $lid) {
                    echo '<tr data-id="' . $lid['lid_id'] . '">' . PHP_EOL;
                    echo '    <td>' . $lid['lid_id'] . '</td>' . PHP_EOL;
                    echo '    <td>' . $lid['naam'] . '</td>' . PHP_EOL;
                    echo '    <td><a href="tel:' . $lid['telefoon'] . '">' . $lid['telefoon'] . '</a></td>' . PHP_EOL;
                    echo '    <td><a href="mailto:' . $lid['email'] . '">' . $lid['email'] . '</a></td>' . PHP_EOL;
                    echo '    <td><a href="#" class="btn btn-danger btn-sm dellid">del</a> <a href="#" class="btn btn-warning btn-sm editlid">edit</a></td>' . PHP_EOL;
                    echo '</tr>' . PHP_EOL;
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="col-6">
            <h2>Logboek</h2>
            <table class="table table-striped" id="dtlog">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Datum</th>
                    <th>Handeling</th>
                    <th>Naam</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- modals -->
    <!-- leden -->
    <div class="modal" id="editLedenModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Lid bewerken</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="fromEditLedenModal">
                        <div class="form-group row">
                            <label for="staticLidId" class="col-sm-2 col-form-label">id</label>
                            <div class="col-sm-10">
                                <input type="text" readonly class="form-control-plaintext" id="staticLidId" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputNaam" class="col-sm-2 col-form-label">Naam</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNaam">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputTelefoon" class="col-sm-2 col-form-label">Telefoon</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputTelefoon">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modelEditLedenSave">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootbox.all.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
<script type="text/javascript" src="js/leden.js"></script>

<script>
    $(document).ready(function () {
        $('#dtleden').DataTable({
            language:
                {
                    url: '//cdn.datatables.net/plug-ins/1.10.20/i18n/Dutch.json'
                }
        });

        $('#dtlog').DataTable({
            language:
                {
                    url: '//cdn.datatables.net/plug-ins/1.10.20/i18n/Dutch.json'
                }
        });
    });
</script>
</body>
</html>