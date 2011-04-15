<?php

namespace Cordova\MemorizeScriptureBundle\DataFixtures\ORM;
 
use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Cordova\MemorizeScriptureBundle\Entity\Category;
use Cordova\MemorizeScriptureBundle\Entity\Post;
use Cordova\MemorizeScriptureBundle\Entity\Tag;
use Cordova\MemorizeScriptureBundle\Entity\User;
use Cordova\MemorizeScriptureBundle\Entity\Session;
use Cordova\MemorizeScriptureBundle\Entity\Bible;
use Cordova\MemorizeScriptureBundle\Entity\Book;
use Cordova\MemorizeScriptureBundle\Entity\Chapter;
use Cordova\MemorizeScriptureBundle\Entity\Verse;
use Cordova\MemorizeScriptureBundle\Entity\SessionVerse;
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use FOS\UserBundle\Entity\UserManager;


include(__DIR__ . '/../../Scrap/scrap.php');
class FixtureLoader extends ContainerAware implements FixtureInterface
{
    public function load($manager, $container)
    {

    	// create the ROLE_ADMIN role
    	//$role = new Role();
	    //$role->setName('ROLE_ADMIN');

	    //$manager->persist($role);

        // create a user
        $user = new User();
        $user->setFirstName('John');
        $user->setLastName('Doe');
        $user->setEmail('john@example.com');
	    $user->setUsername('john.doe');
	    //$user->setSalt(md5(time()));

	    // encode and set the password for the user,
	    // these settings match our config
	    $encoder = new MessageDigestPasswordEncoder('sha512', true, 10);
	    $password = $encoder->encodePassword('admin', $user->getSalt());
	    $user->setPassword($password);
	
	    //$user->getUserRoles()->add($role);
 
        $manager->persist($user);
 
        // create the tags
        $tag1 = new Tag();
        $tag1->setName('lorem');
 
        $manager->persist($tag1);
 
        $tag2 = new Tag();
        $tag2->setName('ipsum');
 
        $manager->persist($tag2);
 
	    // create 1 category
        $cat1 = new Category();
        $cat1->setName('Programming');
 
        $manager->persist($cat1);
 
        // create 10 posts
        $tags = array( $tag1, $tag2 );
        for ( $i = 0; $i < 10; ++$i )
        {
            $post = new Post();
            $post->setCategory($cat1);
            $post->setUser($user);
            $post->setTitle('Lorem Ipsum Dolor Sit Amet ' . $i);
            $post->setSlug('lorem-ipsum-dolor-sit-amet ' . $i);
            $post->setContent(
                'Proin auctor augue enim? Integer adipiscing dolor odio proin? ' .
                'In placerat arcu, turpis turpis et rhoncus? Et integer nascetur ' .
                'arcu! Turpis scelerisque tincidunt proin mauris, dignissim duis ' .
                'enim, ac sagittis auctor eu, ut penatibus nunc rhoncus magna ' .
                'dignissim ut elementum est non! Urna scelerisque auctor, massa ' .
                'turpis parturient, nisi, in tristique amet, lectus montes. ' .
                'Facilisis, nunc? Diam ac, urna sed, sit magna turpis turpis ' .
                'tincidunt porta. Tincidunt porta vut dis adipiscing phasellus, ' .
                'a habitasse vut proin vel habitasse cras placerat, auctor, massa ' .
                'ridiculus adipiscing ac duis a porta? Pulvinar in scelerisque, ' .
                'adipiscing, arcu integer lorem odio est pellentesque adipiscing ' .
                'velit. A, et porta, eros pulvinar! Nisi turpis mattis lundium ac ' .
                'non nunc phasellus penatibus ut magna rhoncus dolor, lundium ultrices.'
            );
 
            $post->getTags()->add($tags[rand(0, 1)]);
 
            $manager->persist($post);
        }

        $userManager = $container->get('fos_user.user_manager');
        $user = $userManager->createUser();
	    /*
	    $info contains all genesis so every chapter and every verse within that chapter
	    for now we will just add to database and hard code the version of the Bible, and
               create all chapters for Genensis with all verses.
	    */

	    // current url is just for Genesis
	    $info = processFile('http://quod.lib.umich.edu/cgi/k/kjv/kjv-idx?type=DIV1&byte=1477');

	    // create a Bible
	    $bible = new Bible();
        $bible->setVersion('KJV');

        $manager->persist($bible);

	    // create a Book
	    $book = new Book();
	    $book->setTitle('Genesis');
        $book->setBible($bible);

        $manager->persist($book);

	    // get total # of chapters for each book
	    $bookchapters = $info['chapters'];
	    $info_chapternum = sizeof($bookchapters); // 50 for Genesis

	    for ($i = 1; $i <= $info_chapternum; $i++) {
		    // create each Chapter
		    $chapter = new Chapter();
		    $chapter->setChapternum($i);
            $chapter->setBook($book);
	        $manager->persist($chapter);

		    // now create each verse for corresponding chapter
		
		    // get total # of verses for each chapter
		    $versestext = $bookchapters[$i-1]['verses'];
		    $versesnumber = sizeof($versestext);
		
		    for ($k = 1; $k <= $versesnumber; $k++) {
			    // create a Verse
			    $verse = new Verse();
			    $verse->setVersenum($k);
			    $verse->setVersetext($versestext[$k-1]);
                $verse->setChapter($chapter);
		        $manager->persist($verse);
		    }
	    }

	
        // created a session sample with user john.doe and title test session
        $session = new Session();
        $session->setTitle('My First Session');
        $user->addSession($session);

	    $manager->persist($session);

        // created a sessionverse 1 sample
        $sessionverse1 = new SessionVerse();
        $sessionverse1->setRecitedyesno('no');
        $sessionverse1->setRecitedTimes('4');
        $sessionverse1->setActiveDay('1');
        $sessionverse1->setActiveMonth('1');
        $sessionverse1->setActiveWeek('1');
        $sessionverse1->setExtendedRecitedTimes('1');
        $sessionverse1->setRecitedTimes('1');
        $todaysdate1 = new \DateTime("now");
        $sessionverse1->setEntryDate($todaysdate1);
        $session->addSessionVerse($sessionverse1);

        $manager->persist($sessionverse1);

        // set $verse->text == $sessionverse->getInputfromuser
        $verse1 = new Verse();
	    $verse1->setVersenum('1');
        $verse1->setChapter($chapter);
        $verse1->setVersetext('In the beginning was the Word, and the Word was with God, and the Word was God.');
        $manager->persist($verse1);
        $verse1->addSessionVerse($sessionverse1);

        // created a sessionverse 2 sample
        $sessionverse2 = new SessionVerse();
        $sessionverse2->setRecitedyesno('no');
        $sessionverse2->setRecitedTimes('4');
        $sessionverse2->setActiveDay('1');
        $sessionverse2->setActiveMonth('1');
        $sessionverse2->setActiveWeek('1');
        $sessionverse2->setExtendedRecitedTimes('1');
        $sessionverse2->setRecitedTimes('1');
        $todaysdate2 = new \DateTime("now");
        $sessionverse2->setEntryDate($todaysdate2);
        $session->addSessionVerse($sessionverse2);

        $manager->persist($sessionverse2);

        // set $verse->text == $sessionverse->getInputfromuser
        $verse2 = new Verse();
	    $verse2->setVersenum('1');
        $verse2->setChapter($chapter);
        $verse2->setVersetext('He was in the beginning with God.');
        $manager->persist($verse2);
        $verse2->addSessionVerse($sessionverse2);

        // created a sessionverse 3 sample
        $sessionverse3 = new SessionVerse();
        $sessionverse3->setRecitedyesno('no');
        $sessionverse3->setRecitedTimes('4');
        $sessionverse3->setActiveDay('1');
        $sessionverse3->setActiveMonth('1');
        $sessionverse3->setActiveWeek('1');
        $sessionverse3->setExtendedRecitedTimes('1');
        $sessionverse3->setRecitedTimes('1');
        $todaysdate3 = new \DateTime("now");
        $sessionverse3->setEntryDate($todaysdate3);
        $session->addSessionVerse($sessionverse3);

        $manager->persist($sessionverse3);

        // set $verse->text == $sessionverse->getInputfromuser
        $verse3 = new Verse();
	    $verse3->setVersenum('1');
        $verse3->setChapter($chapter);
        $verse3->setVersetext('All things were made through him, and without him was not any thing made that was made.');
        $manager->persist($verse3);
        $verse3->addSessionVerse($sessionverse3);

        $manager->flush();
    }
}
