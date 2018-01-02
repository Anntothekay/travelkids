<?php

require_once 'inc/bootstrap.inc.php';

use Entities\Region, Entities\Category, Entities\User, Entities\Travel, Entities\Booking;

// Schritt 1
$em->getConnection()->query('SET FOREIGN_KEY_CHECKS=0;');
$em->getConnection()->query('TRUNCATE TABLE regions;');
$em->getConnection()->query('TRUNCATE TABLE users;');
$em->getConnection()->query('TRUNCATE TABLE travels;');
$em->getConnection()->query('TRUNCATE TABLE categories;');
$em->getConnection()->query('TRUNCATE TABLE bookings;');
$em->getConnection()->query('SET FOREIGN_KEY_CHECKS=1;');

// Schritt 2


$entries = [
    ['name' => 'Kreuzfahrten'],
    ['name' => 'Pauschalreisen'],
    ['name' => 'Tagesausflüge'],
    ['name' => 'Bauernhofurlaub'],
];

foreach ($entries as $entry) {
    $category = new Category($entry);
    $em->persist($category);
}

$entries = [
    ['name' => 'Norddeutschland'],
    ['name' => 'Süddeutschland'],
    ['name' => 'Österreich'],	
    ['name' => 'Europa'],
];

foreach ($entries as $entry) {
    $region = new Region($entry);
    $em->persist($region);
}

$entry = [
    'name' => 'admin',
    'password' => '7axCv3p!',
];
$user = new User($entry);
$em->persist($user);

$em->flush();


// Schritt 3
$region =  $em
	->getRepository('Entities\Region')
	->findOneByName('Norddeutschland');

$category = $em
	->getRepository('Entities\Category')
	->findOneByName('Pauschalreisen');

$entry = [
	'title' => '5 Tage Strandurlaub an der Ostsee',
	'start' => '2018-06-01',
	'end' => '2018-06-05',
	'price' => '399',
	'teaser' => 'Sweet roll brownie chocolate jelly beans powder sweet roll pudding. Dragée pie tiramisu. Toffee tart bear claw lemon drops oat cake. Fruitcake pie brownie wafer powder muffin.',
	'description' => 'Sweet roll brownie chocolate jelly beans powder sweet roll pudding. Dragée pie tiramisu. Toffee tart bear claw lemon drops oat cake. Fruitcake pie brownie wafer powder muffin. Jujubes oat cake lemon drops lemon drops dragée gummi bears lollipop gingerbread pudding. Pie chocolate bar candy cotton candy fruitcake.' . "\n\n" . 'Topping sweet roll biscuit ice cream pudding soufflé jelly sweet roll. Cookie topping marshmallow biscuit gingerbread chocolate bar. Soufflé bear claw carrot cake cake tootsie roll. Chocolate cake pastry cupcake chocolate cake caramels marzipan. Cake dessert gingerbread jelly beans cheesecake chocolate bar lemon drops. Tart pudding cupcake. Donut gummies powder halvah. Soufflé marzipan croissant fruitcake cotton candy caramels bonbon sweet. Topping pudding jelly caramels topping icing cake ice cream.' . "\n\n" . 'Soufflé brownie candy. Pie lemon drops jelly macaroon bear claw bonbon jelly halvah marzipan. Candy canes pastry danish cake caramels ice cream cotton candy cheesecake. Candy cotton candy powder caramels jelly-o fruitcake bonbon donut candy canes. Ice cream muffin soufflé tart sesame snaps chocolate bar oat cake. Liquorice ice cream bonbon pudding cake cookie.',
	'pictures' => [1 => '3.jpg', 2 => '5.jpg', 3 => '17.jpg', 4 => '21.jpg'],
	'thumbnail' => '17.jpg'
];
$travel = new Travel($entry);

$region->addTravel($travel);
$category->addTravel($travel);

$travel->setRegion($region);
$travel->setCategory($category);

$em->persist($travel);

$category = $em
	->getRepository('Entities\Category')
	->findOneByName('Kreuzfahrten');

$entry = [
	'title' => '3 Tage Nordsee Kreuzfahrt',
	'start' => '2018-10-05',
	'end' => '2018-10-07',
	'price' => '225',
	'teaser' => 'Pudding cake liquorice chocolate cake bear claw marzipan gummi bears tootsie roll. Powder fruitcake chocolate candy topping marshmallow. Wafer halvah powder.',
	'description' => 'Pudding cake liquorice chocolate cake bear claw marzipan gummi bears tootsie roll. Powder fruitcake chocolate candy topping marshmallow. Wafer halvah powder. Candy gingerbread pastry chocolate cake brownie chocolate cake cotton candy jujubes. Tootsie roll icing dessert dessert gingerbread donut cake ice cream lollipop. Sesame snaps caramels candy canes. Marshmallow dragée jujubes soufflé muffin. Gummies jujubes sweet roll pudding candy biscuit gummi bears.' . "\n\n" . 'Cheesecake sesame snaps gingerbread brownie macaroon pastry carrot cake. Donut chocolate bar ice cream. Jujubes biscuit ice cream toffee powder. Macaroon croissant pudding powder caramels tiramisu marshmallow. Carrot cake icing lemon drops oat cake pastry fruitcake lollipop. Danish topping tootsie roll apple pie cupcake brownie biscuit lemon drops. Tootsie roll cake carrot cake gummi bears wafer liquorice cake brownie. Lemon drops muffin chupa chups jelly beans. Bear claw soufflé sesame snaps macaroon gingerbread tart.' . "\n\n" . 'Cake biscuit candy chocolate cake. Soufflé gingerbread lollipop jelly beans chocolate bar marzipan tart lemon drops. Danish lollipop pie lemon drops tart topping marshmallow danish. Jelly tart oat cake. Icing croissant icing marshmallow candy pie gummi bears. Soufflé halvah topping liquorice. Halvah chupa chups chocolate bar powder bear claw carrot cake oat cake. Powder pie danish.',
	'pictures' => [1 => '11.jpg', 2 => '17.jpg', 3 => '18.jpg', 4 => '19.jpg'],
	'thumbnail' => '18.jpg'
];
$travel = new Travel($entry);

$region->addTravel($travel);
$category->addTravel($travel);

$travel->setRegion($region);
$travel->setCategory($category);

$em->persist($travel);

$category = $em
	->getRepository('Entities\Category')
	->findOneByName('Tagesausflüge');

$entry = [
	'title' => 'Hansapark inkl. 1 Hotelübernachtung',
	'start' => '2018-03-17',
	'end' => '2018-03-18',
	'price' => '59',
	'teaser' => 'Sweet marzipan cake topping cheesecake pie icing. Toffee toffee tootsie roll lollipop cake. Tiramisu lemon drops brownie topping.',
	'description' => 'Croissant toffee tootsie roll jelly-o chupa chups soufflé sugar plum halvah jujubes. Biscuit icing muffin. Jujubes cheesecake ice cream oat cake. Cotton candy croissant tiramisu fruitcake cupcake ice cream sesame snaps apple pie cheesecake. Gingerbread brownie danish powder gummies chupa chups biscuit. Tart icing wafer sweet biscuit tart powder liquorice. Tart gummies tiramisu cotton candy croissant jelly-o cheesecake. Muffin muffin lemon drops bear claw. Pudding gummi bears oat cake tiramisu lemon drops jelly-o. Icing brownie cake.' . "\n\n" . 'Gingerbread cupcake gummies. Apple pie sweet jujubes soufflé caramels. Brownie jelly liquorice icing liquorice liquorice danish apple pie. Tiramisu soufflé chocolate cake cheesecake sesame snaps topping halvah. Icing caramels dragée. Sweet danish powder ice cream sugar plum chocolate bar. Danish macaroon jelly marzipan jujubes liquorice marzipan liquorice. Brownie chocolate bar powder lollipop. Muffin chupa chups chocolate cake lollipop.' . "\n\n" . 'Sugar plum sweet roll bear claw apple pie carrot cake. Jelly jelly-o biscuit tart lollipop icing marzipan fruitcake. Toffee sugar plum tart sweet roll dragée jelly-o. Sugar plum cake sesame snaps sesame snaps lemon drops caramels chocolate cake lemon drops. Soufflé chupa chups pastry tootsie roll gummies. Sugar plum chupa chups topping. Oat cake candy canes sesame snaps bear claw candy. Dragée cookie cotton candy. Lollipop powder lollipop bonbon. Danish macaroon marzipan pastry chocolate bar chupa chups.',
	'pictures' => [1 => '7.jpg', 2 => '8.jpg', 3 => '9.jpg', 4 => '19.jpg'],
	'thumbnail' => '7.jpg'
];
$travel = new Travel($entry);

$region->addTravel($travel);
$category->addTravel($travel);

$travel->setRegion($region);
$travel->setCategory($category);

$em->persist($travel);

$category = $em
	->getRepository('Entities\Category')
	->findOneByName('Bauernhofurlaub');

$entry = [
	'title' => '7 Tage Bauernhofspaß in Mecklenburg',
	'start' => '2018-07-13',
	'end' => '2018-07-19',
	'price' => '499',
	'teaser' => 'Halvah oat cake brownie sweet tart toffee icing. Cookie bear claw jelly muffin chocolate dessert gummi bears oat cake. Cake sesame snaps bear claw topping candy.',
	'description' => 'Halvah oat cake brownie sweet tart toffee icing. Cookie bear claw jelly muffin chocolate dessert gummi bears oat cake. Cake sesame snaps bear claw topping candy canes topping tootsie roll sesame snaps. Pastry pastry powder jelly beans ice cream pastry tart apple pie dessert. Soufflé sugar plum cupcake sesame snaps pie ice cream marzipan powder halvah. Lollipop tart dessert bonbon candy. Brownie jelly beans sweet chocolate cake cake toffee cotton candy topping sweet. Sugar plum dragée liquorice brownie gingerbread liquorice topping sesame snaps. Lemon drops cheesecake cheesecake sugar plum pastry candy canes bonbon caramels danish. Marshmallow soufflé jelly marshmallow powder. Jelly beans oat cake cookie tootsie roll. Pudding icing halvah gingerbread oat cake. Sesame snaps muffin marzipan icing. Chocolate cake brownie carrot cake.' . "\n\n" . 'Sesame snaps sweet roll cake jelly beans. Cheesecake danish chocolate chocolate bar cake. Bear claw soufflé toffee tootsie roll cake muffin. Topping dessert lollipop soufflé jelly beans powder chupa chups gummies toffee. Icing chocolate bonbon macaroon dragée bear claw tart. Oat cake cake candy canes fruitcake jelly jelly beans. Dragée chupa chups powder apple pie. Chupa chups donut chocolate bar apple pie chocolate brownie. Chocolate candy canes chocolate cake brownie candy canes tiramisu bear claw toffee chupa chups. Lollipop lollipop chocolate cake. Macaroon pie sesame snaps tootsie roll caramels tootsie roll halvah cotton candy. Pudding oat cake bear claw marzipan muffin powder liquorice. Dessert icing dessert oat cake.',
	'pictures' => [1 => '5.jpg', 2 => '6.jpg', 3 => '10.jpg', 4 => '16.jpg'],
	'thumbnail' => '5.jpg'
];
$travel = new Travel($entry);

$region->addTravel($travel);
$category->addTravel($travel);

$travel->setRegion($region);
$travel->setCategory($category);

$em->persist($travel);

$region = $em
	->getRepository('Entities\Region')
	->findOneByName('Süddeutschland');

$category = $em
	->getRepository('Entities\Category')
	->findOneByName('Pauschalreisen');

$entry = [
	'title' => '3 Tage München entdecken',
	'start' => '2018-09-05',
	'end' => '2018-09-07',
	'price' => '189',
	'teaser' => 'Caramels dessert icing icing donut tart. Macaroon sweet roll tiramisu. Lollipop oat cake cake chocolate cake caramels gingerbread tiramisu carrot cake.',
	'description' => 'Caramels dessert icing icing donut tart. Macaroon sweet roll tiramisu. Lollipop oat cake cake chocolate cake caramels gingerbread tiramisu carrot cake. Chupa chups marzipan halvah icing chocolate sweet roll. Ice cream tart cookie croissant halvah dragée biscuit. Gummies halvah jujubes toffee.' . "\n\n" . 'Wafer chocolate cake danish. Jelly beans donut bonbon dessert wafer. Liquorice tart chupa chups biscuit. Lollipop cake macaroon cupcake tootsie roll jelly-o biscuit halvah. Jujubes muffin cupcake dessert jujubes pastry. Croissant ice cream croissant candy canes pastry. Chocolate donut cupcake tart powder.' . "\n\n" . 'Biscuit halvah biscuit gingerbread. Cotton candy chocolate bar fruitcake gingerbread macaroon candy. Halvah cotton candy liquorice toffee bonbon brownie jujubes pastry topping. Cake croissant cake brownie macaroon cookie. Topping pastry sugar plum chupa chups icing bonbon chocolate bar jujubes. Pastry dessert jelly. Pudding jelly-o sweet roll icing dessert apple pie donut sugar plum.',
	'pictures' => [1 => '1.jpg', 2 => '4.jpg', 3 => '9.jpg', 4 => '13.jpg'],
	'thumbnail' => '1.jpg'
];
$travel = new Travel($entry);

$region->addTravel($travel);
$category->addTravel($travel);

$travel->setRegion($region);
$travel->setCategory($category);

$em->persist($travel);

$category = $em
	->getRepository('Entities\Category')
	->findOneByName('Kreuzfahrten');

$entry = [
	'title' => '3 Tage Rheinkreuzfahrt',
	'start' => '2018-04-22',
	'end' => '2018-04-24',
	'price' => '299',
	'teaser' => 'Dessert sesame snaps cake icing marzipan topping. Lemon drops liquorice oat cake cupcake. Candy chocolate biscuit. Cupcake sweet danish pudding croissant topping.',
	'description' => 'Dessert sesame snaps cake icing marzipan topping. Lemon drops liquorice oat cake cupcake. Candy chocolate biscuit. Cupcake sweet danish pudding croissant topping. Powder jelly beans cheesecake muffin macaroon lollipop muffin cake pie. Jelly beans marshmallow gummies chocolate carrot cake muffin jelly beans biscuit. Chocolate cake chocolate cake cupcake ice cream muffin biscuit.' . "\n\n" . 'Chocolate liquorice chupa chups tootsie roll chocolate bar cookie. Fruitcake cake topping brownie. Jelly cotton candy jelly-o croissant chocolate dessert cake pudding. Jelly-o danish cookie chocolate cake donut oat cake cupcake macaroon jelly. Bear claw lemon drops powder biscuit carrot cake apple pie cupcake. Jelly sesame snaps candy canes muffin chupa chups sugar plum jujubes. Cake ice cream fruitcake gingerbread cupcake liquorice brownie sweet roll. Chupa chups toffee bonbon jujubes tiramisu cotton candy wafer marshmallow. Jujubes cotton candy gummies sweet.' . "\n\n" . 'Cake sesame snaps donut dragée ice cream wafer lemon drops. Sweet roll cake sesame snaps cake danish biscuit candy canes carrot cake. Oat cake candy canes cotton candy chupa chups halvah. Danish marshmallow topping brownie gummi bears topping danish muffin. Wafer soufflé brownie. Gummi bears dessert toffee fruitcake. Topping danish cheesecake. Candy canes cupcake sweet roll cupcake jujubes jujubes bonbon jelly-o.',
	'pictures' => [1 => '13.jpg', 2 => '19.jpg', 3 => '21.jpg'],
	'thumbnail' => '19.jpg'
];
$travel = new Travel($entry);

$region->addTravel($travel);
$category->addTravel($travel);

$travel->setRegion($region);
$travel->setCategory($category);

$em->persist($travel);

$category = $em
	->getRepository('Entities\Category')
	->findOneByName('Tagesausflüge');

$entry = [
	'title' => 'Ritterspiele Kaltenberg, 1 Übernachtung',
	'start' => '2018-05-05',
	'end' => '2018-05-06',
	'price' => '69',
	'teaser' => 'Powder brownie caramels donut. Tiramisu dragée jelly sugar plum donut jelly-o croissant topping. Tootsie roll topping pie muffin jelly-o cotton candy cotton candy.',
	'description' => 'Powder brownie caramels donut. Tiramisu dragée jelly sugar plum donut jelly-o croissant topping. Tootsie roll topping pie muffin jelly-o cotton candy cotton candy. Toffee cake cake pudding donut chocolate bar candy canes dessert liquorice. Apple pie jelly beans sweet roll macaroon biscuit chocolate cake. Tart carrot cake sesame snaps candy donut pie. Danish gummi bears powder dessert pie chocolate tart lollipop pastry.' . "\n\n" . 'Fruitcake chupa chups sweet roll caramels dessert wafer croissant apple pie. Wafer carrot cake chocolate cookie candy canes fruitcake. Muffin toffee toffee cake gummies gummi bears marshmallow. Jujubes candy canes marzipan brownie dragée jelly beans caramels sesame snaps chocolate cake. Marzipan liquorice tart muffin apple pie tootsie roll donut marshmallow. Danish pudding sweet roll. Cake powder gingerbread chocolate cake toffee biscuit pudding jelly beans.' . "\n\n" . 'Topping biscuit marshmallow. Biscuit sweet icing candy oat cake danish lollipop halvah. Sugar plum croissant chocolate cake gingerbread jelly beans. Sweet roll chocolate bar bear claw. Bear claw croissant ice cream fruitcake marshmallow halvah macaroon sweet roll. Lemon drops carrot cake wafer pastry sweet dessert lollipop caramels halvah. Chocolate gummies marzipan jelly-o donut carrot cake.',
	'pictures' => [1 => '10.jpg', 2 => '13.jpg', 3 => '20.jpg'],
	'thumbnail' => '20.jpg'
];
$travel = new Travel($entry);

$region->addTravel($travel);
$category->addTravel($travel);

$travel->setRegion($region);
$travel->setCategory($category);

$em->persist($travel);

$category = $em
	->getRepository('Entities\Category')
	->findOneByName('Bauernhofurlaub');

$entry = [
	'title' => '6 Tage Bauernhofurlaub in Bayern',
	'start' => '2018-05-03',
	'end' => '2018-10-08',
	'price' => '399',
	'teaser' => 'Gingerbread cake macaroon cake tart. Bear claw sweet sesame snaps bonbon. Caramels candy tiramisu gummies. Cake sesame snaps gummi bears cake soufflé bear claw.',
	'description' => 'Gingerbread cake macaroon cake tart. Bear claw sweet sesame snaps bonbon. Caramels candy tiramisu gummies. Cake sesame snaps gummi bears cake soufflé bear claw. Dessert carrot cake candy canes tart icing. Marshmallow sweet sesame snaps cheesecake sweet roll cupcake pie lemon drops pie. Jelly beans oat cake cake sugar plum chocolate cake.'  . "\n\n" . 'Cheesecake ice cream icing chocolate brownie carrot cake jelly beans carrot cake. Tiramisu jelly beans bonbon caramels. Halvah sesame snaps chocolate cake lollipop candy carrot cake cotton candy biscuit tart. Marzipan pastry sweet tootsie roll fruitcake. Macaroon croissant cotton candy sweet candy. Sweet roll jelly chupa chups muffin ice cream sweet roll jelly beans gingerbread.' . "\n\n" . 'Candy fruitcake fruitcake icing. Pie cheesecake pudding bonbon pie dessert danish jelly. Jelly chocolate bar icing fruitcake chocolate bar chocolate cake. Jelly-o donut sweet toffee biscuit. Croissant chocolate bar tart wafer jelly beans bonbon. Sweet roll carrot cake bear claw cupcake cookie. Candy croissant caramels pastry.',
	'pictures' => [1 => '6.jpg', 2 => '8.jpg', 3 => '10.jpg', 4 => '16.jpg'],
	'thumbnail' => '6.jpg'
];
$travel = new Travel($entry);

$region->addTravel($travel);
$category->addTravel($travel);

$travel->setRegion($region);
$travel->setCategory($category);

$em->persist($travel);

$region = $em
	->getRepository('Entities\Region')
	->findOneByName('Österreich');

$category = $em
	->getRepository('Entities\Category')
	->findOneByName('Pauschalreisen');

$entry = [
	'title' => '7 Tage Skiurlaub in Österreich',
	'start' => '2018-12-05',
	'end' => '2018-12-11',
	'price' => '499',
	'teaser' => 'Carrot cake candy topping tart. Jelly beans cotton candy chocolate cake bonbon sweet. Apple pie gummi bears bonbon cookie cake pie cotton candy cookie.',
	'description' => 'Carrot cake candy topping tart. Jelly beans cotton candy chocolate cake bonbon sweet. Apple pie gummi bears bonbon cookie cake pie cotton candy cookie. Marzipan marshmallow marzipan. Sugar plum jelly-o gingerbread fruitcake cake soufflé sweet sugar plum halvah. Donut jelly-o cheesecake. Dragée tiramisu sweet roll. Danish gummi bears caramels sweet roll.' . "\n\n" . 'Dragée tiramisu chupa chups. Icing soufflé pie liquorice dragée biscuit danish. Powder sesame snaps marzipan candy canes gummi bears chocolate cake bonbon dragée. Cake soufflé pudding bear claw sugar plum cookie powder. Cupcake icing sweet roll pie candy chocolate oat cake. Gummies tootsie roll liquorice tootsie roll sweet roll jelly-o jelly beans topping. Pudding wafer sugar plum caramels topping tiramisu cheesecake icing donut. Tootsie roll wafer caramels jujubes apple pie chocolate cake icing.' . "\n\n" . 'Brownie muffin dessert. Cookie dessert chocolate cake pudding wafer jelly-o jelly. Icing marzipan marshmallow tart. Sweet roll chocolate cake donut dessert. Dragée chocolate bar apple pie cake cookie macaroon tiramisu croissant. Brownie donut candy canes fruitcake jujubes. Toffee cotton candy marzipan liquorice jelly chocolate. Pudding sweet biscuit chocolate dessert candy canes sweet roll.',
	'pictures' => [1 => '15.jpg', 2 => '22.jpg', 3 => '24.jpg'],
	'thumbnail' => '24.jpg'
];
$travel = new Travel($entry);

$region->addTravel($travel);
$category->addTravel($travel);

$travel->setRegion($region);
$travel->setCategory($category);

$em->persist($travel);

$entry = [
	'title' => '5 Tage Berghütte in Österreich',
	'start' => '2018-01-06',
	'end' => '2018-01-10',
	'price' => '399',
	'teaser' => 'Halvah jelly beans jelly beans caramels macaroon biscuit oat cake. Donut dragée jelly-o. Icing macaroon marzipan. Macaroon marzipan chocolate bar.',
	'description' => 'Halvah jelly beans jelly beans caramels macaroon biscuit oat cake. Donut dragée jelly-o. Icing macaroon marzipan. Macaroon marzipan chocolate bar. Gingerbread jujubes biscuit. Sweet roll muffin cookie pie carrot cake. Soufflé chocolate chocolate cake. Cotton candy tootsie roll cotton candy chocolate pie. Candy canes chocolate bar cheesecake jujubes dessert jelly beans. Oat cake tootsie roll gummies chocolate bar macaroon cotton candy lemon drops cookie.' . "\n\n" . 'Danish tart cake. Cookie sweet roll cotton candy muffin soufflé ice cream tootsie roll. Marshmallow marshmallow jujubes sweet roll chocolate cake. Icing sweet roll oat cake soufflé sweet marshmallow jelly-o. Lollipop pudding gummies soufflé tootsie roll chocolate cake ice cream macaroon. Cotton candy soufflé cheesecake jelly beans. Sugar plum pastry tiramisu donut.' . "\n\n" . 'Icing fruitcake muffin. Bonbon carrot cake candy pie oat cake muffin tart wafer. Jelly-o brownie cotton candy wafer. Dessert chupa chups pie candy. Marshmallow gummi bears chocolate powder lollipop wafer powder. Sugar plum gummies donut biscuit muffin cake.',
	'pictures' => [1 => '2.jpg', 2 => '8.jpg', 3 => '23.jpg', 4 => '24.jpg'],
	'thumbnail' => '23.jpg'
];
$travel = new Travel($entry);

$region->addTravel($travel);
$category->addTravel($travel);

$travel->setRegion($region);
$travel->setCategory($category);

$em->persist($travel);

$category = $em
	->getRepository('Entities\Category')
	->findOneByName('Tagesausflüge');

$entry = [
	'title' => 'Tagesausflug Wien inkl. 1 Übernachtung',
	'start' => '2018-09-05',
	'end' => '2018-09-06',
	'price' => '129',
	'teaser' => 'Pastry cheesecake dessert sesame snaps cupcake liquorice tart. Donut chocolate cake sweet powder soufflé pie ice cream macaroon sesame snaps.',
	'description' => 'Pastry cheesecake dessert sesame snaps cupcake liquorice tart. Donut chocolate cake sweet powder soufflé pie ice cream macaroon sesame snaps. Chocolate cake powder dragée donut cake cotton candy caramels. Jujubes bear claw cheesecake marshmallow sweet tootsie roll topping. Chocolate chupa chups dessert topping biscuit macaroon gummi bears. Dragée cheesecake oat cake marzipan. Pastry gummies croissant dragée dragée ice cream jelly beans.' . "\n\n" . 'Muffin soufflé powder cheesecake liquorice gingerbread tootsie roll chocolate cake. Brownie oat cake donut. Gingerbread icing wafer candy canes fruitcake sweet cookie dragée. Sugar plum fruitcake sweet brownie croissant cheesecake biscuit. Apple pie caramels chocolate pudding. Jujubes sesame snaps marshmallow cheesecake marzipan.' . "\n\n" . 'Bonbon muffin cupcake croissant chocolate. Chocolate cake marshmallow bonbon tart pastry chocolate gummi bears. Lollipop caramels carrot cake muffin brownie halvah dessert. Jelly chocolate bar wafer cotton candy topping caramels chocolate cake jelly-o ice cream.',
	'pictures' => [1 => '1.jpg', 2 => '2.jpg', 3 => '4.jpg'],
	'thumbnail' => '4.jpg'
];
$travel = new Travel($entry);

$region->addTravel($travel);
$category->addTravel($travel);

$travel->setRegion($region);
$travel->setCategory($category);

$em->persist($travel);

$category = $em
	->getRepository('Entities\Category')
	->findOneByName('Bauernhofurlaub');

$entry = [
	'title' => '5 Tage Bauernhofspaß in Österreich',
	'start' => '2018-05-05',
	'end' => '2018-10-05',
	'price' => '299',
	'teaser' => 'Chocolate cake chocolate bar topping cheesecake danish jujubes fruitcake. Cake toffee topping toffee. Bear claw pudding sweet roll jujubes apple pie.',
	'description' => 'Chocolate cake chocolate bar topping cheesecake danish jujubes fruitcake. Cake toffee topping toffee. Bear claw pudding sweet roll jujubes apple pie. Tootsie roll brownie cotton candy marzipan apple pie cupcake candy halvah. Jelly beans dessert liquorice. Dragée halvah danish cheesecake apple pie bonbon brownie. Sweet croissant sugar plum toffee sweet jelly cotton candy. Jelly bonbon chupa chups chupa chups halvah candy canes ice cream.' . "\n\n" . 'Oat cake candy canes halvah powder pie biscuit sweet roll jelly toffee. Chupa chups gummi bears cookie ice cream wafer. Jelly-o muffin biscuit croissant muffin liquorice apple pie cake. Tart powder muffin. Dragée marzipan jelly biscuit bonbon danish bear claw pudding liquorice. Candy canes gummies cake pie cake soufflé. Lollipop danish cake gingerbread soufflé bonbon ice cream marzipan tiramisu.' . "\n\n" . 'Cupcake gingerbread cheesecake lemon drops brownie toffee muffin. Apple pie muffin pie cupcake muffin chocolate caramels croissant gummies. Chupa chups gummi bears icing ice cream sweet soufflé dessert jujubes. Icing gingerbread caramels wafer tart. Cookie marzipan carrot cake bonbon caramels cake jelly. Toffee lemon drops wafer. Donut tiramisu lollipop carrot cake powder cupcake dragée jelly. Danish pie tootsie roll.',
	'pictures' => [1 => '6.jpg', 2 => '8.jpg', 3 => '9.jpg', 4 => '10.jpg'],
	'thumbnail' => '10.jpg'
];
$travel = new Travel($entry);

$region->addTravel($travel);
$category->addTravel($travel);

$travel->setRegion($region);
$travel->setCategory($category);

$em->persist($travel);

$region = $em
	->getRepository('Entities\Region')
	->findOneByName('Europa');
	
$category = $em
	->getRepository('Entities\Category')
	->findOneByName('Pauschalreisen');

$entry = [
	'title' => '6 Tage Urlaub in Holland',
	'start' => '2018-07-02',
	'end' => '2018-07-07',
	'price' => '399',
	'teaser' => 'Wafer pudding candy marzipan soufflé sweet roll. Powder jelly jelly beans. Wafer jelly beans jelly danish macaroon biscuit jujubes. Pastry macaroon muffin.',
	'description' => 'Wafer pudding candy marzipan soufflé sweet roll. Powder jelly jelly beans. Wafer jelly beans jelly danish macaroon biscuit jujubes. Pastry macaroon muffin. Oat cake cake pudding sesame snaps tart dessert gingerbread tootsie roll marshmallow. Brownie dragée fruitcake dragée fruitcake cake candy canes danish cake. Chocolate cake chupa chups ice cream ice cream marzipan toffee pie sesame snaps. Sugar plum icing gummi bears dragée. Sweet croissant soufflé cookie sugar plum cupcake chupa chups.' . "\n\n" . 'Liquorice soufflé candy canes croissant pie brownie. Tootsie roll sweet roll pie brownie cupcake. Sweet roll toffee cake jelly beans candy canes. Jelly-o liquorice lollipop tootsie roll. Macaroon lollipop cotton candy dessert muffin muffin croissant. Tootsie roll pie cake carrot cake. Tart wafer sweet roll toffee candy canes lemon drops.' . "\n\n" . 'Croissant liquorice sugar plum caramels cupcake cookie gingerbread gummi bears marzipan. Icing ice cream chocolate bar marshmallow pie cheesecake gummi bears. Tootsie roll dessert donut apple pie soufflé pudding cotton candy gummies. Lollipop oat cake gummies candy marshmallow cupcake pudding. Jelly chocolate liquorice oat cake bonbon pie caramels tart jelly-o.',
	'pictures' => [1 => '3.jpg', 2 => '5.jpg', 3 => '11.jpg'],
	'thumbnail' => '3.jpg'
];
$travel = new Travel($entry);

$region->addTravel($travel);
$category->addTravel($travel);

$travel->setRegion($region);
$travel->setCategory($category);

$em->persist($travel);

$category = $em
	->getRepository('Entities\Category')
	->findOneByName('Kreuzfahrten');

$entry = [
	'title' => '5 Tage Mittelmeerkreuzfahrt',
	'start' => '2018-06-11',
	'end' => '2018-06-15',
	'price' => '499',
	'teaser' => 'Macaroon danish pie chocolate. Macaroon cookie cupcake macaroon. Muffin powder dessert gummi bears tootsie roll cheesecake cupcake.',
	'description' => 'Macaroon danish pie chocolate. Macaroon cookie cupcake macaroon. Muffin powder dessert gummi bears tootsie roll cheesecake cupcake. Croissant tart donut marzipan pie halvah. Sugar plum gummies fruitcake candy canes. Oat cake cookie cake cake macaroon. Wafer gingerbread biscuit sugar plum croissant tiramisu.' . "\n\n" . 'Bear claw pudding fruitcake ice cream wafer cake lollipop ice cream. Candy canes sesame snaps chupa chups chocolate cake chocolate bar tart jelly. Chocolate bar powder chocolate cake. Tiramisu brownie dragée. Lollipop dragée cheesecake pastry fruitcake pudding pudding marshmallow dragée. Ice cream sesame snaps croissant caramels cake toffee pie pudding.' . "\n\n" . 'Tart candy cheesecake tootsie roll. Danish cheesecake croissant. Tootsie roll tootsie roll soufflé fruitcake tart. Candy carrot cake sweet roll chocolate lollipop fruitcake sesame snaps. Danish marshmallow ice cream sweet roll danish soufflé jujubes jelly. Gingerbread macaroon fruitcake jelly-o apple pie cake danish oat cake sugar plum. Gummi bears apple pie sesame snaps jelly-o marshmallow jelly. Gummies cookie topping gingerbread chocolate bar chocolate.',
	'pictures' => [1 => '1.jpg', 2 => '17.jpg', 3 => '18.jpg', 4 => '21.jpg'],
	'thumbnail' => '21.jpg'
];
$travel = new Travel($entry);

$region->addTravel($travel);
$category->addTravel($travel);

$travel->setRegion($region);
$travel->setCategory($category);

$em->persist($travel);

$category = $em
	->getRepository('Entities\Category')
	->findOneByName('Tagesausflüge');

$entry = [
	'title' => 'Disneyland Paris inkl. 1 Übernachtung',
	'start' => '2018-10-05',
	'end' => '2018-10-06',
	'price' => '159',
	'teaser' => 'Croissant powder soufflé muffin cake gummi bears ice cream. Cheesecake oat cake liquorice. Cake sugar plum wafer lollipop topping powder icing.',
	'description' => 'Jujubes cake cotton candy sugar plum liquorice fruitcake chupa chups cake. Wafer lollipop cake chocolate cake bonbon marshmallow icing. Bear claw biscuit tootsie roll lollipop halvah sweet roll. Lemon drops liquorice wafer wafer bear claw icing muffin jujubes sweet. Cookie lemon drops gummi bears chocolate biscuit. Pastry cake bear claw pastry jelly-o candy lemon drops sesame snaps. Sugar plum jujubes cookie jelly-o sweet. Danish marshmallow cake. Tart powder brownie marshmallow soufflé danish lemon drops.' . "\n\n" . 'Caramels fruitcake liquorice lemon drops. Chocolate icing tiramisu caramels biscuit sweet roll cookie bear claw cotton candy. Chocolate bar liquorice soufflé cookie jelly beans. Lemon drops pastry dessert muffin gingerbread. Tootsie roll cheesecake apple pie. Macaroon bonbon croissant jujubes oat cake tiramisu. Pie pie dessert sugar plum dessert tootsie roll. Gummies jelly sweet roll marshmallow danish. Bear claw icing sugar plum sweet roll cupcake.' . "\n\n" . 'Donut brownie macaroon chocolate jelly-o muffin topping ice cream wafer. Brownie dessert toffee. Dragée dessert tootsie roll. Jelly beans lollipop muffin macaroon topping. Sweet dessert muffin oat cake muffin marzipan carrot cake cupcake brownie. Powder marshmallow jelly beans bonbon. Tootsie roll gingerbread candy canes brownie. Chupa chups biscuit sweet roll sweet roll sweet chocolate bar icing icing pie.',
	'pictures' => [1 => '12.jpg', 2 => '14.jpg', 3 => '16.jpg', 4 => '19.jpg'],
	'thumbnail' => '14.jpg'
];
$travel = new Travel($entry);

$region->addTravel($travel);
$category->addTravel($travel);

$travel->setRegion($region);
$travel->setCategory($category);

$em->persist($travel);

$category = $em
	->getRepository('Entities\Category')
	->findOneByName('Bauernhofurlaub');

$entry = [
	'title' => '7 Tage Bauernhofspaß in Frankreich',
	'start' => '2018-06-15',
	'end' => '2018-06-21',
	'price' => '539',
	'teaser' => 'Tootsie roll ice cream jujubes muffin oat cake caramels cheesecake wafer. Cheesecake croissant muffin. Tart cake cupcake sweet. Biscuit bear claw lollipop.',
	'description' => 'Tootsie roll ice cream jujubes muffin oat cake caramels cheesecake wafer. Cheesecake croissant muffin. Tart cake cupcake sweet. Biscuit bear claw lollipop. Jelly candy canes croissant. Marzipan cheesecake jujubes macaroon.' . "\n\n" . 'Ice cream chocolate dragée fruitcake pastry soufflé topping halvah. Lollipop brownie jelly-o wafer lemon drops. Carrot cake lemon drops sugar plum soufflé liquorice. Tootsie roll chocolate cake halvah dragée cookie. Cotton candy chocolate sweet. Gingerbread liquorice macaroon tart cake. Chocolate caramels chupa chups tootsie roll lollipop donut gingerbread jelly beans halvah. Sweet sweet lollipop. Topping chocolate carrot cake tart macaroon ice cream candy canes bonbon oat cake.' . "\n\n" . 'Sweet caramels cake cookie cake. Jelly liquorice cake toffee candy canes candy bonbon cupcake cookie. Cheesecake wafer cotton candy powder gingerbread chocolate. Muffin tootsie roll pie carrot cake fruitcake sweet. Gummies soufflé donut candy toffee biscuit gummi bears chupa chups fruitcake. Lollipop lollipop apple pie danish candy canes dessert jelly gingerbread cotton candy.',
	'pictures' => [1 => '5.jpg', 2 => '6.jpg', 3 => '9.jpg'],
	'thumbnail' => '9.jpg'
];
$travel = new Travel($entry);

$region->addTravel($travel);
$category->addTravel($travel);

$travel->setRegion($region);
$travel->setCategory($category);

$em->persist($travel);

$em->flush();

?>
Die Datenbankinhalte wurden angepasst.
