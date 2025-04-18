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

Date: 2023-09-24 03:45:08
*/


-- ----------------------------
-- Table structure for TShopLog
-- ----------------------------
DROP TABLE [dbo].[TShopLog]
GO
CREATE TABLE [dbo].[TShopLog] (
[dwID] int NOT NULL IDENTITY(1,1) ,
[dwUserID] int NOT NULL ,
[szUserName] varchar(50) NULL ,
[dwCash] int NOT NULL ,
[dwBonus] int NOT NULL ,
[wItemID] smallint NOT NULL ,
[bLevel] tinyint NOT NULL ,
[bCount] tinyint NOT NULL ,
[bGLevel] tinyint NOT NULL ,
[dwDuraMax] int NOT NULL ,
[dwDuraCur] int NOT NULL ,
[bRefineCur] tinyint NOT NULL ,
[dEndTime] smalldatetime NOT NULL ,
[bGradeEffect] tinyint NOT NULL DEFAULT ((0)) ,
[bMagic1] tinyint NOT NULL ,
[bMagic2] tinyint NOT NULL ,
[bMagic3] tinyint NOT NULL ,
[bMagic4] tinyint NOT NULL ,
[bMagic5] tinyint NOT NULL ,
[bMagic6] tinyint NOT NULL ,
[wValue1] smallint NOT NULL ,
[wValue2] smallint NOT NULL ,
[wValue3] smallint NOT NULL ,
[wValue4] smallint NOT NULL ,
[wValue5] smallint NOT NULL ,
[wValue6] smallint NOT NULL ,
[dwTime1] int NOT NULL ,
[dwTime2] int NOT NULL ,
[dwTime3] int NOT NULL ,
[dwTime4] int NOT NULL ,
[dwTime5] int NOT NULL ,
[dwTime6] int NOT NULL ,
[dwDate] smalldatetime NULL ,
[dwServer] varchar(50) NULL ,
[bWorldID] smallint NOT NULL DEFAULT ((0)) ,
[dlID] bigint NOT NULL DEFAULT ((0)) ,
[Country] varchar(255) NULL 
)


GO
DBCC CHECKIDENT(N'[dbo].[TShopLog]', RESEED, 297073)
GO

-- ----------------------------
-- Indexes structure for table TShopLog
-- ----------------------------
CREATE INDEX [IX_TCASHITEMCABINETTABLE] ON [dbo].[TShopLog]
([dwUserID] ASC) 
GO
CREATE INDEX [IX_TCASHITEMCABINETTABLE_1] ON [dbo].[TShopLog]
([bWorldID] ASC) 
GO
CREATE INDEX [IX_TCASHITEMCABINETTABLE_2] ON [dbo].[TShopLog]
([dlID] ASC) 
GO
CREATE INDEX [IX_TCASHITEMCABINETTABLE_3] ON [dbo].[TShopLog]
([wItemID] ASC) 
GO

-- ----------------------------
-- Primary Key structure for table TShopLog
-- ----------------------------
ALTER TABLE [dbo].[TShopLog] ADD PRIMARY KEY ([dwID])
GO
