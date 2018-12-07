-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Nov-2018 às 17:15
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `abreviaturas`
--

CREATE TABLE `abreviaturas` (
  `id` int(11) NOT NULL,
  `sigla` varchar(20) DEFAULT NULL,
  `significado` varchar(60) DEFAULT NULL,
  `significado_ex` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `abreviaturas`
--

INSERT INTO `abreviaturas` (`id`, `sigla`, `significado`, `significado_ex`) VALUES
(1, 'terrap_a_cult', 'Terraplanagem de &Aacuterea de Cultivo', 'Terraplanagem de area de Cultivo'),
(2, 'terraceamento', 'Terraceamento', 'Terraceamento'),
(3, 'isol_a', 'Isolamento da &Aacuterea', 'Isolamento da area'),
(4, 'rocada_previa', 'Ro&ccedilada Manual e Mecanizada Pr&eacutevia', 'Rocada Manual e Mecanizada Previa'),
(5, 'comb_form', 'Combate a Formigas', 'Combate a Formigas'),
(6, 'medicao', 'Medi&ccedil&atildeo', 'Medicao'),
(7, 'marcacao', 'Marca&ccedil&atildeo de Covas', 'Marcacao de Covas'),
(8, 'coroamento', 'Coroamento para Plantio', 'Coroamento para Plantio'),
(9, 'coveamento', 'Coveamento Manual', 'Coveamento Manual'),
(10, 'fecha_covas', 'Fechamento Parcial de Covas', 'Fechamento Parcial de Covas'),
(11, 'adubacao', 'Aduba&ccedil&atildeo na Cova de Plantio', 'Adubacao na Cova de Plantio'),
(12, 'plantio_mudas', 'Plantio de Mudas', 'Plantio de Mudas'),
(13, 'irrigacao', 'Irriga&ccedil&atildeo', 'Irrigacao'),
(14, 'pos_irrigacao', 'Irriga&ccedil&atildeo', 'Irrigacao'),
(15, 'replantio', 'Replantio Florestal', 'Replantio Florestal'),
(16, 'capina', 'Capina Manual em Coroa', 'Capina Manual em Coroa'),
(17, 'pos_rocada', 'Ro&ccedilada Manual e Mecanizada de Manuten&ccedil&atildeo', 'Rocada Manual e Mecanizada de Manutencao'),
(18, 'p_adubacao', 'Aduba&ccedil&atildeo Localizada em Cobertura', 'Adubacao Localizada em Cobertura'),
(19, 'construcao', 'Constru&ccedil&atildeo/manuten&ccedil&atildeo de Aceiros', 'Construcao/manutencao de Aceiros'),
(20, 'razao_social', 'Raz&atildeo Social', 'Razao Social'),
(21, 'cnpj', 'CNPJ', 'CNPJ'),
(22, 'ie', 'Inscri&ccedil&atildeo Estadual', 'Inscricao Estadual'),
(23, 'tel', 'Telefone', 'Telefone'),
(24, 'cel', 'Celular', 'Celular'),
(25, 'email', 'E-mail', 'E-mail'),
(26, 'obs', 'Observa&ccedil&otildees', 'Observacoes'),
(27, 'nome_pf', 'Nome', 'Nome'),
(28, 'nome_pj', 'Nome do Representante', 'Nome do Representante'),
(29, 'id', 'ID', 'ID'),
(30, 'id_usuario', 'ID do Usu&aacuterio', 'ID do Usuario'),
(31, 'app', '&Aacuterea de Preserva&ccedil&atildeo Permanente', 'Area de Preservacao Permanente'),
(32, 'are', '&Aacuterea de Reserva Excedente', 'Area de Reserva Excedente'),
(33, 'arl', '&Aacuterea de Reserva Legal', 'Area de Reserva Legal'),
(34, 'custo_fixo', 'Custo Fixo', 'Custo Fixo'),
(35, 'validade', 'Validade', 'Validade'),
(36, 'data_criacao', 'Data de Cria&ccedil&atildeo', 'Data de Criacao'),
(37, 'total', 'Total', 'Total'),
(38, 'cpf', 'CPF', 'CPF'),
(39, 'area_propriedade', '&Aacuterea da Propriedade', 'area da Propriedade');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividades`
--

CREATE TABLE `atividades` (
  `id` int(11) NOT NULL,
  `id_projeto` int(11) DEFAULT NULL,
  `item` varchar(20) DEFAULT NULL,
  `oper` varchar(20) DEFAULT NULL,
  `data_ativ` varchar(20) DEFAULT NULL,
  `descricao` varchar(60) DEFAULT NULL,
  `hora` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `atividades`
--

INSERT INTO `atividades` (`id`, `id_projeto`, `item`, `oper`, `data_ativ`, `descricao`, `hora`) VALUES
(1, 3, 'comb_form', 'Realizada', '12/07/2018', 'AvaliaÃ§Ã£o da dedet', '10:00'),
(2, 3, 'plantio_mudas', 'Agendada', '31/10/2019', 'Recebimento das muda', '10:00'),
(3, 3, 'replantio', 'Agendada', '29/09/2019', 'Visita tÃ©cnico', '13:00'),
(4, 4, 'terraceamento', 'Realizada', '13/09/2018', 'FiscalizaÃ§Ã£o do CREA', '14:00'),
(5, 4, 'coroamento', 'Agendada', '16/10/2019', 'Vistoria da perÃ­cia tÃ©cnica para levantamento', '09:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamentos`
--

CREATE TABLE `orcamentos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `tipo_solicitante` varchar(2) DEFAULT NULL,
  `solicitante` varchar(18) DEFAULT NULL,
  `tipo_recomposicao` varchar(3) DEFAULT NULL,
  `area_propriedade` varchar(12) DEFAULT NULL,
  `area_rl` varchar(12) DEFAULT NULL,
  `area_re` varchar(12) DEFAULT NULL,
  `area_app` varchar(12) DEFAULT NULL,
  `l_rio` varchar(12) DEFAULT NULL,
  `custo_fixo` varchar(20) DEFAULT NULL,
  `terrap_a_cult` varchar(2) DEFAULT NULL,
  `terraceamento` varchar(2) DEFAULT NULL,
  `isol_a` varchar(2) DEFAULT NULL,
  `rocada_previa` varchar(2) DEFAULT NULL,
  `comb_form` varchar(2) DEFAULT NULL,
  `medicao` varchar(2) DEFAULT NULL,
  `marcacao` varchar(2) DEFAULT NULL,
  `coroamento` varchar(2) DEFAULT NULL,
  `coveamento` varchar(2) DEFAULT NULL,
  `fecha_covas` varchar(2) DEFAULT NULL,
  `adubacao` varchar(2) DEFAULT NULL,
  `plantio_mudas` varchar(2) DEFAULT NULL,
  `irrigacao` varchar(2) DEFAULT NULL,
  `pos_irrigacao` varchar(2) DEFAULT NULL,
  `replantio` varchar(2) DEFAULT NULL,
  `capina` varchar(2) DEFAULT NULL,
  `pos_rocada` varchar(2) DEFAULT NULL,
  `p_adubacao` varchar(2) DEFAULT NULL,
  `construcao` varchar(2) DEFAULT NULL,
  `val_terrap_a_cult` varchar(20) DEFAULT NULL,
  `val_terraceamento` varchar(20) DEFAULT NULL,
  `val_isol_a` varchar(20) DEFAULT NULL,
  `val_rocada_previa` varchar(20) DEFAULT NULL,
  `val_comb_form` varchar(20) DEFAULT NULL,
  `val_medicao` varchar(20) DEFAULT NULL,
  `val_marcacao` varchar(20) DEFAULT NULL,
  `val_coroamento` varchar(20) DEFAULT NULL,
  `val_coveamento` varchar(20) DEFAULT NULL,
  `val_fecha_covas` varchar(20) DEFAULT NULL,
  `val_adubacao` varchar(20) DEFAULT NULL,
  `val_plantio_mudas` varchar(20) DEFAULT NULL,
  `val_irrigacao` varchar(20) DEFAULT NULL,
  `val_pos_irrigacao` varchar(20) DEFAULT NULL,
  `val_replantio` varchar(20) DEFAULT NULL,
  `val_capina` varchar(20) DEFAULT NULL,
  `val_pos_rocada` varchar(20) DEFAULT NULL,
  `val_p_adubacao` varchar(20) DEFAULT NULL,
  `val_construcao` varchar(20) DEFAULT NULL,
  `validade` varchar(10) DEFAULT NULL,
  `data_criacao` varchar(10) DEFAULT NULL,
  `total` varchar(23) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `orcamentos`
--

INSERT INTO `orcamentos` (`id`, `id_usuario`, `tipo_solicitante`, `solicitante`, `tipo_recomposicao`, `area_propriedade`, `area_rl`, `area_re`, `area_app`, `l_rio`, `custo_fixo`, `terrap_a_cult`, `terraceamento`, `isol_a`, `rocada_previa`, `comb_form`, `medicao`, `marcacao`, `coroamento`, `coveamento`, `fecha_covas`, `adubacao`, `plantio_mudas`, `irrigacao`, `pos_irrigacao`, `replantio`, `capina`, `pos_rocada`, `p_adubacao`, `construcao`, `val_terrap_a_cult`, `val_terraceamento`, `val_isol_a`, `val_rocada_previa`, `val_comb_form`, `val_medicao`, `val_marcacao`, `val_coroamento`, `val_coveamento`, `val_fecha_covas`, `val_adubacao`, `val_plantio_mudas`, `val_irrigacao`, `val_pos_irrigacao`, `val_replantio`, `val_capina`, `val_pos_rocada`, `val_p_adubacao`, `val_construcao`, `validade`, `data_criacao`, `total`) VALUES
(1, 1, 'pj', '99.999.999/9999-99', 'app', '10000', NULL, NULL, '200', '50', 'R$15000', 'on', NULL, NULL, 'on', NULL, NULL, 'on', NULL, NULL, NULL, 'on', 'on', 'on', NULL, 'on', NULL, NULL, 'on', NULL, 'R$200', NULL, NULL, 'R$800', NULL, NULL, 'R$1400', NULL, NULL, NULL, 'R$2200', 'R$2400', 'R$2600', NULL, 'R$3000', NULL, NULL, 'R$3600', NULL, '10-12-2018', '25-11-2018', 'R$31200'),
(2, 1, 'pj', '43.450.404/2341-12', 'arl', '30000', '2000', NULL, NULL, NULL, 'R$30200', NULL, 'on', NULL, 'on', 'on', NULL, 'on', 'on', NULL, NULL, NULL, NULL, 'on', 'on', NULL, 'on', NULL, NULL, NULL, NULL, 'R$4000', NULL, 'R$8000', 'R$10000', NULL, 'R$14000', 'R$16000', NULL, NULL, NULL, NULL, 'R$26000', 'R$28000', NULL, 'R$32000', NULL, NULL, NULL, '25-12-2018', '25-11-2018', 'R$168200'),
(3, 1, 'pj', '92.312.391/2412-34', 'are', '150000', NULL, '4000', NULL, NULL, 'R$', NULL, NULL, 'on', NULL, 'on', 'on', NULL, 'on', NULL, NULL, NULL, NULL, 'on', NULL, 'on', NULL, NULL, 'on', NULL, NULL, NULL, 'R$12000', NULL, 'R$20000', 'R$24000', NULL, 'R$32000', NULL, NULL, NULL, NULL, 'R$52000', NULL, 'R$60000', NULL, NULL, 'R$72000', NULL, '25-12-2018', '25-11-2018', 'R$272000'),
(4, 1, 'pj', '93.124.532/0423-23', 'arl', '20000', '450', NULL, NULL, NULL, 'R$13000', NULL, NULL, NULL, NULL, 'on', NULL, NULL, 'on', NULL, NULL, 'on', 'on', 'on', NULL, 'on', NULL, NULL, 'on', NULL, NULL, NULL, NULL, NULL, 'R$2250', NULL, NULL, 'R$3600', NULL, NULL, 'R$4950', 'R$5400', 'R$5850', NULL, 'R$6750', NULL, NULL, 'R$8100', NULL, '02-12-2018', '25-11-2018', 'R$49900'),
(5, 1, 'pf', '391.248.124-82', 'app', '10000', NULL, NULL, '500', '30', 'R$14000', NULL, 'on', NULL, 'on', 'on', NULL, NULL, NULL, 'on', 'on', NULL, 'on', 'on', NULL, NULL, NULL, 'on', NULL, 'on', NULL, 'R$1000', NULL, 'R$2000', 'R$2500', NULL, NULL, NULL, 'R$4500', 'R$5000', NULL, 'R$6000', 'R$6500', NULL, NULL, NULL, 'R$8500', NULL, 'R$9500', '10-12-2018', '25-11-2018', 'R$59500'),
(6, 1, 'pf', '384.123.219-04', 'arl', '12000', '600', NULL, NULL, NULL, 'R$17500', NULL, NULL, NULL, NULL, NULL, NULL, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on', NULL, 'on', 'on', 'on', 'on', NULL, NULL, NULL, NULL, NULL, NULL, 'R$4200', 'R$4800', 'R$5400', 'R$6000', 'R$6600', 'R$7200', 'R$7800', 'R$8400', NULL, 'R$9600', 'R$10200', 'R$10800', 'R$11400', '10-12-2018', '25-11-2018', 'R$109900'),
(7, 1, 'pf', '958.342.349-01', 'are', '15000', NULL, '780', NULL, NULL, 'R$7800', NULL, NULL, NULL, NULL, 'on', NULL, NULL, 'on', NULL, NULL, NULL, 'on', 'on', NULL, 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'R$3900', NULL, NULL, 'R$6240', NULL, NULL, NULL, 'R$9360', 'R$10140', NULL, 'R$11700', NULL, NULL, NULL, NULL, '25-12-2018', '25-11-2018', 'R$49140'),
(8, 1, 'pf', '129.494.234-91', 'arl', '800', '130', NULL, NULL, NULL, 'R$', NULL, NULL, 'on', NULL, 'on', 'on', NULL, NULL, 'on', NULL, NULL, NULL, NULL, NULL, NULL, 'on', NULL, NULL, 'on', NULL, NULL, 'R$390', NULL, 'R$650', 'R$780', NULL, NULL, 'R$1170', NULL, NULL, NULL, NULL, NULL, NULL, 'R$2080', NULL, NULL, 'R$2470', '10-12-2018', '25-11-2018', 'R$7540'),
(9, 1, 'pj', '38.128.391/2903-19', 'are', '13000', NULL, '5000', NULL, NULL, 'R$40000', NULL, NULL, NULL, 'on', NULL, NULL, 'on', 'on', NULL, 'on', 'on', 'on', 'on', NULL, 'on', NULL, 'on', 'on', 'on', NULL, NULL, NULL, 'R$20000', NULL, NULL, 'R$35000', 'R$40000', NULL, 'R$50000', 'R$55000', 'R$60000', 'R$65000', NULL, 'R$75000', NULL, 'R$85000', 'R$90000', 'R$95000', '25-12-2018', '25-11-2018', 'R$710000'),
(10, 1, 'pf', '234.129.831-29', 'arl', '13000', '2500', NULL, NULL, NULL, 'R$14000', 'on', NULL, 'on', NULL, NULL, 'on', NULL, 'on', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'R$2500', NULL, 'R$7500', NULL, NULL, 'R$15000', NULL, 'R$20000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10-12-2018', '25-11-2018', 'R$59000'),
(11, 2, 'pf', '195.824.921-20', 'are', '3000', NULL, '500', NULL, NULL, 'R$4000', NULL, 'on', NULL, NULL, NULL, NULL, NULL, 'on', NULL, NULL, 'on', NULL, NULL, 'on', NULL, 'on', NULL, NULL, NULL, NULL, 'R$1000', NULL, NULL, NULL, NULL, NULL, 'R$4000', NULL, NULL, 'R$5500', NULL, NULL, 'R$7000', NULL, 'R$8000', NULL, NULL, NULL, '10-12-2018', '25-11-2018', 'R$29500');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pf`
--

CREATE TABLE `pf` (
  `cpf` varchar(14) NOT NULL,
  `nome_pf` varchar(45) DEFAULT NULL,
  `tel` varchar(13) DEFAULT NULL,
  `cel` varchar(14) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `obs` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pf`
--

INSERT INTO `pf` (`cpf`, `nome_pf`, `tel`, `cel`, `email`, `obs`) VALUES
('129.494.234-91', 'Gabriel Matheus', '(35)3192-3120', '(35)98137-1293', 'gabriel@admcorrea.com', '				'),
('195.824.921-20', 'Matheus Henrique', '(11)3912-3910', '(11)98312-4712', 'matheus_henr@imail.com', '				\r\n									'),
('234.129.831-29', 'Felipe Alcantara', '(11)3913-8032', '(11)98472-8391', 'adm@gedai.com', '				'),
('384.123.219-04', 'Cristiano Daniel', '(12)3123-9012', '(12)98312-7464', 'cristiano@admgoncalves.com', '				'),
('391.248.124-82', 'Pedro Henrique', '(12)3920-1390', '(12)98312-4712', 'pedro_adm@live.com', '				'),
('958.342.349-01', 'Marcos Vinicius', '(24)3194-0193', '(24)98410-2941', 'marcusvinicius@outlook.com', '				');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pj`
--

CREATE TABLE `pj` (
  `cnpj` varchar(18) NOT NULL,
  `nome_pj` varchar(45) DEFAULT NULL,
  `razao_social` varchar(45) DEFAULT NULL,
  `ie` varchar(20) DEFAULT NULL,
  `tel` varchar(13) DEFAULT NULL,
  `cel` varchar(14) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `obs` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pj`
--

INSERT INTO `pj` (`cnpj`, `nome_pj`, `razao_social`, `ie`, `tel`, `cel`, `email`, `obs`) VALUES
('38.128.391/2903-19', 'Fernando Daniel', 'TPG Cia Ltda', '3242212', '(24)3490-1231', '(21)98431-2783', 'financeiro@tpg.com', '				'),
('43.450.404/2341-12', 'Gabriel Fortes', 'DMG Ltda', '423423234', '(32)1312-4411', '(32)98412-3120', 'adm@dmg.com', '				'),
('92.312.391/2412-34', 'Guilherme Lobato', 'HDVA S/A', '412312391', '(12)3201-2490', '(12)98312-3150', 'financeiro@hdva.com', '				'),
('93.124.532/0423-23', 'Marcos Galhardo', 'Galhardo & Correa Ltda', '233123094', '(24)3039-1231', '(24)98123-9012', 'financeiro@galhardoecorrea.com', '				\r\n									'),
('99.999.999/9999-99', 'Matheus Caldeira', 'Matheus Caldeira & Cia LTDA', '34234', '(12)2121-2312', '(12)91231-2312', 'math@caldeiraecia.com', 'Exige faturamento\r\n									\r\n									');

-- --------------------------------------------------------

--
-- Estrutura da tabela `projetos`
--

CREATE TABLE `projetos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_orc` int(11) DEFAULT NULL,
  `versao` varchar(50) DEFAULT NULL,
  `tipo_solicitante` varchar(2) DEFAULT NULL,
  `solicitante` varchar(18) DEFAULT NULL,
  `tipo_recomposicao` varchar(3) DEFAULT NULL,
  `area_propriedade` varchar(12) DEFAULT NULL,
  `area_rl` varchar(12) DEFAULT NULL,
  `area_re` varchar(12) DEFAULT NULL,
  `area_app` varchar(12) DEFAULT NULL,
  `l_rio` varchar(12) DEFAULT NULL,
  `terrap_a_cult` varchar(2) DEFAULT NULL,
  `terraceamento` varchar(2) DEFAULT NULL,
  `isol_a` varchar(2) DEFAULT NULL,
  `rocada_previa` varchar(2) DEFAULT NULL,
  `comb_form` varchar(2) DEFAULT NULL,
  `medicao` varchar(2) DEFAULT NULL,
  `marcacao` varchar(2) DEFAULT NULL,
  `coroamento` varchar(2) DEFAULT NULL,
  `coveamento` varchar(2) DEFAULT NULL,
  `fecha_covas` varchar(2) DEFAULT NULL,
  `adubacao` varchar(2) DEFAULT NULL,
  `plantio_mudas` varchar(2) DEFAULT NULL,
  `irrigacao` varchar(2) DEFAULT NULL,
  `pos_irrigacao` varchar(2) DEFAULT NULL,
  `replantio` varchar(2) DEFAULT NULL,
  `capina` varchar(2) DEFAULT NULL,
  `pos_rocada` varchar(2) DEFAULT NULL,
  `p_adubacao` varchar(2) DEFAULT NULL,
  `construcao` varchar(2) DEFAULT NULL,
  `data_criacao` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `projetos`
--

INSERT INTO `projetos` (`id`, `id_usuario`, `id_orc`, `versao`, `tipo_solicitante`, `solicitante`, `tipo_recomposicao`, `area_propriedade`, `area_rl`, `area_re`, `area_app`, `l_rio`, `terrap_a_cult`, `terraceamento`, `isol_a`, `rocada_previa`, `comb_form`, `medicao`, `marcacao`, `coroamento`, `coveamento`, `fecha_covas`, `adubacao`, `plantio_mudas`, `irrigacao`, `pos_irrigacao`, `replantio`, `capina`, `pos_rocada`, `p_adubacao`, `construcao`, `data_criacao`) VALUES
(1, 1, 1, 'Sunday 25th of November 2018 01:53:00 PM', 'pj', '99.999.999/9999-99', 'app', '10000', NULL, NULL, '200', '50', NULL, 'X', 'X', NULL, 'X', 'X', NULL, 'X', 'X', 'X', NULL, NULL, NULL, 'X', NULL, 'X', 'X', NULL, 'X', '25-11-2018'),
(2, 1, 1, 'Sunday 25th of November 2018 01:53:22 PM', 'pj', '99.999.999/9999-99', 'app', '10000', NULL, NULL, '200', '50', NULL, 'X', 'X', NULL, 'X', 'X', NULL, 'X', 'X', 'X', NULL, NULL, 'on', 'X', 'on', 'X', 'X', NULL, 'X', '25-11-2018'),
(3, 1, 4, 'Sunday 25th of November 2018 01:55:28 PM', 'pj', '93.124.532/0423-23', 'arl', '20000', '450', NULL, NULL, NULL, 'X', 'X', 'X', 'X', NULL, 'X', 'X', NULL, 'X', 'X', NULL, NULL, NULL, 'X', NULL, 'X', 'X', NULL, 'X', '25-11-2018'),
(4, 2, 11, 'Sunday 25th of November 2018 02:11:43 PM', 'pf', '195.824.921-20', 'are', '3000', NULL, '500', NULL, NULL, 'X', NULL, 'X', 'X', 'X', 'X', 'X', NULL, 'X', 'X', NULL, 'X', 'X', NULL, 'X', NULL, 'X', 'X', 'X', '25-11-2018');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarifas`
--

CREATE TABLE `tarifas` (
  `id` int(11) NOT NULL,
  `versao` varchar(50) DEFAULT NULL,
  `terrap_a_cult` varchar(5) DEFAULT NULL,
  `terraceamento` varchar(5) DEFAULT NULL,
  `isol_a` varchar(5) DEFAULT NULL,
  `rocada_previa` varchar(5) DEFAULT NULL,
  `comb_form` varchar(5) DEFAULT NULL,
  `medicao` varchar(5) DEFAULT NULL,
  `marcacao` varchar(5) DEFAULT NULL,
  `coroamento` varchar(5) DEFAULT NULL,
  `coveamento` varchar(5) DEFAULT NULL,
  `fecha_covas` varchar(5) DEFAULT NULL,
  `adubacao` varchar(5) DEFAULT NULL,
  `plantio_mudas` varchar(5) DEFAULT NULL,
  `irrigacao` varchar(5) DEFAULT NULL,
  `pos_irrigacao` varchar(5) DEFAULT NULL,
  `replantio` varchar(5) DEFAULT NULL,
  `capina` varchar(5) DEFAULT NULL,
  `pos_rocada` varchar(5) DEFAULT NULL,
  `p_adubacao` varchar(5) DEFAULT NULL,
  `construcao` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tarifas`
--

INSERT INTO `tarifas` (`id`, `versao`, `terrap_a_cult`, `terraceamento`, `isol_a`, `rocada_previa`, `comb_form`, `medicao`, `marcacao`, `coroamento`, `coveamento`, `fecha_covas`, `adubacao`, `plantio_mudas`, `irrigacao`, `pos_irrigacao`, `replantio`, `capina`, `pos_rocada`, `p_adubacao`, `construcao`) VALUES
(1, NULL, '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(15) DEFAULT NULL,
  `senha` varchar(15) DEFAULT NULL,
  `nome` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `senha`, `nome`) VALUES
(1, 'teste', '123456', 'Caio Henrique'),
(2, 'user', 'user', 'Fulano de Tal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abreviaturas`
--
ALTER TABLE `abreviaturas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atividades`
--
ALTER TABLE `atividades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_projeto` (`id_projeto`);

--
-- Indexes for table `orcamentos`
--
ALTER TABLE `orcamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `pf`
--
ALTER TABLE `pf`
  ADD PRIMARY KEY (`cpf`);

--
-- Indexes for table `pj`
--
ALTER TABLE `pj`
  ADD PRIMARY KEY (`cnpj`);

--
-- Indexes for table `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_orc` (`id_orc`);

--
-- Indexes for table `tarifas`
--
ALTER TABLE `tarifas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abreviaturas`
--
ALTER TABLE `abreviaturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `atividades`
--
ALTER TABLE `atividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orcamentos`
--
ALTER TABLE `orcamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `projetos`
--
ALTER TABLE `projetos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tarifas`
--
ALTER TABLE `tarifas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `atividades`
--
ALTER TABLE `atividades`
  ADD CONSTRAINT `atividades_ibfk_1` FOREIGN KEY (`id_projeto`) REFERENCES `projetos` (`id`);

--
-- Limitadores para a tabela `orcamentos`
--
ALTER TABLE `orcamentos`
  ADD CONSTRAINT `orcamentos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `projetos`
--
ALTER TABLE `projetos`
  ADD CONSTRAINT `projetos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `projetos_ibfk_2` FOREIGN KEY (`id_orc`) REFERENCES `orcamentos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
