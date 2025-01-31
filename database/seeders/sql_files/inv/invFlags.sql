-- MySQL dump 10.19  Distrib 10.3.38-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: sdeyaml
-- ------------------------------------------------------
-- Server version	10.3.38-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `invFlags`
--

DROP TABLE IF EXISTS `invFlags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invFlags` (
  `flagID` int(11) NOT NULL,
  `flagName` varchar(200) DEFAULT NULL,
  `flagText` varchar(100) DEFAULT NULL,
  `orderID` int(11) DEFAULT NULL,
  PRIMARY KEY (`flagID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invFlags`
--

LOCK TABLES `invFlags` WRITE;
/*!40000 ALTER TABLE `invFlags` DISABLE KEYS */;
INSERT INTO `invFlags` VALUES (0,'None','None',0),(1,'Wallet','Wallet',10),(2,'Offices','OfficeFolder',0),(3,'Wardrobe','Wardrobe',0),(4,'Hangar','Hangar',30),(5,'Cargo','Cargo',3000),(6,'OfficeImpound','Impounded Offices',0),(7,'Skill','Skill',15),(8,'Reward','Reward',17),(11,'LoSlot0','Low power slot 1',0),(12,'LoSlot1','Low power slot 2',0),(13,'LoSlot2','Low power slot 3',0),(14,'LoSlot3','Low power slot 4',0),(15,'LoSlot4','Low power slot 5',0),(16,'LoSlot5','Low power slot 6',0),(17,'LoSlot6','Low power slot 7',0),(18,'LoSlot7','Low power slot 8',0),(19,'MedSlot0','Medium power slot 1',0),(20,'MedSlot1','Medium power slot 2',0),(21,'MedSlot2','Medium power slot 3',0),(22,'MedSlot3','Medium power slot 4',0),(23,'MedSlot4','Medium power slot 5',0),(24,'MedSlot5','Medium power slot 6',0),(25,'MedSlot6','Medium power slot 7',0),(26,'MedSlot7','Medium power slot 8',0),(27,'HiSlot0','High power slot 1',0),(28,'HiSlot1','High power slot 2',0),(29,'HiSlot2','High power slot 3',0),(30,'HiSlot3','High power slot 4',0),(31,'HiSlot4','High power slot 5',0),(32,'HiSlot5','High power slot 6',0),(33,'HiSlot6','High power slot 7',0),(34,'HiSlot7','High power slot 8',0),(35,'Fixed Slot','Fixed Slot',0),(36,'AssetSafety','Asset Safety',0),(56,'Capsule','Capsule',0),(57,'Pilot','Pilot',0),(61,'Skill In Training','Skill in training',0),(62,'CorpMarket','Corporation Market Deliveries / Returns',0),(63,'Locked','Locked item, can not be moved unless unlocked',0),(64,'Unlocked','Unlocked item, can be moved',0),(70,'Office Slot 1','Office slot 1',0),(71,'Office Slot 2','Office slot 2',0),(72,'Office Slot 3','Office slot 3',0),(73,'Office Slot 4','Office slot 4',0),(74,'Office Slot 5','Office slot 5',0),(75,'Office Slot 6','Office slot 6',0),(76,'Office Slot 7','Office slot 7',0),(77,'Office Slot 8','Office slot 8',0),(78,'Office Slot 9','Office slot 9',0),(79,'Office Slot 10','Office slot 10',0),(80,'Office Slot 11','Office slot 11',0),(81,'Office Slot 12','Office slot 12',0),(82,'Office Slot 13','Office slot 13',0),(83,'Office Slot 14','Office slot 14',0),(84,'Office Slot 15','Office slot 15',0),(85,'Office Slot 16','Office slot 16',0),(86,'Bonus','Bonus',0),(87,'DroneBay','Drone Bay',0),(88,'Booster','Booster',0),(89,'Implant','Implant',0),(90,'ShipHangar','Ship Hangar',0),(91,'ShipOffline','Ship Offline',0),(92,'RigSlot0','Rig power slot 1',0),(93,'RigSlot1','Rig power slot 2',0),(94,'RigSlot2','Rig power slot 3',0),(95,'RigSlot3','Rig power slot 4',0),(96,'RigSlot4','Rig power slot 5',0),(97,'RigSlot5','Rig power slot 6',0),(98,'RigSlot6','Rig power slot 7',0),(99,'RigSlot7','Rig power slot 8',0),(115,'CorpSAG1','Corp Security Access Group 1',0),(116,'CorpSAG2','Corp Security Access Group 2',0),(117,'CorpSAG3','Corp Security Access Group 3',0),(118,'CorpSAG4','Corp Security Access Group 4',0),(119,'CorpSAG5','Corp Security Access Group 5',0),(120,'CorpSAG6','Corp Security Access Group 6',0),(121,'CorpSAG7','Corp Security Access Group 7',0),(122,'SecondaryStorage','Secondary Storage',0),(125,'SubSystem0','Sub system slot 0',0),(126,'SubSystem1','Sub system slot 1',0),(127,'SubSystem2','Sub system slot 2',0),(128,'SubSystem3','Sub system slot 3',0),(129,'SubSystem4','Sub system slot 4',0),(130,'SubSystem5','Sub system slot 5',0),(131,'SubSystem6','Sub system slot 6',0),(132,'SubSystem7','Sub system slot 7',0),(133,'SpecializedFuelBay','Specialized Fuel Bay',0),(134,'SpecializedAsteroidHold','Specialized Asteroid Hold',0),(135,'SpecializedGasHold','Specialized Gas Hold',0),(136,'SpecializedMineralHold','Specialized Mineral Hold',0),(137,'SpecializedSalvageHold','Specialized Salvage Hold',0),(138,'SpecializedShipHold','Specialized Ship Hold',0),(139,'SpecializedSmallShipHold','Specialized Small Ship Hold',0),(140,'SpecializedMediumShipHold','Specialized Medium Ship Hold',0),(141,'SpecializedLargeShipHold','Specialized Large Ship Hold',0),(142,'SpecializedIndustrialShipHold','Specialized Industrial Ship Hold',0),(143,'SpecializedAmmoHold','Specialized Ammo Hold',0),(144,'StructureActive','Structure Active',0),(145,'StructureInactive','Structure Inactive',0),(146,'JunkyardReprocessed','This item was put into a junkyard through reprocession.',0),(147,'JunkyardTrashed','This item was put into a junkyard through being trashed by its owner.',0),(148,'SpecializedCommandCenterHold','Specialized Command Center Hold',0),(149,'SpecializedPlanetaryCommoditiesHold','Specialized Planetary Commodities Hold',0),(150,'PlanetSurface','Planet Surface',0),(151,'SpecializedMaterialBay','Specialized Material Bay',0),(152,'DustCharacterDatabank','Dust Character Databank',0),(153,'DustCharacterBattle','Dust Character Battle',0),(154,'QuafeBay','Quafe Bay',0),(155,'FleetHangar','Fleet Hangar',0),(156,'HiddenModifiers','Hidden Modifiers',0),(157,'StructureOffline','Structure Offline',0),(158,'FighterBay','Fighter Bay',0),(159,'FighterTube0','Fighter Tube 0',0),(160,'FighterTube1','Fighter Tube 1',0),(161,'FighterTube2','Fighter Tube 2',0),(162,'FighterTube3','Fighter Tube 3',0),(163,'FighterTube4','Fighter Tube 4',0),(164,'StructureServiceSlot0','Structure service slot 1',0),(165,'StructureServiceSlot1','Structure service slot 2',0),(166,'StructureServiceSlot2','Structure service slot 3',0),(167,'StructureServiceSlot3','Structure service slot 4',0),(168,'StructureServiceSlot4','Structure service slot 5',0),(169,'StructureServiceSlot5','Structure service slot 6',0),(170,'StructureServiceSlot6','Structure service slot 7',0),(171,'StructureServiceSlot7','Structure service slot 8',0),(172,'StructureFuel','Structure Fuel',0),(173,'Deliveries','Deliveries',0),(174,'CrateLoot','Crate Loot',0),(176,'BoosterBay','Booster Hold',0),(177,'SubsystemBay','Subsystem Hold',0),(178,'Raffles','Raffles Hangar',0),(179,'FrigateEscapeBay','Frigate escape bay Hangar',0),(180,'StructureDeedBay','Structure Deed Bay',0),(181,'SpecializedIceHold','Specialized Ice Hold',0),(182,'SpecializedAsteroidHold','Specialized Asteroid Hold',0),(183,'MobileDepot','Mobile Depot',0),(184,'CorpProjectsHangar','Corporation Projects Hangar ',0);
/*!40000 ALTER TABLE `invFlags` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-28 18:28:48
