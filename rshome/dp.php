<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dstcc";

$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomed = $_POST["nomed"];
    $depoimento = $_POST["depoimento"];

    $sql = "INSERT INTO nome (nomed, depoimento) VALUES ('$nomed', '$depoimento')";

    if ($mysqli->query($sql) === TRUE) {
        echo "<h5 class='alerta'>Depoimento enviado com sucesso! ✔️</h5>";
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
}

$sql_count_query = "SELECT COUNT(*) FROM nome";

$sql_count_query_exec = $mysqli->query($sql_count_query) or die($mysqli->error);

$sql_depoimento_count = $sql_count_query_exec->fetch_assoc();
$depoimento_count = $sql_depoimento_count['COUNT(*)'];

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$page_interval = 4;
$limit = 6;
$offset = ($page - 1) * $limit;

$page_number = ceil($depoimento_count / $limit);

$con = $mysqli->query("SELECT * FROM nome LIMIT {$limit} OFFSET {$offset}") or die($mysqli->error);

$mysqli->close();



?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Flag_map_of_Rio_Grande_do_Sul.svg/622px-Flag_map_of_Rio_Grande_do_Sul.svg.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styledp.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!--link fonte googlefonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> <!--link fonte googlefonts-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet"> <!--link fonte googlefonts-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RS Memorial | Depoimentos</title>
</head>

<body>

    <header id="header">
        <div class="container">
            <div class="flex">
                <a href="index.html" class="logo"><img src="mn.png" alt="RS Memorial" height="" width="180px"></a>
                <nav>
                    <ul class="desktop-menu">
                        <li><a href="historia.html">História</a></li>
                        <li><a href="mural.php">Mural</a></li>
                        <li><a href="dp.php">Depoimentos</a></li>
                        <li><a href="mapa.html">Mapa</a></li>
                        <li><a href="ajuda.html" class="ajudar">Como Ajudar</a></li>
                        <li><a href="sobre.html">Sobre</a></li>
                    </ul>
                    <div class="desktop-menu-icon" onclick="toggleMenu()">
                        ☰
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <div class="banner">
        <video autoplay muted loop>
            <source src="https://cdn.pixabay.com/video/2022/10/20/135765-764361819_large.mp4" type="video/mp4">
        </video>
        <div class="div">
            <div class="linha"></div>
            <div class="linha1"></div>    
        </div>
    </div>b
        <h2 class='title'>RS Memorial</h2>
        <h3>Seu depoimento é sua história, <br> e sua história é importante!</h3>  
    </div>
    



    <!---------------------------------------------------------------------------------------------------------------------->
    <div class="cardstd">
        <div class="card1">
            <p class="dp1">"A gente fica com medo. Não vai parar mais. Não fizeram nada ainda. Cada chuva vai ser
                pior, vamos ficar sem dormir. Vamos procurar um lugar mais confortável e mais alto, né, mas não pode ser
                no morro para não desmoronar”</p>
        </div>

        <div class="card2">
            <p class="dp2">“Porque eu estou com meus bichos tudo ali. Imagina eu sair de bote, carregar
                tudo de novo. Eu nasci e me criei aqui. Por isso que dói. Por isso que é ruim. Eu amo demais esse lugar
                aqui”</p>
        </div>

        <div class="card3">
            <p class="dp3">"Eu gostaria de ter uma casa em outro lugar e fazer pelo menos um espaço
                rústico, alguma coisa que eu pudesse vir aqui e não perder isso, entendeu? Porque o medo é muito
                grande”</p>
        </div>

        <div class="card4">
            <p class="dp4">"A gente fica com medo. Não vai parar mais. Não fizeram nada ainda. Cada chuva vai ser
                pior, vamos ficar sem dormir. Vamos procurar um lugar mais confortável e mais alto, né, mas não pode ser
                no morro para não desmoronar”
            </p>
        </div>

        <div class="card5">
            <p class="dp5">“Tenho comércio há 20 anos, passei já por 20 enchentes. Mas essa foi a pior que
                teve. O prejuízo está aí, mais de R$ 50 mil. Perdi tudo da loja. A água subiu 3 metros. Nunca tinha
                visto uma enchente desta, nunca. </p>
        </div>

        <div class="card6">
            <p class="dp6">“Infelizmente ficamos sem saída. A água, no início, estava com 30 centímetros, depois
                começou a subir chegou até o meio da cintura. Tivemos que sair pelo vidro com ajuda dos bombeiros. Eles
                jogaram uma corda para tentar nos ancorar.</p>
        </div>

    </div>

    <h2 class="h2">Envie seu depoimento!</h2>
    <div class="formulario">
    <form id="foco" action="" method="post">
        <input class="nm" type="text" name="nomed" placeholder="Nome :" autocomplete="off" required>
        <span></span>
        <textarea class="tx" name="depoimento" rows="4" placeholder="Depoimento :" maxlength="300" required></textarea>
        <input class="sub" type="submit" value="Enviar" id="">
    </form>
    </div>

    <div class="flexdp">
        <?php while ($dado = $con->fetch_array()) { ?>
            <div class="dois">
                <div class="cardrt grid-item">
                    <p class="nomedd"> <?php echo $dado["nomed"]; ?> </p>
                </div>

                <div class="depoimentod grid-item">
                    <p class="dpc"> <?php echo $dado["depoimento"]; ?> </p>

                </div>
            </div>
        <?php } ?>
    </div>

    <div class="paginacao">
        <p>
            <a href="?page=1">
                <<</a>
                    <?php
                    $first_page = max($page - $page_interval, 1);
                    $last_page = min($page_number, $page + $page_interval);
                    for ($p = $first_page; $p <= $last_page; $p++) {
                        if ($p === $page) {
                            echo "<p class='page-num'>{$p}</p>";
                        } else {
                            echo "<a href='?page={$p}' class='page-link'>{$p}</a>";
                        }
                    }
                    ?>
                    <a href="?page=<?php echo $page_number; ?>"> >> </a>
        </p>
    </div>
    <br>

    <footer>
        <div class="container-footer">
            <div class="logo-footer">
                <img src="mn.png" alt="">
                <button><i class="bi bi-person-circle"></i>Conheça-nos</button>

                <div class="linha-10"></div>
                <div class="linha-11"></div>
            </div>


            <div class="mapa-site">
                <h2>Mapa do site</h2>
                <ul>
                    <a href="historia.html">
                        <li>História</li>
                    </a>
                    <a href="mural.php">
                        <li>Mural</li>
                    </a>
                    <a href="mapa.html">
                        <li>Mapa</li>
                    </a>
                    <a href="dp.php">
                        <li>Depoimentos</li>
                    </a>
                    <a href="ajuda.html">
                        <li>Como ajudar</li>
                    </a>
                    <a href="sobre.html">
                        <li>Sobre</li>
                    </a>
                </ul>
            </div>

            <div class="voluntario">
                <h2>Quer ser um voluntário?</h2>
                <p>Para saber mais sobre como se tornar um voluntário e ajudar nas iniciativas de apoio à comunidade,
                    acesse o site <a href="#">SOS Rio Grande do Sul</a>. Sua colaboração é fundamental para fazermos a
                    diferença!</p>

            </div>


            <div class="ajude">

                <div class="txt-ajude">
                    <h2>Dados para doação:</h2>
                    <p>Pix para a conta SOS Rio Grande do Sul
                        CNPJ: 92.958.800/0001-38
                        Associação dos Bancos No Estado do Rio Grande do Sul ou Banco do Estado do Rio Grande do Sul (as
                        duas opções podem aparecer)

                    </p>
                </div>

                <div class="qrcode">
                    <img src="https://www.estado.rs.gov.br/upload/recortes/202405/02155956_2129868_MDO.png" alt="">
                    <button>QR Code para acessar a chave Pix</button>
                </div>
            </div>

        </div>

        <p class="copy">&copy; RS Memorial - 2024</p>

    </footer>



    <script src="dpjv.js"></script>




</body>

</html>