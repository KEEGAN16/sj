<main>
    <section class="container">
        <div class="row">
            <div class="col-100">
                <h1>Prihlásenie</h1>
                <div class="login-form">
                    <form action="/inc/login/login.php" method="post" class="col-md-6 needs-validation">
                        <input class="form-control" type="text" name="user_name" placeholder="Váš email" required><br>
                        <input class="form-control" type="password" name="user_password" placeholder="Vaše heslo" required><br>
                        <button class="btn btn-outline-secondary mt-4" type="submit" name="log_user">Odoslať</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Tento kód vytvára HTML rozloženie pre prihlasovací formulár (aplikáciu pre autentifikáciu). Vytvára nasledujúcu štruktúru:

- Hlavný obsah stránky sa nachádza vnútri elementu `<main>`.
- V rámci `<main>` je sekcia s triedou "container", ktorá obsahuje riadok s triedou "row".
- V rámci riadku je blok s triedou "col-100", ktorý zaberá celú dostupnú šírku.
- V bloku "col-100" sa nachádza nadpis `<h1>` "Prihlásenie".
- Pod nadpisom je prihlasovací formulár s triedou "login-form". Formulár odosiela dáta na adresu "/inc/login/login.php" metódou POST.
- V rámci formulára sú dve vstupné polia: jedno pre vstup e-mailu (name="user_name") a druhé pre vstup hesla (name="user_password").
- Pod vstupnými poliami je tlačidlo "Odoslať" s triedami "btn btn-outline-secondary". Po kliknutí na tlačidlo sa formulár odošle.

Týmto spôsobom tento kód vytvára prihlasovací formulár na stránke, kde môže používateľ zadať svoj e-mail a heslo a následne odoslať formulár pre autentifikáciu.-->