-- MySQL dump 10.13  Distrib 5.1.69, for redhat-linux-gnu (x86_64)
--
-- Host: localhost    Database: zendfactory
-- ------------------------------------------------------
-- Server version	5.1.69

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
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `externalid` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `summary` longtext COLLATE utf8_unicode_ci,
  `companyname` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `companysize` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `companytype` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `industry` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `startdate` datetime DEFAULT NULL,
  `enddate` datetime DEFAULT NULL,
  `current` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D69FE57CCCFA12B8` (`profile_id`),
  CONSTRAINT `FK_D69FE57CCCFA12B8` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `positions`
--

LOCK TABLES `positions` WRITE;
/*!40000 ALTER TABLE `positions` DISABLE KEYS */;
/*!40000 ALTER TABLE `positions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profiles` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `user_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `firstName` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastName` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `middlename` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address1` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address2` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `workEmail` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedinurl` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile` longtext COLLATE utf8_unicode_ci,
  `notes` longtext COLLATE utf8_unicode_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8B308530A76ED395` (`user_id`),
  CONSTRAINT `FK_8B308530A76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES ('868aa604-e41b-11e3-9d21-bc764e088289',NULL,'Finbarr',NULL,'McCarthy',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2014-05-25 15:47:42','2014-05-25 15:47:42'),('9',NULL,'David',NULL,'Mathews',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2014-05-25 15:48:19','2014-05-25 19:58:27'),('a437d4c4-e43e-11e3-9d21-bc764e088289',NULL,'John',NULL,'Smith',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2014-05-25 19:59:04','2014-05-25 19:59:04');
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `roleId` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_57698A6AB8C2FD88` (`roleId`),
  KEY `IDX_57698A6A727ACA70` (`parent_id`),
  CONSTRAINT `FK_57698A6A727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,NULL,'guest'),(2,1,'user'),(3,2,'candidate'),(4,2,'mahe'),(5,2,'recruiter'),(6,5,'manager'),(7,2,'administrator');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_password_reset`
--

DROP TABLE IF EXISTS `user_password_reset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_password_reset` (
  `request_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `request_time` datetime NOT NULL,
  PRIMARY KEY (`request_key`),
  UNIQUE KEY `UNIQ_DA84AD0BA76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_password_reset`
--

LOCK TABLES `user_password_reset` WRITE;
/*!40000 ALTER TABLE `user_password_reset` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_password_reset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_provider`
--

DROP TABLE IF EXISTS `user_provider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_provider` (
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `provider_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`,`provider_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_provider`
--

LOCK TABLES `user_provider` WRITE;
/*!40000 ALTER TABLE `user_provider` DISABLE KEYS */;
INSERT INTO `user_provider` VALUES ('61a7e932-dc23-11e3-9d21-bc764e088289','6vWhrB2Ygc','linkedIn');
/*!40000 ALTER TABLE `user_provider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin` longtext COLLATE utf8_unicode_ci,
  `displayName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`),
  UNIQUE KEY `UNIQ_1483A5E9F85E0677` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('61a7e932-dc23-11e3-9d21-bc764e088289',NULL,'finmccarthy@gmail.com','{\"identifier\":\"6vWhrB2Ygc\",\"webSiteURL\":null,\"profileURL\":\"http:\\/\\/www.linkedin.com\\/in\\/finbarr\",\"photoURL\":\"{\\\"@attributes\\\":{\\\"total\\\":\\\"1\\\"},\\\"picture-url\\\":\\\"http:\\\\\\/\\\\\\/m.c.lnkd.licdn.com\\\\\\/mpr\\\\\\/mprx\\\\\\/0_7BV2G2X3J03wRX9nIXvGGDbSsfYwZ_VnIzkTXSq7cU0HxCe4WbUhQFDEIp3\\\"}\",\"displayName\":\"Finbarr McCarthy\",\"description\":\"\",\"firstName\":\"Finbarr\",\"lastName\":\"McCarthy\",\"gender\":null,\"language\":null,\"age\":null,\"birthDay\":null,\"birthMonth\":null,\"birthYear\":null,\"email\":\"finmccarthy@gmail.com\",\"emailVerified\":\"finmccarthy@gmail.com\",\"phone\":null,\"address\":null,\"country\":null,\"region\":null,\"city\":null,\"zip\":null,\"headline\":\"IT & Internet Strategist, Digital Marketing, Social Media & Cloud Computing\",\"positions\":\"{\\\"@attributes\\\":{\\\"total\\\":\\\"3\\\"},\\\"position\\\":[{\\\"id\\\":\\\"209230155\\\",\\\"title\\\":\\\"Technology Transformation\\\",\\\"summary\\\":{},\\\"start-date\\\":{\\\"year\\\":\\\"2011\\\",\\\"month\\\":\\\"1\\\"},\\\"is-current\\\":\\\"true\\\",\\\"company\\\":{\\\"id\\\":\\\"16175\\\",\\\"name\\\":\\\"Premier Group\\\",\\\"size\\\":\\\"501-1000 employees\\\",\\\"type\\\":\\\"Privately Held\\\",\\\"industry\\\":\\\"Staffing and Recruiting\\\"}},{\\\"id\\\":\\\"209230958\\\",\\\"title\\\":\\\"Founder\\\",\\\"summary\\\":{},\\\"start-date\\\":{\\\"year\\\":\\\"2009\\\",\\\"month\\\":\\\"12\\\"},\\\"is-current\\\":\\\"true\\\",\\\"company\\\":{\\\"name\\\":\\\"Ogogo Internet Ltd\\\",\\\"industry\\\":\\\"Internet\\\"}},{\\\"id\\\":\\\"12700615\\\",\\\"title\\\":\\\"IT Director\\\",\\\"start-date\\\":{\\\"year\\\":\\\"1997\\\",\\\"month\\\":\\\"1\\\"},\\\"end-date\\\":{\\\"year\\\":\\\"2011\\\",\\\"month\\\":\\\"8\\\"},\\\"is-current\\\":\\\"false\\\",\\\"company\\\":{\\\"id\\\":\\\"16175\\\",\\\"name\\\":\\\"Premier Group\\\",\\\"size\\\":\\\"501-1000 employees\\\",\\\"type\\\":\\\"Privately Held\\\",\\\"industry\\\":\\\"Staffing and Recruiting\\\"}}]}\",\"associations\":\"{\\\"0\\\":\\\"MIET. IEEE. MBCS.\\\"}\",\"interests\":\"{\\\"0\\\":\\\"Cloud Computing, Web strategy, Social Media and its integration into new world enterprise - particularly.\\\\nIntelligent use of technology.\\\\nOpportunities and risks associated with the vast skill-base becoming available in emerging countries.\\\\nAttracting talent to consider careers in technology.\\\"}\",\"languages\":\"{}\",\"skills\":\"{\\\"@attributes\\\":{\\\"total\\\":\\\"12\\\"},\\\"skill\\\":[{\\\"id\\\":\\\"4\\\",\\\"skill\\\":{\\\"name\\\":\\\"Web Strategy\\\"}},{\\\"id\\\":\\\"5\\\",\\\"skill\\\":{\\\"name\\\":\\\"SEO\\\"}},{\\\"id\\\":\\\"6\\\",\\\"skill\\\":{\\\"name\\\":\\\"Cloud Computing\\\"}},{\\\"id\\\":\\\"7\\\",\\\"skill\\\":{\\\"name\\\":\\\"Enterprise Software\\\"}},{\\\"id\\\":\\\"8\\\",\\\"skill\\\":{\\\"name\\\":\\\"IT Strategy\\\"}},{\\\"id\\\":\\\"9\\\",\\\"skill\\\":{\\\"name\\\":\\\"Talent Management\\\"}},{\\\"id\\\":\\\"10\\\",\\\"skill\\\":{\\\"name\\\":\\\"Recruiting\\\"}},{\\\"id\\\":\\\"11\\\",\\\"skill\\\":{\\\"name\\\":\\\"Information Technology\\\"}},{\\\"id\\\":\\\"12\\\",\\\"skill\\\":{\\\"name\\\":\\\"Strategy\\\"}},{\\\"id\\\":\\\"13\\\",\\\"skill\\\":{\\\"name\\\":\\\"Start-ups\\\"}},{\\\"id\\\":\\\"14\\\",\\\"skill\\\":{\\\"name\\\":\\\"CRM\\\"}},{\\\"id\\\":\\\"15\\\",\\\"skill\\\":{\\\"name\\\":\\\"SaaS\\\"}}]}\",\"certifications\":\"{}\",\"educations\":\"{\\\"@attributes\\\":{\\\"total\\\":\\\"0\\\"}}\",\"courses\":\"{}\",\"threeCurrentPositions\":\"{\\\"@attributes\\\":{\\\"total\\\":\\\"2\\\"},\\\"position\\\":[{\\\"id\\\":\\\"209230155\\\",\\\"title\\\":\\\"Technology Transformation\\\",\\\"summary\\\":{},\\\"start-date\\\":{\\\"year\\\":\\\"2011\\\",\\\"month\\\":\\\"1\\\"},\\\"is-current\\\":\\\"true\\\",\\\"company\\\":{\\\"id\\\":\\\"16175\\\",\\\"name\\\":\\\"Premier Group\\\",\\\"size\\\":\\\"501-1000 employees\\\",\\\"type\\\":\\\"Privately Held\\\",\\\"industry\\\":\\\"Staffing and Recruiting\\\"}},{\\\"id\\\":\\\"209230958\\\",\\\"title\\\":\\\"Founder\\\",\\\"summary\\\":{},\\\"start-date\\\":{\\\"year\\\":\\\"2009\\\",\\\"month\\\":\\\"12\\\"},\\\"is-current\\\":\\\"true\\\",\\\"company\\\":{\\\"name\\\":\\\"Ogogo Internet Ltd\\\",\\\"industry\\\":\\\"Internet\\\"}}]}\",\"threePastPositions\":\"{\\\"@attributes\\\":{\\\"total\\\":\\\"1\\\"},\\\"position\\\":{\\\"id\\\":\\\"12700615\\\",\\\"title\\\":\\\"IT Director\\\",\\\"start-date\\\":{\\\"year\\\":\\\"1997\\\",\\\"month\\\":\\\"1\\\"},\\\"end-date\\\":{\\\"year\\\":\\\"2011\\\",\\\"month\\\":\\\"8\\\"},\\\"is-current\\\":\\\"false\\\",\\\"company\\\":{\\\"id\\\":\\\"16175\\\",\\\"name\\\":\\\"Premier Group\\\",\\\"size\\\":\\\"501-1000 employees\\\",\\\"type\\\":\\\"Privately Held\\\",\\\"industry\\\":\\\"Staffing and Recruiting\\\"}}}\",\"recommendationsReceived\":\"{\\\"@attributes\\\":{\\\"total\\\":\\\"3\\\"},\\\"recommendation\\\":[{\\\"id\\\":\\\"22555059\\\",\\\"recommendation-type\\\":{\\\"code\\\":\\\"business-partner\\\"},\\\"recommendation-text\\\":\\\"I have known Finbarr for many years through a mutual friend. Although we are a cutting edge EPOS IT company Finbarrs knowledge of IT products and infrastructure services in a larger multi company multi country scenario is second to none. He is my go to resource to receive impartial and knowledgeable advice on such things. He recently took time to advise us on a project we were undertaking in house and gave his services selflessly and as a favor. Apologies about the Sunday morning. Thanks Finn if there were more with your abundance mentality we would all be better off.\\\",\\\"recommender\\\":{\\\"id\\\":\\\"HM3L7B86P9\\\",\\\"first-name\\\":\\\"Gavin\\\",\\\"last-name\\\":\\\"Peacock\\\"}},{\\\"id\\\":\\\"12009904\\\",\\\"recommendation-type\\\":{\\\"code\\\":\\\"business-partner\\\"},\\\"recommendation-text\\\":\\\"I have worked with Finbarr in the past and found him to be a true Professional and extremely Passionate about his work, and the Company Objectives. Finbarr has a fantastic technical ability and is totally committed to delivering the very Best for his Company and his IT Team. He is highly respected in the IT Arena and is a Software Wizard.\\\\nHe continues to challenge himself and his team to achieve maximum rewards for their investment in modern technology.\\\\nThe Premier Group are one of Ireland & U.K. leading Recruitment Organisations and the IT Strategy behind their success is deservedly attributed to Finbarr and his Team. \\\\nFinbarr is a highly Committed Manager and his success is due to his own personal drive and total focus on excellence. \\\\nI would hold his opinion in high regard in all IT related issues.\\\",\\\"recommender\\\":{\\\"id\\\":\\\"p7iqUBdWcK\\\",\\\"first-name\\\":\\\"Declan\\\",\\\"last-name\\\":\\\"Bevan\\\"}},{\\\"id\\\":\\\"1172727\\\",\\\"recommendation-type\\\":{\\\"code\\\":\\\"colleague\\\"},\\\"recommendation-text\\\":\\\"I had the good fortune of working for Finbarr during my time at Premier Recruitment. Finbarr was an excellent person to work for, professional, supportive and always made work fun.\\\\n\\\\nFinbarrs enthusiasm was infectious and his dedication inspirational. I would have absolutely no hesitation in recommending someone to go and work for him.\\\",\\\"recommender\\\":{\\\"id\\\":\\\"F_2mTuF2jf\\\",\\\"first-name\\\":\\\"Alex\\\",\\\"last-name\\\":\\\"Horstmann\\\"}}]}\",\"honorsAwards\":\"{}\"}','Finbarr McCarthy','$2y$14$94BRRWvkRZsZMhfBgb98K.FZYSVY4AN6Gqxq.lnZdeUFNwQ222Hpu'),('98698a34-dc23-11e3-9d21-bc764e088289',NULL,'finbarr@premier.ie',NULL,NULL,'$2y$14$ldMI8LZObnnvZDQJST6creH/13ZdZRSjhDy2iGFXGqt3umFcOAew6'),('bc8d5620-e4ca-11e3-9d21-bc764e088289',NULL,'vipinpk@premiergp.com',NULL,NULL,'$2y$14$VLjVbtBSDhdIHmYlgL8PdeMK3cHQ0aijXmSh73SRJen8Lt/lN2tVK');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_roles`
--

DROP TABLE IF EXISTS `users_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_roles` (
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `IDX_51498A8EA76ED395` (`user_id`),
  KEY `IDX_51498A8ED60322AC` (`role_id`),
  CONSTRAINT `FK_51498A8ED60322AC` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  CONSTRAINT `FK_51498A8EA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_roles`
--

LOCK TABLES `users_roles` WRITE;
/*!40000 ALTER TABLE `users_roles` DISABLE KEYS */;
INSERT INTO `users_roles` VALUES ('61a7e932-dc23-11e3-9d21-bc764e088289',2),('98698a34-dc23-11e3-9d21-bc764e088289',2),('bc8d5620-e4ca-11e3-9d21-bc764e088289',2);
/*!40000 ALTER TABLE `users_roles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-05-27  8:47:13
