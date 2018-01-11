-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2018 at 08:00 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `creocoin.com`
--

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE `configuration` (
  `id` int(5) NOT NULL,
  `title` varchar(250) NOT NULL DEFAULT '',
  `description` varchar(250) NOT NULL DEFAULT '',
  `keyword` varchar(250) NOT NULL DEFAULT '',
  `name` varchar(200) NOT NULL DEFAULT '',
  `email` varchar(200) NOT NULL DEFAULT '',
  `bank` varchar(250) NOT NULL DEFAULT '',
  `bank1` varchar(250) NOT NULL DEFAULT '',
  `bank2` varchar(250) NOT NULL DEFAULT '',
  `bank3` varchar(250) NOT NULL,
  `biaya` varchar(500) NOT NULL,
  `komisi_sponsor` varchar(100) NOT NULL,
  `kompasangan` varchar(100) NOT NULL DEFAULT '',
  `komjual` varchar(200) NOT NULL DEFAULT '',
  `komlev` varchar(255) NOT NULL DEFAULT '',
  `alamat` varchar(200) NOT NULL DEFAULT '',
  `hpsms` varchar(50) NOT NULL DEFAULT '',
  `hpsms2` varchar(50) NOT NULL,
  `ym` varchar(50) NOT NULL DEFAULT '',
  `kedalaman` varchar(10) NOT NULL DEFAULT '',
  `footer` text NOT NULL,
  `id_reg` varchar(5) NOT NULL DEFAULT '',
  `id_reg2` varchar(5) NOT NULL DEFAULT '',
  `flushout` varchar(50) NOT NULL DEFAULT '',
  `add_widget` text NOT NULL,
  `peringkat` varchar(2500) NOT NULL,
  `launching` varchar(50) NOT NULL,
  `testi` varchar(50) NOT NULL,
  `point` varchar(5) NOT NULL,
  `biaya2` varchar(500) NOT NULL,
  `point_reward` varchar(500) NOT NULL,
  `kontrak` varchar(100) NOT NULL,
  `topsponsor` varchar(30) NOT NULL,
  `persen_profit` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `idmember` varchar(10) NOT NULL,
  `red_url` varchar(300) NOT NULL,
  `block_batas` varchar(5) NOT NULL,
  `log_salah` varchar(5) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `twiter` varchar(100) NOT NULL,
  `fcon` varchar(300) NOT NULL,
  `gplus` varchar(200) NOT NULL,
  `gt` varchar(200) NOT NULL,
  `topmed` varchar(200) NOT NULL,
  `bnr1` varchar(200) NOT NULL,
  `bnr2` varchar(50) NOT NULL,
  `kurs` varchar(50) NOT NULL,
  `mwd` varchar(50) NOT NULL,
  `mwd2` varchar(100) NOT NULL,
  `mwd3` varchar(50) NOT NULL,
  `mwd4` varchar(50) NOT NULL,
  `otos` varchar(2) NOT NULL,
  `usrd` varchar(200) NOT NULL,
  `otb` varchar(10) NOT NULL,
  `otn` varchar(10) NOT NULL,
  `bckp` varchar(10) NOT NULL,
  `mail_bckp` varchar(200) NOT NULL,
  `profits` varchar(5) NOT NULL,
  `mailset` int(1) NOT NULL,
  `smtphost` varchar(200) NOT NULL,
  `smtport` int(5) NOT NULL,
  `smtpuser` varchar(200) NOT NULL,
  `smtpass` varchar(200) NOT NULL,
  `min_invest` varchar(50) NOT NULL,
  `max_invest` varchar(50) NOT NULL,
  `exptrans` varchar(100) NOT NULL,
  `kedalaman_paket` varchar(10) NOT NULL,
  `sess_time` varchar(50) NOT NULL,
  `mail_logo` varchar(200) NOT NULL,
  `invest_profits` varchar(200) NOT NULL,
  `periode_profits` varchar(200) NOT NULL,
  `kontrak_pro` varchar(200) NOT NULL,
  `domain` varchar(200) NOT NULL,
  `bisnisname` varchar(200) NOT NULL,
  `chats` int(2) NOT NULL,
  `peringkat2` varchar(500) NOT NULL,
  `defcurr` int(1) NOT NULL,
  `passkey` varchar(100) NOT NULL,
  `userkey` varchar(100) NOT NULL,
  `mail_batas` int(1) NOT NULL,
  `hp_batas` int(1) NOT NULL,
  `sms_activation` int(1) NOT NULL,
  `email_activation` int(1) NOT NULL,
  `admindir` varchar(200) NOT NULL,
  `onoto` int(1) NOT NULL,
  `usessl` int(1) NOT NULL,
  `jsms` int(1) NOT NULL,
  `lchat` text NOT NULL,
  `blockie` int(1) NOT NULL,
  `lang` int(2) NOT NULL,
  `invimage` varchar(200) NOT NULL,
  `sysweb` int(1) NOT NULL,
  `reffa` varchar(50) NOT NULL,
  `smsgtw` int(1) NOT NULL,
  `api_sms` varchar(255) NOT NULL,
  `rekbank` int(1) NOT NULL,
  `paygateway` int(1) NOT NULL,
  `virt_member` varchar(25) NOT NULL,
  `virt_add` varchar(25) NOT NULL,
  `charge_transfer` varchar(50) NOT NULL,
  `membershare` int(1) NOT NULL,
  `fbshare` int(1) NOT NULL,
  `twitshare` int(1) NOT NULL,
  `fblike` int(1) NOT NULL,
  `fbrec` int(1) NOT NULL,
  `fbsend` int(1) NOT NULL,
  `gplusshare` int(1) NOT NULL,
  `mailsend` int(1) NOT NULL,
  `instagr` int(1) NOT NULL,
  `linkdin` int(1) NOT NULL,
  `blogger` int(1) NOT NULL,
  `pinterest` int(1) NOT NULL,
  `tumblr` int(1) NOT NULL,
  `stumbleupon` int(1) NOT NULL,
  `print` int(1) NOT NULL,
  `baidu` int(1) NOT NULL,
  `digg` int(1) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `bbm` varchar(100) NOT NULL,
  `whatsapp` varchar(100) NOT NULL,
  `line` varchar(100) NOT NULL,
  `tracker_forex` int(1) NOT NULL,
  `office` varchar(255) NOT NULL,
  `hargatiket` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `cycle` varchar(255) NOT NULL,
  `ttcycle` varchar(255) NOT NULL,
  `min_ticket` varchar(100) NOT NULL,
  `useticket` int(1) NOT NULL,
  `buybalance` int(1) NOT NULL,
  `sellbalance` int(1) NOT NULL,
  `transbalance` int(1) NOT NULL,
  `convertbalance` int(1) NOT NULL,
  `minbuy` varchar(100) NOT NULL,
  `maxbuy` varchar(100) NOT NULL,
  `minsell` varchar(100) NOT NULL,
  `mintrans` varchar(100) NOT NULL,
  `maxtrans` varchar(100) NOT NULL,
  `feesell` varchar(100) NOT NULL,
  `feetrans` varchar(100) NOT NULL,
  `feeconv` varchar(100) NOT NULL,
  `maxsell` varchar(255) NOT NULL,
  `reinv` varchar(50) NOT NULL,
  `profitmanual` varchar(100) NOT NULL,
  `profitmanual2` varchar(100) NOT NULL,
  `memonline` varchar(100) NOT NULL,
  `vwd` varchar(100) NOT NULL,
  `totvist` varchar(100) NOT NULL,
  `vistoday` varchar(100) NOT NULL,
  `vistol` varchar(100) NOT NULL,
  `memonlineadd` varchar(100) NOT NULL,
  `vwdadd` varchar(100) NOT NULL,
  `totvistadd` varchar(100) NOT NULL,
  `vistodayadd` varchar(100) NOT NULL,
  `vistoladd` varchar(100) NOT NULL,
  `ticketstockist` int(1) NOT NULL,
  `hargatiketsto` varchar(100) NOT NULL,
  `cancel_order` int(1) NOT NULL,
  `cancel_order_sto` int(1) NOT NULL,
  `batasbank` varchar(100) NOT NULL,
  `maxinvest` varchar(100) NOT NULL,
  `startday` date NOT NULL,
  `totdepo` varchar(100) NOT NULL,
  `totdepoadd` varchar(100) NOT NULL,
  `lockprofile` int(1) NOT NULL,
  `unlockpro` int(1) NOT NULL,
  `onelogin` int(1) NOT NULL,
  `regpublic` int(1) NOT NULL,
  `matchroi` varchar(100) NOT NULL,
  `bank4` varchar(255) NOT NULL,
  `bank5` varchar(255) NOT NULL,
  `bank6` varchar(255) NOT NULL,
  `batastransfer` varchar(100) NOT NULL,
  `minconvert` varchar(100) NOT NULL,
  `maxconvert` varchar(100) NOT NULL,
  `nilaiconvert` varchar(100) NOT NULL,
  `kursbtc` varchar(100) NOT NULL,
  `coiname` varchar(100) NOT NULL,
  `kursbtcoin` varchar(100) NOT NULL,
  `kursusdcoin` varchar(100) NOT NULL,
  `kurscoinbtc` varchar(100) NOT NULL,
  `saldocoin` varchar(100) NOT NULL,
  `transcoin` int(1) NOT NULL,
  `dtranscoin` varchar(100) NOT NULL,
  `sellcoin` int(1) NOT NULL,
  `dtsellcoin` varchar(100) NOT NULL,
  `convertcoin` int(1) NOT NULL,
  `dtconvertcoin` varchar(100) NOT NULL,
  `dtsellusd` varchar(255) NOT NULL,
  `dtransusd` varchar(255) NOT NULL,
  `dtconvertusd` varchar(255) NOT NULL,
  `convertusd` int(1) NOT NULL,
  `sellusd` int(1) NOT NULL,
  `transusd` int(1) NOT NULL,
  `logadmin` int(1) NOT NULL,
  `logmember` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`id`, `title`, `description`, `keyword`, `name`, `email`, `bank`, `bank1`, `bank2`, `bank3`, `biaya`, `komisi_sponsor`, `kompasangan`, `komjual`, `komlev`, `alamat`, `hpsms`, `hpsms2`, `ym`, `kedalaman`, `footer`, `id_reg`, `id_reg2`, `flushout`, `add_widget`, `peringkat`, `launching`, `testi`, `point`, `biaya2`, `point_reward`, `kontrak`, `topsponsor`, `persen_profit`, `foto`, `idmember`, `red_url`, `block_batas`, `log_salah`, `fb`, `twiter`, `fcon`, `gplus`, `gt`, `topmed`, `bnr1`, `bnr2`, `kurs`, `mwd`, `mwd2`, `mwd3`, `mwd4`, `otos`, `usrd`, `otb`, `otn`, `bckp`, `mail_bckp`, `profits`, `mailset`, `smtphost`, `smtport`, `smtpuser`, `smtpass`, `min_invest`, `max_invest`, `exptrans`, `kedalaman_paket`, `sess_time`, `mail_logo`, `invest_profits`, `periode_profits`, `kontrak_pro`, `domain`, `bisnisname`, `chats`, `peringkat2`, `defcurr`, `passkey`, `userkey`, `mail_batas`, `hp_batas`, `sms_activation`, `email_activation`, `admindir`, `onoto`, `usessl`, `jsms`, `lchat`, `blockie`, `lang`, `invimage`, `sysweb`, `reffa`, `smsgtw`, `api_sms`, `rekbank`, `paygateway`, `virt_member`, `virt_add`, `charge_transfer`, `membershare`, `fbshare`, `twitshare`, `fblike`, `fbrec`, `fbsend`, `gplusshare`, `mailsend`, `instagr`, `linkdin`, `blogger`, `pinterest`, `tumblr`, `stumbleupon`, `print`, `baidu`, `digg`, `fax`, `bbm`, `whatsapp`, `line`, `tracker_forex`, `office`, `hargatiket`, `latitude`, `longitude`, `cycle`, `ttcycle`, `min_ticket`, `useticket`, `buybalance`, `sellbalance`, `transbalance`, `convertbalance`, `minbuy`, `maxbuy`, `minsell`, `mintrans`, `maxtrans`, `feesell`, `feetrans`, `feeconv`, `maxsell`, `reinv`, `profitmanual`, `profitmanual2`, `memonline`, `vwd`, `totvist`, `vistoday`, `vistol`, `memonlineadd`, `vwdadd`, `totvistadd`, `vistodayadd`, `vistoladd`, `ticketstockist`, `hargatiketsto`, `cancel_order`, `cancel_order_sto`, `batasbank`, `maxinvest`, `startday`, `totdepo`, `totdepoadd`, `lockprofile`, `unlockpro`, `onelogin`, `regpublic`, `matchroi`, `bank4`, `bank5`, `bank6`, `batastransfer`, `minconvert`, `maxconvert`, `nilaiconvert`, `kursbtc`, `coiname`, `kursbtcoin`, `kursusdcoin`, `kurscoinbtc`, `saldocoin`, `transcoin`, `dtranscoin`, `sellcoin`, `dtsellcoin`, `convertcoin`, `dtconvertcoin`, `dtsellusd`, `dtransusd`, `dtconvertusd`, `convertusd`, `sellusd`, `transusd`, `logadmin`, `logmember`) VALUES
(1, 'Creocoin.com', 'Creocoin.com', 'Creocoin.com', 'Creocoin.com', 'info@Creocoin.com', '', '', '', '', '10|100|500|1000|5000|||||||||||||||', '7', '', '', '0||||||||||||||||||||', '', '', '', '|||', '1|', '2017 Creocoin.com, All Rights Reserved.', '', '', '||||||', '', 'Beginner|Standard|Premium|Deluxe|Luxury|||||||||||||||', '', '3', '', '||||||||||', '', '|||||', '', '0|0|0.1|0.5|0.25|||||||', '4ad3c71442474ec87661b0b1cc7a4f44_1381134555.jpg', 'RB|1000000', 'www.google.com', '', '10', '', '|', 'favicon_e00ec5c080f5c2a027f5814e6b1f126b.png', '', '0', '1', '', '', '', '|||||||||', '|||||||||', '', '', '1', 'Creocoin.com', '0', '1', '1', '', '', 1, 'mail.Creocoin.com', 25, 'noreplay@Creocoin.com', '^1,.VWHkkhew', '', '1000000000', '0', '5', '3600', 'logo_mail_daac1a94eae2f2c673da5f342c0e8377.png', '||||||||||||||||||||', 'day|day|day|day|day||||||||||||||||', '240|210|180|150|120||||||||||||||||', 'vincacoin.co', 'vincacoin.co', 1, '|||||||||||||||||||||||||||||||||||||||', 1, '', '', 1, 0, 0, 1, '', 0, 1, 1, '', 1, 2, 'logo_invoice_dd8d296098fe12f0e9324ca9d2c95e16.png', 2, 'reff', 1, '', 0, 1, '0', '0', '', 0, 1, 1, 0, 0, 0, 1, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, '', '', '', '', 0, 'office_4f7a14271712081ea5fc6a608a1a7a15.jpeg', '', '', '', '||||||||||', '||||||||||', '', 0, 1, 1, 0, 0, '0.0001', '10000', '0', '0.00001', '50000', '1', '0', '', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, '', 0, 0, '1', '999999999999999999999999999999', '2016-11-21', '0', '0', 0, 0, 0, 1, '', '', '', '', '1', '', '', '', '17005', 'VNC', '', '0.1', '0.00000597', '6000000', 1, '1|1000|0.2', 1, '1|1000|0', 1, '50|1000000|0', '1|1000|0', '1|1000|1', '1|1000|0', 1, 1, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `configuration`
--
ALTER TABLE `configuration`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
