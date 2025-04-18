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

Date: 2023-09-24 03:46:49
*/


-- ----------------------------
-- Table structure for TWELL_ITEMLIST
-- ----------------------------
DROP TABLE [dbo].[TWELL_ITEMLIST]
GO
CREATE TABLE [dbo].[TWELL_ITEMLIST] (
[iconid] int NULL ,
[itemid] int NULL ,
[count] int NULL ,
[rate] int NULL ,
[item_name] varchar(255) NULL ,
[item_info] varchar(255) NULL 
)


GO

-- ----------------------------
-- Records of TWELL_ITEMLIST
-- ----------------------------
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'11634', N'11634', N'5', N'37', N'Prémium drágako', N'Sikeresség eséyle négyszeres a sima drágakohöz képest')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7609', N'7609', N'7', N'42', N'Szerencse ital(100%)', N'A fejlesztés esélyét 100%-al megnöveli.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7678', N'7678', N'7', N'42', N'Szerencse ital(150%)', N'A fejlesztés esélyét 150%-al megnöveli.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7679', N'7679', N'7', N'42', N'Szerencse ital(200%)', N'A fejlesztés esélyét 200%-al megnöveli.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7654', N'7654', N'5', N'13', N'A túlélés fozete', N'Ez a fozet megvédi a tárgyakat fejlesztés közben. ')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7602', N'7602', N'6', N'12', N'Mester tekercs', N'Tárgyak maximum +3 szinttel való fejlesztéséhez használhatod a megfelelo NJK-nál.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7613', N'7613', N'5', N'14', N'A mester levele', N'Megnöveli az esélyét 300%-al egy tárgy mágikus tulajdonsággal való felruházásának nemesítés alatt.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7612', N'7612', N'4', N'13', N'Kézmuvesek könyve', N' A következo nemesítés biztosan sikeres lesz.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7611', N'7611', N'4', N'10', N'Az ösztönzés könyve', N'Megduplázza az esélyét egy tárgy sikeres megbuvölésének.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7663', N'7663', N'6', N'8', N'Átalakítás formulája', N'Véletlenszeru megjelenési tulajdonságot rendel hozzá a tárgyadhoz. (csak a 17 -nél magasabb fejlesztésu tárgyakhoz használható). ')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7623', N'7623', N'3', N'7', N'A nemváltás itala', N' Megváltoztatja a karakter nemét (no/férfi)')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7622', N'7622', N'4', N'7', N'A fajváltás itala', N'Megváltoztatja a karakter faját. Sajnos senki nem tudja megmondani milyen új fajjá fogsz változni.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7621', N'7621', N'8', N'6', N'Hajfesték', N'Ez a csomag lehetové teszi számodra, hogy hajszínt változtass. Sajnálatos módon nem ismert milyen lesz az új szín.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7620', N'7620', N'7', N'6', N'Frizura váltás', N'Megváltoztatja a karakter frizuráját. Sajnálatos módon senki nem tudja melyik hajtípust fogod kapni.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7624', N'7624', N'1', N'25', N'Név váltás', N'Megváltoztathatod a neved ezzel a tárggyal.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7601', N'7601', N'6', N'14', N'Feltámadás', N' Ha cipeled magaddal ezt a tárgyat váratlan halálod esetén azonnal fel tudod támasztani magad.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7715', N'7715', N'5', N'100', N'Négylevelu lóhere ital', N' Egy órára a duplájára növeli az esélyét annak, hogy szörnyektol tárgyakat szerezz.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7715', N'7715', N'5', N'100', N'Négylevelu lóhere ital', N' Egy órára a duplájára növeli az esélyét annak, hogy szörnyektol tárgyakat szerezz.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7605', N'7605', N'9', N'6', N'Ellenszer', N' A feltámasztás mellékhatásaitól szabadít meg.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7619', N'7619', N'7', N'11', N'Teleport: Markut', N'A Csatamágusok fohadiszállására teleportál Markut -ba.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7618', N'7618', N'7', N'11', N'Teleport: Keter', N'Magnaktia katonai negyedbe teleportál Keter -be.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7604', N'7604', N'8', N'10', N'Megidézo tekercs', N' Egyik csoport tagot magadhoz teleportálod.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7603', N'7603', N'8', N'11', N'A teleportálás tekercse', N' Egy választott játékoshoz teleportálhatod magad.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7705', N'7705', N'7', N'11', N'Teleport - Thebekut', N'Thebekut városba teleportál! Gor-ba')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7662', N'7662', N'5', N'14', N'Az üresség formulája', N'Minden mágikus tulajdonság és nemesítés hatása a felszerelésbol eltunik. A megfelelo NJK segítségével tudod használni.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7849', N'7849', N'1', N'30', N'A visszatérés mágikus tintája', N'Használd ezt a tintát, ha vissza szeretnél térni a eredeti nemzetedhez.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7657', N'7657', N'6', N'17', N'Szállítási engedély', N'Lepecsételt tárgyakat készíthetsz, amikkel már kereskedhetsz utána. A megfelelo NJK fog segíteni neked. Nem minden tárgyra lehet használni!')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'18101', N'18101', N'10', N'100', N'Csoki Rudolf', N' Rénszarvas formájú csokoládé, mely szétolvad a szájban. A csokoládé fogyasztás növeli a fizikális és spirituális erot, mint pl. a támadó és védekezo ero, viszont sok cukrot tartalmaz.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7652', N'7652', N'5', N'100', N' A vakmeroség itala (3ó)', N'A sebzésed 150 ponttal, a páncélod 80 ponttal megnövekedik 3 órára.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7715', N'7715', N'5', N'100', N'Négylevelu lóhere ital', N' Egy órára a duplájára növeli az esélyét annak, hogy szörnyektol tárgyakat szerezz.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7715', N'7715', N'5', N'100', N'Négylevelu lóhere ital', N' Egy órára a duplájára növeli az esélyét annak, hogy szörnyektol tárgyakat szerezz.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7688', N'7688', N'11', N'500', N'Elso osztályu eletero ital', N'Visszaállít 4800 életpontot Várakozási ido: 20 másodperc')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7689', N'7689', N'11', N'500', N'Elso osztályú mana ital', N'Teljes mana pont visszaállítás. Várakozási ido: 20 másodperc')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7688', N'7688', N'1', N'500', N'Elso osztályu eletero ital', N'Visszaállít 4800 életpontot Várakozási ido: 20 másodperc')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7689', N'7689', N'1', N'500', N'Elso osztályú mana ital', N'Teljes mana pont visszaállítás. Várakozási ido: 20 másodperc')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7688', N'7688', N'5', N'500', N'Elso osztályu eletero ital', N'Visszaállít 4800 életpontot Várakozási ido: 20 másodperc')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7689', N'7689', N'5', N'500', N'Elso osztályú mana ital', N'Teljes mana pont visszaállítás. Várakozási ido: 20 másodperc')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'18101', N'18101', N'10', N'100', N'Csoki Rudolf', N' Rénszarvas formájú csokoládé, mely szétolvad a szájban. A csokoládé fogyasztás növeli a fizikális és spirituális erot, mint pl. a támadó és védekezo ero, viszont sok cukrot tartalmaz.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7652', N'7652', N'5', N'100', N' A vakmeroség itala (3ó)', N'A sebzésed 150 ponttal, a páncélod 80 ponttal megnövekedik 3 órára.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'11604', N'11604', N'1', N'100', N'Tökéletes drágako', N'Ez a drágako mágikus ereju. A beleillesztés sikerességének esélye a duplája egy közönséges drágakohöz viszonyítva.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'11604', N'11604', N'5', N'100', N'Tökéletes drágako', N'Ez a drágako mágikus ereju. A beleillesztés sikerességének esélye a duplája egy közönséges drágakohöz viszonyítva.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'8205', N'8205', N'5', N'100', N'Láthatatlanság itala', N' Láthatatlan leszel ellenségeid számára 10 másodpercig.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'8205', N'8205', N'10', N'100', N'Láthatatlanság itala', N' Láthatatlan leszel ellenségeid számára 10 másodpercig.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'8205', N'8205', N'20', N'100', N'Láthatatlanság itala', N' Láthatatlan leszel ellenségeid számára 10 másodpercig.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7688', N'7688', N'5', N'500', N'Elso osztályu eletero ital', N'Visszaállít 4800 életpontot Várakozási ido: 20 másodperc')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7689', N'7689', N'5', N'500', N'Elso osztályú mana ital', N'Teljes mana pont visszaállítás. Várakozási ido: 20 másodperc')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'11604', N'11604', N'1', N'100', N'Tökéletes drágako', N'Ez a drágako mágikus ereju. A beleillesztés sikerességének esélye a duplája egy közönséges drágakohöz viszonyítva.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'11604', N'11604', N'5', N'100', N'Tökéletes drágako', N'Ez a drágako mágikus ereju. A beleillesztés sikerességének esélye a duplája egy közönséges drágakohöz viszonyítva.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'8205', N'8205', N'5', N'100', N'Láthatatlanság itala', N' Láthatatlan leszel ellenségeid számára 10 másodpercig.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'8205', N'8205', N'10', N'100', N'Láthatatlanság itala', N' Láthatatlan leszel ellenségeid számára 10 másodpercig.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'8205', N'8205', N'20', N'100', N'Láthatatlanság itala', N' Láthatatlan leszel ellenségeid számára 10 másodpercig.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'30219', N'30219', N'1', N'100', N'Gorilla', N' Kattints duplán az ikonra, hogy háziállatként használhasd!')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7715', N'7715', N'5', N'100', N'Négylevelu lóhere ital', N' Egy órára a duplájára növeli az esélyét annak, hogy szörnyektol tárgyakat szerezz.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7715', N'7715', N'5', N'100', N'Négylevelu lóhere ital', N' Egy órára a duplájára növeli az esélyét annak, hogy szörnyektol tárgyakat szerezz.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'18101', N'18101', N'10', N'100', N'Csoki Rudolf', N' Rénszarvas formájú csokoládé, mely szétolvad a szájban. A csokoládé fogyasztás növeli a fizikális és spirituális erot, mint pl. a támadó és védekezo ero, viszont sok cukrot tartalmaz.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7652', N'7652', N'5', N'100', N' A vakmeroség itala (3ó)', N'A sebzésed 150 ponttal, a páncélod 80 ponttal megnövekedik 3 órára.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7715', N'7715', N'5', N'100', N'Négylevelu lóhere ital', N' Egy órára a duplájára növeli az esélyét annak, hogy szörnyektol tárgyakat szerezz.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7715', N'7715', N'5', N'100', N'Négylevelu lóhere ital', N' Egy órára a duplájára növeli az esélyét annak, hogy szörnyektol tárgyakat szerezz.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'18101', N'18101', N'10', N'100', N'Csoki Rudolf', N' Rénszarvas formájú csokoládé, mely szétolvad a szájban. A csokoládé fogyasztás növeli a fizikális és spirituális erot, mint pl. a támadó és védekezo ero, viszont sok cukrot tartalmaz.')
GO
GO
INSERT INTO [dbo].[TWELL_ITEMLIST] ([iconid], [itemid], [count], [rate], [item_name], [item_info]) VALUES (N'7652', N'7652', N'5', N'100', N' A vakmeroség itala (3ó)', N'A sebzésed 150 ponttal, a páncélod 80 ponttal megnövekedik 3 órára.')
GO
GO
