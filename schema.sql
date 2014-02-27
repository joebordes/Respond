CREATE TABLE IF NOT EXISTS `MenuItems` (
  `MenuItemId` int(11) NOT NULL AUTO_INCREMENT,
  `MenuItemUniqId` varchar(50) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `CssClass` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL DEFAULT 'primary',
  `Url` varchar(512) DEFAULT NULL,
  `PageId` int(11) DEFAULT NULL,
  `Priority` int(11) DEFAULT NULL,
  `IsNested` int(11) DEFAULT '0',
  `SiteId` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `Created` datetime NOT NULL,
  `LastModifiedBy` int(11) NOT NULL,
  `LastModifiedDate` datetime NOT NULL,
  PRIMARY KEY (`MenuItemId`),
  KEY `SiteId` (`SiteId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=697;

CREATE TABLE IF NOT EXISTS `MenuTypes` (
  `MenuTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `MenuTypeUniqId` varchar(50) NOT NULL,
  `FriendlyId` varchar(50) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `SiteId` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `LastModifiedBy` int(11) NOT NULL,
  `LastModifiedDate` datetime NOT NULL,
  `Created` datetime NOT NULL,
  PRIMARY KEY (`MenuTypeId`),
  KEY `OrgId` (`SiteId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;


CREATE TABLE IF NOT EXISTS `Pages` (
  `PageId` int(11) NOT NULL AUTO_INCREMENT,
  `PageUniqId` varchar(50) NOT NULL,
  `FriendlyId` varchar(50) DEFAULT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` text,
  `Keywords` text,
  `Callout` varchar(100) DEFAULT NULL,
  `BeginDate` DATETIME,
  `EndDate` DATETIME,
  `Location` VARCHAR(1024),
  `LatLong` POINT,
  `Rss` text,
  `Layout` varchar(50) DEFAULT NULL,
  `Stylesheet` varchar(50) DEFAULT NULL,
  `PageTypeId` int(11) DEFAULT NULL,
  `SiteId` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `LastModifiedBy` int(11) NOT NULL,
  `LastModifiedDate` datetime NOT NULL,
  `IsActive` int(11) DEFAULT NULL,
  `ImageFileId` int(11) DEFAULT NULL,
  `Image` varchar(256) DEFAULT NULL,
  `Created` datetime NOT NULL,
  PRIMARY KEY (`PageId`),
  KEY `OrgId` (`SiteId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=457 ;


CREATE TABLE IF NOT EXISTS `PageTypes` (
  `PageTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `PageTypeUniqId` varchar(50) NOT NULL,
  `FriendlyId` varchar(50) DEFAULT NULL,
  `TypeS` varchar(100) NOT NULL,
  `TypeP` varchar(100) NOT NULL,
  `Layout` varchar(50) DEFAULT NULL,
  `Stylesheet` varchar(50) DEFAULT NULL,
  `SiteId` int(11) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `LastModifiedBy` int(11) NOT NULL,
  `LastModifiedDate` datetime NOT NULL,
  `Created` datetime NOT NULL,
  PRIMARY KEY (`PageTypeId`),
  KEY `SiteId` (`SiteId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=94 ;


CREATE TABLE IF NOT EXISTS `Sites` (
  `SiteId` int(11) NOT NULL AUTO_INCREMENT,
  `SiteUniqId` varchar(50) NOT NULL,
  `FriendlyId` varchar(50) DEFAULT NULL,
  `Domain` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `LogoUrl` varchar(512) DEFAULT NULL,
  `Theme` varchar(50) DEFAULT NULL,
  `AnalyticsId` varchar(50) DEFAULT NULL,
  `FacebookAppId` varchar(255) DEFAULT NULL,
  `PrimaryEmail` varchar(255) DEFAULT NULL,
  `TimeZone` varchar(100) DEFAULT NULL,
  `Language` varchar(10) NOT NULL DEFAULT 'en',
  `Currency` varchar(10) NOT NULL DEFAULT 'USD',
  `WeightUnit` varchar(10) NOT NULL DEFAULT 'kgs',
  `ShippingCalculation` VARCHAR(10) NOT NULL DEFAULT  'free',
  `ShippingRate` DECIMAL(15,2) NOT NULL DEFAULT  '0.00',
  `ShippingTiers` TEXT,
  `TaxRate` DECIMAL(5, 5) NOT NULL DEFAULT '0',
  `PayPalId` VARCHAR(255),
  `LastLogin` datetime DEFAULT NULL,
  `Type` varchar(25) NOT NULL DEFAULT 'Non-Subscription',
  `CustomerId` varchar(256) DEFAULT NULL,
  `Created` datetime NOT NULL,
  PRIMARY KEY (`SiteId`),
  UNIQUE KEY `Domain` (`Domain`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;


CREATE TABLE IF NOT EXISTS `Users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `UserUniqId` varchar(50) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `PhotoUrl` VARCHAR(512),
  `Role` varchar(16) NOT NULL,
  `Language` varchar(10) NOT NULL DEFAULT 'en',
  `SiteId` int(11) NOT NULL,
  `Created` datetime NOT NULL,
  `Token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `Email` (`Email`),
  UNIQUE KEY `Email_2` (`Email`),
  KEY `OrgId` (`SiteId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=114 ;


CREATE TABLE IF NOT EXISTS `Categories` (
  `CategoryId` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryUniqId` varchar(50) NOT NULL,
  `FriendlyId` varchar(50) DEFAULT NULL,
  `Name` varchar(255) NOT NULL,
  `PageTypeId` int(11) DEFAULT NULL,
  `CreatedBy` int(11) NOT NULL,
  `LastModifiedBy` int(11) NOT NULL,
  `LastModifiedDate` datetime NOT NULL,
  `Created` datetime NOT NULL,
  PRIMARY KEY (`CategoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `Category_Page_Rel` (
  `CategoryId` int(11) NOT NULL,
  `PageId` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

ALTER TABLE `Category_Page_Rel`
  ADD CONSTRAINT `Category_Page_Rel_ibfk_1` FOREIGN KEY (`CategoryId`) REFERENCES `Categories` (`CategoryId`) ON DELETE CASCADE ON UPDATE CASCADE;
  
ALTER TABLE `Category_Page_Rel`
  ADD CONSTRAINT `Category_Page_Rel_ibfk_2` FOREIGN KEY (`PageId`) REFERENCES `Pages` (`PageId`) ON DELETE CASCADE ON UPDATE CASCADE;
  
ALTER TABLE `Categories`
  ADD CONSTRAINT `Categories_ibfk_1` FOREIGN KEY (`PageTypeId`) REFERENCES `PageTypes` (`PageTypeId`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `MenuItems`
  ADD CONSTRAINT `MenuItems_ibfk_1` FOREIGN KEY (`SiteId`) REFERENCES `Sites` (`SiteId`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `Pages`
  ADD CONSTRAINT `Pages_ibfk_1` FOREIGN KEY (`SiteId`) REFERENCES `Sites` (`SiteId`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `PageTypes`
  ADD CONSTRAINT `PageTypes_ibfk_1` FOREIGN KEY (`SiteId`) REFERENCES `Sites` (`SiteId`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `Users`
  ADD CONSTRAINT `Users_ibfk_1` FOREIGN KEY (`SiteId`) REFERENCES `Sites` (`SiteId`) ON DELETE CASCADE ON UPDATE CASCADE;