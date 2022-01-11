/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 5.7.33 : Database - trebol_web
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`trebol_web` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci */;

USE `trebol_web`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2010_10_12_000000_crear_tabla_tb_usuarios',1),
(2,'2010_10_13_000000_crear_tabla_tb_empresas',1),
(3,'2010_10_14_000000_crear_tabla_tb_areas',1),
(4,'2010_10_15_000000_crear_tabla_tb_estados',1),
(5,'2010_10_16_000000_crear_tabla_tb_tipo_factura',1),
(6,'2010_10_17_000000_crear_tabla_tb_tipo_doc',1),
(7,'2010_10_18_000000_crear_tabla_tb_proveedores',1),
(8,'2010_10_19_000000_crear_tabla_tb_facturas',1),
(9,'2010_10_20_000000_crear_tabla_tb_documentos',1),
(10,'2010_10_21_000000_crear_tabla_tb_logs',1),
(11,'2010_10_22_000000_crear_tabla_tb_correos',1),
(12,'2014_10_12_100000_create_password_resets_table',1),
(13,'2019_08_19_000000_create_failed_jobs_table',1),
(14,'2019_12_14_000001_create_personal_access_tokens_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `tb_areas` */

DROP TABLE IF EXISTS `tb_areas`;

CREATE TABLE `tb_areas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `area` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_areas` */

insert  into `tb_areas`(`id`,`area`) values 
(1,'Administrativo'),
(2,'Capital Humano'),
(3,'Compras'),
(4,'Contabilidad'),
(5,'Contabilidad_Rev'),
(6,'Correspondencia'),
(7,'Recepción'),
(8,'Tecnología'),
(9,'Tesoreria'),
(10,'AdminTrebol'),
(11,'Sin Grupo'),
(12,'Gestion Ambiental'),
(13,'SST'),
(14,'Operaciones Snider'),
(15,'Seguridad'),
(16,'Area Juridica'),
(17,'Unidad Transporte');

/*Table structure for table `tb_correos` */

DROP TABLE IF EXISTS `tb_correos`;

CREATE TABLE `tb_correos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `factura_id` int(10) unsigned NOT NULL,
  `enviado` tinyint(4) NOT NULL,
  `fecha_h_envio` datetime NOT NULL,
  `destinatarios` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asunto` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mensaje` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_correos_factura` (`factura_id`),
  CONSTRAINT `fk_correos_factura` FOREIGN KEY (`factura_id`) REFERENCES `tb_facturas` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_correos` */

/*Table structure for table `tb_documentos` */

DROP TABLE IF EXISTS `tb_documentos`;

CREATE TABLE `tb_documentos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `factura_id` int(10) unsigned NOT NULL,
  `tipo_doc_id` int(10) unsigned NOT NULL,
  `consecutivo_suno` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ubicacion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_documento_factura` (`factura_id`),
  KEY `fk_tipo_documento` (`tipo_doc_id`),
  CONSTRAINT `fk_documento_factura` FOREIGN KEY (`factura_id`) REFERENCES `tb_facturas` (`id`),
  CONSTRAINT `fk_tipo_documento` FOREIGN KEY (`tipo_doc_id`) REFERENCES `tb_tipo_doc` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_documentos` */

/*Table structure for table `tb_empresas` */

DROP TABLE IF EXISTS `tb_empresas`;

CREATE TABLE `tb_empresas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `empresa` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_empresas` */

insert  into `tb_empresas`(`id`,`empresa`) values 
(1,'Aviomar'),
(2,'Colvan'),
(3,'Snider');

/*Table structure for table `tb_estados` */

DROP TABLE IF EXISTS `tb_estados`;

CREATE TABLE `tb_estados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_estados` */

insert  into `tb_estados`(`id`,`estado`) values 
(1,'Anulada'),
(2,'Aprobación'),
(3,'Aprobación Area'),
(4,'Contabilizar'),
(5,'Corrección'),
(6,'Creación'),
(7,'Finalizada'),
(8,'Gestión'),
(9,'Por Pagar'),
(10,'Programada'),
(11,'Rechazada'),
(12,'Retirada'),
(13,'Revisión'),
(14,'Sin Asignar');

/*Table structure for table `tb_facturas` */

DROP TABLE IF EXISTS `tb_facturas`;

CREATE TABLE `tb_facturas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no_factura` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recibida` date NOT NULL,
  `generada` date NOT NULL,
  `vencimiento` date NOT NULL,
  `fecha_pago` date NOT NULL,
  `valor` double(20,2) NOT NULL,
  `proveedor_id` int(10) unsigned NOT NULL,
  `area_gestion_id` int(10) unsigned NOT NULL,
  `empresa_id` int(10) unsigned NOT NULL,
  `anticipo_vt` tinyint(4) NOT NULL,
  `anticipo_mv` tinyint(4) NOT NULL,
  `radicado` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_proveedor_factura` (`proveedor_id`),
  KEY `fk_area_gestion_factura` (`area_gestion_id`),
  KEY `fk_empresa_factura` (`empresa_id`),
  KEY `fk_estado_factura` (`estado_id`),
  CONSTRAINT `fk_area_gestion_factura` FOREIGN KEY (`area_gestion_id`) REFERENCES `tb_areas` (`id`),
  CONSTRAINT `fk_empresa_factura` FOREIGN KEY (`empresa_id`) REFERENCES `tb_empresas` (`id`),
  CONSTRAINT `fk_estado_factura` FOREIGN KEY (`estado_id`) REFERENCES `tb_estados` (`id`),
  CONSTRAINT `fk_proveedor_factura` FOREIGN KEY (`proveedor_id`) REFERENCES `tb_proveedores` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_facturas` */

/*Table structure for table `tb_logs` */

DROP TABLE IF EXISTS `tb_logs`;

CREATE TABLE `tb_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `factura_id` int(10) unsigned NOT NULL,
  `usuario_id` int(10) unsigned NOT NULL,
  `estado_prev_id` int(10) unsigned NOT NULL,
  `estado_post_id` int(10) unsigned NOT NULL,
  `comentario` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aprobacion` tinyint(4) NOT NULL,
  `revision` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_log_factura` (`factura_id`),
  KEY `fk_log_usuario` (`usuario_id`),
  KEY `fk_log_estado_prev` (`estado_prev_id`),
  KEY `fk_log_estado_post` (`estado_post_id`),
  CONSTRAINT `fk_log_estado_post` FOREIGN KEY (`estado_post_id`) REFERENCES `tb_estados` (`id`),
  CONSTRAINT `fk_log_estado_prev` FOREIGN KEY (`estado_prev_id`) REFERENCES `tb_estados` (`id`),
  CONSTRAINT `fk_log_factura` FOREIGN KEY (`factura_id`) REFERENCES `tb_facturas` (`id`),
  CONSTRAINT `fk_log_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `tb_usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_logs` */

/*Table structure for table `tb_proveedores` */

DROP TABLE IF EXISTS `tb_proveedores`;

CREATE TABLE `tb_proveedores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nit` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `razon_social` varchar(170) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_factura_id` int(10) unsigned NOT NULL,
  `area_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tipo_factura_proveedor` (`tipo_factura_id`),
  KEY `fk_area_proveedor` (`area_id`),
  CONSTRAINT `fk_area_proveedor` FOREIGN KEY (`area_id`) REFERENCES `tb_areas` (`id`),
  CONSTRAINT `fk_tipo_factura_proveedor` FOREIGN KEY (`tipo_factura_id`) REFERENCES `tb_tipo_factura` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=263 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_proveedores` */

insert  into `tb_proveedores`(`id`,`nit`,`razon_social`,`correo`,`direccion`,`telefono`,`tipo_factura_id`,`area_id`,`created_at`,`updated_at`) values 
(1,'800252396','Aguas De Cartagena S.A ESP','www.acuacar.com','CR 13B 26  78 EDF CHAMBACU','6504100',28,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(2,'900021737','Aguas De La Sabana De Bogota S.A',NULL,'GLORIETA SIBERIA KM 5 AUTOPISTA MEDELLIN',NULL,28,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(3,'830112759','Alianza Empresarial Para Un Comercio Seguro Basc','BASCBOGOTA@WBASCO.ORG','CR 7 32 29  P5','7560814',7,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(4,'900437879','Alianza Fiduciaria S.A',NULL,'AV 15 100 43 P 3','6447700',7,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(5,'860531315','Alianza Fiduciaria Sa','wbecerra@alianza.com.co','AV 15 100 43 P4','6447700',4,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(6,'900581589','Ap Consultores Y Auditores S.A.S',NULL,'CALLE 126 7 C 45 INT 301','8113411',21,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(7,'860023129','Asociacion Colombiana De Reumatologia','asoreuma@gmail.com','CL 94  15  32 OF 603','6350840',7,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(8,'860051356','Atlanta Cia De Vigilancia Privada Ltda','COMERCIAL@ATLANTAVIGILANCIA.COM','CL 74 22 69','2120907',30,15,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(9,'830097265','Audi Consultores',NULL,NULL,NULL,21,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(10,'900252600','Camara De Comercio E Industria Colombo Chilena',NULL,'AV 19 120 71 OF 214B','4806051',4,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(11,'900293637','Central Comercializadora De Internet S.A.S','info@centralcomercializadora.com','CL 93 B 11 A 84 LC 409','6355154',25,8,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(12,'860516881','Central Cooperativa De Servicios Funerarios',NULL,'CRA 15 97 60','6460000',11,2,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(13,'900085118','Chocobrand Productos Alimenticios S.A.S',NULL,'TV 22 A 61 C 23 BRR SAN LUIS','3466673',11,2,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(14,'830037248','Codensa S.A',NULL,'CR 13 A 93 66','6016060',28,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(15,'830122566','Colombia Telecomunicaciones S.A ESP','infopagos.ct@telefonica.com','TV 60 114 A 55','7050000 ex76728',28,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(16,'900165105','Colombiahosting S.A.S',NULL,'CL 64 N 5 B OF 305 G CENTRO EMPRESA','4854089',25,8,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(17,'830513729','Combustibles De Colombia S.A','FERNANDO.CHAVEZ@COMBUSCOL.COM','CL 9 46 96 OF 303','5518659',13,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(18,'800153993','Comcel S.A',NULL,'CL 90 14 37','6181818',28,8,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(19,'900308794','Complejo Logistico E Industrial Siberia',NULL,'VDA VUELTA GRANDE MCP DE COTA','3112853379',7,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(20,'51766975','Congote Sanclemente Maria Victoria',NULL,'CL 141 7B 86 APTO 707','6276169',7,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(21,'830063376','Consorcio Exequial  S.A.S',NULL,'CR 11 69 11','3450188',11,2,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(22,'860520547','Cooperativa Multiactiva De La Aviacion Civil Colom','jpuerto@coopedac.com','AV CL 26 100 45 OF 202','4139887',5,2,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(23,'800136505','Datecsa S.A','DATECSABOGOTA@DATECSA.COM','CR 40 12 A 79 ACOPI','6661346',26,8,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(24,'901103485','Digital Plot S.A.S','digitalplot.impresion@gmail.com','CR 5 22 66','2868218',32,3,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(25,'5206','Digital River Ireland Ltd',NULL,'UNIT 153 SHANNON FREE ZONE',NULL,24,8,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(26,'805006014','Directv Colombia Ltda',NULL,'CL 93 16 25','6516000',28,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(27,'900338878','E&M Desarrollo Corporativo Ltda',NULL,NULL,NULL,17,2,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(28,'900749884','Easymail S.A.S','GMATEUS@EASYMAIL.COM.CO','CL 74 22 20','4593522',27,6,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(29,'800135107','Edificio Centro Ejecutivo',NULL,'CR 10 96 25','6101005',7,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(30,'802007670','Electricaribe S.A ESP',NULL,'TR 52 21A 53',NULL,28,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(31,'800126785','Emermedica S.A Servicios De Ambulancia Prepagados','ADMINISTRACION@EMERMEDICA','CR 19 B 168 35','3077098',11,2,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(32,'899999094','Empresa De Acueducto Y Alcantarillado De Bogota',NULL,'CL 24 37 15',NULL,28,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(33,'800135729','Empresa De Recursos Tecnologicos S.A Eps',NULL,'CTRO COMERCIAL PACIFIC TRAVE CENTER','2400000',23,8,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(34,'899999115','Empresa De Telecomunicaciones De Bogota S.A ESP','asuntos.contenciosos@etb.com.co','CR 8 20 56 P9','2422720',28,8,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(35,'800249860','EmpreS.A.S De Energia Del Pacifico S.A ESP','www.epsa.com.co','CL 15 29B 30 AUTOPISTA CALI YUMBO',NULL,28,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(36,'890399003','EmpreS.A.S Municipales De Cali Eic ESP',NULL,'AV 2 N 10 65 CAM TO EMCALI P 3','8856060',28,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(37,'900092385','Epm Telecomunicaciones S.A EPS',NULL,'CR 16 11A SUR 100',NULL,28,8,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(38,'860502844','Federacion Colombiana De Agentes Logisticos En Com','INFO@FITAC.NET','CR 103 25 F 50 OF 106','4135082',4,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(39,'800215227','G4S Technology Colombia S.A','JUAN.OSPINA@CO.G4S.COM','AV CL 26 69 A 51 TO A IN 9 3','7054040',16,15,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(40,'17182808','Guzman Mosquera Fernando','FERNANDO.GUZMAN@KIEHNE-N','VDA LOURDES FCA SAN JOSE CA 1','4227670',20,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(41,'835001396','Hidropacificio S.A Eps','www.hidropacifico.com','DIAG 3 CRA 4','2405002',28,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(42,'802007384','Hvr S.A.S','achtbq@hotmail.com','VIA 40 73 290 OF 715','3537299',7,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(43,'900064320','Inmobiliaria Chaba S En C','flacha90@yahoo.com','CR 7 A 123 24 OF 501','6297585',7,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(44,'900260048','Itsec S.A.S','GERENCIA@ITSECLTDA.NET','AV JIMENEZ 4 03 OF 1302','7510713',14,8,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(45,'830002115','Juan Bautista Salud Ocupacional S.A.S','gerencia@ocupacionaljb.com','AV CR 30 46 86 90','7444003',17,2,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(46,'860039988','Liberty Seguros S.A',NULL,'CL 72 10 07 P 1','3103300',19,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(47,'860509245','M.F Borrero Ospina & Cia',NULL,NULL,NULL,7,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(48,'830079015','Meltec Comunicaciones S.A','info@meltec.com.co','CL 130 A 58 A 29','1444899',6,8,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(49,'900632226','Mensajeros Urbanos','cartera@mensajerosurbanos.com',NULL,'3297445',27,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(50,'900648071','Movil Inc Integradores De Soluciones Moviles',NULL,'CALLE 103 69B 42','8003621',6,8,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(51,'900672953','Nimbutech S.A.S','comercial@nimbutech.com','CR 12 90 20 OF 302','6228320',14,8,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(52,'364905079','Nodriza Us Llc','jc@nodriza.io','2330 PONCE DE LEON BLVD','7862240456',24,8,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(53,'860001449','Optica Colombiana S.A','contab@opticacolombiana.com','CL 72 13 49 P 3','3264500',5,2,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(54,'900905197','Optimizar Logistica S.A.S','gerencia@optimizarlog.com.co','CR 46 22 B 20 ED SALITRE OFFICE','3007485839',21,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(55,'805012921','Patrimonios Autonomos Accion Fiduciaria',NULL,'AV 4 NORTE 4 N 30','6601382',7,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(56,'830123806','Pint Pharma Colombia S.A.S','info@vitalchemlab.com','CR  13 85 39 OF 306','6918688',18,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(57,'900139882','Poligrafia Consultorias E Investigaciones','pedrolo@hotmail.com','CL 162 54 95 CON BRISAS DE SOTAVENTO','6785441',17,2,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(58,'16475800','Edgar Posso Zuniga',NULL,'CL 2 5 B 65 SEC LA BAVARIA','2417393',7,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(59,'900850609','Proyecto Optimus Complejo Empresarial Y Hotelero P','admonoptimusph@gmail.com','CL 26 96 J 90','3223065350',7,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(60,'91438506','Rendon Rueda Ricardo','RRR0512@GMAIL.COM','AC 145 85 80 CA 169','8047703',12,2,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(61,'860500324','Rico Lara Asesorias S.A.S','JORICO@COLOMSAT.NET.CO','CL 94 A 13 91 OF 201 ED C 14','2559027',10,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(62,'900777038','Ruiz Y Alvarez Asociados S.A.S','ruizalvarezasociados@gmail.com','CLL 93B 17 25 OF 209','3099082',9,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(63,'800130907','Salud Total Eps',NULL,NULL,NULL,11,2,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(64,'800250741','Segurtronic Ltda','GERENCIAGENERAL@SEGURTRONIC.COM','CL 47 D 79 39','4441926',29,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(65,'900401393','Servicios En Comunicaciones Y Redes S.A.S','jrebelo@sercomred.net','CR 3 2 37 SEC CENTRO','2402276',23,8,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(66,'890319193','Sistemas De Informacion Empresarial S.A','JCR@SIESA.COM','AV 3 A N 26 N 83','4865888',31,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(67,'900230287','Smart Logistic De Colombia Ltda','smartdecolombia@otlook.com','CR 91 71A 52','4383786',12,2,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(68,'900557095','Suma Arqietctonica S.A.S','CONTABILIDAD@SUMAARQUITECTONICA.COM','CL 87 15 23 OF 603','6362329',7,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(69,'830027602','Super Con Spc S.A.S',NULL,'CALLE 128 B # 58B-47','3003764',22,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(70,'900098537','Syg Soluciones Y Gestion S.A.S','edna.sanchez@sygsolucionesygestion.com','CL 103 C 63 39','6024616',8,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(71,'830043232','Systems Y Computers Technology De Colombia S.A.S',NULL,'AV CL 24 95 A 80 OF 611','7024609',24,8,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(72,'830033294','Trans International Courier S.A.S','OLGARODRIGUEZ@TRANSINTCO.COM','CRA 59 A 44 B 39','2212153',27,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(73,'860075558','Universidad De La Sabana','cartera.financiacion@unisabana.edu.co','km 7 Autopista Norte, Bogotá','8615555',12,2,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(74,'900663216','Vera Tovar Y Pulido Abogados','info@veratypabogados.com','Carrera 47 A # 95-56 of 501','8051341',10,1,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(75,'800209088','Vipers Seguridad',NULL,'CALLE 29 No. 18-81','7867813',17,2,'2019-12-04 08:41:23','2019-12-04 08:41:23'),
(76,'860013777','Camara De Comercio Colombo Americana','N/A','CL 98 22 64 OF 1209','6237088',4,1,'2020-01-02 12:20:13','2020-01-02 12:20:13'),
(77,'900131149','Choco Arte S.A.S','N/A','CRA 71A # 79A - 66','2526337',11,2,'2020-01-02 12:22:57','2020-01-02 12:22:57'),
(78,'901203382','Cosmos Digital Media S.A.S','N/A','CRA 80 E MANZANA M LTE 4 ALAMEDA LA VIVCTORIA PISO 2 OFICINA 2B','6437407',15,8,'2020-01-23 17:21:59','2020-01-23 17:21:59'),
(79,'800249860','Celsia Colombia S.A  E.S.P','servicioalcliente@celsia.com','Calle 15 N° 29B-30 Autopista Cali - Yumbo','(2)3210000',28,1,'2020-02-03 16:55:12','2020-02-03 16:55:12'),
(80,'860530263','Suplimos S.A.S','servicioalcliente@suplimos.com.co','calle 18a # 62-83','4911075',23,3,'2020-10-01 16:22:58','2020-10-01 16:22:58'),
(81,'901335096','Overhaul Service Corp S.A.S','N/A','N/A','N/A',12,3,'2020-10-05 14:19:28','2020-10-05 14:19:28'),
(82,'830000556','Andina Papeles Y Corrugados','N/A','Carrera 15 No. 93A - 62 Oficina 802','638 3000',32,3,'2020-10-05 14:37:35','2020-10-05 14:37:35'),
(83,'805003739','Ferreteria Suministros Industriales S.A.S','erreteriasuministrosventas@hotmail.com','AV 3N 47N 88 SANTIAGO DE CALI - COLOMBIA)','6659110-6659081',32,3,'2020-10-05 14:39:00','2020-10-05 14:39:00'),
(84,'900459157','Papeles Y Empaques Ecologicos S.A.S','info@papelesyempaques.co','CR 66 9 A 61','4140021-3174902884',32,3,'2020-10-05 14:44:05','2020-10-05 14:44:05'),
(85,'830056735','Maderas Gorgonzolas S.A.S','N/A','N/A','N/A',32,3,'2020-10-05 17:00:32','2020-10-05 17:00:32'),
(86,'79539966','John Henry Bohorquez Pinzon','yonborsport@yahoo.com','Calle 2b # 53f-24','5656991',29,3,'2020-10-07 10:00:23','2020-10-07 10:00:23'),
(88,'860026518','Chubb Seguros Colombia S.A','Emisionfacturacionelectronica.co@chubb.com','Carrera 7 71 - 21 Piso 7 Torre B - Edificio Bolsa Valores de Colombia','3266200',29,1,'2020-10-08 16:14:26','2020-10-08 16:14:26'),
(89,'900035819','Floriplast Ltda','N/A','N/A','N/A',32,3,'2020-10-08 16:15:45','2020-10-08 16:15:45'),
(91,'800146092','Ferreteria Dicafer Ltda','contabilidad@dicafer.com','Carrera 16 # 4 - 15','342 03 44',32,3,'2020-10-08 16:32:38','2020-10-08 16:32:38'),
(92,'900069948','Pdm Ingenieria Ltda','PDMINGENIERIALTDA@GMAIL.COM','CARRERA 81J 44 - 52 SUR','454 90 64',15,1,'2020-10-08 16:36:16','2020-10-08 16:36:16'),
(93,'901154043','Segura Stetics S.A.S','N/A','CR 16A 45C 36, MEDELLÍN, Antioquia,','3117627903',32,3,'2020-10-08 16:38:45','2020-10-08 16:38:45'),
(94,'901154043','Segura Stetics S.A.S','info@segurastetics.com','CR 16A 45C 36, MEDELLÍN, Antioquia','3117627903',32,3,'2020-10-08 16:40:24','2020-10-08 16:40:24'),
(95,'860054518','Quintero & Quintero Importadores S.A','info@quinteroimportadores.com','CARRERA 25 15 88','2472914 2472894',32,3,'2020-10-09 13:17:53','2020-10-09 13:17:53'),
(96,'901295387','Integracion De Tecnologia En Seguridad Electronica Y Telecomunicaciones S.A.S','itesesas@hotmail.com','calle 21# 91-50','3157638595',29,1,'2020-10-14 14:26:56','2020-10-14 14:26:56'),
(97,'817000970','Polylon S.A','http://www.polylon.com/','PAQUE IND. ARGELIA BOD. 10, FUNZA','4853468',32,3,'2020-10-14 15:46:47','2020-10-14 15:46:47'),
(98,'901084763','Rch Mantenimiento S.A.S','rchmantenimiento@hotmail.com.co5431','carrera 28a # 63d-29','5425431',15,1,'2020-10-14 16:07:20','2020-10-14 16:07:20'),
(99,'901332658','Consulting Service Polygraph S.A.S','contabilidadcspsas@gmail.com','carrera 29a #74-70','3105175187',17,2,'2020-10-15 15:36:33','2020-10-15 15:36:33'),
(100,'811025289','Novaventa S.A.S','N/A','N/A','N/A',29,1,'2020-10-19 11:29:08','2020-10-19 11:29:08'),
(101,'901281634','Constructione Pyd S.A.S','Constructionepyd.admon@gmail.com','CR 78 8C 18','8011304',31,1,'2020-10-19 11:34:24','2020-10-19 11:34:24'),
(102,'830036503','Alternativa Conceptual S.A.S','N/A','CALLE 144 # 13-62 INT 3','7572308',31,1,'2020-10-19 11:35:45','2020-10-19 11:35:45'),
(103,'900186088','Compañia Nacional De Metrologia S.A.S','soportedepago@conamet.com','Cra 68 C No. 68A - 20','7450499',29,1,'2020-10-19 11:55:33','2020-10-19 11:55:33'),
(104,'811000831','Senco Latin America S.A.S','recepcionfactura@sencolatinamerica.com','KM 38 + 200 MTS VEREDA BELEN','(574)4481570',19,1,'2020-10-19 11:59:09','2020-10-19 11:59:09'),
(106,'830077655','Panamericana Outsourcing S.A','SOLUCIONES@PANAMERICANA.COM.CO','Calle 64 No. 93-95','2916900',29,3,'2020-10-21 14:08:11','2020-10-21 14:08:11'),
(107,'900633325','Infolaft S.A.S','N/A','Cra. 4 # 72a – 35 Oficina 701','3175563',12,1,'2020-10-21 14:11:54','2020-10-21 14:11:54'),
(108,'890318275','Asc Sistemas & Cia. S.A.S','N/A','CARRERA 62 BIS 6 A 77 CALI - VALLE DEL CAUCA','5519089-3758907',32,3,'2020-10-23 12:06:20','2020-10-23 12:06:20'),
(109,'901342748','Ferrealiados Jv S.A.S','ferrealiadosjv@outlook.com','CL 15 25 20','6958134',32,3,'2020-10-23 12:08:04','2020-10-23 12:08:04'),
(110,'900298011','Wasabi Design S.A.S','info@wasabi.com.co','Cra. 49B # 105 - 36 OFC. 302','3015415115',31,8,'2020-10-23 13:31:33','2020-10-23 13:31:33'),
(111,'900131119','Promotora De Negocios Y Consultoria T & T Co. Ltda','PTAUTA@GMAIL.COM','CRA 15 85 61','3503922076',8,1,'2020-10-26 11:41:12','2020-10-26 11:41:12'),
(112,'900886655','Ticplus S.A.S','contactenos@ticplus.co','CALLE 183 NO. 11-55 BL 4 APTO 302','8046575 - 3168231982',32,3,'2020-10-26 11:44:19','2020-10-26 11:44:19'),
(113,'830000556','Papeles Y Corrugados Andina S.A','efacturacionelectronica@corrugadosandina.com.co','Carrera 15 No. 93A - 62 Oficina 802','638 3000',32,3,'2020-10-26 11:46:53','2020-10-26 11:46:53'),
(114,'900834719','Dataservicios Y Comunicaciones S.A.S','administrativo@dataservic.com','AUT MEDELLIN KM 3.5 CENTRO EMPRESARIAL METROPOLITANO OFC B26 PISO 3','5082140',29,3,'2020-10-30 15:59:04','2020-10-30 15:59:04'),
(115,'830005293','Detalfrag S.A.S','info@detalgraf.com','Medellìn Vía Siberia Costado Sur Bodega 90-2 Entrada G Funza - Cundinamarca','2772800',32,3,'2020-10-30 16:21:01','2020-10-30 16:21:01'),
(116,'900472895','Afcom S.A.S','N/A','N/A','N/A',32,3,'2020-11-03 08:35:57','2020-11-03 08:35:57'),
(117,'901268824','Nodriza S.A.S','lq@nodriza.io','Carrera 7 # 156 - 80 Of 905 North Point II, Bogotá D.C., Bogotá, D.C.','3115213448',14,8,'2020-11-03 08:39:26','2020-11-03 08:39:26'),
(118,'900232810','Tecniformas Plasticas S.A.S','N/A','N/A','N/A',32,3,'2020-11-04 08:20:38','2020-11-04 08:20:38'),
(119,'900750381','Smart Dotaciones S.A.S','N/A','N/A','N/A',32,3,'2020-11-04 08:22:48','2020-11-04 08:22:48'),
(120,'900931363','Lomutech S.A.S','comercial@lomutech.com - gerencia@lomutech.com','Calle 137A # 58 - 70 OF 2-1302','3017122022',32,3,'2020-11-05 10:45:52','2020-11-05 10:45:52'),
(121,'900154749','Mk Advance S.A.S','N/A','N/A','N/A',32,3,'2020-11-06 12:15:13','2020-11-06 12:15:13'),
(122,'9005507065','Proteccion Integral Outsourcing S','contabilidad@prointe.co','CR. 28b # 72-35','3103058278',12,2,'2020-11-09 16:46:42','2020-11-09 16:46:42'),
(123,'900019478','Braunker Ingenieria S.A.S','N/A','N/A','N/A',29,1,'2020-11-12 14:00:02','2020-11-12 14:00:02'),
(124,'860530386','Proveedores Para Sistemas Y Cia S.A.S','facturaelectronica@proveesistemas.com','CR 16 79 31','5301818',32,3,'2020-11-19 08:52:11','2020-11-19 08:52:11'),
(125,'900249780','Partners Consulting Corporation','N/A','Calle85 No. 19A -25 OF 302A','5306780',20,1,'2020-11-19 08:54:34','2020-11-19 08:54:34'),
(126,'52498452','Edith Solanyi Lopez Gonzalez','N/A','N/A','N/A',32,3,'2020-11-19 08:55:51','2020-11-19 08:55:51'),
(127,'830114239','Manufacturas El Venado S.A.S','N/A','CALLE 17 SUR 25 10 PISO 2','7420659',32,3,'2020-11-26 14:09:03','2020-11-26 14:09:03'),
(128,'830075498','Metamorfica Arquitectura S.A.S','N/A','N/A','N/A',32,1,'2020-11-27 13:28:23','2020-11-27 13:28:23'),
(130,'IE6364992H','Adobe Systems Software Ireland Ltd','N/A','N/A','N/A',11,8,'2020-11-30 09:07:55','2020-11-30 09:07:55'),
(131,'77-0793581','Google Llc','N/A','N/A','N/A',11,8,'2020-11-30 15:27:52','2020-11-30 15:27:52'),
(132,'900508116','Unisto S.A.S','N/A','CL 79 B SUR 50 150 IN 177 CENTRO EMPRESARIAL PROMISION','4448393',32,3,'2020-12-01 15:55:57','2020-12-01 15:55:57'),
(133,'900701123','La2 Agencia Boutique S.A.S','paula@la2.com.co','CR 16 93 78 OF 909 ED SEKI','3102279847',23,8,'2020-12-01 15:57:45','2020-12-01 15:57:45'),
(134,'8300481229','Ciudad Limpia Bogota S.A. E.S.P','linea110@proceraseo.com','AV. BOYACA #6B-20','110',22,1,'2020-12-04 10:00:45','2020-12-04 10:00:45'),
(135,'860007229','Unimaq S. A','N/A','N/A','N/A',32,14,'2020-12-11 15:23:09','2020-12-11 15:23:09'),
(136,'901165834','Domat Metrologia S.A.S','contabilidad@domatmetrologia.com','Carrera 73 B 10 A -17 Oficina 101','3003237',15,3,'2020-12-11 16:18:00','2020-12-11 16:18:00'),
(137,'901057107','Hidraulicos Solano S.A.S','gerencia@hidraulicossolano.com','Av Calle 22 N° 109 A -36','3944382',15,3,'2020-12-16 09:31:11','2020-12-16 09:31:11'),
(138,'901104309','Vm Ingenieria Soluciones Integrales S.A.S','camilo.bravo@vmingenieriasol.com','CALLE 64 I N° 71B-21','3204555224',15,1,'2020-12-17 10:47:06','2020-12-17 10:47:06'),
(139,'900246497','Biopolimeros Industriales Ltda','administrativo@biopolab.com','CRA 18 N° 63 A-50','5405700',15,1,'2020-12-17 11:16:33','2020-12-17 11:16:33'),
(140,'900646882','Montacargas Y Soluciones Logisticas Integrales S.A.S','mcubillos@msli.co','Km 2 Via Madrid Parque Industrial San Gregorio Bodega 19','8205848',7,1,'2020-12-17 11:46:57','2020-12-17 11:46:57'),
(141,'901308911','Montacol Corp S.A.S','Montacolcorpsas@gmail.com','KM 4 5VTE CAJICA ZIPAQUIRA CONJ LOS ROBLES CASA 227','3192986308',7,1,'2020-12-17 12:08:23','2020-12-17 12:08:23'),
(142,'900279151','Metrologic Colombia S.A.S','P','CRA 32 A N° 10A -70','3876490',15,1,'2020-12-17 13:05:12','2020-12-17 13:05:12'),
(143,'900437879','Fondo Cerrado Inmobiliario Alianza','cmorales@alianza.com.co','CRA 15 N° 82-99','6447700',7,1,'2020-12-18 05:35:23','2020-12-18 05:35:23'),
(144,'86001623','Impar Monofilamentos Perez Y Cia S En C','ventas@impar.com.co','CALLE 14A NO 123-20','7461246',32,3,'2020-12-18 11:22:48','2020-12-18 11:22:48'),
(145,'900479114','Nacional De Montacargas S.A.S','gerencia@nacionaldemontacargas.com.co','CALLE 3 SUR N. 8-59 TO 2 APT 306','3144384648',12,1,'2020-12-21 22:11:58','2020-12-21 22:11:58'),
(146,'900957534','Enlace Ambiental S.A.S','enlace.ambiental.bogota@gmail.com','CARRERA 97 N° 65-51 ','9371570',15,1,'2020-12-22 10:56:15','2020-12-22 10:56:15'),
(147,'900043394','Dimatic Sistemas De Marcacion S.A.S','contacto@dimatic.net','CRA 26 N° 68-79','3291322',32,3,'2020-12-22 12:00:41','2020-12-22 12:00:41'),
(148,'830122139','Inversiones Berodi S.A.S','berodi2003@hotmail.com','CALLE 52 A N° 85G-24','2954938',32,3,'2020-12-23 14:59:33','2020-12-23 14:59:33'),
(149,'901214424','Siete Trece S.A.S','N/A','N/A','N/A',32,1,'2020-12-29 17:36:53','2020-12-29 17:36:53'),
(150,'900374555','Quick Clean','N/A','N/A','N/A',22,1,'2021-01-12 08:14:32','2021-01-12 08:14:32'),
(151,'900305058','Servi Integrales Electricos S.A.S','N/A','N/A','N/A',7,1,'2021-01-12 09:35:59','2021-01-12 09:35:59'),
(152,'830005165','Induprint S.A.S','N/A','N/A','N/A',32,3,'2021-01-13 12:28:40','2021-01-13 12:28:40'),
(153,'830020730','Surtiretenes Y Rodamientos Ltda','N/A','N/A','N/A',15,1,'2021-01-13 12:31:35','2021-01-13 12:31:35'),
(155,'900471414','Origin It S.A.S','N/A','CARRERA 12 No.79-32 OF. 703','467446',32,3,'2021-01-18 10:41:16','2021-01-18 10:41:16'),
(157,'860000888','Saravia Bravo S.A.S','N/A','N/A','N/A',15,1,'2021-01-22 11:16:04','2021-01-22 11:16:04'),
(158,'860351576','Confecciones Taller 84 Ltda','N/A','N/A','N/A',32,3,'2021-01-26 16:55:20','2021-01-26 16:55:20'),
(159,'800057113','Tecnimotor S.A.S','N/A','N/A','N/A',32,3,'2021-02-08 10:40:37','2021-02-08 10:40:37'),
(160,'900497459','Cajas Y Derivados Rocajas S.A.S','rocajas_sas@hotmail.com','Carrera 108 # 21 18','4943378',32,3,'2021-02-08 10:43:00','2021-02-08 10:43:00'),
(161,'901367109','Ferredrywall Pluss S.A.S','N/A','N/A','N/A',32,3,'2021-02-08 14:11:43','2021-02-08 14:11:43'),
(163,'860009323','Quintero Hermanos Ltda','N/A','N/A','N/A',32,3,'2021-02-10 17:05:56','2021-02-10 17:05:56'),
(164,'800000000','Proveedor De Prueba','N/A','N/A','N/A',31,8,'2021-02-15 09:48:12','2021-02-15 09:48:12'),
(165,'901210380','Anza Caelum S.A.S',NULL,'CARRERA 72 B 6 D 71, Bogotá D.C.,','3204524770',33,12,'2021-02-15 12:02:31','2021-02-15 12:02:31'),
(166,'900946151','Operaciones Seguras Y Equipos De Colombia S.A.S',NULL,'Carrera 53 D Bis No. 4 C - 43 Bogotá','3099383',12,14,'2021-02-15 12:06:07','2021-02-15 12:06:07'),
(167,'800231492','Furgones ESPeciales','N/A','N/A','N/A',32,1,'2021-02-18 09:19:48','2021-02-18 09:19:48'),
(168,'900036968','Dasa High Technologi S.A.S','N/A','N/A','N/A',32,3,'2021-02-22 11:21:51','2021-02-22 11:21:51'),
(169,'860517479','Security Sistems De Colombia S.A.S','N/A','N/A','N/A',15,3,'2021-02-22 11:28:05','2021-02-22 11:28:05'),
(171,'900396759','Chilco Distribuidora De Gas Y Energia S.A.S. E.S.P','N/A','N/A','N/A',32,14,'2021-02-22 16:46:07','2021-02-22 16:46:07'),
(172,'900165362','Idea2 S.A.S','N/A','N/A','N/A',32,3,'2021-02-26 11:59:58','2021-02-26 11:59:58'),
(173,'900420714','Cy Cf S.A.S','N/A','N/A','N/A',7,14,'2021-03-04 08:40:49','2021-03-04 08:40:49'),
(174,'900481203','Montajes Ingemet S.A.S.','N/A','N/A','N/A',15,1,'2021-03-09 11:54:29','2021-03-09 11:54:29'),
(175,'860009578','Seguros Del Estado','N/A','N/A','N/A',19,1,'2021-03-11 09:34:01','2021-03-11 09:34:01'),
(176,'860517479','Incolfadex Equipos Contra Incendios S.A.S','N/A','N/A','N/A',15,13,'2021-03-12 09:05:02','2021-03-12 09:05:02'),
(177,'800206834','Grupo Arco Iris P.L.B S.A.S','N/A','N/A','N/A',32,3,'2021-03-12 09:08:25','2021-03-12 09:08:25'),
(178,'900352786','Risks International S.A.S','contabilidad@risksint.com','CALLE 25 B 39 A 30','7941834',24,8,'2021-03-15 17:21:00','2021-03-15 17:21:00'),
(179,'901135993','Comsecol S.A.S','N/A','N/A','N/A',32,3,'2021-03-23 11:22:09','2021-03-23 11:22:09'),
(180,'900862941','Tres60 Comunicacion Grafica S.A.S','N/A','N/A','N/A',32,3,'2021-03-24 16:40:29','2021-03-24 16:40:29'),
(181,'900704591','Procplag S.A.S','N/A','N/A','N/A',15,1,'2021-04-07 11:13:16','2021-04-07 11:13:16'),
(182,'830120839','Multisuministros Industriales S.A.S','N/A','N/A','N/A',32,3,'2021-04-14 10:02:48','2021-04-14 10:02:48'),
(183,'900135971','Salud Visual Empresarial Ocupacional Eu','N/A','N/A','N/A',11,2,'2021-04-14 10:05:18','2021-04-14 10:05:18'),
(184,'830003183','Corporacion De Investigaciones Asesorias Y Altos Estudios Empresariales','N/A','N/A','N/A',8,1,'2021-04-20 15:52:50','2021-04-20 15:52:50'),
(185,'830037737','Clinica Dover S.A.S','N/A','N/A','N/A',11,2,'2021-04-21 11:50:21','2021-04-21 11:50:21'),
(186,'900154550','Snider Ferrate Sociedad En Comandita Por Acciones','N/A','N/A','N/A',31,1,'2021-04-23 18:14:16','2021-04-23 18:14:16'),
(187,'830138711','Buritica Abogados S.A.S','N/A','N/A','N/A',31,1,'2021-04-23 18:16:01','2021-04-23 18:16:01'),
(188,'900842924','Oil, Gas & Energy Attorneys S.A.S.','N/A','N/A','N/A',10,1,'2021-04-26 16:04:51','2021-04-26 16:04:51'),
(189,'600019174','Lacoste Juan Jose','N/A','N/A','N/A',10,16,'2021-04-27 14:17:11','2021-04-27 14:17:11'),
(191,'900958378','C. Uribe Editores S.A.S','N/A','N/A','N/A',8,1,'2021-04-28 11:22:18','2021-04-28 11:22:18'),
(192,'860035909','Montes Editores S.A','N/A','N/A','N/A',32,3,'2021-05-10 15:08:52','2021-05-10 15:08:52'),
(193,'800204486','Dotakondor S.A.S','N/A','N/A','N/A',32,3,'2021-05-14 08:35:11','2021-05-14 08:35:11'),
(194,'901474221','Grupo Brado Ingenieria S.A.S','N/A','N/A','N/A',15,1,'2021-05-14 08:36:31','2021-05-14 08:36:31'),
(195,'16479935','Jhon Jairo Hernandez Arbelaez','N/A','N/A','N/A',15,1,'2021-05-18 12:08:10','2021-05-18 12:08:10'),
(196,'900775068','Llantamotor S.A.S','N/A','N/A','N/a',32,3,'2021-05-18 12:22:30','2021-05-18 12:22:30'),
(197,'805012921','Accion Sociedad Fiduciaria S.A','N/A','N/A','N/A',7,1,'2021-05-18 12:25:07','2021-05-18 12:25:07'),
(198,'830144572','Qtech S.A.S','N/A','N/A','N/A',32,3,'2021-05-19 11:45:00','2021-05-19 11:45:00'),
(199,'830089150','Educasalud S.A.S','N/A','N/A','N/A',12,13,'2021-05-31 17:06:59','2021-05-31 17:06:59'),
(201,'900584771','Botanique S.A.S','N/A','N/A','N/A',11,2,'2021-06-04 13:49:18','2021-06-04 13:49:18'),
(202,'1352794','Cadavid Velasquez Norberto','N/A','N/A','N/A',32,3,'2021-06-11 14:17:45','2021-06-11 14:17:45'),
(203,'900353231','Triplex Holguin S.A.S','triplexholguin@hotmail.com','CLL 79 B 53 16','6301268',32,3,'2021-06-21 09:51:02','2021-06-21 09:51:02'),
(204,'900179673','Montacargas Granados S.A.S','facturacionmontacargasgran@gmail.com','CALLE63 108 B - 18,','7034434',32,14,'2021-06-23 08:49:48','2021-06-23 08:49:48'),
(206,'52349880','Yudy Bibiana Mancipe','bibianamancipeleon@hotmail.com','Calle 41 sur # 86A 05','N/A',31,1,'2021-06-28 15:57:21','2021-06-28 15:57:21'),
(207,'79104501','Alvaro Ramirez Valderrama','info@cartoclip.com','Calle 64D 73A 51','310300643',32,3,'2021-06-28 15:59:44','2021-06-28 15:59:44'),
(208,'860039444','Quimica Comercial Andina S.A.S','N/A','N/A','N/A',32,3,'2021-06-30 11:49:22','2021-06-30 11:49:22'),
(209,'900876898','Ferreteria Diselec S.A.S','N/A','N/A','N/A',32,3,'2021-06-30 11:50:13','2021-06-30 11:50:13'),
(210,'1143383558','Lisneth Crespo Mendoza','N/A','N/A','N/A',15,1,'2021-07-01 06:50:36','2021-07-01 06:50:36'),
(211,'7163758','Juan Carlos Edes R.','N/A','N/A','N/A',11,3,'2021-07-07 12:20:18','2021-07-07 12:20:18'),
(212,'901126400','Arca Consultoria Empresarial S.A.S','contabilidad@arcaconsultoriaempresarial.com.co','AV CALLE 24 # 95 A 80 ETAPA 1 OF 415','3004240085',8,16,'2021-07-14 15:58:36','2021-07-14 15:58:36'),
(214,'830049630','Productos Y Suministros S.A.S','ventas@productosysuministros.com','Autopista Medellin Km 7 costado occidental - Parque industrial CELTA TRADE PARK Bodega 143','4325134',32,3,'2021-07-19 15:07:54','2021-07-19 15:07:54'),
(215,'900962296','Soluciones Industriales G.O S.A.S','N/A','N/A','N/A',15,1,'2021-07-22 15:17:15','2021-07-22 15:17:15'),
(216,'830013101','Autogruas Pronta S.A.S','N/A','N/A','N/A',19,1,'2021-07-28 08:58:14','2021-07-28 08:58:14'),
(217,'900799138','Sms Electronics S.A.S','N/A','N/A','N/A',32,3,'2021-07-30 09:58:13','2021-07-30 09:58:13'),
(218,'900850150','Legis Informacion Profesional','N/A','N/A','N/A',10,16,'2021-08-04 09:00:58','2021-08-04 09:00:58'),
(219,'800180832','Corporacion Club El Nogal','N/A','N/A','N/A',10,16,'2021-08-04 09:03:05','2021-08-04 09:03:05'),
(221,'900604472','Productos Y Servicios De Empaque Y Embalaje','N/A','N/A','N/A',32,3,'2021-08-06 08:59:06','2021-08-06 08:59:06'),
(222,'900628890','Grupo Colombiano De Aboga','N/A','N/A','N/A',10,16,'2021-08-06 09:00:12','2021-08-06 09:00:12'),
(227,'900273914','Sostenimiento Grafico Empresarial S.A.S','N/A','N/A','N/A',32,3,'2021-08-06 09:49:15','2021-08-06 09:49:15'),
(228,'830107198','Adteco S.A.S','N/A','N/A','N/A',32,3,'2021-08-10 15:44:40','2021-08-10 15:44:40'),
(229,'79865931','Graphics Creation','N/A','N/A','N/A',32,3,'2021-08-24 14:05:17','2021-08-24 14:05:17'),
(230,'900278823','Papeleria Futuro Cartagena Ltda','N/A','N/A','N/A',32,3,'2021-08-25 09:12:55','2021-08-25 09:12:55'),
(231,'800167988','Multicarton S.A.S','N/A','N/A','N/A',32,3,'2021-08-25 10:13:39','2021-08-25 09:13:41'),
(232,'900965645','Saatech S.A.S','N/A','N/A','N/A',32,3,'2021-08-25 09:14:49','2021-08-25 09:14:55'),
(233,'860518299','Purificacion Y Analisis De Fluidos S.A.S','N/A','N/A','N/A',32,3,'2021-08-25 12:02:11','2021-08-25 12:02:11'),
(236,'900680995','Sgs Colombia S.A.S','N/A','N/A','N/A',33,2,'2021-08-30 15:54:09','2021-08-30 15:54:09'),
(237,'80159352','Argar Multiserviicios Y Ferreteria','N/A','N/A','N/A',32,3,'2021-08-31 08:55:36','2021-08-31 08:55:36'),
(238,'900017447','Falabella De Colombia S.A','N/A','N/A','N/A',32,3,'2021-09-06 12:50:05','2021-09-06 11:50:03'),
(239,'900407506','Alpha Metrologia S.A.S','gerencia@alphametrologia.com','Carrera 73 Bis # 49 A 21','295 2527',15,1,'2021-09-09 11:28:19','2021-09-09 11:28:19'),
(240,'901139615','Araujo Ibarra Consultores Internacionales S.A.S','N/A','N/A','N/A',8,16,'2021-09-15 12:05:49','2021-09-15 12:05:49'),
(241,'800242106','Sodimac Colombia S.A','N/A','N/A','N/A',32,3,'2021-10-21 13:59:15','2021-10-21 13:59:15'),
(242,'900619796','Arquitectura Mv S.A.S','N/A','N/A','N/A',31,1,'2021-10-27 16:40:29','2021-10-27 16:40:29'),
(245,'830135880','Confrio Servicios S.A.S','N/A','N/A','N/A',15,1,'2021-11-05 16:10:23','2021-11-05 16:10:23'),
(247,'901268824','Prolibu Tech S.A.S','N/A','N/A','N/A',14,8,'2021-11-05 16:11:37','2021-11-05 16:11:37'),
(249,'891501783','Gamma Ingenieros S.A.S','N/A','N/A','N/A',32,8,'2021-11-10 13:47:30','2021-11-10 13:47:30'),
(250,'900992507','Kidotoy S.A.S','N/A','N/A','N/A',32,3,'2021-11-25 13:33:05','2021-11-25 13:33:05'),
(251,'800198348','Ventas Institucionales S.A.S','N/A','N/A','N/A',32,3,'2021-12-01 11:51:04','2021-12-01 11:51:04'),
(254,'9001551071','Cencosud Colombia S.A','N/A','N/A','N/A',11,2,'2021-12-07 08:44:34','2021-12-07 08:44:34'),
(255,'900059238','Makro Supermayorista S.A.S','N/A','N/A','N/A',32,3,'2021-12-07 09:15:20','2021-12-07 09:15:20'),
(256,'860517465','Ferrelam S.A.S','N/A','N/A','N/A',32,3,'2021-12-09 09:00:01','2021-12-09 09:00:01'),
(257,'901409402','Papeleria San Sebastian S.A.S','N/A','N/A','N/A',32,3,'2021-12-09 19:12:48','2021-12-09 19:12:48'),
(258,'901254014','Consultoria Integral En Prevencion S.A.S','N/A','N/A','N/A',12,13,'2021-12-10 11:06:19','2021-12-10 11:06:19'),
(259,'900990900','Cajas Ya S.A.S','N/A','N/A','N/A',32,3,'2021-12-13 16:41:44','2021-12-13 16:41:44'),
(260,'901059162','Ecoempaques Corrugados S.A.S','N/A','N/A','N/A',32,3,'2021-12-15 14:27:43','2021-12-14 14:25:51'),
(261,'60318989','Cajas De Carton Bogota','N/A','N/A','N/A',32,3,'2021-12-16 16:51:18','2021-12-16 16:51:18'),
(262,'901306758','Em Logistic S.A.S','N/A','N/A','N/A',34,14,'2021-12-21 13:17:38','2021-12-21 13:17:38');

/*Table structure for table `tb_tipo_doc` */

DROP TABLE IF EXISTS `tb_tipo_doc`;

CREATE TABLE `tb_tipo_doc` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_doc` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `documento` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_tipo_doc` */

insert  into `tb_tipo_doc`(`id`,`tipo_doc`,`documento`) values 
(1,'FR','Factura'),
(2,'AN','Anexo Recibido con la Factura'),
(3,'SC','Soporte de Causacion'),
(4,'DQ','Documento Equivalente'),
(5,'TV','Transferencia Virtual'),
(6,'NI','Nota Interna'),
(7,'NP','Nota a Proveedor'),
(8,'CE','Comprobante de Egreso'),
(9,'TB','Transferencia Bancaria'),
(10,'SU','Causacion en Dolares'),
(11,'OC','Orden de Compra'),
(12,'OS','Orden de Servicio'),
(13,'ES','Recepción de Servicios'),
(14,'EA','Recepción por Compras'),
(15,'DCC','Distribucion Centro de Costos'),
(16,'SA','Soporte Anticipo'),
(17,'CP','Comprobante de Pago'),
(18,'ORC','Orden de Compra o Servicio'),
(19,'REC','Recepcion de Compra o Servicio'),
(20,'CC','Comprobante de Causacion');

/*Table structure for table `tb_tipo_factura` */

DROP TABLE IF EXISTS `tb_tipo_factura`;

CREATE TABLE `tb_tipo_factura` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_factura` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_tipo_factura` */

insert  into `tb_tipo_factura`(`id`,`tipo_factura`) values 
(1,'Anticipo'),
(2,'Anticipo Menor Valor'),
(3,'Anticipo Mayor Valor'),
(4,'Afiliacion'),
(5,'Alianza'),
(6,'Alquiler RadioFrecuencias'),
(7,'Arriendo'),
(8,'Asesoria'),
(9,'Asesoria Intercambiaria'),
(10,'Asesoria Legal'),
(11,'Bienestar'),
(12,'Capacitación'),
(13,'Combustibles'),
(14,'Licenciamiento'),
(15,'Mantenimiento'),
(16,'Monitoreo'),
(17,'Proceso Selección'),
(18,'Reposición'),
(19,'Seguros'),
(20,'Serv. Asesoria'),
(21,'Serv. Consultoria'),
(22,'Serv. de Aseo'),
(23,'Serv. de Comunicaciones'),
(24,'Serv. de Software'),
(25,'Serv. Hosting'),
(26,'Serv. Impresión'),
(27,'Serv. Mensajeria'),
(28,'Serv. Publico'),
(29,'Serv. Seguridad'),
(30,'Serv. Vigilancia'),
(31,'Soporte'),
(32,'Compras'),
(33,'Auditoria'),
(34,'Serv. Logistica');

/*Table structure for table `tb_usuarios` */

DROP TABLE IF EXISTS `tb_usuarios`;

CREATE TABLE `tb_usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tb_usuarios_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tb_usuarios` */

insert  into `tb_usuarios`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Carlos German Jaime Vargas','cjaime@aviomar.com.co',NULL,'$2y$10$T56ZRWBvfLaEVahzkt5A6.6z2JmA5lbQKKe//WcwanPo3ST9u4glG',NULL,'2021-12-27 08:19:04','2021-12-27 08:19:04');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
