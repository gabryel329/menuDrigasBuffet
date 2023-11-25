@extends('layouts.app')

@section('content')
    <section class="food_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Catálogo</h2>
            </div>

            <ul class="filters_menu" id="filtro-tipo">
                <li class="active" data-tipo="">Todos</li>
                <li data-tipo="1">Salgados</li>
                <li data-tipo="2">Doces</li>
                <li data-tipo="3">Tortas</li>
                <li data-tipo="4">Bolos</li>
            </ul>

            <div class="filters-content" id="lista-de-produtos">
                <!-- Aqui serão exibidos os produtos via AJAX -->
            </div>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        // Função para carregar a lista de produtos via AJAX com filtro por tipo
        function carregarProdutos(filtroTipo) {
            var url = '/produtos/lista';
            if (filtroTipo !== undefined && filtroTipo !== '') {
                url += '?tipo=' + filtroTipo;
            }

            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    exibirProdutos(response.produtos);
                },
                error: function(error) {
                    console.error('Erro ao obter a lista de produtos:', error);
                }
            });
        }

        // Função para exibir os produtos na página
        function exibirProdutos(produtos) {
            var listaDeProdutos = $('#lista-de-produtos');
            listaDeProdutos.empty();

            // Organizar produtos por tipo
            var produtosPorTipo = {};

            produtos.forEach(function(produto) {
                if (!produtosPorTipo[produto.tipo]) {
                    produtosPorTipo[produto.tipo] = [];
                }

                produtosPorTipo[produto.tipo].push(produto);
            });

            // Exibir produtos por tipo
            for (var tipo in produtosPorTipo) {
                if (produtosPorTipo.hasOwnProperty(tipo)) {
                    exibirTipo(tipo, produtosPorTipo[tipo]);
                }
            }
        }

        // Função para exibir produtos de um determinado tipo
        function exibirTipo(tipo, produtos) {
            var listaDeProdutos = $('#lista-de-produtos');
            listaDeProdutos.append('<div class="tipo-separator"><br><h2>Tipo ' + tipo + '</h2></div>');

            // Initialize the HTML string with the opening <div class="row">
            var htmlString = '<div class="row">';

            // Loop through each product and add the corresponding HTML
            produtos.forEach(function (produto) {
                htmlString += '<div class="col-sm-2 col-lg-3">' +
                    '<div class="box">' +
                    '<div>' +
                    '<div class="img-box">' +
                    '<img style="border-radius: 50%;" width="150" height="150" ' +
                    'src="{{ asset("images/") }}/' + produto.imagem + '" ' +
                    'alt="' + produto.nome + '" ' +
                    'onclick="aplicarZoomNaImagem(this)" ' +
                    'onmouseout="removerZoomNaImagem(this)">' +
                    '</div>' +
                    '<div class="detail-box">' +
                    '<h5>' +
                    '<strong>' + produto.nome + '</strong>' +
                    '</h5>' +
                    '<div class="options">' +
                    '<h6>R$ ' + produto.preco + '</h6>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
            });

            // Close the row after the loop
            htmlString += '</div>';

            // Append the entire HTML string to listaDeProdutos
            listaDeProdutos.append(htmlString);


        }

        function aplicarZoomNaImagem(imagem) {
            imagem.style.transform = 'scale(1.5)'; // Zoom de 1.5x (ajuste conforme necessário)
            imagem.style.transition = 'transform 0.3s ease'; // Adiciona uma transição suave para o efeito de zoom
        }

        // Função para remover o zoom da imagem
        function removerZoomNaImagem(imagem) {
            imagem.style.transform = 'scale(1)'; // Retorna ao tamanho original
        }

        // Carregar a lista de produtos quando a página carregar
        $(document).ready(function() {
            // Inicializar com filtro vazio (todos os tipos)
            carregarProdutos('');

            // Adicionar evento de clique nos botões de filtro
            $('.filters_menu li').click(function() {
                // Remover a classe 'active' de todos os botões
                $('.filters_menu li').removeClass('active');

                // Adicionar a classe 'active' ao botão clicado
                $(this).addClass('active');

                // Obter o tipo associado ao botão clicado
                var tipoSelecionado = $(this).data('tipo');

                // Carregar produtos com o tipo selecionado
                carregarProdutos(tipoSelecionado);
            });
        });
    </script>
@endsection
