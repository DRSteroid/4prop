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

Date: 2023-09-24 03:47:54
*/


-- ----------------------------
-- Table structure for TCOUNTRYCHANGETABLE
-- ----------------------------
DROP TABLE [dbo].[TCOUNTRYCHANGETABLE]
GO
CREATE TABLE [dbo].[TCOUNTRYCHANGETABLE] (
[dwID] int NOT NULL IDENTITY(1,1) ,
[dwUserID] int NOT NULL ,
[bFrom] int NOT NULL ,
[bWhere] int NULL ,
[bDate] smalldatetime NULL 
)


GO
DBCC CHECKIDENT(N'[dbo].[TCOUNTRYCHANGETABLE]', RESEED, 214)
GO

-- ----------------------------
-- Indexes structure for table TCOUNTRYCHANGETABLE
-- ----------------------------

-- ----------------------------
-- Primary Key structure for table TCOUNTRYCHANGETABLE
-- ----------------------------
ALTER TABLE [dbo].[TCOUNTRYCHANGETABLE] ADD PRIMARY KEY ([dwID])
GO
