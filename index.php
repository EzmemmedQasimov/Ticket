<?php require_once "send.php"; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bilet Al</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <form action="#" autocomplete="off" method="POST">
        <div class="form-group col-3">
            <label for="name">Ad Soyad</label>
            <input type="text" class="form-control" placeholder="Ad Soyad" name="name" id="name" required>
        </div>

        <div class="form-group col-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" placeholder="E-mail" name="email" required id="email">
        </div>
        <div class="form-group col-3">
            <label for="phone">Telefon</label>
            <input type="number" class="form-control" placeholder="Telefon" name="phone" required id="phone">
        </div>

        <div class="form-group col-3">
            <label for="film">Filmlər</label>
            <select name="film" class="form-control" required id="film">
                <option selected disabled>Seç</option>
                <option>Pulp Fiction</option>
                <option>Kill Bill</option>
                <option">Once Upon a Time in Hollywood</option>
                    <option>Reservoir Dogs</option>
                    <option>Inglourious Basterds</option>
                    <option>Django Unchained</option>
                    <option>The Hateful Eight</option>
            </select>
        </div>
        <div class="form-group col-3">
            <label for="date">Tarix</label>
            <input type="date" class="form-control" min=<?= date('Y-m-d'); ?> required name="date" id="date">
        </div>
        <div class="form-group col-3">
            <button style="margin-top: 25px;" class="btn btn-dark" name="film_send" id="film_send">Bilet Al</button>
        </div>
    </form>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        onload = function() {
            Status();
        }

        function UrlParam() {
            var url_string = window.location.href;
            var url = new URL(url_string);
            return url.searchParams.get("status");
        }

        function Status() {
            if (UrlParam() == "ok") {
                swal("Əla!", "Bilet Nömrəniz Emailnizə Göndərildi!", "success");
            }
            if (UrlParam() == "no") {
                swal("Təəssüf!", "Əməliyyat icra edilmədi!", "error");
            }

            if (UrlParam() != null) {
                setTimeout(Yonlendir, 3000);
            }

        }

        function Yonlendir() {
            location.href = "index.php";
        }
    </script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>