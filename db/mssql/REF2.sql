/*
Navicat SQL Server Data Transfer

Source Server         : localhost
Source Server Version : 150000
Source Host           : localhost:1433
Source Database       : TGLOBAL_GSP
Source Schema         : dbo

Target Server Type    : SQL Server
Target Server Version : 150000
File Encoding         : 65001

Date: 2023-09-24 04:10:54
*/


-- ----------------------------
-- Table structure for TREFERALREWARDLOGTABLE
-- ----------------------------
DROP TABLE [dbo].[TREFERALREWARDLOGTABLE]
GO
CREATE TABLE [dbo].[TREFERALREWARDLOGTABLE] (
[dwWhoGotIt] int NOT NULL ,
[dDate] datetime NOT NULL ,
[dwPartnerID] int NOT NULL ,
[bWhoGotIt] tinyint NULL 
)


GO

-- ----------------------------
-- Table structure for TREFERALTABLE
-- ----------------------------
DROP TABLE [dbo].[TREFERALTABLE]
GO
CREATE TABLE [dbo].[TREFERALTABLE] (
[dwUserID] int NOT NULL ,
[dwReferID] int NOT NULL ,
[szReferID] varchar(16) NOT NULL ,
[bRewarded] tinyint NOT NULL ,
[bInvalid] int NOT NULL ,
[dInvalidate] datetime NOT NULL ,
[dRefDate] datetime NULL 
)


GO
