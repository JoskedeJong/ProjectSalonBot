<?php
session_start();
require '../vendor/autoload.php';

use LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\Uri\AltUriBuilder;
use LINE\LINEBot\Constant\Flex\ComponentAlign; // added
use LINE\LINEBot\Constant\Flex\ComponentButtonHeight;
use LINE\LINEBot\Constant\Flex\ComponentButtonStyle;
use LINE\LINEBot\Constant\Flex\ContainerDirection; // added
use LINE\LINEBot\Constant\Flex\ComponentFontSize;
use LINE\LINEBot\Constant\Flex\ComponentFontWeight;
use LINE\LINEBot\Constant\Flex\ComponentIconSize;
use LINE\LINEBot\Constant\Flex\ComponentImageAspectMode;
use LINE\LINEBot\Constant\Flex\ComponentImageAspectRatio;
use LINE\LINEBot\Constant\Flex\ComponentImageSize;
use LINE\LINEBot\Constant\Flex\ComponentLayout;
use LINE\LINEBot\Constant\Flex\ComponentMargin;
use LINE\LINEBot\Constant\Flex\ComponentSpaceSize;
use LINE\LINEBot\Constant\Flex\ComponentSpacing;
use LINE\LINEBot\MessageBuilder\FlexMessageBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ComponentBuilder\BoxComponentBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ComponentBuilder\ButtonComponentBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ComponentBuilder\IconComponentBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ComponentBuilder\ImageComponentBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ComponentBuilder\SpacerComponentBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ComponentBuilder\TextComponentBuilder;
use LINE\LINEBot\MessageBuilder\Flex\ContainerBuilder\BubbleContainerBuilder;


use \LINE\LINEBot\SignatureValidator as SignatureValidator;

//______________________________________________________ message builder ______________________________________________________


class FlexSampleRestaurant
{
    
    public static function get()
    {
        return FlexMessageBuilder::builder()
            ->setAltText('Restaurant')
            ->setContents(
                BubbleContainerBuilder::builder()
                    ->setHero(self::createHeroBlock())
                    ->setBody(self::createBodyBlock())
                    ->setFooter(self::createFooterBlock())
            );
    }
    private static function createHeroBlock()
    {
        return ImageComponentBuilder::builder()
            ->setUrl('https://www.amrathhotelempereur.nl/heading/restaurant_4.jpg')
            ->setSize(ComponentImageSize::FULL)
            ->setAspectRatio(ComponentImageAspectRatio::R20TO13)
            ->setAspectMode(ComponentImageAspectMode::COVER)
            ->setAction(
                new UriTemplateActionBuilder(
                    null,
                    'https://example.com',
                    new AltUriBuilder('https://example.com#desktop')
                )
            );
    }
    private static function createBodyBlock()
    {
        $title = TextComponentBuilder::builder()
            ->setText('Brown Cafe')
            ->setWeight(ComponentFontWeight::BOLD)
            ->setSize(ComponentFontSize::XL);
        $goldStar = IconComponentBuilder::builder()
            ->setUrl('https://example.com/gold_star.png')
            ->setSize(ComponentIconSize::SM);
        $grayStar = IconComponentBuilder::builder()
            ->setUrl('https://example.com/gray_star.png')
            ->setSize(ComponentIconSize::SM);
        $point = TextComponentBuilder::builder()
            ->setText('4.0')
            ->setSize(ComponentFontSize::SM)
            ->setColor('#999999')
            ->setMargin(ComponentMargin::MD)
            ->setFlex(0);
        $review = BoxComponentBuilder::builder()
            ->setLayout(ComponentLayout::BASELINE)
            ->setMargin(ComponentMargin::MD)
            ->setContents([$goldStar, $goldStar, $goldStar, $goldStar, $grayStar, $point]);
        $place = BoxComponentBuilder::builder()
            ->setLayout(ComponentLayout::BASELINE)
            ->setSpacing(ComponentSpacing::SM)
            ->setContents([
                TextComponentBuilder::builder()
                    ->setText('Place')
                    ->setColor('#aaaaaa')
                    ->setSize(ComponentFontSize::SM)
                    ->setFlex(1),
                TextComponentBuilder::builder()
                    ->setText('Miraina Tower, 4-1-6 Shinjuku, Tokyo')
                    ->setWrap(true)
                    ->setColor('#666666')
                    ->setSize(ComponentFontSize::SM)
                    ->setFlex(5)
            ]);
        $time = BoxComponentBuilder::builder()
            ->setLayout(ComponentLayout::BASELINE)
            ->setSpacing(ComponentSpacing::SM)
            ->setContents([
                TextComponentBuilder::builder()
                    ->setText('Time')
                    ->setColor('#aaaaaa')
                    ->setSize(ComponentFontSize::SM)
                    ->setFlex(1),
                TextComponentBuilder::builder()
                    ->setText('10:00 - 23:00')
                    ->setWrap(true)
                    ->setColor('#666666')
                    ->setSize(ComponentFontSize::SM)
                    ->setFlex(5)
            ]);
        $info = BoxComponentBuilder::builder()
            ->setLayout(ComponentLayout::VERTICAL)
            ->setMargin(ComponentMargin::LG)
            ->setSpacing(ComponentSpacing::SM)
            ->setContents([$place, $time]);
        return BoxComponentBuilder::builder()
            ->setLayout(ComponentLayout::VERTICAL)
            ->setContents([$title, $review, $info]);
    }
    private static function createFooterBlock()
    {
        $callButton = ButtonComponentBuilder::builder()
            ->setStyle(ComponentButtonStyle::LINK)
            ->setHeight(ComponentButtonHeight::SM)
            ->setAction(
                new UriTemplateActionBuilder(
                    'CALL',
                    'https://example.com',
                    new AltUriBuilder('https://example.com#desktop')
                )
            );
        $websiteButton = ButtonComponentBuilder::builder()
            ->setStyle(ComponentButtonStyle::LINK)
            ->setHeight(ComponentButtonHeight::SM)
            ->setAction(
                new UriTemplateActionBuilder(
					'uri',
                    'Openingstijden',
                    'https://example.com',
                    new AltUriBuilder('https://www.google.com')
                )
            );
        $spacer = new SpacerComponentBuilder(ComponentSpaceSize::SM);
        return BoxComponentBuilder::builder()
            ->setLayout(ComponentLayout::VERTICAL)
            ->setSpacing(ComponentSpacing::SM)
            ->setFlex(0)
            ->setContents([$callButton, $websiteButton, $spacer]);
    }
}

class WelcomeMsg
{
	public static function get()
	{
		return FlexMessageBuilder::builder()
		-> setAltText ("Flex Message")
		-> setContents(
			BubbleContainerBuilder::builder()
			-> setDirection(ContainerDirection::LTR)
			-> setHeader (self::createHeaderBlock())
			-> setBody (self::createBodyBlock())
			-> setFooter (self::createFooterBlock())
		);
	}

	private static function createHeaderBlock()
	{
		return BoxComponentBuilder::builder()
		->setLayout(ComponentLayout::VERTICAL)
		->setContents([
			TextComponentBuilder::builder()
			->setText("Welkom!")
			// ->setLayout(ComponentLayout::VERTICAL)
			->setAlign(ComponentAlign::CENTER)
		]);
	}

	private static function createBodyBlock()
	{
		return BoxComponentBuilder::builder()
		->setLayout(ComponentLayout::VERTICAL)
		->setContents([
			TextComponentBuilder::builder()
			->setText("Ik ben SalonBot, waar kan ik je mee helpen?")
			->setFlex(0)
			->setAlign(ComponentAlign::CENTER)
			->setWrap(true)
		]);
	}

	private static function createFooterBlock()
	{
		$button1 = ButtonComponentBuilder::builder()
			->setAction(
				new UriTemplateActionBuilder(
				'Openingstijden',
				'https://www.google.com'
				// new AltUriBuilder('https://www.nu.nl')
				)
			);
		$button2 = ButtonComponentBuilder::builder()
		->setAction(
			new UriTemplateActionBuilder(
			'Openingstijden2',
			'https://www.google.com'
			// new AltUriBuilder('https://www.nu.nl')
			)
		);
		return BoxComponentBuilder::builder()
		-> setLayout(ComponentLayout::VERTICAL)
		-> setContents([$button1, $button2]);	

	}
}




// initiate app
$configs =  [
	'settings' => ['displayErrorDetails' => true],
];
$app = new Slim\App($configs);

/* ROUTES */
$app->get('/', function ($request, $response) {      

	$data = WelcomeMsg::get();    						 //delete when done
	// $data = $userFollow::get();
	print_r($data);

	
	//sreturn $response->withStatus(200, 'Okido');
});



$app->post('/', function ($request, $response)
{
	// get request body and line signature header
	$body 	   = file_get_contents('php://input');
	$signature = $_SERVER['HTTP_X_LINE_SIGNATURE'];

	// log body and signature
	file_put_contents('php://stderr', 'Body: '.$body);

	// is LINE_SIGNATURE exists in request header?
	if (empty($signature)){
		return $response->withStatus(400, 'Signature not set');
	}

	// is this request comes from LINE?
	if($_ENV['PASS_SIGNATURE'] == false && ! SignatureValidator::validateSignature($body, $_ENV['CHANNEL_SECRET'], $signature)){
		return $response->withStatus(400, 'Invalid signature');
	}

	// init bot
	$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($_ENV['CHANNEL_ACCESS_TOKEN']);
	$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $_ENV['CHANNEL_SECRET']]);
	$data = json_decode($body, true);
	
//________________________________________________________________________messages_____________________________________________________________________________

	foreach ($data['events'] as $event)
	{
		$userMessage = $event['message']['text'];

		// $userFollow = $event['follow'];

		file_put_contents('php://stderr', " ----- "); //added

		// if ($userFollow == true)
		// {
		// 	$message = "Deze bot herkent dat je een nieuwe gebruiker bent";
        //     $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
		// 	$result = $bot->replyMessage($event['replyToken'], $textMessageBuilder);
		// 	return $result->getHTTPStatus() . ' ' . $result->getRawBody();
		
		// }


		if(strtolower($userMessage) == 'test')
		{
			$message = "TESTOK";
            $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
			$result = $bot->replyMessage($event['replyToken'], $textMessageBuilder);
			return $result->getHTTPStatus() . ' ' . $result->getRawBody();
		
		}

		if(strtolower($userMessage) == 'hallo')
		{
			// $data = welcomeMsg::get();
			$data = FlexSampleRestaurant::get();
            file_put_contents('php://stderr', 'reply data: ' . print_r($data, true));
			$result = $bot->replyMessage($event['replyToken'], $data);
			return $result->getHTTPStatus() . ' ' . $result->getRawBody();
		
		}

		if(strtolower($userMessage) == 'show')
		{
			$data = WelcomeMsg::get();
			// $data = FlexSampleRestaurant::get();
            file_put_contents('php://stderr', 'reply data: ' . print_r($data, true));
			$result = $bot->replyMessage($event['replyToken'], $data);
			return $result->getHTTPStatus() . ' ' . $result->getRawBody();
		
		}

		// if(strtolower($userMessage) == 'tarieven')
		// {
		// 	$message = "De tarieven zijn: 50 euro per behandeling";
        //     $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
		// 	$result = $bot->replyMessage($event['replyToken'], $textMessageBuilder);
		// 	return $result->getHTTPStatus() . ' ' . $result->getRawBody();
		// }

//________________________________________________________________________messages, test _____________________________________________________________________________


		if(strtolower($userMessage) == 'data')									// shows entire test table
		{
			require "../connectfun.php";
			$db_connection = createdb();
			$message_data = pg_query($db_connection, 'SELECT * FROM test_table1');
		
			$message = "";
			while ($row = pg_fetch_row($message_data)) {
					$message .= "$row[1] : $row[2] - ";
				}
            $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
			$result = $bot->replyMessage($event['replyToken'], $textMessageBuilder);
			return $result->getHTTPStatus() . ' ' . $result->getRawBody();
		}

		if(strtolower($userMessage) == 'conf')									// should change Fridays promotions to conference
		{

			require "../connectfun.php";
			$db_connection = createdb();

			$condition = array('id'=>2, 'day'=>'Friday', 'activity'=>'Promotions');
			$newarr = array('id'=>2, 'day'=>'Friday', 'activity'=>'Conference');
			pg_update ($db_connection, 'test_table1' , $newarr , $condition);

			$message_data = pg_query($db_connection, 'SELECT * FROM test_table1');
		
			$message = "";
			while ($row = pg_fetch_row($message_data)) {
					$message .= "$row[1] : $row[2] - ";
				}
            $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
			$result = $bot->replyMessage($event['replyToken'], $textMessageBuilder);
			return $result->getHTTPStatus() . ' ' . $result->getRawBody();
		}

		if(strtolower($userMessage) == 'prom')									// should change Fridays conference to promotions
		{

			require "../connectfun.php";
			$db_connection = createdb();

			$condition = array('id'=>2, 'day'=>'Friday', 'activity'=>'Conference');
			$newarr = array('id'=>2, 'day'=>'Friday', 'activity'=>'Promotions');
			pg_update ($db_connection, 'test_table1' , $newarr , $condition);

			$message_data = pg_query($db_connection, 'SELECT * FROM test_table1');
		
			$message = "";
			while ($row = pg_fetch_row($message_data)) {
					$message .= "$row[1] : $row[2] - ";	
				}
            $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
			$result = $bot->replyMessage($event['replyToken'], $textMessageBuilder);
			return $result->getHTTPStatus() . ' ' . $result->getRawBody();
		}

//________________________________________________________________________messages, appointment _____________________________________________________________________________


		if (strpos(strtolower($userMessage), 'appoint')  !== false ){									

			$part = explode(" ", $userMessage);
			$startTime = $part[1].' '.$part[2];											// timestamp consists of two parts: YYYY-MM-DD and HH:MM:SS
			$addQuart = strtotime("+15 minutes", strtotime($part[2]));					// adds 15 minutes to time-part of input
			$endTime = $part[1].' '.date('h:i:s', $addQuart);


			require "../connectfun.php";												// create connection to db
			$db_connection = createdb();

			$test1 = "";
			$test2 = "";
			$startTimeCheck = pg_query($db_connection, "SELECT * FROM appointment WHERE timestamp <= '".$startTime."' AND endtime >= '".$startTime."'");
			$endTimeCheck = pg_query($db_connection, "SELECT * FROM appointment WHERE timestamp <= '".$endTime."' AND endtime >= '".$endTime."'");

		
			while ($row = pg_fetch_row($startTimeCheck)) {
				$test1 .= "$row[1] : $row[2] - ";	
			}
			while ($row = pg_fetch_row($endTimeCheck)) {
				$test2 .= "$row[1] : $row[2] - ";	
			}

			// $message = $test1;
			// $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
			// $result = $bot->replyMessage($event['replyToken'], $textMessageBuilder);
			// return $result->getHTTPStatus() . ' ' . $result->getRawBody();




			if (($test1 !== "") || ($test2 !== "")){

				$message = "This timestamp was already taken";
				// $message = date('Y-m-d h:i:s', $checkfor);
				$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
				$result = $bot->replyMessage($event['replyToken'], $textMessageBuilder);
				return $result->getHTTPStatus() . ' ' . $result->getRawBody();
			}
			else{

				$message = "cool cool";
				$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
				$result = $bot->replyMessage($event['replyToken'], $textMessageBuilder);
				return $result->getHTTPStatus() . ' ' . $result->getRawBody();
			}






			// $checkfor = pg_query_params($db_connection,'SELECT * FROM appointment WHERE timestamp = $1', array($composite));

			// $intermed = "";
			// while ($row = pg_fetch_row($checkfor)) {
			// 	$intermed .= "$row[1] : $row[2] - ";	
			// }

			// if ($intermed !== ""){
			// 	$message = "This timestamp was already taken";
			// 	// $message = date('Y-m-d h:i:s', $checkfor);
			// 	$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
			// 	$result = $bot->replyMessage($event['replyToken'], $textMessageBuilder);
			// 	return $result->getHTTPStatus() . ' ' . $result->getRawBody();
			// }

			// // $checkfor = pg_query_params($db_connection,'SELECT * FROM appointment WHERE timestamp = $1', array($part[1]));

			// else{
			// 	$addquart = strtotime("+15 minutes", strtotime($part[2]));					// adds 15 minutes to time-part of input
			// 	$endtime = $part[1].' '.date('h:i:s', $addquart);
			// 	$appointData = array('timestamp'=>$composite, 'endtime'=>$endtime, 'treatment'=>$part[3]);
			// 	// pg_insert ($db_connection, 'appointment' , $appointData);

			// 	$message = "cool cool";
			// 	$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
			// 	$result = $bot->replyMessage($event['replyToken'], $textMessageBuilder);
			// 	return $result->getHTTPStatus() . ' ' . $result->getRawBody();
			// }
		}

		if(strtolower($userMessage) == 'data2')											// shows entire appointment table
		{
			require "../connectfun.php";
			$db_connection = createdb();

			$message_data = pg_query($db_connection, "SELECT * FROM appointment");
			$message = "";
			while ($row = pg_fetch_row($message_data)) {
					$message .= "$row[0] : $row[1] : $row[2] : $row[3] - ";
				}
            $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
			$result = $bot->replyMessage($event['replyToken'], $textMessageBuilder);
			return $result->getHTTPStatus() . ' ' . $result->getRawBody();
		}

	}

});

$app->run();