/*
Navicat MySQL Data Transfer

Source Server         : MySQL Localhost
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : infrastructuredb

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2015-08-04 11:04:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for assignments
-- ----------------------------
DROP TABLE IF EXISTS `assignments`;
CREATE TABLE `assignments` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  CONSTRAINT `assignments_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `items` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of assignments
-- ----------------------------
INSERT INTO `assignments` VALUES ('Admin', '1', null, 'N;');
INSERT INTO `assignments` VALUES ('Coordinator', '2', null, 'N;');
INSERT INTO `assignments` VALUES ('Coordinator', '4', null, 'N;');
INSERT INTO `assignments` VALUES ('Technician', '11', null, 'N;');
INSERT INTO `assignments` VALUES ('Technician', '8', null, 'N;');

-- ----------------------------
-- Table structure for itemchildren
-- ----------------------------
DROP TABLE IF EXISTS `itemchildren`;
CREATE TABLE `itemchildren` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `itemchildren_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `items` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `itemchildren_ibfk_2` FOREIGN KEY (`child`) REFERENCES `items` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of itemchildren
-- ----------------------------
INSERT INTO `itemchildren` VALUES ('Coordinator.*', 'addUserToLocation');
INSERT INTO `itemchildren` VALUES ('Manager', 'Coordinator');
INSERT INTO `itemchildren` VALUES ('Coordinator', 'Coordinator.*');
INSERT INTO `itemchildren` VALUES ('Coordinator', 'Engineer');
INSERT INTO `itemchildren` VALUES ('Engineer', 'Engineer.*');
INSERT INTO `itemchildren` VALUES ('Technician', 'Guest');
INSERT INTO `itemchildren` VALUES ('Guest', 'Guest.*');
INSERT INTO `itemchildren` VALUES ('Coordinator.*', 'Location.Adduser');
INSERT INTO `itemchildren` VALUES ('Coordinator.*', 'Location.AdminOwn');
INSERT INTO `itemchildren` VALUES ('Guest.*', 'Location.CityOptions');
INSERT INTO `itemchildren` VALUES ('Coordinator.*', 'Location.Create');
INSERT INTO `itemchildren` VALUES ('Coordinator.*', 'Location.Delete');
INSERT INTO `itemchildren` VALUES ('Guest.*', 'Location.DepartmentOptions');
INSERT INTO `itemchildren` VALUES ('Guest.*', 'Location.DivisionOptions');
INSERT INTO `itemchildren` VALUES ('Guest.*', 'Location.Index');
INSERT INTO `itemchildren` VALUES ('Guest.*', 'Location.IndexOwn');
INSERT INTO `itemchildren` VALUES ('Guest.*', 'Location.SubdivisionOptions');
INSERT INTO `itemchildren` VALUES ('Coordinator.*', 'Location.Update');
INSERT INTO `itemchildren` VALUES ('Guest.*', 'Location.View');
INSERT INTO `itemchildren` VALUES ('Technician', 'Object.Create');
INSERT INTO `itemchildren` VALUES ('Guest.*', 'Object.Index');
INSERT INTO `itemchildren` VALUES ('Technician', 'Object.Update');
INSERT INTO `itemchildren` VALUES ('Guest.*', 'Object.View');
INSERT INTO `itemchildren` VALUES ('Engineer.*', 'Rack.Create');
INSERT INTO `itemchildren` VALUES ('Guest.*', 'Rack.Index');
INSERT INTO `itemchildren` VALUES ('Engineer.*', 'Rack.Order');
INSERT INTO `itemchildren` VALUES ('Engineer.*', 'Rack.Update');
INSERT INTO `itemchildren` VALUES ('Guest.*', 'Rack.View');
INSERT INTO `itemchildren` VALUES ('Engineer.*', 'Room.Create');
INSERT INTO `itemchildren` VALUES ('Guest.*', 'Room.Index');
INSERT INTO `itemchildren` VALUES ('Engineer.*', 'Room.Update');
INSERT INTO `itemchildren` VALUES ('Guest.*', 'Room.View');
INSERT INTO `itemchildren` VALUES ('Engineer.*', 'Row.Create');
INSERT INTO `itemchildren` VALUES ('Guest.*', 'Row.Index');
INSERT INTO `itemchildren` VALUES ('Engineer.*', 'Row.Update');
INSERT INTO `itemchildren` VALUES ('Guest.*', 'Row.View');
INSERT INTO `itemchildren` VALUES ('Engineer', 'Technician');

-- ----------------------------
-- Table structure for items
-- ----------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of items
-- ----------------------------
INSERT INTO `items` VALUES ('addUserToLocation', '0', 'Add User to Location', null, 'N;');
INSERT INTO `items` VALUES ('Admin', '2', 'Admin', null, 'N;');
INSERT INTO `items` VALUES ('Attributes.*', '1', null, null, 'N;');
INSERT INTO `items` VALUES ('Attributes.Admin', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Attributes.Create', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Attributes.Delete', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Attributes.Index', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Attributes.Update', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Attributes.View', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('AttributesChapter.*', '1', null, null, 'N;');
INSERT INTO `items` VALUES ('AttributesChapter.Admin', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('AttributesChapter.Create', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('AttributesChapter.Delete', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('AttributesChapter.Index', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('AttributesChapter.Update', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('AttributesChapter.View', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Chapter.*', '1', null, null, 'N;');
INSERT INTO `items` VALUES ('Chapter.Admin', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Chapter.Create', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Chapter.Delete', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Chapter.Index', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Chapter.Update', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Chapter.View', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('City.*', '1', null, null, 'N;');
INSERT INTO `items` VALUES ('City.Admin', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('City.Create', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('City.Delete', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('City.Index', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('City.Update', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('City.View', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Coordinator', '2', 'Coordinator', null, 'N;');
INSERT INTO `items` VALUES ('Coordinator.*', '1', 'Common tasks for coordinator user access', null, 'N;');
INSERT INTO `items` VALUES ('Country.*', '1', null, null, 'N;');
INSERT INTO `items` VALUES ('Country.Admin', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Country.Create', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Country.Delete', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Country.Index', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Country.Update', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Country.View', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Department.*', '1', null, null, 'N;');
INSERT INTO `items` VALUES ('Department.Admin', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Department.Create', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Department.Delete', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Department.Index', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Department.Update', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Department.View', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Engineer', '2', 'Engineer', null, 'N;');
INSERT INTO `items` VALUES ('Engineer.*', '1', 'Common tasks for Enginner role', null, 'N;');
INSERT INTO `items` VALUES ('Guest', '2', 'Guest', null, 'N;');
INSERT INTO `items` VALUES ('Guest.*', '1', 'Common tasks for guest user access.', null, 'N;');
INSERT INTO `items` VALUES ('Location.*', '1', null, null, 'N;');
INSERT INTO `items` VALUES ('Location.Adduser', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Location.Admin', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Location.AdminOwn', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Location.CityOptions', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Location.Create', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Location.Delete', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Location.DepartmentOptions', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Location.DivisionOptions', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Location.Index', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Location.IndexOwn', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Location.SubdivisionOptions', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Location.Update', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Location.View', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Manager', '2', 'Manager', null, 'N;');
INSERT INTO `items` VALUES ('Object.*', '1', null, null, 'N;');
INSERT INTO `items` VALUES ('Object.Admin', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Object.Create', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Object.Delete', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Object.Index', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Object.Update', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Object.View', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Platform.*', '1', null, null, 'N;');
INSERT INTO `items` VALUES ('Platform.Admin', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Platform.Create', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Platform.Delete', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Platform.Index', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Platform.Update', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Platform.View', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Rack.*', '1', null, null, 'N;');
INSERT INTO `items` VALUES ('Rack.Admin', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Rack.Create', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Rack.Delete', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Rack.Index', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Rack.Order', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Rack.Update', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Rack.View', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Room.*', '1', null, null, 'N;');
INSERT INTO `items` VALUES ('Room.Admin', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Room.Create', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Room.Delete', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Room.Index', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Room.Update', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Room.View', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Row.*', '1', null, null, 'N;');
INSERT INTO `items` VALUES ('Row.Admin', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Row.Create', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Row.Delete', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Row.Index', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Row.Update', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Row.View', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Site.*', '1', null, null, 'N;');
INSERT INTO `items` VALUES ('Site.Contact', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Site.Error', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Site.Index', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Site.Login', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Site.Logout', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Technician', '2', 'Technician', null, 'N;');
INSERT INTO `items` VALUES ('Technician.*', '1', 'Technician.*', null, 'N;');
INSERT INTO `items` VALUES ('User.Activation.*', '1', null, null, 'N;');
INSERT INTO `items` VALUES ('User.Activation.Activation', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('User.Admin.*', '1', null, null, 'N;');
INSERT INTO `items` VALUES ('User.Admin.Admin', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('User.Admin.Create', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('User.Admin.Delete', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('User.Admin.Update', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('User.Admin.View', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('User.Default.*', '1', null, null, 'N;');
INSERT INTO `items` VALUES ('User.Default.Index', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('User.Login.*', '1', null, null, 'N;');
INSERT INTO `items` VALUES ('User.Login.Login', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('User.Logout.*', '1', null, null, 'N;');
INSERT INTO `items` VALUES ('User.Logout.Logout', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('User.Profile.*', '1', null, null, 'N;');
INSERT INTO `items` VALUES ('User.Profile.Changepassword', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('User.Profile.Edit', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('User.Profile.Profile', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('User.ProfileField.*', '1', null, null, 'N;');
INSERT INTO `items` VALUES ('User.ProfileField.Admin', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('User.ProfileField.Create', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('User.ProfileField.Delete', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('User.ProfileField.Update', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('User.ProfileField.View', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('User.Recovery.*', '1', null, null, 'N;');
INSERT INTO `items` VALUES ('User.Recovery.Recovery', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('User.Registration.*', '1', null, null, 'N;');
INSERT INTO `items` VALUES ('User.Registration.Registration', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('User.User.*', '1', null, null, 'N;');
INSERT INTO `items` VALUES ('User.User.Index', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('User.User.View', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Vendor.*', '1', null, null, 'N;');
INSERT INTO `items` VALUES ('Vendor.Admin', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Vendor.Create', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Vendor.Delete', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Vendor.Index', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Vendor.Update', '0', null, null, 'N;');
INSERT INTO `items` VALUES ('Vendor.View', '0', null, null, 'N;');

-- ----------------------------
-- Table structure for rights
-- ----------------------------
DROP TABLE IF EXISTS `rights`;
CREATE TABLE `rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`),
  CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `items` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of rights
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_attributes
-- ----------------------------
DROP TABLE IF EXISTS `tbl_attributes`;
CREATE TABLE `tbl_attributes` (
  `attributeId` int(11) NOT NULL AUTO_INCREMENT,
  `attributeChapterId` int(11) DEFAULT NULL,
  `attributeName` varchar(255) NOT NULL,
  `attributeDescription` varchar(255) DEFAULT NULL,
  `createTime` datetime DEFAULT NULL,
  `createUserId` int(11) DEFAULT NULL,
  `updateTime` datetime DEFAULT NULL,
  `updateUserId` int(11) DEFAULT NULL,
  `Satus` varchar(255) DEFAULT '1',
  `Flag` varchar(255) DEFAULT '1',
  PRIMARY KEY (`attributeId`),
  KEY `fk_attribute_attributechapter` (`attributeChapterId`),
  CONSTRAINT `fk_attribute_attributechapter` FOREIGN KEY (`attributeChapterId`) REFERENCES `tbl_attributes_chapter` (`attributeChapterId`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_attributes
-- ----------------------------
INSERT INTO `tbl_attributes` VALUES ('1', '2', 'test', '', '2015-06-30 10:05:29', '1', '2015-06-30 10:05:29', '1', '1', '1');
INSERT INTO `tbl_attributes` VALUES ('2', '2', 'Gigabit Ethernet', 'Gigabit Ethernet Interfaces', '2015-06-30 10:09:42', '1', '2015-06-30 10:09:42', '1', '1', '1');
INSERT INTO `tbl_attributes` VALUES ('3', '2', 'Fast Ethernet', 'Fast Ethernet Interfaces', '2015-06-30 10:10:05', '1', '2015-06-30 10:10:05', '1', '1', '1');
INSERT INTO `tbl_attributes` VALUES ('4', '4', 'RF Interface', '', '2015-06-30 10:10:29', '1', '2015-06-30 10:10:29', '1', '1', '1');

-- ----------------------------
-- Table structure for tbl_attributes_chapter
-- ----------------------------
DROP TABLE IF EXISTS `tbl_attributes_chapter`;
CREATE TABLE `tbl_attributes_chapter` (
  `attributeChapterId` int(11) NOT NULL AUTO_INCREMENT,
  `attributeChapterName` varchar(255) NOT NULL,
  `createTime` datetime DEFAULT NULL,
  `createUserId` int(11) DEFAULT NULL,
  `updateTime` datetime DEFAULT NULL,
  `updateUserId` int(11) DEFAULT NULL,
  PRIMARY KEY (`attributeChapterId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_attributes_chapter
-- ----------------------------
INSERT INTO `tbl_attributes_chapter` VALUES ('2', 'Input Interfaces', '2015-06-25 16:45:41', '1', '2015-06-25 16:45:41', '1');
INSERT INTO `tbl_attributes_chapter` VALUES ('4', 'Output Interfaces', '2015-06-25 16:46:24', '1', '2015-06-25 16:46:24', '1');
INSERT INTO `tbl_attributes_chapter` VALUES ('5', 'Processing', '2015-06-25 16:46:45', '1', '2015-06-25 16:46:45', '1');
INSERT INTO `tbl_attributes_chapter` VALUES ('6', 'Video', '2015-06-25 16:46:51', '1', '2015-06-25 16:46:51', '1');
INSERT INTO `tbl_attributes_chapter` VALUES ('7', 'Audio', '2015-06-25 16:46:57', '1', '2015-06-25 16:46:57', '1');
INSERT INTO `tbl_attributes_chapter` VALUES ('8', 'RF', '2015-06-25 16:48:01', '1', '2015-06-25 16:48:01', '1');
INSERT INTO `tbl_attributes_chapter` VALUES ('9', 'Regulatory Compliance', '2015-06-25 16:48:10', '1', '2015-06-25 16:48:10', '1');
INSERT INTO `tbl_attributes_chapter` VALUES ('10', 'Electrical', '2015-06-25 16:48:23', '1', '2015-06-25 16:48:23', '1');
INSERT INTO `tbl_attributes_chapter` VALUES ('11', 'Mechanical', '2015-06-25 16:48:30', '1', '2015-06-25 16:48:30', '1');
INSERT INTO `tbl_attributes_chapter` VALUES ('12', 'Environmental', '2015-06-25 16:48:44', '1', '2015-06-25 16:48:44', '1');
INSERT INTO `tbl_attributes_chapter` VALUES ('13', 'Identification', '2015-06-25 16:49:28', '1', '2015-06-25 16:49:28', '1');

-- ----------------------------
-- Table structure for tbl_attributes_map
-- ----------------------------
DROP TABLE IF EXISTS `tbl_attributes_map`;
CREATE TABLE `tbl_attributes_map` (
  `platformId` int(11) NOT NULL,
  `attributeId` int(11) NOT NULL,
  `createTime` datetime DEFAULT NULL,
  `createUserId` int(11) DEFAULT NULL,
  `updateTime` datetime DEFAULT NULL,
  `updateUserId` int(11) DEFAULT NULL,
  PRIMARY KEY (`platformId`,`attributeId`),
  KEY `fk_attributesmap_attributes` (`attributeId`),
  CONSTRAINT `fk_attributesmap_attributes` FOREIGN KEY (`attributeId`) REFERENCES `tbl_attributes` (`attributeId`) ON DELETE CASCADE,
  CONSTRAINT `fk_attributesmap_platform` FOREIGN KEY (`platformId`) REFERENCES `tbl_platform` (`platformId`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_attributes_map
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_attributes_value
-- ----------------------------
DROP TABLE IF EXISTS `tbl_attributes_value`;
CREATE TABLE `tbl_attributes_value` (
  `objectId` int(11) NOT NULL,
  `attributeId` int(11) NOT NULL,
  `attributeValue` varchar(255) DEFAULT NULL,
  `createTime` datetime DEFAULT NULL,
  `createUserId` int(11) DEFAULT NULL,
  `updateTime` datetime DEFAULT NULL,
  `updateUserId` int(11) DEFAULT NULL,
  PRIMARY KEY (`objectId`,`attributeId`),
  KEY `fk_attributesvalue_` (`attributeId`),
  CONSTRAINT `fk_attributesvalue_` FOREIGN KEY (`attributeId`) REFERENCES `tbl_attributes` (`attributeId`) ON DELETE CASCADE,
  CONSTRAINT `fk_attributesvalue_object` FOREIGN KEY (`objectId`) REFERENCES `tbl_object` (`objectId`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_attributes_value
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_chapter
-- ----------------------------
DROP TABLE IF EXISTS `tbl_chapter`;
CREATE TABLE `tbl_chapter` (
  `chapterId` int(11) NOT NULL AUTO_INCREMENT,
  `chapterName` varchar(255) NOT NULL,
  `chapterDescription` varchar(255) DEFAULT NULL,
  `createTime` datetime DEFAULT NULL,
  `createUserId` int(11) DEFAULT NULL,
  `updateTime` datetime DEFAULT NULL,
  `updateUserId` int(11) DEFAULT NULL,
  `Status` varchar(255) DEFAULT '1',
  `Flag` varchar(255) DEFAULT '1',
  PRIMARY KEY (`chapterId`)
) ENGINE=InnoDB AUTO_INCREMENT=208 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_chapter
-- ----------------------------
INSERT INTO `tbl_chapter` VALUES ('201', 'Plataformas Opticas', '', '2015-05-29 10:27:49', '1', '2015-05-29 10:27:49', '1', '1', '1');
INSERT INTO `tbl_chapter` VALUES ('202', 'Switches', '', '2015-05-29 10:28:16', '1', '2015-05-29 10:28:16', '1', '1', '1');
INSERT INTO `tbl_chapter` VALUES ('203', 'Routers', '', '2015-05-29 10:28:24', '1', '2015-05-29 10:28:24', '1', '1', '1');
INSERT INTO `tbl_chapter` VALUES ('204', 'Plataformas RF', '', '2015-05-29 10:28:42', '1', '2015-05-29 10:28:42', '1', '1', '1');
INSERT INTO `tbl_chapter` VALUES ('205', 'OLT', '', '2015-05-29 10:29:29', '1', '2015-05-29 10:29:29', '1', '1', '1');
INSERT INTO `tbl_chapter` VALUES ('206', 'CMTS', 'Cable Modem Termination System', '2015-05-29 11:27:01', '1', '2015-05-29 11:27:01', '1', '1', '1');
INSERT INTO `tbl_chapter` VALUES ('207', 'Test Chapter', '', '2015-06-25 15:50:15', '1', '2015-06-25 15:50:15', '1', '1', '1');

-- ----------------------------
-- Table structure for tbl_city
-- ----------------------------
DROP TABLE IF EXISTS `tbl_city`;
CREATE TABLE `tbl_city` (
  `cityId` int(11) NOT NULL,
  `departmentId` int(11) DEFAULT NULL,
  `cityName` varchar(255) DEFAULT NULL,
  `cityLongitude` varchar(255) DEFAULT NULL,
  `cityLatitude` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT '1',
  `Flag` int(11) DEFAULT '1',
  PRIMARY KEY (`cityId`),
  KEY `fk_city_department` (`departmentId`),
  CONSTRAINT `fk_city_department` FOREIGN KEY (`departmentId`) REFERENCES `tbl_department` (`departmentId`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_city
-- ----------------------------
INSERT INTO `tbl_city` VALUES ('5001', '5', 'MEDELLÍN', '-75,57705563', '6,24894081', '1', '1');
INSERT INTO `tbl_city` VALUES ('5002', '5', 'ABEJORRAL', '-75,42892042', '5,78953996', '1', '1');
INSERT INTO `tbl_city` VALUES ('5004', '5', 'ABRIAQUÍ', '-76,06315827', '6,633956028', '1', '1');
INSERT INTO `tbl_city` VALUES ('5021', '5', 'ALEJANDRÍA', '-75,14309741', '6,374473802', '1', '1');
INSERT INTO `tbl_city` VALUES ('5030', '5', 'AMAGÁ', '-75,70176247', '6,035833513', '1', '1');
INSERT INTO `tbl_city` VALUES ('5031', '5', 'AMALFI', '-75,07314758', '6,90887429', '1', '1');
INSERT INTO `tbl_city` VALUES ('5034', '5', 'ANDES', '-75,87925102', '5,656884695', '1', '1');
INSERT INTO `tbl_city` VALUES ('5036', '5', 'ANGELÓPOLIS', '-75,70833078', '6,111880338', '1', '1');
INSERT INTO `tbl_city` VALUES ('5038', '5', 'ANGOSTURA', '-75,33494799', '6,885366193', '1', '1');
INSERT INTO `tbl_city` VALUES ('5040', '5', 'ANORÍ', '-75,1483999', '7,078008333', '1', '1');
INSERT INTO `tbl_city` VALUES ('5042', '5', 'SANTA FÉ DE ANTIOQUIA', '-75,82723238', '6,558268986', '1', '1');
INSERT INTO `tbl_city` VALUES ('5044', '5', 'ANZÁ', '-75,85371333', '6,302230468', '1', '1');
INSERT INTO `tbl_city` VALUES ('5045', '5', 'APARTADÓ', '-76,62618597', '7,882716696', '1', '1');
INSERT INTO `tbl_city` VALUES ('5051', '5', 'ARBOLETES', '-76,4266804', '8,850006266', '1', '1');
INSERT INTO `tbl_city` VALUES ('5055', '5', 'ARGELIA', '-75,13919443', '5,730367748', '1', '1');
INSERT INTO `tbl_city` VALUES ('5059', '5', 'ARMENIA', '-75,78656046', '6,155819195', '1', '1');
INSERT INTO `tbl_city` VALUES ('5079', '5', 'BARBOSA', '-75,33381905', '6,437988662', '1', '1');
INSERT INTO `tbl_city` VALUES ('5086', '5', 'BELMIRA', '-75,66821486', '6,606175944', '1', '1');
INSERT INTO `tbl_city` VALUES ('5088', '5', 'BELLO', '-75,55444758', '6,333785562', '1', '1');
INSERT INTO `tbl_city` VALUES ('5091', '5', 'BETANIA', '-75,98176937', '5,749214258', '1', '1');
INSERT INTO `tbl_city` VALUES ('5093', '5', 'BETULIA', '-75,98419075', '6,109099807', '1', '1');
INSERT INTO `tbl_city` VALUES ('5101', '5', 'CIUDAD BOLÍVAR', '-76,01332281', '5,846517001', '1', '1');
INSERT INTO `tbl_city` VALUES ('5107', '5', 'BRICEÑO', '-75,55066038', '7,112790536', '1', '1');
INSERT INTO `tbl_city` VALUES ('5113', '5', 'BURITICÁ', '-75,90626411', '6,719884219', '1', '1');
INSERT INTO `tbl_city` VALUES ('5120', '5', 'CÁCERES', '-75,35298017', '7,575065193', '1', '1');
INSERT INTO `tbl_city` VALUES ('5125', '5', 'CAICEDO', '-75,98415335', '6,40578759', '1', '1');
INSERT INTO `tbl_city` VALUES ('5129', '5', 'CALDAS', '-75,6344938', '6,091577846', '1', '1');
INSERT INTO `tbl_city` VALUES ('5134', '5', 'CAMPAMENTO', '-75,29533344', '6,97898982', '1', '1');
INSERT INTO `tbl_city` VALUES ('5138', '5', 'CAÑASGORDAS', '-76,03020474', '6,759767246', '1', '1');
INSERT INTO `tbl_city` VALUES ('5142', '5', 'CARACOLÍ', '-74,7592025', '6,402509228', '1', '1');
INSERT INTO `tbl_city` VALUES ('5145', '5', 'CARAMANTA', '-75,64533157', '5,549094786', '1', '1');
INSERT INTO `tbl_city` VALUES ('5147', '5', 'CAREPA', '-76,65311896', '7,754204195', '1', '1');
INSERT INTO `tbl_city` VALUES ('5148', '5', 'EL CARMEN DE VIBORAL', '-75,33526901', '6,084971574', '1', '1');
INSERT INTO `tbl_city` VALUES ('5150', '5', 'CAROLINA', '-75,28359994', '6,725994352', '1', '1');
INSERT INTO `tbl_city` VALUES ('5154', '5', 'CAUCASIA', '-75,19851434', '7,97776037', '1', '1');
INSERT INTO `tbl_city` VALUES ('5172', '5', 'CHIGORODÓ', '-76,68156472', '7,666156449', '1', '1');
INSERT INTO `tbl_city` VALUES ('5190', '5', 'CISNEROS', '-75,08623906', '6,538875199', '1', '1');
INSERT INTO `tbl_city` VALUES ('5197', '5', 'COCORNÁ', '-75,18561261', '6,057888796', '1', '1');
INSERT INTO `tbl_city` VALUES ('5206', '5', 'CONCEPCIÓN', '-75,25652706', '6,393976079', '1', '1');
INSERT INTO `tbl_city` VALUES ('5209', '5', 'CONCORDIA', '-75,90828191', '6,047148273', '1', '1');
INSERT INTO `tbl_city` VALUES ('5212', '5', 'COPACABANA', '-75,50242268', '6,358227531', '1', '1');
INSERT INTO `tbl_city` VALUES ('5234', '5', 'DABEIBA', '-76,2629741', '7,000034026', '1', '1');
INSERT INTO `tbl_city` VALUES ('5237', '5', 'DONMATÍAS', '-75,39409516', '6,485885346', '1', '1');
INSERT INTO `tbl_city` VALUES ('5240', '5', 'EBÉJICO', '-75,76687773', '6,327259705', '1', '1');
INSERT INTO `tbl_city` VALUES ('5250', '5', 'EL BAGRE', '-74,80471043', '7,592954652', '1', '1');
INSERT INTO `tbl_city` VALUES ('5264', '5', 'ENTRERRÍOS', '-75,51715485', '6,566650049', '1', '1');
INSERT INTO `tbl_city` VALUES ('5266', '5', 'ENVIGADO', '-75,58319073', '6,166661798', '1', '1');
INSERT INTO `tbl_city` VALUES ('5282', '5', 'FREDONIA', '-75,67116614', '5,924840042', '1', '1');
INSERT INTO `tbl_city` VALUES ('5284', '5', 'FRONTINO', '-76,1312234', '6,775585014', '1', '1');
INSERT INTO `tbl_city` VALUES ('5306', '5', 'GIRALDO', '-75,94977228', '6,67830123', '1', '1');
INSERT INTO `tbl_city` VALUES ('5308', '5', 'GIRARDOTA', '-75,44369899', '6,379349929', '1', '1');
INSERT INTO `tbl_city` VALUES ('5310', '5', 'GÓMEZ PLATA', '-75,22175555', '6,684119448', '1', '1');
INSERT INTO `tbl_city` VALUES ('5313', '5', 'GRANADA', '-75,18797267', '6,141374332', '1', '1');
INSERT INTO `tbl_city` VALUES ('5315', '5', 'GUADALUPE', '-75,23971741', '6,815048216', '1', '1');
INSERT INTO `tbl_city` VALUES ('5318', '5', 'GUARNE', '-75,44008804', '6,278978898', '1', '1');
INSERT INTO `tbl_city` VALUES ('5321', '5', 'GUATAPÉ', '-75,15562697', '6,232337371', '1', '1');
INSERT INTO `tbl_city` VALUES ('5347', '5', 'HELICONIA', '-75,73478599', '6,206032884', '1', '1');
INSERT INTO `tbl_city` VALUES ('5353', '5', 'HISPANIA', '-75,90493749', '5,798879499', '1', '1');
INSERT INTO `tbl_city` VALUES ('5360', '5', 'ITAGÜÍ', '-75,62972195', '6,168158303', '1', '1');
INSERT INTO `tbl_city` VALUES ('5361', '5', 'ITUANGO', '-75,76416656', '7,17162301', '1', '1');
INSERT INTO `tbl_city` VALUES ('5364', '5', 'JARDÍN', '-75,82306693', '5,600965038', '1', '1');
INSERT INTO `tbl_city` VALUES ('5368', '5', 'JERICÓ', '-75,78462771', '5,792455576', '1', '1');
INSERT INTO `tbl_city` VALUES ('5376', '5', 'LA CEJA', '-75,42163789', '6,032590366', '1', '1');
INSERT INTO `tbl_city` VALUES ('5380', '5', 'LA ESTRELLA', '-75,64518707', '6,15839094', '1', '1');
INSERT INTO `tbl_city` VALUES ('5390', '5', 'LA PINTADA', '-75,60621806', '5,739135854', '1', '1');
INSERT INTO `tbl_city` VALUES ('5400', '5', 'LA UNIÓN', '-75,36057471', '5,974351772', '1', '1');
INSERT INTO `tbl_city` VALUES ('5411', '5', 'LIBORINA', '-75,81367596', '6,676358689', '1', '1');
INSERT INTO `tbl_city` VALUES ('5425', '5', 'MACEO', '-74,78784772', '6,553116085', '1', '1');
INSERT INTO `tbl_city` VALUES ('5440', '5', 'MARINILLA', '-75,33807844', '6,17354814', '1', '1');
INSERT INTO `tbl_city` VALUES ('5467', '5', 'MONTEBELLO', '-75,52375393', '5,946563659', '1', '1');
INSERT INTO `tbl_city` VALUES ('5475', '5', 'MURINDÓ', '-76,81998652', '6,976967167', '1', '1');
INSERT INTO `tbl_city` VALUES ('5480', '5', 'MUTATÁ', '-76,4367047', '7,243963173', '1', '1');
INSERT INTO `tbl_city` VALUES ('5483', '5', 'NARIÑO', '-75,17492129', '5,610995522', '1', '1');
INSERT INTO `tbl_city` VALUES ('5490', '5', 'NECOCLÍ', '-76,78762125', '8,426025281', '1', '1');
INSERT INTO `tbl_city` VALUES ('5495', '5', 'NECHÍ', '-74,77633959', '8,088746434', '1', '1');
INSERT INTO `tbl_city` VALUES ('5501', '5', 'OLAYA', '-75,81127656', '6,624511889', '1', '1');
INSERT INTO `tbl_city` VALUES ('5541', '5', 'PEÑOL', '-75,21237225', '6,221683183', '1', '1');
INSERT INTO `tbl_city` VALUES ('5543', '5', 'PEQUE', '-75,90867121', '7,022099872', '1', '1');
INSERT INTO `tbl_city` VALUES ('5576', '5', 'PUEBLORRICO', '-75,84057784', '5,793416085', '1', '1');
INSERT INTO `tbl_city` VALUES ('5579', '5', 'PUERTO BERRÍO', '-74,40463631', '6,490066539', '1', '1');
INSERT INTO `tbl_city` VALUES ('5585', '5', 'PUERTO NARE', '-74,58513216', '6,182046901', '1', '1');
INSERT INTO `tbl_city` VALUES ('5591', '5', 'PUERTO TRIUNFO', '-74,63402357', '5,888208403', '1', '1');
INSERT INTO `tbl_city` VALUES ('5604', '5', 'REMEDIOS', '-74,6904628', '7,028793587', '1', '1');
INSERT INTO `tbl_city` VALUES ('5607', '5', 'RETIRO', '-75,50201058', '6,063242582', '1', '1');
INSERT INTO `tbl_city` VALUES ('5615', '5', 'RIONEGRO', '-75,37625576', '6,14622006', '1', '1');
INSERT INTO `tbl_city` VALUES ('5628', '5', 'SABANALARGA', '-75,81416599', '6,853533164', '1', '1');
INSERT INTO `tbl_city` VALUES ('5631', '5', 'SABANETA', '-75,61535088', '6,150892317', '1', '1');
INSERT INTO `tbl_city` VALUES ('5642', '5', 'SALGAR', '-75,97543596', '5,961162417', '1', '1');
INSERT INTO `tbl_city` VALUES ('5647', '5', 'SAN ANDRÉS DE CUERQUÍA', '-75,67277312', '6,923609639', '1', '1');
INSERT INTO `tbl_city` VALUES ('5649', '5', 'SAN CARLOS', '-74,9930024', '6,187976407', '1', '1');
INSERT INTO `tbl_city` VALUES ('5652', '5', 'SAN FRANCISCO', '-75,10185297', '5,964172393', '1', '1');
INSERT INTO `tbl_city` VALUES ('5656', '5', 'SAN JERÓNIMO', '-75,72781783', '6,443063792', '1', '1');
INSERT INTO `tbl_city` VALUES ('5658', '5', 'SAN JOSÉ DE LA MONTAÑA', '-75,68408219', '6,849741207', '1', '1');
INSERT INTO `tbl_city` VALUES ('5659', '5', 'SAN JUAN DE URABÁ', '-76,52888979', '8,759490605', '1', '1');
INSERT INTO `tbl_city` VALUES ('5660', '5', 'SAN LUIS', '-74,99439223', '6,042865254', '1', '1');
INSERT INTO `tbl_city` VALUES ('5664', '5', 'SAN PEDRO DE LOS MILAGROS', '-75,56091172', '6,460434521', '1', '1');
INSERT INTO `tbl_city` VALUES ('5665', '5', 'SAN PEDRO DE URABÁ', '-76,38256213', '8,278064307', '1', '1');
INSERT INTO `tbl_city` VALUES ('5667', '5', 'SAN RAFAEL', '-75,02824952', '6,293949736', '1', '1');
INSERT INTO `tbl_city` VALUES ('5670', '5', 'SAN ROQUE', '-75,02226364', '6,484811849', '1', '1');
INSERT INTO `tbl_city` VALUES ('5674', '5', 'SAN VICENTE FERRER', '-75,33479604', '6,279404871', '1', '1');
INSERT INTO `tbl_city` VALUES ('5679', '5', 'SANTA BÁRBARA', '-75,57231946', '5,880639123', '1', '1');
INSERT INTO `tbl_city` VALUES ('5686', '5', 'SANTA ROSA DE OSOS', '-75,46007968', '6,645172496', '1', '1');
INSERT INTO `tbl_city` VALUES ('5690', '5', 'SANTO DOMINGO', '-75,16774882', '6,474784618', '1', '1');
INSERT INTO `tbl_city` VALUES ('5697', '5', 'EL SANTUARIO', '-75,26139361', '6,135960277', '1', '1');
INSERT INTO `tbl_city` VALUES ('5736', '5', 'SEGOVIA', '-74,69906246', '7,081082477', '1', '1');
INSERT INTO `tbl_city` VALUES ('5756', '5', 'SONSÓN', '-75,31030244', '5,712788054', '1', '1');
INSERT INTO `tbl_city` VALUES ('5761', '5', 'SOPETRÁN', '-75,74593737', '6,503132204', '1', '1');
INSERT INTO `tbl_city` VALUES ('5789', '5', 'TÁMESIS', '-75,71422154', '5,665176758', '1', '1');
INSERT INTO `tbl_city` VALUES ('5790', '5', 'TARAZÁ', '-75,399711', '7,581611353', '1', '1');
INSERT INTO `tbl_city` VALUES ('5792', '5', 'TARSO', '-75,82279021', '5,865448582', '1', '1');
INSERT INTO `tbl_city` VALUES ('5809', '5', 'TITIRIBÍ', '-75,79470812', '6,062945865', '1', '1');
INSERT INTO `tbl_city` VALUES ('5819', '5', 'TOLEDO', '-75,69216654', '7,010341916', '1', '1');
INSERT INTO `tbl_city` VALUES ('5837', '5', 'TURBO', '-76,72643183', '8,094096738', '1', '1');
INSERT INTO `tbl_city` VALUES ('5842', '5', 'URAMITA', '-76,17041054', '6,893593023', '1', '1');
INSERT INTO `tbl_city` VALUES ('5847', '5', 'URRAO', '-76,13224047', '6,314001176', '1', '1');
INSERT INTO `tbl_city` VALUES ('5854', '5', 'VALDIVIA', '-75,43971192', '7,163137681', '1', '1');
INSERT INTO `tbl_city` VALUES ('5856', '5', 'VALPARAÍSO', '-75,6247152', '5,614698523', '1', '1');
INSERT INTO `tbl_city` VALUES ('5858', '5', 'VEGACHÍ', '-74,79325176', '6,767162199', '1', '1');
INSERT INTO `tbl_city` VALUES ('5861', '5', 'VENECIA', '-75,7345341', '5,963085926', '1', '1');
INSERT INTO `tbl_city` VALUES ('5873', '5', 'VIGÍA DEL FUERTE', '-76,89634759', '6,588794113', '1', '1');
INSERT INTO `tbl_city` VALUES ('5885', '5', 'YALÍ', '-74,84117476', '6,66825258', '1', '1');
INSERT INTO `tbl_city` VALUES ('5887', '5', 'YARUMAL', '-75,41959841', '6,9655797', '1', '1');
INSERT INTO `tbl_city` VALUES ('5890', '5', 'YOLOMBÓ', '-75,0135288', '6,594688582', '1', '1');
INSERT INTO `tbl_city` VALUES ('5893', '5', 'YONDÓ', '-73,90989008', '7,00260353', '1', '1');
INSERT INTO `tbl_city` VALUES ('5895', '5', 'ZARAGOZA', '-74,86796174', '7,488149672', '1', '1');
INSERT INTO `tbl_city` VALUES ('8001', '8', 'BARRANQUILLA', '-74,81878809', '10,97964939', '1', '1');
INSERT INTO `tbl_city` VALUES ('8078', '8', 'BARANOA', '-74,91810775', '10,7899332', '1', '1');
INSERT INTO `tbl_city` VALUES ('8137', '8', 'CAMPO DE LA CRUZ', '-74,88125196', '10,37862311', '1', '1');
INSERT INTO `tbl_city` VALUES ('8141', '8', 'CANDELARIA', '-74,87912483', '10,45917786', '1', '1');
INSERT INTO `tbl_city` VALUES ('8296', '8', 'GALAPA', '-74,88313523', '10,90429605', '1', '1');
INSERT INTO `tbl_city` VALUES ('8372', '8', 'JUAN DE ACOSTA', '-75,03214584', '10,82990078', '1', '1');
INSERT INTO `tbl_city` VALUES ('8421', '8', 'LURUACO', '-75,14235164', '10,6108622', '1', '1');
INSERT INTO `tbl_city` VALUES ('8433', '8', 'MALAMBO', '-74,76648875', '10,83461272', '1', '1');
INSERT INTO `tbl_city` VALUES ('8436', '8', 'MANATÍ', '-74,95941141', '10,44704656', '1', '1');
INSERT INTO `tbl_city` VALUES ('8520', '8', 'PALMAR DE VARELA', '-74,75374593', '10,74060208', '1', '1');
INSERT INTO `tbl_city` VALUES ('8549', '8', 'PIOJÓ', '-75,10806563', '10,74920031', '1', '1');
INSERT INTO `tbl_city` VALUES ('8558', '8', 'POLONUEVO', '-74,85388652', '10,77699676', '1', '1');
INSERT INTO `tbl_city` VALUES ('8560', '8', 'PONEDERA', '-74,74939644', '10,64191783', '1', '1');
INSERT INTO `tbl_city` VALUES ('8573', '8', 'PUERTO COLOMBIA', '-74,95876178', '10,98552552', '1', '1');
INSERT INTO `tbl_city` VALUES ('8606', '8', 'REPELÓN', '-75,12459136', '10,49430706', '1', '1');
INSERT INTO `tbl_city` VALUES ('8634', '8', 'SABANAGRANDE', '-74,7568487', '10,79076785', '1', '1');
INSERT INTO `tbl_city` VALUES ('8638', '8', 'SABANALARGA', '-74,92062512', '10,63383341', '1', '1');
INSERT INTO `tbl_city` VALUES ('8675', '8', 'SANTA LUCÍA', '-74,96372406', '10,32628709', '1', '1');
INSERT INTO `tbl_city` VALUES ('8685', '8', 'SANTO TOMÁS', '-74,75243905', '10,75806294', '1', '1');
INSERT INTO `tbl_city` VALUES ('8758', '8', 'SOLEDAD', '-74,79234219', '10,90563208', '1', '1');
INSERT INTO `tbl_city` VALUES ('8770', '8', 'SUAN', '-74,88012314', '10,33369849', '1', '1');
INSERT INTO `tbl_city` VALUES ('8832', '8', 'TUBARÁ', '-74,97861141', '10,87398455', '1', '1');
INSERT INTO `tbl_city` VALUES ('8849', '8', 'USIACURÍ', '-74,97693311', '10,74277732', '1', '1');
INSERT INTO `tbl_city` VALUES ('11001', '11', 'BOGOTÁ, D.C.', '-74,11391872', '4,62457505', '1', '1');
INSERT INTO `tbl_city` VALUES ('13001', '13', 'CARTAGENA DE INDIAS', '-75,50122922', '10,39881648', '1', '1');
INSERT INTO `tbl_city` VALUES ('13006', '13', 'ACHÍ', '-74,55549177', '8,56785243', '1', '1');
INSERT INTO `tbl_city` VALUES ('13030', '13', 'ALTOS DEL ROSARIO', '-74,16523499', '8,792466161', '1', '1');
INSERT INTO `tbl_city` VALUES ('13042', '13', 'ARENAL', '-73,94327837', '8,459143837', '1', '1');
INSERT INTO `tbl_city` VALUES ('13052', '13', 'ARJONA', '-75,3455276', '10,25724995', '1', '1');
INSERT INTO `tbl_city` VALUES ('13062', '13', 'ARROYOHONDO', '-75,01976026', '10,25188173', '1', '1');
INSERT INTO `tbl_city` VALUES ('13074', '13', 'BARRANCO DE LOBA', '-74,10313108', '8,944577661', '1', '1');
INSERT INTO `tbl_city` VALUES ('13140', '13', 'CALAMAR', '-74,91380957', '10,25102481', '1', '1');
INSERT INTO `tbl_city` VALUES ('13160', '13', 'CANTAGALLO', '-73,92442804', '7,372898963', '1', '1');
INSERT INTO `tbl_city` VALUES ('13188', '13', 'CICUCO', '-74,6455241', '9,275398729', '1', '1');
INSERT INTO `tbl_city` VALUES ('13212', '13', 'CÓRDOBA', '-74,82750746', '9,586622995', '1', '1');
INSERT INTO `tbl_city` VALUES ('13222', '13', 'CLEMENCIA', '-75,32566862', '10,56763233', '1', '1');
INSERT INTO `tbl_city` VALUES ('13244', '13', 'EL CARMEN DE BOLÍVAR', '-75,12113883', '9,718034221', '1', '1');
INSERT INTO `tbl_city` VALUES ('13248', '13', 'EL GUAMO', '-74,9756442', '10,03224766', '1', '1');
INSERT INTO `tbl_city` VALUES ('13268', '13', 'EL PEÑÓN', '-73,94975188', '8,989058592', '1', '1');
INSERT INTO `tbl_city` VALUES ('13300', '13', 'HATILLO DE LOBA', '-74,07543983', '8,95590428', '1', '1');
INSERT INTO `tbl_city` VALUES ('13430', '13', 'MAGANGUÉ', '-74,75566786', '9,241367466', '1', '1');
INSERT INTO `tbl_city` VALUES ('13433', '13', 'MAHATES', '-75,19068859', '10,2331675', '1', '1');
INSERT INTO `tbl_city` VALUES ('13440', '13', 'MARGARITA', '-74,29374063', '9,159140236', '1', '1');
INSERT INTO `tbl_city` VALUES ('13442', '13', 'MARÍA LA BAJA', '-75,30320145', '9,985133439', '1', '1');
INSERT INTO `tbl_city` VALUES ('13458', '13', 'MONTECRISTO', '-74,47580245', '8,29331961', '1', '1');
INSERT INTO `tbl_city` VALUES ('13468', '13', 'MOMPÓS', '-74,42579943', '9,241021974', '1', '1');
INSERT INTO `tbl_city` VALUES ('13473', '13', 'MORALES', '-73,86756394', '8,275119762', '1', '1');
INSERT INTO `tbl_city` VALUES ('13490', '13', 'NOROSÍ', '-74,0372601', '8,527877441', '1', '1');
INSERT INTO `tbl_city` VALUES ('13549', '13', 'PINILLOS', '-74,46420086', '8,916228111', '1', '1');
INSERT INTO `tbl_city` VALUES ('13580', '13', 'REGIDOR', '-73,82220289', '8,666130593', '1', '1');
INSERT INTO `tbl_city` VALUES ('13600', '13', 'RÍO VIEJO', '-73,83767446', '8,589184725', '1', '1');
INSERT INTO `tbl_city` VALUES ('13620', '13', 'SAN CRISTÓBAL', '-75,06329358', '10,39382596', '1', '1');
INSERT INTO `tbl_city` VALUES ('13647', '13', 'SAN ESTANISLAO', '-75,1500702', '10,3982508', '1', '1');
INSERT INTO `tbl_city` VALUES ('13650', '13', 'SAN FERNANDO', '-74,33491483', '9,218871358', '1', '1');
INSERT INTO `tbl_city` VALUES ('13654', '13', 'SAN JACINTO', '-75,1217448', '9,830657753', '1', '1');
INSERT INTO `tbl_city` VALUES ('13655', '13', 'SAN JACINTO DEL CAUCA', '-74,72355124', '8,24948232', '1', '1');
INSERT INTO `tbl_city` VALUES ('13657', '13', 'SAN JUAN NEPOMUCENO', '-75,0836663', '9,951381277', '1', '1');
INSERT INTO `tbl_city` VALUES ('13667', '13', 'SAN MARTÍN DE LOBA', '-74,03825452', '8,937164813', '1', '1');
INSERT INTO `tbl_city` VALUES ('13670', '13', 'SAN PABLO', '-73,92455783', '7,477475436', '1', '1');
INSERT INTO `tbl_city` VALUES ('13673', '13', 'SANTA CATALINA', '-75,29038527', '10,60326688', '1', '1');
INSERT INTO `tbl_city` VALUES ('13683', '13', 'SANTA ROSA', '-75,36910243', '10,44547272', '1', '1');
INSERT INTO `tbl_city` VALUES ('13688', '13', 'SANTA ROSA DEL SUR', '-74,05144607', '7,963191103', '1', '1');
INSERT INTO `tbl_city` VALUES ('13744', '13', 'SIMITÍ', '-73,94636611', '7,955220136', '1', '1');
INSERT INTO `tbl_city` VALUES ('13760', '13', 'SOPLAVIENTO', '-75,13937322', '10,38942237', '1', '1');
INSERT INTO `tbl_city` VALUES ('13780', '13', 'TALAIGUA NUEVO', '-74,56791185', '9,305402808', '1', '1');
INSERT INTO `tbl_city` VALUES ('13810', '13', 'TIQUISIO', '-74,26478772', '8,556467205', '1', '1');
INSERT INTO `tbl_city` VALUES ('13836', '13', 'TURBACO', '-75,41554691', '10,33579029', '1', '1');
INSERT INTO `tbl_city` VALUES ('13838', '13', 'TURBANÁ', '-75,44432011', '10,2707782', '1', '1');
INSERT INTO `tbl_city` VALUES ('13873', '13', 'VILLANUEVA', '-75,27622198', '10,44445263', '1', '1');
INSERT INTO `tbl_city` VALUES ('13894', '13', 'ZAMBRANO', '-74,82588139', '9,751402451', '1', '1');
INSERT INTO `tbl_city` VALUES ('15001', '15', 'TUNJA', '-73,35436382', '5,539370636', '1', '1');
INSERT INTO `tbl_city` VALUES ('15022', '15', 'ALMEIDA', '-73,3787858', '4,971241015', '1', '1');
INSERT INTO `tbl_city` VALUES ('15047', '15', 'AQUITANIA', '-72,88435052', '5,518310389', '1', '1');
INSERT INTO `tbl_city` VALUES ('15051', '15', 'ARCABUCO', '-73,43969122', '5,756614472', '1', '1');
INSERT INTO `tbl_city` VALUES ('15087', '15', 'BELÉN', '-72,91125457', '5,988336865', '1', '1');
INSERT INTO `tbl_city` VALUES ('15090', '15', 'BERBEO', '-73,12686435', '5,22715204', '1', '1');
INSERT INTO `tbl_city` VALUES ('15092', '15', 'BETÉITIVA', '-72,80896001', '5,910810534', '1', '1');
INSERT INTO `tbl_city` VALUES ('15097', '15', 'BOAVITA', '-72,58477522', '6,330678035', '1', '1');
INSERT INTO `tbl_city` VALUES ('15104', '15', 'BOYACÁ', '-73,36202683', '5,454553832', '1', '1');
INSERT INTO `tbl_city` VALUES ('15106', '15', 'BRICEÑO', '-73,923304', '5,690164312', '1', '1');
INSERT INTO `tbl_city` VALUES ('15109', '15', 'BUENAVISTA', '-73,94099903', '5,511748527', '1', '1');
INSERT INTO `tbl_city` VALUES ('15114', '15', 'BUSBANZÁ', '-72,88388343', '5,830378894', '1', '1');
INSERT INTO `tbl_city` VALUES ('15131', '15', 'CALDAS', '-73,86531035', '5,554468751', '1', '1');
INSERT INTO `tbl_city` VALUES ('15135', '15', 'CAMPOHERMOSO', '-73,10351821', '5,030630049', '1', '1');
INSERT INTO `tbl_city` VALUES ('15162', '15', 'CERINZA', '-72,9477205', '5,955976752', '1', '1');
INSERT INTO `tbl_city` VALUES ('15172', '15', 'CHINAVITA', '-73,36862894', '5,167416629', '1', '1');
INSERT INTO `tbl_city` VALUES ('15176', '15', 'CHIQUINQUIRÁ', '-73,81871071', '5,614851057', '1', '1');
INSERT INTO `tbl_city` VALUES ('15180', '15', 'CHISCAS', '-72,50029315', '6,553491643', '1', '1');
INSERT INTO `tbl_city` VALUES ('15183', '15', 'CHITA', '-72,47355805', '6,187424081', '1', '1');
INSERT INTO `tbl_city` VALUES ('15185', '15', 'CHITARAQUE', '-73,44692936', '6,027475489', '1', '1');
INSERT INTO `tbl_city` VALUES ('15187', '15', 'CHIVATÁ', '-73,28089462', '5,560401526', '1', '1');
INSERT INTO `tbl_city` VALUES ('15189', '15', 'CIÉNEGA', '-73,29608968', '5,409521134', '1', '1');
INSERT INTO `tbl_city` VALUES ('15204', '15', 'CÓMBITA', '-73,32384233', '5,634334216', '1', '1');
INSERT INTO `tbl_city` VALUES ('15212', '15', 'COPER', '-74,04503529', '5,47539238', '1', '1');
INSERT INTO `tbl_city` VALUES ('15215', '15', 'CORRALES', '-72,84480753', '5,828082979', '1', '1');
INSERT INTO `tbl_city` VALUES ('15218', '15', 'COVARACHÍA', '-72,73899492', '6,500272002', '1', '1');
INSERT INTO `tbl_city` VALUES ('15223', '15', 'CUBARÁ', '-72,1060298', '7,003733273', '1', '1');
INSERT INTO `tbl_city` VALUES ('15224', '15', 'CUCAITA', '-73,45420008', '5,543018421', '1', '1');
INSERT INTO `tbl_city` VALUES ('15226', '15', 'CUÍTIVA', '-72,96612865', '5,580264111', '1', '1');
INSERT INTO `tbl_city` VALUES ('15232', '15', 'CHÍQUIZA', '-73,48572033', '5,604402418', '1', '1');
INSERT INTO `tbl_city` VALUES ('15236', '15', 'CHIVOR', '-73,36980037', '4,88876763', '1', '1');
INSERT INTO `tbl_city` VALUES ('15238', '15', 'DUITAMA', '-73,03026863', '5,819369141', '1', '1');
INSERT INTO `tbl_city` VALUES ('15244', '15', 'EL COCUY', '-72,44541276', '6,410378028', '1', '1');
INSERT INTO `tbl_city` VALUES ('15248', '15', 'EL ESPINO', '-72,49632211', '6,48261314', '1', '1');
INSERT INTO `tbl_city` VALUES ('15272', '15', 'FIRAVITOBA', '-72,9937204', '5,669120835', '1', '1');
INSERT INTO `tbl_city` VALUES ('15276', '15', 'FLORESTA', '-72,9190391', '5,859439166', '1', '1');
INSERT INTO `tbl_city` VALUES ('15293', '15', 'GACHANTIVÁ', '-73,54931534', '5,751968047', '1', '1');
INSERT INTO `tbl_city` VALUES ('15296', '15', 'GÁMEZA', '-72,80621022', '5,802837115', '1', '1');
INSERT INTO `tbl_city` VALUES ('15299', '15', 'GARAGOA', '-73,36476697', '5,082280849', '1', '1');
INSERT INTO `tbl_city` VALUES ('15317', '15', 'GUACAMAYAS', '-72,50060021', '6,459711974', '1', '1');
INSERT INTO `tbl_city` VALUES ('15322', '15', 'GUATEQUE', '-73,47228448', '5,00708725', '1', '1');
INSERT INTO `tbl_city` VALUES ('15325', '15', 'GUAYATÁ', '-73,49011865', '4,966820088', '1', '1');
INSERT INTO `tbl_city` VALUES ('15332', '15', 'GÜICÁN DE LA SIERRA', '-72,41206013', '6,462929587', '1', '1');
INSERT INTO `tbl_city` VALUES ('15362', '15', 'IZA', '-72,9796484', '5,612358449', '1', '1');
INSERT INTO `tbl_city` VALUES ('15367', '15', 'JENESANO', '-73,36395846', '5,384879362', '1', '1');
INSERT INTO `tbl_city` VALUES ('15368', '15', 'JERICÓ', '-72,57199201', '6,146104908', '1', '1');
INSERT INTO `tbl_city` VALUES ('15377', '15', 'LABRANZAGRANDE', '-72,57759412', '5,562358342', '1', '1');
INSERT INTO `tbl_city` VALUES ('15380', '15', 'LA CAPILLA', '-73,44501063', '5,09555867', '1', '1');
INSERT INTO `tbl_city` VALUES ('15401', '15', 'LA VICTORIA', '-74,2345974', '5,523149172', '1', '1');
INSERT INTO `tbl_city` VALUES ('15403', '15', 'LA UVITA', '-72,55943786', '6,31679484', '1', '1');
INSERT INTO `tbl_city` VALUES ('15407', '15', 'VILLA DE LEYVA', '-73,52644551', '5,63623796', '1', '1');
INSERT INTO `tbl_city` VALUES ('15425', '15', 'MACANAL', '-73,31952118', '4,972217331', '1', '1');
INSERT INTO `tbl_city` VALUES ('15442', '15', 'MARIPÍ', '-74,00464881', '5,549292772', '1', '1');
INSERT INTO `tbl_city` VALUES ('15455', '15', 'MIRAFLORES', '-73,14486261', '5,1959458', '1', '1');
INSERT INTO `tbl_city` VALUES ('15464', '15', 'MONGUA', '-72,80020513', '5,752830427', '1', '1');
INSERT INTO `tbl_city` VALUES ('15466', '15', 'MONGUÍ', '-72,84887988', '5,723361644', '1', '1');
INSERT INTO `tbl_city` VALUES ('15469', '15', 'MONIQUIRÁ', '-73,57410803', '5,873764868', '1', '1');
INSERT INTO `tbl_city` VALUES ('15476', '15', 'MOTAVITA', '-73,3681498', '5,577544265', '1', '1');
INSERT INTO `tbl_city` VALUES ('15480', '15', 'MUZO', '-74,10300099', '5,531279314', '1', '1');
INSERT INTO `tbl_city` VALUES ('15491', '15', 'NOBSA', '-72,94026073', '5,770571138', '1', '1');
INSERT INTO `tbl_city` VALUES ('15494', '15', 'NUEVO COLÓN', '-73,45706654', '5,355066956', '1', '1');
INSERT INTO `tbl_city` VALUES ('15500', '15', 'OICATÁ', '-73,30775368', '5,594409176', '1', '1');
INSERT INTO `tbl_city` VALUES ('15507', '15', 'OTANCHE', '-74,18131018', '5,657992699', '1', '1');
INSERT INTO `tbl_city` VALUES ('15511', '15', 'PACHAVITA', '-73,39710765', '5,140228745', '1', '1');
INSERT INTO `tbl_city` VALUES ('15514', '15', 'PÁEZ', '-73,05200057', '5,100660414', '1', '1');
INSERT INTO `tbl_city` VALUES ('15516', '15', 'PAIPA', '-73,11674378', '5,780489101', '1', '1');
INSERT INTO `tbl_city` VALUES ('15518', '15', 'PAJARITO', '-72,70256633', '5,293800672', '1', '1');
INSERT INTO `tbl_city` VALUES ('15522', '15', 'PANQUEBA', '-72,4589392', '6,442568913', '1', '1');
INSERT INTO `tbl_city` VALUES ('15531', '15', 'PAUNA', '-73,97858158', '5,656536552', '1', '1');
INSERT INTO `tbl_city` VALUES ('15533', '15', 'PAYA', '-72,42231608', '5,626395214', '1', '1');
INSERT INTO `tbl_city` VALUES ('15537', '15', 'PAZ DE RÍO', '-72,74752523', '5,988070906', '1', '1');
INSERT INTO `tbl_city` VALUES ('15542', '15', 'PESCA', '-73,05066343', '5,558687528', '1', '1');
INSERT INTO `tbl_city` VALUES ('15550', '15', 'PISBA', '-72,48318278', '5,723058424', '1', '1');
INSERT INTO `tbl_city` VALUES ('15572', '15', 'PUERTO BOYACÁ', '-74,57505414', '5,973313795', '1', '1');
INSERT INTO `tbl_city` VALUES ('15580', '15', 'QUÍPAMA', '-74,17916691', '5,523446963', '1', '1');
INSERT INTO `tbl_city` VALUES ('15599', '15', 'RAMIRIQUÍ', '-73,33546555', '5,401177771', '1', '1');
INSERT INTO `tbl_city` VALUES ('15600', '15', 'RÁQUIRA', '-73,63228856', '5,538737936', '1', '1');
INSERT INTO `tbl_city` VALUES ('15621', '15', 'RONDÓN', '-73,20859521', '5,357036039', '1', '1');
INSERT INTO `tbl_city` VALUES ('15632', '15', 'SABOYÁ', '-73,76291743', '5,696899293', '1', '1');
INSERT INTO `tbl_city` VALUES ('15638', '15', 'SÁCHICA', '-73,54252586', '5,583030121', '1', '1');
INSERT INTO `tbl_city` VALUES ('15646', '15', 'SAMACÁ', '-73,48597146', '5,492627404', '1', '1');
INSERT INTO `tbl_city` VALUES ('15660', '15', 'SAN EDUARDO', '-73,07660264', '5,224206617', '1', '1');
INSERT INTO `tbl_city` VALUES ('15664', '15', 'SAN JOSÉ DE PARE', '-73,54344909', '6,019610489', '1', '1');
INSERT INTO `tbl_city` VALUES ('15667', '15', 'SAN LUIS DE GACENO', '-73,16887227', '4,818705081', '1', '1');
INSERT INTO `tbl_city` VALUES ('15673', '15', 'SAN MATEO', '-72,55494287', '6,401834214', '1', '1');
INSERT INTO `tbl_city` VALUES ('15676', '15', 'SAN MIGUEL DE SEMA', '-73,72199248', '5,517729429', '1', '1');
INSERT INTO `tbl_city` VALUES ('15681', '15', 'SAN PABLO DE BORBUR', '-74,06659233', '5,659017757', '1', '1');
INSERT INTO `tbl_city` VALUES ('15686', '15', 'SANTANA', '-73,48185246', '6,057569927', '1', '1');
INSERT INTO `tbl_city` VALUES ('15690', '15', 'SANTA MARÍA', '-73,26325876', '4,857600641', '1', '1');
INSERT INTO `tbl_city` VALUES ('15693', '15', 'SANTA ROSA DE VITERBO', '-72,98238636', '5,874738604', '1', '1');
INSERT INTO `tbl_city` VALUES ('15696', '15', 'SANTA SOFÍA', '-73,60418204', '5,712273723', '1', '1');
INSERT INTO `tbl_city` VALUES ('15720', '15', 'SATIVANORTE', '-72,70787178', '6,131520952', '1', '1');
INSERT INTO `tbl_city` VALUES ('15723', '15', 'SATIVASUR', '-72,71206985', '6,093234404', '1', '1');
INSERT INTO `tbl_city` VALUES ('15740', '15', 'SIACHOQUE', '-73,24518859', '5,511019001', '1', '1');
INSERT INTO `tbl_city` VALUES ('15753', '15', 'SOATÁ', '-72,6833174', '6,333654186', '1', '1');
INSERT INTO `tbl_city` VALUES ('15755', '15', 'SOCOTÁ', '-72,63646037', '6,041175396', '1', '1');
INSERT INTO `tbl_city` VALUES ('15757', '15', 'SOCHA', '-72,69162654', '5,99685875', '1', '1');
INSERT INTO `tbl_city` VALUES ('15759', '15', 'SOGAMOSO', '-72,9232369', '5,724862053', '1', '1');
INSERT INTO `tbl_city` VALUES ('15761', '15', 'SOMONDOCO', '-73,43331223', '4,985809392', '1', '1');
INSERT INTO `tbl_city` VALUES ('15762', '15', 'SORA', '-73,44986726', '5,566856541', '1', '1');
INSERT INTO `tbl_city` VALUES ('15763', '15', 'SOTAQUIRÁ', '-73,24722618', '5,765166352', '1', '1');
INSERT INTO `tbl_city` VALUES ('15764', '15', 'SORACÁ', '-73,3328155', '5,501084317', '1', '1');
INSERT INTO `tbl_city` VALUES ('15774', '15', 'SUSACÓN', '-72,68978803', '6,230774737', '1', '1');
INSERT INTO `tbl_city` VALUES ('15776', '15', 'SUTAMARCHÁN', '-73,62056371', '5,620143909', '1', '1');
INSERT INTO `tbl_city` VALUES ('15778', '15', 'SUTATENZA', '-73,45204672', '5,023242631', '1', '1');
INSERT INTO `tbl_city` VALUES ('15790', '15', 'TASCO', '-72,78237255', '5,908988964', '1', '1');
INSERT INTO `tbl_city` VALUES ('15798', '15', 'TENZA', '-73,42165115', '5,076831566', '1', '1');
INSERT INTO `tbl_city` VALUES ('15804', '15', 'TIBANÁ', '-73,3967445', '5,316184465', '1', '1');
INSERT INTO `tbl_city` VALUES ('15806', '15', 'TIBASOSA', '-72,9996465', '5,747154143', '1', '1');
INSERT INTO `tbl_city` VALUES ('15808', '15', 'TINJACÁ', '-73,6471491', '5,579019329', '1', '1');
INSERT INTO `tbl_city` VALUES ('15810', '15', 'TIPACOQUE', '-72,69019233', '6,41502583', '1', '1');
INSERT INTO `tbl_city` VALUES ('15814', '15', 'TOCA', '-73,18451746', '5,565418638', '1', '1');
INSERT INTO `tbl_city` VALUES ('15816', '15', 'TOGÜÍ', '-73,51357192', '5,93754577', '1', '1');
INSERT INTO `tbl_city` VALUES ('15820', '15', 'TÓPAGA', '-72,83335056', '5,769274319', '1', '1');
INSERT INTO `tbl_city` VALUES ('15822', '15', 'TOTA', '-72,98542816', '5,560879905', '1', '1');
INSERT INTO `tbl_city` VALUES ('15832', '15', 'TUNUNGUÁ', '-73,93303506', '5,730407979', '1', '1');
INSERT INTO `tbl_city` VALUES ('15835', '15', 'TURMEQUÉ', '-73,4885657', '5,32384575', '1', '1');
INSERT INTO `tbl_city` VALUES ('15837', '15', 'TUTA', '-73,22588537', '5,69072808', '1', '1');
INSERT INTO `tbl_city` VALUES ('15839', '15', 'TUTAZÁ', '-72,85725056', '6,031942172', '1', '1');
INSERT INTO `tbl_city` VALUES ('15842', '15', 'ÚMBITA', '-73,45745267', '5,217753075', '1', '1');
INSERT INTO `tbl_city` VALUES ('15861', '15', 'VENTAQUEMADA', '-73,52063241', '5,369251883', '1', '1');
INSERT INTO `tbl_city` VALUES ('15879', '15', 'VIRACACHÁ', '-73,2966647', '5,436707563', '1', '1');
INSERT INTO `tbl_city` VALUES ('15897', '15', 'ZETAQUIRA', '-73,17202997', '5,284346565', '1', '1');
INSERT INTO `tbl_city` VALUES ('17001', '17', 'MANIZALES', '-75,49041506', '5,057050564', '1', '1');
INSERT INTO `tbl_city` VALUES ('17013', '17', 'AGUADAS', '-75,45572657', '5,612603683', '1', '1');
INSERT INTO `tbl_city` VALUES ('17042', '17', 'ANSERMA', '-75,78399658', '5,23807383', '1', '1');
INSERT INTO `tbl_city` VALUES ('17050', '17', 'ARANZAZU', '-75,49077731', '5,271304385', '1', '1');
INSERT INTO `tbl_city` VALUES ('17088', '17', 'BELALCÁZAR', '-75,8038073', '4,995177681', '1', '1');
INSERT INTO `tbl_city` VALUES ('17174', '17', 'CHINCHINÁ', '-75,60638497', '4,985518005', '1', '1');
INSERT INTO `tbl_city` VALUES ('17272', '17', 'FILADELFIA', '-75,56228224', '5,297350278', '1', '1');
INSERT INTO `tbl_city` VALUES ('17380', '17', 'LA DORADA', '-74,67445215', '5,443899994', '1', '1');
INSERT INTO `tbl_city` VALUES ('17388', '17', 'LA MERCED', '-75,54734816', '5,39480456', '1', '1');
INSERT INTO `tbl_city` VALUES ('17433', '17', 'MANZANARES', '-75,15350199', '5,254101606', '1', '1');
INSERT INTO `tbl_city` VALUES ('17442', '17', 'MARMATO', '-75,59969042', '5,474333671', '1', '1');
INSERT INTO `tbl_city` VALUES ('17444', '17', 'MARQUETALIA', '-75,04785397', '5,298650896', '1', '1');
INSERT INTO `tbl_city` VALUES ('17446', '17', 'MARULANDA', '-75,25832533', '5,28351076', '1', '1');
INSERT INTO `tbl_city` VALUES ('17486', '17', 'NEIRA', '-75,51976932', '5,166415936', '1', '1');
INSERT INTO `tbl_city` VALUES ('17495', '17', 'NORCASIA', '-74,88917962', '5,575276372', '1', '1');
INSERT INTO `tbl_city` VALUES ('17513', '17', 'PÁCORA', '-75,46000891', '5,528686896', '1', '1');
INSERT INTO `tbl_city` VALUES ('17524', '17', 'PALESTINA', '-75,6211134', '5,019116344', '1', '1');
INSERT INTO `tbl_city` VALUES ('17541', '17', 'PENSILVANIA', '-75,1592945', '5,383718517', '1', '1');
INSERT INTO `tbl_city` VALUES ('17614', '17', 'RIOSUCIO', '-75,70231885', '5,423953475', '1', '1');
INSERT INTO `tbl_city` VALUES ('17616', '17', 'RISARALDA', '-75,77063146', '5,159400314', '1', '1');
INSERT INTO `tbl_city` VALUES ('17653', '17', 'SALAMINA', '-75,48717096', '5,402601489', '1', '1');
INSERT INTO `tbl_city` VALUES ('17662', '17', 'SAMANÁ', '-74,99238026', '5,413074333', '1', '1');
INSERT INTO `tbl_city` VALUES ('17665', '17', 'SAN JOSÉ', '-75,79165099', '5,082642862', '1', '1');
INSERT INTO `tbl_city` VALUES ('17777', '17', 'SUPÍA', '-75,64946621', '5,446099934', '1', '1');
INSERT INTO `tbl_city` VALUES ('17867', '17', 'VICTORIA', '-74,91069263', '5,31706445', '1', '1');
INSERT INTO `tbl_city` VALUES ('17873', '17', 'VILLAMARÍA', '-75,48981029', '5,039169652', '1', '1');
INSERT INTO `tbl_city` VALUES ('17877', '17', 'VITERBO', '-75,87075929', '5,062864419', '1', '1');
INSERT INTO `tbl_city` VALUES ('18001', '18', 'FLORENCIA', '-75,60799327', '1,615829079', '1', '1');
INSERT INTO `tbl_city` VALUES ('18029', '18', 'ALBANIA', '-75,87865221', '1,329033772', '1', '1');
INSERT INTO `tbl_city` VALUES ('18094', '18', 'BELÉN DE LOS ANDAQUÍES', '-75,86926884', '1,419975075', '1', '1');
INSERT INTO `tbl_city` VALUES ('18150', '18', 'CARTAGENA DEL CHAIRÁ', '-74,84757202', '1,334019407', '1', '1');
INSERT INTO `tbl_city` VALUES ('18205', '18', 'CURILLO', '-75,92035477', '1,033655295', '1', '1');
INSERT INTO `tbl_city` VALUES ('18247', '18', 'EL DONCELLO', '-75,28283737', '1,679063507', '1', '1');
INSERT INTO `tbl_city` VALUES ('18256', '18', 'EL PAUJÍL', '-75,32674565', '1,570491137', '1', '1');
INSERT INTO `tbl_city` VALUES ('18410', '18', 'LA MONTAÑITA', '-75,43614703', '1,488330221', '1', '1');
INSERT INTO `tbl_city` VALUES ('18460', '18', 'MILÁN', '-75,50753031', '1,29064424', '1', '1');
INSERT INTO `tbl_city` VALUES ('18479', '18', 'MORELIA', '-75,72655847', '1,488039025', '1', '1');
INSERT INTO `tbl_city` VALUES ('18592', '18', 'PUERTO RICO', '-75,15803936', '1,91091862', '1', '1');
INSERT INTO `tbl_city` VALUES ('18610', '18', 'SAN JOSÉ DEL FRAGUA', '-75,97366185', '1,331725838', '1', '1');
INSERT INTO `tbl_city` VALUES ('18753', '18', 'SAN VICENTE DEL CAGUÁN', '-74,77195969', '2,113417738', '1', '1');
INSERT INTO `tbl_city` VALUES ('18756', '18', 'SOLANO', '-75,25358608', '0,699015533', '1', '1');
INSERT INTO `tbl_city` VALUES ('18785', '18', 'SOLITA', '-75,61998096', '0,87265002', '1', '1');
INSERT INTO `tbl_city` VALUES ('18860', '18', 'VALPARAÍSO', '-75,70536629', '1,197615252', '1', '1');
INSERT INTO `tbl_city` VALUES ('19001', '19', 'POPAYÁN', '-76,62478764', '2,448239605', '1', '1');
INSERT INTO `tbl_city` VALUES ('19022', '19', 'ALMAGUER', '-76,85281741', '1,915253775', '1', '1');
INSERT INTO `tbl_city` VALUES ('19050', '19', 'ARGELIA', '-77,24907523', '2,255549567', '1', '1');
INSERT INTO `tbl_city` VALUES ('19075', '19', 'BALBOA', '-77,21654121', '2,041393559', '1', '1');
INSERT INTO `tbl_city` VALUES ('19100', '19', 'BOLÍVAR', '-76,9667572', '1,837562703', '1', '1');
INSERT INTO `tbl_city` VALUES ('19110', '19', 'BUENOS AIRES', '-76,6425464', '3,016024405', '1', '1');
INSERT INTO `tbl_city` VALUES ('19130', '19', 'CAJIBÍO', '-76,57038564', '2,623031089', '1', '1');
INSERT INTO `tbl_city` VALUES ('19137', '19', 'CALDONO', '-76,48470182', '2,797508881', '1', '1');
INSERT INTO `tbl_city` VALUES ('19142', '19', 'CALOTO', '-76,4084846', '3,033158363', '1', '1');
INSERT INTO `tbl_city` VALUES ('19212', '19', 'CORINTO', '-76,26162728', '3,17565161', '1', '1');
INSERT INTO `tbl_city` VALUES ('19256', '19', 'EL TAMBO', '-76,81140062', '2,452428849', '1', '1');
INSERT INTO `tbl_city` VALUES ('19290', '19', 'FLORENCIA', '-77,07275376', '1,683035398', '1', '1');
INSERT INTO `tbl_city` VALUES ('19300', '19', 'GUACHENÉ', '-76,39606231', '3,133636417', '1', '1');
INSERT INTO `tbl_city` VALUES ('19318', '19', 'GUAPÍ', '-77,88546675', '2,571989981', '1', '1');
INSERT INTO `tbl_city` VALUES ('19355', '19', 'INZÁ', '-76,06396657', '2,548738115', '1', '1');
INSERT INTO `tbl_city` VALUES ('19364', '19', 'JAMBALÓ', '-76,32440743', '2,778021007', '1', '1');
INSERT INTO `tbl_city` VALUES ('19392', '19', 'LA SIERRA', '-76,76320226', '2,177041682', '1', '1');
INSERT INTO `tbl_city` VALUES ('19397', '19', 'LA VEGA', '-76,78150374', '2,004638391', '1', '1');
INSERT INTO `tbl_city` VALUES ('19418', '19', 'LÓPEZ DE MICAY', '-77,2482771', '2,845916625', '1', '1');
INSERT INTO `tbl_city` VALUES ('19450', '19', 'MERCADERES', '-77,16872936', '1,803075054', '1', '1');
INSERT INTO `tbl_city` VALUES ('19455', '19', 'MIRANDA', '-76,22967043', '3,251894066', '1', '1');
INSERT INTO `tbl_city` VALUES ('19473', '19', 'MORALES', '-76,62558491', '2,749306025', '1', '1');
INSERT INTO `tbl_city` VALUES ('19513', '19', 'PADILLA', '-76,31301759', '3,222997316', '1', '1');
INSERT INTO `tbl_city` VALUES ('19517', '19', 'PÁEZ', '-75,97192356', '2,645311465', '1', '1');
INSERT INTO `tbl_city` VALUES ('19532', '19', 'PATÍA', '-76,98568182', '2,113081391', '1', '1');
INSERT INTO `tbl_city` VALUES ('19533', '19', 'PIAMONTE', '-76,32672139', '1,115676908', '1', '1');
INSERT INTO `tbl_city` VALUES ('19548', '19', 'PIENDAMÓ', '-76,52739554', '2,637589433', '1', '1');
INSERT INTO `tbl_city` VALUES ('19573', '19', 'PUERTO TEJADA', '-76,41706837', '3,232659293', '1', '1');
INSERT INTO `tbl_city` VALUES ('19585', '19', 'PURACÉ', '-76,49691805', '2,342595234', '1', '1');
INSERT INTO `tbl_city` VALUES ('19622', '19', 'ROSAS', '-76,73887997', '2,261720052', '1', '1');
INSERT INTO `tbl_city` VALUES ('19693', '19', 'SAN SEBASTIÁN', '-76,76877671', '1,838500666', '1', '1');
INSERT INTO `tbl_city` VALUES ('19698', '19', 'SANTANDER DE QUILICHAO', '-76,48534589', '3,011287968', '1', '1');
INSERT INTO `tbl_city` VALUES ('19701', '19', 'SANTA ROSA', '-76,57382342', '1,7030252', '1', '1');
INSERT INTO `tbl_city` VALUES ('19743', '19', 'SILVIA', '-76,37277842', '2,615123016', '1', '1');
INSERT INTO `tbl_city` VALUES ('19760', '19', 'SOTARA', '-76,61417097', '2,253217203', '1', '1');
INSERT INTO `tbl_city` VALUES ('19780', '19', 'SUÁREZ', '-76,69582978', '2,954881688', '1', '1');
INSERT INTO `tbl_city` VALUES ('19785', '19', 'SUCRE', '-76,92550779', '2,038110606', '1', '1');
INSERT INTO `tbl_city` VALUES ('19807', '19', 'TIMBÍO', '-76,67786969', '2,349720614', '1', '1');
INSERT INTO `tbl_city` VALUES ('19809', '19', 'TIMBIQUÍ', '-77,67063598', '2,780356618', '1', '1');
INSERT INTO `tbl_city` VALUES ('19821', '19', 'TORIBÍO', '-76,27049302', '2,953701969', '1', '1');
INSERT INTO `tbl_city` VALUES ('19824', '19', 'TOTORÓ', '-76,39817055', '2,511197627', '1', '1');
INSERT INTO `tbl_city` VALUES ('19845', '19', 'VILLA RICA', '-76,46161371', '3,174922713', '1', '1');
INSERT INTO `tbl_city` VALUES ('20001', '20', 'VALLEDUPAR', '-73,25864834', '10,46151843', '1', '1');
INSERT INTO `tbl_city` VALUES ('20011', '20', 'AGUACHICA', '-73,60130045', '8,310120969', '1', '1');
INSERT INTO `tbl_city` VALUES ('20013', '20', 'AGUSTÍN CODAZZI', '-73,23743145', '10,04036455', '1', '1');
INSERT INTO `tbl_city` VALUES ('20032', '20', 'ASTREA', '-73,97539003', '9,495334353', '1', '1');
INSERT INTO `tbl_city` VALUES ('20045', '20', 'BECERRIL', '-73,27810734', '9,704133671', '1', '1');
INSERT INTO `tbl_city` VALUES ('20060', '20', 'BOSCONIA', '-73,88804193', '9,974371994', '1', '1');
INSERT INTO `tbl_city` VALUES ('20175', '20', 'CHIMICHAGUA', '-73,8130833', '9,257881082', '1', '1');
INSERT INTO `tbl_city` VALUES ('20178', '20', 'CHIRIGUANÁ', '-73,60091321', '9,36137942', '1', '1');
INSERT INTO `tbl_city` VALUES ('20228', '20', 'CURUMANÍ', '-73,54136427', '9,200339784', '1', '1');
INSERT INTO `tbl_city` VALUES ('20238', '20', 'EL COPEY', '-73,96137025', '10,14913211', '1', '1');
INSERT INTO `tbl_city` VALUES ('20250', '20', 'EL PASO', '-73,74645431', '9,661878357', '1', '1');
INSERT INTO `tbl_city` VALUES ('20295', '20', 'GAMARRA', '-73,74253008', '8,321606393', '1', '1');
INSERT INTO `tbl_city` VALUES ('20310', '20', 'GONZÁLEZ', '-73,3820896', '8,391280979', '1', '1');
INSERT INTO `tbl_city` VALUES ('20383', '20', 'LA GLORIA', '-73,80111141', '8,618015129', '1', '1');
INSERT INTO `tbl_city` VALUES ('20400', '20', 'LA JAGUA DE IBIRICO', '-73,33555181', '9,562867056', '1', '1');
INSERT INTO `tbl_city` VALUES ('20443', '20', 'MANAURE BALCÓN DEL CESAR', '-73,0288341', '10,39074832', '1', '1');
INSERT INTO `tbl_city` VALUES ('20517', '20', 'PAILITAS', '-73,62539879', '8,956042995', '1', '1');
INSERT INTO `tbl_city` VALUES ('20550', '20', 'PELAYA', '-73,66183063', '8,687324719', '1', '1');
INSERT INTO `tbl_city` VALUES ('20570', '20', 'PUEBLO BELLO', '-73,58700594', '10,41496879', '1', '1');
INSERT INTO `tbl_city` VALUES ('20614', '20', 'RÍO DE ORO', '-73,38707053', '8,292053956', '1', '1');
INSERT INTO `tbl_city` VALUES ('20621', '20', 'LA PAZ', '-73,17269131', '10,38646779', '1', '1');
INSERT INTO `tbl_city` VALUES ('20710', '20', 'SAN ALBERTO', '-73,39745957', '7,756205184', '1', '1');
INSERT INTO `tbl_city` VALUES ('20750', '20', 'SAN DIEGO', '-73,1807288', '10,33369278', '1', '1');
INSERT INTO `tbl_city` VALUES ('20770', '20', 'SAN MARTÍN', '-73,51273659', '8,003486373', '1', '1');
INSERT INTO `tbl_city` VALUES ('20787', '20', 'TAMALAMEQUE', '-73,81185017', '8,8623923', '1', '1');
INSERT INTO `tbl_city` VALUES ('23001', '23', 'MONTERÍA', '-75,89563933', '8,749916663', '1', '1');
INSERT INTO `tbl_city` VALUES ('23068', '23', 'AYAPEL', '-75,14701164', '8,311131961', '1', '1');
INSERT INTO `tbl_city` VALUES ('23079', '23', 'BUENAVISTA', '-75,47968769', '8,222193557', '1', '1');
INSERT INTO `tbl_city` VALUES ('23090', '23', 'CANALETE', '-76,24075326', '8,787600917', '1', '1');
INSERT INTO `tbl_city` VALUES ('23162', '23', 'CERETÉ', '-75,79188186', '8,886661553', '1', '1');
INSERT INTO `tbl_city` VALUES ('23168', '23', 'CHIMÁ', '-75,62738181', '9,149344471', '1', '1');
INSERT INTO `tbl_city` VALUES ('23182', '23', 'CHINÚ', '-75,40167492', '9,104152773', '1', '1');
INSERT INTO `tbl_city` VALUES ('23189', '23', 'CIÉNAGA DE ORO', '-75,62210934', '8,878176595', '1', '1');
INSERT INTO `tbl_city` VALUES ('23300', '23', 'COTORRA', '-75,78556807', '9,040269683', '1', '1');
INSERT INTO `tbl_city` VALUES ('23350', '23', 'LA APARTADA', '-75,3338153', '8,044359313', '1', '1');
INSERT INTO `tbl_city` VALUES ('23417', '23', 'LORICA', '-75,81688954', '9,2403681', '1', '1');
INSERT INTO `tbl_city` VALUES ('23419', '23', 'LOS CÓRDOBAS', '-76,35470999', '8,895108781', '1', '1');
INSERT INTO `tbl_city` VALUES ('23464', '23', 'MOMIL', '-75,67667298', '9,240021569', '1', '1');
INSERT INTO `tbl_city` VALUES ('23466', '23', 'MONTELÍBANO', '-75,40884972', '7,985700615', '1', '1');
INSERT INTO `tbl_city` VALUES ('23500', '23', 'MOÑITOS', '-76,13491612', '9,244709964', '1', '1');
INSERT INTO `tbl_city` VALUES ('23555', '23', 'PLANETA RICA', '-75,5840215', '8,411304059', '1', '1');
INSERT INTO `tbl_city` VALUES ('23570', '23', 'PUEBLO NUEVO', '-75,50817755', '8,502655644', '1', '1');
INSERT INTO `tbl_city` VALUES ('23574', '23', 'PUERTO ESCONDIDO', '-76,26147472', '9,002191204', '1', '1');
INSERT INTO `tbl_city` VALUES ('23580', '23', 'PUERTO LIBERTADOR', '-75,67202229', '7,889279214', '1', '1');
INSERT INTO `tbl_city` VALUES ('23586', '23', 'PURÍSIMA DE LA CONCEPCIÓN', '-75,72320456', '9,238548838', '1', '1');
INSERT INTO `tbl_city` VALUES ('23660', '23', 'SAHAGÚN', '-75,43679403', '8,942502552', '1', '1');
INSERT INTO `tbl_city` VALUES ('23670', '23', 'SAN ANDRÉS DE SOTAVENTO', '-75,50869946', '9,144886247', '1', '1');
INSERT INTO `tbl_city` VALUES ('23672', '23', 'SAN ANTERO', '-75,76220197', '9,370932545', '1', '1');
INSERT INTO `tbl_city` VALUES ('23675', '23', 'SAN BERNARDO DEL VIENTO', '-75,95404449', '9,353877993', '1', '1');
INSERT INTO `tbl_city` VALUES ('23678', '23', 'SAN CARLOS', '-75,69902876', '8,799219106', '1', '1');
INSERT INTO `tbl_city` VALUES ('23682', '23', 'SAN JOSÉ DE URÉ', '-75,53485499', '7,786983639', '1', '1');
INSERT INTO `tbl_city` VALUES ('23686', '23', 'SAN PELAYO', '-75,83221732', '8,952615258', '1', '1');
INSERT INTO `tbl_city` VALUES ('23807', '23', 'TIERRALTA', '-76,06231663', '8,172246548', '1', '1');
INSERT INTO `tbl_city` VALUES ('23815', '23', 'TUCHÍN', '-75,5526583', '9,186917689', '1', '1');
INSERT INTO `tbl_city` VALUES ('23855', '23', 'VALENCIA', '-76,14793852', '8,257351824', '1', '1');
INSERT INTO `tbl_city` VALUES ('25001', '25', 'AGUA DE DIOS', '-74,66954561', '4,375853133', '1', '1');
INSERT INTO `tbl_city` VALUES ('25019', '25', 'ALBÁN', '-74,43669886', '4,876082269', '1', '1');
INSERT INTO `tbl_city` VALUES ('25035', '25', 'ANAPOIMA', '-74,53066921', '4,56299759', '1', '1');
INSERT INTO `tbl_city` VALUES ('25040', '25', 'ANOLAIMA', '-74,46378065', '4,761661168', '1', '1');
INSERT INTO `tbl_city` VALUES ('25053', '25', 'ARBELÁEZ', '-74,41608401', '4,272259892', '1', '1');
INSERT INTO `tbl_city` VALUES ('25086', '25', 'BELTRÁN', '-74,74123512', '4,8026877', '1', '1');
INSERT INTO `tbl_city` VALUES ('25095', '25', 'BITUIMA', '-74,53969702', '4,872035678', '1', '1');
INSERT INTO `tbl_city` VALUES ('25099', '25', 'BOJACÁ', '-74,34756312', '4,741486257', '1', '1');
INSERT INTO `tbl_city` VALUES ('25120', '25', 'CABRERA', '-74,48428376', '3,984828481', '1', '1');
INSERT INTO `tbl_city` VALUES ('25123', '25', 'CACHIPAY', '-74,43595266', '4,730928907', '1', '1');
INSERT INTO `tbl_city` VALUES ('25126', '25', 'CAJICÁ', '-74,02363653', '4,920872914', '1', '1');
INSERT INTO `tbl_city` VALUES ('25148', '25', 'CAPARRAPÍ', '-74,49219527', '5,343571221', '1', '1');
INSERT INTO `tbl_city` VALUES ('25151', '25', 'CÁQUEZA', '-73,94657392', '4,403665469', '1', '1');
INSERT INTO `tbl_city` VALUES ('25154', '25', 'CARMEN DE CARUPA', '-73,9009831', '5,349085788', '1', '1');
INSERT INTO `tbl_city` VALUES ('25168', '25', 'CHAGUANÍ', '-74,59271446', '4,947730601', '1', '1');
INSERT INTO `tbl_city` VALUES ('25175', '25', 'CHÍA', '-74,04964819', '4,865802072', '1', '1');
INSERT INTO `tbl_city` VALUES ('25178', '25', 'CHIPAQUE', '-74,04459817', '4,442530707', '1', '1');
INSERT INTO `tbl_city` VALUES ('25181', '25', 'CHOACHÍ', '-73,92296719', '4,529015857', '1', '1');
INSERT INTO `tbl_city` VALUES ('25183', '25', 'CHOCONTÁ', '-73,68322053', '5,14485857', '1', '1');
INSERT INTO `tbl_city` VALUES ('25200', '25', 'COGUA', '-73,97825825', '5,061808832', '1', '1');
INSERT INTO `tbl_city` VALUES ('25214', '25', 'COTA', '-74,10293364', '4,808700968', '1', '1');
INSERT INTO `tbl_city` VALUES ('25224', '25', 'CUCUNUBÁ', '-73,76631061', '5,250590332', '1', '1');
INSERT INTO `tbl_city` VALUES ('25245', '25', 'EL COLEGIO', '-74,44273951', '4,578264669', '1', '1');
INSERT INTO `tbl_city` VALUES ('25258', '25', 'EL PEÑÓN', '-74,29016259', '5,249083413', '1', '1');
INSERT INTO `tbl_city` VALUES ('25260', '25', 'EL ROSAL', '-74,26192318', '4,852394554', '1', '1');
INSERT INTO `tbl_city` VALUES ('25269', '25', 'FACATATIVÁ', '-74,35101469', '4,812242015', '1', '1');
INSERT INTO `tbl_city` VALUES ('25279', '25', 'FÓMEQUE', '-73,89273351', '4,4848956', '1', '1');
INSERT INTO `tbl_city` VALUES ('25281', '25', 'FOSCA', '-73,93929548', '4,338736012', '1', '1');
INSERT INTO `tbl_city` VALUES ('25286', '25', 'FUNZA', '-74,2019794', '4,708656539', '1', '1');
INSERT INTO `tbl_city` VALUES ('25288', '25', 'FÚQUENE', '-73,7958098', '5,40400391', '1', '1');
INSERT INTO `tbl_city` VALUES ('25290', '25', 'FUSAGASUGÁ', '-74,36636797', '4,337748142', '1', '1');
INSERT INTO `tbl_city` VALUES ('25293', '25', 'GACHALÁ', '-73,52080548', '4,693192014', '1', '1');
INSERT INTO `tbl_city` VALUES ('25295', '25', 'GACHANCIPÁ', '-73,87291756', '4,991050375', '1', '1');
INSERT INTO `tbl_city` VALUES ('25297', '25', 'GACHETÁ', '-73,63648643', '4,816329757', '1', '1');
INSERT INTO `tbl_city` VALUES ('25299', '25', 'GAMA', '-73,610785', '4,762583118', '1', '1');
INSERT INTO `tbl_city` VALUES ('25307', '25', 'GIRARDOT', '-74,81046294', '4,303705489', '1', '1');
INSERT INTO `tbl_city` VALUES ('25312', '25', 'GRANADA', '-74,35074946', '4,519640687', '1', '1');
INSERT INTO `tbl_city` VALUES ('25317', '25', 'GUACHETÁ', '-73,68689612', '5,38359009', '1', '1');
INSERT INTO `tbl_city` VALUES ('25320', '25', 'GUADUAS', '-74,60341455', '5,072489994', '1', '1');
INSERT INTO `tbl_city` VALUES ('25322', '25', 'GUASCA', '-73,87806905', '4,867548752', '1', '1');
INSERT INTO `tbl_city` VALUES ('25324', '25', 'GUATAQUÍ', '-74,79032746', '4,518104158', '1', '1');
INSERT INTO `tbl_city` VALUES ('25326', '25', 'GUATAVITA', '-73,83333745', '4,933964864', '1', '1');
INSERT INTO `tbl_city` VALUES ('25328', '25', 'GUAYABAL DE SÍQUIMA', '-74,46734836', '4,877941372', '1', '1');
INSERT INTO `tbl_city` VALUES ('25335', '25', 'GUAYABETAL', '-73,81703255', '4,217069459', '1', '1');
INSERT INTO `tbl_city` VALUES ('25339', '25', 'GUTIÉRREZ', '-74,00298681', '4,254939023', '1', '1');
INSERT INTO `tbl_city` VALUES ('25368', '25', 'JERUSALÉN', '-74,69466011', '4,562437847', '1', '1');
INSERT INTO `tbl_city` VALUES ('25372', '25', 'JUNÍN', '-73,66297365', '4,790297335', '1', '1');
INSERT INTO `tbl_city` VALUES ('25377', '25', 'LA CALERA', '-73,97012389', '4,720144009', '1', '1');
INSERT INTO `tbl_city` VALUES ('25386', '25', 'LA MESA', '-74,45428812', '4,635373721', '1', '1');
INSERT INTO `tbl_city` VALUES ('25394', '25', 'LA PALMA', '-74,39091128', '5,358965225', '1', '1');
INSERT INTO `tbl_city` VALUES ('25398', '25', 'LA PEÑA', '-74,39407654', '5,198874378', '1', '1');
INSERT INTO `tbl_city` VALUES ('25402', '25', 'LA VEGA', '-74,33115437', '4,990542704', '1', '1');
INSERT INTO `tbl_city` VALUES ('25407', '25', 'LENGUAZAQUE', '-73,71144523', '5,306026496', '1', '1');
INSERT INTO `tbl_city` VALUES ('25426', '25', 'MACHETÁ', '-73,60650915', '5,07991549', '1', '1');
INSERT INTO `tbl_city` VALUES ('25430', '25', 'MADRID', '-74,26675545', '4,732845203', '1', '1');
INSERT INTO `tbl_city` VALUES ('25436', '25', 'MANTA', '-73,54047', '5,00919863', '1', '1');
INSERT INTO `tbl_city` VALUES ('25438', '25', 'MEDINA', '-73,35052791', '4,508653878', '1', '1');
INSERT INTO `tbl_city` VALUES ('25473', '25', 'MOSQUERA', '-74,22826847', '4,714304625', '1', '1');
INSERT INTO `tbl_city` VALUES ('25483', '25', 'NARIÑO', '-74,82674664', '4,399203382', '1', '1');
INSERT INTO `tbl_city` VALUES ('25486', '25', 'NEMOCÓN', '-73,87889069', '5,06759181', '1', '1');
INSERT INTO `tbl_city` VALUES ('25488', '25', 'NILO', '-74,62050876', '4,306863741', '1', '1');
INSERT INTO `tbl_city` VALUES ('25489', '25', 'NIMAIMA', '-74,38660022', '5,125921701', '1', '1');
INSERT INTO `tbl_city` VALUES ('25491', '25', 'NOCAIMA', '-74,37747361', '5,069415606', '1', '1');
INSERT INTO `tbl_city` VALUES ('25506', '25', 'VENECIA', '-74,47771953', '4,089166393', '1', '1');
INSERT INTO `tbl_city` VALUES ('25513', '25', 'PACHO', '-74,14617954', '5,150820009', '1', '1');
INSERT INTO `tbl_city` VALUES ('25518', '25', 'PAIME', '-74,15280462', '5,370820318', '1', '1');
INSERT INTO `tbl_city` VALUES ('25524', '25', 'PANDI', '-74,48673446', '4,191231526', '1', '1');
INSERT INTO `tbl_city` VALUES ('25530', '25', 'PARATEBUENO', '-73,21286386', '4,375026289', '1', '1');
INSERT INTO `tbl_city` VALUES ('25535', '25', 'PASCA', '-74,304976', '4,310272836', '1', '1');
INSERT INTO `tbl_city` VALUES ('25572', '25', 'PUERTO SALGAR', '-74,65271812', '5,464979237', '1', '1');
INSERT INTO `tbl_city` VALUES ('25580', '25', 'PULÍ', '-74,71495456', '4,681531631', '1', '1');
INSERT INTO `tbl_city` VALUES ('25592', '25', 'QUEBRADANEGRA', '-74,47991574', '5,118234028', '1', '1');
INSERT INTO `tbl_city` VALUES ('25594', '25', 'QUETAME', '-73,86293527', '4,329845695', '1', '1');
INSERT INTO `tbl_city` VALUES ('25596', '25', 'QUIPILE', '-74,53345106', '4,74473436', '1', '1');
INSERT INTO `tbl_city` VALUES ('25599', '25', 'APULO', '-74,58929748', '4,527960123', '1', '1');
INSERT INTO `tbl_city` VALUES ('25612', '25', 'RICAURTE', '-74,77392082', '4,2840903', '1', '1');
INSERT INTO `tbl_city` VALUES ('25645', '25', 'SAN ANTONIO DEL TEQUENDAMA', '-74,35181631', '4,616074117', '1', '1');
INSERT INTO `tbl_city` VALUES ('25649', '25', 'SAN BERNARDO', '-74,42452123', '4,180275856', '1', '1');
INSERT INTO `tbl_city` VALUES ('25653', '25', 'SAN CAYETANO', '-74,02321518', '5,333248772', '1', '1');
INSERT INTO `tbl_city` VALUES ('25658', '25', 'SAN FRANCISCO', '-74,28969763', '4,972483262', '1', '1');
INSERT INTO `tbl_city` VALUES ('25662', '25', 'SAN JUAN DE RIOSECO', '-74,62165591', '4,847253153', '1', '1');
INSERT INTO `tbl_city` VALUES ('25718', '25', 'SASAIMA', '-74,43294791', '4,962113975', '1', '1');
INSERT INTO `tbl_city` VALUES ('25736', '25', 'SESQUILÉ', '-73,79673518', '5,045195339', '1', '1');
INSERT INTO `tbl_city` VALUES ('25740', '25', 'SIBATÉ', '-74,25874939', '4,487871343', '1', '1');
INSERT INTO `tbl_city` VALUES ('25743', '25', 'SILVANIA', '-74,40463683', '4,381329226', '1', '1');
INSERT INTO `tbl_city` VALUES ('25745', '25', 'SIMIJACA', '-73,85010212', '5,504778752', '1', '1');
INSERT INTO `tbl_city` VALUES ('25754', '25', 'SOACHA', '-74,19490154', '4,586390016', '1', '1');
INSERT INTO `tbl_city` VALUES ('25758', '25', 'SOPÓ', '-73,93888529', '4,906942437', '1', '1');
INSERT INTO `tbl_city` VALUES ('25769', '25', 'SUBACHOQUE', '-74,17223596', '4,928374005', '1', '1');
INSERT INTO `tbl_city` VALUES ('25772', '25', 'SUESCA', '-73,79836105', '5,103436926', '1', '1');
INSERT INTO `tbl_city` VALUES ('25777', '25', 'SUPATÁ', '-74,23583581', '5,06181224', '1', '1');
INSERT INTO `tbl_city` VALUES ('25779', '25', 'SUSA', '-73,81368337', '5,453279433', '1', '1');
INSERT INTO `tbl_city` VALUES ('25781', '25', 'SUTATAUSA', '-73,85300839', '5,247368962', '1', '1');
INSERT INTO `tbl_city` VALUES ('25785', '25', 'TABIO', '-74,09847546', '4,916417347', '1', '1');
INSERT INTO `tbl_city` VALUES ('25793', '25', 'TAUSA', '-73,88759181', '5,195683508', '1', '1');
INSERT INTO `tbl_city` VALUES ('25797', '25', 'TENA', '-74,38963124', '4,655267295', '1', '1');
INSERT INTO `tbl_city` VALUES ('25799', '25', 'TENJO', '-74,14345182', '4,871715773', '1', '1');
INSERT INTO `tbl_city` VALUES ('25805', '25', 'TIBACUY', '-74,45254632', '4,348010437', '1', '1');
INSERT INTO `tbl_city` VALUES ('25807', '25', 'TIBIRITA', '-73,5046538', '5,052445922', '1', '1');
INSERT INTO `tbl_city` VALUES ('25815', '25', 'TOCAIMA', '-74,63590251', '4,460922519', '1', '1');
INSERT INTO `tbl_city` VALUES ('25817', '25', 'TOCANCIPÁ', '-73,91174581', '4,965142748', '1', '1');
INSERT INTO `tbl_city` VALUES ('25823', '25', 'TOPAIPÍ', '-74,30187572', '5,335817874', '1', '1');
INSERT INTO `tbl_city` VALUES ('25839', '25', 'UBALÁ', '-73,53230677', '4,748177194', '1', '1');
INSERT INTO `tbl_city` VALUES ('25841', '25', 'UBAQUE', '-73,93417373', '4,483788969', '1', '1');
INSERT INTO `tbl_city` VALUES ('25843', '25', 'VILLA DE SAN DIEGO DE UBATÉ', '-73,8196124', '5,305164279', '1', '1');
INSERT INTO `tbl_city` VALUES ('25845', '25', 'UNE', '-74,02520707', '4,402603758', '1', '1');
INSERT INTO `tbl_city` VALUES ('25851', '25', 'ÚTICA', '-74,48352954', '5,190896954', '1', '1');
INSERT INTO `tbl_city` VALUES ('25862', '25', 'VERGARA', '-74,34546781', '5,118120631', '1', '1');
INSERT INTO `tbl_city` VALUES ('25867', '25', 'VIANÍ', '-74,56148735', '4,87524411', '1', '1');
INSERT INTO `tbl_city` VALUES ('25871', '25', 'VILLAGÓMEZ', '-74,19516465', '5,273183039', '1', '1');
INSERT INTO `tbl_city` VALUES ('25873', '25', 'VILLAPINZÓN', '-73,5968136', '5,21481263', '1', '1');
INSERT INTO `tbl_city` VALUES ('25875', '25', 'VILLETA', '-74,47289332', '5,00942833', '1', '1');
INSERT INTO `tbl_city` VALUES ('25878', '25', 'VIOTÁ', '-74,52295638', '4,440501768', '1', '1');
INSERT INTO `tbl_city` VALUES ('25885', '25', 'YACOPÍ', '-74,33842664', '5,459539929', '1', '1');
INSERT INTO `tbl_city` VALUES ('25898', '25', 'ZIPACÓN', '-74,37940373', '4,760094981', '1', '1');
INSERT INTO `tbl_city` VALUES ('25899', '25', 'ZIPAQUIRÁ', '-73,99240307', '5,023482942', '1', '1');
INSERT INTO `tbl_city` VALUES ('27001', '27', 'QUIBDÓ', '-76,65112463', '5,692349465', '1', '1');
INSERT INTO `tbl_city` VALUES ('27006', '27', 'ACANDÍ', '-77,27861806', '8,510949896', '1', '1');
INSERT INTO `tbl_city` VALUES ('27025', '27', 'ALTO BAUDÓ', '-76,97571473', '5,515480039', '1', '1');
INSERT INTO `tbl_city` VALUES ('27050', '27', 'ATRATO', '-76,63618197', '5,53113252', '1', '1');
INSERT INTO `tbl_city` VALUES ('27073', '27', 'BAGADÓ', '-76,41596027', '5,411715421', '1', '1');
INSERT INTO `tbl_city` VALUES ('27075', '27', 'BAHÍA SOLANO', '-77,4037731', '6,224470385', '1', '1');
INSERT INTO `tbl_city` VALUES ('27077', '27', 'BAJO BAUDÓ', '-77,36431791', '4,95394903', '1', '1');
INSERT INTO `tbl_city` VALUES ('27099', '27', 'BOJAYÁ', '-76,89250222', '6,56638862', '1', '1');
INSERT INTO `tbl_city` VALUES ('27135', '27', 'EL CANTÓN DEL SAN PABLO', '-76,72722006', '5,335386671', '1', '1');
INSERT INTO `tbl_city` VALUES ('27150', '27', 'CARMEN DEL DARIÉN', '-76,97033962', '7,157659155', '1', '1');
INSERT INTO `tbl_city` VALUES ('27160', '27', 'CÉRTEGUI', '-76,61139204', '5,372250469', '1', '1');
INSERT INTO `tbl_city` VALUES ('27205', '27', 'CONDOTO', '-76,64651743', '5,093507939', '1', '1');
INSERT INTO `tbl_city` VALUES ('27245', '27', 'EL CARMEN DE ATRATO', '-76,14196657', '5,900665673', '1', '1');
INSERT INTO `tbl_city` VALUES ('27250', '27', 'EL LITORAL DEL SAN JUAN', '-77,36385534', '4,255195889', '1', '1');
INSERT INTO `tbl_city` VALUES ('27361', '27', 'ISTMINA', '-76,68600154', '5,153351003', '1', '1');
INSERT INTO `tbl_city` VALUES ('27372', '27', 'JURADÓ', '-77,7646171', '7,106039595', '1', '1');
INSERT INTO `tbl_city` VALUES ('27413', '27', 'LLORÓ', '-76,54252474', '5,499961862', '1', '1');
INSERT INTO `tbl_city` VALUES ('27425', '27', 'MEDIO ATRATO', '-76,78116246', '5,994374892', '1', '1');
INSERT INTO `tbl_city` VALUES ('27430', '27', 'MEDIO BAUDÓ', '-77,05237614', '5,050931657', '1', '1');
INSERT INTO `tbl_city` VALUES ('27450', '27', 'MEDIO SAN JUAN', '-76,69553012', '5,096608969', '1', '1');
INSERT INTO `tbl_city` VALUES ('27491', '27', 'NÓVITA', '-76,60706945', '4,956094527', '1', '1');
INSERT INTO `tbl_city` VALUES ('27495', '27', 'NUQUÍ', '-77,27022384', '5,705739121', '1', '1');
INSERT INTO `tbl_city` VALUES ('27580', '27', 'RÍO IRÓ', '-76,47233806', '5,185466721', '1', '1');
INSERT INTO `tbl_city` VALUES ('27600', '27', 'RÍO QUITO', '-76,73924427', '5,483440681', '1', '1');
INSERT INTO `tbl_city` VALUES ('27615', '27', 'RIOSUCIO', '-77,11110984', '7,433382753', '1', '1');
INSERT INTO `tbl_city` VALUES ('27660', '27', 'SAN JOSÉ DEL PALMAR', '-76,23566964', '4,894671238', '1', '1');
INSERT INTO `tbl_city` VALUES ('27745', '27', 'SIPÍ', '-76,64338455', '4,654114917', '1', '1');
INSERT INTO `tbl_city` VALUES ('27787', '27', 'TADÓ', '-76,55477631', '5,265425994', '1', '1');
INSERT INTO `tbl_city` VALUES ('27800', '27', 'UNGUÍA', '-77,09322948', '8,043632715', '1', '1');
INSERT INTO `tbl_city` VALUES ('27810', '27', 'UNIÓN PANAMERICANA', '-76,63105305', '5,280672113', '1', '1');
INSERT INTO `tbl_city` VALUES ('41001', '41', 'NEIVA', '-75,27794587', '2,935545593', '1', '1');
INSERT INTO `tbl_city` VALUES ('41006', '41', 'ACEVEDO', '-75,8919936', '1,804327426', '1', '1');
INSERT INTO `tbl_city` VALUES ('41013', '41', 'AGRADO', '-75,77104991', '2,260018441', '1', '1');
INSERT INTO `tbl_city` VALUES ('41016', '41', 'AIPE', '-75,2411436', '3,223563239', '1', '1');
INSERT INTO `tbl_city` VALUES ('41020', '41', 'ALGECIRAS', '-75,31569465', '2,522555905', '1', '1');
INSERT INTO `tbl_city` VALUES ('41026', '41', 'ALTAMIRA', '-75,78865559', '2,063408905', '1', '1');
INSERT INTO `tbl_city` VALUES ('41078', '41', 'BARAYA', '-75,05429067', '3,153273692', '1', '1');
INSERT INTO `tbl_city` VALUES ('41132', '41', 'CAMPOALEGRE', '-75,32603525', '2,684180352', '1', '1');
INSERT INTO `tbl_city` VALUES ('41206', '41', 'COLOMBIA', '-74,80289516', '3,376524821', '1', '1');
INSERT INTO `tbl_city` VALUES ('41244', '41', 'ELÍAS', '-75,93810642', '2,013396203', '1', '1');
INSERT INTO `tbl_city` VALUES ('41298', '41', 'GARZÓN', '-75,62673823', '2,195652802', '1', '1');
INSERT INTO `tbl_city` VALUES ('41306', '41', 'GIGANTE', '-75,54572948', '2,387831336', '1', '1');
INSERT INTO `tbl_city` VALUES ('41319', '41', 'GUADALUPE', '-75,75903864', '2,022973485', '1', '1');
INSERT INTO `tbl_city` VALUES ('41349', '41', 'HOBO', '-75,45262844', '2,583467854', '1', '1');
INSERT INTO `tbl_city` VALUES ('41357', '41', 'ÍQUIRA', '-75,63504192', '2,650001345', '1', '1');
INSERT INTO `tbl_city` VALUES ('41359', '41', 'ISNOS', '-76,21454183', '1,930355779', '1', '1');
INSERT INTO `tbl_city` VALUES ('41378', '41', 'LA ARGENTINA', '-75,97916545', '2,198979489', '1', '1');
INSERT INTO `tbl_city` VALUES ('41396', '41', 'LA PLATA', '-75,89111222', '2,389327718', '1', '1');
INSERT INTO `tbl_city` VALUES ('41483', '41', 'NÁTAGA', '-75,80931599', '2,546185387', '1', '1');
INSERT INTO `tbl_city` VALUES ('41503', '41', 'OPORAPA', '-75,99755359', '2,024158937', '1', '1');
INSERT INTO `tbl_city` VALUES ('41518', '41', 'PAICOL', '-75,77509768', '2,449614362', '1', '1');
INSERT INTO `tbl_city` VALUES ('41524', '41', 'PALERMO', '-75,43278509', '2,886658824', '1', '1');
INSERT INTO `tbl_city` VALUES ('41530', '41', 'PALESTINA', '-76,1328691', '1,723199124', '1', '1');
INSERT INTO `tbl_city` VALUES ('41548', '41', 'PITAL', '-75,80489734', '2,267254906', '1', '1');
INSERT INTO `tbl_city` VALUES ('41551', '41', 'PITALITO', '-76,04040041', '1,854145051', '1', '1');
INSERT INTO `tbl_city` VALUES ('41615', '41', 'RIVERA', '-75,25485877', '2,777896833', '1', '1');
INSERT INTO `tbl_city` VALUES ('41660', '41', 'SALADOBLANCO', '-76,04621413', '1,992595388', '1', '1');
INSERT INTO `tbl_city` VALUES ('41668', '41', 'SAN AGUSTÍN', '-76,27081355', '1,881472149', '1', '1');
INSERT INTO `tbl_city` VALUES ('41676', '41', 'SANTA MARÍA', '-75,58679897', '2,938712204', '1', '1');
INSERT INTO `tbl_city` VALUES ('41770', '41', 'SUAZA', '-75,79465715', '1,976934415', '1', '1');
INSERT INTO `tbl_city` VALUES ('41791', '41', 'TARQUI', '-75,8267662', '2,109541619', '1', '1');
INSERT INTO `tbl_city` VALUES ('41797', '41', 'TESALIA', '-75,72744344', '2,485911202', '1', '1');
INSERT INTO `tbl_city` VALUES ('41799', '41', 'TELLO', '-75,1392351', '3,06742823', '1', '1');
INSERT INTO `tbl_city` VALUES ('41801', '41', 'TERUEL', '-75,56772868', '2,741255461', '1', '1');
INSERT INTO `tbl_city` VALUES ('41807', '41', 'TIMANÁ', '-75,93234858', '1,974300102', '1', '1');
INSERT INTO `tbl_city` VALUES ('41872', '41', 'VILLAVIEJA', '-75,21814439', '3,219240547', '1', '1');
INSERT INTO `tbl_city` VALUES ('41885', '41', 'YAGUARÁ', '-75,51829617', '2,664796688', '1', '1');
INSERT INTO `tbl_city` VALUES ('44001', '44', 'RIOHACHA', '-72,91227125', '11,52912543', '1', '1');
INSERT INTO `tbl_city` VALUES ('44035', '44', 'ALBANIA', '-72,58875564', '11,16271115', '1', '1');
INSERT INTO `tbl_city` VALUES ('44078', '44', 'BARRANCAS', '-72,79618707', '10,95310426', '1', '1');
INSERT INTO `tbl_city` VALUES ('44090', '44', 'DIBULLA', '-73,30723669', '11,27125412', '1', '1');
INSERT INTO `tbl_city` VALUES ('44098', '44', 'DISTRACCIÓN', '-72,88579942', '10,89577472', '1', '1');
INSERT INTO `tbl_city` VALUES ('44110', '44', 'EL MOLINO', '-72,92165828', '10,65106316', '1', '1');
INSERT INTO `tbl_city` VALUES ('44279', '44', 'FONSECA', '-72,85047149', '10,8866438', '1', '1');
INSERT INTO `tbl_city` VALUES ('44378', '44', 'HATONUEVO', '-72,7625018', '11,06728208', '1', '1');
INSERT INTO `tbl_city` VALUES ('44420', '44', 'LA JAGUA DEL PILAR', '-73,07159495', '10,51075068', '1', '1');
INSERT INTO `tbl_city` VALUES ('44430', '44', 'MAICAO', '-72,24303615', '11,3774', '1', '1');
INSERT INTO `tbl_city` VALUES ('44560', '44', 'MANAURE', '-72,4411883', '11,76999449', '1', '1');
INSERT INTO `tbl_city` VALUES ('44650', '44', 'SAN JUAN DEL CESAR', '-73,00170139', '10,77073498', '1', '1');
INSERT INTO `tbl_city` VALUES ('44847', '44', 'URIBIA', '-72,26574628', '11,71520214', '1', '1');
INSERT INTO `tbl_city` VALUES ('44855', '44', 'URUMITA', '-73,01337169', '10,55998334', '1', '1');
INSERT INTO `tbl_city` VALUES ('44874', '44', 'VILLANUEVA', '-72,97759391', '10,61018498', '1', '1');
INSERT INTO `tbl_city` VALUES ('47001', '47', 'SANTA MARTA', '-74,18839705', '11,22570314', '1', '1');
INSERT INTO `tbl_city` VALUES ('47030', '47', 'ALGARROBO', '-74,06066849', '10,18449656', '1', '1');
INSERT INTO `tbl_city` VALUES ('47053', '47', 'ARACATACA', '-74,18585902', '10,59067243', '1', '1');
INSERT INTO `tbl_city` VALUES ('47058', '47', 'ARIGUANÍ', '-74,23621556', '9,847372401', '1', '1');
INSERT INTO `tbl_city` VALUES ('47161', '47', 'CERRO DE SAN ANTONIO', '-74,86879837', '10,32626159', '1', '1');
INSERT INTO `tbl_city` VALUES ('47170', '47', 'CHIVOLO', '-74,62528899', '10,02913808', '1', '1');
INSERT INTO `tbl_city` VALUES ('47189', '47', 'CIÉNAGA', '-74,24136807', '11,00743281', '1', '1');
INSERT INTO `tbl_city` VALUES ('47205', '47', 'CONCORDIA', '-74,83344931', '10,25765845', '1', '1');
INSERT INTO `tbl_city` VALUES ('47245', '47', 'EL BANCO', '-73,97939172', '8,998318274', '1', '1');
INSERT INTO `tbl_city` VALUES ('47258', '47', 'EL PIÑÓN', '-74,8251114', '10,4010789', '1', '1');
INSERT INTO `tbl_city` VALUES ('47268', '47', 'EL RETÉN', '-74,26866587', '10,61143428', '1', '1');
INSERT INTO `tbl_city` VALUES ('47288', '47', 'FUNDACIÓN', '-74,19118192', '10,51385004', '1', '1');
INSERT INTO `tbl_city` VALUES ('47318', '47', 'GUAMAL', '-74,22506165', '9,144907728', '1', '1');
INSERT INTO `tbl_city` VALUES ('47460', '47', 'NUEVA GRANADA', '-74,39231942', '9,805570049', '1', '1');
INSERT INTO `tbl_city` VALUES ('47541', '47', 'PEDRAZA', '-74,91653534', '10,18696559', '1', '1');
INSERT INTO `tbl_city` VALUES ('47545', '47', 'PIJIÑO DEL CARMEN', '-74,45436143', '9,330683756', '1', '1');
INSERT INTO `tbl_city` VALUES ('47551', '47', 'PIVIJAY', '-74,6153957', '10,46134401', '1', '1');
INSERT INTO `tbl_city` VALUES ('47555', '47', 'PLATO', '-74,78364483', '9,793402606', '1', '1');
INSERT INTO `tbl_city` VALUES ('47570', '47', 'PUEBLOVIEJO', '-74,281975', '10,99484958', '1', '1');
INSERT INTO `tbl_city` VALUES ('47605', '47', 'REMOLINO', '-74,71654494', '10,70184738', '1', '1');
INSERT INTO `tbl_city` VALUES ('47660', '47', 'SABANAS DE SAN ÁNGEL', '-74,21396122', '10,03251902', '1', '1');
INSERT INTO `tbl_city` VALUES ('47675', '47', 'SALAMINA', '-74,7931441', '10,4900398', '1', '1');
INSERT INTO `tbl_city` VALUES ('47692', '47', 'SAN SEBASTIÁN DE BUENAVISTA', '-74,34747461', '9,240984248', '1', '1');
INSERT INTO `tbl_city` VALUES ('47703', '47', 'SAN ZENÓN', '-74,49973383', '9,244007074', '1', '1');
INSERT INTO `tbl_city` VALUES ('47707', '47', 'SANTA ANA', '-74,56741811', '9,322861781', '1', '1');
INSERT INTO `tbl_city` VALUES ('47720', '47', 'SANTA BÁRBARA DE PINTO', '-74,70891306', '9,425254938', '1', '1');
INSERT INTO `tbl_city` VALUES ('47745', '47', 'SITIONUEVO', '-74,72310508', '10,78073791', '1', '1');
INSERT INTO `tbl_city` VALUES ('47798', '47', 'TENERIFE', '-74,85760389', '9,898272893', '1', '1');
INSERT INTO `tbl_city` VALUES ('47960', '47', 'ZAPAYÁN', '-74,71712026', '10,16935704', '1', '1');
INSERT INTO `tbl_city` VALUES ('47980', '47', 'ZONA BANANERA', '-74,14276383', '10,76273948', '1', '1');
INSERT INTO `tbl_city` VALUES ('50001', '50', 'VILLAVICENCIO', '-73,6268779', '4,12295758', '1', '1');
INSERT INTO `tbl_city` VALUES ('50006', '50', 'ACACÍAS', '-73,76560234', '3,991014028', '1', '1');
INSERT INTO `tbl_city` VALUES ('50110', '50', 'BARRANCA DE UPÍA', '-72,9665821', '4,569068667', '1', '1');
INSERT INTO `tbl_city` VALUES ('50124', '50', 'CABUYARO', '-72,78949645', '4,288261592', '1', '1');
INSERT INTO `tbl_city` VALUES ('50150', '50', 'CASTILLA LA NUEVA', '-73,68902156', '3,827982617', '1', '1');
INSERT INTO `tbl_city` VALUES ('50223', '50', 'CUBARRAL', '-73,83501096', '3,794904891', '1', '1');
INSERT INTO `tbl_city` VALUES ('50226', '50', 'CUMARAL', '-73,48748644', '4,267061854', '1', '1');
INSERT INTO `tbl_city` VALUES ('50245', '50', 'EL CALVARIO', '-73,71345503', '4,352170158', '1', '1');
INSERT INTO `tbl_city` VALUES ('50251', '50', 'EL CASTILLO', '-73,79416288', '3,564719028', '1', '1');
INSERT INTO `tbl_city` VALUES ('50270', '50', 'EL DORADO', '-73,83523623', '3,738810743', '1', '1');
INSERT INTO `tbl_city` VALUES ('50287', '50', 'FUENTE DE ORO', '-73,61998898', '3,461515389', '1', '1');
INSERT INTO `tbl_city` VALUES ('50313', '50', 'GRANADA', '-73,69847756', '3,534935191', '1', '1');
INSERT INTO `tbl_city` VALUES ('50318', '50', 'GUAMAL', '-73,77012038', '3,879743604', '1', '1');
INSERT INTO `tbl_city` VALUES ('50325', '50', 'MAPIRIPÁN', '-72,13324949', '2,89200026', '1', '1');
INSERT INTO `tbl_city` VALUES ('50330', '50', 'MESETAS', '-74,04436642', '3,382245855', '1', '1');
INSERT INTO `tbl_city` VALUES ('50350', '50', 'LA MACARENA', '-73,78646619', '2,18362947', '1', '1');
INSERT INTO `tbl_city` VALUES ('50370', '50', 'URIBE', '-74,35067139', '3,238327068', '1', '1');
INSERT INTO `tbl_city` VALUES ('50400', '50', 'LEJANÍAS', '-74,02440235', '3,525691136', '1', '1');
INSERT INTO `tbl_city` VALUES ('50450', '50', 'PUERTO CONCORDIA', '-72,75710046', '2,623791542', '1', '1');
INSERT INTO `tbl_city` VALUES ('50568', '50', 'PUERTO GAITÁN', '-72,08295486', '4,31202706', '1', '1');
INSERT INTO `tbl_city` VALUES ('50573', '50', 'PUERTO LÓPEZ', '-72,95592832', '4,093473679', '1', '1');
INSERT INTO `tbl_city` VALUES ('50577', '50', 'PUERTO LLERAS', '-73,37317866', '3,26940842', '1', '1');
INSERT INTO `tbl_city` VALUES ('50590', '50', 'PUERTO RICO', '-73,20748601', '2,941649276', '1', '1');
INSERT INTO `tbl_city` VALUES ('50606', '50', 'RESTREPO', '-73,564085', '4,260980999', '1', '1');
INSERT INTO `tbl_city` VALUES ('50680', '50', 'SAN CARLOS DE GUAROA', '-73,24158942', '3,710534484', '1', '1');
INSERT INTO `tbl_city` VALUES ('50683', '50', 'SAN JUAN DE ARAMA', '-73,87080094', '3,369107427', '1', '1');
INSERT INTO `tbl_city` VALUES ('50686', '50', 'SAN JUANITO', '-73,67619364', '4,457956076', '1', '1');
INSERT INTO `tbl_city` VALUES ('50689', '50', 'SAN MARTÍN', '-73,69597218', '3,701610526', '1', '1');
INSERT INTO `tbl_city` VALUES ('50711', '50', 'VISTAHERMOSA', '-73,75252332', '3,127598951', '1', '1');
INSERT INTO `tbl_city` VALUES ('52001', '52', 'PASTO', '-77,27826745', '1,212808597', '1', '1');
INSERT INTO `tbl_city` VALUES ('52019', '52', 'ALBÁN', '-77,08125969', '1,473940616', '1', '1');
INSERT INTO `tbl_city` VALUES ('52022', '52', 'ALDANA', '-77,70037482', '0,882243596', '1', '1');
INSERT INTO `tbl_city` VALUES ('52036', '52', 'ANCUYÁ', '-77,51461157', '1,262450623', '1', '1');
INSERT INTO `tbl_city` VALUES ('52051', '52', 'ARBOLEDA', '-77,13544969', '1,50342206', '1', '1');
INSERT INTO `tbl_city` VALUES ('52079', '52', 'BARBACOAS', '-78,1382612', '1,673571647', '1', '1');
INSERT INTO `tbl_city` VALUES ('52083', '52', 'BELÉN', '-77,01628783', '1,595644304', '1', '1');
INSERT INTO `tbl_city` VALUES ('52110', '52', 'BUESACO', '-77,16067409', '1,372095882', '1', '1');
INSERT INTO `tbl_city` VALUES ('52203', '52', 'COLÓN', '-77,02133468', '1,6451203', '1', '1');
INSERT INTO `tbl_city` VALUES ('52207', '52', 'CONSACÁ', '-77,46571841', '1,207194331', '1', '1');
INSERT INTO `tbl_city` VALUES ('52210', '52', 'CONTADERO', '-77,54783263', '0,90838632', '1', '1');
INSERT INTO `tbl_city` VALUES ('52215', '52', 'CÓRDOBA', '-77,51806895', '0,853665966', '1', '1');
INSERT INTO `tbl_city` VALUES ('52224', '52', 'CUASPÚD', '-77,72622517', '0,863204502', '1', '1');
INSERT INTO `tbl_city` VALUES ('52227', '52', 'CUMBAL', '-77,79124207', '0,906450846', '1', '1');
INSERT INTO `tbl_city` VALUES ('52233', '52', 'CUMBITARA', '-77,5784311', '1,64767179', '1', '1');
INSERT INTO `tbl_city` VALUES ('52240', '52', 'CHACHAGÜÍ', '-77,28100878', '1,35733302', '1', '1');
INSERT INTO `tbl_city` VALUES ('52250', '52', 'EL CHARCO', '-78,10832813', '2,475877278', '1', '1');
INSERT INTO `tbl_city` VALUES ('52254', '52', 'EL PEÑOL', '-77,43983629', '1,453634069', '1', '1');
INSERT INTO `tbl_city` VALUES ('52256', '52', 'EL ROSARIO', '-77,33462865', '1,744903225', '1', '1');
INSERT INTO `tbl_city` VALUES ('52258', '52', 'EL TABLÓN DE GÓMEZ', '-77,09734632', '1,427293213', '1', '1');
INSERT INTO `tbl_city` VALUES ('52260', '52', 'EL TAMBO', '-77,39075115', '1,407983829', '1', '1');
INSERT INTO `tbl_city` VALUES ('52287', '52', 'FUNES', '-77,44937399', '1,001120785', '1', '1');
INSERT INTO `tbl_city` VALUES ('52317', '52', 'GUACHUCAL', '-77,73165563', '0,960368496', '1', '1');
INSERT INTO `tbl_city` VALUES ('52320', '52', 'GUAITARILLA', '-77,54791206', '1,130869', '1', '1');
INSERT INTO `tbl_city` VALUES ('52323', '52', 'GUALMATÁN', '-77,5664755', '0,91935844', '1', '1');
INSERT INTO `tbl_city` VALUES ('52352', '52', 'ILES', '-77,52139514', '0,968495857', '1', '1');
INSERT INTO `tbl_city` VALUES ('52354', '52', 'IMUÉS', '-77,49656757', '1,055198291', '1', '1');
INSERT INTO `tbl_city` VALUES ('52356', '52', 'IPIALES', '-77,64609566', '0,829031719', '1', '1');
INSERT INTO `tbl_city` VALUES ('52378', '52', 'LA CRUZ', '-76,97118237', '1,600144168', '1', '1');
INSERT INTO `tbl_city` VALUES ('52381', '52', 'LA FLORIDA', '-77,40739376', '1,299167227', '1', '1');
INSERT INTO `tbl_city` VALUES ('52385', '52', 'LA LLANADA', '-77,58000042', '1,472922187', '1', '1');
INSERT INTO `tbl_city` VALUES ('52390', '52', 'LA TOLA', '-78,18979829', '2,397921551', '1', '1');
INSERT INTO `tbl_city` VALUES ('52399', '52', 'LA UNIÓN', '-77,12838567', '1,592477177', '1', '1');
INSERT INTO `tbl_city` VALUES ('52405', '52', 'LEIVA', '-77,3066651', '1,934496738', '1', '1');
INSERT INTO `tbl_city` VALUES ('52411', '52', 'LINARES', '-77,52362692', '1,35127831', '1', '1');
INSERT INTO `tbl_city` VALUES ('52418', '52', 'LOS ANDES', '-77,52108754', '1,49420522', '1', '1');
INSERT INTO `tbl_city` VALUES ('52427', '52', 'MAGÜÍ', '-78,18430368', '1,766123527', '1', '1');
INSERT INTO `tbl_city` VALUES ('52435', '52', 'MALLAMA', '-77,86465833', '1,140841618', '1', '1');
INSERT INTO `tbl_city` VALUES ('52473', '52', 'MOSQUERA', '-78,45254624', '2,508359914', '1', '1');
INSERT INTO `tbl_city` VALUES ('52480', '52', 'NARIÑO', '-77,3596647', '1,289645598', '1', '1');
INSERT INTO `tbl_city` VALUES ('52490', '52', 'OLAYA HERRERA', '-78,32877504', '2,347547107', '1', '1');
INSERT INTO `tbl_city` VALUES ('52506', '52', 'OSPINA', '-77,56618095', '1,05883406', '1', '1');
INSERT INTO `tbl_city` VALUES ('52520', '52', 'FRANCISCO PIZARRO', '-78,65828278', '2,039266841', '1', '1');
INSERT INTO `tbl_city` VALUES ('52540', '52', 'POLICARPA', '-77,45877138', '1,628698235', '1', '1');
INSERT INTO `tbl_city` VALUES ('52560', '52', 'POTOSÍ', '-77,57424777', '0,805316202', '1', '1');
INSERT INTO `tbl_city` VALUES ('52565', '52', 'PROVIDENCIA', '-77,59654443', '1,237991354', '1', '1');
INSERT INTO `tbl_city` VALUES ('52573', '52', 'PUERRES', '-77,50300513', '0,883414836', '1', '1');
INSERT INTO `tbl_city` VALUES ('52585', '52', 'PUPIALES', '-77,63960362', '0,870991053', '1', '1');
INSERT INTO `tbl_city` VALUES ('52612', '52', 'RICAURTE', '-77,99399223', '1,211227703', '1', '1');
INSERT INTO `tbl_city` VALUES ('52621', '52', 'ROBERTO PAYÁN', '-78,24467611', '1,696986918', '1', '1');
INSERT INTO `tbl_city` VALUES ('52678', '52', 'SAMANIEGO', '-77,60073212', '1,33227291', '1', '1');
INSERT INTO `tbl_city` VALUES ('52683', '52', 'SANDONÁ', '-77,47731382', '1,281287581', '1', '1');
INSERT INTO `tbl_city` VALUES ('52685', '52', 'SAN BERNARDO', '-77,04708963', '1,514431045', '1', '1');
INSERT INTO `tbl_city` VALUES ('52687', '52', 'SAN LORENZO', '-77,21523153', '1,502827265', '1', '1');
INSERT INTO `tbl_city` VALUES ('52693', '52', 'SAN PABLO', '-77,01272834', '1,669158039', '1', '1');
INSERT INTO `tbl_city` VALUES ('52694', '52', 'SAN PEDRO DE CARTAGO', '-77,12074197', '1,552084935', '1', '1');
INSERT INTO `tbl_city` VALUES ('52696', '52', 'SANTA BÁRBARA', '-77,98139371', '2,451124015', '1', '1');
INSERT INTO `tbl_city` VALUES ('52699', '52', 'SANTACRUZ', '-77,67729446', '1,221645292', '1', '1');
INSERT INTO `tbl_city` VALUES ('52720', '52', 'SAPUYES', '-77,62223921', '1,037175227', '1', '1');
INSERT INTO `tbl_city` VALUES ('52786', '52', 'TAMINANGO', '-77,28072792', '1,570127638', '1', '1');
INSERT INTO `tbl_city` VALUES ('52788', '52', 'TANGUA', '-77,39429906', '1,094793642', '1', '1');
INSERT INTO `tbl_city` VALUES ('52835', '52', 'SAN ANDRÉS DE TUMACO', '-78,78940097', '1,750299723', '1', '1');
INSERT INTO `tbl_city` VALUES ('52838', '52', 'TÚQUERRES', '-77,61785363', '1,086639011', '1', '1');
INSERT INTO `tbl_city` VALUES ('52885', '52', 'YACUANQUER', '-77,40299135', '1,115626961', '1', '1');
INSERT INTO `tbl_city` VALUES ('54001', '54', 'CÚCUTA', '-72,50559097', '7,905267117', '1', '1');
INSERT INTO `tbl_city` VALUES ('54003', '54', 'ÁBREGO', '-73,22141743', '8,081204184', '1', '1');
INSERT INTO `tbl_city` VALUES ('54051', '54', 'ARBOLEDAS', '-72,798834', '7,642690665', '1', '1');
INSERT INTO `tbl_city` VALUES ('54099', '54', 'BOCHALEMA', '-72,64728173', '7,61206781', '1', '1');
INSERT INTO `tbl_city` VALUES ('54109', '54', 'BUCARASICA', '-72,86692368', '8,039441945', '1', '1');
INSERT INTO `tbl_city` VALUES ('54125', '54', 'CÁCOTA', '-72,64247288', '7,2686516', '1', '1');
INSERT INTO `tbl_city` VALUES ('54128', '54', 'CÁCHIRA', '-73,04964921', '7,739743357', '1', '1');
INSERT INTO `tbl_city` VALUES ('54172', '54', 'CHINÁCOTA', '-72,60245029', '7,602562969', '1', '1');
INSERT INTO `tbl_city` VALUES ('54174', '54', 'CHITAGÁ', '-72,66480971', '7,138537607', '1', '1');
INSERT INTO `tbl_city` VALUES ('54206', '54', 'CONVENCIÓN', '-73,33719493', '8,469995018', '1', '1');
INSERT INTO `tbl_city` VALUES ('54223', '54', 'CUCUTILLA', '-72,77244677', '7,539173876', '1', '1');
INSERT INTO `tbl_city` VALUES ('54239', '54', 'DURANIA', '-72,65619808', '7,714218998', '1', '1');
INSERT INTO `tbl_city` VALUES ('54245', '54', 'EL CARMEN', '-73,4467754', '8,510758824', '1', '1');
INSERT INTO `tbl_city` VALUES ('54250', '54', 'EL TARRA', '-73,09439392', '8,575961113', '1', '1');
INSERT INTO `tbl_city` VALUES ('54261', '54', 'EL ZULIA', '-72,60393412', '7,937073102', '1', '1');
INSERT INTO `tbl_city` VALUES ('54313', '54', 'GRAMALOTE', '-72,79730483', '7,887563488', '1', '1');
INSERT INTO `tbl_city` VALUES ('54344', '54', 'HACARÍ', '-73,14590841', '8,321629406', '1', '1');
INSERT INTO `tbl_city` VALUES ('54347', '54', 'HERRÁN', '-72,48317121', '7,506185377', '1', '1');
INSERT INTO `tbl_city` VALUES ('54377', '54', 'LABATECA', '-72,49492683', '7,299391207', '1', '1');
INSERT INTO `tbl_city` VALUES ('54385', '54', 'LA ESPERANZA', '-73,32743359', '7,639492659', '1', '1');
INSERT INTO `tbl_city` VALUES ('54398', '54', 'LA PLAYA', '-73,23813909', '8,213593826', '1', '1');
INSERT INTO `tbl_city` VALUES ('54405', '54', 'LOS PATIOS', '-72,50603675', '7,833492673', '1', '1');
INSERT INTO `tbl_city` VALUES ('54418', '54', 'LOURDES', '-72,83204691', '7,945235869', '1', '1');
INSERT INTO `tbl_city` VALUES ('54480', '54', 'MUTISCUA', '-72,74708015', '7,300240082', '1', '1');
INSERT INTO `tbl_city` VALUES ('54498', '54', 'OCAÑA', '-73,35519572', '8,246666365', '1', '1');
INSERT INTO `tbl_city` VALUES ('54518', '54', 'PAMPLONA', '-72,64821106', '7,375194148', '1', '1');
INSERT INTO `tbl_city` VALUES ('54520', '54', 'PAMPLONITA', '-72,63843801', '7,435853979', '1', '1');
INSERT INTO `tbl_city` VALUES ('54553', '54', 'PUERTO SANTANDER', '-72,409351', '8,361170349', '1', '1');
INSERT INTO `tbl_city` VALUES ('54599', '54', 'RAGONVALIA', '-72,47601923', '7,577462278', '1', '1');
INSERT INTO `tbl_city` VALUES ('54660', '54', 'SALAZAR', '-72,80876862', '7,772718285', '1', '1');
INSERT INTO `tbl_city` VALUES ('54670', '54', 'SAN CALIXTO', '-73,20669102', '8,398315284', '1', '1');
INSERT INTO `tbl_city` VALUES ('54673', '54', 'SAN CAYETANO', '-72,62504029', '7,877279388', '1', '1');
INSERT INTO `tbl_city` VALUES ('54680', '54', 'SANTIAGO', '-72,71706915', '7,864447857', '1', '1');
INSERT INTO `tbl_city` VALUES ('54720', '54', 'SARDINATA', '-72,79826081', '8,080586036', '1', '1');
INSERT INTO `tbl_city` VALUES ('54743', '54', 'SILOS', '-72,75723918', '7,204071527', '1', '1');
INSERT INTO `tbl_city` VALUES ('54800', '54', 'TEORAMA', '-73,28698543', '8,437233734', '1', '1');
INSERT INTO `tbl_city` VALUES ('54810', '54', 'TIBÚ', '-72,73591937', '8,639717701', '1', '1');
INSERT INTO `tbl_city` VALUES ('54820', '54', 'TOLEDO', '-72,47910681', '7,299350867', '1', '1');
INSERT INTO `tbl_city` VALUES ('54871', '54', 'VILLA CARO', '-72,97292384', '7,914369504', '1', '1');
INSERT INTO `tbl_city` VALUES ('54874', '54', 'VILLA DEL ROSARIO', '-72,47051925', '7,849046596', '1', '1');
INSERT INTO `tbl_city` VALUES ('63001', '63', 'ARMENIA', '-75,67624541', '4,538053316', '1', '1');
INSERT INTO `tbl_city` VALUES ('63111', '63', 'BUENAVISTA', '-75,73836605', '4,357525201', '1', '1');
INSERT INTO `tbl_city` VALUES ('63130', '63', 'CALARCÁ', '-75,64909422', '4,516199286', '1', '1');
INSERT INTO `tbl_city` VALUES ('63190', '63', 'CIRCASIA', '-75,63561411', '4,615126794', '1', '1');
INSERT INTO `tbl_city` VALUES ('63212', '63', 'CÓRDOBA', '-75,6876462', '4,393272787', '1', '1');
INSERT INTO `tbl_city` VALUES ('63272', '63', 'FILANDIA', '-75,65618322', '4,676007191', '1', '1');
INSERT INTO `tbl_city` VALUES ('63302', '63', 'GÉNOVA', '-75,7895561', '4,207745662', '1', '1');
INSERT INTO `tbl_city` VALUES ('63401', '63', 'LA TEBAIDA', '-75,78851395', '4,452881084', '1', '1');
INSERT INTO `tbl_city` VALUES ('63470', '63', 'MONTENEGRO', '-75,75080862', '4,562970357', '1', '1');
INSERT INTO `tbl_city` VALUES ('63548', '63', 'PIJAO', '-75,7025141', '4,335313251', '1', '1');
INSERT INTO `tbl_city` VALUES ('63594', '63', 'QUIMBAYA', '-75,76296669', '4,623302507', '1', '1');
INSERT INTO `tbl_city` VALUES ('63690', '63', 'SALENTO', '-75,57079583', '4,637279793', '1', '1');
INSERT INTO `tbl_city` VALUES ('66001', '66', 'PEREIRA', '-75,71550992', '4,808887732', '1', '1');
INSERT INTO `tbl_city` VALUES ('66045', '66', 'APÍA', '-75,94105997', '5,106118819', '1', '1');
INSERT INTO `tbl_city` VALUES ('66075', '66', 'BALBOA', '-75,9566556', '4,949313424', '1', '1');
INSERT INTO `tbl_city` VALUES ('66088', '66', 'BELÉN DE UMBRÍA', '-75,86849579', '5,200819102', '1', '1');
INSERT INTO `tbl_city` VALUES ('66170', '66', 'DOSQUEBRADAS', '-75,67518282', '4,834634033', '1', '1');
INSERT INTO `tbl_city` VALUES ('66318', '66', 'GUÁTICA', '-75,79644836', '5,314914848', '1', '1');
INSERT INTO `tbl_city` VALUES ('66383', '66', 'LA CELIA', '-76,00319329', '5,003370112', '1', '1');
INSERT INTO `tbl_city` VALUES ('66400', '66', 'LA VIRGINIA', '-75,87965843', '4,898343795', '1', '1');
INSERT INTO `tbl_city` VALUES ('66440', '66', 'MARSELLA', '-75,73852715', '4,936665317', '1', '1');
INSERT INTO `tbl_city` VALUES ('66456', '66', 'MISTRATÓ', '-75,87941933', '5,294665706', '1', '1');
INSERT INTO `tbl_city` VALUES ('66572', '66', 'PUEBLO RICO', '-76,03079891', '5,222091189', '1', '1');
INSERT INTO `tbl_city` VALUES ('66594', '66', 'QUINCHÍA', '-75,73093679', '5,341146742', '1', '1');
INSERT INTO `tbl_city` VALUES ('66682', '66', 'SANTA ROSA DE CABAL', '-75,62407439', '4,876508599', '1', '1');
INSERT INTO `tbl_city` VALUES ('66687', '66', 'SANTUARIO', '-75,9646785', '5,073676959', '1', '1');
INSERT INTO `tbl_city` VALUES ('68001', '68', 'BUCARAMANGA', '-73,13232523', '7,122787285', '1', '1');
INSERT INTO `tbl_city` VALUES ('68013', '68', 'AGUADA', '-73,5214455', '6,162125609', '1', '1');
INSERT INTO `tbl_city` VALUES ('68020', '68', 'ALBANIA', '-73,91418036', '5,758714473', '1', '1');
INSERT INTO `tbl_city` VALUES ('68051', '68', 'ARATOCA', '-73,02016352', '6,693279193', '1', '1');
INSERT INTO `tbl_city` VALUES ('68077', '68', 'BARBOSA', '-73,61756027', '5,930317831', '1', '1');
INSERT INTO `tbl_city` VALUES ('68079', '68', 'BARICHARA', '-73,22268198', '6,635349263', '1', '1');
INSERT INTO `tbl_city` VALUES ('68081', '68', 'BARRANCABERMEJA', '-73,8524944', '7,061548423', '1', '1');
INSERT INTO `tbl_city` VALUES ('68092', '68', 'BETULIA', '-73,28366584', '6,900068895', '1', '1');
INSERT INTO `tbl_city` VALUES ('68101', '68', 'BOLÍVAR', '-73,7709122', '5,986869792', '1', '1');
INSERT INTO `tbl_city` VALUES ('68121', '68', 'CABRERA', '-73,2465433', '6,591726371', '1', '1');
INSERT INTO `tbl_city` VALUES ('68132', '68', 'CALIFORNIA', '-72,9444849', '7,347878329', '1', '1');
INSERT INTO `tbl_city` VALUES ('68147', '68', 'CAPITANEJO', '-72,69563516', '6,53056932', '1', '1');
INSERT INTO `tbl_city` VALUES ('68152', '68', 'CARCASÍ', '-72,62641153', '6,626734297', '1', '1');
INSERT INTO `tbl_city` VALUES ('68160', '68', 'CEPITÁ', '-72,97451685', '6,753402288', '1', '1');
INSERT INTO `tbl_city` VALUES ('68162', '68', 'CERRITO', '-72,69472769', '6,843117616', '1', '1');
INSERT INTO `tbl_city` VALUES ('68167', '68', 'CHARALÁ', '-73,14666944', '6,285335122', '1', '1');
INSERT INTO `tbl_city` VALUES ('68169', '68', 'CHARTA', '-72,96844791', '7,28125241', '1', '1');
INSERT INTO `tbl_city` VALUES ('68176', '68', 'CHIMA', '-73,3728971', '6,341915036', '1', '1');
INSERT INTO `tbl_city` VALUES ('68179', '68', 'CHIPATÁ', '-73,63728406', '6,062589832', '1', '1');
INSERT INTO `tbl_city` VALUES ('68190', '68', 'CIMITARRA', '-73,95489394', '6,313690894', '1', '1');
INSERT INTO `tbl_city` VALUES ('68207', '68', 'CONCEPCIÓN', '-72,69429571', '6,768940022', '1', '1');
INSERT INTO `tbl_city` VALUES ('68209', '68', 'CONFINES', '-73,24102369', '6,35735535', '1', '1');
INSERT INTO `tbl_city` VALUES ('68211', '68', 'CONTRATACIÓN', '-73,47438999', '6,290461144', '1', '1');
INSERT INTO `tbl_city` VALUES ('68217', '68', 'COROMORO', '-73,04054395', '6,295555981', '1', '1');
INSERT INTO `tbl_city` VALUES ('68229', '68', 'CURITÍ', '-73,0689588', '6,604597994', '1', '1');
INSERT INTO `tbl_city` VALUES ('68235', '68', 'EL CARMEN DE CHUCURÍ', '-73,51312371', '6,697911605', '1', '1');
INSERT INTO `tbl_city` VALUES ('68245', '68', 'EL GUACAMAYO', '-73,49643934', '6,24606725', '1', '1');
INSERT INTO `tbl_city` VALUES ('68250', '68', 'EL PEÑÓN', '-73,8129614', '6,056705341', '1', '1');
INSERT INTO `tbl_city` VALUES ('68255', '68', 'EL PLAYÓN', '-73,20462035', '7,472718358', '1', '1');
INSERT INTO `tbl_city` VALUES ('68264', '68', 'ENCINO', '-73,09929847', '6,138215355', '1', '1');
INSERT INTO `tbl_city` VALUES ('68266', '68', 'ENCISO', '-72,70013858', '6,669723477', '1', '1');
INSERT INTO `tbl_city` VALUES ('68271', '68', 'FLORIÁN', '-73,9709636', '5,804949254', '1', '1');
INSERT INTO `tbl_city` VALUES ('68276', '68', 'FLORIDABLANCA', '-73,09912164', '7,07732172', '1', '1');
INSERT INTO `tbl_city` VALUES ('68296', '68', 'GALÁN', '-73,28791459', '6,638898653', '1', '1');
INSERT INTO `tbl_city` VALUES ('68298', '68', 'GÁMBITA', '-73,34262729', '5,945830413', '1', '1');
INSERT INTO `tbl_city` VALUES ('68307', '68', 'GIRÓN', '-73,16831269', '7,071774012', '1', '1');
INSERT INTO `tbl_city` VALUES ('68318', '68', 'GUACA', '-72,85608443', '6,876872281', '1', '1');
INSERT INTO `tbl_city` VALUES ('68320', '68', 'GUADALUPE', '-73,41889143', '6,245824677', '1', '1');
INSERT INTO `tbl_city` VALUES ('68322', '68', 'GUAPOTÁ', '-73,32090671', '6,308387491', '1', '1');
INSERT INTO `tbl_city` VALUES ('68324', '68', 'GUAVATÁ', '-73,69991514', '5,955076587', '1', '1');
INSERT INTO `tbl_city` VALUES ('68327', '68', 'GÜEPSA', '-73,5713145', '6,026386429', '1', '1');
INSERT INTO `tbl_city` VALUES ('68344', '68', 'HATO', '-73,30811306', '6,542940636', '1', '1');
INSERT INTO `tbl_city` VALUES ('68368', '68', 'JESÚS MARÍA', '-73,78278259', '5,87653149', '1', '1');
INSERT INTO `tbl_city` VALUES ('68370', '68', 'JORDÁN', '-73,0967325', '6,732458589', '1', '1');
INSERT INTO `tbl_city` VALUES ('68377', '68', 'LA BELLEZA', '-73,96495194', '5,859280669', '1', '1');
INSERT INTO `tbl_city` VALUES ('68385', '68', 'LANDÁZURI', '-73,8090988', '6,219387', '1', '1');
INSERT INTO `tbl_city` VALUES ('68397', '68', 'LA PAZ', '-73,58956795', '6,178568147', '1', '1');
INSERT INTO `tbl_city` VALUES ('68406', '68', 'LEBRIJA', '-73,2196734', '7,113322194', '1', '1');
INSERT INTO `tbl_city` VALUES ('68418', '68', 'LOS SANTOS', '-73,1019992', '6,75588429', '1', '1');
INSERT INTO `tbl_city` VALUES ('68425', '68', 'MACARAVITA', '-72,59328888', '6,506767985', '1', '1');
INSERT INTO `tbl_city` VALUES ('68432', '68', 'MÁLAGA', '-72,73213331', '6,702177521', '1', '1');
INSERT INTO `tbl_city` VALUES ('68444', '68', 'MATANZA', '-73,01608193', '7,322843721', '1', '1');
INSERT INTO `tbl_city` VALUES ('68464', '68', 'MOGOTES', '-72,97046229', '6,475387269', '1', '1');
INSERT INTO `tbl_city` VALUES ('68468', '68', 'MOLAGAVITA', '-72,80903168', '6,67384551', '1', '1');
INSERT INTO `tbl_city` VALUES ('68498', '68', 'OCAMONTE', '-73,12204644', '6,340335721', '1', '1');
INSERT INTO `tbl_city` VALUES ('68500', '68', 'OIBA', '-73,300034', '6,267047852', '1', '1');
INSERT INTO `tbl_city` VALUES ('68502', '68', 'ONZAGA', '-72,81393105', '6,344611898', '1', '1');
INSERT INTO `tbl_city` VALUES ('68522', '68', 'PALMAR', '-73,29111848', '6,537935398', '1', '1');
INSERT INTO `tbl_city` VALUES ('68524', '68', 'PALMAS DEL SOCORRO', '-73,28795271', '6,405928387', '1', '1');
INSERT INTO `tbl_city` VALUES ('68533', '68', 'PÁRAMO', '-73,17029158', '6,416534979', '1', '1');
INSERT INTO `tbl_city` VALUES ('68547', '68', 'PIEDECUESTA', '-73,05430826', '6,995474842', '1', '1');
INSERT INTO `tbl_city` VALUES ('68549', '68', 'PINCHOTE', '-73,17245612', '6,533035947', '1', '1');
INSERT INTO `tbl_city` VALUES ('68572', '68', 'PUENTE NACIONAL', '-73,67750975', '5,878191492', '1', '1');
INSERT INTO `tbl_city` VALUES ('68573', '68', 'PUERTO PARRA', '-74,05886843', '6,650967883', '1', '1');
INSERT INTO `tbl_city` VALUES ('68575', '68', 'PUERTO WILCHES', '-73,89812861', '7,349374002', '1', '1');
INSERT INTO `tbl_city` VALUES ('68615', '68', 'RIONEGRO', '-73,14904429', '7,263213644', '1', '1');
INSERT INTO `tbl_city` VALUES ('68655', '68', 'SABANA DE TORRES', '-73,49834578', '7,395171577', '1', '1');
INSERT INTO `tbl_city` VALUES ('68669', '68', 'SAN ANDRÉS', '-72,85058516', '6,810272062', '1', '1');
INSERT INTO `tbl_city` VALUES ('68673', '68', 'SAN BENITO', '-73,50947416', '6,126606981', '1', '1');
INSERT INTO `tbl_city` VALUES ('68679', '68', 'SAN GIL', '-73,12857022', '6,549272625', '1', '1');
INSERT INTO `tbl_city` VALUES ('68682', '68', 'SAN JOAQUÍN', '-72,86770325', '6,427549037', '1', '1');
INSERT INTO `tbl_city` VALUES ('68684', '68', 'SAN JOSÉ DE MIRANDA', '-72,73338212', '6,65866422', '1', '1');
INSERT INTO `tbl_city` VALUES ('68686', '68', 'SAN MIGUEL', '-72,64650112', '6,57664345', '1', '1');
INSERT INTO `tbl_city` VALUES ('68689', '68', 'SAN VICENTE DE CHUCURÍ', '-73,41001828', '6,87981334', '1', '1');
INSERT INTO `tbl_city` VALUES ('68705', '68', 'SANTA BÁRBARA', '-72,90668294', '6,990541297', '1', '1');
INSERT INTO `tbl_city` VALUES ('68720', '68', 'SANTA HELENA DEL OPÓN', '-73,61590665', '6,338392494', '1', '1');
INSERT INTO `tbl_city` VALUES ('68745', '68', 'SIMACOTA', '-73,33740933', '6,443472237', '1', '1');
INSERT INTO `tbl_city` VALUES ('68755', '68', 'SOCORRO', '-73,26113096', '6,463690975', '1', '1');
INSERT INTO `tbl_city` VALUES ('68770', '68', 'SUAITA', '-73,44031622', '6,098353143', '1', '1');
INSERT INTO `tbl_city` VALUES ('68773', '68', 'SUCRE', '-73,79149045', '5,919032578', '1', '1');
INSERT INTO `tbl_city` VALUES ('68780', '68', 'SURATÁ', '-72,9842772', '7,367171555', '1', '1');
INSERT INTO `tbl_city` VALUES ('68820', '68', 'TONA', '-72,96825727', '7,199525791', '1', '1');
INSERT INTO `tbl_city` VALUES ('68855', '68', 'VALLE DE SAN JOSÉ', '-73,14357671', '6,448009474', '1', '1');
INSERT INTO `tbl_city` VALUES ('68861', '68', 'VÉLEZ', '-73,67452042', '6,00758056', '1', '1');
INSERT INTO `tbl_city` VALUES ('68867', '68', 'VETAS', '-72,87074132', '7,309381361', '1', '1');
INSERT INTO `tbl_city` VALUES ('68872', '68', 'VILLANUEVA', '-73,17350227', '6,669292155', '1', '1');
INSERT INTO `tbl_city` VALUES ('68895', '68', 'ZAPATOCA', '-73,27085551', '6,813844067', '1', '1');
INSERT INTO `tbl_city` VALUES ('70001', '70', 'SINCELEJO', '-75,38521942', '9,300157626', '1', '1');
INSERT INTO `tbl_city` VALUES ('70110', '70', 'BUENAVISTA', '-74,9728891', '9,320036559', '1', '1');
INSERT INTO `tbl_city` VALUES ('70124', '70', 'CAIMITO', '-75,11608908', '8,789025103', '1', '1');
INSERT INTO `tbl_city` VALUES ('70204', '70', 'COLOSÓ', '-75,35571644', '9,490946618', '1', '1');
INSERT INTO `tbl_city` VALUES ('70215', '70', 'COROZAL', '-75,29202341', '9,320684145', '1', '1');
INSERT INTO `tbl_city` VALUES ('70221', '70', 'COVEÑAS', '-75,65959814', '9,40979035', '1', '1');
INSERT INTO `tbl_city` VALUES ('70230', '70', 'CHALÁN', '-75,31279629', '9,545852801', '1', '1');
INSERT INTO `tbl_city` VALUES ('70233', '70', 'EL ROBLE', '-75,19404578', '9,107152405', '1', '1');
INSERT INTO `tbl_city` VALUES ('70235', '70', 'GALERAS', '-75,04933649', '9,15980328', '1', '1');
INSERT INTO `tbl_city` VALUES ('70265', '70', 'GUARANDA', '-74,53641529', '8,469047875', '1', '1');
INSERT INTO `tbl_city` VALUES ('70400', '70', 'LA UNIÓN', '-75,28621326', '8,851127401', '1', '1');
INSERT INTO `tbl_city` VALUES ('70418', '70', 'LOS PALMITOS', '-75,26813259', '9,38017706', '1', '1');
INSERT INTO `tbl_city` VALUES ('70429', '70', 'MAJAGUAL', '-74,62789337', '8,542989632', '1', '1');
INSERT INTO `tbl_city` VALUES ('70473', '70', 'MORROA', '-75,31039861', '9,328924943', '1', '1');
INSERT INTO `tbl_city` VALUES ('70508', '70', 'OVEJAS', '-75,22880769', '9,525985964', '1', '1');
INSERT INTO `tbl_city` VALUES ('70523', '70', 'PALMITO', '-75,5411704', '9,333144057', '1', '1');
INSERT INTO `tbl_city` VALUES ('70670', '70', 'SAMPUÉS', '-75,37917964', '9,182439329', '1', '1');
INSERT INTO `tbl_city` VALUES ('70678', '70', 'SAN BENITO ABAD', '-75,03136903', '8,929924408', '1', '1');
INSERT INTO `tbl_city` VALUES ('70702', '70', 'SAN JUAN DE BETULIA', '-75,24299691', '9,274572434', '1', '1');
INSERT INTO `tbl_city` VALUES ('70708', '70', 'SAN MARCOS', '-75,13902232', '8,664035847', '1', '1');
INSERT INTO `tbl_city` VALUES ('70713', '70', 'SAN ONOFRE', '-75,53032731', '9,733391876', '1', '1');
INSERT INTO `tbl_city` VALUES ('70717', '70', 'SAN PEDRO', '-75,06375581', '9,396083795', '1', '1');
INSERT INTO `tbl_city` VALUES ('70742', '70', 'SAN LUIS DE SINCÉ', '-75,14667204', '9,244482443', '1', '1');
INSERT INTO `tbl_city` VALUES ('70771', '70', 'SUCRE', '-74,72206664', '8,813572581', '1', '1');
INSERT INTO `tbl_city` VALUES ('70820', '70', 'SANTIAGO DE TOLÚ', '-75,58811834', '9,508814959', '1', '1');
INSERT INTO `tbl_city` VALUES ('70823', '70', 'TOLÚ VIEJO', '-75,43955579', '9,453187995', '1', '1');
INSERT INTO `tbl_city` VALUES ('73001', '73', 'IBAGUÉ', '-75,19635015', '4,439630726', '1', '1');
INSERT INTO `tbl_city` VALUES ('73024', '73', 'ALPUJARRA', '-74,93256629', '3,391799957', '1', '1');
INSERT INTO `tbl_city` VALUES ('73026', '73', 'ALVARADO', '-74,95215175', '4,568164621', '1', '1');
INSERT INTO `tbl_city` VALUES ('73030', '73', 'AMBALEMA', '-74,76179861', '4,785386129', '1', '1');
INSERT INTO `tbl_city` VALUES ('73043', '73', 'ANZOÁTEGUI', '-75,09328383', '4,632846697', '1', '1');
INSERT INTO `tbl_city` VALUES ('73055', '73', 'ARMERO GUAYABAL', '-74,88416934', '5,029000458', '1', '1');
INSERT INTO `tbl_city` VALUES ('73067', '73', 'ATACO', '-75,38245402', '3,591164867', '1', '1');
INSERT INTO `tbl_city` VALUES ('73124', '73', 'CAJAMARCA', '-75,43379586', '4,437770273', '1', '1');
INSERT INTO `tbl_city` VALUES ('73148', '73', 'CARMEN DE APICALÁ', '-74,72333124', '4,146643092', '1', '1');
INSERT INTO `tbl_city` VALUES ('73152', '73', 'CASABIANCA', '-75,11979107', '5,079147913', '1', '1');
INSERT INTO `tbl_city` VALUES ('73168', '73', 'CHAPARRAL', '-75,48358221', '3,72576111', '1', '1');
INSERT INTO `tbl_city` VALUES ('73200', '73', 'COELLO', '-74,89789553', '4,286128911', '1', '1');
INSERT INTO `tbl_city` VALUES ('73217', '73', 'COYAIMA', '-75,19620778', '3,798723691', '1', '1');
INSERT INTO `tbl_city` VALUES ('73226', '73', 'CUNDAY', '-74,69327178', '4,059746879', '1', '1');
INSERT INTO `tbl_city` VALUES ('73236', '73', 'DOLORES', '-74,89743371', '3,53844375', '1', '1');
INSERT INTO `tbl_city` VALUES ('73268', '73', 'ESPINAL', '-74,88422578', '4,150711732', '1', '1');
INSERT INTO `tbl_city` VALUES ('73270', '73', 'FALAN', '-74,95550048', '5,119324132', '1', '1');
INSERT INTO `tbl_city` VALUES ('73275', '73', 'FLANDES', '-74,81055536', '4,28279453', '1', '1');
INSERT INTO `tbl_city` VALUES ('73283', '73', 'FRESNO', '-75,03619498', '5,153587688', '1', '1');
INSERT INTO `tbl_city` VALUES ('73319', '73', 'GUAMO', '-74,97149505', '4,029955464', '1', '1');
INSERT INTO `tbl_city` VALUES ('73347', '73', 'HERVEO', '-75,17822503', '5,079945225', '1', '1');
INSERT INTO `tbl_city` VALUES ('73349', '73', 'HONDA', '-74,74176149', '5,200982043', '1', '1');
INSERT INTO `tbl_city` VALUES ('73352', '73', 'ICONONZO', '-74,52799842', '4,174130143', '1', '1');
INSERT INTO `tbl_city` VALUES ('73408', '73', 'LÉRIDA', '-74,91160229', '4,861051741', '1', '1');
INSERT INTO `tbl_city` VALUES ('73411', '73', 'LÍBANO', '-75,05322017', '4,916113603', '1', '1');
INSERT INTO `tbl_city` VALUES ('73443', '73', 'SAN SEBASTIÁN DE MARIQUITA', '-74,88933547', '5,20016963', '1', '1');
INSERT INTO `tbl_city` VALUES ('73449', '73', 'MELGAR', '-74,62696619', '4,205428002', '1', '1');
INSERT INTO `tbl_city` VALUES ('73461', '73', 'MURILLO', '-75,17031866', '4,875409693', '1', '1');
INSERT INTO `tbl_city` VALUES ('73483', '73', 'NATAGAIMA', '-75,09059602', '3,620513866', '1', '1');
INSERT INTO `tbl_city` VALUES ('73504', '73', 'ORTEGA', '-75,22079414', '3,935055941', '1', '1');
INSERT INTO `tbl_city` VALUES ('73520', '73', 'PALOCABILDO', '-75,02334323', '5,120480135', '1', '1');
INSERT INTO `tbl_city` VALUES ('73547', '73', 'PIEDRAS', '-74,87650966', '4,544505767', '1', '1');
INSERT INTO `tbl_city` VALUES ('73555', '73', 'PLANADAS', '-75,64378388', '3,197021377', '1', '1');
INSERT INTO `tbl_city` VALUES ('73563', '73', 'PRADO', '-74,92727578', '3,74982801', '1', '1');
INSERT INTO `tbl_city` VALUES ('73585', '73', 'PURIFICACIÓN', '-74,92662666', '3,860338143', '1', '1');
INSERT INTO `tbl_city` VALUES ('73616', '73', 'RIOBLANCO', '-75,64468414', '3,530213777', '1', '1');
INSERT INTO `tbl_city` VALUES ('73622', '73', 'RONCESVALLES', '-75,60613905', '4,011227519', '1', '1');
INSERT INTO `tbl_city` VALUES ('73624', '73', 'ROVIRA', '-75,24068313', '4,239483306', '1', '1');
INSERT INTO `tbl_city` VALUES ('73671', '73', 'SALDAÑA', '-75,01663674', '3,926797132', '1', '1');
INSERT INTO `tbl_city` VALUES ('73675', '73', 'SAN ANTONIO', '-75,4771786', '3,915855429', '1', '1');
INSERT INTO `tbl_city` VALUES ('73678', '73', 'SAN LUIS', '-75,09587039', '4,133881149', '1', '1');
INSERT INTO `tbl_city` VALUES ('73686', '73', 'SANTA ISABEL', '-75,09467151', '4,71380798', '1', '1');
INSERT INTO `tbl_city` VALUES ('73770', '73', 'SUÁREZ', '-74,83181686', '4,047599753', '1', '1');
INSERT INTO `tbl_city` VALUES ('73854', '73', 'VALLE DE SAN JUAN', '-75,11558955', '4,197485032', '1', '1');
INSERT INTO `tbl_city` VALUES ('73861', '73', 'VENADILLO', '-74,92938381', '4,716778068', '1', '1');
INSERT INTO `tbl_city` VALUES ('73870', '73', 'VILLAHERMOSA', '-75,11778988', '5,030295445', '1', '1');
INSERT INTO `tbl_city` VALUES ('73873', '73', 'VILLARRICA', '-74,60059869', '3,936921555', '1', '1');
INSERT INTO `tbl_city` VALUES ('76001', '76', 'CALI', '-76,5263912', '3,406382184', '1', '1');
INSERT INTO `tbl_city` VALUES ('76020', '76', 'ALCALÁ', '-75,77566146', '4,673941899', '1', '1');
INSERT INTO `tbl_city` VALUES ('76036', '76', 'ANDALUCÍA', '-76,16466637', '4,176715615', '1', '1');
INSERT INTO `tbl_city` VALUES ('76041', '76', 'ANSERMANUEVO', '-75,99160519', '4,793223145', '1', '1');
INSERT INTO `tbl_city` VALUES ('76054', '76', 'ARGELIA', '-76,12196071', '4,726851171', '1', '1');
INSERT INTO `tbl_city` VALUES ('76100', '76', 'BOLÍVAR', '-76,18496326', '4,338137376', '1', '1');
INSERT INTO `tbl_city` VALUES ('76109', '76', 'BUENAVENTURA', '-77,02056522', '3,873663548', '1', '1');
INSERT INTO `tbl_city` VALUES ('76111', '76', 'GUADALAJARA DE BUGA', '-76,29893404', '3,901401027', '1', '1');
INSERT INTO `tbl_city` VALUES ('76113', '76', 'BUGALAGRANDE', '-76,15771521', '4,208153039', '1', '1');
INSERT INTO `tbl_city` VALUES ('76122', '76', 'CAICEDONIA', '-75,83653439', '4,340622278', '1', '1');
INSERT INTO `tbl_city` VALUES ('76126', '76', 'CALIMA', '-76,48422337', '3,935223948', '1', '1');
INSERT INTO `tbl_city` VALUES ('76130', '76', 'CANDELARIA', '-76,34773585', '3,409349462', '1', '1');
INSERT INTO `tbl_city` VALUES ('76147', '76', 'CARTAGO', '-75,91151329', '4,738521916', '1', '1');
INSERT INTO `tbl_city` VALUES ('76233', '76', 'DAGUA', '-76,68917476', '3,657393501', '1', '1');
INSERT INTO `tbl_city` VALUES ('76243', '76', 'EL ÁGUILA', '-76,04133781', '4,909880471', '1', '1');
INSERT INTO `tbl_city` VALUES ('76246', '76', 'EL CAIRO', '-76,22341725', '4,758493883', '1', '1');
INSERT INTO `tbl_city` VALUES ('76248', '76', 'EL CERRITO', '-76,31173408', '3,684750275', '1', '1');
INSERT INTO `tbl_city` VALUES ('76250', '76', 'EL DOVIO', '-76,23726603', '4,50991499', '1', '1');
INSERT INTO `tbl_city` VALUES ('76275', '76', 'FLORIDA', '-76,23473215', '3,324404503', '1', '1');
INSERT INTO `tbl_city` VALUES ('76306', '76', 'GINEBRA', '-76,26886954', '3,724900015', '1', '1');
INSERT INTO `tbl_city` VALUES ('76318', '76', 'GUACARÍ', '-76,33350631', '3,761995494', '1', '1');
INSERT INTO `tbl_city` VALUES ('76364', '76', 'JAMUNDÍ', '-76,53880955', '3,264186341', '1', '1');
INSERT INTO `tbl_city` VALUES ('76377', '76', 'LA CUMBRE', '-76,56816646', '3,647189293', '1', '1');
INSERT INTO `tbl_city` VALUES ('76400', '76', 'LA UNIÓN', '-76,10317217', '4,532958241', '1', '1');
INSERT INTO `tbl_city` VALUES ('76403', '76', 'LA VICTORIA', '-76,03621421', '4,524440841', '1', '1');
INSERT INTO `tbl_city` VALUES ('76497', '76', 'OBANDO', '-75,97473076', '4,574930856', '1', '1');
INSERT INTO `tbl_city` VALUES ('76520', '76', 'PALMIRA', '-76,29821561', '3,532937331', '1', '1');
INSERT INTO `tbl_city` VALUES ('76563', '76', 'PRADERA', '-76,24104111', '3,419437767', '1', '1');
INSERT INTO `tbl_city` VALUES ('76606', '76', 'RESTREPO', '-76,52507914', '3,822899886', '1', '1');
INSERT INTO `tbl_city` VALUES ('76616', '76', 'RIOFRÍO', '-76,29062712', '4,157458103', '1', '1');
INSERT INTO `tbl_city` VALUES ('76622', '76', 'ROLDANILLO', '-76,15103159', '4,413548394', '1', '1');
INSERT INTO `tbl_city` VALUES ('76670', '76', 'SAN PEDRO', '-76,22943384', '3,994157244', '1', '1');
INSERT INTO `tbl_city` VALUES ('76736', '76', 'SEVILLA', '-75,93115733', '4,267191347', '1', '1');
INSERT INTO `tbl_city` VALUES ('76823', '76', 'TORO', '-76,07840778', '4,608488954', '1', '1');
INSERT INTO `tbl_city` VALUES ('76828', '76', 'TRUJILLO', '-76,32162446', '4,209334533', '1', '1');
INSERT INTO `tbl_city` VALUES ('76834', '76', 'TULUÁ', '-76,1971756', '4,085358465', '1', '1');
INSERT INTO `tbl_city` VALUES ('76845', '76', 'ULLOA', '-75,73875523', '4,702861426', '1', '1');
INSERT INTO `tbl_city` VALUES ('76863', '76', 'VERSALLES', '-76,1995094', '4,575820616', '1', '1');
INSERT INTO `tbl_city` VALUES ('76869', '76', 'VIJES', '-76,43848651', '3,697104426', '1', '1');
INSERT INTO `tbl_city` VALUES ('76890', '76', 'YOTOCO', '-76,38308668', '3,861066762', '1', '1');
INSERT INTO `tbl_city` VALUES ('76892', '76', 'YUMBO', '-76,49761167', '3,540533549', '1', '1');
INSERT INTO `tbl_city` VALUES ('76895', '76', 'ZARZAL', '-76,07174817', '4,390428465', '1', '1');
INSERT INTO `tbl_city` VALUES ('81001', '81', 'ARAUCA', '-70,76277305', '7,077736502', '1', '1');
INSERT INTO `tbl_city` VALUES ('81065', '81', 'ARAUQUITA', '-71,42763959', '7,029313653', '1', '1');
INSERT INTO `tbl_city` VALUES ('81220', '81', 'CRAVO NORTE', '-70,20356756', '6,303393699', '1', '1');
INSERT INTO `tbl_city` VALUES ('81300', '81', 'FORTUL', '-71,76786074', '6,799255903', '1', '1');
INSERT INTO `tbl_city` VALUES ('81591', '81', 'PUERTO RONDÓN', '-71,10306943', '6,279863386', '1', '1');
INSERT INTO `tbl_city` VALUES ('81736', '81', 'SARAVENA', '-71,87394948', '6,953877941', '1', '1');
INSERT INTO `tbl_city` VALUES ('81794', '81', 'TAME', '-71,74365326', '6,456538115', '1', '1');
INSERT INTO `tbl_city` VALUES ('85001', '85', 'YOPAL', '-72,39379053', '5,332491176', '1', '1');
INSERT INTO `tbl_city` VALUES ('85010', '85', 'AGUAZUL', '-72,55258534', '5,169985431', '1', '1');
INSERT INTO `tbl_city` VALUES ('85015', '85', 'CHÁMEZA', '-72,86988999', '5,214626718', '1', '1');
INSERT INTO `tbl_city` VALUES ('85125', '85', 'HATO COROZAL', '-71,76462754', '6,156391812', '1', '1');
INSERT INTO `tbl_city` VALUES ('85136', '85', 'LA SALINA', '-72,33396779', '6,12782036', '1', '1');
INSERT INTO `tbl_city` VALUES ('85139', '85', 'MANÍ', '-72,28016077', '4,816844808', '1', '1');
INSERT INTO `tbl_city` VALUES ('85162', '85', 'MONTERREY', '-72,88909564', '4,879411968', '1', '1');
INSERT INTO `tbl_city` VALUES ('85225', '85', 'NUNCHÍA', '-72,19538265', '5,637129374', '1', '1');
INSERT INTO `tbl_city` VALUES ('85230', '85', 'OROCUÉ', '-71,33810538', '4,790033918', '1', '1');
INSERT INTO `tbl_city` VALUES ('85250', '85', 'PAZ DE ARIPORO', '-71,89172868', '5,881402624', '1', '1');
INSERT INTO `tbl_city` VALUES ('85263', '85', 'PORE', '-71,99239281', '5,726766202', '1', '1');
INSERT INTO `tbl_city` VALUES ('85279', '85', 'RECETOR', '-72,76090722', '5,229148278', '1', '1');
INSERT INTO `tbl_city` VALUES ('85300', '85', 'SABANALARGA', '-73,03917574', '4,853360442', '1', '1');
INSERT INTO `tbl_city` VALUES ('85315', '85', 'SÁCAMA', '-72,24889357', '6,097899115', '1', '1');
INSERT INTO `tbl_city` VALUES ('85325', '85', 'SAN LUIS DE PALENQUE', '-71,73122989', '5,421839576', '1', '1');
INSERT INTO `tbl_city` VALUES ('85400', '85', 'TÁMARA', '-72,16422491', '5,829096649', '1', '1');
INSERT INTO `tbl_city` VALUES ('85410', '85', 'TAURAMENA', '-72,74773611', '5,013122789', '1', '1');
INSERT INTO `tbl_city` VALUES ('85430', '85', 'TRINIDAD', '-71,66267865', '5,411016224', '1', '1');
INSERT INTO `tbl_city` VALUES ('85440', '85', 'VILLANUEVA', '-72,92901928', '4,609820964', '1', '1');
INSERT INTO `tbl_city` VALUES ('86001', '86', 'MOCOA', '-76,6519175', '1,144284508', '1', '1');
INSERT INTO `tbl_city` VALUES ('86219', '86', 'COLÓN', '-76,96898003', '1,192000577', '1', '1');
INSERT INTO `tbl_city` VALUES ('86320', '86', 'ORITO', '-76,88020986', '0,676020477', '1', '1');
INSERT INTO `tbl_city` VALUES ('86568', '86', 'PUERTO ASÍS', '-76,49783667', '0,504218751', '1', '1');
INSERT INTO `tbl_city` VALUES ('86569', '86', 'PUERTO CAICEDO', '-76,60451782', '0,685064179', '1', '1');
INSERT INTO `tbl_city` VALUES ('86571', '86', 'PUERTO GUZMÁN', '-76,40803219', '0,963896881', '1', '1');
INSERT INTO `tbl_city` VALUES ('86573', '86', 'PUERTO LEGUÍZAMO', '-74,78366995', '-0,184973168', '1', '1');
INSERT INTO `tbl_city` VALUES ('86749', '86', 'SIBUNDOY', '-76,92128718', '1,203086215', '1', '1');
INSERT INTO `tbl_city` VALUES ('86755', '86', 'SAN FRANCISCO', '-76,87589203', '1,176740265', '1', '1');
INSERT INTO `tbl_city` VALUES ('86757', '86', 'SAN MIGUEL', '-76,84534328', '0,273017004', '1', '1');
INSERT INTO `tbl_city` VALUES ('86760', '86', 'SANTIAGO', '-77,00251141', '1,146570094', '1', '1');
INSERT INTO `tbl_city` VALUES ('86865', '86', 'VALLE DEL GUAMUEZ', '-76,90503951', '0,423905142', '1', '1');
INSERT INTO `tbl_city` VALUES ('86885', '86', 'VILLAGARZÓN', '-76,61680969', '1,029954206', '1', '1');
INSERT INTO `tbl_city` VALUES ('88001', '88', 'SAN ANDRÉS', '-81,69604148', '12,58298842', '1', '1');
INSERT INTO `tbl_city` VALUES ('88564', '88', 'PROVIDENCIA', '-81,37090914', '13,37012422', '1', '1');
INSERT INTO `tbl_city` VALUES ('91001', '91', 'LETICIA', '-69,94067983', '-4,21202317', '1', '1');
INSERT INTO `tbl_city` VALUES ('91263', '91', 'EL ENCANTO', '-72,72400586', '-2,008623063', '1', '1');
INSERT INTO `tbl_city` VALUES ('91405', '91', 'LA CHORRERA', '-72,75882534', '-1,242364146', '1', '1');
INSERT INTO `tbl_city` VALUES ('91407', '91', 'LA PEDRERA', '-70,0353954', '-1,432373443', '1', '1');
INSERT INTO `tbl_city` VALUES ('91430', '91', 'LA VICTORIA', '-71,13053217', '-0,112116112', '1', '1');
INSERT INTO `tbl_city` VALUES ('91460', '91', 'MIRITÍ - PARANÁ', '-71,18591266', '-0,685363541', '1', '1');
INSERT INTO `tbl_city` VALUES ('91530', '91', 'PUERTO ALEGRÍA', '-73,74968536', '-0,968857869', '1', '1');
INSERT INTO `tbl_city` VALUES ('91536', '91', 'PUERTO ARICA', '-71,14653188', '-1,90678993', '1', '1');
INSERT INTO `tbl_city` VALUES ('91540', '91', 'PUERTO NARIÑO', '-70,35648014', '-3,789916303', '1', '1');
INSERT INTO `tbl_city` VALUES ('91669', '91', 'PUERTO SANTANDER', '-71,93928689', '-1,098675896', '1', '1');
INSERT INTO `tbl_city` VALUES ('91798', '91', 'TARAPACÁ', '-70,001625', '-2,459410794', '1', '1');
INSERT INTO `tbl_city` VALUES ('94001', '94', 'INÍRIDA', '-67,91828368', '3,870325548', '1', '1');
INSERT INTO `tbl_city` VALUES ('94343', '94', 'BARRANCO MINAS', '-69,39698615', '3,311251378', '1', '1');
INSERT INTO `tbl_city` VALUES ('94663', '94', 'MAPIRIPANA', '-70,28575204', '2,810014643', '1', '1');
INSERT INTO `tbl_city` VALUES ('94883', '94', 'SAN FELIPE', '-67,34490456', '2,121938062', '1', '1');
INSERT INTO `tbl_city` VALUES ('94884', '94', 'PUERTO COLOMBIA', '-68,21207021', '2,505111221', '1', '1');
INSERT INTO `tbl_city` VALUES ('94885', '94', 'LA GUADALUPE', '-67,00676676', '1,369705812', '1', '1');
INSERT INTO `tbl_city` VALUES ('94886', '94', 'CACAHUAL', '-67,58285563', '3,38385209', '1', '1');
INSERT INTO `tbl_city` VALUES ('94887', '94', 'PANA PANA', '-69,11995569', '1,975358701', '1', '1');
INSERT INTO `tbl_city` VALUES ('94888', '94', 'MORICHAL', '-69,83286217', '2,429810527', '1', '1');
INSERT INTO `tbl_city` VALUES ('95001', '95', 'SAN JOSÉ DEL GUAVIARE', '-72,640096', '2,570478099', '1', '1');
INSERT INTO `tbl_city` VALUES ('95015', '95', 'CALAMAR', '-72,65495951', '1,958585838', '1', '1');
INSERT INTO `tbl_city` VALUES ('95025', '95', 'EL RETORNO', '-72,62797079', '2,330797197', '1', '1');
INSERT INTO `tbl_city` VALUES ('95200', '95', 'MIRAFLORES', '-71,95126031', '1,33679173', '1', '1');
INSERT INTO `tbl_city` VALUES ('97001', '97', 'MITÚ', '-70,23496026', '1,251170789', '1', '1');
INSERT INTO `tbl_city` VALUES ('97161', '97', 'CARURÚ', '-71,2936075', '1,011305191', '1', '1');
INSERT INTO `tbl_city` VALUES ('97511', '97', 'PACOA', '-70,9101349', '0,181499926', '1', '1');
INSERT INTO `tbl_city` VALUES ('97666', '97', 'TARAIRA', '-69,63405375', '-0,564700182', '1', '1');
INSERT INTO `tbl_city` VALUES ('97777', '97', 'PAPUNAUA', '-70,70970219', '1,683427853', '1', '1');
INSERT INTO `tbl_city` VALUES ('97889', '97', 'YAVARATÉ', '-69,61593362', '0,828022243', '1', '1');
INSERT INTO `tbl_city` VALUES ('99001', '99', 'PUERTO CARREÑO', '-67,4855961', '6,185606567', '1', '1');
INSERT INTO `tbl_city` VALUES ('99524', '99', 'LA PRIMAVERA', '-70,41308692', '5,490737339', '1', '1');
INSERT INTO `tbl_city` VALUES ('99624', '99', 'SANTA ROSALÍA', '-70,86371082', '5,131103594', '1', '1');
INSERT INTO `tbl_city` VALUES ('99773', '99', 'CUMARIBO', '-69,79854267', '4,444487622', '1', '1');

-- ----------------------------
-- Table structure for tbl_country
-- ----------------------------
DROP TABLE IF EXISTS `tbl_country`;
CREATE TABLE `tbl_country` (
  `countryId` int(11) NOT NULL,
  `countryName` varchar(255) DEFAULT NULL,
  `countryAbbreviation` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT '1',
  `Flag` int(11) DEFAULT '1',
  PRIMARY KEY (`countryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_country
-- ----------------------------
INSERT INTO `tbl_country` VALUES ('57', 'Colombia', 'CO', '1', '1');

-- ----------------------------
-- Table structure for tbl_department
-- ----------------------------
DROP TABLE IF EXISTS `tbl_department`;
CREATE TABLE `tbl_department` (
  `departmentId` int(11) NOT NULL,
  `countryId` int(11) DEFAULT NULL,
  `departmentName` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT '1',
  `Flag` int(11) DEFAULT '1',
  PRIMARY KEY (`departmentId`),
  KEY `fk_department_country` (`countryId`),
  CONSTRAINT `fk_department_country` FOREIGN KEY (`countryId`) REFERENCES `tbl_country` (`countryId`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_department
-- ----------------------------
INSERT INTO `tbl_department` VALUES ('5', '57', 'ANTIOQUIA', '1', '1');
INSERT INTO `tbl_department` VALUES ('8', '57', 'ATLÁNTICO', '1', '1');
INSERT INTO `tbl_department` VALUES ('11', '57', 'BOGOTÁ, D. C.', '1', '1');
INSERT INTO `tbl_department` VALUES ('13', '57', 'BOLÍVAR', '1', '1');
INSERT INTO `tbl_department` VALUES ('15', '57', 'BOYACÁ', '1', '1');
INSERT INTO `tbl_department` VALUES ('17', '57', 'CALDAS', '1', '1');
INSERT INTO `tbl_department` VALUES ('18', '57', 'CAQUETÁ', '1', '1');
INSERT INTO `tbl_department` VALUES ('19', '57', 'CAUCA', '1', '1');
INSERT INTO `tbl_department` VALUES ('20', '57', 'CESAR', '1', '1');
INSERT INTO `tbl_department` VALUES ('23', '57', 'CÓRDOBA', '1', '1');
INSERT INTO `tbl_department` VALUES ('25', '57', 'CUNDINAMARCA', '1', '1');
INSERT INTO `tbl_department` VALUES ('27', '57', 'CHOCÓ', '1', '1');
INSERT INTO `tbl_department` VALUES ('41', '57', 'HUILA', '1', '1');
INSERT INTO `tbl_department` VALUES ('44', '57', 'LA GUAJIRA', '1', '1');
INSERT INTO `tbl_department` VALUES ('47', '57', 'MAGDALENA', '1', '1');
INSERT INTO `tbl_department` VALUES ('50', '57', 'META', '1', '1');
INSERT INTO `tbl_department` VALUES ('52', '57', 'NARIÑO', '1', '1');
INSERT INTO `tbl_department` VALUES ('54', '57', 'NORTE DE SANTANDER', '1', '1');
INSERT INTO `tbl_department` VALUES ('63', '57', 'QUINDÍO', '1', '1');
INSERT INTO `tbl_department` VALUES ('66', '57', 'RISARALDA', '1', '1');
INSERT INTO `tbl_department` VALUES ('68', '57', 'SANTANDER', '1', '1');
INSERT INTO `tbl_department` VALUES ('70', '57', 'SUCRE', '1', '1');
INSERT INTO `tbl_department` VALUES ('73', '57', 'TOLIMA', '1', '1');
INSERT INTO `tbl_department` VALUES ('76', '57', 'VALLE DEL CAUCA', '1', '1');
INSERT INTO `tbl_department` VALUES ('81', '57', 'ARAUCA', '1', '1');
INSERT INTO `tbl_department` VALUES ('85', '57', 'CASANARE', '1', '1');
INSERT INTO `tbl_department` VALUES ('86', '57', 'PUTUMAYO', '1', '1');
INSERT INTO `tbl_department` VALUES ('88', '57', 'ARCHIPIÉLAGO DE SAN ANDRÉS, PROVIDENCIA Y ', '1', '1');
INSERT INTO `tbl_department` VALUES ('91', '57', 'AMAZONAS', '1', '1');
INSERT INTO `tbl_department` VALUES ('94', '57', 'GUAINÍA', '1', '1');
INSERT INTO `tbl_department` VALUES ('95', '57', 'GUAVIARE', '1', '1');
INSERT INTO `tbl_department` VALUES ('97', '57', 'VAUPÉS', '1', '1');
INSERT INTO `tbl_department` VALUES ('99', '57', 'VICHADA', '1', '1');

-- ----------------------------
-- Table structure for tbl_division
-- ----------------------------
DROP TABLE IF EXISTS `tbl_division`;
CREATE TABLE `tbl_division` (
  `divisionId` int(11) NOT NULL AUTO_INCREMENT,
  `divisionName` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT '1',
  `Flag` int(11) DEFAULT '1',
  PRIMARY KEY (`divisionId`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_division
-- ----------------------------
INSERT INTO `tbl_division` VALUES ('10', 'CENTRO', '1', '1');
INSERT INTO `tbl_division` VALUES ('20', 'OCCIDENTE', '1', '1');
INSERT INTO `tbl_division` VALUES ('30', 'NORTE', '1', '1');

-- ----------------------------
-- Table structure for tbl_location
-- ----------------------------
DROP TABLE IF EXISTS `tbl_location`;
CREATE TABLE `tbl_location` (
  `locationId` int(11) NOT NULL AUTO_INCREMENT,
  `departmentId` int(11) NOT NULL,
  `cityId` int(11) NOT NULL,
  `divisionId` int(11) NOT NULL,
  `subdivisionId` int(11) NOT NULL,
  `locationName` varchar(255) NOT NULL,
  `locationAddress` varchar(255) NOT NULL,
  `locationNeighborhood` varchar(255) DEFAULT NULL,
  `locationDescriptionNotes` varchar(255) DEFAULT NULL,
  `locationManager` varchar(255) DEFAULT NULL,
  `locationOperator` varchar(255) DEFAULT NULL,
  `locationType` int(11) DEFAULT NULL,
  `locationStatus` int(11) DEFAULT NULL,
  `locationLongitude` varchar(255) DEFAULT NULL,
  `locationLatitude` varchar(255) DEFAULT NULL,
  `createTime` datetime DEFAULT NULL,
  `createUserId` int(11) DEFAULT NULL,
  `updateTime` datetime DEFAULT NULL,
  `updateUserId` int(11) DEFAULT NULL,
  `Status` int(11) DEFAULT '1',
  `Flag` int(11) DEFAULT '1',
  PRIMARY KEY (`locationId`),
  KEY `fk_location_department` (`departmentId`),
  KEY `fk_location_city` (`cityId`),
  KEY `fk_location_division` (`divisionId`),
  KEY `fk_location_subdivision` (`subdivisionId`),
  KEY `fk_location_locationStatus` (`locationStatus`),
  KEY `fk_location_locationType` (`locationType`),
  CONSTRAINT `fk_location_city` FOREIGN KEY (`cityId`) REFERENCES `tbl_city` (`cityId`) ON DELETE CASCADE,
  CONSTRAINT `fk_location_department` FOREIGN KEY (`departmentId`) REFERENCES `tbl_department` (`departmentId`) ON DELETE CASCADE,
  CONSTRAINT `fk_location_division` FOREIGN KEY (`divisionId`) REFERENCES `tbl_division` (`divisionId`) ON DELETE CASCADE,
  CONSTRAINT `fk_location_locationStatus` FOREIGN KEY (`locationStatus`) REFERENCES `tbl_location_status` (`locationStatusId`) ON DELETE CASCADE,
  CONSTRAINT `fk_location_locationType` FOREIGN KEY (`locationType`) REFERENCES `tbl_location_type` (`locationTypeId`) ON DELETE CASCADE,
  CONSTRAINT `fk_location_subdivision` FOREIGN KEY (`subdivisionId`) REFERENCES `tbl_subdivision` (`subdivisionId`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_location
-- ----------------------------
INSERT INTO `tbl_location` VALUES ('127', '15', '15001', '10', '102', 'Tunja Hogares', 'Calle 26 # 11-10', 'Las Nieves', null, null, null, '4', '1', null, null, '2015-07-27 18:05:13', '2', '2015-07-31 09:35:49', '2', '1', '1');
INSERT INTO `tbl_location` VALUES ('128', '25', '25307', '10', '102', 'Girardot', 'Carrera 6A # 21-07', 'San Antonio', null, null, null, '4', '1', null, null, '2015-07-29 16:40:53', '2', '2015-07-31 09:36:53', '2', '1', '1');
INSERT INTO `tbl_location` VALUES ('129', '15', '15001', '10', '102', 'Tunja Camol', 'pendiente', 'Centro', null, null, null, '3', '1', null, null, '2015-07-31 09:37:28', '2', '2015-07-31 09:37:28', '2', '1', '1');
INSERT INTO `tbl_location` VALUES ('130', '11', '11001', '10', '101', 'demo location for demo coord', 'demo address', '', null, null, null, null, null, null, null, '2015-07-31 11:02:22', '4', '2015-07-31 11:02:22', '4', '1', '1');

-- ----------------------------
-- Table structure for tbl_location_status
-- ----------------------------
DROP TABLE IF EXISTS `tbl_location_status`;
CREATE TABLE `tbl_location_status` (
  `locationStatusId` int(11) NOT NULL AUTO_INCREMENT,
  `locationStatusName` varchar(255) DEFAULT NULL,
  `locationStatusDescription` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`locationStatusId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_location_status
-- ----------------------------
INSERT INTO `tbl_location_status` VALUES ('1', 'Active', '');
INSERT INTO `tbl_location_status` VALUES ('2', 'Non active', null);

-- ----------------------------
-- Table structure for tbl_location_type
-- ----------------------------
DROP TABLE IF EXISTS `tbl_location_type`;
CREATE TABLE `tbl_location_type` (
  `locationTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `locationTypeName` varchar(255) DEFAULT NULL,
  `locationTypeDescription` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`locationTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_location_type
-- ----------------------------
INSERT INTO `tbl_location_type` VALUES ('1', 'Unidireccional', 'Soporta redes unidireccionales - Cabeceras');
INSERT INTO `tbl_location_type` VALUES ('2', 'Bidireccional', 'Soporta redes bidireccionales');
INSERT INTO `tbl_location_type` VALUES ('3', 'Corporativo', 'Soporta redes corporativas');
INSERT INTO `tbl_location_type` VALUES ('4', 'Mixto', 'Soporta dos o mas tipos de redes unidireccional, bidireccional y/o corporativos');

-- ----------------------------
-- Table structure for tbl_location_user_assignment
-- ----------------------------
DROP TABLE IF EXISTS `tbl_location_user_assignment`;
CREATE TABLE `tbl_location_user_assignment` (
  `locationId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`locationId`,`userId`),
  KEY `fk_locationUserAssignment_user` (`userId`) USING BTREE,
  KEY `fk_locationUserAssignment_items` (`role`) USING BTREE,
  KEY `fk_locationUserAssignment_location` (`locationId`) USING BTREE,
  CONSTRAINT `fk_locationUserAssignment_items` FOREIGN KEY (`role`) REFERENCES `items` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_locationUserAssignment_location` FOREIGN KEY (`locationId`) REFERENCES `tbl_location` (`locationId`) ON DELETE CASCADE,
  CONSTRAINT `fk_locationUserAssignment_user` FOREIGN KEY (`userId`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_location_user_assignment
-- ----------------------------
INSERT INTO `tbl_location_user_assignment` VALUES ('127', '2', 'Coordinator');
INSERT INTO `tbl_location_user_assignment` VALUES ('128', '2', 'Coordinator');
INSERT INTO `tbl_location_user_assignment` VALUES ('129', '2', 'Coordinator');
INSERT INTO `tbl_location_user_assignment` VALUES ('130', '4', 'Coordinator');
INSERT INTO `tbl_location_user_assignment` VALUES ('127', '8', 'Technician');
INSERT INTO `tbl_location_user_assignment` VALUES ('128', '11', 'Technician');
INSERT INTO `tbl_location_user_assignment` VALUES ('129', '8', 'Technician');

-- ----------------------------
-- Table structure for tbl_object
-- ----------------------------
DROP TABLE IF EXISTS `tbl_object`;
CREATE TABLE `tbl_object` (
  `objectId` int(11) NOT NULL AUTO_INCREMENT,
  `platformId` int(11) NOT NULL,
  `objectName` varchar(255) DEFAULT NULL,
  `objectAlias` varchar(255) DEFAULT NULL,
  `objectDescription` varchar(255) DEFAULT NULL,
  `createTime` datetime DEFAULT NULL,
  `createUserId` int(11) DEFAULT NULL,
  `updateTime` datetime DEFAULT NULL,
  `updateUserId` int(11) DEFAULT NULL,
  `Status` varchar(255) DEFAULT '1',
  `Flag` varchar(255) DEFAULT '1',
  PRIMARY KEY (`objectId`),
  KEY `fk_object_platform` (`platformId`),
  CONSTRAINT `fk_object_platform` FOREIGN KEY (`platformId`) REFERENCES `tbl_platform` (`platformId`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_object
-- ----------------------------
INSERT INTO `tbl_object` VALUES ('51', '307', '', '', null, '2015-06-11 19:12:42', '1', '2015-06-11 19:12:42', '1', '1', '1');
INSERT INTO `tbl_object` VALUES ('52', '318', '', '', null, '2015-06-19 16:01:14', '1', '2015-06-19 16:01:14', '1', '1', '1');
INSERT INTO `tbl_object` VALUES ('53', '321', '', '', null, '2015-06-19 16:01:23', '1', '2015-06-19 16:01:23', '1', '1', '1');
INSERT INTO `tbl_object` VALUES ('54', '312', '', '', null, '2015-06-19 16:01:41', '1', '2015-06-19 16:01:41', '1', '1', '1');
INSERT INTO `tbl_object` VALUES ('55', '315', '', '', null, '2015-06-19 16:01:58', '1', '2015-06-19 16:01:58', '1', '1', '1');
INSERT INTO `tbl_object` VALUES ('56', '313', '', '', null, '2015-06-19 16:02:41', '1', '2015-06-19 16:02:41', '1', '1', '1');
INSERT INTO `tbl_object` VALUES ('57', '316', '', '', null, '2015-06-19 16:04:03', '1', '2015-06-19 16:04:03', '1', '1', '1');
INSERT INTO `tbl_object` VALUES ('58', '319', '', '', null, '2015-06-19 16:04:16', '1', '2015-06-19 16:04:16', '1', '1', '1');
INSERT INTO `tbl_object` VALUES ('59', '320', '', '', null, '2015-06-19 16:04:46', '1', '2015-06-19 16:04:46', '1', '1', '1');
INSERT INTO `tbl_object` VALUES ('60', '318', 'TBHAVILLAVICENCIO', 'Switch principal de datos', null, '2015-06-19 18:17:27', '6', '2015-06-19 18:17:27', '6', '1', '1');
INSERT INTO `tbl_object` VALUES ('61', '307', '', '', null, '2015-07-23 13:33:55', '1', '2015-07-23 13:33:55', '1', '1', '1');
INSERT INTO `tbl_object` VALUES ('62', '311', '', '', null, '2015-07-23 13:34:05', '1', '2015-07-23 13:34:05', '1', '1', '1');
INSERT INTO `tbl_object` VALUES ('63', '321', '', '', null, '2015-07-23 13:34:12', '1', '2015-07-23 13:34:12', '1', '1', '1');
INSERT INTO `tbl_object` VALUES ('64', '319', '', '', null, '2015-07-23 13:34:42', '1', '2015-07-23 13:34:42', '1', '1', '1');

-- ----------------------------
-- Table structure for tbl_platform
-- ----------------------------
DROP TABLE IF EXISTS `tbl_platform`;
CREATE TABLE `tbl_platform` (
  `platformId` int(11) NOT NULL AUTO_INCREMENT,
  `vendorId` int(11) NOT NULL,
  `chapterId` int(11) NOT NULL,
  `platformName` varchar(255) NOT NULL,
  `platformDescription` varchar(255) DEFAULT NULL,
  `platformImagePath` varchar(255) DEFAULT NULL,
  `platformBackgroundTextColor` varchar(255) DEFAULT NULL,
  `platformRackUnits` int(11) DEFAULT NULL,
  `createTime` datetime DEFAULT NULL,
  `createUserId` int(11) DEFAULT NULL,
  `updateTime` datetime DEFAULT NULL,
  `updateUserId` int(11) DEFAULT NULL,
  `Status` varchar(255) DEFAULT '1',
  `Flag` varchar(255) DEFAULT '1',
  PRIMARY KEY (`platformId`),
  KEY `fk_platform_vendor` (`vendorId`),
  KEY `fk_platform_chapter` (`chapterId`),
  CONSTRAINT `fk_platform_chapter` FOREIGN KEY (`chapterId`) REFERENCES `tbl_chapter` (`chapterId`) ON DELETE CASCADE,
  CONSTRAINT `fk_platform_vendor` FOREIGN KEY (`vendorId`) REFERENCES `tbl_vendor` (`vendorId`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=322 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_platform
-- ----------------------------
INSERT INTO `tbl_platform` VALUES ('301', '101', '201', '1RU-device', 'Equipo de una unidad de rack', 'images/svg/1ru.svg', null, '1', '2015-05-29 11:08:11', '1', '2015-05-29 11:18:59', '1', '1', '1');
INSERT INTO `tbl_platform` VALUES ('303', '101', '201', '2RU-device', 'Equipo de dos unidades de rack', 'images/svg/2ru.svg', null, '2', '2015-05-29 11:31:22', '1', '2015-05-29 11:31:22', '1', '1', '1');
INSERT INTO `tbl_platform` VALUES ('304', '101', '201', '3RU-device', 'Equipo de tres unidades de rack', 'images/svg/3ru.svg', null, '3', '2015-05-29 11:31:22', '1', '2015-05-29 11:31:22', '1', '1', '1');
INSERT INTO `tbl_platform` VALUES ('305', '101', '201', '4RU-device', 'Equipo de cuatro unidades de rack', 'images/svg/4ru.svg', null, '4', '2015-05-29 11:31:22', '1', '2015-05-29 11:31:22', '1', '1', '1');
INSERT INTO `tbl_platform` VALUES ('306', '101', '201', '14RU-device', 'Equipo de quince unidades de rack', 'images/svg/14ru.svg', null, '14', '2015-05-29 11:31:22', '1', '2015-05-29 11:31:22', '1', '1', '1');
INSERT INTO `tbl_platform` VALUES ('307', '101', '201', 'CMTS Arris C4', 'CMTS Arris C4', 'images/devices/cmtsc4arris.png', null, '14', '2015-05-29 11:31:22', '1', '2015-05-29 11:31:22', '1', '1', '1');
INSERT INTO `tbl_platform` VALUES ('308', '101', '201', 'Aurora CH3000', 'Plataforma optica Aurora CH3000', 'images/svg/3ru.svg', null, '3', '2015-05-29 11:31:22', '1', '2015-05-29 11:31:22', '1', '1', '1');
INSERT INTO `tbl_platform` VALUES ('309', '101', '201', 'SciAt Prisma II', 'Plataforma optica Scientific Atlanta Prisma II', 'images/devices/prisma2sciat.png', null, '6', '2015-05-29 11:31:22', '1', '2015-05-29 11:31:22', '1', '1', '1');
INSERT INTO `tbl_platform` VALUES ('310', '101', '201', 'JDSU HCU1500', 'Equipo monitoreo retorno', 'images/devices/hcu1500jdsu.png', null, '7', '2015-05-29 11:31:22', '1', '2015-05-29 11:31:22', '1', '1', '1');
INSERT INTO `tbl_platform` VALUES ('311', '101', '201', 'JDSU SDA5500', 'Equipo generador Sweep Forward', 'images/devices/sda5500jdsu.png', null, '3', '2015-05-29 11:31:22', '1', '2015-05-29 11:31:22', '1', '1', '1');
INSERT INTO `tbl_platform` VALUES ('312', '101', '201', 'JDSU SDA5510', 'Equipo generador Sweep Reverse', 'images/devices/sda5510jdsu.png', null, '3', '2015-05-29 11:31:22', '1', '2015-05-29 11:31:22', '1', '1', '1');
INSERT INTO `tbl_platform` VALUES ('313', '101', '201', 'Cisco ME 3400', 'Switch Cisco ME 3400 Series', 'images/devices/ciscome3400.png', null, '1', '2015-05-29 11:31:22', '1', '2015-05-29 11:31:22', '1', '1', '1');
INSERT INTO `tbl_platform` VALUES ('314', '101', '201', 'Cisco Catalyst 2960G', 'Switch Cisco Catalyst 2960G Series', 'images/svg/1ru.svg', null, '1', '2015-05-29 11:31:22', '1', '2015-05-29 11:31:22', '1', '1', '1');
INSERT INTO `tbl_platform` VALUES ('315', '101', '201', 'ODF Tyco Loop Box', 'Caja de loops de fibra, organizador reservas', 'images/devices/fistgcs2tyco.png', null, '4', '2015-05-29 11:31:22', '1', '2015-05-29 11:31:22', '1', '1', '1');
INSERT INTO `tbl_platform` VALUES ('316', '101', '201', 'ODF Tyco Patch Box', 'Caja de conectores de fibra, patch panel de fibra', 'images/devices/fistgps2tyco.png', null, '2', '2015-05-29 11:31:22', '1', '2015-05-29 11:31:22', '1', '1', '1');
INSERT INTO `tbl_platform` VALUES ('317', '101', '201', 'ODF Tyco Splice Box', 'Caja de fusiones y reservas de fibra', 'images/devices/fistgss2tyco.png', null, '3', '2015-05-29 11:31:22', '1', '2015-05-29 11:31:22', '1', '1', '1');
INSERT INTO `tbl_platform` VALUES ('318', '101', '201', 'Cisco 4948e', 'Switch Cisco 4948e Series', 'images/devices/cisco4948e.png', null, '1', '2015-05-29 11:31:22', '1', '2015-05-29 11:31:22', '1', '1', '1');
INSERT INTO `tbl_platform` VALUES ('319', '101', '201', 'Organizador H 1RU', 'Organizador horizontal 1 unidad de rack, baja densidad', 'images/devices/oh1ru.png', null, '1', '2015-05-29 11:31:22', '1', '2015-05-29 11:31:22', '1', '1', '1');
INSERT INTO `tbl_platform` VALUES ('320', '101', '201', 'Organizador H 2RU', 'Organizador horizontal 2 unidades de rack, alta densidad', 'images/devices/oh2ru.png', null, '2', '2015-05-29 11:31:22', '1', '2015-05-29 11:31:22', '1', '1', '1');
INSERT INTO `tbl_platform` VALUES ('321', '101', '201', 'Maxnet 1', 'Plataforma de RF combinadores y/o distribuidores Maxnet 1', 'images/devices/maxnet1.png', null, '5', '2015-05-29 11:31:22', '1', '2015-05-29 11:31:22', '1', '1', '1');

-- ----------------------------
-- Table structure for tbl_profiles
-- ----------------------------
DROP TABLE IF EXISTS `tbl_profiles`;
CREATE TABLE `tbl_profiles` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_profiles
-- ----------------------------
INSERT INTO `tbl_profiles` VALUES ('1', 'Admin', 'Administrator', '0000-00-00');
INSERT INTO `tbl_profiles` VALUES ('2', 'Carrillo Moreno', 'Miguel Angel', '0000-00-00');
INSERT INTO `tbl_profiles` VALUES ('3', 'Manager', 'Demo', '1983-12-16');
INSERT INTO `tbl_profiles` VALUES ('4', 'Coordinator', 'Demo', '1983-12-16');
INSERT INTO `tbl_profiles` VALUES ('5', 'Engineer', 'Demo', '0000-00-00');
INSERT INTO `tbl_profiles` VALUES ('6', 'Technician', 'Demo', '0000-00-00');
INSERT INTO `tbl_profiles` VALUES ('7', 'Guest', 'Demo', '0000-00-00');
INSERT INTO `tbl_profiles` VALUES ('8', 'Acevedo Parra', 'Javier Alexander', '0000-00-00');
INSERT INTO `tbl_profiles` VALUES ('9', 'Goyeneche Cucunuva', 'Segundo Euriperez', '0000-00-00');
INSERT INTO `tbl_profiles` VALUES ('11', 'Valdes Cristancho', 'Luis Alfonso', '0000-00-00');

-- ----------------------------
-- Table structure for tbl_profiles_fields
-- ----------------------------
DROP TABLE IF EXISTS `tbl_profiles_fields`;
CREATE TABLE `tbl_profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_profiles_fields
-- ----------------------------
INSERT INTO `tbl_profiles_fields` VALUES ('1', 'lastname', 'Last Name', 'VARCHAR', '50', '3', '1', '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', '1', '3');
INSERT INTO `tbl_profiles_fields` VALUES ('2', 'firstname', 'First Name', 'VARCHAR', '50', '3', '1', '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', '0', '3');
INSERT INTO `tbl_profiles_fields` VALUES ('3', 'birthday', 'Birthday', 'DATE', '0', '0', '0', '', '', '', '', '0000-00-00', 'UWjuidate', '{\"ui-theme\":\"redmond\"}', '3', '0');

-- ----------------------------
-- Table structure for tbl_rack
-- ----------------------------
DROP TABLE IF EXISTS `tbl_rack`;
CREATE TABLE `tbl_rack` (
  `rackId` int(11) NOT NULL AUTO_INCREMENT,
  `rowId` int(11) NOT NULL,
  `sortOrder` int(11) NOT NULL,
  `rackName` varchar(255) DEFAULT NULL,
  `rackFacePosition` enum('F','R') DEFAULT 'F',
  `rackType` int(11) DEFAULT '1',
  `createTime` datetime DEFAULT NULL,
  `createUserId` int(11) DEFAULT NULL,
  `updateTime` datetime DEFAULT NULL,
  `updateUserId` int(11) DEFAULT NULL,
  `Status` int(11) DEFAULT '1',
  `Flag` int(11) DEFAULT '1',
  PRIMARY KEY (`rackId`),
  KEY `fk_rack_row` (`rowId`),
  CONSTRAINT `fk_rack_row` FOREIGN KEY (`rowId`) REFERENCES `tbl_row` (`rowId`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_rack
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_rack_space
-- ----------------------------
DROP TABLE IF EXISTS `tbl_rack_space`;
CREATE TABLE `tbl_rack_space` (
  `objectId` int(11) NOT NULL,
  `rackId` int(11) NOT NULL,
  `initialRU` int(11) NOT NULL,
  `endRU` int(11) NOT NULL,
  `createTime` datetime DEFAULT NULL,
  `createUserId` int(11) DEFAULT NULL,
  `updateTime` datetime DEFAULT NULL,
  `updateUserId` int(11) DEFAULT NULL,
  PRIMARY KEY (`objectId`,`rackId`),
  KEY `fk_rackspace_rack` (`rackId`),
  CONSTRAINT `fk_rackspace_object` FOREIGN KEY (`objectId`) REFERENCES `tbl_object` (`objectId`) ON DELETE CASCADE,
  CONSTRAINT `fk_rackspace_rack` FOREIGN KEY (`rackId`) REFERENCES `tbl_rack` (`rackId`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_rack_space
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_room
-- ----------------------------
DROP TABLE IF EXISTS `tbl_room`;
CREATE TABLE `tbl_room` (
  `roomId` int(11) NOT NULL AUTO_INCREMENT,
  `locationId` int(11) DEFAULT NULL,
  `roomName` varchar(255) NOT NULL,
  `roomAlias` varchar(255) NOT NULL,
  `roomDescription` varchar(255) DEFAULT NULL,
  `floorLocation` int(11) DEFAULT NULL,
  `createTime` datetime DEFAULT NULL,
  `createUserId` int(11) DEFAULT NULL,
  `updateTime` datetime DEFAULT NULL,
  `updateUserId` int(11) DEFAULT NULL,
  `Status` int(11) DEFAULT '1',
  `Flag` int(11) DEFAULT '1',
  PRIMARY KEY (`roomId`),
  KEY `fk_room_sds` (`locationId`),
  CONSTRAINT `fk_room_location` FOREIGN KEY (`locationId`) REFERENCES `tbl_location` (`locationId`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_room
-- ----------------------------
INSERT INTO `tbl_room` VALUES ('100', '127', 'Shelter', 'Shelter', 'Cuarto de equipos externo tipo Shelter', '1', '2015-07-31 10:38:18', '2', '2015-07-31 10:38:18', '2', '1', '1');
INSERT INTO `tbl_room` VALUES ('101', '127', 'CE Principal', 'CE Principal', 'Cuarto de equipos en edificio', '1', '2015-07-31 10:42:54', '2', '2015-07-31 10:42:54', '2', '1', '1');

-- ----------------------------
-- Table structure for tbl_row
-- ----------------------------
DROP TABLE IF EXISTS `tbl_row`;
CREATE TABLE `tbl_row` (
  `rowId` int(11) NOT NULL AUTO_INCREMENT,
  `roomId` int(11) NOT NULL,
  `rowName` varchar(255) NOT NULL,
  `rowDescription` varchar(255) DEFAULT NULL,
  `createTime` datetime DEFAULT NULL,
  `createUserId` int(11) DEFAULT NULL,
  `updateTime` datetime DEFAULT NULL,
  `updateUserId` int(11) DEFAULT NULL,
  `Status` int(11) DEFAULT '1',
  `Flag` int(11) DEFAULT '1',
  PRIMARY KEY (`rowId`),
  KEY `fk_row_room` (`roomId`),
  CONSTRAINT `fk_row_room` FOREIGN KEY (`roomId`) REFERENCES `tbl_room` (`roomId`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_row
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_subdivision
-- ----------------------------
DROP TABLE IF EXISTS `tbl_subdivision`;
CREATE TABLE `tbl_subdivision` (
  `subdivisionId` int(11) NOT NULL AUTO_INCREMENT,
  `divisionId` int(11) DEFAULT NULL,
  `subdivisionName` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT '1',
  `Flag` int(11) DEFAULT '1',
  PRIMARY KEY (`subdivisionId`),
  KEY `fk_subdivision_division` (`divisionId`),
  CONSTRAINT `fk_subdivision_division` FOREIGN KEY (`divisionId`) REFERENCES `tbl_division` (`divisionId`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_subdivision
-- ----------------------------
INSERT INTO `tbl_subdivision` VALUES ('101', '10', 'Bogotá', '1', '1');
INSERT INTO `tbl_subdivision` VALUES ('102', '10', 'Poblaciones', '1', '1');

-- ----------------------------
-- Table structure for tbl_test_location
-- ----------------------------
DROP TABLE IF EXISTS `tbl_test_location`;
CREATE TABLE `tbl_test_location` (
  `locationId` int(11) NOT NULL AUTO_INCREMENT,
  `locationName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`locationId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_test_location
-- ----------------------------
INSERT INTO `tbl_test_location` VALUES ('1', 'Location1');
INSERT INTO `tbl_test_location` VALUES ('2', 'Location 2');
INSERT INTO `tbl_test_location` VALUES ('3', 'Location 3');
INSERT INTO `tbl_test_location` VALUES ('4', 'Location 4');
INSERT INTO `tbl_test_location` VALUES ('5', 'Location 5');

-- ----------------------------
-- Table structure for tbl_test_location_user_assignment
-- ----------------------------
DROP TABLE IF EXISTS `tbl_test_location_user_assignment`;
CREATE TABLE `tbl_test_location_user_assignment` (
  `locationId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`locationId`,`userId`),
  KEY `fk_tlua_user` (`userId`),
  CONSTRAINT `fk_tlua_location` FOREIGN KEY (`locationId`) REFERENCES `tbl_test_location` (`locationId`) ON DELETE CASCADE,
  CONSTRAINT `fk_tlua_user` FOREIGN KEY (`userId`) REFERENCES `tbl_test_user` (`userId`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_test_location_user_assignment
-- ----------------------------
INSERT INTO `tbl_test_location_user_assignment` VALUES ('1', '1');
INSERT INTO `tbl_test_location_user_assignment` VALUES ('2', '1');
INSERT INTO `tbl_test_location_user_assignment` VALUES ('4', '1');
INSERT INTO `tbl_test_location_user_assignment` VALUES ('3', '2');
INSERT INTO `tbl_test_location_user_assignment` VALUES ('5', '2');

-- ----------------------------
-- Table structure for tbl_test_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_test_user`;
CREATE TABLE `tbl_test_user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_test_user
-- ----------------------------
INSERT INTO `tbl_test_user` VALUES ('1', 'User 1');
INSERT INTO `tbl_test_user` VALUES ('2', 'User 2');

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userFirstName` varchar(255) NOT NULL,
  `userLastName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `userType` int(11) DEFAULT NULL,
  `userProfile` int(11) DEFAULT NULL,
  `lastLoginTime` datetime DEFAULT NULL,
  `createTime` datetime DEFAULT NULL,
  `createUserId` int(11) DEFAULT NULL,
  `updateTime` datetime DEFAULT NULL,
  `updateUserId` int(11) DEFAULT NULL,
  `Status` int(11) DEFAULT '1',
  `Flag` int(11) DEFAULT '1',
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES ('1', 'admin', 'admin', 'admin', 'admin@admin.com', '098f6bcd4621d373cade4e832627b4f6', null, null, null, null, null, null, null, '1', '1');

-- ----------------------------
-- Table structure for tbl_users
-- ----------------------------
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `createtime` int(10) NOT NULL DEFAULT '0',
  `lastvisit` int(10) NOT NULL DEFAULT '0',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_users
-- ----------------------------
INSERT INTO `tbl_users` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '736b8acb725560641f11f78a0bdbde51', '1261146094', '1438650691', '1', '1');
INSERT INTO `tbl_users` VALUES ('2', 'miguel.carrillo', '098f6bcd4621d373cade4e832627b4f6', 'miguel.carrillo@claro.com.co', '63f37053e00285f6054d1f88a4284db9', '1261146096', '1438702416', '0', '1');
INSERT INTO `tbl_users` VALUES ('3', 'demo.manager', '098f6bcd4621d373cade4e832627b4f6', 'demo.manager@example.com', 'ae0ce7e648fe58767f0abc67362b19c3', '1434491050', '1438037411', '0', '1');
INSERT INTO `tbl_users` VALUES ('4', 'demo.coordinator', '098f6bcd4621d373cade4e832627b4f6', 'demo.coordinator@example.com', '7a7242a26bea5997b43f01f6bb61818e', '1434497311', '1438358440', '0', '1');
INSERT INTO `tbl_users` VALUES ('5', 'demo.engineer', '098f6bcd4621d373cade4e832627b4f6', 'demo.engineer@example.com', '2393c77e449a133973b70196d5070ad8', '1434578976', '1434682663', '0', '1');
INSERT INTO `tbl_users` VALUES ('6', 'demo.technician', '098f6bcd4621d373cade4e832627b4f6', 'demo.technician@example.com', 'db2578130b5ccc207c9757d76de2729f', '1434631997', '1438037461', '0', '1');
INSERT INTO `tbl_users` VALUES ('7', 'demo.guest', '098f6bcd4621d373cade4e832627b4f6', 'demo.guest@example.com', '06d61b1d2bba7a6480df874cf31f63f4', '1434726642', '1435162338', '0', '1');
INSERT INTO `tbl_users` VALUES ('8', 'javier.acevedo', '098f6bcd4621d373cade4e832627b4f6', 'javier.acevedo@claro.com.co', 'b665e466d4883bc2e2ba5137ba3056b8', '1437062692', '1438702392', '0', '1');
INSERT INTO `tbl_users` VALUES ('9', 'segundo.goyeneche', 'e10adc3949ba59abbe56e057f20f883e', 'segundo.goyeneche@hotmail.com', '3a50a809b5a5ba6df57ea8e268cab097', '1437062752', '1437062769', '0', '1');
INSERT INTO `tbl_users` VALUES ('11', 'luis.valdes', '098f6bcd4621d373cade4e832627b4f6', 'luis.valdes@claro.com.co', 'bcc96b4e0728385c7c6cec8b2c147daa', '1438353968', '1438353968', '0', '1');

-- ----------------------------
-- Table structure for tbl_vendor
-- ----------------------------
DROP TABLE IF EXISTS `tbl_vendor`;
CREATE TABLE `tbl_vendor` (
  `vendorId` int(11) NOT NULL AUTO_INCREMENT,
  `vendorName` varchar(255) NOT NULL,
  `vendorDescription` varchar(255) DEFAULT NULL,
  `vendorSite` varchar(255) DEFAULT NULL,
  `createTime` datetime DEFAULT NULL,
  `createUserId` int(11) DEFAULT NULL,
  `updateTime` datetime DEFAULT NULL,
  `updateUserId` int(11) DEFAULT NULL,
  `Status` varchar(255) DEFAULT '1',
  `Flag` varchar(255) DEFAULT '1',
  PRIMARY KEY (`vendorId`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_vendor
-- ----------------------------
INSERT INTO `tbl_vendor` VALUES ('101', 'Cisco Systems, Inc', '', 'http://www.cisco.com/web/CO/index.html', '2015-05-29 10:04:59', '1', '2015-05-29 10:04:59', '1', '1', '1');
INSERT INTO `tbl_vendor` VALUES ('102', 'Aurora Networks', '', 'http://www.aurora.com/site/home.an', '2015-05-29 10:07:49', '1', '2015-05-29 10:07:49', '1', '1', '1');
INSERT INTO `tbl_vendor` VALUES ('103', 'ATX Networks', '', 'http://atxnetworks.com/', '2015-05-29 10:09:01', '1', '2015-05-29 10:09:01', '1', '1', '1');
INSERT INTO `tbl_vendor` VALUES ('104', 'Huawei', '', 'http://www.huawei.com/en/', '2015-05-29 10:10:07', '1', '2015-05-29 10:10:07', '1', '1', '1');
INSERT INTO `tbl_vendor` VALUES ('105', 'Alcatel - Lucent', '', 'https://www.alcatel-lucent.com/', '2015-05-29 10:10:56', '1', '2015-05-29 10:10:56', '1', '1', '1');
INSERT INTO `tbl_vendor` VALUES ('106', 'ZTE Corporation', '', 'http://wwwen.zte.com.cn/en/', '2015-05-29 10:11:36', '1', '2015-05-29 10:11:36', '1', '1', '1');
INSERT INTO `tbl_vendor` VALUES ('107', 'Electroline', '', 'http://www.electroline.com/', '2015-05-29 10:13:14', '1', '2015-05-29 10:13:14', '1', '1', '1');
INSERT INTO `tbl_vendor` VALUES ('108', 'The Alpha Group', '', 'http://www.alpha.com/', '2015-05-29 10:13:52', '1', '2015-05-29 10:13:52', '1', '1', '1');
INSERT INTO `tbl_vendor` VALUES ('109', 'Mysi S.A.', '', 'http://www.mysi-sa.com/', '2015-05-29 10:14:59', '1', '2015-05-29 10:14:59', '1', '1', '1');
INSERT INTO `tbl_vendor` VALUES ('110', 'Arris', '', 'http://www.arris.com/', '2015-05-29 10:15:25', '1', '2015-05-29 10:15:25', '1', '1', '1');
INSERT INTO `tbl_vendor` VALUES ('111', 'Casa Systems', '', 'http://www.casa-systems.com/', '2015-05-29 10:15:53', '1', '2015-05-29 10:15:53', '1', '1', '1');
INSERT INTO `tbl_vendor` VALUES ('112', 'Technicolor', '', 'http://www.technicolor.com/', '2015-05-29 10:16:31', '1', '2015-05-29 10:16:31', '1', '1', '1');
INSERT INTO `tbl_vendor` VALUES ('113', 'RGB Networks', '', 'http://www.rgbnetworks.com/', '2015-05-29 10:17:05', '1', '2015-05-29 10:17:05', '1', '1', '1');
INSERT INTO `tbl_vendor` VALUES ('114', 'Motorola', '', 'http://latam.motorola.com/', '2015-05-29 10:17:31', '1', '2015-05-29 10:17:31', '1', '1', '1');
