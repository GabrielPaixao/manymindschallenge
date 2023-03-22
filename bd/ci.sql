-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Mar-2023 às 19:20
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ci`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaboradores`
--

CREATE TABLE `colaboradores` (
  `id` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cpf` varchar(100) NOT NULL,
  `matricula` varchar(100) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `data_cadastro` date NOT NULL,
  `ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `colaboradores`
--

INSERT INTO `colaboradores` (`id`, `id_usuario`, `email`, `cpf`, `matricula`, `cep`, `endereco`, `municipio`, `estado`, `data_cadastro`, `ativo`) VALUES
(1, 1, 'le.paixao444SS4@gmail.com', '549.999.999-99', '', '21040-080', 'Rua Romero Zander', 'Rio de Janeiro', 'RJ', '2023-03-01', 1),
(8, 3, 'gabriel.passion@gmail.com', '871.373.610-80', '3234234234', '22', 'Rua 22', 'Cabo Frio', 'RJ', '2023-03-21', 1),
(9, 2, 'gabriel.passiodn@gmail.com', '095.991.987-27', '', '2234', 'Rua 22', 'Cabo Frio', 'RJ', '2023-03-21', 1),
(10, 4, 'gabriel.passion2@gmail.com', '123.456.789-89', '', '22', 'Rua 22', 'Cabo Frio', 'RJ', '2023-03-21', 0),
(15, 5, 'gabriel.pa343ssion@gmail.com', '343.433.333-33', '344qwe', '22666', 'Rua 22', 'Cabo Frio', 'RJ', '2023-03-22', 1),
(16, 6, 'gabrie555l.passion@gmail.com', '506.753.467-20', '3234234234', '22', 'Rua 22', 'Cabo Frio', 'RJ', '2023-03-22', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `ativo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `id_usuario`, `telefone`, `ativo`) VALUES
(1, 4, '22 99277-0325', 1),
(2, 6, '22 99277-0325', 1),
(3, 2, '22 99277-0325', 1),
(4, 3, '22 99277-0325', 1),
(5, 5, '22 99277-0325', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(10) NOT NULL,
  `id_fornecedor` int(10) NOT NULL,
  `observacao` text NOT NULL,
  `valor_total` varchar(100) NOT NULL,
  `data_pedido` date NOT NULL,
  `ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_fornecedor`, `observacao`, `valor_total`, `data_pedido`, `ativo`) VALUES
(1, 3, 'Teste2', '365.00', '2023-03-15', 1),
(5, 4, 'ASDASD', '', '2023-03-22', 1),
(6, 3, 'asdad', '', '2023-03-22', 1),
(7, 1, 'asdas', '', '2023-03-22', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos_produtos`
--

CREATE TABLE `pedidos_produtos` (
  `id` int(10) NOT NULL,
  `id_pedido` int(10) NOT NULL,
  `id_produto` int(10) NOT NULL,
  `quantidade` int(10) NOT NULL,
  `total` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedidos_produtos`
--

INSERT INTO `pedidos_produtos` (`id`, `id_pedido`, `id_produto`, `quantidade`, `total`) VALUES
(2, 1, 4, 1, ''),
(6, 5, 3, 3, ''),
(7, 5, 2, 3, ''),
(17, 1, 1, 2, ' 6.846'),
(20, 1, 1, 1, '23.42'),
(21, 1, 1, 1, ' 3.423');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `preco` varchar(100) NOT NULL,
  `ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`, `ativo`) VALUES
(1, 'teste2', 'asda2', '3423.42', 1),
(2, 'Tesoura', 'A tesoura é um instrumento composto por duas lâminas unidas por um eixo que, quando pressionadas, se juntam para cortar determinados tipos de materiais.', '2342.34', 1),
(3, 'Ar Condicionado', 'Mini Ar Condicionado Umidificador Climatizador Portátil Usb Luz Led Pessoal Mesa Escritório', '4454.32', 1),
(4, 'Jogos vorazes', 'Na abertura dos Jogos Vorazes, a organização não recolhe os corpos dos combatentes caídos e dá tiros de canhão até o final. Cada tiro, um morto. Onze tiros no primeiro dia. Treze jovens restaram, entre eles, Katniss. Para quem os tiros de canhão serão no dia seguinte?', '342.34', 1),
(5, 'Teclado Master', 'asdasd', '9879879879879.87', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `data_cadastro` date NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `senha`, `data_cadastro`, `token`) VALUES
(1, 'Gabriel Paixão 2', 'gabriel.passion@gmail.com', '9ac20922b054316be23842a5bca7d69f29f69d77', '2023-03-19', '60b3cf48491c3507b0abd3cfcf7967bf'),
(2, 'Martins', 'martins', 'asdasd', '2023-03-10', ''),
(3, 'Bernardo', 'ben', 'asd', '2023-03-07', ''),
(4, 'Jhonson', 'ben', 'asd', '2023-03-07', ''),
(5, 'Marcelus', 'ben', 'asd', '2023-03-07', ''),
(6, 'Ketness', 'ben', 'asd', '2023-03-07', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `fk_id_usuario` (`id_usuario`);

--
-- Índices para tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_usuario_fornecedor` (`id_usuario`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_fornecedor_pedido` (`id_fornecedor`);

--
-- Índices para tabela `pedidos_produtos`
--
ALTER TABLE `pedidos_produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_pedido_pedido` (`id_pedido`),
  ADD KEY `fk_id_produto_produto` (`id_produto`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `colaboradores`
--
ALTER TABLE `colaboradores`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `pedidos_produtos`
--
ALTER TABLE `pedidos_produtos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION;

--
-- Limitadores para a tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD CONSTRAINT `fk_id_usuario_fornecedor` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION;

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_id_fornecedor_pedido` FOREIGN KEY (`id_fornecedor`) REFERENCES `fornecedores` (`id`) ON DELETE NO ACTION;

--
-- Limitadores para a tabela `pedidos_produtos`
--
ALTER TABLE `pedidos_produtos`
  ADD CONSTRAINT `fk_id_pedido_pedido` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_id_produto_produto` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
