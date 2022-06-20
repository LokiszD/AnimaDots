<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/gerenciarAnimal.css">
    <link rel="stylesheet" href="../css/sobre.css">
    <title>AnimaDots - Sobre nós</title>
</head>

<body>
    <?php include '../menu/menuSite.php' ?>

    <div class="geral">
        <div class="container">
            <h2 style="font-weight: bold;">Sobre nós <i class="fas fa-address-card"></i></h2>
        </div>
    </div>

    <section class="container filtro">
        <h5>Vem conhecer um pouco mais sobre a nossa história!</h5>
    </section>

    <div class="container-sm">
        <div class="sobreEsq">
            <img src="../assets/penny.jpg" class="fotoEsq">
            <div class="paragrafo">
                <p>
                    O sistema AnimaDots será desenvolvido com o principal objetivo de facilitar e aumentar
                    a visualização da adoção de animais de estimação, auxiliando a ONG utilizadora no
                    controle das informações a respeito desse tipo de atividade.
                </p>
                <p>
                    A começar pela administração das informações dos nossos principais beneficiados, o sistema
                    permitirá o cadastro dos animais resgatados a partir dos seguintes dados: nome do animal,
                    sexo, raça, idade aproximada, espécie, cor, porte, se possui ou não deficiências, vacinas,
                    vermífugos, castração, além de fotos e/ou vídeos do animal. Levando em consideração as técnicas
                    de e-commerce, o site deixa em destaque os animais que estão esperando para serem adotados e permite
                    que o usuário busque, por meio de filtros, o tipo de “pet” que melhor combinaria com sua personalidade e preferências.
                </p>
            </div>
        </div>
        <div class="sobreDir">
            <div class="paragrafo">
                <p>
                    Buscando também a proteção dos animais adotados, o sistema também trará a existência de um método
                    para que os funcionários do abrigo tenham acesso a informações e documentos daqueles que desejam
                    adotar, tais como: nome completo, RG, CPF, telefone, e-mail, endereço, tipo de residência e possíveis
                    preferências ou restrições, de forma a passar o pedido de adoção por um processo de análise para verificar
                    a compatibilidade do adotante com o animal escolhido, podendo, caso seja necessário, negar o seu pedido,
                    devido a uma incompatibilidade de requisitos.
                </p>
                <p>
                    Caso um usuário venha a ter seu pedido de adoção aceito, ele ainda deverá comparecer presencialmente no abrigo
                    de animais onde o animal se encontra, pois, apesar de inspirar-se em outros sistemas que tem como objetivo a
                    venda de produtos, não seria possível fazer entregas de animais de estimação, tendo em conta que essa prática
                    seria irresponsável, pois desconsidera a segurança do animal e dá margem para um possível abandono do animal,
                    que é exatamente o fator que o sistema busca diminuir.
                </p>
            </div>
            <img src="../assets/gato.jpg" class="fotoDir">
        </div>
    </div>


    <?php include '../menu/footer.php' ?>
</body>

</html>