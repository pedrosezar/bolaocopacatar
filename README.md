# Sistema para Bolão da Copa do Mundo do Catar 2022

<p>Este sistema foi desenvolvido para agregar os conhecimentos adquiridos no Curso Formação PHP do Manoel Jailton.</p>
<p>Também foi desenvolvido para promover a intereção entre os familiares para apostas no bolão dos jogos da seleção brasileira.</p>

### :desktop_computer: Pré-requisitos

Antes de começar, você vai precisar ter instalado em sua máquina as seguintes ferramentas:
[Git](https://git-scm.com), [Apache](https://www.apache.org/), [MySQL](https://www.mysql.com/), [PHP](https://www.php.net/).
Além disto é bom ter um editor para trabalhar com o código como [Sublime Text](https://www.sublimetext.com/)

### :hammer_and_wrench: Tecnologias

As seguintes ferramentas estão sendo utilizadas na construção do projeto

- [Apache 2.4.52](https://www.apache.org/)
- [MySQL 8.0.31](https://www.mysql.com/)
- [PHP 8.1.2](https://www.php.net/)

### :game_die: Rodando o Projeto

- Clonar o repositório com ```git clone```
- Executar o script SQL para criação da Base de Dados, das Tabelas, as Views e inserir os registros necessários
```bash
-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 26-Dez-2022 às 10:14
-- Versão do servidor: 10.4.20-MariaDB-log
-- versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bolaodacopa`
--
CREATE DATABASE IF NOT EXISTS `bolaodacopa` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bolaodacopa`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `apostas`
--

CREATE TABLE `apostas` (
  `id` int(11) NOT NULL,
  `id_jogo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `gols_mandante` tinyint(4) NOT NULL,
  `gols_visitante` tinyint(4) NOT NULL,
  `data` datetime NOT NULL,
  `controle` char(6) NOT NULL,
  `situacao` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Estrutura da tabela `jogos`
--

CREATE TABLE `jogos` (
  `id` int(11) NOT NULL,
  `mandante` int(11) NOT NULL,
  `visitante` int(11) NOT NULL,
  `data_hora` datetime NOT NULL,
  `gols_mandante` tinyint(4) NOT NULL,
  `gols_visitante` tinyint(4) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `exibir` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `jogos`
--

INSERT INTO `jogos` (`id`, `mandante`, `visitante`, `data_hora`, `gols_mandante`, `gols_visitante`, `status`, `exibir`) VALUES
(1, 1, 3, '2022-11-24 16:00:00', 2, 0, 0, 1),
(2, 1, 4, '2022-11-28 13:00:00', 1, 0, 0, 1),
(3, 5, 2, '2022-12-02 16:00:00', 1, 0, 0, 1),
(4, 1, 6, '2022-12-05 16:00:00', 4, 1, 0, 1),
(5, 7, 2, '2022-12-09 12:00:00', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `mandantes`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `mandantes` (
`id` int(11)
,`selecao` varchar(15)
,`escudo` varchar(38)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `premiacao`
--

CREATE TABLE `premiacao` (
  `id` int(11) NOT NULL,
  `id_jogo` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Estrutura da tabela `selecoes`
--

CREATE TABLE `selecoes` (
  `id` int(11) NOT NULL,
  `selecao` varchar(15) NOT NULL,
  `escudo` varchar(38) NOT NULL,
  `tipo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `selecoes`
--

INSERT INTO `selecoes` (`id`, `selecao`, `escudo`, `tipo`) VALUES
(1, 'Brasil', 'a4de96e545e5da30575e371daaccae85.png', 'M'),
(2, 'Brasil', 'a54d65c46dd5207cbaac9a197b2772b3.png', 'V'),
(3, 'Sérvia', '749a4422736dd5d36053496d72599fe0.png', 'V'),
(4, 'Suíça', '3c3e641ccbbdf770b90f68b02b02df55.png', 'V'),
(5, 'Camarões', '5d236cd27f871194f32ce09f2a13e474.png', 'M'),
(6, 'Coreia do Sul', '1d1f5d24acb63fa885a87432639d6b36.png', 'V'),
(7, 'Croácia', '7b70a63731bfe52d4a16ed37f600d0a5.png', 'M');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `celular` char(32) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `foto` varchar(38) DEFAULT 'user.png',
  `status` varchar(6) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `celular`, `senha`, `foto`, `status`) VALUES
(1, 'Administrador', '12345678901', '$2y$10$QUdMMtmhkOxxA7QC0qc76OLVPnC1nF11cUWmkedqrr/ILBk9Edqmm', 'user.png', 'admin');

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `visitantes`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `visitantes` (
`id` int(11)
,`selecao` varchar(15)
,`escudo` varchar(38)
);

-- --------------------------------------------------------

--
-- Estrutura para vista `mandantes`
--
DROP TABLE IF EXISTS `mandantes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mandantes`  AS  select `selecoes`.`id` AS `id`,`selecoes`.`selecao` AS `selecao`,`selecoes`.`escudo` AS `escudo` from `selecoes` where `selecoes`.`tipo` = 'M' ;

-- --------------------------------------------------------

--
-- Estrutura para vista `visitantes`
--
DROP TABLE IF EXISTS `visitantes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `visitantes`  AS  select `selecoes`.`id` AS `id`,`selecoes`.`selecao` AS `selecao`,`selecoes`.`escudo` AS `escudo` from `selecoes` where `selecoes`.`tipo` = 'V' ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `apostas`
--
ALTER TABLE `apostas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jogos` (`id_jogo`),
  ADD KEY `fk_usuarios` (`id_usuario`);

--
-- Índices para tabela `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mandante` (`mandante`),
  ADD KEY `fk_visitante` (`visitante`);

--
-- Índices para tabela `premiacao`
--
ALTER TABLE `premiacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jogos` (`id_jogo`);

--
-- Índices para tabela `selecoes`
--
ALTER TABLE `selecoes`
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
-- AUTO_INCREMENT de tabela `apostas`
--
ALTER TABLE `apostas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `jogos`
--
ALTER TABLE `jogos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `premiacao`
--
ALTER TABLE `premiacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de tabela `selecoes`
--
ALTER TABLE `selecoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `apostas`
--
ALTER TABLE `apostas`
  ADD CONSTRAINT `apostas_jogos` FOREIGN KEY (`id_jogo`) REFERENCES `jogos` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `apostas_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `jogos`
--
ALTER TABLE `jogos`
  ADD CONSTRAINT `jogos_mandantes` FOREIGN KEY (`mandante`) REFERENCES `selecoes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `jogos_visitantes` FOREIGN KEY (`visitante`) REFERENCES `selecoes` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `premiacao`
--
ALTER TABLE `premiacao`
  ADD CONSTRAINT `premiacao_jogos` FOREIGN KEY (`id_jogo`) REFERENCES `jogos` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
```
- Executar o comando ```composer install``` para incluir as dependências necessárias ao projeto

- Editar o arquivo ```config/config.php``` com as configurações de acesso ao banco de dados ```bolaodacopa```, alterar também a ```URL_BASE``` bem como a ```URL_IMAGEM```

- Caso seu usuário no Banco de dados seja diferente de ```root``` fazer a alteração nesse trecho do ```sql``` para as views
```
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW 
```

- No script do sql já estão cadastrados os jogos que a seleção brasileira realizou durante a copa, bem como o usuário Administrador, cujo dados para acesso ao sistema são:
```
Celular: 12345678901
Senha: admin
```

### Autor
---

 <img style="border-radius: 50%;" src="https://avatars.githubusercontent.com/u/58284302?v=4" width="100px;" alt=""/>

Feito com :heart: por Pedro Sézar :wave: Entre em contato!

[![Linkedin Badge](https://img.shields.io/badge/-LinkedIn-blue?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/pedro-sézar-1783b0140/)](https://www.linkedin.com/in/pedro-sézar-1783b0140/)
[![Gmail Badge](https://img.shields.io/badge/-Gmail-c14438?style=flat-square&logo=Gmail&logoColor=white&link=mailto:pedrosezar@gmail.com)](mailto:pedrosezar@gmail.com)
