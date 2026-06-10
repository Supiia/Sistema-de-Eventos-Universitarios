-- MySQL dump 10.13  Distrib 8.0.45, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: eventos_universitarios
-- ------------------------------------------------------
-- Server version	8.0.44

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `auditoria_reservas`
--

DROP TABLE IF EXISTS `auditoria_reservas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auditoria_reservas` (
  `id_log` int NOT NULL AUTO_INCREMENT,
  `acao` varchar(20) DEFAULT NULL,
  `id_reserva` int DEFAULT NULL,
  `data_hora` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auditoria_reservas`
--

LOCK TABLES `auditoria_reservas` WRITE;
/*!40000 ALTER TABLE `auditoria_reservas` DISABLE KEYS */;
INSERT INTO `auditoria_reservas` VALUES (1,'INSERT',1,'2026-06-10 00:00:22'),(2,'UPDATE',1,'2026-06-10 00:00:40'),(3,'INSERT',2,'2026-06-10 00:49:48'),(4,'INSERT',3,'2026-06-10 00:50:23'),(5,'UPDATE',3,'2026-06-10 00:50:44');
/*!40000 ALTER TABLE `auditoria_reservas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventos`
--

DROP TABLE IF EXISTS `eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eventos` (
  `id_evento` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `descricao` text,
  `data_evento` datetime DEFAULT NULL,
  `local_evento` varchar(100) DEFAULT NULL,
  `vagas_totais` int DEFAULT NULL,
  `vagas_disponiveis` int DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `destaque` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_evento`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos`
--

LOCK TABLES `eventos` WRITE;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
INSERT INTO `eventos` VALUES (1,'Palestra de Inteligência Artificial','Venha descobrir o futuro do desenvolvimento de software e IA no mercado de tecnologia atual.','2026-06-15 19:00:00','Auditório Central - Bloco A',50,49,'https://images.unsplash.com/photo-1591453089816-0fbb971b454c?w=500',1),(2,'Festa de Boas-Vindas dos Calouros','O maior evento de integração universitária do ano com muita música e atrações.','2026-06-20 22:00:00','Espaço de Vivência Acadêmica',150,150,'https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?w=500',0),(3,'Palestra de Inteligência Artificial','Venha descobrir o futuro do desenvolvimento de software e IA no mercado de tecnologia atual.','2026-06-15 19:00:00','Auditório Central - Bloco A',50,50,'https://images.unsplash.com/photo-1591453089816-0fbb971b454c?w=500',1),(4,'Festa de Boas-Vindas dos Calouros','O maior evento de integração universitária do ano com muita música e atrações.','2026-06-20 22:00:00','Espaço de Vivência Acadêmica',150,150,'https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?w=500',0),(5,'Workshop: Drones e Sensores no Campo','Aprenda como o mapeamento aéreo e a análise de dados por sensores estão revolucionando a produtividade e a gestão do agronegócio moderno.','2026-06-16 14:00:00','Laboratório de Inovação - Bloco C',40,40,'https://images.unsplash.com/photo-1527489377706-5bf97e608852?w=800',0),(6,'Automação e Robótica Agrícola','Uma imersão técnica sobre o funcionamento de tratores autônomos, colheitadeiras inteligentes e sistemas embarcados de última geração.','2026-06-17 10:00:00','Galpão de Mecanização - Setor Agro',60,60,'https://images.unsplash.com/photo-1530268578403-df6e89da0d30?w=800',0),(7,'Painel: Pecuária de Precisão 4.0','Discussão com especialistas sobre o uso de IoT, brincos inteligentes e monitoramento biométrico computacional para o manejo de gado de corte e leite.','2026-06-18 16:30:00','Auditório Verde - Prédio Central',80,80,'https://images.unsplash.com/photo-1570042225831-d98fa7577f1e?w=800',0),(8,'Hackathon RUVIR: Soluções Tecnológicas','Participe da maior maratona de programação da UFRA! Desenvolva soluções de software aplicadas aos desafios reais da EXPOAGRO.','2026-06-19 08:00:00','Centro de Convivência Tecnológica',100,100,'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=800',0);
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservas`
--

DROP TABLE IF EXISTS `reservas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservas` (
  `id_reserva` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int DEFAULT NULL,
  `id_evento` int DEFAULT NULL,
  `status` enum('ATIVA','CANCELADA') DEFAULT 'ATIVA',
  `data_reserva` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_reserva`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_evento` (`id_evento`),
  CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id_evento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservas`
--

LOCK TABLES `reservas` WRITE;
/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;
INSERT INTO `reservas` VALUES (1,1,1,'CANCELADA','2026-06-10 00:00:22'),(2,1,1,'ATIVA','2026-06-10 00:49:48'),(3,1,1,'CANCELADA','2026-06-10 00:50:23');
/*!40000 ALTER TABLE `reservas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `perfil` enum('ADMIN','ORGANIZADOR','ALUNO') DEFAULT 'ALUNO',
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Administrador','admin@email.com','Senha123','ADMIN');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-10  1:41:43
