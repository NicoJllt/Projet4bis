-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2020 at 02:15 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet4`
--

-- --------------------------------------------------------

--
-- Table structure for table `episode`
--

CREATE TABLE `episode` (
  `episodeId` int(11) NOT NULL,
  `title` varchar(150) NOT NULL COMMENT 'Titre de la news',
  `content` text NOT NULL COMMENT 'Contenu de la news',
  `dateEpisode` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Date de dernière modification',
  `idAuthor` int(11) NOT NULL COMMENT 'id auteur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `episode`
--

INSERT INTO `episode` (`episodeId`, `title`, `content`, `dateEpisode`, `idAuthor`) VALUES
(1, 'Chapitre 1 : Le départ', 'Duis pulvinar, lacus quis accumsan condimentum, dolor purus pharetra ligula, ut finibus mi turpis quis metus. Integer eget consequat nibh. Sed egestas quis mi at porttitor. Aenean gravida ullamcorper sapien ac laoreet. Aliquam ut mattis enim, vitae ultrices ipsum. Donec sit amet nisl sollicitudin, pharetra velit vitae, gravida velit. Aenean a convallis diam, sed bibendum urna. Phasellus aliquet ex ac viverra fringilla. In ex tellus, elementum sed arcu ornare, euismod aliquet risus.\r\n\r\nFusce ullamcorper velit ex, ut condimentum metus ultrices non. Praesent scelerisque magna id aliquam porta. Vivamus quis sapien suscipit, bibendum libero id, varius risus. Vestibulum venenatis molestie tellus ut lacinia. Morbi pretium libero elit, at luctus justo pellentesque sed. Integer et semper magna. Pellentesque viverra sollicitudin pretium. Proin eu efficitur nibh. Curabitur convallis eros at velit laoreet faucibus. Aliquam nisi mauris, egestas et dolor ut, posuere varius orci. Praesent a lacinia tortor. Ut sit amet felis ac est rutrum tempus non a elit. Aenean in volutpat tortor. Nam commodo, arcu fermentum feugiat sollicitudin, massa odio consectetur est, a condimentum ante ligula sed odio. Ut sagittis tincidunt libero non accumsan. Duis vel metus in est suscipit mattis.\r\n\r\nMorbi lobortis eleifend mi nec maximus. Sed hendrerit turpis nisi, non mattis sem porttitor a. Etiam ac nibh vitae enim tincidunt placerat in sagittis enim. In facilisis sit amet elit eu accumsan. Morbi efficitur enim a iaculis consequat. Donec vitae tincidunt risus. Nunc fringilla placerat nisi, in feugiat augue elementum non. Sed dignissim, nisl ut luctus aliquam, mi neque porta est, eu blandit elit nisl at ipsum. Cras et nunc et sapien ultrices consequat. Donec auctor accumsan urna sed placerat. Phasellus congue justo vitae magna finibus aliquet. Suspendisse vulputate scelerisque varius. Ut faucibus convallis enim, at pulvinar lacus posuere vitae.\r\n\r\nQuisque quis lacinia orci, eget finibus velit. Vestibulum dui sapien, ornare in aliquet nec, laoreet quis nunc. Nulla facilisi. Pellentesque metus arcu, vulputate ac luctus hendrerit, convallis nec odio. Vestibulum posuere ex velit, vel sodales elit hendrerit in. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce magna dolor, aliquet ac dictum ut, iaculis ut tellus.\r\n\r\nCurabitur sapien sapien, efficitur vitae rutrum ut, vulputate vitae nisi. Nulla eu consectetur est. Nullam in turpis vitae elit rhoncus lobortis. Curabitur in interdum urna, accumsan volutpat metus. Ut id malesuada erat, et malesuada enim. Fusce et sapien at sem egestas pellentesque in et justo. Mauris bibendum pharetra venenatis. Fusce elementum vestibulum mauris, et luctus magna cursus quis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Phasellus non sapien facilisis felis dignissim pulvinar vel ac turpis.', '2020-06-09 13:24:42', 1),
(2, 'Chapitre 2 : Début du voyage', 'Curabitur ut justo fringilla turpis rhoncus euismod. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras sed tempus mi. Phasellus tincidunt imperdiet turpis, ut ultrices lectus egestas vel. Morbi pellentesque molestie eros, eget consequat tellus sollicitudin vitae. Integer sollicitudin faucibus ex ut consectetur. Nunc id nisl faucibus, pretium elit in, malesuada tortor. Morbi consectetur neque eu quam dictum tempus. Donec tristique sollicitudin aliquam. Praesent a tellus id odio vestibulum maximus. Fusce non convallis ipsum. Integer gravida neque eu nisl cursus, id ultricies neque blandit. Phasellus et blandit purus.\r\n\r\nUt sed ornare magna. Pellentesque eu ullamcorper urna. Sed volutpat lorem est, a finibus neque pellentesque et. Nulla id condimentum quam, nec varius risus. Etiam convallis luctus venenatis. Nulla nec nulla id purus convallis fermentum. Praesent id lorem est. Aliquam nisi nulla, tristique porttitor odio a, sollicitudin posuere eros. Suspendisse eu risus nec tellus suscipit facilisis et et nibh. Aenean rhoncus lorem ut nibh sagittis, sed tincidunt massa viverra. Duis est ante, sagittis sed arcu in, suscipit luctus lorem. Sed convallis sem eget nisl venenatis blandit. Donec a ipsum nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;\r\n\r\nProin sit amet mattis ante. Sed id enim vestibulum, facilisis leo quis, suscipit orci. Vestibulum ante erat, interdum in sapien sit amet, lacinia vehicula arcu. Cras tincidunt tristique diam a lobortis. Praesent a ante diam. In hac habitasse platea dictumst. Quisque quis commodo massa. Etiam non neque enim. Vestibulum porttitor erat mauris, facilisis condimentum nunc laoreet quis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed feugiat vel neque id laoreet. Vivamus ornare mauris lorem, eleifend convallis erat porttitor vestibulum.\r\n\r\nSed enim dolor, pulvinar a nibh non, iaculis sollicitudin massa. Cras non ante sed odio fermentum maximus. Sed efficitur in nibh id scelerisque. Phasellus dignissim nisi mauris, a tempor enim luctus eu. In maximus turpis sit amet mi dictum tempus. Fusce vestibulum interdum massa sed luctus. Fusce tincidunt feugiat lectus, ut elementum erat blandit eget. Pellentesque vulputate diam augue, et lacinia neque tincidunt id. Proin eget ligula a ante egestas malesuada. In pellentesque augue luctus diam faucibus hendrerit.\r\n\r\nNam malesuada vulputate nunc, eu tincidunt nulla efficitur sed. Nullam est justo, mollis cursus molestie non, bibendum eu eros. Praesent ut viverra nulla, quis malesuada diam. Pellentesque varius rhoncus ipsum, vel vulputate sapien consequat eu. Suspendisse potenti. Nunc ut diam ac tellus hendrerit fermentum et sed orci. Nullam ac congue sapien. Curabitur volutpat facilisis turpis a rhoncus. Phasellus suscipit ornare quam eu tincidunt. Ut in commodo nisi, vel molestie nisi. Sed a tellus a erat volutpat viverra. Maecenas porttitor enim eu scelerisque faucibus.', '2020-05-18 16:43:56', 1),
(3, 'Chapitre 3 : La découverte', 'Curabitur vel ipsum odio. Curabitur euismod feugiat malesuada. Fusce malesuada sapien nec enim iaculis, vitae porta diam cursus. Fusce molestie maximus ultricies. In id eleifend nunc, vitae molestie odio. Sed faucibus lacinia ex, nec facilisis turpis dignissim vitae. Vestibulum posuere ullamcorper neque, id viverra ipsum euismod eu. Aliquam interdum sollicitudin ligula, eget ullamcorper tellus ullamcorper at. Sed varius nulla ipsum, id malesuada justo scelerisque eget. Vestibulum urna purus, mollis sed ex vel, porta gravida magna. Morbi imperdiet at turpis at sagittis. Nunc lorem nunc, tempor id urna ac, auctor hendrerit ex. Integer convallis lacus neque, at luctus sem viverra at.\r\n\r\nInteger consectetur massa ut tortor feugiat ultrices sit amet id felis. Morbi in tortor aliquet, ultricies dolor eget, pretium quam. Phasellus sit amet lectus fermentum, fermentum nunc vitae, sollicitudin justo. Nam convallis justo tempor nisi lacinia, nec aliquam odio faucibus. Donec ac tortor eget tortor sodales scelerisque a ut mauris. Nulla varius tempor sapien, ut maximus purus fermentum finibus. Integer pellentesque aliquet tellus, eget feugiat quam convallis sit amet.\r\n\r\nIn eget viverra augue, ut efficitur enim. Nunc consectetur elementum eros, a venenatis enim dignissim in. Curabitur auctor sed ligula a pulvinar. Pellentesque auctor sagittis porttitor. Nam in erat non nisl hendrerit pharetra. Nam posuere vulputate sem sed congue. Etiam hendrerit turpis a erat rhoncus, ac facilisis justo pretium. Pellentesque luctus nisi nec fermentum tempus. Proin hendrerit mauris non gravida dapibus. Nulla enim ligula, luctus sit amet dui non, vulputate tincidunt libero. Donec euismod risus quam, sit amet vestibulum risus porta vel.\r\n\r\nAliquam erat volutpat. Nulla in diam mattis, blandit neque id, auctor augue. Donec venenatis nunc ac aliquet pulvinar. Nam semper porta tortor. Sed porttitor ligula vitae odio sollicitudin, eu sodales felis venenatis. Nam posuere risus ipsum, egestas tincidunt est hendrerit viverra. Donec ligula justo, sollicitudin in ligula ac, accumsan laoreet nulla. Duis commodo euismod interdum.\r\n\r\nAliquam felis nulla, interdum et justo vel, volutpat feugiat nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae lectus dui. Vivamus egestas molestie lorem, id auctor nulla venenatis ut. In pretium, eros tristique convallis egestas, ipsum turpis consectetur nisi, a placerat mauris nunc at dolor. Suspendisse potenti. Nunc mollis elit eu erat venenatis laoreet. Nullam turpis augue, egestas id laoreet eget, vestibulum at elit. In hac habitasse platea dictumst. Nam dignissim mollis erat ut consequat. Nullam euismod id urna at vehicula.', '2020-05-18 16:44:08', 1),
(4, 'Chapitre 4 : Périple en cours', 'Etiam lobortis purus nec massa fringilla, at viverra ex vestibulum. Proin vel cursus lorem. Phasellus pretium dui ante, sit amet rutrum enim consequat imperdiet. Morbi diam risus, sollicitudin vel nunc eget, rhoncus sagittis nulla. Mauris in interdum nibh. Morbi condimentum in purus at vestibulum. Integer aliquam mi sed tempor facilisis. Phasellus placerat, dui non dignissim luctus, ligula ante semper massa, ac scelerisque urna lacus nec libero.\r\n\r\nCras in ligula nec felis posuere luctus. Sed fermentum mauris enim, id semper ante dignissim eu. Proin facilisis a augue quis tincidunt. Nunc consequat nulla ipsum. Nullam iaculis sodales leo et fermentum. Aliquam tortor lacus, porttitor nec ullamcorper eu, ullamcorper ac ex. Mauris quis vestibulum arcu.\r\n\r\nFusce tristique maximus sem suscipit faucibus. Phasellus vitae nunc nec tellus semper euismod id ut magna. Donec id eros fermentum, vestibulum arcu ac, consectetur felis. Duis luctus augue non velit pulvinar, a facilisis ipsum tristique. Morbi et orci pulvinar, aliquet dui non, faucibus tellus. Fusce congue nunc a molestie pellentesque. Vivamus a urna quis velit mattis mattis. Suspendisse eget neque nunc. Nam condimentum arcu nec erat suscipit bibendum nec nec risus. Donec a nisl feugiat turpis dictum varius ac ut libero. Pellentesque malesuada odio tellus, sit amet sollicitudin urna pretium vel. Duis quis fringilla augue, sed consectetur nibh. Ut elementum sagittis nunc et consectetur. Nullam vel leo urna. Suspendisse potenti. Nulla feugiat urna et erat dignissim tempor.\r\n\r\nDuis condimentum eleifend magna, vitae pretium justo luctus sagittis. Sed porttitor dui at metus venenatis dignissim. Vestibulum eu elit velit. Maecenas sollicitudin dui congue lacus placerat, ut varius arcu dapibus. Proin porttitor quis mauris ut sagittis. Integer convallis et nibh ac sodales. Donec sodales, metus in pellentesque semper, neque enim varius metus, ut malesuada quam mi non sapien. Morbi placerat sit amet dui ac commodo. Praesent venenatis sem pulvinar, finibus lacus sit amet, egestas lacus. Vestibulum posuere dui et ante tincidunt, quis aliquet nisi vulputate. Nullam ac pellentesque quam, in convallis neque.\r\n\r\nAenean laoreet, nisl non rhoncus posuere, eros enim luctus augue, eget bibendum erat velit hendrerit leo. Maecenas ac massa venenatis, efficitur tellus ut, feugiat felis. Sed tempus velit eget erat pretium, placerat faucibus ante luctus. Nam tristique odio erat, ut mattis enim facilisis vitae. Vivamus leo ligula, faucibus nec ullamcorper nec, interdum ac dolor. Proin mollis nisi imperdiet sem dapibus, id mollis dolor lacinia. Fusce ac commodo sapien. Suspendisse tellus lectus, gravida et blandit in, aliquet in arcu.', '2020-05-18 16:44:24', 1),
(5, 'Chapitre 5 : L\'environnement', 'Proin quam elit, mollis in tempus in, aliquam id magna. Integer libero eros, rhoncus sed semper eu, vehicula a lectus. Aliquam tempus elementum imperdiet. Praesent venenatis nulla ut accumsan fringilla. Fusce iaculis arcu nisi, at ornare nunc ultricies sit amet. Quisque nec justo ligula. Vivamus ornare erat vel dignissim auctor. Vivamus sagittis suscipit hendrerit. Suspendisse malesuada bibendum augue, id viverra massa. Phasellus mollis eleifend ligula, quis convallis velit elementum vel. In hac habitasse platea dictumst. Vestibulum a augue sapien. Suspendisse a scelerisque dolor.\r\n\r\nAenean nunc nibh, mattis ut sagittis ac, dictum nec elit. Vestibulum nec nunc euismod sem tristique tempus. Fusce id turpis quis eros suscipit ullamcorper. Donec vel sagittis odio, eu ornare mi. Fusce congue porta aliquet. Nulla tincidunt condimentum ultricies. Vivamus eleifend sit amet nulla vel gravida. Donec bibendum est purus, ac bibendum elit egestas in. Vivamus quis nisl luctus, aliquam elit vel, porta risus. Integer maximus vel nunc in pellentesque. Aliquam lobortis sem nulla, id sagittis arcu pulvinar at. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Quisque congue euismod pretium. Cras ultricies convallis nisi vitae sollicitudin. Nam consequat odio sed dolor iaculis egestas.\r\n\r\nNulla at libero ex. Maecenas sed nulla vel tortor maximus molestie. Nam eget vehicula metus, non finibus felis. Nam faucibus, odio a volutpat accumsan, sapien quam rutrum augue, vel porttitor lacus augue vitae lacus. Aenean tincidunt lacinia neque id commodo. Nam consequat risus rutrum ipsum vulputate dapibus. Proin rutrum egestas sapien, at egestas erat tincidunt a. Ut in nisl nulla. Curabitur imperdiet tellus vitae diam posuere, sed semper libero posuere. Fusce eget scelerisque turpis. Duis lorem tortor, fermentum vitae lectus sed, congue pharetra lacus. Maecenas nec felis eu elit porttitor dictum a eu orci. Fusce id metus vitae ex efficitur suscipit bibendum nec orci. Etiam suscipit aliquam arcu, sit amet condimentum lacus semper non.\r\n\r\nSed mauris erat, feugiat a hendrerit sit amet, imperdiet at nibh. Aenean non elit quis sem fermentum dignissim pulvinar non ex. Mauris vestibulum cursus ipsum, in finibus ante molestie ac. Integer porta tincidunt est, eu pulvinar tellus fermentum ac. Etiam venenatis urna ac sem lacinia, ut viverra sem tempus. Mauris eu dolor vitae leo gravida rhoncus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;\r\n\r\nNulla sollicitudin augue et libero rutrum, vulputate mollis magna scelerisque. Maecenas cursus efficitur libero, eu blandit dolor ullamcorper euismod. Vestibulum rutrum ut justo vitae aliquam. Sed consequat, ex a finibus ultrices, ante lectus blandit turpis, ut lobortis purus quam eu ligula. Nullam elementum, justo id fermentum finibus, leo ante mattis lectus, laoreet finibus odio tellus quis risus. Fusce auctor tellus nunc, sit amet consectetur quam facilisis vitae. Vivamus ac consequat orci.\r\n\r\n', '2020-05-18 16:45:05', 1),
(6, 'Chapitre 6 : Les rencontres', 'Integer sit amet scelerisque justo. Suspendisse potenti. Nunc porttitor quis turpis ut viverra. Suspendisse condimentum, enim id sollicitudin facilisis, ligula nisl hendrerit tellus, sed lacinia lectus risus in ex. Quisque sit amet neque est. Integer eleifend pulvinar nulla quis porta. Proin interdum nec metus ut euismod. Nunc molestie gravida rhoncus. Curabitur vulputate dui quis sem egestas scelerisque quis consequat erat. Nullam rutrum ex dolor. Proin erat eros, porta ac placerat eu, finibus vitae neque. Praesent tempor mollis enim, in venenatis nisl ullamcorper a. Suspendisse porttitor arcu nunc, in porta urna luctus non. Suspendisse mattis vel nunc in venenatis. Curabitur mattis erat non ullamcorper vestibulum. Donec blandit quam at nunc sollicitudin rhoncus.\r\n\r\nPraesent semper enim sed turpis dictum, non dignissim ante interdum. Aenean ac sapien consectetur, ornare mauris sed, aliquam quam. Vestibulum ut placerat ex, vel accumsan erat. Sed feugiat cursus nunc nec aliquam. Curabitur odio purus, elementum vitae vulputate at, dapibus non dui. Praesent diam tellus, maximus ac placerat ac, mattis at sapien. Vestibulum eget libero quis nisi dignissim ultrices sit amet aliquam tortor. Sed vulputate sem tellus, ut rutrum velit posuere eu. Donec pretium porta imperdiet. Morbi mi mauris, accumsan ut pellentesque sagittis, aliquet id neque. Maecenas ac urna sit amet tellus malesuada sagittis. Nulla vitae felis mi. Vivamus eleifend neque nec erat elementum dignissim a ultricies nisi.\r\n\r\nMauris suscipit eleifend risus, id scelerisque felis eleifend id. Mauris et augue ut elit convallis pharetra vitae vel augue. Nullam leo velit, lobortis sit amet ultricies at, vulputate quis diam. Nullam in diam massa. Suspendisse potenti. In nec posuere velit, in hendrerit lacus. Quisque accumsan erat ut felis malesuada, dapibus fringilla metus pulvinar. Nulla faucibus ligula vitae risus ultrices volutpat. In id dapibus purus. Nam et tellus viverra, pellentesque ipsum eu, luctus lacus. Donec lacinia est vehicula urna accumsan, sit amet consequat lacus luctus.\r\n\r\nMauris quis nisl malesuada, pharetra ante ut, porttitor quam. Sed nisi nisi, dictum nec purus sit amet, vestibulum semper sem. Aliquam non metus accumsan, malesuada turpis et, eleifend nibh. In magna libero, accumsan vitae arcu eget, pharetra tincidunt diam. Sed et urna arcu. Nullam ac ullamcorper enim. Nulla eget mauris accumsan dui pulvinar venenatis. Maecenas aliquet varius laoreet. Ut eget tellus at enim tempor lacinia sed vitae eros. Quisque imperdiet orci quis aliquam semper. Integer porttitor ante mattis nisl lobortis fringilla. Cras ante mi, sagittis cursus dapibus id, gravida sit amet dui. Sed ullamcorper magna et erat volutpat tincidunt. Duis ac justo id ante luctus tristique quis sit amet felis. Praesent convallis nibh lacus, eget congue lectus dictum a.\r\n\r\nUt ut dapibus velit, quis vestibulum neque. Curabitur ac placerat lorem. Sed condimentum est posuere, lobortis quam in, consequat libero. Ut nec justo diam. Pellentesque sit amet diam pretium turpis dictum egestas. Aenean purus augue, sodales a sagittis ut, semper ac orci. In aliquet, eros nec fermentum tristique, massa velit elementum erat, vitae posuere nunc tortor eu nulla. Vestibulum non commodo odio. Nunc a sem et neque lobortis tincidunt non ac diam.', '2020-05-18 16:45:19', 1),
(7, 'Chapitre 7 : Moment de répit', 'Morbi ut volutpat velit. Etiam interdum nisi a tristique porta. Sed vitae commodo elit. Etiam mattis accumsan erat id volutpat. Curabitur sollicitudin faucibus massa, quis vestibulum dolor imperdiet at. Etiam pharetra nibh non justo scelerisque consectetur. Fusce sed aliquet justo. Suspendisse condimentum turpis in rhoncus gravida. Nullam non fermentum ante. Aliquam vestibulum lorem nec enim consectetur, sit amet elementum augue laoreet. Nunc tincidunt orci eget scelerisque gravida. Duis volutpat luctus nulla, quis molestie augue vulputate ut. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin non tempor massa. Integer cursus, tellus cursus placerat cursus, magna felis tristique dui, mollis porttitor velit leo at purus.\r\n\r\nNullam ultricies sed nisl nec gravida. Sed ac ante tincidunt, faucibus arcu ac, mattis felis. Curabitur sollicitudin pellentesque congue. Vivamus egestas ligula eu nulla vestibulum porttitor. Donec molestie tempus ex, eget elementum nunc rhoncus sed. Suspendisse ullamcorper nibh massa, nec tempor est scelerisque eleifend. Etiam convallis quam ultrices orci vestibulum aliquet. Sed ultricies maximus hendrerit. Sed varius diam tellus, in accumsan quam viverra vitae. Etiam consectetur ut enim porttitor vestibulum. Cras ac ornare ex, sit amet consectetur neque. Fusce aliquet sapien rutrum leo tincidunt lobortis.\r\n\r\nSuspendisse sodales, metus quis vehicula luctus, enim orci commodo diam, vitae feugiat elit nisi eu ex. Ut molestie nunc sit amet risus varius, ultricies tempor augue porttitor. Nunc faucibus non ante vel luctus. In urna dui, suscipit eu purus et, porta dictum massa. Aliquam gravida fringilla lorem eget cursus. Vivamus scelerisque diam vitae enim consectetur tempor. Nam facilisis eu libero sit amet tincidunt. In sit amet enim iaculis, auctor turpis in, condimentum nisi. Pellentesque rhoncus nulla enim, vitae volutpat purus pulvinar quis.\r\n\r\nQuisque congue pharetra eros a molestie. Integer vel urna at turpis dignissim malesuada. Nam cursus tortor id tincidunt malesuada. Integer luctus velit quis mi interdum placerat. Nam at neque in justo ullamcorper blandit. Pellentesque eleifend dui id dui convallis feugiat. Mauris cursus neque ipsum, a commodo nunc imperdiet varius. Nullam suscipit risus sapien, rutrum placerat diam laoreet nec. Donec vel felis ut arcu lobortis pharetra.\r\n\r\nSed at faucibus ligula. Cras fermentum sed enim sit amet suscipit. Mauris condimentum, orci nec convallis pulvinar, eros ex fermentum lacus, sit amet fermentum dolor sapien a risus. Nullam varius lacus eu efficitur porta. Aliquam ut aliquet elit. Nulla facilisi. In ultrices purus diam, ut gravida sem mattis non. Praesent varius mi odio, quis rhoncus odio dictum eu. Etiam ut dapibus ligula. Nulla nec neque et ipsum commodo consectetur.', '2020-05-18 16:45:31', 1),
(8, 'Chapitre 8 : Instant sauvage', 'Fusce sed nisi fringilla, dignissim nunc non, malesuada quam. Proin quis ligula id lorem iaculis hendrerit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec ipsum ante, dictum facilisis blandit in, dictum a arcu. Vivamus sit amet nisl quis metus pharetra pretium. Nullam malesuada ornare lobortis. Ut iaculis porta sollicitudin. Curabitur a blandit magna, quis imperdiet enim. Pellentesque mattis accumsan magna, in dictum nulla sollicitudin ut. Aliquam in interdum sapien. Vivamus vitae elit consequat, tempor eros blandit, ullamcorper ligula. In hac habitasse platea dictumst.\r\n\r\nDuis a magna vitae augue rhoncus suscipit eget a massa. Mauris justo elit, pharetra at orci vel, cursus feugiat mi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin finibus volutpat mi. Nulla magna nunc, fringilla sit amet iaculis in, pharetra sed nisi. Ut quis interdum sapien, rhoncus laoreet mi. Duis consequat turpis eu urna tristique, vel ultricies quam dapibus. Donec cursus ex quis ante aliquam, eu feugiat ipsum hendrerit. Maecenas mattis finibus dui, in venenatis libero tincidunt et. Aenean libero nibh, ornare eget purus a, blandit venenatis leo.\r\n\r\nPellentesque bibendum erat et semper vulputate. Mauris purus urna, semper sit amet arcu id, suscipit mattis turpis. Ut vitae dapibus tellus. Cras pretium nibh nulla, nec dignissim risus porttitor quis. Nulla tempus justo rhoncus lacus rhoncus efficitur non non lorem. Aenean pulvinar, purus vitae egestas gravida, quam justo molestie neque, id blandit tortor urna sed turpis. Fusce sapien eros, scelerisque in turpis et, tristique pretium massa.\r\n\r\nDuis in pharetra velit. Sed viverra nunc neque, a ornare metus interdum at. Morbi sagittis ligula mi, in commodo nisi efficitur a. Fusce fermentum lacus vitae leo tristique fermentum. Integer porta urna in risus rhoncus semper. Duis vitae sollicitudin eros. Suspendisse finibus justo a nibh consequat porta. Praesent sed orci nec augue molestie tempus vel ut leo. Quisque nec dui in justo mollis viverra vel ut urna. Sed at condimentum ligula. Donec vitae turpis at nisi vestibulum mollis vel in purus. Vivamus porta accumsan arcu, ut ornare justo molestie pulvinar. Proin tristique lectus sed diam venenatis molestie. Aliquam a varius lectus. Nunc eget est vel enim aliquet sodales id nec velit. Vivamus diam odio, porttitor eget consectetur sit amet, molestie eget lacus.\r\n\r\nIn semper bibendum condimentum. Donec sed luctus metus. Donec elit felis, luctus eu arcu id, pharetra tincidunt quam. Proin scelerisque mollis ipsum, et varius sapien auctor id. Donec tincidunt nisi vel ipsum laoreet commodo. Integer quis tortor orci. Ut consectetur rutrum sem, sed sollicitudin neque laoreet in. Etiam sed nibh vel mauris aliquam porttitor sit amet nec lorem. Vestibulum hendrerit tempus ligula at mollis. Suspendisse porta lacus ut feugiat maximus. Fusce pretium nibh tortor, id ullamcorper augue congue in. Pellentesque elementum tristique erat in luctus. Morbi vehicula, nisi eget scelerisque consectetur, lectus dolor dignissim ipsum, eget pellentesque risus libero ac augue. Nam volutpat vitae augue at facilisis. Integer facilisis velit euismod egestas auctor. Curabitur fermentum vestibulum ex a semper.', '2020-06-09 13:37:53', 1),
(9, 'Chapitre 9 : Les sens en éveil', 'Ut et efficitur velit, id sollicitudin magna. Etiam non eros vel elit commodo convallis. In id turpis eget ante venenatis interdum. Sed lobortis nisi dui. Aenean non lobortis lorem, id interdum est. Morbi mollis id risus a imperdiet. Morbi consequat vitae enim vel malesuada. Aenean sit amet euismod tortor.\r\n\r\nMauris sit amet risus molestie, egestas mi quis, sollicitudin tellus. Phasellus quis congue justo. Curabitur faucibus egestas dolor eget sagittis. Donec et metus et tortor eleifend molestie a a felis. Sed varius dolor non leo dictum sollicitudin. Mauris vitae ipsum at metus vestibulum tempor. Donec ullamcorper mattis orci, tincidunt dapibus orci ullamcorper ut. Nunc non laoreet odio, in auctor mi.\r\n\r\nIn lectus elit, mattis ac rutrum ut, convallis vel elit. Pellentesque auctor, metus a cursus placerat, lorem leo congue nulla, eu interdum massa tortor aliquam felis. Cras tortor tellus, consequat in blandit quis, molestie sed ipsum. Nullam in efficitur nunc. Quisque elit metus, consequat id congue nec, interdum in est. Quisque elementum, lacus eu euismod fringilla, nibh erat tincidunt lacus, fermentum rutrum urna quam non sem. Sed molestie tellus arcu, quis vestibulum orci luctus quis.\r\n\r\nNam semper ultrices ipsum, ut volutpat purus dictum eu. Vestibulum tincidunt purus eu diam semper facilisis. Etiam eget commodo quam, vitae commodo lacus. Cras vitae pharetra turpis. Duis vitae nisl nec nisi commodo semper. Nullam tincidunt id purus sed tempor. Nulla magna libero, eleifend vel sodales non, varius id eros. Sed at ex id mauris consequat feugiat id vel urna. Aenean ex metus, finibus commodo risus non, placerat auctor enim. Praesent in ornare lacus. Curabitur a dictum mauris. Cras lobortis erat diam, at ullamcorper eros fringilla a.\r\n\r\nSed efficitur nunc ut leo imperdiet gravida. Cras et volutpat augue, eu mattis ex. Nullam sodales lectus a massa tincidunt, vel sodales nunc pretium. Nam euismod, lectus eu elementum interdum, metus lacus vehicula arcu, a dignissim magna eros non nisi. Suspendisse consectetur placerat pellentesque. Nullam quis elit sit amet metus efficitur porttitor. Interdum et malesuada fames ac ante ipsum primis in faucibus. In in turpis sapien.', '2020-06-09 13:38:00', 1),
(10, 'Chapitre 10 : L\'aventure continue', 'Mauris feugiat nibh sed quam consequat commodo. Vivamus viverra quis dui eu auctor. Nam a gravida magna. Pellentesque consectetur rutrum lectus, in aliquam turpis ultrices at. Donec quis augue sit amet tortor ullamcorper maximus in eleifend ante. Pellentesque rutrum mattis tristique. Integer quis ullamcorper mi, eu pellentesque libero. Suspendisse egestas arcu magna. Donec nec consectetur ligula, ac finibus dolor. Nam eget imperdiet ligula. Donec suscipit eleifend placerat. Pellentesque tincidunt vestibulum mauris, eget laoreet leo efficitur sit amet.\r\n\r\nDonec non lectus non ante suscipit rutrum. Maecenas finibus consequat augue, nec fringilla dolor porta id. Quisque faucibus lacus tempor suscipit faucibus. Nam sit amet bibendum eros, sit amet elementum enim. Etiam placerat mauris nulla, sed ullamcorper dolor laoreet elementum. Morbi venenatis nibh eu felis convallis, sed vehicula nulla pretium. Maecenas non ultrices sapien, et vestibulum nibh. Praesent porttitor ante id purus efficitur, id feugiat nisi interdum. Sed venenatis purus id accumsan fermentum. Donec efficitur arcu magna, eget consectetur lacus fermentum quis. Pellentesque rhoncus tempus nisl, egestas lobortis enim tempor non. Maecenas lorem metus, vestibulum eu pharetra eget, laoreet et lorem. Duis mattis pellentesque libero, sit amet posuere nisl. Ut vel nunc lectus. Sed quis imperdiet mi.\r\n\r\nDonec fermentum metus ac dui tincidunt molestie. Curabitur consequat tortor vel lobortis dapibus. Etiam aliquet in mauris ac laoreet. Proin suscipit aliquam felis, a consequat leo lacinia dapibus. Vestibulum porttitor condimentum enim quis fermentum. Aenean lobortis porta ligula ut tincidunt. Vestibulum congue, purus eu vehicula rhoncus, justo risus dapibus risus, pharetra venenatis arcu enim vel eros. Ut aliquet ligula tincidunt turpis elementum, eu molestie magna consequat. Suspendisse feugiat lorem et ipsum pharetra dignissim. Nunc nec consectetur eros. Proin purus nisi, varius nec rutrum a, mollis vitae nibh.\r\n\r\nPraesent posuere iaculis lectus. In a maximus nisl. Fusce volutpat dictum purus, vitae congue eros viverra vitae. Aliquam tempus magna sed aliquam aliquam. Curabitur semper justo vitae fermentum vestibulum. Sed accumsan euismod sapien, sit amet finibus leo auctor at. Maecenas vitae feugiat leo. Nam vel nisi eu risus convallis lobortis a at metus. Mauris auctor tincidunt fermentum. Aliquam efficitur ligula vel neque fringilla iaculis. Etiam turpis turpis, condimentum non tempus in, sagittis eget metus. Duis finibus, libero vel fringilla tempor, lectus elit euismod urna, sit amet ultrices dolor magna a augue.\r\n\r\nIn convallis, mi in bibendum mollis, augue metus euismod urna, sit amet tempor justo leo vel erat. Nullam vel diam et elit bibendum aliquet id ac ex. Pellentesque egestas velit ipsum, vitae vestibulum est commodo in. Sed dapibus lacus vitae turpis egestas vehicula. Mauris eget ante urna. Mauris vel elit eu diam porta sollicitudin. Quisque in lacus in erat sodales dignissim eu eu arcu. Vestibulum ullamcorper tempus congue. Morbi dapibus ac ipsum in condimentum. Donec pretium hendrerit libero eget cursus. Proin vel sapien eget tortor rhoncus egestas. Etiam sit amet odio condimentum, dignissim orci nec, mattis eros. Vivamus cursus eleifend tellus sit amet volutpat.', '2020-06-09 13:38:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `messageId` int(11) NOT NULL,
  `content` text NOT NULL COMMENT 'Contenu du message',
  `dateMessage` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Date de dernière modification du message',
  `flag` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'signaler un commentaire',
  `idEpisode` int(11) NOT NULL COMMENT 'id de l''épisode concerné',
  `idAuthor` int(11) NOT NULL COMMENT 'Identifiant de l''utilisateur auteur du message'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`messageId`, `content`, `dateMessage`, `flag`, `idEpisode`, `idAuthor`) VALUES
(9, 'Salut', '2020-10-08 16:46:59', 0, 1, 1),
(30, 'Test', '2020-10-14 09:43:29', 0, 1, 10),
(31, 'New', '2020-10-14 12:03:49', 1, 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleId` int(11) NOT NULL COMMENT 'id role',
  `name` varchar(15) NOT NULL COMMENT 'nom role'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleId`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `username` varchar(50) NOT NULL COMMENT 'Identifiant de l''utilisateur',
  `mail` varchar(50) NOT NULL COMMENT 'Mail de l''utilisateur',
  `password` varchar(256) NOT NULL COMMENT 'mot de passe de l''utilisateur',
  `registrationDate` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Date d''inscription',
  `idRole` int(11) NOT NULL COMMENT 'role id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `username`, `mail`, `password`, `registrationDate`, `idRole`) VALUES
(1, 'Nico', 'juillet.n@hotmail.fr', '$2y$10$ug5WRSnB4X9jideQIdyIA.yUsT6ccbTJi8azb0xjucn20ZlKaG31W', '2020-09-16 11:05:27', 1),
(10, 'NicoJ', 'test@hotmail.fr', '$2y$10$7LuixTonxhIIR5GLVCEdRO7CZ515dmWIe.Hi0EltjBpVGWrEYJsmO', '2020-09-26 00:45:44', 2),
(14, 'NicoJu2', 'test2@hotmail.fr', '$2y$10$p4JZpV5Orzv2BrnBOXo2xOpD4vcpU.CnnaYmMifj2wgvLzkcxqhCy', '2020-09-28 22:24:59', 2),
(15, 'NicoJuillet', 'nico@hotmail.fr', '$2y$10$XYwqhcpBUROkz0Y0pbGiWeLhKlFDO2czL7S68kr4GiSAZQ6lMsitC', '2020-09-29 16:15:45', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `episode`
--
ALTER TABLE `episode`
  ADD PRIMARY KEY (`episodeId`),
  ADD KEY `idAuthor` (`idAuthor`) USING BTREE;

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageId`),
  ADD KEY `idEpisode` (`idEpisode`),
  ADD KEY `idAuthor` (`idAuthor`) USING BTREE;

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `login` (`username`),
  ADD UNIQUE KEY `mail_2` (`mail`) USING BTREE,
  ADD KEY `fk_role_id` (`idRole`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `episode`
--
ALTER TABLE `episode`
  MODIFY `episodeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `messageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id role', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `episode`
--
ALTER TABLE `episode`
  ADD CONSTRAINT `episode_ibfk_1` FOREIGN KEY (`idAuthor`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_10` FOREIGN KEY (`idAuthor`) REFERENCES `user` (`userId`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_9` FOREIGN KEY (`idEpisode`) REFERENCES `episode` (`episodeId`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_role_id` FOREIGN KEY (`idRole`) REFERENCES `role` (`roleId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
