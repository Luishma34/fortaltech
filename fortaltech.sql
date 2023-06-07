-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: fortaltech
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cartao`
--

DROP TABLE IF EXISTS `cartao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cartao` (
  `id_cartao` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` bigint(20) unsigned NOT NULL,
  `num_cartao` varchar(100) NOT NULL,
  `nome_titular` varchar(200) NOT NULL,
  `validade` varchar(5) NOT NULL,
  `cvv` text NOT NULL,
  PRIMARY KEY (`id_cartao`),
  KEY `id_cliente` (`id_cliente`),
  CONSTRAINT `cartao_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cartao`
--

LOCK TABLES `cartao` WRITE;
/*!40000 ALTER TABLE `cartao` DISABLE KEYS */;
INSERT INTO `cartao` VALUES (1,1,'193729','LUIS H S SILVA','05/29','218'),(2,15,'a','a','02/28','123'),(3,16,'s','s','08/30','092'),(4,17,'1','q','01/24','098'),(5,18,'9','w','01/24','283');
/*!40000 ALTER TABLE `cartao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id_cliente` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `clientes_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'luis','luis@gmail.com','123456'),(3,'João','joao@gmail.com','123456'),(5,'Luis','luish@gmail.com','123456'),(7,'marlinho','marlon@gmail.com','123456'),(8,'Regina Pereira','regina@gmail.com','123456'),(9,'Marlon','matheus@gmail.com','123456'),(10,'Tomé','tome1@gmail.com','123456'),(11,'Marlon','marlonmateus2@gmail.com','123456'),(13,'Regina Pereira','reginaneta2@gmail.com','123456'),(14,'admin','admin@admin.com','123456'),(15,'Henrique','henrique2@gmail.com','123456'),(16,'Marlon','marlon3@gmail.com','123456'),(17,'Letícia','leticia@gmail.com','123456'),(18,'Luis Henrique','luishenrique@gmail.com','123456');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` bigint(20) unsigned NOT NULL,
  `estado` varchar(200) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `rua` varchar(200) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `num_casa` int(11) NOT NULL,
  `cep` varchar(9) NOT NULL,
  PRIMARY KEY (`id_endereco`),
  KEY `id_cliente` (`id_cliente`),
  CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endereco`
--

LOCK TABLES `endereco` WRITE;
/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` VALUES (1,1,'Bahia','Salvador','a','a',210,'18472-000'),(3,15,'Acre','a','a','a',0,'a'),(4,16,'Alagoas','a','a','a',0,'a'),(5,17,'Amapá','a','a','a',0,'a'),(6,18,'Bahia','q','q','q',0,'q');
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produtos` (
  `id_produto` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estoque` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `detalhes_tec` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (7,'HAYLOU Solar Plus RT3 Smartwatch, 1.43 \"AMOLED Display Bluetooth Telefone Chamada Relógio Inteligente para Homens e Mulheres, Exibição Sempre Ativa, Monitor de Saúde, Bluetooth 5.3',39,300.00,'Marca 	‎HAYLOU\r\nFabricante 	‎HAYLOU\r\nNome do modelo 	‎LS16\r\nCertificação 	‎IP68\r\nNúmero da peça 	‎QLW9214\r\nPeças para montagem 	‎Smartwatch, Charge Cable, User Manual\r\nNúmero de unidades 	‎1\r\nTipo de fonte de energia 	‎electric\r\nBaterias inclusas 	‎Sim\r\nFunciona com baterias 	‎Sim\r\nPadrão de conexão sem fio 	‎Bluetooth\r\nTecnologia de conexão 	‎Bluetooth\r\nEntrada de usuário 	‎Botões\r\nBateria recarregável 	‎Sim\r\nConexões 	‎Bluetooth\r\nGarantia do fabricante 	‎1 Year\r\nPeso do produto 	‎1 g\r\nReferência do fabricante 	‎QLW9214\r\nEAN 	‎6971664933406, 7644122207256\r\nDimensões do produto 	‎16 x 10 x 3 cm; 1 g','647e4cc6c5847.jpg','HAYLOU'),(8,'Notebook ASUS M515DA-BR1213W AMD RYZEN 5 3500U / 8 GB / 256 GB/Windows 11 Home/Cinza',49,2900.00,'Marca 	‎ASUS\r\nFabricante 	‎ASUS\r\nSérie 	‎M515DA-BR1213W\r\nCertificação 	‎Não aplicável\r\nCor 	‎Cinza\r\nFormato 	‎Compacto\r\nAltura do produto 	‎1,99 centímetros\r\nLargura do produto 	‎23,53 centímetros\r\nTamanho de tela vertical 	‎15.6\r\nResolução 	‎1366 x 768 Pixels\r\nMarca do processador 	‎AMD\r\nTipo de processador 	‎AMD Ryzen 5 5600X\r\nVelocidade do processador 	‎2,1 GHz\r\nNúmero de processadores 	‎1\r\nTamanho da memória externa 	‎256 GB\r\nTamanho da memória 	‎8 GB\r\nTecnologia da memória 	‎DDR4\r\nMáximo de memória compatível 	‎8 GB\r\nTamanho do HD 	‎256 GB\r\nTecnologia do HD 	‎SSD\r\nDescrição do alto-falante 	‎Sonic Master 2 x Speakers\r\nModelo de placa de vídeo 	‎AMD Radeon Vega 8\r\nMarca do chipset de vídeo 	‎AMD\r\nDescrição da placa de vídeo 	‎Integrado\r\nTipo de memória de vídeo 	‎Shared\r\nMemória de vídeo 	‎4 GB\r\nInterface da placa de vídeo 	‎Integrado\r\nTipo de conexão 	‎Bluetooth, Wi-fi\r\nTecnologia de conexão 	‎Wi-Fi, USB, HDMI\r\nPadrão de conexão sem fio 	‎Bluetooth, 801.11ac\r\nNúmero de portas USB 2.0 	‎2\r\nEtiqueta Nacional de Eficiência Energética (ENCE) 	‎2 Cells / 3300 mAh\r\nPotência em watts 	‎65 watts\r\nFonte de alimentação 	‎Energia elétrica\r\nSistema operacional 	‎Windows 11 Home\r\nNúmero de unidades 	‎1\r\nPeso do produto 	‎2,2 Kilograms\r\nDimensões do produto 	‎36 x 23,53 x 1,99 cm; 2,2 Quilogramas\r\nNúmero do modelo 	‎M515DA-BR1213W\r\nFunciona a bateria ou pilha? 	‎Não\r\nEAN 	‎7898573298367','647e4d5b65860.jpg','ASUS'),(9,'Notebook Lenovo IdeaPad 3i i7-1165G7 16GB 512GB SSD Placa de Vídeo Intel Iris® Xe Windows 11 15.6',68,4300.00,'Marca 	‎Lenovo\r\nFabricante 	‎Lenovo\r\nSérie 	‎IdeaPad 3i\r\nCertificação 	‎Não aplicável\r\nFormato 	‎Compacto\r\nTamanho de tela vertical 	‎15.6\r\nResolução da tela 	‎1920 x 1080 pixels\r\nResolução 	‎1920 x 1080\r\nMarca do processador 	‎Intel\r\nTipo de processador 	‎Core i7 Family\r\nVelocidade do processador 	‎1\r\nNúmero de processadores 	‎1\r\nTamanho da memória 	‎16 GB\r\nTecnologia da memória 	‎DDR4\r\nMáximo de memória compatível 	‎16 GB\r\nTamanho do HD 	‎512 GB\r\nTecnologia do HD 	‎SSD\r\nInterface do HD 	‎PCIE x 2\r\nDetalhes do áudio 	‎Alto-falantes\r\nMarca do chipset de vídeo 	‎Intel\r\nDescrição da placa de vídeo 	‎Integrado\r\nTipo de memória de vídeo 	‎Shared\r\nInterface da placa de vídeo 	‎Integrado\r\nTipo de conexão 	‎Wi-fi\r\nTecnologia de conexão 	‎USB\r\nNúmero de portas USB 3.0 	‎1\r\nEtiqueta Nacional de Eficiência Energética (ENCE) 	‎A+, B, 85%\r\nPotência em watts 	‎65 watts\r\nDispositivo de armazenamento óptico 	‎Não aplicável\r\nFonte de alimentação 	‎Não aplicável\r\nSistema operacional 	‎Windows\r\nConteúdo de energia da bateria de lítio 	‎38 Watt-hora\r\nNúmero de unidades 	‎1\r\nPeso do produto 	‎1,9 Kilograms\r\nDimensões da embalagem 	‎30 x 30 x 30 cm; 1,9 Quilogramas\r\nFunciona a bateria ou pilha? 	‎Não\r\nEAN 	‎0196119292433','647e4dd236563.jpg','Lenovo'),(10,'Fone de Ouvido Bluetooth Sem Fio TWS Air PRO Go i2GO com Estojo de Carregamento - i2GO PRO',96,140.00,'Marca 	‎I2GO\r\nFabricante 	‎i2GO\r\nModelo 	‎PROEAR010\r\nNome do modelo 	‎i2GO PRO\r\nCertificação 	‎Não aplicavel\r\nNúmero da peça 	‎PROEAR010\r\nTipo Do Produto 	‎Eletrônicos\r\nAparelhos compatíveis 	‎Todos\r\nCaracterísticas especiais 	‎Fone de Ouvido Bluetooth sem fio\r\nPeças para montagem 	‎1 Par de Fones de Ouvido Bluetooth TWS + 1 Estojo Carregador + Cabo USB-C + 2 Paredes de Silicones Intra-auriculares + Manual de Instruções\r\nNúmero de unidades 	‎1\r\nFator de forma do fone de ouvido 	‎Dentro da orelha\r\nEtiqueta Nacional de Eficiência Energética (ENCE) 	‎não possui\r\nTipo de fonte de energia 	‎Energia elétrica\r\nFunciona com baterias 	‎Não\r\nCaracterística de cabo ou fio 	‎Sem cabo\r\nTecnologia de conexão 	‎Sem fio\r\nCor 	‎Preto\r\nCor correspondente 	‎Preto\r\nConexões 	‎Sem fio Bluetooth\r\nDistância focal máxima 	‎USB tipo C\r\nImpedância 	‎16 Ohm\r\nGarantia do fabricante 	‎1 ano de garantia\r\nPeso do produto 	‎110 g\r\nNúmero do modelo 	‎PROEAR010\r\nEAN 	‎7898647787070\r\nDimensões do produto 	‎3 x 6 x 13 cm; 110 g','647e4e38bdaa6.jpg','I2GO'),(11,'Smartphone Samsung Galaxy A34 5g Dual 128 Gb Preto 6 Gb Ram',78,1600.00,'Memória interna: 128 GB\r\n\r\nCâmera traseira principal: 48 Mpx\r\n\r\nCom NFC: Sim\r\n\r\nCâmera frontal principal: 13 Mpx\r\n\r\nDesbloqueio: Impressão digital e reconhecimento facial\r\nCaracterísticas gerais\r\nMarca\r\n	Samsung\r\nLinha\r\n	Galaxy A\r\nModelo\r\n	A34 5G Dual SIM\r\nVersões\r\n	SM-A346M/DSN\r\nSistema operacional\r\nNome do sistema operacional\r\n	Android\r\nCamada original de personalização do sistema operacional\r\n	One UI\r\nConectividade\r\nRede\r\n	5G\r\nTipo de conector de carregamento\r\n	USB-C\r\nCom conector USB\r\n	Sim\r\nCom Wi-Fi\r\n	Sim\r\nCom GPS\r\n	Sim\r\nCom Bluetooth\r\n	Sim\r\nCom NFC\r\n	Sim\r\nCom radio\r\n	Sim\r\nCâmera\r\nResolução da câmera traseira principal\r\n	48 Mpx\r\nResolução de vídeo da câmera traseira\r\n	3840 px x 2160 px\r\nResolução da câmera frontal principal\r\n	13 Mpx\r\nCaracterísticas principais das câmeras\r\n	Autoenfoque,Câmara lenta\r\nResolução das câmeras traseiras\r\n	48 Mpx/8 Mpx/5 Mpx\r\nAbertura do diafragma da câmera traseira\r\n	f 1.8/f 2.2/f 2.4\r\nAbertura do diafragma da câmera frontal\r\n	f 2.2\r\nQuantidade de câmeras traseiras\r\n	3\r\nQuantidade de câmeras frontais\r\n	1\r\nZoom digital\r\n	10x\r\nCom câmera\r\n	Sim\r\nCom flash na câmara frontal\r\n	Não\r\nSeguridade\r\nCom leitor de impressão digital\r\n	Sim\r\nCom reconhecimento facial\r\n	Sim\r\nPeso e dimensões\r\nPeso\r\n	199 g\r\nAltura x Largura x Profundidade\r\n	161.3 mm x 78.1 mm x 8.2 mm\r\nSensores\r\nCom acelerômetro\r\n	Sim\r\nCom sensor de proximidade\r\n	Sim\r\nCom giroscópio\r\n	Sim\r\nCom bússola\r\n	Sim\r\nCartão SIM\r\nÉ Dual SIM\r\n	Sim\r\nTamanhos de cartão SIM compatíveis\r\n	Nano-SIM\r\nQuantidade de ranhuras para cartão SIM\r\n	2\r\nMemória\r\nMemória interna\r\n	128 GB\r\nMemória RAM\r\n	6 GB\r\nTipos de cartão de memória\r\n	Micro-SD\r\nCapacidade máxima do cartão de memória\r\n	1 TB\r\nCom ranhura para cartão de memória\r\n	Sim\r\nProcessador\r\nModelo do processador\r\n	MediaTek Dimensity 1080\r\nVelocidade do processador\r\n	2.6 GHz\r\nQuantidade de núcleos do processador\r\n	8\r\nEspecificações\r\nHomologação Anatel Nº\r\n	219902200953\r\nTela\r\nTamanho da tela\r\n	6.6 \"\r\nTipo de resolução da tela\r\n	Full HD+\r\nResolução da tela\r\n	1080 px x 2340 px\r\nTecnologia da tela\r\n	Super AMOLED\r\nPixels por polegada da tela\r\n	390 ppi\r\nTaxa de atualização da tela\r\n	120 Hz\r\nBrilho máximo da tela\r\n	1000 cd/m²\r\nTaxa de atualização da tela secundária\r\n	120 Hz\r\nCom tela tátil\r\n	Sim\r\nBateria\r\nCapacidade da bateria\r\n	5000 mAh\r\nAutonomia de conversação\r\n	35 h\r\nCom carregamento rápido\r\n	Sim\r\nCom carregamento sem fio\r\n	Não\r\nCom bateria removível\r\n	Não\r\nDesign e resistência\r\nClassificação IP\r\n	IP67\r\nCom teclado QWERTY físico\r\n	Não\r\nÉ resistente à água\r\n	Sim\r\nÉ resistente ao pó\r\n	Sim\r\nOutros\r\nCom IMEI\r\n	Sim\r\nOperadora\r\n	Desbloqueado\r\nAcessórios incluídos\r\n	Cabo USB,Carregador,Extrator de Chip,Manual do usuário\r\nResolução da câmera grande-angular\r\n	8 Mpx','647e4f6736088.webp','Samsung'),(12,'Celular Samsung Galaxy A54 5g, 256gb, 8gb Ram Branco',30,2282.00,'Características gerais\r\nMarca\r\n	Samsung\r\nLinha\r\n	Galaxy A\r\nModelo\r\n	A54 5G Dual SIM\r\nCor\r\n	Branco\r\nVersões\r\n	SM-A546V, SM-A546U, SM-A546U1, SM-A546B, SM-A546B/DS, SM-A546E, SM-A546E/DS, SM-A5460\r\nSistema operacional\r\nNome do sistema operacional\r\n	Android\r\nVersão original do sistema operacional\r\n	12\r\nCamada original de personalização do sistema operacional\r\n	One UI 5\r\nConectividade\r\nRede\r\n	5G\r\nTipo de conector de carregamento\r\n	USB-C\r\nCom conector USB\r\n	Sim\r\nCom conector jack 3.5 mm\r\n	Não\r\nCom Wi-Fi\r\n	Sim\r\nCom GPS\r\n	Sim\r\nCom Bluetooth\r\n	Sim\r\nCom NFC\r\n	Sim\r\nCom radio\r\n	Não\r\nCom sintonizador de TV\r\n	Não\r\nCâmera\r\nResolução da câmera traseira principal\r\n	50 Mpx\r\nResolução de vídeo da câmera traseira\r\n	3840 px x 2160 px\r\nResolução da câmera frontal principal\r\n	32 Mpx\r\nCaracterísticas principais das câmeras\r\n	Autoenfoque, Câmara lenta, Modo noite, PDAF, Panorâmica\r\nResolução das câmeras traseiras\r\n	50 Mpx/12 Mpx/5 Mpx\r\nAbertura do diafragma da câmera traseira\r\n	f 1.8/f 2.2/f 2.4\r\nAbertura do diafragma da câmera frontal\r\n	f 2.2\r\nQuantidade de câmeras traseiras\r\n	3\r\nQuantidade de câmeras frontais\r\n	1\r\nZoom digital\r\n	10x\r\nResolução de vídeo da câmera frontal\r\n	3840 px x 2160 px\r\nCom câmera\r\n	Sim\r\nCom flash na câmara frontal\r\n	Não\r\nDesign e resistência\r\nClassificação IP\r\n	IP67\r\nCom teclado QWERTY físico\r\n	Não\r\nÉ resistente à água\r\n	Sim\r\nÉ resistente ao pó\r\n	Sim\r\nOutros\r\nResolução da câmera grande-angular\r\n	12 Mpx\r\nCartão SIM\r\nÉ Dual SIM\r\n	Sim\r\nTamanhos de cartão SIM compatíveis\r\n	Nano-SIM\r\nQuantidade de ranhuras para cartão SIM\r\n	2\r\nMemória\r\nMemória interna\r\n	256 GB\r\nMemória RAM\r\n	8 GB\r\nTipos de cartão de memória\r\n	Micro-SD\r\nCapacidade máxima do cartão de memória\r\n	1 TB\r\nCom ranhura para cartão de memória\r\n	Sim\r\nProcessador\r\nModelo do processador\r\n	Exynos 1380\r\nVelocidade do processador\r\n	2.4 GHz\r\nModelos de CPU\r\n	4x2.4 GHz Cortex-A78, 4x2 GHz Cortex-A55\r\nModelo de GPU\r\n	Mali-G68 MP5\r\nQuantidade de núcleos do processador\r\n	8\r\nTela\r\nTamanho da tela\r\n	6.4 \"\r\nTipo de resolução da tela\r\n	Full HD+\r\nResolução da tela\r\n	1080 px x 2340 px\r\nTecnologia da tela\r\n	Super AMOLED\r\nTipo de tela\r\n	Infinity-O Display\r\nPixels por polegada da tela\r\n	403 ppi\r\nTaxa de atualização da tela\r\n	120 Hz\r\nBrilho máximo da tela\r\n	1000 cd/m²\r\nProporção da tela\r\n	19.5:9\r\nCom tela tátil\r\n	Sim\r\nBateria\r\nCapacidade da bateria\r\n	5000 mAh\r\nTipo de bateria\r\n	Polímero de lítio\r\nAutonomia de conversação\r\n	46 h\r\nCom carregamento rápido\r\n	Sim\r\nCom carregamento sem fio\r\n	Não\r\nCom bateria removível\r\n	Não\r\nSeguridade\r\nCom leitor de impressão digital\r\n	Sim\r\nCom reconhecimento de íris\r\n	Não\r\nPeso e dimensões\r\nPeso\r\n	202 g\r\nAltura x Largura x Profundidade\r\n	158.2 mm x 76.7 mm x 8.2 mm\r\nSensores\r\nCom acelerômetro\r\n	Sim\r\nCom sensor de proximidade\r\n	Sim\r\nCom giroscópio\r\n	Sim\r\nCom bússola\r\n	Sim\r\nCom barômetro\r\n	Não','647fe5be6fbb0.webp','Samsung'),(14,'Water Cooler Black 360mm Rise Mode Rgb Processador Intel Amd',40,600.00,'Características principais\r\nMarca	Rise\r\nLinha	Water Cooler\r\nModelo	RM-WCB-03-RGB\r\nOutras características\r\n\r\n    Tipo de cooler: Water cooling\r\n\r\n    Tamanho do ventilador: 360 mm\r\n\r\n    É gamer: Sim\r\n\r\n    Componente compatível: CPU','647fe749c8297.webp','Rise'),(15,'Processador gamer AMD Ryzen 7 5700X 100-100000926WOF de 8 núcleos e 4.6GHz de frequência',49,1500.00,'Características gerais\r\nMarca\r\n	AMD\r\nLinha\r\n	Ryzen 7\r\nModelo\r\n	5700X\r\nModelo alfanumérico\r\n	100-100000926WOF\r\nFrequência\r\nFrequência mínima de relógio\r\n	3.4 GHz\r\nFrequência máxima de relógio\r\n	4.6 GHz\r\nOutros\r\nInclui air cooler\r\n	Não\r\nAno de lançamento\r\n	2022\r\nMemória\r\nTipos de memória RAM suportadas\r\n	DDR4\r\nTamanho máximo de memória RAM suportada\r\n	128 GB\r\nCache\r\n	32 MB\r\nEspecificações\r\nGeração\r\n	5°\r\nSoquetes compatíveis\r\n	AM4\r\nArquitetura\r\n	x86-64\r\nAplicação\r\n	Computadores de mesa\r\nQuantidade de núcleos de CPU\r\n	8\r\nÉ gamer\r\n	Sim\r\nEstá desbloqueado\r\n	Sim\r\nPotência de design térmico\r\n	65 W\r\nÉ OEM\r\n	Não\r\nCom hyper-threading\r\n	Não\r\nQuantidade de fios de CPU\r\n	16','647fe7d176b75.webp','AMD'),(16,'ACER Notebook Gamer Nitro 5 AN515-57-52LC, CI5 11400H, 8GB, 512GB SDD, (NVIDIA GTX 1650) Windows11. 15,6” LED FHD IPS Preto',60,4600.00,'Marca 	‎ACER\r\nFabricante 	‎Acer\r\nSérie 	‎Notebook Gamer Nitro 5\r\nCertificação 	‎Não aplicável\r\nCor 	‎preto\r\nAltura do produto 	‎24,35 milímetros\r\nLargura do produto 	‎36,3 centímetros\r\nTamanho de tela vertical 	‎15,6 Polegadas\r\nResolução da tela 	‎1920 x 1080 pixels\r\nResolução 	‎1920x1080 Pixels\r\nMarca do processador 	‎Intel\r\nTipo de processador 	‎Intel Core i5-11400\r\nVelocidade do processador 	‎4,5 GHz\r\nNúmero de processadores 	‎1\r\nTamanho da memória externa 	‎8 GB\r\nTamanho da memória 	‎8 GB\r\nTecnologia da memória 	‎DDR4\r\nTipo de Memória 	‎DDR4 SDRAM\r\nMáximo de memória compatível 	‎64 GB\r\nVelocidade do relógio de memória 	‎1600 MHz\r\nEntradas para memória 	‎2\r\nTecnologia do HD 	‎SSD\r\nInterface do HD 	‎Serial ATA\r\nDetalhes do áudio 	‎Fones de ouvido, Alto-falantes\r\nDescrição do alto-falante 	‎Alto-falantes duplos estéreo Acer TrueHarmony • Tecnologias: DTS®X Ultra Áudio • Suportado no Windows Spatial Sound para PC Gaming, com licença DTS integrada • Renderização de áudio imersiva em fones de ouvido e alto-falantes internos Microfone digital duplo • Acer Purified. Voice • Compatível com Cortana com voz\r\nModelo de placa de vídeo 	‎NVIDIA GeForce GTX 1650\r\nMarca do chipset de vídeo 	‎Intel\r\nDescrição da placa de vídeo 	‎Dedicado\r\nTipo de memória de vídeo 	‎GDDR6\r\nMemória de vídeo 	‎4 GB\r\nInterface da placa de vídeo 	‎PCI Express\r\nTipo de conexão 	‎Bluetooth, Wi-fi\r\nTecnologia de conexão 	‎HDMI\r\nPadrão de conexão sem fio 	‎Bluetooth\r\nNúmero de portas USB 3.0 	‎3\r\nVoltagem 	‎110,22 Volts, 220,11 Volts\r\nEtiqueta Nacional de Eficiência Energética (ENCE) 	‎85\r\nPotência em watts 	‎57 Watt-hours\r\nDispositivo de armazenamento óptico 	‎Não aplicável\r\nFonte de alimentação 	‎Energia elétrica\r\nSistema operacional 	‎Windows 11 Home\r\nMédia de duração da bateria (em horas) 	‎7 Horas\r\nNúmero de unidades 	‎1\r\nPeso do produto 	‎2,3 Kilograms\r\nDimensões do produto 	‎25,5 x 36,34 x 2,43 cm; 2,3 Quilogramas\r\nNúmero do modelo 	‎AN515-57-52LC\r\nDescontinuado pelo fabricante 	‎Não\r\nFunciona a bateria ou pilha? 	‎Não\r\nEAN 	‎4710886832416\r\nCapacidade de armazenamento digital 	‎512 GB','647fe8e7a0aad.jpg','ACER'),(17,'Memória Notebook Crucial 8GB DDR4 3200 Mhz',70,140.00,'Marca 	‎Crucial\r\nFabricante 	‎Crucial\r\nSérie 	‎Memória Notebook Crucial 8GB DDR4 3200 Mhz\r\nCertificação 	‎Não Aplicável\r\nCor 	‎Preto\r\nFormato 	‎SO-DIMM\r\nAltura do produto 	‎1,1 polegadas\r\nNúmero de processadores 	‎1\r\nTamanho da memória 	‎8 GB\r\nTecnologia da memória 	‎DDR4\r\nTipo de Memória 	‎DDR4 SDRAM\r\nVelocidade do relógio de memória 	‎3200 MHz\r\nTamanho do HD 	‎8 GB\r\nVoltagem 	‎1,2 Volts\r\nEtiqueta Nacional de Eficiência Energética (ENCE) 	‎A+\r\nFonte de alimentação 	‎Energia elétrica\r\nPilhas ou baterias inclusas 	‎Não\r\nNúmero de unidades 	‎1\r\nPeso do produto 	‎9,07 g\r\nDimensões do produto 	‎6,86 x 1,09 x 2,79 cm; 9,07 g\r\nNúmero do modelo 	‎CT8G4SFRA32A\r\nFunciona a bateria ou pilha? 	‎Não\r\nEAN 	‎5704174888857, 0649528903525\r\nCapacidade de armazenamento digital 	‎8 GB','647fe93d94c4b.jpg','Crucial'),(18,'KF432S20IB/8 - Memória 8GB SODIMM DDR4 3200Mhz FURY Impact 1,35V 1Rx8 260 pinos para notebook, Preto',39,160.00,'Marca 	‎FURY\r\nFabricante 	‎Kingston\r\nModelo 	‎KF432S20IB/8\r\nNome do modelo 	‎Memória Notebook Kingston Fury Impact 8GB DDR4 3200 Mhz - Preto\r\nCertificação 	‎Não aplicável\r\nNúmero da peça 	‎KF432S20IB/8\r\nTipo Do Produto 	‎Computadores pessoais\r\nRAM 	‎8 GB\r\nCapacidade de armazenamento da memória 	‎8 GB\r\nTecnologia da memória Ram 	‎DDR4\r\nTipo de Memória 	‎DDR4 SDRAM\r\nAparelhos compatíveis 	‎Notebook\r\nNúmero de unidades 	‎1\r\nVoltagem 	‎1,2 Volts\r\nEtiqueta Nacional de Eficiência Energética (ENCE) 	‎Não aplicável\r\nPotência em watts 	‎3600\r\nTipo de fonte de energia 	‎Energia elétrica\r\nBaterias inclusas 	‎Não\r\nFunciona com baterias 	‎Não\r\nVelocidade de transmissão de dados 	‎8 GB\r\nTipo de produto 	‎SO-DIMM\r\nContém líquido? 	‎Não\r\nCor 	‎Preto\r\nCor correspondente 	‎Preto\r\nGarantia do fabricante 	‎Vitalícia com o fabricante\r\nPeso do produto 	‎7,6 g\r\nNúmero do modelo 	‎KF432S20IB/8\r\nEAN 	‎0740617318449\r\nDimensões do produto 	‎6,96 x 3 x 0,38 cm; 7,6 g','647fe9b2e801e.jpg','FURY'),(19,'Ssd Kingspec 256gb 550mb/s Sata 3 6gbps',80,110.00,'Marca 	‎Kingspec\r\nFabricante 	‎kingspec electronics technology\r\nCor 	‎Laranja\r\nFormato 	‎2,5 pol.\r\nTamanho da memória externa 	‎256 GB\r\nTamanho do HD 	‎256 GB\r\nTecnologia de conexão 	‎SATA\r\nPeso do produto 	‎50 g\r\nDimensões da embalagem 	‎12,1 x 8,8 x 1,9 cm; 50 g\r\nEAN 	‎6950509983202\r\nCapacidade de armazenamento digital 	‎256 GB','647fea21cdb2b.jpg','Kingspec'),(20,'Teclado Mecânico Gamer Redragon Kumara RGB Switch Outemu Brown ABNT2 - K552RGB-1 (BROWN)',100,200.00,'Marca 	‎Redragon\r\nFabricante 	‎Redragon\r\nCertificação 	‎Grau 1, Não aplicável\r\nCor 	‎PRETO\r\nAltura do produto 	‎8 centímetros\r\nLargura do produto 	‎15 centímetros\r\nQuantidade de botões 	‎104\r\nEtiqueta Nacional de Eficiência Energética (ENCE) 	‎não aplicável\r\nFonte de alimentação 	‎DC\r\nNúmero de unidades 	‎1\r\nPeso do produto 	‎1 Kilograms\r\nDimensões do produto 	‎39 x 15 x 8 cm; 1 Quilogramas\r\nNúmero do modelo 	‎K552RGB(BROWN)\r\nFunciona a bateria ou pilha? 	‎Não\r\nEAN 	‎6950376751027','647feae8280e0.jpg','Redragon'),(21,'Headphone Fone de Ouvido Havit HV-H2002d, Gamer, com Microfone, Falante 53mm, Plug 3.5mm: compatível com XBOX ONE e PS4, HAVIT, HV-H2002d e Outros',45,250.00,'Marca 	‎havit\r\nFabricante 	‎Havit\r\nModelo 	‎HV-H2002d\r\nNome do modelo 	‎H2002D\r\nNúmero da peça 	‎HV-H2002d\r\nTipo Do Produto 	‎Computadores pessoais\r\nCaracterísticas especiais 	‎À prova de suor, Microfone incluso\r\nPeças para montagem 	‎Cabo\r\nNúmero de unidades 	‎1\r\nGrau de compressão 	‎Controle de volume\r\nResponsividade do som 	‎110 dB\r\nFator de forma do fone de ouvido 	‎Em torno da orelha\r\nPorta de áudio 	‎Jack de 3,5 mm\r\nTipo de fonte de energia 	‎AC/DC\r\nFunciona com baterias 	‎Não\r\nCaracterística de cabo ou fio 	‎Retrátil\r\nTecnologia de conexão 	‎Com fio\r\nCor 	‎Preto\r\nCor correspondente 	‎Preto\r\nConexões 	‎Com fio Não\r\nDistância focal máxima 	‎Jack de 3,5 mm\r\nGarantia do fabricante 	‎6 meses\r\nPeso do produto 	‎297 g\r\nNúmero do modelo 	‎HV-H2002d\r\nEAN 	‎6939119014223, 6221323132580, 6221323067455\r\nDimensões do produto 	‎8,8 x 16,5 x 19 cm; 297 g','647feb73213f8.jpg','Havit'),(22,'Placa Mae Gaming 1.0 AMD, Gigabyte, B450M Gaming',66,750.00,'Marca 	‎Gigabyte\r\nFabricante 	‎Gigabyte\r\nSérie 	‎B450M Gaming\r\nCertificação 	‎não aplicável\r\nAltura do produto 	‎10 centímetros\r\nLargura do produto 	‎10 centímetros\r\nTipo de processador 	‎AMD Athlon\r\nTipo de soquete do processador 	‎Soquete AM4\r\nNúmero de processadores 	‎4\r\nTamanho da memória 	‎32 GB\r\nTecnologia da memória 	‎DDR4\r\nTipo de Memória 	‎DDR4 SDRAM\r\nVelocidade do relógio de memória 	‎3200 MHz\r\nEntradas para memória 	‎2\r\nInterface da placa de vídeo 	‎PCI-Express x4, PCI Express\r\nPadrão de conexão sem fio 	‎802.11a\r\nNúmero de portas USB 2.0 	‎2\r\nNúmero de Conexões HDMI 	‎1\r\nNúmero de entradas VGA 	‎1\r\nEtiqueta Nacional de Eficiência Energética (ENCE) 	‎A+\r\nPotência em watts 	‎3600\r\nFonte de alimentação 	‎AC/DC\r\nPilhas ou baterias inclusas 	‎Não\r\nNúmero de unidades 	‎1\r\nPeso do produto 	‎890 g\r\nDimensões do produto 	‎10 x 10 x 10 cm; 890 g\r\nNúmero do modelo 	‎B450M Gaming\r\nDescontinuado pelo fabricante 	‎Não\r\nFunciona a bateria ou pilha? 	‎Não\r\nEAN 	‎0753459023808, 4719331804497, 0793519823603','647fec09d3a8e.jpg','Gigabyte'),(23,'Fonte Corsair CX650F RGB - 650W, 80 Plus Bronze, Modular, Branco - CP-9020226-NA',55,640.00,'Marca 	‎Corsair\r\nFabricante 	‎Corsair\r\nSérie 	‎CX650F RGB WHITE\r\nCertificação 	‎Não Aplicável\r\nCor 	‎BRANCO\r\nFormato 	‎ATX\r\nAltura do produto 	‎8,6 centímetros\r\nLargura do produto 	‎14 centímetros\r\nVoltagem 	‎100,24 Volts\r\nEtiqueta Nacional de Eficiência Energética (ENCE) 	‎80 plus bronze\r\nPotência em watts 	‎650 watts\r\nFonte de alimentação 	‎Energia elétrica\r\nPilhas ou baterias inclusas 	‎Não\r\nNúmero de unidades 	‎1\r\nPeso do produto 	‎1,3 Kilograms\r\nDimensões do produto 	‎15 x 14 x 8,6 cm; 1,3 Quilogramas\r\nNúmero do modelo 	‎CP-9020226-NA\r\nFunciona a bateria ou pilha? 	‎Não\r\nEAN 	‎0840006620594\r\nPotência de saída em Watts 	‎650','647fec7a9735c.jpg','Corsair'),(24,'GPU NV RTX3060 12GB 1-CLICK OC GDDR6 192BITS Galax 36NOL7MD1VOC',44,2300.00,'Marca 	‎Galax\r\nFabricante 	‎GALAX\r\nSérie 	‎36NOL7MD1VOC\r\nCertificação 	‎Não aplicável\r\nCor 	‎Preto\r\nAltura do produto 	‎4 centímetros\r\nLargura do produto 	‎12 centímetros\r\nVelocidade do relógio de memória 	‎1777 MHz\r\nModelo de placa de vídeo 	‎NVIDIA GeForce RTX 3060\r\nMarca do chipset de vídeo 	‎NVIDIA\r\nDescrição da placa de vídeo 	‎Dedicado\r\nTipo de memória de vídeo 	‎GDDR6\r\nMemória de vídeo 	‎12 GB\r\nInterface da placa de vídeo 	‎PCI Express\r\nPadrão de conexão sem fio 	‎802.11a\r\nVoltagem 	‎500 Volts\r\nEtiqueta Nacional de Eficiência Energética (ENCE) 	‎1777 MHz\r\nPotência em watts 	‎170 watts\r\nFonte de alimentação 	‎Não aplicável\r\nPilhas ou baterias inclusas 	‎Não\r\nNúmero de unidades 	‎1\r\nPeso do produto 	‎745 g\r\nDimensões do produto 	‎16 x 12 x 4 cm; 745 g\r\nNúmero do modelo 	‎36NOL7MD1VOC\r\nDescontinuado pelo fabricante 	‎Não\r\nFunciona a bateria ou pilha? 	‎Não\r\nEAN 	‎4895147142784','647fece96b52b.jpg','Galax'),(25,'SSD Kingston NV2 1TB NVMe M.2 2280 (Leitura até 3500MB/s e Gravação até 2100MB/s)',120,300.00,'Marca 	‎Kingston\r\nFabricante 	‎Kingston\r\nSérie 	‎SSD\r\nCertificação 	‎NÃO APLICÁVEL\r\nCor 	‎Azul\r\nFormato 	‎M 2.2280\r\nTamanho da memória externa 	‎1 TB\r\nTamanho do HD 	‎1 TB\r\nTecnologia do HD 	‎Unidade de estado sólido\r\nInterface do HD 	‎NVMe\r\nTecnologia de conexão 	‎SATA\r\nEtiqueta Nacional de Eficiência Energética (ENCE) 	‎A+\r\nFonte de alimentação 	‎Energia elétrica\r\nPilhas ou baterias inclusas 	‎Não\r\nNúmero de unidades 	‎1\r\nPeso do produto 	‎7 g\r\nDimensões do produto 	‎8 x 2,2 x 0,38 cm; 7 g\r\nNúmero do modelo 	‎SNV2S/1000G\r\nFunciona a bateria ou pilha? 	‎Não\r\nEAN 	‎5704174985839, 0740617329919\r\nCapacidade de armazenamento digital 	‎1 TB','647fed46f26a1.jpg','Kingston');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendas`
--

DROP TABLE IF EXISTS `vendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendas` (
  `id_venda` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_produto` bigint(20) unsigned NOT NULL,
  `id_cliente` bigint(20) unsigned NOT NULL,
  `id_cartao` int(11) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor_parcela` decimal(10,2) NOT NULL,
  `valor_total` decimal(10,2) NOT NULL,
  `parcelas` int(11) NOT NULL,
  `status` enum('pendente','concluido','cancelado') COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_venda` date NOT NULL,
  `data_entrega` date DEFAULT NULL,
  PRIMARY KEY (`id_venda`),
  KEY `vendas_id_produto_foreign` (`id_produto`),
  KEY `vendas_id_cliente_foreign` (`id_cliente`),
  KEY `id_cartao` (`id_cartao`),
  KEY `id_endereco` (`id_endereco`),
  CONSTRAINT `vendas_ibfk_1` FOREIGN KEY (`id_cartao`) REFERENCES `cartao` (`id_cartao`),
  CONSTRAINT `vendas_ibfk_2` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id_endereco`),
  CONSTRAINT `vendas_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`),
  CONSTRAINT `vendas_id_produto_foreign` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendas`
--

LOCK TABLES `vendas` WRITE;
/*!40000 ALTER TABLE `vendas` DISABLE KEYS */;
INSERT INTO `vendas` VALUES (11,10,1,1,1,1,35.00,140.00,4,'cancelado','2023-06-07','2023-06-14'),(12,11,1,1,1,1,1600.00,1600.00,1,'cancelado','2023-06-07','2023-06-14'),(13,7,1,1,1,1,300.00,300.00,1,'cancelado','2023-06-07','2023-06-14'),(14,10,1,1,1,1,70.00,140.00,2,'cancelado','2023-06-07','2023-06-14'),(15,9,1,1,1,1,4300.00,4300.00,1,'concluido','2023-06-07','2023-06-14'),(16,11,1,1,1,1,1600.00,1600.00,1,'concluido','2023-06-07','2023-06-14'),(18,8,1,1,1,1,2900.00,2900.00,1,'concluido','2023-06-07','2023-06-14'),(19,9,15,2,3,1,4300.00,4300.00,1,'concluido','2023-02-10','2023-02-17'),(20,10,16,3,4,1,140.00,140.00,1,'concluido','2023-05-07','2023-05-17'),(21,22,17,4,5,1,750.00,750.00,1,'concluido','2023-04-06','2023-04-13'),(22,18,18,5,6,1,160.00,160.00,1,'concluido','2023-03-05','2023-03-10'),(23,24,1,1,1,1,1150.00,2300.00,2,'concluido','2023-01-01','2023-01-08'),(24,15,1,1,1,1,1500.00,1500.00,1,'concluido','2022-12-15','2022-12-22');
/*!40000 ALTER TABLE `vendas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-07  0:47:06
