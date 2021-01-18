<?php ?>
    <!doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
              crossorigin="anonymous">
        <link rel="stylesheet" href="css/bootstrap.min.css"
        <title></title>
    </head>
<body>

<div class="container">
<?php $validacija = [];
if (isset($_POST['send'])): ?>

    <?php
    if (!preg_match('/[A-Z]./', $_POST['name'])) {
        $validacija[] = "Neteisingai ivestas vardas";
    }
    if (!preg_match('/[A-Z]./', $_POST['lastname'])) {
        $validacija[] = "Neteisingai ivesta pavarde";
    }
    if (!preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/', $_POST['email'])) {
        $validacija[] = "Neteisingai ivestas el. pastas";
    }
    if (!preg_match('/^\w{1,200}$/', $_POST['message'])) {
        $validacija[] = "Neteisingai ivestas pranesimas";
    } ?>

<?php endif; ?>
<?php if (isset($_POST['send']) & empty($validacija)): ?>
    <section>
        <h2>Formos duomenys</h2>
        <ul>
            <?php foreach ($_POST as $data => $value): ?>
                <?php if ($data != "send"): ?>
                    <li><span><?= htmlspecialchars($data); ?>: <?= htmlspecialchars(ucfirst($value)); ?></span></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </section>

<?php else: ?>
<?php foreach ($validacija as $klaida): ?>
    <div class="alert alert-danger" role="alert"><? $klaida; ?></div>
<?php endforeach; ?>

    <form method="get">
        <div class="mb-3">
            <label for="exampleInput1" class="form-label">Vardas</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="exampleInput2" class="form-label">Pavarde</label>
            <input type="text" class="form-control" id="surname" name="lastname">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">El. pastas</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>


        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Options</label>
            </div>
            <select class="custom-select" id="inputGroupSelect01" name="department">
                <?php foreach ($company as $comp): ?>
                    <option value=""><?= $comp; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleInput3" class="form-label">Zinute</label>
            <input type="text" class="form-control" id="message" name="message">
        </div>

        <button type="submit" class="btn btn-primary" name="send">Siųsti</button>
    </form>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
            crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
-->
    </body>
    </html>
<?php endif; ?>