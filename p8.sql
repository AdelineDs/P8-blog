-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1:3306
-- Généré le :  Jeu 16 Août 2018 à 09:18
-- Version du serveur :  5.6.34-log
-- Version de PHP :  7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `p8`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `pass`, `email`) VALUES
(1, 'admin', '$2y$10$CmdircekHV59Hy7Me63ahuRN1lPPVw4ZBmihdkTKh7Zo9kJSIncli', 'deca.adeline@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `reported` tinyint(1) NOT NULL,
  `comment_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `reported`, `comment_date`) VALUES
(21, 7, 'Michel', 'J''adore, ce nouveau chapitre ! Vivement la suite !', 0, '2018-07-31 16:48:39'),
(22, 5, 'Michel', 'Encore un très bon chapitre !', 0, '2018-07-31 18:49:23'),
(23, 5, 'Chloé', 'Super histoire !', 0, '2018-07-31 18:49:48'),
(24, 5, 'Jean', 'J''adore !', 0, '2018-07-31 18:50:07'),
(25, 5, 'Lucie', 'Un peu moins captivant que les précédents chapitres...', 1, '2018-07-31 18:50:39'),
(26, 5, 'Marie', 'Merci pour ce nouveau chapitre.', 0, '2018-07-31 18:51:14'),
(27, 5, 'Marc', 'J''attends la suite !', 0, '2018-07-31 18:51:44'),
(28, 7, 'Lucie ', 'Excellent !!', 2, '2018-07-31 18:53:00');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `publication_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `author`, `publication_date`) VALUES
(1, 'Chapitre 1', '<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Quid enim tam absurdum quam delectari multis inanimis rebus, ut honore, ut gloria, ut aedificio, ut vestitu cultuque corporis, animante virtute praedito, eo qui vel amare vel, ut ita dicam, redamare possit, non admodum delectari? Nihil est enim remuneratione benevolentiae, nihil vicissitudine studiorum officiorumque iucundius.</p>\r\n<p style="text-align: justify;"><br />&nbsp;&nbsp;&nbsp; Iis igitur est difficilius satis facere, qui se Latina scripta dicunt contemnere. in quibus hoc primum est in quo admirer, cur in gravissimis rebus non delectet eos sermo patrius, cum idem fabellas Latinas ad verbum e Graecis expressas non inviti legant. quis enim tam inimicus paene nomini Romano est, qui Ennii Medeam aut Antiopam Pacuvii spernat aut reiciat, quod se isdem Euripidis fabulis delectari dicat, Latinas litteras oderit?</p>\r\n<p style="text-align: justify;"><br />&nbsp;&nbsp;&nbsp; Coactique aliquotiens nostri pedites ad eos persequendos scandere clivos sublimes etiam si lapsantibus plantis fruticeta prensando vel dumos ad vertices venerint summos, inter arta tamen et invia nullas acies explicare permissi nec firmare nisu valido gressus: hoste discursatore rupium abscisa volvente, ruinis ponderum inmanium consternuntur, aut ex necessitate ultima fortiter dimicante, superati periculose per prona discedunt.</p>\r\n<p style="text-align: justify;"><br />&nbsp;&nbsp;&nbsp; His cognitis Gallus ut serpens adpetitus telo vel saxo iamque spes extremas opperiens et succurrens saluti suae quavis ratione colligi omnes iussit armatos et cum starent attoniti, districta dentium acie stridens adeste inquit viri fortes mihi periclitanti vobiscum.</p>\r\n<p style="text-align: justify;"><br />&nbsp;&nbsp;&nbsp; Cum autem commodis intervallata temporibus convivia longa et noxia coeperint apparari vel distributio sollemnium sportularum, anxia deliberatione tractatur an exceptis his quibus vicissitudo debetur, peregrinum invitari conveniet, et si digesto plene consilio id placuerit fieri, is adhibetur qui pro domibus excubat aurigarum aut artem tesserariam profitetur aut secretiora quaedam se nosse confingit.</p>', 'Jean Forteroche', '2018-07-23 15:30:20'),
(2, 'Chapitre 2', '<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Cuius acerbitati uxor grave accesserat incentivum, germanitate Augusti turgida supra modum, quam Hannibaliano regi fratris filio antehac Constantinus iunxerat pater, Megaera quaedam mortalis, inflammatrix saevientis adsidua, humani cruoris avida nihil mitius quam maritus; qui paulatim eruditiores facti processu temporis ad nocendum per clandestinos versutosque rumigerulos conpertis leviter addere quaedam male suetos falsa et placentia sibi discentes, adfectati regni vel artium nefandarum calumnias insontibus adfligebant.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Utque proeliorum periti rectores primo catervas densas opponunt et fortes, deinde leves armaturas, post iaculatores ultimasque subsidiales acies, si fors adegerit, iuvaturas, ita praepositis urbanae familiae suspensae digerentibus sollicite, quos insignes faciunt virgae dexteris aptatae velut tessera data castrensi iuxta vehiculi frontem omne textrinum incedit: huic atratum coquinae iungitur ministerium, dein totum promiscue servitium cum otiosis plebeiis de vicinitate coniunctis: postrema multitudo spadonum a senibus in pueros desinens, obluridi distortaque lineamentorum conpage deformes, ut quaqua incesserit quisquam cernens mutilorum hominum agmina detestetur memoriam Samiramidis reginae illius veteris, quae teneros mares castravit omnium prima velut vim iniectans naturae, eandemque ab instituto cursu retorquens, quae inter ipsa oriundi crepundia per primigenios seminis fontes tacita quodam modo lege vias propagandae posteritatis ostendit.</p>\r\n<p style="text-align: justify;">Ac ne quis a nobis hoc ita dici forte miretur, quod alia quaedam in hoc facultas sit ingeni, neque haec dicendi ratio aut disciplina, ne nos quidem huic uni studio penitus umquam dediti fuimus. Etenim omnes artes, quae ad humanitatem pertinent, habent quoddam commune vinculum, et quasi cognatione quadam inter se continentur.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Unde Rufinus ea tempestate praefectus praetorio ad discrimen trusus est ultimum. ire enim ipse compellebatur ad militem, quem exagitabat inopia simul et feritas, et alioqui coalito more in ordinarias dignitates asperum semper et saevum, ut satisfaceret atque monstraret, quam ob causam annonae convectio sit impedita.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Et quoniam apud eos ut in capite mundi morborum acerbitates celsius dominantur, ad quos vel sedandos omnis professio medendi torpescit, excogitatum est adminiculum sospitale nequi amicum perferentem similia videat, additumque est cautionibus paucis remedium aliud satis validum, ut famulos percontatum missos quem ad modum valeant noti hac aegritudine colligati, non ante recipiant domum quam lavacro purgaverint corpus. ita etiam alienis oculis visa metuitur labes.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Et quoniam inedia gravi adflictabantur, locum petivere Paleas nomine, vergentem in mare, valido muro firmatum, ubi conduntur nunc usque commeatus distribui militibus omne latus Isauriae defendentibus adsueti. circumstetere igitur hoc munimentum per triduum et trinoctium et cum neque adclivitas ipsa sine discrimine adiri letali, nec cuniculis quicquam geri posset, nec procederet ullum obsidionale commentum, maesti excedunt postrema vi subigente maiora viribus adgressuri.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Alios autem dicere aiunt multo etiam inhumanius (quem locum breviter paulo ante perstrinxi) praesidii adiumentique causa, non benevolentiae neque caritatis, amicitias esse expetendas; itaque, ut quisque minimum firmitatis haberet minimumque virium, ita amicitias appetere maxime; ex eo fieri ut mulierculae magis amicitiarum praesidia quaerant quam viri et inopes quam opulenti et calamitosi quam ii qui putentur beati.</p>', 'Jean Forteroche', '2018-07-23 19:30:20'),
(3, 'Chapitre 3', '<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Exsistit autem hoc loco quaedam quaestio subdifficilis, num quando amici novi, digni amicitia, veteribus sint anteponendi, ut equis vetulis teneros anteponere solemus. Indigna homine dubitatio! Non enim debent esse amicitiarum sicut aliarum rerum satietates; veterrima quaeque, ut ea vina, quae vetustatem ferunt, esse debet suavissima; verumque illud est, quod dicitur, multos modios salis simul edendos esse, ut amicitiae munus expletum sit.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Equitis Romani autem esse filium criminis loco poni ab accusatoribus neque his iudicantibus oportuit neque defendentibus nobis. Nam quod de pietate dixistis, est quidem ista nostra existimatio, sed iudicium certe parentis; quid nos opinemur, audietis ex iuratis; quid parentes sentiant, lacrimae matris incredibilisque maeror, squalor patris et haec praesens maestitia, quam cernitis, luctusque declarat.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Cumque pertinacius ut legum gnarus accusatorem flagitaret atque sollemnia, doctus id Caesar libertatemque superbiam ratus tamquam obtrectatorem audacem excarnificari praecepit, qui ita evisceratus ut cruciatibus membra deessent, inplorans caelo iustitiam, torvum renidens fundato pectore mansit inmobilis nec se incusare nec quemquam alium passus et tandem nec confessus nec confutatus cum abiecto consorte poenali est morte multatus. et ducebatur intrepidus temporum iniquitati insultans, imitatus Zenonem illum veterem Stoicum qui ut mentiretur quaedam laceratus diutius, avulsam sedibus linguam suam cum cruento sputamine in oculos interrogantis Cyprii regis inpegit.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Et quoniam mirari posse quosdam peregrinos existimo haec lecturos forsitan, si contigerit, quamobrem cum oratio ad ea monstranda deflexerit quae Romae gererentur, nihil praeter seditiones narratur et tabernas et vilitates harum similis alias, summatim causas perstringam nusquam a veritate sponte propria digressurus.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Quare hoc quidem praeceptum, cuiuscumque est, ad tollendam amicitiam valet; illud potius praecipiendum fuit, ut eam diligentiam adhiberemus in amicitiis comparandis, ut ne quando amare inciperemus eum, quem aliquando odisse possemus. Quin etiam si minus felices in diligendo fuissemus, ferendum id Scipio potius quam inimicitiarum tempus cogitandum putabat.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Cuius acerbitati uxor grave accesserat incentivum, germanitate Augusti turgida supra modum, quam Hannibaliano regi fratris filio antehac Constantinus iunxerat pater, Megaera quaedam mortalis, inflammatrix saevientis adsidua, humani cruoris avida nihil mitius quam maritus; qui paulatim eruditiores facti processu temporis ad nocendum per clandestinos versutosque rumigerulos conpertis leviter addere quaedam male suetos falsa et placentia sibi discentes, adfectati regni vel artium nefandarum calumnias insontibus adfligebant.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Iis igitur est difficilius satis facere, qui se Latina scripta dicunt contemnere. in quibus hoc primum est in quo admirer, cur in gravissimis rebus non delectet eos sermo patrius, cum idem fabellas Latinas ad verbum e Graecis expressas non inviti legant. quis enim tam inimicus paene nomini Romano est, qui Ennii Medeam aut Antiopam Pacuvii spernat aut reiciat, quod se isdem Euripidis fabulis delectari dicat, Latinas litteras oderit?</p>', 'Jean Forteroche', '2018-07-24 07:30:20'),
(4, 'Chapitre 4', '<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Sed maximum est in amicitia parem esse inferiori. Saepe enim excellentiae quaedam sunt, qualis erat Scipionis in nostro, ut ita dicam, grege. Numquam se ille Philo, numquam Rupilio, numquam Mummio anteposuit, numquam inferioris ordinis amicis, Q. vero Maximum fratrem, egregium virum omnino, sibi nequaquam parem, quod is anteibat aetate, tamquam superiorem colebat suosque omnes per se posse esse ampliores volebat.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Quanta autem vis amicitiae sit, ex hoc intellegi maxime potest, quod ex infinita societate generis humani, quam conciliavit ipsa natura, ita contracta res est et adducta in angustum ut omnis caritas aut inter duos aut inter paucos iungeretur.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Abusus enim multitudine hominum, quam tranquillis in rebus diutius rexit, ex agrestibus habitaculis urbes construxit multis opibus firmas et viribus, quarum ad praesens pleraeque licet Graecis nominibus appellentur, quae isdem ad arbitrium inposita sunt conditoris, primigenia tamen nomina non amittunt, quae eis Assyria lingua institutores veteres indiderunt.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Etenim si attendere diligenter, existimare vere de omni hac causa volueritis, sic constituetis, iudices, nec descensurum quemquam ad hanc accusationem fuisse, cui, utrum vellet, liceret, nec, cum descendisset, quicquam habiturum spei fuisse, nisi alicuius intolerabili libidine et nimis acerbo odio niteretur. Sed ego Atratino, humanissimo atque optimo adulescenti meo necessario, ignosco, qui habet excusationem vel pietatis vel necessitatis vel aetatis. Si voluit accusare, pietati tribuo, si iussus est, necessitati, si speravit aliquid, pueritiae. Ceteris non modo nihil ignoscendum, sed etiam acriter est resistendum.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Accedebant enim eius asperitati, ubi inminuta vel laesa amplitudo imperii dicebatur, et iracundae suspicionum quantitati proximorum cruentae blanditiae exaggerantium incidentia et dolere inpendio simulantium, si principis periclitetur vita, a cuius salute velut filo pendere statum orbis terrarum fictis vocibus exclamabant.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Quam ob rem cave Catoni anteponas ne istum quidem ipsum, quem Apollo, ut ais, sapientissimum iudicavit; huius enim facta, illius dicta laudantur. De me autem, ut iam cum utroque vestrum loquar, sic habetote.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Sed (saepe enim redeo ad Scipionem, cuius omnis sermo erat de amicitia) querebatur, quod omnibus in rebus homines diligentiores essent; capras et oves quot quisque haberet, dicere posse, amicos quot haberet, non posse dicere et in illis quidem parandis adhibere curam, in amicis eligendis neglegentis esse nec habere quasi signa quaedam et notas, quibus eos qui ad amicitias essent idonei, iudicarent. Sunt igitur firmi et stabiles et constantes eligendi; cuius generis est magna penuria. Et iudicare difficile est sane nisi expertum; experiendum autem est in ipsa amicitia. Ita praecurrit amicitia iudicium tollitque experiendi potestatem.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Et quoniam mirari posse quosdam peregrinos existimo haec lecturos forsitan, si contigerit, quamobrem cum oratio ad ea monstranda deflexerit quae Romae gererentur, nihil praeter seditiones narratur et tabernas et vilitates harum similis alias, summatim causas perstringam nusquam a veritate sponte propria digressurus.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Proinde die funestis interrogationibus praestituto imaginarius iudex equitum resedit magister adhibitis aliis iam quae essent agenda praedoctis, et adsistebant hinc inde notarii, quid quaesitum esset, quidve responsum, cursim ad Caesarem perferentes, cuius imperio truci, stimulis reginae exsertantis aurem subinde per aulaeum, nec diluere obiecta permissi nec defensi periere conplures.</p>', 'Jean Forteroche', '2018-07-25 06:30:20'),
(5, 'Chapitre 5', '<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Fuerit toto in consulatu sine provincia, cui fuerit, antequam designatus est, decreta provincia. Sortietur an non? Nam et non sortiri absurdum est, et, quod sortitus sis, non habere. Proficiscetur paludatus? Quo? Quo pervenire ante certam diem non licebit. ianuario, Februario, provinciam non habebit; Kalendis ei denique Martiis nascetur repente provincia.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Horum adventum praedocti speculationibus fidis rectores militum tessera data sollemni armatos omnes celeri eduxere procursu et agiliter praeterito Calycadni fluminis ponte, cuius undarum magnitudo murorum adluit turres, in speciem locavere pugnandi. neque tamen exiluit quisquam nec permissus est congredi. formidabatur enim flagrans vesania manus et superior numero et ruitura sine respectu salutis in ferrum.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Illud tamen te esse admonitum volo, primum ut qualis es talem te esse omnes existiment ut, quantum a rerum turpitudine abes, tantum te a verborum libertate seiungas; deinde ut ea in alterum ne dicas, quae cum tibi falso responsa sint, erubescas. Quis est enim, cui via ista non pateat, qui isti aetati atque etiam isti dignitati non possit quam velit petulanter, etiamsi sine ulla suspicione, at non sine argumento male dicere? Sed istarum partium culpa est eorum, qui te agere voluerunt; laus pudoris tui, quod ea te invitum dicere videbamus, ingenii, quod ornate politeque dixisti.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Quam ob rem cave Catoni anteponas ne istum quidem ipsum, quem Apollo, ut ais, sapientissimum iudicavit; huius enim facta, illius dicta laudantur. De me autem, ut iam cum utroque vestrum loquar, sic habetote.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Incenderat autem audaces usque ad insaniam homines ad haec, quae nefariis egere conatibus, Luscus quidam curator urbis subito visus: eosque ut heiulans baiolorum praecentor ad expediendum quod orsi sunt incitans vocibus crebris. qui haut longe postea ideo vivus exustus est.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Harum trium sententiarum nulli prorsus assentior. Nec enim illa prima vera est, ut, quem ad modum in se quisque sit, sic in amicum sit animatus. Quam multa enim, quae nostra causa numquam faceremus, facimus causa amicorum! precari ab indigno, supplicare, tum acerbius in aliquem invehi insectarique vehementius, quae in nostris rebus non satis honeste, in amicorum fiunt honestissime; multaeque res sunt in quibus de suis commodis viri boni multa detrahunt detrahique patiuntur, ut iis amici potius quam ipsi fruantur.</p>', 'Jean Forteroche', '2018-07-25 07:30:20'),
(7, 'Chapitre 6', '<div id="TheTexte" class="Texte" lang="zxx">\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Sed (saepe enim redeo ad Scipionem, cuius omnis sermo erat de amicitia) querebatur, quod omnibus in rebus homines diligentiores essent; capras et oves quot quisque haberet, dicere posse, amicos quot haberet, non posse dicere et in illis quidem parandis adhibere curam, in amicis eligendis neglegentis esse nec habere quasi signa quaedam et notas, quibus eos qui ad amicitias essent idonei, iudicarent. Sunt igitur firmi et stabiles et constantes eligendi; cuius generis est magna penuria. Et iudicare difficile est sane nisi expertum; experiendum autem est in ipsa amicitia. Ita praecurrit amicitia iudicium tollitque experiendi potestatem.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Vbi curarum abiectis ponderibus aliis tamquam nodum et codicem difficillimum <strong>Caesarem</strong> convellere nisu valido cogitabat, eique deliberanti cum proximis clandestinis conloquiis et nocturnis qua vi, quibusve commentis id fieret, antequam effundendis rebus pertinacius incumberet confidentia, acciri mollioribus scriptis per simulationem tractatus publici nimis urgentis eundem placuerat Gallum, ut auxilio destitutus sine ullo interiret obstaculo.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp; Inter has ruinarum varietates a Nisibi quam tuebatur accitus Vrsicinus, cui nos obsecuturos iunxerat imperiale praeceptum, dispicere litis exitialis certamina cogebatur abnuens et reclamans, adulatorum oblatrantibus turmis, bellicosus sane milesque semper et militum ductor sed forensibus iurgiis longe discretus, qui metu sui discriminis anxius cum accusatores quaesitoresque subditivos sibi consociatos ex isdem foveis cerneret emergentes, quae clam palamve agitabantur, occultis Constantium litteris edocebat inplorans subsidia, quorum metu tumor notissimus Caesaris exhalaret.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp; Et quoniam mirari posse quosdam peregrinos existimo haec lecturos forsitan, si contigerit, quamobrem cum oratio ad ea monstranda deflexerit quae Romae gererentur, nihil praeter seditiones narratur et tabernas et vilitates harum similis alias, summatim causas perstringam nusquam a veritate sponte propria digressurus.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Vita est illis semper in fuga uxoresque <strong>mercenariae</strong> conductae ad tempus ex pacto atque, ut sit species matrimonii, dotis nomine futura coniunx hastam et tabernaculum offert marito, post statum diem si id elegerit discessura, et incredibile est quo ardore apud eos in venerem uterque solvitur sexus.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Illud autem non dubitatur quod cum esset aliquando virtutum omnium domicilium Roma, ingenuos advenas plerique nobilium, ut Homerici bacarum suavitate Lotophagi, humanitatis multiformibus officiis retentabant.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp; Et Epigonus quidem amictu tenus philosophus, ut apparuit, prece frustra temptata, sulcatis lateribus mortisque metu admoto turpi confessione cogitatorum socium, quae nulla erant, fuisse firmavit cum nec vidisset quicquam nec audisset penitus expers forensium rerum; Eusebius vero obiecta fidentius negans, suspensus in eodem gradu constantiae stetit latrocinium illud esse, non iudicium clamans.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Qui cum venisset ob haec festinatis itineribus <span style="text-decoration: underline;">Antiochiam</span>, praestrictis palatii ianuis, contempto Caesare, quem videri decuerat, ad praetorium cum pompa sollemni perrexit morbosque diu causatus nec regiam introiit nec processit in publicum, sed abditus multa in eius moliebatur exitium addens quaedam relationibus supervacua, quas subinde dimittebat ad principem.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Sed cautela nimia in peiores haeserat plagas, ut narrabimus postea, aemulis consarcinantibus insidias graves apud Constantium, cetera medium principem sed siquid auribus eius huius modi quivis infudisset ignotus, acerbum et inplacabilem et in hoc causarum titulo dissimilem sui.</p>\r\n<p style="text-align: justify;">&nbsp;&nbsp;&nbsp; Batnae municipium in Anthemusia conditum Macedonum manu priscorum ab Euphrate flumine brevi spatio disparatur, refertum mercatoribus opulentis, ubi annua sollemnitate prope Septembris initium mensis ad nundinas magna promiscuae fortunae convenit multitudo ad commercanda quae Indi mittunt et Seres aliaque plurima vehi terra marique consueta.</p>\r\n</div>\r\n<p>&nbsp;</p>\r\n<div id="s3gt_translate_tooltip_mini" class="s3gt_translate_tooltip_mini_box" style="background: initial !important; border: initial !important; border-radius: initial !important; border-spacing: initial !important; border-collapse: initial !important; direction: ltr !important; flex-direction: initial !important; font-weight: initial !important; height: initial !important; letter-spacing: initial !important; min-width: initial !important; max-width: initial !important; min-height: initial !important; max-height: initial !important; margin: auto !important; outline: initial !important; padding: initial !important; position: absolute; table-layout: initial !important; text-align: initial !important; text-shadow: initial !important; width: initial !important; word-break: initial !important; word-spacing: initial !important; overflow-wrap: initial !important; box-sizing: initial !important; display: initial !important; color: inherit !important; font-size: 13px !important; font-family: X-LocaleSpecific, sans-serif, Tahoma, Helvetica !important; line-height: 13px !important; vertical-align: top !important; white-space: inherit !important; left: 515px; top: 284px; opacity: 0.55;">\r\n<div id="s3gt_translate_tooltip_mini_logo" class="s3gt_translate_tooltip_mini" title="Traduire le texte s&eacute;lectionn&eacute;">&nbsp;</div>\r\n<div id="s3gt_translate_tooltip_mini_sound" class="s3gt_translate_tooltip_mini" title="Lecture">&nbsp;</div>\r\n<div id="s3gt_translate_tooltip_mini_copy" class="s3gt_translate_tooltip_mini" title="Copier le texte dans le presse-papiers">&nbsp;</div>\r\n</div>', 'Jean Forteroche', '2018-07-28 08:59:59');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
