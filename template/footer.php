<footer class="site-footer">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-12 col-12 border-bottom pb-5 mb-5">
                <div class="d-flex">
                    <a href="index.html" class="navbar-brand">
                        <i class="bi-bullseye brand-logo"></i>
                        <span class="brand-text">Leadership <br> Event</span>
                    </a>

                    <ul class="social-icon ms-auto">
                        <li><a href="#" class="social-icon-link bi-facebook"></a></li>

                        <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                        <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>

                        <li><a href="#" class="social-icon-link bi-youtube"></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-7 col-12">
                <ul class="footer-menu d-flex flex-wrap">
                    <?php foreach($bottom_menu_items as $title=>$url): ?>
                        <li class="footer-menu-item"><a href="<?=$url?>" class="footer-menu-link"><?=$title?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>


            <div class="col-lg-5 col-12 ms-lg-auto">
                <div class="copyright-text-wrap d-flex align-items-center">
                    <p class="copyright-text ms-lg-auto me-4 mb-0">Copyright © 2022 Leadership Event Co., Ltd.

                        <br>All Rights Reserved.

                        <br><br>Design: <a title="CSS Templates" rel="sponsored" href="https://templatemo.com" target="_blank">TemplateMo</a></p>

                    <a href="#section_1" class="bi-arrow-up arrow-icon custom-link"></a>
                </div>
            </div>

        </div>
    </div>
</footer>

<!-- JAVASCRIPT FILES -->
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/jquery.sticky.js"></script>
<script src="/assets/js/click-scroll.js"></script>
<script src="/assets/js/custom.js"></script>

</body>
</html>

<!-- Kód zodpovedá za vytvorenie päty (spodného panela) webovej stránky a pripojenie JavaScriptových súborov.

Kód vytvára nasledujúcu štruktúru päty:

- Externý kontajner s triedou "site-footer".
- Vnútri kontajnera sa nachádza riadok s vycentrovaním prvkov.
- Prvý stĺpec zaberá celú šírku a má triedy "col-lg-12" a "col-12". Obsahuje logotyp a názov "Leadership Event". Vnútri je tiež zoznam ikon sociálnych sietí (Facebook, Instagram, WhatsApp, YouTube).
- Druhý stĺpec zaberá 7/12 šírky a obsahuje zoznam odkazov vytvorený pomocou cyklu `foreach`. Každý odkaz má triedu "footer-menu-link" a je prvkom v poli `$bottom_menu_items`, kde kľúčom je názov odkazu a hodnotou je URL adresa.
- Tretí stĺpec zaberá 5/12 šírky a nachádza sa vpravo. Vnútri je umiestnený text autorských práv, informácie o právach, dizajnérovi a odkaz "Design: TemplateMo". Obsahuje tiež šípku nahor s triedou "bi-arrow-up", ktorá presmerováva na sekciu s identifikátorom "section_1".
- Posledný blok JavaScriptových súborov, ktoré sa pripájajú pre spracovanie udalostí a funkcií na stránke.

Týmto spôsobom kód vytvára pätu s rôznymi prvkami, ako sú logotyp, odkazy, ikony sociálnych sietí, text autorských práv a pripája niekoľko JavaScriptových súborov pre spracovanie webovej stránky.-->