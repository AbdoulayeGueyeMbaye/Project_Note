<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Élèves & inscriptions</title>

<style>
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:Arial;background:#f7f9f8;color:#18352e;font-size:12px}
button,input,select{font-family:inherit}

.header{height:60px;background:#fff;border-bottom:1px solid #e5ebe8;
display:flex;justify-content:space-between;align-items:center;padding:0 32px}
.logo{font-size:12px;font-weight:bold;letter-spacing:1.5px;color:#82918c}
.header-right,.profil,.annee{display:flex;align-items:center;gap:12px}
.annee{border:1px solid #e1e8e5;border-radius:20px;padding:9px 14px}
.point{width:7px;height:7px;background:#087455;border-radius:50%}
.notif,.avatar{width:36px;height:36px;border:1px solid #e1e8e5;border-radius:10px;background:white}
.avatar{background:#e8f0ed;color:#176c54;display:flex;align-items:center;justify-content:center;font-weight:bold}
.profil-info strong,.profil-info span{display:block}
.profil-info strong{font-size:11px}.profil-info span{font-size:9px;color:#9aa7a3}

.container{padding:38px 43px}
.entete{display:flex;justify-content:space-between;align-items:end;margin-bottom:34px}
.surtitre{font-size:10px;font-weight:bold;letter-spacing:1.3px;color:#087455;margin-bottom:8px}
h1{font-size:30px;margin-bottom:10px;color:#102f28}
.description{color:#71807b}
.btn{background:#076b50;color:white;border:0;border-radius:10px;padding:13px 18px;font-weight:bold;cursor:pointer}

.actions{display:grid;grid-template-columns:repeat(4,1fr);gap:12px;margin-bottom:16px}
.action{height:64px;background:white;border:1px solid #e3e9e7;border-radius:12px;
display:flex;align-items:center;padding:10px;cursor:pointer}
.icon{width:38px;height:38px;border-radius:10px;display:flex;align-items:center;justify-content:center;margin-right:10px}
.vert{background:#edf8f3;color:#087455}.violet{background:#f2edfb;color:#8260bd}
.bleu{background:#edf5fc;color:#4284be}.jaune{background:#fff8e9;color:#bc8a27}
.action div:nth-child(2){flex:1}.action b{display:block;margin-bottom:5px}.action small{color:#a0aaa6}
.arrow{color:#9ca9a5;font-size:17px}

.filtres{background:white;border:1px solid #e3e9e7;border-radius:12px;padding:11px;
display:flex;gap:8px;margin-bottom:16px}
.search{height:40px;flex:1;border:1px solid #d9e2df;border-radius:9px;padding:0 12px;outline:0}
select{height:40px;border:1px solid #d9e2df;border-radius:9px;padding:0 10px;background:white}
.nombre{padding:12px 5px;white-space:nowrap;color:#52625c}

.table{background:white;border:1px solid #e1e8e5;border-radius:12px;overflow:hidden}
table{width:100%;border-collapse:collapse}
th{height:43px;text-align:left;padding:0 14px;background:#fafcfc;
font-size:9px;color:#82918c;border-bottom:1px solid #dfe7e4}
td{height:59px;padding:0 14px;border-bottom:1px solid #e5ebe9;color:#53645e}
.eleve{display:flex;align-items:center;gap:10px}
.mini{width:38px;height:38px;border-radius:10px;background:#eef5f2;
display:flex;align-items:center;justify-content:center;color:#387263;font-weight:bold}
.eleve strong,.resp strong,.classe strong{display:block;color:#30473f;margin-bottom:4px}
.eleve small,.resp small,.classe small{color:#9aa7a3}
.badge{padding:6px 10px;border-radius:20px;font-size:10px}
.inscrit{background:#ebf8f1;color:#24815e}
.attente{background:#fff8e8;color:#bc841b}
.non{background:#fff0ee;color:#c45143}
.voir{border:1px solid #e0e8e5;background:white;border-radius:9px;padding:8px;cursor:pointer}
.footer{height:49px;padding:0 14px;display:flex;justify-content:space-between;align-items:center;color:#82918c}
.page{background:#076b50;color:white;padding:9px;border-radius:9px}

.modal{position:fixed;inset:0;background:#0005;display:none;align-items:center;justify-content:center}
.modal.active{display:flex}
.modal-box{background:white;width:400px;padding:25px;border-radius:15px}
.modal-box h2{margin-bottom:15px}
.modal-box p{color:#71807b;line-height:1.6}
.close{float:right;border:0;background:none;font-size:22px;cursor:pointer}

@media(max-width:900px){
.actions{grid-template-columns:repeat(2,1fr)}
.container{padding:25px}
.table{overflow:auto}table{min-width:950px}
}
@media(max-width:600px){
.header{padding:0 15px}.profil-info{display:none}
.entete{display:block}.btn{margin-top:20px}
.actions{grid-template-columns:1fr}.filtres{flex-wrap:wrap}
.search{flex-basis:100%}
}
</style>
</head>

<body>

<header class="header">
    <div class="logo">ÉCOLE PRIMAIRE AL AMAL</div>
    <div class="header-right">
        <div class="annee"><span class="point"></span>2026-2027</div>
        <button class="notif">♧</button>
        <div class="profil">
            <div class="avatar">MF</div>
            <div class="profil-info">
                <strong>Mariama Faye</strong>
                <span>Administrateur établissement</span>
            </div>
        </div>
    </div>
</header>

<main class="container">

    <div class="entete">
        <div>
            <div class="surtitre">SCOLARITÉ</div>
            <h1>Élèves & inscriptions</h1>
            <p class="description">
                Gérez le dossier de l'élève de son admission jusqu'à sa sortie de l'établissement.
            </p>
        </div>
        <button class="btn" onclick="ouvrirModal('Inscrire un élève')">
            ＋ Inscrire un élève
        </button>
    </div>

    <div class="actions">

        <div class="action" onclick="ouvrirModal('Inscription')">
            <div class="icon vert">♧</div>
            <div><b>Inscription</b><small>Créer un nouveau dossier</small></div>
            <span class="arrow">→</span>
        </div>

        <div class="action" onclick="ouvrirModal('Réinscription')">
            <div class="icon violet">▣</div>
            <div><b>Réinscription</b><small>Passage à la nouvelle année</small></div>
            <span class="arrow">→</span>
        </div>

        <div class="action" onclick="ouvrirModal('Transfert entrant')">
            <div class="icon bleu">↓</div>
            <div><b>Transfert entrant</b><small>Élève venant d'une autre école</small></div>
            <span class="arrow">→</span>
        </div>

        <div class="action" onclick="ouvrirModal('Transfert sortant')">
            <div class="icon jaune">↑</div>
            <div><b>Transfert sortant</b><small>Archiver un départ</small></div>
            <span class="arrow">→</span>
        </div>

    </div>

    <div class="filtres">
        <input class="search" id="search"
               placeholder="⌕  Nom, matricule ou responsable..."
               oninput="filtrer()">

        <select id="classe" onchange="filtrer()">
            <option value="">Toutes les classes</option>
            <option>CM2</option>
            <option>CP</option>
            <option>CI</option>
        </select>

        <select id="statut" onchange="filtrer()">
            <option value="">Tous les statuts</option>
            <option>Inscrit</option>
            <option>Non affecté</option>
            <option>En attente</option>
        </select>

        <span class="nombre">
            <b id="total">5</b> élève(s)
        </span>
    </div>

    <div class="table">

        <table>
            <thead>
                <tr>
                    <th>ÉLÈVE</th>
                    <th>MATRICULE</th>
                    <th>CLASSE</th>
                    <th>ÉTABLISSEMENT</th>
                    <th>RESPONSABLE</th>
                    <th>STATUT</th>
                    <th></th>
                </tr>
            </thead>

            <tbody id="liste"></tbody>
        </table>

        <div class="footer">
            <span>Dossiers synchronisés et sauvegardés</span>
            <span class="page">1</span>
        </div>

    </div>

</main>

<div class="modal" id="modal">
    <div class="modal-box">
        <button class="close" onclick="fermerModal()">×</button>
        <h2 id="titre"></h2>
        <p id="texte"></p>
    </div>
</div>

<script>

const eleves = [
    ["AF","Awa Fall","2014-05-18","JE-26001","CM2 A","CM2","Marième Fall","+221 77 420 18 04","Inscrit"],
    ["MB","Mariama Ba","2014-05-30","JE-26007","CM2 A","CM2","Khadidiatou Sy","+221 70 456 78 90","Inscrit"],
    ["CT","Cheikh Tidiane","2018-02-15","JE-26008","CP A","CP","Ibrahima Tidiane","+221 77 999 88 77","Inscrit"],
    ["MD","Mouhamed Diop","2019-03-10","JE-26011","Non affecté","CI","Babacar Diop","+221 77 333 22 11","Non affecté"],
    ["AN","Aïssatou Ndiaye","2019-07-22","JE-26012","Non affecté","CI","Saliou Ndiaye","+221 78 444 33 22","En attente"]
];

function afficherEleves(data=eleves){

    liste.innerHTML = data.map(e => {

        let couleur = e[8]=="Inscrit" ? "inscrit" :
                      e[8]=="En attente" ? "attente" : "non";

        return `
        <tr>
            <td>
                <div class="eleve">
                    <div class="mini">${e[0]}</div>
                    <div>
                        <strong>${e[1]}</strong>
                        <small>Né(e) le ${e[2]}</small>
                    </div>
                </div>
            </td>
            <td>${e[3]}</td>
            <td>
                <div class="classe">
                    <strong>${e[4]}</strong>
                    <small>${e[5]}</small>
                </div>
            </td>
            <td>Primaire Al Amal</td>
            <td>
                <div class="resp">
                    <strong>${e[6]}</strong>
                    <small>${e[7]}</small>
                </div>
            </td>
            <td>
                <span class="badge ${couleur}">${e[8]}</span>
            </td>
            <td>
                <button class="voir" onclick="voir('${e[1]}')">◉</button>
            </td>
        </tr>`;
    }).join("");

    total.textContent = data.length;
}

function filtrer(){

    let recherche = search.value.toLowerCase();
    let c = classe.value;
    let s = statut.value;

    let resultat = eleves.filter(e =>
        (!recherche || e.join(" ").toLowerCase().includes(recherche)) &&
        (!c || e[5] == c) &&
        (!s || e[8] == s)
    );

    afficherEleves(resultat);
}

function ouvrirModal(titre){

    document.getElementById("titre").textContent = titre;
    document.getElementById("texte").textContent =
        "Vous avez sélectionné : " + titre + ".";

    modal.classList.add("active");
}

function voir(nom){

    document.getElementById("titre").textContent = "Dossier élève";
    document.getElementById("texte").textContent =
        "Consultation du dossier de " + nom + ".";

    modal.classList.add("active");
}

function fermerModal(){
    modal.classList.remove("active");
}

afficherEleves();

</script>

</body>
</html>