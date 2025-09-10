<?php
include("conexao.php");

if (isset($_FILES['registro'])) {
    $registro = $_FILES['registro'];

    if ($registro['error'])
        die("Falha ao enviar arquivo");

    if ($registro['size'] > 10485760)
        die("Arquivo muito grande! Max: 10MB");

    $pasta = "registros/";
    $nomeDoArquivo = $registro['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    if ($extensao != "jpg" && $extensao != "jpeg" && $extensao != "png")
        die("Formato de arquivo inválido!");

    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
    $deu_certo = move_uploaded_file($registro["tmp_name"], $path);

    $nome = $_POST['nome'];
    $local = $_POST['local'];
    $data = $_POST['data'];

    if ($deu_certo) {
        $mysqli->query("INSERT INTO registros (imgNome, path, nome, local, data) VALUES('$nomeDoArquivo', '$path', '$nome', '$local', '$data')") or die($mysqli->error);
        echo "<p class='alerta'>Arquivo enviado com sucesso!</p>";
    } else{
        echo "<p class='alerta'>Arquivo enviado com sucesso!</p>";
    }
        
}

$sql_count_query = "SELECT COUNT(*) FROM registros";

$sql_count_query_exec = $mysqli->query($sql_count_query) or die($mysqli->error);

$sql_arquivo_count = $sql_count_query_exec->fetch_assoc();
$arquivo_count = $sql_arquivo_count['COUNT(*)'];

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$page_interval = 4;
$limit = 5;
$offset = ($page - 1) * $limit;

$page_number = ceil($arquivo_count / $limit);

$sql_query = $mysqli->query("SELECT * FROM registros LIMIT {$limit} OFFSET {$offset}") or die($mysqli->error);

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="shortcut icon" href="https://upload.wikimedia.org/wikipedia/commons/a/a9/Flag_map_of_Rio_Grande_do_Sul.svg">
    <link rel="stylesheet" href="mural.css"> <!--link css-->
    <link rel="preconnect" href="https://fonts.googleapis.com"> <!--link fonte googlefonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> <!--link fonte googlefonts-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet"> <!--link fonte googlefonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RS Memorial | Mural</title>
</head>

<body>
    <header id="header">
        <div class="container">
            <div class="flex">
                <a href="index.html" class="logo"><img src="logo.png" alt="RS Memorial" width="185px"></a>
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

    <main>
        <section class="car-container">
            <div class="title">
                <h1>RS Memorial</h1>
                <h2>Veja aqui no Mural os chocantes acontecimentos <br> registrados pelas testemunhas da enchente.</h2>
                <div class="linha"></div>
                <div class="linha2"></div>
            </div>


            <div class="carrossel">
                <div class="imagens">
                    <input type="radio" name="btn-radio" id="radio1">
                    <input type="radio" name="btn-radio" id="radio2">
                    <input type="radio" name="btn-radio" id="radio3">
                    <input type="radio" name="btn-radio" id="radio4">

                    <div class="imagem primeiro">
                        <img src="imagem1.jpg" alt="enchente">
                    </div>
                    <div class="imagem">
                        <img src="imagem2.jpg" alt="enchente">
                    </div>
                    <div class="imagem">
                        <img src="imagem3.jpg" alt="enchente">
                    </div>
                    <div class="imagem">
                        <img src="imagem4.jpg" alt="enchente">
                    </div>
                </div>
            </div>
        </section>


        <section class="gal-container">
            <div class="subtitle">
                <h2>Mural de Fotos</h2>
                <div class="linha3"></div>
                <div class="linha4"></div>
            </div>

            <div class="img-demo">
                <div class="demo">
                    <img src="enchentes1.jpg">
                </div>
                <div class="demo">
                    <img src="enchentes2.jpg">
                </div>
                <div class="demo">
                    <img src="enchentes3.jpg">
                </div>
                <div class="demo">
                    <img src="enchentes4.jpg">
                </div>
            </div>

            <div class="btn-form">
                <button id='show-hide' class="show-hide">Envie seu Registro <i class="bi bi-upload"></i></button>
            </div>

            <div class="container-form">
                <form enctype="multipart/form-data" method="post" class="formulario">
                    <div class="inputWrapper">
                        <input class="fileInput" type="file" name="registro" required-/>
                        <i class="bi bi-cloud-upload"></i>
                    </div>
                    <label for="registro">Selecione o Arquivo</label>
                    <br><br>
                    <p>Nome: </p><input type="text" name="nome" autocomplete="off" placeholder="Nos diga seu nome" maxlength="100" required>
                    <br><br>
                    <p>Local: </p><input type="text" name="local" autocomplete="off" placeholder="Onde isto foi registrado?" maxlength="100" required>
                    <br><br>
                    <p>Data: </p><input type="date" name="data" autocomplete="off" required>
                    <br><br>
                    <button type="submit">Enviar</button>
                </form>
            </div>

            <?php
            while ($registro = $sql_query->fetch_assoc()) {
            ?>
            <div class="mural">
                <div class="mural-img">
                    <img src="<?php echo $registro['path']; ?>">
                </div>
            </div>    
            <div class="mural-descricao">
                <p><?php echo $registro['nome'];?></p>
                <p><?php echo $registro['local'];?></p>
                <p><?php echo date("d/m/y", strtotime($registro['data']));?></p>
            </div>     
            <?php
            }
            ?>

            <div class="paginacao">
                <p>
                <!-- <?php echo "Page: {$page} <br>"; ?>
                <?php echo "Number of Pages: {$page_number}"; ?> -->
                </p>
                <p>
                    <a href="?page=1"> <<</a>
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
        </section>
    </main>

    <footer>
        <div class="container-footer">
            <div class="logo-footer">
                <img src="logo.png" alt="">
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
    <script src="mural.js"></script>
</body>
</html>