<div class="container my-5">
        <div class="row">
            <div class="card mx-auto">
                <div class="card-header">
                    <h3>Readme (documentation)</h3>
                </div>
                <div class="card-body p-5">
                    <h3>1. Tehnologije</h3>
                    <p>Aplikacija je rađena u Laravel stack-u (Laravel 8, MySQL za bazu, JS/jQuery za frontend i Bootstrap 4 za layout). Što se tiče samog Laravela, za login/register i auth system korišten je <a href="https://laravel.com/docs/8.x/fortify" target="_blank">Fortify API</a>. Budući da je zasnovan na PHPu, za package management, Laravel koristi <a target="_blank" href="https://getcomposer.org/">Composer</a> a svakako i <a target="_blank" href="https://docs.npmjs.com/downloading-and-installing-node-js-and-npm">NPM</a> za handling JS paketa i dependency-a. Zbog toga je potrebno instalirati i NodeJS. Za pokretanje same aplikacije potreban je server (najbrze rjesenje <a target="_blank" href="https://www.apachefriends.org/">XAMPP</a>). Također, Laravel 8 zahtijeva 7.3+ verziju PHP-a ali preporučuje se <a target="_blank" href="https://www.php.net/downloads.php">PHP 8+</a>.</p>

                    <h3>2. Postavljanje i pokretanje projekta</h3>
                    <p>Sve što je potrebno za pokretanje jeste:</p>
                    <li>- Kreirati bazu i unijeti ispravne podatke (naziv, user, password - opcionalno) u .env file.</li>
                    <li>- instalirati pakete putem Composera sa komandom: composer install</li>
                    <li>- instalirati pakete putem NPM-a sa komandom: npm i</i>
                    <li>- kompajlirati css/js podatke putem komande: npm run watch</li>
                    <li>- komandom: php artisan serve, podižemo lokalni server</li>
                    <li>- komandom php artisan migrate, migriramo naše tabele i relacije u bazu podataka</li>
                    <li>- komandom php artisan db:seed, ubacujemo inicijalne podatke u bazu podataka</li>
                    <p>Kompletnu dokumentaciju za Laravel možete naći <a href="https://laravel.com/docs/8.x" target="_blank">ovdje</a></p>

                    <h3>3. O samoj aplikaciji</h3>
                    <p>Aplikacija je koncipirana tako da imamo 3 rola: Admin, Radnik i Klijent.<br><br>Admin može da radi CRUD korisnika, CRUD Programa za čišćenje, Koraka/procedura prilikom čićenja i da pregleda narudžbe, mjenja status ili briše narudžbe.<br><br>Radnik ima odgovornosti i prava isključivo u pogledu narudžbi tako da može samo da pregleda narudžbe, mjenja status ili briše narudžbe.<br><br>Klijent ima mogućnost da pregleda pakete/programe, kreira/popuni/mjenja profil sa osnovnim informacijama, vrši CRUD automobila koji su u njegovom vlasništvu. Može da vrši narudžbe, ali samo u slučaju da je kreirao profil i dodao barem jedno auto. Može da pregleda narudžbe i otkaže/obriše ukoliko je narudžba u statusu: "na čekanju".<br><br>Sva tri korisnika imaju svoj zaseban dashboard koji prikazuje funkcionalnosti shodno rolu korisnika.

                    <h3>4. Validacija i servisi</h3>
                    <p>Za validaciju i sigurnost ruta korišteni su različiti middleware-i, za provjeru prijave korisnika, njegove role, dozvola, da li ima profil, da li je dodao auto itd.</p>
                    <p>Za sistem obračuna cijene narudžbe korišteni su Laravel Events gdje prilikom inicijalnog kreiranja korisnika (na event kreiranja) postavljamo u zasebnu tabelu id korisnika i inicijalni broj narudzbi: 0. Prije svake narudžbe provjerava se broj ukupnih narudžbi korisnika i prema tome se obračunava cijena za narednu. Popusti se obračunavaju prema sljedećem:</p>
                    <li>- 5% za prvu narudžbu</li>
                    <li>- 10% za petu narudžbu</li>
                    <li>- 20% za desetu narudžbu</li>
                    <p>Nakon svake simulirane narudžbe, korisniku se broj narudžbi povećava za 1.</p>
                    <p>Za validaciju request-a, korišten je Request validator od Laravela koji nam omogućuje da provjerimo i validiramo sadržaj koji nam dolazi od strane klijenta po raznim parametrima poput formata, dužine, veličine i  sl.</p>

                    <h3>5. Dodatne informacije</h3>
                    <p>Kada je u pitanju Admin Dashboard, za CRUD korisnika, korišten je AJAX jQuery, čisto radi demonstracije AJAX handle-anja requesta. Ova funkcionalnost nije primjenjena na ostatak aplikacije jer bi bilo poprilično time consuming i zakomplikovalo bi development proces.</p>
                    <p>Bitno je naglasiti da samo Admin moze da kreira korisnike raznih rolova. Putem registracijske forme sa klijent strane, role je automatski "klijent", tako da bi mogli da upravljamo admin dashboardom, moramo da pokrenemo Seeder i unesemo default podatke. Osim toga imamo i default ponude i programe čiščenja, procedure, rolove koje ne možemo preko aplikacije inicijalno da unesemo. Ovo je naravno urađeno na ovaj način samo radi simuliranja i ubrzanog razvoja.</p>
                    <p>Pivot tabela nije korištena za user-role sistem budući da je bila pretpostavka da jedan korisnik može imati samo jedan role.</p>
                    <p>Kada su u pitanju Programi za čišćenje i procedure čišćenja(koraci, faze), korištena je pivot tabela iz razloga jer se radi o many-to-many relaciji</p>
                    <p>Admin ne može da kreira profile i dodaje auta za same korisnike i profile, budući da je to već implementirano na klijent strani tako da nije bilo potrebe da se radi duplo i za admina.</p>
                    
                    <h3>6. Greške i nedostaci</h3>
                    <p>Većina bug-ova je ispravljena s tim da ostaje nedostatak/bug u navigaciji(tabovi) da svaki put kada reloadujemo stranicu, korisnik mora manuelno da prebaci na tab na kojem je bio prije reload-a. Ovaj problem svakako bi se najbolje rješio implementiranjem rješenja sličnog kao i kod CRUD-a korisnika (AJAX) ali bi bilo potrebno više vremena.</p>
                    <p>Bila je namjera da se ubaci i search query ili eventualno filter query koji bi mogao da rezultate iz tabela filtrira po odredjenim parametrima kao npr. starije/novije i sl.</p>
                </div>
            </div>
        </div>
    </div>