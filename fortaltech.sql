-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Maio-2023 às 00:09
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fortaltech`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cartao`
--

CREATE TABLE `cartao` (
  `id_cartao` int(11) NOT NULL,
  `id_cliente` bigint(20) UNSIGNED NOT NULL,
  `num_cartao` varchar(100) NOT NULL,
  `nome_titular` varchar(200) NOT NULL,
  `validade` varchar(5) NOT NULL,
  `cvv` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nome`, `created_at`, `updated_at`) VALUES
(1, 'celular', '2023-02-22 20:22:29', '2023-02-22 20:22:29'),
(2, 'notebook', '2023-03-05 23:49:27', '2023-03-05 23:49:27'),
(3, 'tv', '2023-03-06 00:04:51', '2023-03-06 00:04:51'),
(4, 'pc', '2023-03-06 00:20:38', '2023-03-06 00:20:38'),
(5, 'Kindle', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome`, `email`, `senha`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'luis', 'luis@gmail.com', '123456', '2023-02-23 04:53:40', '2023-02-23 04:53:40', '0HitSW8SddDvBu2unbDD5DzGJTXBIOPiBg10N45Krt7SOKKyHZJPZJMz5VOk'),
(2, 'j', 'j@gmail.com', '123456', '2023-02-23 05:32:01', '2023-02-23 05:32:01', NULL),
(3, 'João', 'joao@gmail.com', '123456', '2023-02-23 05:39:14', '2023-02-23 05:39:14', NULL),
(5, 'Luis', 'luish@gmail.com', '123456', '2023-02-27 05:52:43', '2023-02-27 05:52:43', 'I3zCKNc68068VnmIMqbc6VV4ytwA1VkqxupDSep4zxqDB4WQPymoRjofeZuw'),
(6, 'aa', 'aa@gmail.com', '123456', '2023-03-06 01:54:48', '2023-03-06 01:54:48', NULL),
(7, 'marlinho', 'marlon@gmail.com', '123456', '2023-03-06 13:29:17', '2023-03-06 13:29:17', NULL),
(8, 'Regina Pereira', 'regina@gmail.com', '123456', '2023-03-06 16:08:45', '2023-03-06 16:08:45', NULL),
(9, 'Marlon', 'matheus@gmail.com', '123456', '2023-03-06 16:10:24', '2023-03-06 16:10:24', NULL),
(10, 'Tomé', 'tome1@gmail.com', '123456', '2023-03-06 16:12:50', '2023-03-06 16:12:50', NULL),
(11, 'Marlon', 'marlonmateus2@gmail.com', '123456', NULL, NULL, NULL),
(12, 'Luis', 'luishenrique@gmail.com', '123456', NULL, NULL, NULL),
(13, 'Regina Pereira', 'reginaneta2@gmail.com', '123456', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL,
  `id_cliente` bigint(20) UNSIGNED NOT NULL,
  `estado` varchar(200) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `rua` varchar(200) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `num_casa` int(11) NOT NULL,
  `cep` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `estoque` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `detalhes_tec` text NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `id_categoria` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome`, `estoque`, `valor`, `detalhes_tec`, `img_url`, `marca`, `id_categoria`, `created_at`, `updated_at`) VALUES
(1, 'Smartphone Motorola Moto G32 4G 128GB 4GB RAM Preto', 20, '1139.00', 'Sistema operacional:	‎Android 12\r\nRAM:	‎4 GB\r\nCapacidade de armazenamento da memória:	‎128 GB\r\nTamanho da memória RAM instalada:	‎4 GB\r\nTamanho de tela vertical	‎6.5 Polegadas\r\nTecnologia da tela	‎LCD\r\nResolução	‎2400 x 1080 Pixels\r\nPorta de áudio	‎USB-C\r\nCor	‎Preto\r\nClassificação de potência da bateria ou pilha	‎5000\r\nDimensões do produto	‎0.85 x 7.38 x 16.18 cm; 180 g', 'Smartphone Motorola Moto G32 4G 128GB 4GB RAM Preto.jpg', 'Motorola', 1, '2023-02-22 20:22:45', '2023-02-22 20:22:45'),
(2, 'Notebook HP Intel Core i3 8GB 256GB SSD 15,6” - Windows 11', 24, '2417.08', 'Marca 	‎HP\r\nFabricante 	‎HP\r\nSérie 	‎HP 256 G8\r\nCor 	‎preto\r\nTamanho de tela vertical 	‎15.6\r\nMarca do processador 	‎Intel\r\nTipo de processador 	‎Intel Core i3\r\nVelocidade do processador 	‎3\r\nNúmero de processadores 	‎1\r\nTamanho da memória 	‎8 GB\r\nTecnologia da memória 	‎DDR4\r\nMáximo de memória compatível 	‎16 GB\r\nVelocidade do relógio de memória 	‎1600 MHz\r\nTamanho do HD 	‎256\r\nInterface do HD 	‎Solid State\r\nDetalhes do áudio 	‎Alto-falantes\r\nMarca do chipset de vídeo 	‎Intel\r\nDescrição da placa de vídeo 	‎Intel® UHD Graphics\r\nTipo de memória de vídeo 	‎DDR4 SDRAM\r\nInterface da placa de vídeo 	‎Integrado\r\nTecnologia de conexão 	‎USB, Ethernet\r\nNúmero de portas USB 3.0 	‎3\r\nPotência em watts 	‎40 watts\r\nFonte de alimentação 	‎HP Smart 45 W External AC power adapter\r\nSistema operacional 	‎Windows Home SL\r\nPilhas ou baterias inclusas 	‎Sim\r\nConteúdo de energia da bateria de lítio 	‎41 Watt-hora\r\nPacote da bateria de lítio 	‎Pilhas contidas no equipamento\r\nNúmero de células ou pilhas de íon de lítio 	‎3\r\nNúmero de unidades 	‎1\r\nPeso do produto 	‎190 g\r\nDimensões da embalagem 	‎52 x 30 x 7.3 cm; 190 g\r\nPilha(s) ou bateria(s): 	‎1 Íon de lítio baterias ou pilhas necessárias (inclusas).\r\nReferência do fabricante 	‎613G3LA\r\nFunciona a bateria ou pilha? 	‎Sim\r\nEAN 	‎0196337776142 ', 'Notebook HP Intel Core i3 8GB 256GB SSD 15,6 - Windows 11.jpg', 'HP', 2, '2023-03-05 23:50:07', '2023-03-05 23:50:07'),
(3, 'Samsung Book Core i5-1135G7, 8G, 256GB SSD, Iris Xe, 15.6 FHD, W11 Cinza', 32, '2864.70', 'Marca 	‎SAMSUNG\r\nFabricante 	‎Samsung\r\nSérie 	‎Notebook Book 2\r\nCor 	‎Cinza\r\nAltura do produto 	‎7 centímetros\r\nLargura do produto 	‎50 centímetros\r\nTamanho de tela vertical 	‎15.6 Polegadas\r\nResolução da tela 	‎1920 x 1080 pixels\r\nMarca do processador 	‎Intel\r\nTipo de processador 	‎Intel Core i5-1135G7\r\nVelocidade do processador 	‎2.4 GHz\r\nNúmero de processadores 	‎1\r\nTamanho da memória externa 	‎8 GB\r\nTamanho da memória 	‎8 GB\r\nTecnologia da memória 	‎256 GB SSD NVMe\r\nMáximo de memória compatível 	‎8 GB\r\nVelocidade do relógio de memória 	‎2400 MHz\r\nTecnologia do HD 	‎8GB\r\nInterface do HD 	‎Solid State\r\nDetalhes do áudio 	‎Fones de ouvido, Alto-falantes\r\nModelo de placa de vídeo 	‎Intel Iris\r\nMarca do chipset de vídeo 	‎Intel® Iris® Xe Graphics\r\nDescrição da placa de vídeo 	‎Integrado\r\nTipo de memória de vídeo 	‎DDR DRAM\r\nInterface da placa de vídeo 	‎Integrado\r\nTipo de conexão 	‎Bluetooth, Wi-fi\r\nTecnologia de conexão 	‎Bluetooth, Wi-Fi, USB, Ethernet, HDMI\r\nPadrão de conexão sem fio 	‎Frequência de rádio de 2.4 GHz, 802.11ac\r\nNúmero de portas USB 2.0 	‎2\r\nNúmero de portas USB 3.0 	‎1\r\nVoltagem 	‎110 Volts, 220 Volts\r\nEtiqueta Nacional de Eficiência Energética (ENCE) 	‎A+\r\nDispositivo de armazenamento óptico 	‎DVD-RAM\r\nFonte de alimentação 	‎Bivolt (100-240V)\r\nSistema operacional 	‎Windows 11\r\nMédia de duração da bateria (em horas) 	‎8 Horas\r\nPilhas ou baterias inclusas 	‎Sim\r\nConteúdo de energia da bateria de lítio 	‎43 Watt-hora\r\nPacote da bateria de lítio 	‎Pilhas contidas no equipamento\r\nNúmero de células ou pilhas de íon de lítio 	‎3\r\nNúmero de unidades 	‎1\r\nPeso do produto 	‎2.8 kg\r\nDimensões do produto 	‎30 x 50 x 7 cm; 2.8 Quilogramas\r\nPilha(s) ou bateria(s): 	‎1 Íon de lítio baterias ou pilhas necessárias (inclusas).\r\nNúmero do modelo 	‎NP550XDA-KH2BR\r\nDescontinuado pelo fabricante 	‎Não\r\nFunciona a bateria ou pilha? 	‎Sim\r\nEAN 	‎7892509120784 ', 'Samsung Book Core i5-1135G7, 8G, 256GB SSD, Iris Xe, 15.6 FHD, W11 Cinza.jpg', 'Samsung', 2, '2023-03-06 00:00:38', '2023-03-06 00:00:38'),
(4, 'Notebook Dell Inspiron Full HD 11ª Geração Intel Core i5 16GB 512GB SSD Win Prata', 28, '4619.00', 'Marca 	‎Dell\r\nFabricante 	‎Dell Computers\r\nTamanho de tela vertical 	‎15.6 Polegadas\r\nResolução da tela 	‎1920 x 1080 pixels\r\nResolução 	‎1920 x 1080 Pixels\r\nMarca do processador 	‎Intel\r\nTipo de processador 	‎Intel Core i5\r\nVelocidade do processador 	‎4.2 GHz\r\nNúmero de processadores 	‎1\r\nTamanho da memória externa 	‎512 GB\r\nTamanho da memória 	‎8 GB\r\nTipo de Memória 	‎DDR DRAM\r\nVelocidade do relógio de memória 	‎2666 MHz\r\nTamanho do HD 	‎512 GB\r\nTecnologia do HD 	‎SSD\r\nInterface do HD 	‎PCIE x 4\r\nModelo de placa de vídeo 	‎Intel® Iris® Xe com memória gráfica compartilhada\r\nMarca do chipset de vídeo 	‎Intel\r\nTipo de conexão 	‎Bluetooth, Wi-fi\r\nTecnologia de conexão 	‎Bluetooth, USB\r\nPadrão de conexão sem fio 	‎Bluetooth, 802.11ac\r\nPotência em watts 	‎54 watts\r\nPlataforma de hardware 	‎PC\r\nConteúdo de energia da bateria de lítio 	‎54 Watt-hora\r\nNúmero do modelo 	‎i15-i1100-M58S\r\nEAN 	‎7899864945311 ', 'Notebook Dell Inspiron i15-i1100-M58S 15.6 Full HD 11ª Geração Intel Core i5 16GB 512GB SSD Win Prata.jpg', 'Dell', 2, '2023-03-06 00:15:18', '2023-03-06 00:15:18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id_venda` bigint(20) UNSIGNED NOT NULL,
  `id_produto` bigint(20) UNSIGNED NOT NULL,
  `id_cliente` bigint(20) UNSIGNED NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor_unitario` decimal(10,2) NOT NULL,
  `valor_total` decimal(10,2) NOT NULL,
  `status` enum('pendente','concluido','cancelado') NOT NULL,
  `data_venda` date NOT NULL,
  `data_entrega` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id_venda`, `id_produto`, `id_cliente`, `quantidade`, `valor_unitario`, `valor_total`, `status`, `data_venda`, `data_entrega`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, '2417.08', '2417.08', 'pendente', '2023-05-12', '2023-05-19', NULL, NULL),
(2, 4, 1, 1, '4619.00', '4619.00', 'pendente', '2023-05-12', '2023-05-19', NULL, NULL),
(3, 3, 1, 1, '2864.70', '2864.70', 'pendente', '2023-05-12', '2023-05-19', NULL, NULL),
(4, 3, 1, 1, '2864.70', '2864.70', 'pendente', '2023-05-12', '2023-05-19', NULL, NULL),
(5, 2, 1, 1, '2417.08', '2417.08', 'pendente', '2023-05-12', '2023-05-19', NULL, NULL),
(6, 2, 1, 1, '2417.08', '2417.08', 'pendente', '2023-05-12', '2023-05-19', NULL, NULL),
(7, 2, 1, 1, '2417.08', '2417.08', 'pendente', '2023-05-12', '2023-05-19', NULL, NULL),
(8, 2, 1, 1, '2417.08', '2417.08', 'pendente', '2023-05-12', '2023-05-19', NULL, NULL),
(9, 2, 1, 1, '2417.08', '2417.08', 'pendente', '2023-05-12', '2023-05-19', NULL, NULL),
(10, 3, 1, 1, '2864.70', '2864.70', 'pendente', '2023-05-15', '2023-05-22', NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cartao`
--
ALTER TABLE `cartao`
  ADD PRIMARY KEY (`id_cartao`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `clientes_email_unique` (`email`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `produtos_id_categoria_foreign` (`id_categoria`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `vendas_id_produto_foreign` (`id_produto`),
  ADD KEY `vendas_id_cliente_foreign` (`id_cliente`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cartao`
--
ALTER TABLE `cartao`
  MODIFY `id_cartao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id_venda` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cartao`
--
ALTER TABLE `cartao`
  ADD CONSTRAINT `cartao_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  ADD CONSTRAINT `vendas_id_produto_foreign` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id_produto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
