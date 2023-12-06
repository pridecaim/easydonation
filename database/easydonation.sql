-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/12/2023 às 18:23
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `easydonation`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `ongs`
--

CREATE TABLE `ongs` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `site` varchar(255) NOT NULL,
  `descricao` longtext NOT NULL,
  `missao` longtext NOT NULL,
  `area` varchar(255) NOT NULL,
  `galeria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ongs`
--

INSERT INTO `ongs` (`id`, `img`, `nome`, `email`, `senha`, `telefone`, `endereco`, `site`, `descricao`, `missao`, `area`, `galeria`) VALUES
(1, '../public/img/1701126862.jpg', 'Mãos Solidárias', 'maossolidarias@gmail.com', '$2y$10$ahtbcHNe9Twm9cvcPqFFIeSC82KIFyBVk3H9IWGZEv421UChiWu9u', '41997766653', 'São Paulo', 'https://www.ims.org.br', 'A Mãos Solidárias é uma organização não governamental dedicada a estender uma mão solidária às comunidades mais vulneráveis em todo o mundo. Nossa missão é construir um mundo mais justo, onde a compaixão e a solidariedade sejam as forças motrizes para a mudança positiva. Nossos valores fundamentais são a empatia, a igualdade e o comprometimento com o bem-estar das pessoas. Trabalhamos incansavelmente para fornecer assistência vital, incluindo alimentos, educação, cuidados de saúde e abrigo a indivíduos e famílias que enfrentam desafios socioeconômicos e adversidades. Acreditamos na importância da colaboração e da capacitação das comunidades para que elas possam construir um futuro melhor por conta própria. Portanto, além de ajuda imediata, também implementamos programas de desenvolvimento comunitário, capacitando as pessoas a se tornarem agentes de mudança em suas próprias vidas. Na Mãos Solidárias, acreditamos que, juntos, podemos fazer a diferença e criar um mundo onde a solidariedade e a compaixão prevaleça', 'Doar para a Mãos Solidárias é mais do que apenas uma contribuição financeira; é um investimento no futuro da humanidade. Com as suas doações, fazemos muito mais do que simplesmente arrecadar fundos. Colocamos em prática a nossa missão de estender uma mão solidária às comunidades carentes em todo o mundo. Com os recursos que você nos confia, promovemos a mudança real e duradoura. Investimos em programas que fornecem alimentos a famílias famintas, acesso à educação a crianças carentes, cuidados de saúde a quem mais precisa e abrigo para os desabrigados. Mas não paramos por aí. Com as suas doações, capacitamos comunidades para que se tornem autossuficientes, ajudando as pessoas a construir um futuro melhor por si mesmas. Isso significa que suas doações não apenas aliviam o sofrimento imediato, mas também plantam as sementes de um amanhã mais brilhante. Então, quando você doa para a Mãos Solidárias, você está investindo em esperança, em compaixão e em um mundo mais justo. Sua contribuição tem o poder de transformar', 'Assistência Social', '../public/img/1701126862_maos1.jpeg;../public/img/1701126862_maos2.jpg;../public/img/1701126862_maos3.webp;../public/img/1701126862_maoslog.jpg'),
(2, '../public/img/1701836015.png', 'Esperança e Destino', 'esperancadestino@gmail.com', '$2y$10$yYtcLXZyGU1nF0L.L09vCundtxaBT3i0nFYLu7inXkaFpVIEJo6Ge', '(555) 123-4567', 'São Paulo', ' www.esperancasolidaria.org', 'A Associação Esperança e Destino dedica-se a promover o bem-estar e a esperança nas comunidades em que atua. Buscamos fornecer apoio abrangente, desde necessidades básicas até oportunidades de educação e emprego. Nossa missão é construir um futuro mais promissor para aqueles que enfrentam desafios, inspirando a solidariedade e fomentando a esperança.', 'Ao apoiar a Associação Esperança e Destino , você está contribuindo para a transformação de vidas. Sua doação permite-nos oferecer assistência alimentar, acesso à educação e treinamento profissional, capacitando indivíduos a romperem ciclos de dificuldades. Juntos, podemos construir uma comunidade mais forte e esperançosa.', 'Desenvolvimento comunitário', '../public/img/1701836015_imagem_2023-12-06_011325827.png'),
(3, '../public/img/1701836240.png', 'Auqmia', 'contato.auqmia@gmail.com', '$2y$10$nSa/kLFKXUSk/j9PFyRfBe.3g8DU3H1ugF3PhgRjYO58tB3g0ndSS', '(11) 94728-5851', 'São Paulo', 'https://ongauqmia.ueniweb.com', 'Auqmia é uma ONG dedicada à proteção e bem-estar dos animais. Fundada em 2005 por um grupo de amantes de animais apaixonados, nossa organização tem uma longa história de compromisso com os animais em situações de risco, abuso e negligência.  Nossa História:  Auqmia começou como uma pequena iniciativa de um grupo de voluntários que compartilhavam um objetivo comum: melhorar a vida dos animais desfavorecidos em nossa comunidade. Com o tempo, nossa paixão e determinação cresceram, e a organização se estabeleceu como uma força positiva na proteção animal. Auqmia se esforça para criar um mundo onde todos os animais vivam com dignidade, amor e respeito. Nossa jornada tem sido marcada por desafios, mas também por triunfos notáveis. Cada animal que resgatamos e cada vida que melhoramos é um testemunho do nosso compromisso.  Ao longo dos anos, nossa organização cresceu e conquistou o apoio de inúmeras pessoas que compartilham nossa paixão por proteger os animais. Juntos, estamos fazendo a diferença na vida dos animais', 'Doe para a ONG Auqmia e Faça a Diferença na Vida dos Animais  Na ONG Auqmia, nosso compromisso é inabalável: proteger e cuidar dos animais mais vulneráveis da nossa sociedade. Seja um amigo dos animais e una-se a nós nesta missão nobre. Cada doação que você fizer é uma gota no oceano de compaixão que muda vidas e salva vidas.  Por que doar para a Auqmia?  Resgate e Reabilitação: Auqmia trabalha incansavelmente para resgatar animais em situações de risco, abuso e negligência. Sua doação ajuda a financiar equipes dedicadas de resgate e programas de reabilitação que transformam vidas.  Cuidados Médicos: Seu apoio contribui para o fornecimento de cuidados médicos, cirurgias e tratamentos veterinários de qualidade para animais doentes e feridos, restaurando sua saúde e felicidade.  Adoção Responsável: Auqmia promove a adoção responsável e realiza esforços incansáveis para encontrar lares amorosos para animais abandonados e resgatados. Sua doação ajuda a tornar isso possível.  Conscientização e Educação: Nós acredi', 'Direito dos Animais', '../public/img/1701836240_1700265329_auq1.jpg;../public/img/1701836240_1700265329_auq2.jpg;../public/img/1701836240_1700265329_auq3.webp;../public/img/1701836240_1700265329_auq4.webp;../public/img/1701836240_1700265329_auq5.jpg'),
(4, '../public/img/1701836405.png', 'Camav', 'contato@casadeamparoamigosdavida.com.br', '$2y$10$ipGygShapb10FUikDQNjV.ElxoJRcgC3SOPusqWW01ApkYCEntxXO', '(031) 3436-3467', 'São Paulo', 'https://novo.casadeamparoamigosdavida.com.br', 'A Associação trabalha na captação de recursos e gestão de projetos sociais, que asseguram melhor qualidade de vida às pessoas portadoras de câncer. O depoimento de nossos assistidos é a expressão maior dos resultados que temos alcançado. Conheça a história de pessoas que lutam em favor da vida e saiba mais sobre a construção de relações produtivas e de boa vontade com nossos parceiros. Se você conhece as ações promovidas pela Casa de Amparo Amigos da Vida, participa direta ou indiretamente das atividades da associação, escreva-nos um depoimento, teremos imenso prazer em compartilhá-lo em nosso site.', 'A CAMAV (Casa de Amparo Amigos da Vida) tem como objetivo amenizar as dificuldades. ​ A Associação conta com o bom desempenho do trabalho social, atribuído pela Assistente Social Marlene, que com empenho e carinho tem tratado dos interesses dos assistidos  A Associação Camav, não recebe ajuda governamental. E é através de sua contribuição que conseguimos manter nosso trabalho em prol de vidas. O Mérito do nosso sucesso, é todos de vocês contribuintes e pessoas caridosas.', 'Assistência Social', '../public/img/1701836405_camav1.webp;../public/img/1701836405_camav2.webp;../public/img/1701836405_camav3.webp');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `img`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$iJOCGODqrh0.7nfu5X7tbueRet0Lo6foYJnlbvcsOkJTc5pIvUTOe', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `ongs`
--
ALTER TABLE `ongs`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `ongs`
--
ALTER TABLE `ongs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
